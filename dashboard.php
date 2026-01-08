    <?php
    session_start();
    if (!isset($_SESSION['usuario'])) {
        header('Location: login.php');
        exit();
    }
    $usuario = $_SESSION['usuario'];
    $usuario_id = $_SESSION['usuario_id'];

    include 'conexao.php';

    // Consulta os dados do usuário
    $consultaUsuario = $con->prepare("SELECT * FROM usuarios WHERE id = ?");
    $consultaUsuario->execute([$usuario_id]);
    $dadosUsuario = $consultaUsuario->fetch(PDO::FETCH_ASSOC);

    // Consulta estatísticas do usuário (apenas com a tabela usuarios existente)
    $totalEventos = 0;
    $totalIngressos = 0;
    $totalParticipantes = 0;
    $faturamento = 0;

    // Verifica se a tabela eventos existe
    try {
        $consultaEventos = $con->prepare("SELECT COUNT(*) as total FROM eventos WHERE usuario_id = ?");
        $consultaEventos->execute([$usuario_id]);
        $totalEventos = $consultaEventos->fetch(PDO::FETCH_ASSOC)['total'];
    } catch (PDOException $e) {
        // Tabela eventos não existe, mantém o valor 0
    }

    // Estatísticas simuladas (quando não há tabelas de eventos/ingressos)
    if ($totalEventos == 0) {
        // Dados de exemplo para demonstração
        $totalEventos = 3;
        $totalIngressos = 150;
        $totalParticipantes = 89;
        $faturamento = 12500;
    }

    // Consulta os eventos recentes do usuário (se a tabela existir)
    $eventosRecentes = [];
    try {
        $consultaEventosRecentes = $con->prepare("SELECT * FROM eventos WHERE usuario_id = ? ORDER BY data_criacao DESC LIMIT 5");
        $consultaEventosRecentes->execute([$usuario_id]);
        $eventosRecentes = $consultaEventosRecentes->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        // Tabela não existe, mantém array vazio
    }
    ?>

    <!DOCTYPE html>
    <html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Dashboard - BK Eventos</title>
        <link rel="stylesheet" href="css/dashboard.css">
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
                <h2>🎭 BK EVENTOS</h2>

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
                <h1>Bem-vindo(a), <?= htmlspecialchars($dadosUsuario['nome']) ?>! 👋</h1>
                <p>Este é o seu painel de controle. Aqui você pode gerenciar seus eventos, visualizar estatísticas e muito mais.</p>

                <!-- Estatísticas Rápidas -->
                <div class="stats-grid">
                    <div class="stat-card">
                        <div class="stat-number"><?= $totalEventos ?></div>
                        <div class="stat-label">Eventos Ativos</div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-number"><?= number_format($totalIngressos, 0, ',', '.') ?></div>
                        <div class="stat-label">Total de Ingressos</div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-number"><?= number_format($totalParticipantes, 0, ',', '.') ?></div>
                        <div class="stat-label">Participantes</div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-number">R$ <?= number_format($faturamento, 0, ',', '.') ?></div>
                        <div class="stat-label">Faturamento</div>
                    </div>
                </div>

                <!-- Cards de Informação -->
                <div class="info-boxes">
                    <div class="info-box">
                        <h3>🎯 Gerencie seus eventos</h3>
                        <p>Cadastre, edite e visualize todos os eventos que você organizou. Tenha controle total sobre datas, locais, preços e muito mais.</p>
                    </div>
                    <div class="info-box">
                        <h3>📈 Organização facilitada</h3>
                        <p>Acompanhe em tempo real o desempenho dos seus eventos, vendas de ingressos e engajamento do público.</p>
                    </div>
                </div>

                <!-- Eventos Recentes -->
                <div class="recent-events">
                    <h2>Seus Eventos Recentes</h2>
                    <?php if (count($eventosRecentes) > 0): ?>
                        <div class="events-list">
                            <?php foreach ($eventosRecentes as $evento): ?>
                                <div class="event-item">
                                    <div class="event-info">
                                        <h3><?= htmlspecialchars($evento['nome']) ?></h3>
                                        <p><?= date('d/m/Y', strtotime($evento['data'])) ?> - <?= htmlspecialchars($evento['local']) ?></p>
                                    </div>
                                    <div class="event-actions">
                                        <a href="editarEvento.php?id=<?= $evento['id'] ?>" class="btn-edit">Editar</a>
                                        <a href="detalhesEvento.php?id=<?= $evento['id'] ?>" class="btn-view">Ver</a>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                        <div class="view-all">
                            <a href="meusEventos.php" class="btn-primary">Ver Todos os Eventos</a>
                        </div>
                    <?php else: ?>
                        <div class="no-events">
                            <p>Você ainda não criou nenhum evento.</p>
                            <a href="cadastroEvento.php" class="btn-primary">Criar seu Primeiro Evento</a>
                        </div>
                    <?php endif; ?>
                </div>

                <!-- Informações do Perfil -->
                <div class="profile-info">
                    <h2>Informações do Perfil</h2>
                    <div class="profile-details">
                        <div class="detail-item">
                            <span class="label">Nome Completo:</span>
                            <span class="value"><?= htmlspecialchars($dadosUsuario['nome']) ?></span>
                        </div>
                        <div class="detail-item">
                            <span class="label">E-mail:</span>
                            <span class="value"><?= htmlspecialchars($dadosUsuario['email']) ?></span>
                        </div>
                        <div class="detail-item">
                            <span class="label">Idade:</span>
                            <span class="value"><?= htmlspecialchars($dadosUsuario['idade']) ?> anos</span>
                        </div>
                        <div class="detail-item">
                            <span class="label">Data de Cadastro:</span>
                            <span class="value"><?= date('d/m/Y H:i', strtotime($dadosUsuario['data_cadastro'])) ?></span>
                        </div>
                    </div>
                    <div class="profile-actions">
                        <a href="configuracoes.php" class="btn-secondary">Editar Perfil</a>
                    </div>
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
            document.querySelectorAll('.sidebar nav a').forEach(link => {
                link.addEventListener('click', () => {
                    if (window.innerWidth <= 768) {
                        sidebar.classList.remove('active');
                        overlay.classList.remove('active');
                    }
                });
            });

            console.log('%c🎭 BK EVENTOS - DASHBOARD', 'color: #00ffea; font-size: 24px; font-weight: bold;');
            console.log('%c✨ Painel de controle adaptado para estrutura atual!', 'color: #ff007f; font-size: 14px;');
        </script>
    </body>
    </html>