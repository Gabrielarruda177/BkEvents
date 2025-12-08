<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela de Cadastro</title>
    <script src="js/valida.js"></script> 
    <link rel="stylesheet" href="css/cadastro.css">
    <link rel="icon" href="../BkEvents/img/logo.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>
<body>

    <div class="fundo"> 
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

        <section class="banner">
            <div class="container">
                <form class="form" action="script.php" method="POST" enctype="multipart/form-data" onsubmit="return validarFormulario()">
                    <h2 class="h2">CADASTRO</h2>
                    
                    <p><label for="nome_id">Digite seu nome:</label></p> 
                    <input type="text" id="nome_id" name="nome" placeholder="Digite seu nome..." required>

                    <p><label for="idade_id">Digite sua idade:</label></p>
                    <input type="number" id="idade_id" name="idade" placeholder="Digite sua idade..." required>

                    <p><label for="email_id">Digite seu email:</label></p>
                    <input type="email" id="email_id" name="email" placeholder="Digite seu email..." required>
                    
                    <p><label for="senha_id">Digite sua senha:</label></p>
                    <input type="password" id="senha_id" name="senha" placeholder="Digite sua senha..." required/>

                    <p><label for="foto_id">Selecione sua foto:</label></p>
                    <input type="file" id="foto_id" name="foto" accept="image/*" onchange="previewFoto()">

                    <div id="foto_preview" class="foto-moldura">
                        <p>Pré-visualize sua foto aqui</p>
                    </div>

                    <p><input type="submit" value="Enviar"></p>
                </form>
            </div>
        </section>
    </div>
        <footer id="contato">
        <section id="cadastro" class="cadastro">
            <form class="formulario-contato">
                <h2 class="h2-contato">Contato</h2>
                <input type="text" placeholder="Seu nome" required>
                <input type="email" placeholder="Seu e-mail" required>
                <button type="submit">Enviar</button>
            </form>

            <a href="https://web.whatsapp.com/"><img src="../BkEvents/img/whatsapp.png" class="icon" alt="WhatsApp"></a>
            <a href="https://www.instagram.com/"><img src="../BkEvents/img/instagram.png" class="icon" alt="Instagram"></a>
        </section>

        
            <p>© 2025 BK Eventos | All Rights Reserved</p>
        </footer>
    
</body>
</html>
