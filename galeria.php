<?php
   include 'conexao.php';

$consultaEventos = $con->prepare("SELECT * FROM eventos ORDER BY data_evento DESC");
$consultaEventos->execute();
$eventos = $consultaEventos->fetchAll(PDO::FETCH_ASSOC);

?>


<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Galeria de Cards</title>
  <link rel="stylesheet" href="css/galeria.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100..900;1,100..900&display=swap"
    rel="stylesheet">
</head>

<body>
  <header class="header">
    <a href="./Home.html"><img class="logo" src="./img/logo.png" alt="Logo"></a>
 
    
    <div class="navbar">
      <nav>
        <ul class="Navegacao">
          <a href="Home.html">Home</a>
          <a href="galeria.php">Galeria</a>
          <a href="cadastro.php">Cadastro</a>
          <a href="login.php">Login</a>
        </ul>
      </nav>
    </div>
  </header>

  <div class="container">


    <?php foreach ($eventos as $evento): ?>
    <div class="card">
        <h3><?= htmlspecialchars($evento['titulo']) ?></h3>
        <img src="uploads/<?= htmlspecialchars($evento['imagem']) ?>" alt="<?= htmlspecialchars($evento['titulo']) ?>" width="300">
        <p><strong>Data:</strong> <?= htmlspecialchars($evento['data_evento']) ?></p>
        <p><?= nl2br(htmlspecialchars($evento['descricao'])) ?></p>
    </div>
