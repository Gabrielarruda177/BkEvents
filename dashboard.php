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
    <title>Dashboard</title>
    <link rel="stylesheet" href="css/dashboard.css">
</head>
<body>
    <div class="dashboard">
       <!-- Menu Lateral -->
<aside class="sidebar">
    <h2>Menu</h2>

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


        <!-- Conteúdo principal -->
        <main class="main-content">
            <h1>Bem-vindo(a), <?php echo $usuario; ?>!</h1>
            <p>Este é o seu painel de controle. Aqui você pode gerenciar seus eventos, visualizar detalhes e muito mais.</p>
            <div class="info-boxes">
                <div class="info-box">
                    <h3>Gerencie seus eventos</h3>
                    <p>Cadastre, edite e visualize todos os eventos que você organizou.</p>
                </div>
                <div class="info-box">
                    <h3>Organização facilitada</h3>
                    <p>Tenha controle total sobre as datas, locais e descrições dos seus eventos.</p>
                </div>
            </div>
        </main>
    </div>
</body>
</html>
