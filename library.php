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
            <a href="library.php" class="link-nav" style="font-weight: 600;">Library</a>
            <a href="login.php" class="link-nav">Login</a>
        </nav>
    </header>
    <div class="div-titulo" style="text-align: center;">
        <div style="width: 100%; display: flex; justify-content: center">
            <h1 class="titulo">Selecione o período</h1>
        </div>
    </div>
    <main style="gap: 40px; display: flex; flex-direction: column; box-shadow: 0px 0px 0px; width: 70%">
    <a href="diario.php?periodo=Manhã"><button class="periodo">M-TEC MANHÃ</button></a>
    <a href="diario.php?periodo=Tarde"><button class="periodo">M-TEC TARDE</button></a>
    <a href="diario.php?periodo=Noite"><button class="periodo">M-TEC NOITE</button></a>
    </main>

    <script src="js/script.js"></script>
</body>

</html>