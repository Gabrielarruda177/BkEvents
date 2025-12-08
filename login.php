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
    <title>Login</title>
    <link rel="stylesheet" href="css/login.css" />
    <link rel="icon" href="img/logo.png" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Raleway&display=swap" rel="stylesheet" />

</head>
<body>
    <div class="fundo">
        <header class="header">
            <a href="./Home.html"><img class="logo" src="./img/logo.png" alt="Logo" /></a>
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

        <section class="banner">
            <div class="container">

            <form method="POST" action="" class="login-form">
                <h2>LOGIN</h2>

                <label for="email">E-mail Cadastrado:</label>
                <input type="email" id="email" name="email" placeholder="Digite seu e-mail" required>

                <label for="senha">Senha Cadastrada:</label>
                <input type="password" id="senha" name="senha" placeholder="Digite sua senha" required>

                <div class="button-group">
                    <button type="submit">Entrar</button>
                    <button type="reset">Limpar</button>
                </div>

                     <!-- Mensagens de erro e sucesso -->
                <?php if ($erro): ?>
                    <p class="mensagem erro"><?= htmlspecialchars($erro) ?></p>
                <?php endif; ?>

                <?php if ($mensagem): ?>
                    <p class="mensagem sucesso"><?= htmlspecialchars($mensagem) ?></p>
                    <script>
                        setTimeout(function () {
                            window.location.href = "<?= $redirect ?>";
                        }, 3000); // redireciona em 3 segundos
                    </script>


                <?php endif; ?>

            </form>
            
            </div>
        </section>


        <footer id="contato">
            <section id="cadastro" class="cadastro">
                <form class="form">
                    <h2 class="h2-contato">Contato</h2>
                    <input type="text" placeholder="Seu nome" required />
                    <input type="email" placeholder="Seu e-mail" required />
                    <button type="submit">Enviar</button>
                </form>

                <a href="https://web.whatsapp.com/"><img src="../BkEvents/img/whatsapp.png" class="icon" alt="Whatsapp" /></a>
                <a href="https://www.instagram.com/"><img src="../BkEvents/img/instagram.png" class="icon" alt="Instagram" /></a>
            </section>

            <p>© 2025 BK Eventos | All Rights Reserved</p>
        </footer>
    </div>
</body>
</html>
