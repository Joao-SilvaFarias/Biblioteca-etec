<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página do livro</title>
</head>
<body>
    <?php
    include_once("../botoes/botoesLivro.php");
    $livroDao->listar();
    ?>
    <form action="" method="post">
        <input type="text" name="titulo" placeholder="Título" required>
        <input type="text" name="autor" placeholder="Autor" required>
        <input type="text" name="cod" id="cod" placeholder="Código de verificação">
        <input type="submit" value="Inserir" name="inserir">
    </form>
</body>
</html>