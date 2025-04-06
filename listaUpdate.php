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
            <a href="#" onclick="openSearchBar()" class="link-nav">Search</a>
            <a href="login.php" class="link-nav">Login</a>
        </nav>
    </header>
    <?php
    $periodo = $_GET["periodo"];
    $pesquisa = $_GET["pesquisa"];
    echo "<script>alert($periodo)</script>";
    include_once("botoes/botoesDiario.php");
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
            <a href="index.php" class="link-nav">Home</a>
            <a href="#" onclick="openSearchBar()" class="link-nav" style="font-weight: 600;">Search</a>
            <a href="library.php" class="link-nav">Library</a>
            <a href="#" class="link-nav">Login</a>
        </nav>
    </header>
    <div class="div-titulo">
        <div>
            <h1 class="titulo">Período</h1>
            <h2 class="subtitulo">M-TEC <?php $periodo = $_GET["periodo"]; echo $periodo;?></h2>
        </div>
    </div>
    <form action="" method="post" class="form-registros-atualizar">
        <section>
            <div class="btn-close"><a href="<?php echo 'lista.php?periodo='.$periodo.'&pesquisa='.$pesquisa?>">X</a></div>
            <div class="campos-form-registros">
                <div class="campo">
                    <label for="" class="label-campo-registro">Data</label>
                    <input type="date" name="data" id="data" class="input-registros" value="<?php echo $data ?>"
                        >
                </div>
                <div class="campo">
                    <label for="" class="label-campo-registro">Qtd. Emprestimos</label>
                    <input type="number" name="qtdEmprestimos" id="emprestimos" class="input-registros" placeholder="00"
                        value="<?php echo $emprestimos ?>" >
                </div>
                <div class="campo">
                    <label for="" class="label-campo-registro">Qtd. Devolvidos</label>
                    <input type="number" name="qtdDevolvidos" id="devolvidos" class="input-registros" placeholder="00"
                        value="<?php echo $devolvidos ?>" >
                </div>
                <div class="campo">
                    <label for="" class="label-campo-registro">Qtd. Renovações</label>
                    <input type="number" name="qtdRenovacoes" id="renovacoes" class="input-registros" placeholder="00"
                        value="<?php echo $renovacoes ?>" >
                </div>
                <input type='hidden' name='id' class='id' value="<?php echo $id ?>">
                <input type="submit" value="Confirmar" class="btn-enviar" name="atualizar2">
            </div>
            <div class="gerencia" style="padding-top: 0;">
                <h3 class="titulo-gerencia">Gerência</h3>
                <div class="campo-gerencia">
                    <label for="" class="label-campo-gerencia">Bibliotecário</label>
                    <input type="text" name="bibliotecario" id="bibliotecario" class="input-gerencia"
                        placeholder="Nome completo" value="<?php echo $bibliotecario ?>" >
                </div>
                <div class="campo-gerencia">
                    <label for="" class="label-campo-gerencia">Assistente</label>
                    <input type="text" name="assistente" id="assistente" class="input-gerencia"
                        placeholder="Nome completo" value="<?php echo $assistente ?>">
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