<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Biblioteca Ermelinda</title>
</head>

<body>
    <?php
    $periodo = $_GET["periodo"];
    include_once("botoes/botoesDiario.php");
    if(!isset($_SESSION["id"])){
        header("location: login.php");
        exit();
    }
    ?>
    <header class="header">
        <div class="div-logo">
        <a href="index.php"><img src="img/logo.png" alt="Logo" class="logo"></a>
        </div>
        <nav class="nav-bar">
            <a href="#" onclick="openSearchBar()" class="link-nav">Pesqusar</a>
            <a href="index.php" class="link-nav" style="font-weight: 600;">Biblioteca</a>
            <a class="link-nav" <?php 
            if (isset($_SESSION["nome"])) {
                echo "href='#' id='inicial' style='height: 50px; width: 50px; border-radius: 25px; display: flex; justify-content: center; align-items: center; background-color: #5034a5; font-weight: 700;'";
            } else{
                echo "href='login.php'";            }
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
    <div class="div-titulo">
        <div>
            <h1 class="titulo">Período</h1>
            <h2 class="subtitulo">M-TEC <?php echo $periodo?></h2>
        </div>
    </div>
    <main>
        <form action="" method="post">
            <section>
                <div class="registros">
                    <div class="form-registros">
                        <div class="campos-form-registros">
                            <div class="campo">
                                <label for="" class="label-campo-registro">Data</label>
                                <input type="date" name="data" id="data" class="input-registros" >
                            </div>
                            <div class="campo">
                                <label for="" class="label-campo-registro">Qtd. Emprestimos</label>
                                <input type="number" name="qtdEmprestimos" id="emprestimos" class="input-registros"
                                    placeholder="00" >
                            </div>
                            <div class="campo">
                                <label for="" class="label-campo-registro">Qtd. Devolvidos</label>
                                <input type="number" name="qtdDevolvidos" id="devolvidos" class="input-registros"
                                    placeholder="00" >
                            </div>
                            <div class="campo">
                                <label for="" class="label-campo-registro">Qtd. Renovações</label>
                                <input type="number" name="qtdRenovacoes" id="renovacoes" class="input-registros"
                                    placeholder="00" >
                            </div>
                        </div>
                        <input type="submit" value="Enviar" class="btn-enviar" name="inserir">
                    </div>
                    <div class="diarios">
                        <?php

                        $diarioDao->lista($periodo);

                        ?>
                    </div>
                </div>
                <div class="gerencia">
                    <h3 class="titulo-gerencia">Gerência</h3>
                    <div class="campo-gerencia">
                        <label for="" class="label-campo-gerencia">Bibliotecário</label>
                        <input type="text" name="bibliotecario" id="" class="input-gerencia"
                            placeholder="Nome completo" >
                    </div>
                    <div class="campo-gerencia">
                        <label for="" class="label-campo-gerencia">Assistente(opcional)</label>
                        <input type="text" name="assistente" id="" class="input-gerencia" placeholder="Nome completo">
                    </div>
                </div>
            </section>
        </form>
    </main>

    <script src="js/script.js"></script>
</body>

</html>