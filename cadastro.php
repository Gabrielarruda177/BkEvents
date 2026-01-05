<?php
session_start();

include 'conexao.php';

 $erro = ''; 
 $sucesso = ''; 
 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = trim($_POST['nome'] ?? '');
    $idade = trim($_POST['idade'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $senha = trim($_POST['senha'] ?? '');
    
    if (empty($nome) || empty($idade) || empty($email) || empty($senha)) {
        $erro = "Por favor, preencha todos os campos obrigatórios.";
    } elseif (strlen($nome) < 3) {
        $erro = "O nome deve ter pelo menos 3 caracteres.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $erro = "E-mail inválido.";
    } elseif ($idade < 1 || $idade > 120) {
        $erro = "Idade inválida.";
    } elseif (strlen($senha) < 6) {
        $erro = "A senha deve ter pelo menos 6 caracteres.";
    } else {
        try {
            $sql = "SELECT id FROM usuarios WHERE email = ?";
            $stmt = $con->prepare($sql);
            $stmt->execute([$email]);
            
            if ($stmt->rowCount() > 0) {
                $erro = "Este e-mail já está cadastrado. Tente fazer login.";
            } else {
                $foto_path = '';
                if (isset($_FILES['foto']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK) {
                    $diretorio = 'uploads/perfis/';
                    
                    if (!file_exists($diretorio)) {
                        mkdir($diretorio, 0755, true);
                    }
                    
                    $nome_arquivo = uniqid('perfil_') . '_' . basename($_FILES['foto']['name']);
                    $caminho_completo = $diretorio . $nome_arquivo;
                    
                    if (move_uploaded_file($_FILES['foto']['tmp_name'], $caminho_completo)) {
                        $foto_path = $caminho_completo;
                    }
                }
                
                $senha_hash = password_hash($senha, PASSWORD_DEFAULT);
                
                $sql = "INSERT INTO usuarios (nome, idade, email, senha, foto, data_cadastro) VALUES (?, ?, ?, ?, ?, NOW())";
                $stmt = $con->prepare($sql);
                $stmt->execute([$nome, $idade, $email, $senha_hash, $foto_path]);
                
                $sucesso = "Cadastro realizado com sucesso! Você será redirecionado para a página de login.";
                
                header("refresh:3;url=login.php");
            }
        } catch (PDOException $e) {
            $erro = "Erro ao cadastrar: " . $e->getMessage();
        }
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro - BK Eventos</title>
    <link rel="stylesheet" href="css/cadastro.css">
</head>
<body>
    <canvas id="particles"></canvas>

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

    <section class="hero-cadastro">
        <div class="form-container">
            <h2>🎭 CADASTRO</h2>
            
            <?php if ($erro): ?>
                <div class="message error">
                    <?= htmlspecialchars($erro) ?>
                </div>
            <?php endif; ?>

            <?php if ($sucesso): ?>
                <div class="message success">
                    <?= htmlspecialchars($sucesso) ?>
                    <div class="progress-bar">
                        <div class="progress"></div>
                    </div>
                </div>
            <?php endif; ?>
            
            <form id="cadastroForm" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="nome">📝 Nome Completo</label>
                    <input type="text" id="nome" name="nome" placeholder="Digite seu nome completo..." required>
                </div>

                <div class="form-group">
                    <label for="idade">🎂 Idade</label>
                    <input type="number" id="idade" name="idade" placeholder="Digite sua idade..." min="1" max="120" required>
                </div>

                <div class="form-group">
                    <label for="email">📧 E-mail</label>
                    <input type="email" id="email" name="email" placeholder="seu.email@exemplo.com" required>
                </div>

                <div class="form-group">
                    <label for="senha">🔒 Senha</label>
                    <input type="password" id="senha" name="senha" placeholder="Digite uma senha forte..." required>
                    <div class="password-strength">
                        <div class="password-strength-bar" id="strengthBar"></div>
                    </div>
                </div>

                <div class="photo-upload">
                    <label>📸 Foto de Perfil (Opcional)</label>
                    <div class="photo-preview" id="photoPreview">
                        <p>Sua foto aparecerá aqui</p>
                    </div>
                    <div class="file-input-wrapper">
                        <input type="file" id="foto" name="foto" accept="image/*">
                        <label for="foto" class="file-input-label">
                            Escolher Foto
                        </label>
                    </div>
                </div>

                <button type="submit" class="submit-btn">
                    <span>✨ CRIAR CONTA</span>
                </button>

                <div class="login-link">
                    <p>Já tem uma conta? <a href="login.php">Faça login aqui</a></p>
                </div>
            </form>
        </div>
    </section>

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

    <footer>
        <p>© 2025 BK Eventos | Todos os Direitos Reservados | Criando Experiências Inesquecíveis</p>
    </footer>

    <script>
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

        window.addEventListener('scroll', () => {
            const header = document.getElementById('header');
            if (window.scrollY > 50) {
                header.classList.add('scrolled');
            } else {
                header.classList.remove('scrolled');
            }
        });

        document.getElementById('foto').addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                if (!file.type.match('image.*')) {
                    showError('Por favor, selecione apenas arquivos de imagem.');
                    this.value = '';
                    return;
                }
                
                if (file.size > 5 * 1024 * 1024) {
                    showError('A imagem não pode ser maior que 5MB.');
                    this.value = '';
                    return;
                }
                
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('photoPreview').innerHTML = `<img src="${e.target.result}" alt="Preview">`;
                }
                reader.readAsDataURL(file);
            }
        });

        document.getElementById('senha').addEventListener('input', function(e) {
            const password = e.target.value;
            const strengthBar = document.getElementById('strengthBar');
            
            let strength = 0;
            if (password.length >= 8) strength++;
            if (/[a-z]/.test(password) && /[A-Z]/.test(password)) strength++;
            if (/\d/.test(password)) strength++;
            if (/[^a-zA-Z\d]/.test(password)) strength++;
            
            strengthBar.className = 'password-strength-bar';
            if (strength <= 1) {
                strengthBar.classList.add('strength-weak');
            } else if (strength <= 3) {
                strengthBar.classList.add('strength-medium');
            } else {
                strengthBar.classList.add('strength-strong');
            }
        });

        document.getElementById('cadastroForm').addEventListener('submit', function(e) {
            const nome = document.getElementById('nome').value;
            const idade = document.getElementById('idade').value;
            const email = document.getElementById('email').value;
            const senha = document.getElementById('senha').value;
            
            if (nome.length < 3) {
                e.preventDefault();
                showError('O nome deve ter pelo menos 3 caracteres!');
                return;
            }
            
            if (idade < 1 || idade > 120) {
                e.preventDefault();
                showError('Idade inválida!');
                return;
            }
            
            if (!validateEmail(email)) {
                e.preventDefault();
                showError('E-mail inválido!');
                return;
            }
            
            if (senha.length < 6) {
                e.preventDefault();
                showError('A senha deve ter pelo menos 6 caracteres!');
                return;
            }
        });

        document.getElementById('contactForm').addEventListener('submit', function(e) {
            e.preventDefault();
            showSuccess('Mensagem enviada com sucesso! Entraremos em contato em breve.');
            this.reset();
        });

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

        function validateEmail(email) {
            const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return re.test(email);
        }

        function showSuccess(message) {
            const messageDiv = document.createElement('div');
            messageDiv.className = 'message success';
            messageDiv.textContent = message;
            
            const form = document.getElementById('cadastroForm');
            form.parentNode.insertBefore(messageDiv, form);
            
            setTimeout(() => {
                messageDiv.remove();
            }, 5000);
        }

        function showError(message) {
            const messageDiv = document.createElement('div');
            messageDiv.className = 'message error';
            messageDiv.textContent = message;
            
            const form = document.getElementById('cadastroForm');
            form.parentNode.insertBefore(messageDiv, form);
            
            setTimeout(() => {
                messageDiv.remove();
            }, 5000);
        }

        document.addEventListener('DOMContentLoaded', function() {
            const progressBars = document.querySelectorAll('.progress');
            progressBars.forEach(bar => {
                let width = 0;
                const interval = setInterval(() => {
                    if (width >= 100) {
                        clearInterval(interval);
                    } else {
                        width += 3.33;
                        bar.style.width = width + '%';
                    }
                }, 100);
            });
        });

        console.log('%c📝 BK EVENTOS - CADASTRO', 'color: #00ffea; font-size: 24px; font-weight: bold;');
        console.log('%c✨ Sistema de cadastro com validação avançada!', 'color: #ff007f; font-size: 14px;');
    </script>
</body>
</html>