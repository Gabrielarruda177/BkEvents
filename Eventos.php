<?php
session_start();
include 'conexao.php';

if (!isset($_SESSION['usuario_id'])) {
    header('Location: login.php');
    exit();
}

$usuario_id = $_SESSION['usuario_id'];
$usuario_nome = $_SESSION['usuario'];

$stmt = $con->prepare("SELECT * FROM eventos WHERE usuario_id = ?");
$stmt->execute([$usuario_id]);
$eventos = $stmt->fetchAll(PDO::FETCH_ASSOC);

$consultaUsuario = $con->prepare("SELECT * FROM usuarios WHERE nome = ?");
$consultaUsuario->execute([$usuario_nome]);
$dadosUsuario = $consultaUsuario->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Eventos</title>
  <link rel="stylesheet" href="css/eventos.css">
  <link rel="stylesheet" href="css/modalConfirmacao.css">
</head>
<body>
  <!-- Partículas -->
  <canvas id="particles"></canvas>

  <!-- Toggle Menu Mobile -->
  <div class="mobile-toggle" id="mobileToggle">☰</div>

  <!-- Overlay -->
  <div class="overlay" id="overlay"></div>

  <div class="dashboard">
    <aside class="sidebar">
      <h2><a href="dashboard.php">Menu</a></h2>

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

       <nav>
                    <ul>
                        <li><a href="dashboard.php">🏠 Home</a></li>
                        <li><a href="Eventos.php">📁Eventos</a></li>
                        <li><a href="estatisticas.php">📊 Estatísticas</a></li>
                        <li><a href="configuracoes.php">⚙️ Configurações</a></li>
                    </ul>
                </nav>

      <div class="logout">
        <a href="logout.php">🚪 Sair</a>
      </div>
    </aside>

    <div class="main-content">
      <h1>Eventos</h1>
      <div class="create-event">
        <a href="cadastroEvento.php" class="btn-create">Criar Novo Evento</a>
      </div>

      <?php if (count($eventos) > 0): ?>
        <div class="cards-container">
          <?php foreach ($eventos as $evento): ?>
            <div class="card">
              <?php if (!empty($evento['imagem'])): ?>
                <img src="uploads/<?= htmlspecialchars($evento['imagem']) ?>" alt="Imagem do Evento" class="card-img">
              <?php endif; ?>

              <h3><?= htmlspecialchars($evento['titulo']) ?></h3>
              <p><strong>Data:</strong> <?= htmlspecialchars($evento['data_evento']) ?></p>
              <p><?= htmlspecialchars($evento['descricao']) ?></p>

              <div class="card-actions">
                <button class="btn-dots" onclick="toggleDropdown(<?= $evento['id'] ?>)">⋮</button>
                <div id="dropdown-<?= $evento['id'] ?>" class="dropdown-menu">
                  <a href="atualizarEvento.php?id=<?= urlencode($evento['id']) ?>" class="dropdown-item">Editar</a>
                  <form method="POST" action="delete.php" class="dropdown-form">
                    <input type="hidden" name="id" value="<?= htmlspecialchars($evento['id']) ?>" />
                    <button type="submit" class="dropdown-item btn-delete">Excluir</button>
                  </form>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      <?php else: ?>
        <p class="no-event">Você ainda não cadastrou nenhum evento.</p>
      <?php endif; ?>
    </div>
  </div>

  <div id="modalConfirmacao" class="modal">
    <div class="modal-content">
      <h3>Tem certeza que deseja excluir este evento?</h3>
      <div class="modal-buttons">
        <button id="btnConfirmar">OK</button>
        <button id="btnCancelar">Cancelar</button>
      </div>
    </div>
  </div>

  <script src="js/modalConfirmacao.js"></script>
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
    const sidebar = document.querySelector('.sidebar');
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

    // Dropdown dos cards
    function toggleDropdown(eventoId) {
      const dropdown = document.getElementById('dropdown-' + eventoId);
      dropdown.classList.toggle('show');
    }

    // Fechar dropdown se clicar fora
    window.onclick = function(event) {
      if (!event.target.matches('.btn-dots')) {
        const dropdowns = document.getElementsByClassName('dropdown-menu');
        for (let i = 0; i < dropdowns.length; i++) {
          const openDropdown = dropdowns[i];
          if (openDropdown.classList.contains('show')) {
            openDropdown.classList.remove('show');
          }
        }
      }
    }

    console.log('%c🎭 BK EVENTOS - EVENTOS', 'color: #00ffea; font-size: 24px; font-weight: bold;');
    console.log('%c✨ Página de eventos adaptada!', 'color: #ff007f; font-size: 14px;');
  </script>
</body>
</html>
