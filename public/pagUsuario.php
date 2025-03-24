<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página do usuário</title>
</head>
<body>
    <?php
    include_once("../botoes/botoesUsuario.php");
    $usuarioDao->listar();
    ?>
    <form action="" method="post">
        <input type="text" name="nome" placeholder="Nome" required>
        <input type="email" name="email" placeholder="E-mail" required>
        <input type="submit" value="Inserir" name="inserir">
    </form>
</body>
</html>