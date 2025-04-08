<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Biblioteca Ermelinda</title>
</head>
<body>
    <div class="container">
        <?php 
        include_once("botoes/botoesUsuario.php");
        ?>
    <form method="post" class="form-cadastro">
            <div class="logo-top">
                <img src="img/logo2.png" alt="" width="100px">
            </div>
            <div class="container-cadastro">
                <div style="display: flex; flex-direction: column; gap: 20px; align-items: center;">
                    <div class="imagem">
                        <img src="img/user_icon.png" alt="" width="50px">
                    </div>
                    <h1 class="title" style="font-size: 1.5rem">Welcome to the library</h1>
                </div>
                <div class="campos-form" style="gap: 20px;">
                    <h1 class="title"
                        style="font-size: 1.5rem; width: 100%; display: flex; justify-content: flex-start;">
                        Register</h1>
                    <div class="inputs-group">
                        <div class="icon">
                            <img src="img/nome_icon.png" alt="" width="25px">
                        </div>
                        <input type="text" name="nome" class="input-form" placeholder="Enter your name" required>
                    </div>
                    <div class="inputs-group">
                        <div class="icon">
                            <img src="img/email.png" alt="" width="25px">
                        </div>
                        <input type="email" name="email" class="input-form" placeholder="Enter your email" required>
                    </div>
                    <div class="inputs-group">
                        <div class="icon">
                            <img src="img/lock.png" alt="" width="25px">
                        </div>
                        <input type="password" name="senha" class="input-form" placeholder="Password" required>
                    </div>
                    <div class="inputs-group">
                        <div class="icon">
                            <img src="img/lock.png" alt="" width="25px">
                        </div>
                        <input type="password" name="cSenha" class="input-form" placeholder="Confirm your password" required>
                    </div>
                    <input type="submit" value="Register" name="cadastrar" class="btn-cadastro">
                </div>
            </div>
        </form>
    </div>
</body>
</html>