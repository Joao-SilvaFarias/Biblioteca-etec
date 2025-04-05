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
        if(isset($_SESSION["id"])){
            header("location: index.php");
            exit();
        }
        ?>
    <form method="post" class="form-cadastro">
    <h1 class="title"style="color: #fff;">Login</h1>
        <div class="campos-form">
        <input type="email" name="email" class="input-form" placeholder="E-mail" required>
        <input type="password" name="senha" class="input-form" placeholder="Senha" required>
        </div>
        <input type="submit" value="Entrar" name="login" class="btn-cadastro">
        <a href="cadastro.php" class="link-cadastro">Cadastrar-se</a>
    </form>
    </div>
</body>
</html>