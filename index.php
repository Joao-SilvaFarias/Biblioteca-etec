<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Biblioteca Ermelinda</title>
</head>

<body>
    <?php
    include_once("botoes/botoesDiario.php");
    ?>
    <header class="header">
        <div class="div-logo">
        <a href="index.php"><img src="img/logo.png" alt="Logo" class="logo"></a>
        </div>
        <nav class="nav-bar">
            <a href="index.php" class="link-nav">Home</a>
            <a href="#" onclick="openSearchBar()" class="link-nav">Search</a>
            <a href="" class="link-nav">Login</a>
        </nav>
    </header>
    <div class="div-titulo">
        <div>
            <h1 class="titulo">Selecione o período</h1>
        </div>
    </div>
    <main>
        <button class="periodo"><a href="library.php?periodo=Manhã">Manhã</a></button>
        <button class="periodo"><a href="library.php?periodo=Tarde">Tarde</a></button>
        <button class="periodo"><a href="library.php?periodo=Noite">Noite</a></button>
    </main>

    <script src="js/script.js"></script>
</body>

</html>