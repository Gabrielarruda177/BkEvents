<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galeria de Eventos - BK Eventos</title>
    <link rel="stylesheet" href="css/galeria.css"> 
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

    <!-- Hero -->
    <section class="hero-gallery">
        <h1>🎭 GALERIA DE EVENTOS</h1>
    </section>

    <!-- Filtros e Busca -->
    <div class="filter-section">
        <div class="search-box">
            <input type="text" id="searchInput" placeholder="🔍 Buscar eventos...">
        </div>
        <button class="filter-btn active" data-filter="all">Todos</button>
        <button class="filter-btn" data-filter="festival">Festivais</button>
        <button class="filter-btn" data-filter="show">Shows</button>
        <button class="filter-btn" data-filter="upcoming">Em Breve</button>
    </div>

    <!-- Loading -->
    <div class="loading" id="loading">
        <p>⏳ Carregando eventos incríveis...</p>
    </div>

    <!-- Cards Grid -->
    <div class="gallery-container">
        <div class="cards-grid" id="cardsGrid">
            <!-- Card 1 -->
            <div class="event-card" data-category="festival">
                <div class="card-image-container">
                    <img src="https://picsum.photos/seed/lollapalooza/400/250.jpg" alt="Lollapalooza Brasil 2025">
                    <div class="card-badge">FESTIVAL</div>
                </div>
                <div class="card-content">
                    <h3 class="card-title">🎸 Lollapalooza Brasil 2025</h3>
                    <div class="card-info">
                        <div class="card-info-item">
                            <span class="icon">📅</span>
                            <span class="card-date">28, 29 e 30 de Março de 2025</span>
                        </div>
                        <div class="card-info-item">
                            <span class="icon">📍</span>
                            <span>Autódromo de Interlagos, São Paulo</span>
                        </div>
                        <div class="card-info-item">
                            <span class="icon">⏰</span>
                            <span>Portões: 11h | Shows: 12h</span>
                        </div>
                    </div>
                    <p class="card-description">
                        O maior festival de música do Brasil com lineup internacional, gastronomia e experiências únicas!
                    </p>
                    <button class="card-button">
                        <span>GARANTIR INGRESSO</span>
                    </button>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="event-card" data-category="festival">
                <div class="card-image-container">
                    <img src="https://picsum.photos/seed/rockinrio/400/250.jpg" alt="Rock in Rio 2025">
                    <div class="card-badge">FESTIVAL</div>
                </div>
                <div class="card-content">
                    <h3 class="card-title">🤘 Rock in Rio 2025</h3>
                    <div class="card-info">
                        <div class="card-info-item">
                            <span class="icon">📅</span>
                            <span class="card-date">13 a 22 de Setembro de 2025</span>
                        </div>
                        <div class="card-info-item">
                            <span class="icon">📍</span>
                            <span>Parque Olímpico, Rio de Janeiro</span>
                        </div>
                        <div class="card-info-item">
                            <span class="icon">⏰</span>
                            <span>Portões: 14h | Shows: 15h</span>
                        </div>
                    </div>
                    <p class="card-description">
                        O festival mais icônico do mundo volta com grandes nomes da música internacional e nacional!
                    </p>
                    <button class="card-button">
                        <span>GARANTIR INGRESSO</span>
                    </button>
                </div>
            </div>

            <!-- Card 3 -->
            <div class="event-card" data-category="festival">
                <div class="card-image-container">
                    <img src="https://picsum.photos/seed/primaverasound/400/250.jpg" alt="Primavera Sound 2025">
                    <div class="card-badge">FESTIVAL</div>
                </div>
                <div class="card-content">
                    <h3 class="card-title">🌸 Primavera Sound 2025</h3>
                    <div class="card-info">
                        <div class="card-info-item">
                            <span class="icon">📅</span>
                            <span class="card-date">31 de Outubro a 6 de Novembro</span>
                        </div>
                        <div class="card-info-item">
                            <span class="icon">📍</span>
                            <span>Distrito Anhembi, São Paulo</span>
                        </div>
                        <div class="card-info-item">
                            <span class="icon">⏰</span>
                            <span>Programação a divulgar</span>
                        </div>
                    </div>
                    <p class="card-description">
                        Festival indie com artistas alternativos e underground de todo o mundo!
                    </p>
                    <button class="card-button">
                        <span>GARANTIR INGRESSO</span>
                    </button>
                </div>
            </div>

            <!-- Card 4 -->
            <div class="event-card" data-category="festival">
                <div class="card-image-container">
                    <img src="https://picsum.photos/seed/coalafestival/400/250.jpg" alt="Coala Festival 2025">
                    <div class="card-badge">FESTIVAL</div>
                </div>
                <div class="card-content">
                    <h3 class="card-title">🐨 Coala Festival 2025</h3>
                    <div class="card-info">
                        <div class="card-info-item">
                            <span class="icon">📅</span>
                            <span class="card-date">5, 6 e 7 de Setembro de 2025</span>
                        </div>
                        <div class="card-info-item">
                            <span class="icon">📍</span>
                            <span>Memorial da América Latina, SP</span>
                        </div>
                        <div class="card-info-item">
                            <span class="icon">⏰</span>
                            <span>Portões: 13h | Shows: 14h</span>
                        </div>
                    </div>
                    <p class="card-description">
                        Festival com curadoria especial focada em música eletrônica e cultura urbana!
                    </p>
                    <button class="card-button">
                        <span>GARANTIR INGRESSO</span>
                    </button>
                </div>
            </div>

            <!-- Card 5 -->
            <div class="event-card" data-category="festival">
                <div class="card-image-container">
                    <img src="https://picsum.photos/seed/festivaltura/400/250.jpg" alt="Festival Turá 2025">
                    <div class="card-badge">FESTIVAL</div>
                </div>
                <div class="card-content">
                    <h3 class="card-title">🎶 Festival Turá 2025</h3>
                    <div class="card-info">
                        <div class="card-info-item">
                            <span class="icon">📅</span>
                            <span class="card-date">Datas a Confirmar</span>
                        </div>
                        <div class="card-info-item">
                            <span class="icon">📍</span>
                            <span>Parque Ibirapuera, São Paulo</span>
                        </div>
                        <div class="card-info-item">
                            <span class="icon">⏰</span>
                            <span>Em breve</span>
                        </div>
                    </div>
                    <p class="card-description">
                        Celebração da música brasileira com artistas consagrados e emergentes!
                    </p>
                    <button class="card-button">
                        <span>PRÉ-CADASTRO</span>
                    </button>
                </div>
            </div>

            <!-- Card 6 -->
            <div class="event-card" data-category="festival">
                <div class="card-image-container">
                    <img src="https://picsum.photos/seed/queremosfestival/400/250.jpg" alt="Queremos! Festival 2025">
                    <div class="card-badge">FESTIVAL</div>
                </div>
                <div class="card-content">
                    <h3 class="card-title">🎷 Queremos! Festival 2025</h3>
                    <div class="card-info">
                        <div class="card-info-item">
                            <span class="icon">📅</span>
                            <span class="card-date">Datas a Confirmar</span>
                        </div>
                        <div class="card-info-item">
                            <span class="icon">📍</span>
                            <span>Marina da Glória, Rio de Janeiro</span>
                        </div>
                        <div class="card-info-item">
                            <span class="icon">⏰</span>
                            <span>Em breve</span>
                        </div>
                    </div>
                    <p class="card-description">
                        Festival democrático onde o público escolhe os artistas através de votação!
                    </p>
                    <button class="card-button">
                        <span>PRÉ-CADASTRO</span>
                    </button>
                </div>
            </div>

            <!-- Card 7 -->
            <div class="event-card" data-category="festival">
                <div class="card-image-container">
                    <img src="https://picsum.photos/seed/festivalmimo/400/250.jpg" alt="Festival MIMO 2025">
                    <div class="card-badge">FESTIVAL</div>
                </div>
                <div class="card-content">
                    <h3 class="card-title">🎺 Festival MIMO 2025</h3>
                    <div class="card-info">
                        <div class="card-info-item">
                            <span class="icon">📅</span>
                            <span class="card-date">Datas a Confirmar</span>
                        </div>
                        <div class="card-info-item">
                            <span class="icon">📍</span>
                            <span>Rio de Janeiro (locais variados)</span>
                        </div>
                        <div class="card-info-item">
                            <span class="icon">⏰</span>
                            <span>Em breve</span>
                        </div>
                    </div>
                    <p class="card-description">
                        Festival de música instrumental com jazz, blues e música brasileira em diversos pontos da cidade!
                    </p>
                    <button class="card-button">
                        <span>PRÉ-CADASTRO</span>
                    </button>
                </div>
            </div>

            <!-- Card 8 -->
            <div class="event-card" data-category="festival">
                <div class="card-image-container">
                    <img src="https://picsum.photos/seed/riojazzblues/400/250.jpg" alt="Rio das Ostras Jazz & Blues">
                    <div class="card-badge">FESTIVAL</div>
                </div>
                <div class="card-content">
                    <h3 class="card-title">🎷 Rio das Ostras Jazz & Blues</h3>
                    <div class="card-info">
                        <div class="card-info-item">
                            <span class="icon">📅</span>
                            <span class="card-date">19 a 22 de Junho de 2025</span>
                        </div>
                        <div class="card-info-item">
                            <span class="icon">📍</span>
                            <span>Rio das Ostras, RJ</span>
                        </div>
                        <div class="card-info-item">
                            <span class="icon">⏰</span>
                            <span>Shows gratuitos ao longo do dia</span>
                        </div>
                    </div>
                    <p class="card-description">
                        Um dos maiores festivais gratuitos de jazz e blues da América Latina com artistas internacionais!
                    </p>
                    <button class="card-button">
                        <span>ENTRADA GRATUITA</span>
                    </button>
                </div>
            </div>

            <!-- Card 9 -->
            <div class="event-card" data-category="show">
                <div class="card-image-container">
                    <img src="https://picsum.photos/seed/circovoador/400/250.jpg" alt="Circo Voador 2025">
                    <div class="card-badge">SHOW</div>
                </div>
                <div class="card-content">
                    <h3 class="card-title">🎪 Circo Voador 2025</h3>
                    <div class="card-info">
                        <div class="card-info-item">
                            <span class="icon">📅</span>
                            <span class="card-date">10 a 27 de Maio de 2025</span>
                        </div>
                        <div class="card-info-item">
                            <span class="icon">📍</span>
                            <span>Rua dos Arcos, Lapa, RJ</span>
                        </div>
                        <div class="card-info-item">
                            <span class="icon">⏰</span>
                            <span>19h às 23h</span>
                        </div>
                    </div>
                    <p class="card-description">
                        Programação especial com diversos artistas no icônico espaço cultural carioca!
                    </p>
                    <button class="card-button">
                        <span>GARANTIR INGRESSO</span>
                    </button>
                </div>
            </div>

            <!-- Card 10 -->
            <div class="event-card" data-category="show">
                <div class="card-image-container">
                    <img src="https://picsum.photos/seed/atroflamengo/400/250.jpg" alt="Aterro do Flamengo">
                    <div class="card-badge">EVENTO</div>
                </div>
                <div class="card-content">
                    <h3 class="card-title">🎉 Aterro do Flamengo</h3>
                    <div class="card-info">
                        <div class="card-info-item">
                            <span class="icon">📅</span>
                            <span class="card-date">27 de Maio de 2025</span>
                        </div>
                        <div class="card-info-item">
                            <span class="icon">📍</span>
                            <span>Aterro do Flamengo, RJ</span>
                        </div>
                        <div class="card-info-item">
                            <span class="icon">⏰</span>
                            <span>Horários variados</span>
                        </div>
                    </div>
                    <p class="card-description">
                        Grande evento ao ar livre com música, gastronomia e entretenimento para toda a família!
                    </p>
                    <button class="card-button">
                        <span>GARANTIR INGRESSO</span>
                    </button>
                </div>
            </div>

            <!-- Card 11 -->
            <div class="event-card" data-category="show">
                <div class="card-image-container">
                    <img src="https://picsum.photos/seed/systemofadown/400/250.jpg" alt="System of a Down">
                    <div class="card-badge">SHOW</div>
                </div>
                <div class="card-content">
                    <h3 class="card-title">🥁 System of a Down</h3>
                    <div class="card-info">
                        <div class="card-info-item">
                            <span class="icon">📅</span>
                            <span class="card-date">10 e 11 de Maio de 2025</span>
                        </div>
                        <div class="card-info-item">
                            <span class="icon">📍</span>
                            <span>Allianz Parque, São Paulo</span>
                        </div>
                        <div class="card-info-item">
                            <span class="icon">⏰</span>
                            <span>21h</span>
                        </div>
                    </div>
                    <p class="card-description">
                        A lendária banda de metal alternativo retorna ao Brasil para shows épicos no Allianz Parque!
                    </p>
                    <button class="card-button">
                        <span>GARANTIR INGRESSO</span>
                    </button>
                </div>
            </div>

            <!-- Card 12 -->
            <div class="event-card" data-category="show">
                <div class="card-image-container">
                    <img src="https://picsum.photos/seed/shakira/400/250.jpg" alt="Shakira">
                    <div class="card-badge">SHOW</div>
                </div>
                <div class="card-content">
                    <h3 class="card-title">🎵 Shakira</h3>
                    <div class="card-info">
                        <div class="card-info-item">
                            <span class="icon">📅</span>
                            <span class="card-date">13 de Fevereiro de 2025</span>
                        </div>
                        <div class="card-info-item">
                            <span class="icon">📍</span>
                            <span>Estádio do Morumbi, São Paulo</span>
                        </div>
                        <div class="card-info-item">
                            <span class="icon">⏰</span>
                            <span>21h</span>
                        </div>
                    </div>
                    <p class="card-description">
                        A rainha do pop latino traz sua turnê mundial ao Brasil com um show inesquecível!
                    </p>
                    <button class="card-button">
                        <span>GARANTIR INGRESSO</span>
                    </button>
                </div>
            </div>
        </div>

        <!-- Empty State -->
        <div class="empty-state" id="emptyState">
            <h3>🔍 Nenhum evento encontrado</h3>
            <p>Tente ajustar seus filtros ou buscar por outro termo.</p>
        </div>
    </div>

    <!-- Seção de Contato -->
    <section class="contact-info-section">
        <div class="contact-grid">
            <div class="upcoming-events">
                <h2>🎯 Próximos Eventos BK</h2>
                <ul>
                    <li>📍 <strong>Funk no Morro</strong><br>10/06/2025 - São Paulo</li>
                    <li>📍 <strong>Noite do Pancadão</strong><br>24/06/2025 - Rio de Janeiro</li>
                </ul>
            </div>

            <div class="contact-form-container">
                <h2>📧 Entre em Contato</h2>
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
                    <button type="submit" class="card-button">
                        <span>ENVIAR MENSAGEM</span>
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

            // Conectar partículas próximas
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

        // Redimensionar canvas
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

        // Sistema de filtros
        const filterButtons = document.querySelectorAll('.filter-btn');
        const cards = document.querySelectorAll('.event-card');
        const searchInput = document.getElementById('searchInput');
        const emptyState = document.getElementById('emptyState');

        filterButtons.forEach(button => {
            button.addEventListener('click', () => {
                // Remove active de todos
                filterButtons.forEach(btn => btn.classList.remove('active'));
                // Adiciona active no clicado
                button.classList.add('active');
                
                const filter = button.getAttribute('data-filter');
                filterCards(filter);
            });
        });

        function filterCards(filter) {
            let visibleCount = 0;
            
            cards.forEach(card => {
                const category = card.getAttribute('data-category');
                
                if (filter === 'all' || category === filter) {
                    card.style.display = 'block';
                    visibleCount++;
                } else {
                    card.style.display = 'none';
                }
            });

            emptyState.classList.toggle('active', visibleCount === 0);
        }

        // Sistema de busca
        searchInput.addEventListener('input', (e) => {
            const searchTerm = e.target.value.toLowerCase();
            let visibleCount = 0;

            cards.forEach(card => {
                const title = card.querySelector('.card-title').textContent.toLowerCase();
                const description = card.querySelector('.card-description').textContent.toLowerCase();
                const location = card.querySelector('.card-info').textContent.toLowerCase();

                if (title.includes(searchTerm) || description.includes(searchTerm) || location.includes(searchTerm)) {
                    card.style.display = 'block';
                    visibleCount++;
                } else {
                    card.style.display = 'none';
                }
            });

            emptyState.classList.toggle('active', visibleCount === 0);
        });

        // Animação dos botões dos cards
        document.querySelectorAll('.card-button').forEach(button => {
            button.addEventListener('click', (e) => {
                const card = e.target.closest('.event-card');
                const title = card.querySelector('.card-title').textContent;
                
                // Efeito de ripple
                const ripple = document.createElement('span');
                ripple.style.position = 'absolute';
                ripple.style.width = ripple.style.height = '100px';
                ripple.style.background = 'rgba(255, 255, 255, 0.5)';
                ripple.style.borderRadius = '50%';
                ripple.style.transform = 'scale(0)';
                ripple.style.animation = 'ripple 0.6s ease-out';
                
                button.appendChild(ripple);
                
                setTimeout(() => ripple.remove(), 600);
                
                // Alert de sucesso
                alert(`🎉 Interesse registrado em: ${title}\n\nEm breve você receberá mais informações!`);
            });
        });

        // Form submit
        document.getElementById('contactForm').addEventListener('submit', (e) => {
            e.preventDefault();
            alert('✅ Mensagem enviada com sucesso! Entraremos em contato em breve.');
            e.target.reset();
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

        // Scroll suave
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({ behavior: 'smooth', block: 'start' });
                }
            });
        });

        // Adicionar animação CSS para ripple
        const style = document.createElement('style');
        style.textContent = `
            @keyframes ripple {
                to {
                    transform: scale(4);
                    opacity: 0;
                }
            }
        `;
        document.head.appendChild(style);

        // Console customizado
        console.log('%c🎭 BK EVENTOS - GALERIA', 'color: #00ffea; font-size: 24px; font-weight: bold;');
        console.log('%c✨ Galeria com filtros e busca avançada!', 'color: #ff007f; font-size: 14px;');
    </script>
</body>
</html>