<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header('Location: login.php');
    exit();
}
$usuario = $_SESSION['usuario'];

include 'conexao.php';

$consultaUsuario = $con->prepare("SELECT * FROM usuarios WHERE nome = ?");
$consultaUsuario->execute([$usuario]);
$dadosUsuario = $consultaUsuario->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Cadastrar Evento</title>
    <link rel="stylesheet" href="css/cadastroEvento.css">
</head>
<body>
    <div class="dashboard">
      <aside class="sidebar">
            <h2><a href="dashboard.php">Menu</a></h2>

    <?php if ($dadosUsuario && !empty($dadosUsuario['foto'])) : ?>
        <div class="usuario-sidebar">
            <img src="uploads/<?= htmlspecialchars($dadosUsuario['foto']) ?>" alt="Foto do Usuário" class="foto-perfil">
            <p class="nome-usuario"><strong><?= htmlspecialchars($dadosUsuario['nome']) ?></strong></p>
        </div>
    <?php endif;?>

            
  <ul>
    <li><a href="cadastroEvento.php">📌 Cadastrar Evento</a></li>
    <li><a href="meusEventos.php">📁 Meus Eventos</a></li>
  </ul>

  <div class="logout">
    <a href="logout.php">🚪 Sair</a>
  </div>
</aside>


       <main class="main-content">
  <div class="container-form">
    <h2>Cadastrar Novo Evento</h2>
    <form action="script2.php" method="POST" enctype="multipart/form-data">
      <div class="form-group">
        <label for="titulo">Título:</label>
        <input type="text" name="titulo" required>
      </div>
      <div class="form-group">
        <label for="data_evento">Data do Evento:</label>
        <input type="date" name="data_evento" required>
      </div>
      <div class="form-group">
        <label for="local">Local:</label>
        <input type="text" name="local" required>
      </div>
      <div class="form-group">
        <label for="descricao">Descrição:</label>
        <textarea name="descricao" rows="4" required></textarea>
      </div>
      <div class="form-group">
        <label for="imagem">Imagem:</label>
        <input type="file" name="imagem" accept="image/*" required>
      </div>
      <button type="submit" class="btn">Cadastrar Evento</button>
    </form>

    <?php
    if (isset($_SESSION['msg_sucesso'])) {
        echo "<div class='mensagem sucesso'>{$_SESSION['msg_sucesso']}</div>";
        unset($_SESSION['msg_sucesso']);
    }
    if (isset($_SESSION['msg_erro'])) {
        echo "<div class='mensagem erro'>{$_SESSION['msg_erro']}</div>";
        unset($_SESSION['msg_erro']);
    }
    ?>
  </div>
</main>
    </div>
</body>
