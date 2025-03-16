<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    include_once('config.php');
    include_once('daoLivro.php');

    lista($connection);
    ?>
    <form action="" method="post">
        <input type="text" name="titulo" id="">
        <input type="text" name="autor" id="">
        <input type="text" name="editora" id="">
        <input type="submit" value="Inserir" name="inserir">
    </form>
</body>
</html>