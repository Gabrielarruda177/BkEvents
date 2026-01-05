<?php
session_start();
include 'conexao.php';

$erro = '';
$mensagem = '';
$classe = '';
$redirect = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email']);
    $senha = trim($_POST['senha']);

    $sql = "SELECT id, nome, senha FROM usuarios WHERE email = ?";
    $stmt = $con->prepare($sql);
    $stmt->execute([$email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        if (password_verify($senha, $user['senha'])) {
            $_SESSION['usuario'] = $user['nome'];
            $_SESSION['usuario_id'] = $user['id']; // 👈 aqui está a "bomba"
            $mensagem = "Login efetuado com sucesso! Você será redirecionado para o painel...";
            $classe = "mensagem sucesso";
            $redirect = "painel.php";
            header("refresh:3;url=$redirect");
        } else {
            $erro = "Senha incorreta.";
            $classe = "mensagem erro";
        }
    } else {
        $erro = "Usuário não encontrado.";
        $classe = "mensagem erro";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Login - BK Eventos</title>
    <link rel="stylesheet" href="css/login.css" />
    <link rel="icon" href="img/logo.png" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Segoe+UI:wght@400;600;700&display=swap" rel="stylesheet" />
</head>
<body>
    <!-- Partículas -->
    <canvas id="particles"></canvas>

    <!-- Header -->
    <header id="header">
        <nav>
            <a href="Home.html" class="logo">BK EVENTOS</a>
            <ul class="nav-links">
                <li><a href="Home.html">Home</a></li>
                <li><a href="galeria.php">Galeria</a></li>
                <li><a href="cadastro.php">Cadastro</a></li>
                <li><a href="login.php">Login</a></li>
            </ul>
            <div class="mobile-menu-btn">☰</div>
        </nav>
    </header>

    <!-- Hero Section -->
    <section class="hero-login">
        <div class="form-container">
            <h2>🔐 LOGIN</h2>
            
            <form id="loginForm" method="POST" action="">
                <div class="form-group">
                    <label for="email">📧 E-mail</label>
                    <input type="email" id="email" name="email" placeholder="Digite seu e-mail" required>
                </div>

                <div class="form-group">
                    <label for="senha">🔒 Senha</label>
                    <div class="password-input-wrapper">
                        <input type="password" id="senha" name="senha" placeholder="Digite sua senha" required>
                        <button type="button" class="toggle-password" id="togglePassword">
                            <span class="eye-icon">👁️</span>
                        </button>
                    </div>
                </div>

                <div class="form-options">
                    <div class="remember-me">
                        <input type="checkbox" id="remember" name="remember">
                        <label for="remember">Lembrar-me</label>
                    </div>
                    <a href="recuperar-senha.php" class="forgot-password">Esqueci minha senha</a>
                </div>

                <button type="submit" class="submit-btn">
                    <span>ENTRAR</span>
                </button>

                <div class="login-link">
                    <p>Ainda não tem uma conta? <a href="cadastro.php">Cadastre-se aqui</a></p>
                </div>

                <!-- Mensagens de erro e sucesso -->
                <?php if ($erro): ?>
                    <div class="message error">
                        <?= htmlspecialchars($erro) ?>
                    </div>
                <?php endif; ?>

                <?php if ($mensagem): ?>
                    <div class="message success">
                        <?= htmlspecialchars($mensagem) ?>
                        <div class="progress-bar">
                            <div class="progress"></div>
                        </div>
                    </div>
                    <script>
                        setTimeout(function () {
                            window.location.href = "<?= $redirect ?>";
                        }, 3000); // redireciona em 3 segundos
                    </script>
                <?php endif; ?>
            </form>
        </div>
    </section>

    <!-- Seção de Contato -->
    <section class="contact-section">
        <div class="contact-content">
            <div class="contact-form-container">
                <h2>💬 Entre em Contato</h2>
                <form id="contactForm">
                    <div class="form-group">
                        <input type="text" placeholder="Seu Nome" required>
                    </div>
                    <div class="form-group">
                        <input type="email" placeholder="Seu E-mail" required>
                    </div>
                    <div class="form-group">
                        <textarea placeholder="Sua Mensagem" rows="4" required></textarea>
                    </div>
                    <button type="submit" class="submit-btn">
                        <span>ENVIAR</span>
                    </button>
                </form>

                <div class="social-links">
                    <div class="social-icon" onclick="window.open('https://web.whatsapp.com/', '_blank')">📱</div>
                    <div class="social-icon" onclick="window.open('https://www.instagram.com/', '_blank')">📸</div>
                    <div class="social-icon">✉️</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <p>© 2025 BK Eventos | Todos os Direitos Reservados | Criando Experiências Inesquecíveis</p>
    </footer>

    <script>
        // Partículas animadas
        const canvas = document.getElementById('particles');
        const ctx = canvas.getContext('2d');
        canvas.width = window.innerWidth;
        canvas.height = window.innerHeight;

        const particles = [];
        const particleCount = 80;

        class Particle {
            constructor() {
                this.x = Math.random() * canvas.width;
                this.y = Math.random() * canvas.height;
                this.size = Math.random() * 2 + 1;
                this.speedX = Math.random() * 2 - 1;
                this.speedY = Math.random() * 2 - 1;
                this.color = Math.random() > 0.5 ? 'rgba(0, 255, 234, 0.5)' : 'rgba(255, 0, 127, 0.5)';
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
                        ctx.strokeStyle = `rgba(0, 255, 234, ${0.2 - distance / 500})`;
                        ctx.lineWidth = 1;
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

        // Header com scroll
        window.addEventListener('scroll', () => {
            const header = document.getElementById('header');
            if (window.scrollY > 50) {
                header.classList.add('scrolled');
            } else {
                header.classList.remove('scrolled');
            }
        });

        // Toggle password visibility
        document.getElementById('togglePassword').addEventListener('click', function() {
            const passwordInput = document.getElementById('senha');
            const eyeIcon = this.querySelector('.eye-icon');
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                eyeIcon.textContent = '🙈';
            } else {
                passwordInput.type = 'password';
                eyeIcon.textContent = '👁️';
            }
        });

        // Form validation
        document.getElementById('loginForm').addEventListener('submit', function(e) {
            const email = document.getElementById('email').value;
            const senha = document.getElementById('senha').value;
            
            if (!email || !senha) {
                e.preventDefault();
                showMessage('Por favor, preencha todos os campos.', 'error');
                return false;
            }
        });

        // Contact form
        document.getElementById('contactForm').addEventListener('submit', function(e) {
            e.preventDefault();
            showMessage('Mensagem enviada com sucesso! Entraremos em contato em breve.', 'success');
            this.reset();
        });

        // Menu mobile
        const mobileMenuBtn = document.querySelector('.mobile-menu-btn');
        const navLinks = document.querySelector('.nav-links');
        
        mobileMenuBtn.addEventListener('click', () => {
            if (navLinks.style.display === 'flex') {
                navLinks.style.display = 'none';
            } else {
                navLinks.style.display = 'flex';
                navLinks.style.position = 'absolute';
                navLinks.style.top = '100%';
                navLinks.style.left = '0';
                navLinks.style.right = '0';
                navLinks.style.background = 'rgba(0, 0, 0, 0.95)';
                navLinks.style.flexDirection = 'column';
                navLinks.style.padding = '2rem';
                navLinks.style.gap = '1.5rem';
            }
        });

        // Show message function
        function showMessage(message, type) {
            const messageDiv = document.createElement('div');
            messageDiv.className = `message ${type}`;
            messageDiv.textContent = message;
            
            const form = document.getElementById('loginForm');
            form.parentNode.insertBefore(messageDiv, form);
            
            setTimeout(() => {
                messageDiv.remove();
            }, 5000);
        }

        // Progress bar animation
        document.addEventListener('DOMContentLoaded', function() {
            const progressBars = document.querySelectorAll('.progress');
            progressBars.forEach(bar => {
                let width = 0;
                const interval = setInterval(() => {
                    if (width >= 100) {
                        clearInterval(interval);
                    } else {
                        width += 3.33; // 100% / 30 seconds (3 seconds * 10)
                        bar.style.width = width + '%';
                    }
                }, 100);
            });
        });

        console.log('%c🔐 BK EVENTOS - LOGIN', 'color: #00ffea; font-size: 24px; font-weight: bold;');
        console.log('%c✨ Sistema de login com segurança avançada!', 'color: #ff007f; font-size: 14px;');
    </script>
</body>
</html>