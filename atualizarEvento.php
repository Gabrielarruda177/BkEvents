<?php
session_start();
include 'conexao.php';

if (!isset($_SESSION['usuario_id'])) {
    header('Location: login.php');
    exit();
}

$usuario = $_SESSION['usuario_id']; // Mantém o ID
$id = $_GET['id']; // Apenas uma vez

$mensagem_sucesso = '';

// Buscar evento atual
$stmt = $con->prepare("SELECT * FROM eventos WHERE id = ? AND usuario_id = ?");
$stmt->execute([$id, $usuario]);
$evento = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$evento) {
    echo "Evento não encontrado ou você não tem permissão para editá-lo.<br>";
    echo "ID do evento: " . htmlspecialchars($id) . "<br>";
    echo "ID do usuário logado: " . htmlspecialchars($usuario);
    exit;
}

// Atualizar evento
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titulo = $_POST['titulo'];
    $data_evento = $_POST['data_evento'];
    $descricao = $_POST['descricao'];
    $imagem_atual = $evento['imagem'];

    // Upload de nova imagem, se enviada
    if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] === 0) {
        $extensoes_permitidas = ['jpg', 'jpeg', 'png', 'gif'];
        $extensao = strtolower(pathinfo($_FILES['imagem']['name'], PATHINFO_EXTENSION));

        if (!in_array($extensao, $extensoes_permitidas)) {
            echo "Tipo de arquivo inválido.";
            exit;
        }

        $novo_nome = uniqid('img_') . '.' . $extensao;
        $caminho = 'uploads/' . $novo_nome;

        if (move_uploaded_file($_FILES['imagem']['tmp_name'], $caminho)) {
            if (!empty($imagem_atual) && file_exists('uploads/' . $imagem_atual)) {
                unlink('uploads/' . $imagem_atual);
            }
            $imagem_final = $novo_nome;
        } else {
            echo "Erro ao fazer upload da nova imagem.";
            exit;
        }
    } else {
        $imagem_final = $imagem_atual;
    }

    // Atualiza o evento
    $stmt = $con->prepare("UPDATE eventos SET titulo = ?, data_evento = ?, descricao = ?, imagem = ? WHERE id = ? AND usuario_id = ?");
    $stmt->execute([$titulo, $data_evento, $descricao, $imagem_final, $id, $usuario]);

    $mensagem_sucesso = "Evento atualizado com sucesso!";

    // Atualiza os dados do evento carregado na tela
    $stmt = $con->prepare("SELECT * FROM eventos WHERE id = ? AND usuario_id = ?");
    $stmt->execute([$id, $usuario]);
    $evento = $stmt->fetch(PDO::FETCH_ASSOC);
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Meus Eventos</title>
  <link rel="stylesheet" href="css/atualizarEvento.css">
</head>
<body>
  <div class="dashboard">
    <!-- Menu Lateral -->
    <aside class="sidebar">
      <h2><a href="dashboard.php">Menu</a></h2>
      <ul>
        <li><a href="cadastroEvento.php">📌 Cadastrar Evento</a></li>
        <li><a href="meusEventos.php">📁 Meus Eventos</a></li>
      </ul>
      <div class="logout">
        <a href="logout.php">🚪 Sair</a>
      </div>
    </aside>

    <!-- Conteúdo principal -->
    <div class="container">
      <h2 class="tittle">Atualizar Evento</h2>

      <?php if ($mensagem_sucesso): ?>
        <div class="mensagem sucesso"><?= htmlspecialchars($mensagem_sucesso) ?></div>
        <script>
          setTimeout(function() {
            window.location.href = 'dashboard.php';
          }, 3000);
        </script>
      <?php endif; ?>

      <div class="cards-container">
        <div class="card">
          <div class="card-content">
            <form method="POST" enctype="multipart/form-data">
              <div class="form-group">
                <label for="titulo">Título:</label>
                <input type="text" name="titulo" value="<?= htmlspecialchars($evento['titulo']) ?>" required />
              </div>

              <div class="form-group">
                <label for="data_evento">Data:</label>
                <input type="date" name="data_evento" value="<?= htmlspecialchars($evento['data_evento']) ?>" required />
              </div>

              <div class="form-group">
                <label for="descricao">Descrição:</label>
                <textarea name="descricao" required><?= htmlspecialchars($evento['descricao']) ?></textarea>
              </div>

              <div class="form-group">
                <label>Imagem atual:</label><br />
                <img src="uploads/<?= htmlspecialchars($evento['imagem']) ?>" alt="Imagem atual" class="card-img" />
              </div>

              <div class="form-group">
                <label for="imagem">Escolher nova imagem (opcional):</label>
                <input type="file" name="imagem" accept="image/*" id="inputImagem" />
              </div>

              <button type="submit" class="btn-edit">Salvar Alterações</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
