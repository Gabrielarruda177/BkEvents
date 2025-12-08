<?php
session_start();
include 'conexao.php';

// Verifica se o usuário está logado
if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit();
}

// Verifica se os dados foram enviados corretamente
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titulo = $_POST['titulo'];
    $descricao = $_POST['descricao'];
    $data_evento = $_POST['data_evento'];
    $usuario_id = $_SESSION['usuario_id']; // ID do usuário logado

    // Verifica se uma imagem foi enviada
    if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] === UPLOAD_ERR_OK) {
        $imagem_nome = basename($_FILES['imagem']['name']);
        $caminho_destino = 'uploads/' . $imagem_nome;

        // Move o arquivo para a pasta uploads
        if (move_uploaded_file($_FILES['imagem']['tmp_name'], $caminho_destino)) {
            // Salva no banco
            $stmt = $con->prepare("INSERT INTO eventos (titulo, descricao, data_evento, imagem, usuario_id) VALUES (?, ?, ?, ?, ?)");
            $stmt->execute([$titulo, $descricao, $data_evento, $imagem_nome, $usuario_id]);

            $_SESSION['msg_sucesso'] = "Evento cadastrado com sucesso!";
            header("Location: cadastroEvento.php");
            exit();
        } else {
            $_SESSION['msg_erro'] = "Erro ao fazer upload da imagem.";
            header("Location: cadastroEvento.php");
            exit();
        }
    } else {
        $_SESSION['msg_erro'] = "Erro ao enviar a imagem.";
        header("Location: cadastroEvento.php");
        exit();
    }
} else {
    $_SESSION['msg_erro'] = "Requisição inválida.";
    header("Location: cadastroEvento.php");
    exit();
}
?>
