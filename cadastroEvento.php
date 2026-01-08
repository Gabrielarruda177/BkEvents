<?php
session_start();
if (!isset($_SESSION['usuario_id'])) {
    header('Location: login.php');
    exit();
}
$usuario_id = $_SESSION['usuario_id'];
$usuario_nome = $_SESSION['usuario'];

include 'conexao.php';

$consultaUsuario = $con->prepare("SELECT * FROM usuarios WHERE nome = ?");
$consultaUsuario->execute([$usuario_nome]);
$dadosUsuario = $consultaUsuario->fetch(PDO::FETCH_ASSOC);

// Processar o formulário de cadastro
$mensagem = '';
$tipo_mensagem = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titulo = trim($_POST['titulo']);
    $data_evento = $_POST['data_evento'];
    $local = trim($_POST['local']);
    $descricao = trim($_POST['descricao']);

    // Validações básicas
    if (empty($titulo) || empty($data_evento) || empty($local) || empty($descricao)) {
        $mensagem = 'Todos os campos são obrigatórios!';
        $tipo_mensagem = 'erro';
    } else {
        // Verificar se foi enviada uma imagem
        $imagem_nome = '';
        if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] === 0) {
            $extensoes_permitidas = ['jpg', 'jpeg', 'png', 'gif'];
            $extensao = strtolower(pathinfo($_FILES['imagem']['name'], PATHINFO_EXTENSION));

            if (!in_array($extensao, $extensoes_permitidas)) {
                $mensagem = 'Tipo de arquivo inválido. Use apenas JPG, PNG ou GIF.';
                $tipo_mensagem = 'erro';
            } else {
                // Gerar nome único para a imagem
                $imagem_nome = uniqid('evento_') . '.' . $extensao;
                $caminho_imagem = 'uploads/' . $imagem_nome;

                // Mover arquivo para a pasta uploads
                if (move_uploaded_file($_FILES['imagem']['tmp_name'], $caminho_imagem)) {
                    // Inserir no banco de dados
                    try {
                        $stmt = $con->prepare("INSERT INTO eventos (titulo, data_evento, local, descricao, imagem, usuario_id) VALUES (?, ?, ?, ?, ?, ?)");
                        $stmt->execute([$titulo, $data_evento, $local, $descricao, $imagem_nome, $usuario_id]);

                        $mensagem = 'Evento cadastrado com sucesso!';
                        $tipo_mensagem = 'sucesso';
                    } catch (PDOException $e) {
                        $mensagem = 'Erro ao cadastrar evento: ' . $e->getMessage();
                        $tipo_mensagem = 'erro';
                        // Remover imagem se houve erro no banco
                        if (file_exists($caminho_imagem)) {
                            unlink($caminho_imagem);
                        }
                    }
                } else {
                    $mensagem = 'Erro ao fazer upload da imagem.';
                    $tipo_mensagem = 'erro';
                }
            }
        } else {
            $mensagem = 'Imagem do evento é obrigatória!';
            $tipo_mensagem = 'erro';
        }
    }
}
?>


<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="css/cadastroEvento.css"> 
    <title>Cadastrar Evento - BK Eventos</title>
