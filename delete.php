<?php
session_start();
include 'conexao.php';

if (!isset($_SESSION['usuario_id'])) {
    header('Location: login.php');
    exit();
}

$usuario_id = $_SESSION['usuario_id'];
$mensagem = '';
$tipo = '';

if (isset($_POST['id'])) {
    $id = $_POST['id'];

    $stmt = $con->prepare("SELECT * FROM eventos WHERE id = ? AND usuario_id = ?");
    $stmt->execute([$id, $usuario_id]);
    $evento = $stmt->fetch();

    if ($evento) {
        if (!empty($evento['imagem']) && file_exists('uploads/' . $evento['imagem'])) {
            unlink('uploads/' . $evento['imagem']);
        }

        $stmt = $con->prepare("DELETE FROM eventos WHERE id = ? AND usuario_id = ?");
        $stmt->execute([$id, $usuario_id]);

        $mensagem = "Evento excluído com sucesso!";
        $tipo = 'sucesso';
    } else {
        $mensagem = "Você não tem permissão para excluir este evento ou o evento não existe.";
        $tipo = 'erro';
    }
} else {
    $mensagem = "ID do evento não fornecido.";
    $tipo = 'erro';
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Excluir Evento</title>
  <link rel="stylesheet" href="css/delete.css">
  <meta http-equiv="refresh" content="3;url=meusEventos.php">
</head>
<body>
  <div class="container">
    <div class="mensagem <?= htmlspecialchars($tipo) ?>">
      <h2><?= htmlspecialchars($mensagem) ?></h2>
      <p>Redirecionando para a listagem de eventos...</p>
      <p><a href="meusEventos.php">Clique aqui para voltar imediatamente</a></p>
    </div>
  </div>
</body>
</html>
