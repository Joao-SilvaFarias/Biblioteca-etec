<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <style>
        .diarios {
            margin-top: 0;
            padding: 20px;
        }
    </style>
    <title>Biblioteca Ermelinda</title>
</head>

<body>
    <header class="header">
        <div class="div-logo">
            <a href="index.php"><img src="img/logo.png" alt="Logo" class="logo"></a>
        </div>
        <nav class="nav-bar">
            <a href="index.php" class="link-nav">Home</a>
            <a href="#" onclick="openSearchBar()" class="link-nav" style="font-weight: 600;">Search</a>
            <a href="library.php" class="link-nav">Library</a>
            <a href="login.php" class="link-nav">Login</a>
        </nav>
    </header>
    <div class="div-titulo">
        <div>
            <h1 class="titulo">Período</h1>
            <h2 class="subtitulo">M-TEC <?php $periodo = $_GET["periodo"];
            if(empty($periodo)){
                $periodo = "Geral";
            }
            echo $periodo;?></h2>
        </div>
    </div>
    <main>
        <form action="" method="post">
            <div class="diarios">
                <?php
                include_once("botoes/botoesDiario.php");
                if(!isset($_SESSION["id"])){
                    header("location: login.php");
                    exit();
                }
                $pesquisa = $_GET["pesquisa"];
                $diarioDao->pesquisar($pesquisa, $periodo);      
                ?>
            </div>
            </div>
        </form>
    </main>

    <script src="js/script.js"></script>
</body>

</html>