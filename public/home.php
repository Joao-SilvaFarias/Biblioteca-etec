<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Biblioteca Ermelinda</title>
</head>

<body>
    <?php
    include_once("../botoes/botoesDiario.php");
    ?>
    <header>
        <h1 class="header-titulo">Biblioteca Ermelinda</h1>
        <nav>
            <a href="" class="link-nav">Home</a>
            <a href="" class="link-nav">Search</a>
            <a href="" class="link-nav">Library</a>
            <a href="" class="link-nav">Login</a>
        </nav>
    </header>
    <div class="div-titulo">
            <div>
                <h1 class="titulo">Período</h1>
                <h2 class="subtitulo">M-TEC MANHÃ</h2>
            </div>
        </div>
    <main>
        

        <section>
            <div class="registros">
                <form action="" method="post" class="form-registros">
                    <div class="campos-form-registros">
                    <div class="campo">
                        <label for="" class="label-campo-registro">Data</label>
                        <input type="date" name="data" id="" class="input-registros">
                    </div>
                    <div class="campo">
                        <label for="" class="label-campo-registro">Qtd. Emprestimos</label>
                        <input type="number" name="qtdEmprestimos" id="" class="input-registros" placeholder="00">
                    </div>
                    <div class="campo">
                        <label for="" class="label-campo-registro">Qtd. Devolvidos</label>
                        <input type="number" name="qtdDevolvidos" id="" class="input-registros" placeholder="00">
                    </div>
                    <div class="campo">
                        <label for="" class="label-campo-registro">Qtd. Renovações</label>
                        <input type="number" name="qtdRenovacoes" id="" class="input-registros" placeholder="00">
                    </div>
                    </div>
                    <input type="submit" value="Enviar" class="btn-enviar" name="inserir">
                </form>
                <div class="diarios">
                <?php
                
                $diarioDao->lista() ;
                
                ?>
                </div>
            </div>
            <div class="gerencia">
                <h3 class="titulo-gerencia">Gerência</h3>
                <div class="campo-gerencia">
                    <label for="" class="label-campo-gerencia">Bibliotecário</label>
                    <input type="text" name="nomeBibliotecario" id="" class="input-gerencia" placeholder="Nome completo">
                </div>
                <div class="campo-gerencia">
                    <label for="" class="label-campo-gerencia">Assistente</label>
                    <input type="text" name="nomeAssistente" id="" class="input-gerencia" placeholder="Nome completo">
                </div>
            </div>
        </section>
    </main>
</body>

</html>