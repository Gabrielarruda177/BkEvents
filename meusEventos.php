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
  <title>Meus Eventos</title>
  <link rel="stylesheet" href="css/meusEventos.css">
  <link rel="stylesheet" href="css/modalConfirmacao.css">
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
      <?php endif; ?>

      <nav>
        <ul>
          <li><a href="cadastroEvento.php">📌 Cadastrar Evento</a></li>
          <li><a href="meusEventos.php">📁 Meus Eventos</a></li>
        </ul>
      </nav>

      <div class="logout">
        <a href="logout.php">🚪 Sair</a>
      </div>
    </aside>

    <div class="main-content">
      <h1>Meus Eventos</h1>

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

              <div class="actions">
                <a href="atualizarEvento.php?id=<?= urlencode($evento['id']) ?>" class="btn-edit">Editar</a>

                <form method="POST" action="delete.php" class="form-excluir">
                  <input type="hidden" name="id" value="<?= htmlspecialchars($evento['id']) ?>" />
                  <button type="submit" class="btn-delete">Excluir</button>
                </form>
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
</body>
</html>
