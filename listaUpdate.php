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
    <title>Ermelinda Library</title>
</head>

<body>
<header class="header">
        <div class="div-logo">
        <a href="index.php"><img src="img/logo.png" alt="Logo" class="logo"></a>
        </div>
        <nav class="nav-bar">
            <a href="#" onclick="openSearchBar()" class="link-nav">Search</a>
            <a href="index.php" class="link-nav" style="font-weight: 600;">Library</a>
            <a class="link-nav" <?php 
            include_once("botoes/botoesDiario.php");
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
    <?php
    $periodo = $_GET["periodo"];
    $pesquisa = $_GET["pesquisa"];
    echo "<script>alert($periodo)</script>";
    if(!isset($_SESSION["id"])){
        header("location: login.php");
        exit();
    }
    $bibliotecario = $_GET["bibliotecario"];
    $assistente = $_GET["assistente"];
    $emprestimos = $_GET["emprestimos"];
    $renovacoes = $_GET["renovacoes"];
    $devolvidos = $_GET["devolvidos"];
    $data = $_GET["data"];
    $id = $_GET["id"];
    ?>
    <header class="header">
        <div class="div-logo">
            <a href="index.php"><img src="img/logo.png" alt="Logo" class="logo"></a>
        </div>
        <nav class="nav-bar">
            <a href="#" onclick="openSearchBar()" class="link-nav" style="font-weight: 600;">Search</a>
            <a href="index.php" class="link-nav">Library</a>
            <a class="link-nav" <?php 
            include_once("botoes/botoesDiario.php");
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
            ?>>
        </nav>
    </header>
    <div class="div-titulo">
        <div>
            <h1 class="titulo">Period</h1>
            <h2 class="subtitulo">M-TEC <?php $periodo = $_GET["periodo"]; echo $periodo;?></h2>
        </div>
    </div>
    <form action="" method="post" class="form-registros-atualizar">
    <section>
            <div class="btn-close"><a href="<?php echo 'diario.php?periodo='.$periodo?>">X</a></div>
            <div class="campos-form-registros">
                <div class="campo">
                    <label for="" class="label-campo-registro">Date</label>
                    <input type="date" name="data" id="data" class="input-registros" value="<?php echo $data ?>"
                        >
                </div>
                <div class="campo">
                    <label for="" class="label-campo-registro">Qty. of loans</label>
                    <input type="number" min="0" name="qtdEmprestimos" id="emprestimos" class="input-registros" placeholder="00"
                        value="<?php echo $emprestimos ?>" >
                </div>
                <div class="campo">
                    <label for="" class="label-campo-registro">Qty. Returned</label>
                    <input type="number" min="0" name="qtdDevolvidos" id="devolvidos" class="input-registros" placeholder="00"
                        value="<?php echo $devolvidos ?>" >
                </div>
                <div class="campo">
                    <label for="" class="label-campo-registro">Qty. Renewals</label>
                    <input type="number" min="0" name="qtdRenovacoes" id="renovacoes" class="input-registros" placeholder="00"
                        value="<?php echo $renovacoes ?>" >
                </div>
                <input type='hidden' name='id' class='id' value="<?php echo $id ?>">
                <input type="submit" value="Confirm" class="btn-enviar" name="atualizar">
            </div>
            <div class="gerencia" style="padding-top: 0;">
                <h3 class="titulo-gerencia">Menagement</h3>
                <div class="campo-gerencia">
                    <label for="" class="label-campo-gerencia">Librarian</label>
                    <input type="text" name="bibliotecario" id="bibliotecario" class="input-gerencia"
                        placeholder="Full name" value="<?php echo $bibliotecario ?>" >
                </div>
                <div class="campo-gerencia">
                    <label for="" class="label-campo-gerencia">Assistent(optional)</label>
                    <input type="text" name="assistente" id="assistente" class="input-gerencia"
                        placeholder="Full name" value="<?php echo $assistente ?>">
                </div>
            </div>
        </section>
    </form>
    <div class="div-titulo">
        <div>
            <h1 class="titulo">Período</h1>
            <h2 class="subtitulo">M-TEC MANHÃ</h2>
        </div>
    </div>
    <main>
        <form action="" method="post">
            <div class="diarios">
                <?php
                $pesquisa = $_GET["pesquisa"];
                include_once("botoes/botoesDiario.php");
                $diarioDao->pesquisar($pesquisa, $periodo);
                ?>
            </div>
            </div>
        </form>
    </main>

    <script src="js/script.js"></script>
</body>

</html>