</head>
<body>
    <!-- Partículas -->
    <canvas id="particles"></canvas>

    <!-- Toggle Menu Mobile -->
    <div class="mobile-toggle" id="mobileToggle">☰</div>

    <!-- Overlay -->
    <div class="overlay" id="overlay"></div>

    <!-- Dashboard -->
    <div class="dashboard">
        <!-- Sidebar -->
        <aside class="sidebar" id="sidebar">
            <h2><a href="dashboard.php">🎭 BK EVENTOS</a></h2>

                 <!-- Perfil do Usuário -->
                <div class="usuario-sidebar">
                    <?php if (!empty($dadosUsuario['foto'])): ?>
                        <img src="<?= htmlspecialchars($dadosUsuario['foto']) ?>" alt="Foto do Usuário" class="foto-perfil">
                    <?php else: ?>
                        <img src="https://i.pravatar.cc/150?img=33" alt="Foto do Usuário" class="foto-perfil">
                    <?php endif; ?>
                    <p class="nome-usuario"><strong><?= htmlspecialchars($dadosUsuario['nome']) ?></strong></p>
                    <p style="color: rgba(255, 255, 255, 0.5); font-size: 0.9rem; margin-top: 0.5rem;">Organizador Premium</p>
                </div>
            <!-- Menu -->
              <nav>
                    <ul>
                        <li><a href="dashboard.php">🏠 Home</a></li>
                        <li><a href="Eventos.php">📁Eventos</a></li>
                        <li><a href="estatisticas.php">📊 Estatísticas</a></li>
                        <li><a href="configuracoes.php">⚙️ Configurações</a></li>
                    </ul>
                </nav>

            <!-- Logout -->
            <div class="logout">
                <a href="logout.php">🚪 Sair</a>
            </div>
        </aside>

        <!-- Conteúdo Principal -->
        <main class="main-content">
            <div class="container-form">
                <h2>📌 Cadastrar Novo Evento</h2>

                <?php if (!empty($mensagem)): ?>
                    <div class="mensagem <?php echo $tipo_mensagem; ?>" style="display: block;">
                        <?php echo htmlspecialchars($mensagem); ?>
                    </div>
                <?php endif; ?>

                <form id="eventoForm" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="titulo">🎭 Título do Evento</label>
                        <input type="text" id="titulo" name="titulo" placeholder="Ex: Funk no Morro 2025" required>
                    </div>

                    <div class="form-group">
                        <label for="data_evento">📅 Data do Evento</label>
                        <input type="date" id="data_evento" name="data_evento" required>
                    </div>

                    <div class="form-group">
                        <label for="local">📍 Local</label>
                        <input type="text" id="local" name="local" placeholder="Ex: Autódromo de Interlagos, São Paulo" required>
                    </div>

                    <div class="form-group">
                        <label for="descricao">📝 Descrição</label>
                        <textarea id="descricao" name="descricao" rows="4" placeholder="Descreva os detalhes do seu evento..." required></textarea>
                    </div>

                    <div class="form-group">
                        <label>🖼️ Imagem do Evento</label>
                        <div class="file-input-wrapper">
                            <input type="file" id="imagem" name="imagem" accept="image/*" required>
                            <label for="imagem" class="file-input-label" id="fileLabel">
                                📷 Clique para selecionar uma imagem
                            </label>
                        </div>
                        <div class="image-preview" id="imagePreview">
                            <img id="previewImg" src="" alt="Preview">
                        </div>
                    </div>

                    <button type="submit" class="btn">
                        <span>✨ CADASTRAR EVENTO</span>
                    </button>
                </form>
            </div>
        </main>
    </div>

    <script>
        // Partículas animadas
        const canvas = document.getElementById('particles');
        const ctx = canvas.getContext('2d');
        canvas.width = window.innerWidth;
        canvas.height = window.innerHeight;

        const particles = [];
        const particleCount = 60;

        class Particle {
            constructor() {
                this.x = Math.random() * canvas.width;
                this.y = Math.random() * canvas.height;
                this.size = Math.random() * 2 + 1;
                this.speedX = Math.random() * 2 - 1;
                this.speedY = Math.random() * 2 - 1;
                this.color = Math.random() > 0.5 ? 'rgba(0, 255, 234, 0.4)' : 'rgba(255, 0, 127, 0.4)';
            }

            update() {
                this.x += this.speedX;
                this.y += this.speedY;

                if (this.x > canvas.width || this.x < 0) this.speedX *= -1;
                if (this.y > canvas.height || this.y < 0) this.speedY *= -1;
            }

            draw() {
                ctx.fillStyle = this.color;
                ctx.beginPath();
                ctx.arc(this.x, this.y, this.size, 0, Math.PI * 2);
                ctx.fill();
            }
        }

        for (let i = 0; i < particleCount; i++) {
            particles.push(new Particle());
        }

        function animateParticles() {
            ctx.clearRect(0, 0, canvas.width, canvas.height);
            
            particles.forEach(particle => {
                particle.update();
                particle.draw();
            });

            for (let i = 0; i < particles.length; i++) {
                for (let j = i + 1; j < particles.length; j++) {
                    const dx = particles[i].x - particles[j].x;
                    const dy = particles[i].y - particles[j].y;
                    const distance = Math.sqrt(dx * dx + dy * dy);

                    if (distance < 100) {
                        ctx.strokeStyle = `rgba(0, 255, 234, ${0.15 - distance / 700})`;
                        ctx.lineWidth = 0.5;
                        ctx.beginPath();
                        ctx.moveTo(particles[i].x, particles[i].y);
                        ctx.lineTo(particles[j].x, particles[j].y);
                        ctx.stroke();
                    }
                }
            }

            requestAnimationFrame(animateParticles);
        }

        animateParticles();

        window.addEventListener('resize', () => {
            canvas.width = window.innerWidth;
            canvas.height = window.innerHeight;
        });

        // Preview de imagem
        document.getElementById('imagem').addEventListener('change', function(e) {
            const file = e.target.files[0];
            const fileLabel = document.getElementById('fileLabel');
            const imagePreview = document.getElementById('imagePreview');
            const previewImg = document.getElementById('previewImg');

            if (file) {
                fileLabel.textContent = `✅ ${file.name}`;
                fileLabel.classList.add('has-file');

                const reader = new FileReader();
                reader.onload = function(e) {
                    previewImg.src = e.target.result;
                    imagePreview.classList.add('active');
                }
                reader.readAsDataURL(file);
            }
        });

        // Validação do formulário (apenas validações básicas antes do envio)
        document.getElementById('eventoForm').addEventListener('submit', function(e) {
            const titulo = document.getElementById('titulo').value.trim();
            const data = document.getElementById('data_evento').value;
            const local = document.getElementById('local').value.trim();
            const descricao = document.getElementById('descricao').value.trim();
            const imagem = document.getElementById('imagem').files[0];

            // Validações básicas
            if (!titulo || !data || !local || !descricao || !imagem) {
                e.preventDefault();
                alert('Por favor, preencha todos os campos obrigatórios!');
                return false;
            }

            // O formulário será enviado normalmente para o servidor
        });

        // Menu Mobile
        const mobileToggle = document.getElementById('mobileToggle');
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('overlay');

        mobileToggle.addEventListener('click', () => {
            sidebar.classList.toggle('active');
            overlay.classList.toggle('active');
        });

        overlay.addEventListener('click', () => {
            sidebar.classList.remove('active');
            overlay.classList.remove('active');
        });

        // Fechar menu ao clicar em um link (mobile)
        document.querySelectorAll('.sidebar ul a').forEach(link => {
            link.addEventListener('click', () => {
                if (window.innerWidth <= 768) {
                    sidebar.classList.remove('active');
                    overlay.classList.remove('active');
                }
            });
        });

        // Definir data mínima como hoje
        const hoje = new Date().toISOString().split('T')[0];
        document.getElementById('data_evento').setAttribute('min', hoje);

        console.log('%c📌 BK EVENTOS - CADASTRO DE EVENTO', 'color: #00ffea; font-size: 24px; font-weight: bold;');
        console.log('%c✨ Sistema de cadastro de eventos!', 'color: #ff007f; font-size: 14px;');
    </script>
</body>
</html>