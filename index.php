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
        <input type="date" name="data" id="data">
        <input type="number" name="n_visitantes" id="n_visitantes" placeholder="Número de visitantes">
        <input type="number" name="n_livros_retirados" id="n_livros_retirados" placeholder="Número de livros retirados">
        <input type="number" name="n_livros_devolvidos" id="n_livros_devolvidos" placeholder="Número de livros devolvidos">
        <input type="number" name="n_livros_emprestimo" id="n_livros_emprestimo" placeholder="Número de livros em empréstimo">
        <input type="submit" value="Inserir" name="inserir">
    </form>
</body>
</html>