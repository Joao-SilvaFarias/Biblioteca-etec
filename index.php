<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Ermelinda Library</title>
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
            <a href="#" onclick="openSearchBar()" class="link-nav">Search</a>
            <a href="index.php" class="link-nav" style="font-weight: 600;">Library</a>
            <a class="link-nav" <?php 
            if (isset($_SESSION["nome"])) {
                echo "href='#' id='inicial' style='height: 50px; width: 50px; border-radius: 25px; display: flex; justify-content: center; align-items: center; background-color: #5034a5; font-weight: 700;'";
            } else{
                echo "href='login.php'";
            }
            ?>>
                <?php
                
                if (isset($_SESSION["nome"])) {
                    echo substr(trim($_SESSION["nome"]),0,1);
                }else{
                    echo "Login";
                }
                
                ?>
            </a>
        </nav>
    </header>
    <div class="div-titulo" style="text-align: center;">
        <div style="width: 100%; display: flex; justify-content: center">
            <h1 class="titulo">Select Period</h1>
        </div>
    </div>
    <main style="gap: 40px; display: flex; flex-direction: column; box-shadow: 0px 0px 0px; width: 70%">
    <a href="diario.php?periodo=MORNING"><button class="periodo">M-TEC MORNING</button></a>
    <a href="diario.php?periodo=AFTERNOON"><button class="periodo">M-TEC AFTERNOON</button></a>
    <a href="diario.php?periodo=NIGHT"><button class="periodo">M-TEC NIGHT</button></a>
    </main>

    <script src="js/script.js"></script>
</body>

</html>