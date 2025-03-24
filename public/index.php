<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    include_once("../botoes/botoesEmprestimo.php");

    $emprestimoDao->lista();
    ?>
    <form action="" method="post">
        <input type="date" name="data-emprestimo" id="data-emprestimo">
        <select name="horario" id="horario">
            <option value="Manhã">Manhã</option>
            <option value="Tarde">Tarde</option>
            <option value="Noite">Noite</option>
        </select>
        <input type="submit" value="Inserir" name="inserir">
    </form>
</body>
</html>