<?php endforeach; ?>

    <!-- Card 1 -->
    <div class="card">
      <img src="./img/lolapalloza.png" alt="Card 1">
      <h5>🎸 Lollapalooza Brasil 2025</h5>
      <p>
        📅 Datas: 28, 29 e 30 de março de 2025<br>
        🎯 Local: Autódromo de Interlagos, São Paulo<br>
        ⏰ Horário: Portões abrem 11h | Shows a partir de 12h</p>

    </div>

    <!-- Card 2 -->
    <div class="card">
      <img src="./img/rock.png" alt="Card 2">
      <h5>🤘 Rock in Rio 2025</h5>
      <p>
        📍 Local: Parque Olímpico, Rio de Janeiro<br>
        📅 Datas: 13 a 22 de setembro de 2025<br>
        ⏰ Horários: Portões abrem às 14h; shows a partir das 15h.</p>
    </div>

    <!-- Card 3 -->
    <div class="card">
      <img src="./img/primaveraSound.png" alt="Card 3">
      <h5>🌸 Primavera Sound São Paulo 2025</h5>
      <p>
        📍 Local: Distrito Anhembi, São Paulo<br>
        📅 Datas: 31 de outubro a 6 de novembro de 2025<br>
        ⏰ Horários: Programação detalhada será divulgada próximo ao evento.</p>
    </div>

    <!-- Card 4 -->
    <div class="card">
      <img src="./img/coala.png" alt="Card 4">
      <h5>🐨 Coala Festival 2025</h5>
      <p>
        📍 Local: Memorial da América Latina, São Paulo<br>
        📅 Datas: 5, 6 e 7 de setembro de 2025<br>
        ⏰ Horários: Portões abrem às 13h; shows a partir das 14h.</p>
    </div>

    <!-- Card 5 -->
    <div class="card">
      <img src="./img/tura.png" alt="Card 5">
      <h5>🎶 Festival Turá 2025</h5>
      <p>
        📍 Local: Parque Ibirapuera, São Paulo<br>
        📅 Datas: Datas a serem confirmadas para 2025<br>
        ⏰ Horários: Programação detalhada será divulgada próximo ao evento.</p>
    </div>

    <!-- Card 6 -->
    <div class="card">
      <img src="./img/queremos.png" alt="Card 6">
      <h5>🎷 Queremos! Festival 2025</h5>
      <p>
        📍 Local: Marina da Glória, Rio de Janeiro<br>
        📅 Datas: Datas a serem confirmadas para 2025<br>
        ⏰ Horários: Programação detalhada será divulgada próximo ao evento.</p>
    </div>

    <!-- Card 7 -->
    <div class="card">
      <img src="./img/mimo.png" alt="Card 7">
      <h5>🎺 Festival MIMO 2025</h5>
      <p>
        📍 Local: Rio de Janeiro (locais variados)<br>
        📅 Datas: Datas a serem confirmadas para 2025<br>
        ⏰ Horários: Programação detalhada será divulgada próximo ao evento.</p>
    </div>

    <!-- Card 8 -->
    <div class="card">
      <img src="./img/riodasostras.png" alt="Card 8">
      <h5>🎷 Rio das Ostras Jazz & Blues Festival 2025</h5>
      <p>
        📍 Local: Rio das Ostras, RJ<br>
        📅 Datas: 19 a 22 de junho de 2025<br>
        ⏰ Horários: Shows gratuitos em diversos horários ao longo do dia.</p>
    </div>

    <!-- Card 9 -->
    <div class="card">
      <img src="./img/circo.png" alt="Card 9">
      <h5>🎪 Circo Voador 2025</h5>
      <p>📍 Local: Rua dos Arcos, Lapa, RJ<br>
        📅 Datas: 10 a 27 de maio de 2025<br>
        ⏰ Horários: 19:00 às 23:00 .</p>
    </div>

    <!-- Card 10 -->
    <div class="card">
      <img src="./img/aterro.png" alt="Card 10">
      <h5>🎉✨ Aterro do Flamengo</h5>
      <p>📍 Local: Rua dos Arcos, Lapa, RJ<br>
        📅 Datas: 27/05.<br>
        ⏰ Horários: A abertura dos portões e os horários dos eventos variam, sendo importante verificar a programação
        específica de cada evento.</p>
    </div>

    <!-- Card 11 -->
    <div class="card">
      <img src="./img/alianz.png" alt="Card 11">
      <h5>🥁 Allianz Parque - System of Dawn</h5>
      <p> 📅 Datas: 10 e 11 de maio de 2025<br>
        ⏰ Horários: 21h00.</p>
    </div>

    <!-- Card 12 -->
    <div class="card">
      <img src="./img/morumbis.png" alt="Card 12">
      <h5>🎵 Estádio do Morumbis - Shakira</h5>
      <p>📅 Datas: 13 de fevereiro de 2025<br>
        ⏰ Horários: 21h00.</p>
    </div>
  </div>
  <div class="info">
    <section id="eventos" class="eventos">
      <h2>Próximos Eventos</h2>
      <ul>
        <li>📍 Funk no Morro - 10/06/2025 - São Paulo</li>
        <li>📍 Noite do Pancadão - 24/06/2025 - Rio de Janeiro</li>
      </ul>
    </section>

    <section id="cadastro" class="cadastro">
      <form>
        <h2 class="h2-contato">Contato</h2>
        <input type="text" placeholder="Seu nome" required>
        <input type="email" placeholder="Seu e-mail" required>
        <button type="submit">Enviar</button>
      </form>

      <!--<a href="https://www.flaticon.com/br/icones-gratis/whatsapp" title="whatsapp ícones">Whatsapp ícones criados por Fathema Khanom - Flaticon</a>-->
      <a href="https://web.whatsapp.com/"><img src="../BkEvents/img/whatsapp.png" class="icon"></a>

      <!--<a href="https://www.flaticon.com/br/icones-gratis/logotipo-do-instagram" title="logotipo do instagram ícones">Logotipo do instagram ícones criados por Laisa Islam Ani - Flaticon</a>-->
      <a href="https://www.instagram.com/"><img src="../BkEvents/img/instagram.png" class="icon"></a>
    </section>
  </div>





  <footer id="contato">
    <p>© 2025 BK Eventos| All Rights Reserved</p>
  </footer>
  </div>

    <script src="js/musica.js"></script>
</body>
</html>