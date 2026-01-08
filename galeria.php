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
            <div class="event-card" data-category="festival" data-event-id="1" data-event-name="Lollapalooza Brasil 2025" data-event-price="350.00">
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
                    <button class="card-button buy-ticket-btn">
                        <span>COMPRAR INGRESSO</span>
                    </button>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="event-card" data-category="festival" data-event-id="2" data-event-name="Rock in Rio 2025" data-event-price="450.00">
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
                    <button class="card-button buy-ticket-btn">
                        <span>COMPRAR INGRESSO</span>
                    </button>
                </div>
            </div>

            <!-- Card 3 -->
            <div class="event-card" data-category="festival" data-event-id="3" data-event-name="Primavera Sound 2025" data-event-price="280.00">
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
                    <button class="card-button buy-ticket-btn">
                        <span>COMPRAR INGRESSO</span>
                    </button>
                </div>
            </div>

            <!-- Card 4 -->
            <div class="event-card" data-category="festival" data-event-id="4" data-event-name="Coala Festival 2025" data-event-price="220.00">
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
                    <button class="card-button buy-ticket-btn">
                        <span>COMPRAR INGRESSO</span>
                    </button>
                </div>
            </div>

            <!-- Card 5 -->
            <div class="event-card" data-category="festival" data-event-id="5" data-event-name="Festival Turá 2025" data-event-price="180.00">
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
                    <button class="card-button buy-ticket-btn">
                        <span>PRÉ-CADASTRO</span>
                    </button>
                </div>
            </div>

            <!-- Card 6 -->
            <div class="event-card" data-category="festival" data-event-id="6" data-event-name="Queremos! Festival 2025" data-event-price="150.00">
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
                    <button class="card-button buy-ticket-btn">
                        <span>PRÉ-CADASTRO</span>
                    </button>
                </div>
            </div>

            <!-- Card 7 -->
            <div class="event-card" data-category="festival" data-event-id="7" data-event-name="Festival MIMO 2025" data-event-price="120.00">
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
                    <button class="card-button buy-ticket-btn">
                        <span>PRÉ-CADASTRO</span>
                    </button>
                </div>
            </div>

            <!-- Card 8 -->
            <div class="event-card" data-category="festival" data-event-id="8" data-event-name="Rio das Ostras Jazz & Blues" data-event-price="0.00">
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
                    <button class="card-button buy-ticket-btn">
                        <span>RESERVAR INGRESSO</span>
                    </button>
                </div>
            </div>

            <!-- Card 9 -->
            <div class="event-card" data-category="show" data-event-id="9" data-event-name="Circo Voador 2025" data-event-price="80.00">
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
                    <button class="card-button buy-ticket-btn">
                        <span>COMPRAR INGRESSO</span>
                    </button>
                </div>
            </div>

            <!-- Card 10 -->
            <div class="event-card" data-category="show" data-event-id="10" data-event-name="Aterro do Flamengo" data-event-price="0.00">
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
                    <button class="card-button buy-ticket-btn">
                        <span>RESERVAR INGRESSO</span>
                    </button>
                </div>
            </div>

            <!-- Card 11 -->
            <div class="event-card" data-category="show" data-event-id="11" data-event-name="System of a Down" data-event-price="320.00">
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
                    <button class="card-button buy-ticket-btn">
                        <span>COMPRAR INGRESSO</span>
                    </button>
                </div>
            </div>

            <!-- Card 12 -->
            <div class="event-card" data-category="show" data-event-id="12" data-event-name="Shakira" data-event-price="380.00">
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
                    <button class="card-button buy-ticket-btn">
                        <span>COMPRAR INGRESSO</span>
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

    <!-- Modal de Compra de Ingressos -->
    <div id="ticketModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h2>COMPRAR INGRESSOS</h2>
                <span class="close">&times;</span>
            </div>
            <div class="modal-body">
                <div class="event-info-modal">
                    <img id="modalEventImage" src="" alt="">
                    <div class="event-details-modal">
                        <h3 id="modalEventName"></h3>
                        <p id="modalEventDate"></p>
                        <p id="modalEventLocation"></p>
                    </div>
                </div>

                <form id="ticketForm" class="ticket-form">
                    <input type="hidden" id="eventId" name="eventId">
                    
                    <div class="form-group">
                        <label for="ticketType">Tipo de Ingresso</label>
                        <select id="ticketType" name="ticketType">
                            <option value="normal">Normal</option>
                            <option value="vip">VIP</option>
                            <option value="meia-entrada">Meia-entrada</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="quantity">Quantidade</label>
                        <div class="quantity-selector">
                            <button type="button" class="quantity-btn" id="decreaseQty">-</button>
                            <input type="number" id="quantity" name="quantity" class="quantity-input" value="1" min="1" max="10" readonly>
                            <button type="button" class="quantity-btn" id="increaseQty">+</button>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Forma de Pagamento</label>
                        <div class="payment-methods">
                            <div class="payment-method selected" data-payment="credit">
                                <i>💳</i>
                                <span>Cartão</span>
                            </div>
                            <div class="payment-method" data-payment="pix">
                                <i>📱</i>
                                <span>Pix</span>
                            </div>
                            <div class="payment-method" data-payment="boleto">
                                <i>📄</i>
                                <span>Boleto</span>
                            </div>
                        </div>
                    </div>

                    <div class="price-summary">
                        <div>
                            <h3>Total</h3>
                            <p id="ticketPrice">R$ 0,00</p>
                        </div>
                        <div>
                            <p id="totalPrice">R$ 0,00</p>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn-cancel" id="cancelPurchase">Cancelar</button>
                <button type="button" class="btn-purchase" id="confirmPurchase">Finalizar Compra</button>
            </div>
        </div>
    </div>

    <!-- Seção de Meus Ingressos -->
    <section class="my-tickets" id="myTickets">
        <h2>🎟️ MEUS INGRESSOS</h2>
        <div class="tickets-grid" id="ticketsGrid">
            <!-- Os ingressos serão carregados aqui via JavaScript/PHP -->
            <div class="no-tickets">
                <i>🎫</i>
                <p>Você ainda não comprou nenhum ingresso.</p>
                <p>Compre ingressos para os eventos acima e eles aparecerão aqui!</p>
            </div>
        </div>
    </section>

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

        // Modal de Compra de Ingressos
        const modal = document.getElementById('ticketModal');
        const modalEventName = document.getElementById('modalEventName');
        const modalEventDate = document.getElementById('modalEventDate');
        const modalEventLocation = document.getElementById('modalEventLocation');
        const modalEventImage = document.getElementById('modalEventImage');
        const eventIdInput = document.getElementById('eventId');
        const ticketTypeSelect = document.getElementById('ticketType');
        const quantityInput = document.getElementById('quantity');
        const ticketPriceElement = document.getElementById('ticketPrice');
        const totalPriceElement = document.getElementById('totalPrice');
        const decreaseBtn = document.getElementById('decreaseQty');
        const increaseBtn = document.getElementById('increaseQty');
        const confirmBtn = document.getElementById('confirmPurchase');
        const cancelBtn = document.getElementById('cancelPurchase');
        const closeModal = document.querySelector('.close');
        
        let currentEventPrice = 0;
        let selectedPaymentMethod = 'credit';

        // Adicionar evento de clique aos botões de compra
        document.querySelectorAll('.buy-ticket-btn').forEach(button => {
            button.addEventListener('click', function() {
                const card = this.closest('.event-card');
                const eventId = card.getAttribute('data-event-id');
                const eventName = card.getAttribute('data-event-name');
                const eventPrice = parseFloat(card.getAttribute('data-event-price'));
                
                // Preencher informações do modal
                eventIdInput.value = eventId;
                modalEventName.textContent = eventName;
                modalEventDate.textContent = card.querySelector('.card-date').textContent;
                modalEventLocation.textContent = card.querySelector('.card-info-item:nth-child(2) span:nth-child(2)').textContent;
                modalEventImage.src = card.querySelector('.card-image-container img').src;
                
                // Definir preço inicial
                currentEventPrice = eventPrice;
                updatePrice();
                
                // Resetar formulário
                quantityInput.value = 1;
                ticketTypeSelect.value = 'normal';
                document.querySelectorAll('.payment-method').forEach(el => el.classList.remove('selected'));
                document.querySelector('.payment-method[data-payment="credit"]').classList.add('selected');
                selectedPaymentMethod = 'credit';
                
                // Abrir modal
                modal.style.display = 'block';
            });
        });

        // Fechar modal
        closeModal.addEventListener('click', () => {
            modal.style.display = 'none';
        });

        cancelBtn.addEventListener('click', () => {
            modal.style.display = 'none';
        });

        window.addEventListener('click', (event) => {
            if (event.target === modal) {
                modal.style.display = 'none';
            }
        });

        // Controles de quantidade
        decreaseBtn.addEventListener('click', () => {
            const currentValue = parseInt(quantityInput.value);
            if (currentValue > 1) {
                quantityInput.value = currentValue - 1;
                updatePrice();
            }
        });

        increaseBtn.addEventListener('click', () => {
            const currentValue = parseInt(quantityInput.value);
            if (currentValue < 10) {
                quantityInput.value = currentValue + 1;
                updatePrice();
            }
        });

        // Seleção de método de pagamento
        document.querySelectorAll('.payment-method').forEach(method => {
            method.addEventListener('click', () => {
                document.querySelectorAll('.payment-method').forEach(el => el.classList.remove('selected'));
                method.classList.add('selected');
                selectedPaymentMethod = method.getAttribute('data-payment');
            });
        });

        // Atualizar preço
        function updatePrice() {
            const quantity = parseInt(quantityInput.value);
            const ticketType = ticketTypeSelect.value;
            let priceMultiplier = 1;
            
            if (ticketType === 'vip') {
                priceMultiplier = 1.8;
            } else if (ticketType === 'meia-entrada') {
                priceMultiplier = 0.5;
            }
            
            const unitPrice = currentEventPrice * priceMultiplier;
            const totalPrice = unitPrice * quantity;
            
            ticketPriceElement.textContent = `R$ ${unitPrice.toFixed(2).replace('.', ',')}`;
            totalPriceElement.textContent = `R$ ${totalPrice.toFixed(2).replace('.', ',')}`;
        }

        ticketTypeSelect.addEventListener('change', updatePrice);

        // Confirmar compra
        confirmBtn.addEventListener('click', () => {
            const eventId = eventIdInput.value;
            const quantity = quantityInput.value;
            const ticketType = ticketTypeSelect.value;
            
            // Simulação de envio para o servidor
            // Em um ambiente real, aqui seria feita uma requisição AJAX para o backend
            
            // Gerar código do ingresso
            const ticketCode = generateTicketCode();
            
            // Criar objeto com os dados do ingresso
            const ticketData = {
                eventId: eventId,
                eventName: modalEventName.textContent,
                eventDate: modalEventDate.textContent,
                eventLocation: modalEventLocation.textContent,
                quantity: quantity,
                ticketType: ticketType,
                totalPrice: totalPriceElement.textContent,
                ticketCode: ticketCode,
                purchaseDate: new Date().toLocaleDateString('pt-BR'),
                paymentMethod: selectedPaymentMethod
            };
            
            // Salvar no localStorage (simulando salvamento no banco)
            saveTicketToUser(ticketData);
            
            // Fechar modal
            modal.style.display = 'none';
            
            // Mostrar mensagem de sucesso
            showNotification('Compra realizada com sucesso! Seu ingresso foi adicionado à sua lista.', 'success');
            
            // Atualizar a seção de ingressos
            loadUserTickets();
        });

        // Gerar código do ingresso
        function generateTicketCode() {
            const chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
            let code = '';
            for (let i = 0; i < 10; i++) {
                code += chars.charAt(Math.floor(Math.random() * chars.length));
            }
            return code;
        }

        // Salvar ingresso para o usuário
        function saveTicketToUser(ticketData) {
            // Obter ingressos existentes ou criar array vazio
            let userTickets = JSON.parse(localStorage.getItem('userTickets')) || [];
            
            // Adicionar novo ingresso
            userTickets.push(ticketData);
            
            // Salvar no localStorage
            localStorage.setItem('userTickets', JSON.stringify(userTickets));
        }

        // Carregar ingressos do usuário
        function loadUserTickets() {
            const ticketsGrid = document.getElementById('ticketsGrid');
            const userTickets = JSON.parse(localStorage.getItem('userTickets')) || [];
            
            if (userTickets.length === 0) {
                ticketsGrid.innerHTML = `
                    <div class="no-tickets">
                        <i>🎫</i>
                        <p>Você ainda não comprou nenhum ingresso.</p>
                        <p>Compre ingressos para os eventos acima e eles aparecerão aqui!</p>
                    </div>
                `;
                return;
            }
            
            ticketsGrid.innerHTML = '';
            
            userTickets.forEach(ticket => {
                const ticketCard = document.createElement('div');
                ticketCard.className = 'ticket-card';
                ticketCard.innerHTML = `
                    <div class="ticket-header">
                        <h3>${ticket.eventName}</h3>
                    </div>
                    <div class="ticket-body">
                        <div class="ticket-info">
                            <i>📅</i>
                            <span>${ticket.eventDate}</span>
                        </div>
                        <div class="ticket-info">
                            <i>📍</i>
                            <span>${ticket.eventLocation}</span>
                        </div>
                        <div class="ticket-info">
                            <i>🎟️</i>
                            <span>${ticket.quantity}x ${ticket.ticketType}</span>
                        </div>
                        <div class="ticket-info">
                            <i>💰</i>
                            <span>${ticket.totalPrice}</span>
                        </div>
                        <div class="ticket-code">
                            ${ticket.ticketCode}
                        </div>
                        <div class="ticket-actions">
                            <a href="#" class="btn-ticket">Ver Detalhes</a>
                            <a href="#" class="btn-ticket">Baixar PDF</a>
                        </div>
                    </div>
                `;
                ticketsGrid.appendChild(ticketCard);
            });
        }

        // Sistema de notificações
        function showNotification(message, type) {
            const notification = document.createElement('div');
            notification.className = `notification ${type}`;
            notification.textContent = message;
            
            document.body.appendChild(notification);
            
            setTimeout(() => {
                notification.classList.add('show');
            }, 10);
            
            setTimeout(() => {
                notification.classList.remove('show');
                setTimeout(() => {
                    document.body.removeChild(notification);
                }, 300);
            }, 3000);
        }

        // Form submit
        document.getElementById('contactForm').addEventListener('submit', (e) => {
            e.preventDefault();
            showNotification('✅ Mensagem enviada com sucesso! Entraremos em contato em breve.', 'success');
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

        // Adicionar estilos CSS para notificações
        const style = document.createElement('style');
        style.textContent = `
            .notification {
                position: fixed;
                top: 100px;
                right: 20px;
                padding: 15px 25px;
                border-radius: 10px;
                color: white;
                font-weight: 600;
                z-index: 2000;
                transform: translateX(120%);
                transition: transform 0.3s ease;
            }
            
            .notification.success {
                background: linear-gradient(135deg, rgba(0, 255, 234, 0.8), rgba(0, 255, 234, 0.6));
                border-left: 4px solid #00ffea;
            }
            
            .notification.error {
                background: linear-gradient(135deg, rgba(255, 0, 127, 0.8), rgba(255, 0, 127, 0.6));
                border-left: 4px solid #ff007f;
            }
            
            .notification.show {
                transform: translateX(0);
            }
        `;
        document.head.appendChild(style);

        // Carregar ingressos do usuário ao carregar a página
        document.addEventListener('DOMContentLoaded', () => {
            loadUserTickets();
        });

        // Console customizado
        console.log('%c🎭 BK EVENTOS - GALERIA', 'color: #00ffea; font-size: 24px; font-weight: bold;');
        console.log('%c✨ Galeria com sistema de compra de ingressos!', 'color: #ff007f; font-size: 14px;');
    </script>
</body>
</html>