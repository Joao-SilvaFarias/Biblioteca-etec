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
    <h1 class="title"style="color: #fff;">Cadastro</h1>
        <div class="campos-form">
        <input type="text" name="nome" class="input-form" placeholder="Nome" required>
        <input type="email" name="email" class="input-form" placeholder="E-mail" required>
        <input type="password" name="senha" class="input-form" placeholder="Senha" required>
        <input type="password" name="cSenha" class="input-form" placeholder="Confirmar senha" required>
        </div>
        <input type="submit" value="Cadastrar" name="cadastrar" class="btn-cadastro">
    </form>
    </div>
</body>
</html>