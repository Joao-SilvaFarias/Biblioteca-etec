<?php

include_once('./dao/diarioDao.php');
include_once('./dao/usuarioDao.php');
include_once('botoesUsuario.php');
include_once('./db/db.php');

$diarioDao = new DiarioDao($connection);
$usuarioDao = new UsuarioDAO($connection);


if (isset($_POST['inserir'])) {

    $data = $_POST['data'];
    $qtdEmprestimos = $_POST['qtdEmprestimos'];
    $qtdDevolvidos = $_POST['qtdDevolvidos'];
    $qtdRenovacoes = $_POST['qtdRenovacoes'];
    $bibliotecario = $_POST['bibliotecario'];


    if ($data != '' && $qtdEmprestimos != "" && $qtdDevolvidos != "" && $qtdRenovacoes != "" && $bibliotecario != "") {
        $diario = new Diario($data, $qtdEmprestimos, $qtdDevolvidos, $qtdRenovacoes, $bibliotecario, $periodo);
        if ($_POST['assistente']) {
            $diario->setAssistente($_POST['assistente']);
        }
        $diarioDao->inserir($diario);
    }

    header("Location: library.php?periodo=$periodo");
    exit();
}


if (isset($_POST["deletar"])) {
    $id = $_POST["id"];
    $diarioDao->deletar($id);
}

if (isset($_POST["atualizar"])) {

    $data = $_POST['data'];
    $qtdEmprestimos = $_POST['qtdEmprestimos'];
    $qtdDevolvidos = $_POST['qtdDevolvidos'];
    $qtdRenovacoes = $_POST['qtdRenovacoes'];
    $bibliotecario = $_POST['bibliotecario'];
    $id = $_POST['id'];

    if ($data != '' && $qtdEmprestimos != "" && $qtdDevolvidos != "" && $qtdRenovacoes != "" && $bibliotecario != "") {
        $diario = new Diario($data, $qtdEmprestimos, $qtdDevolvidos, $qtdRenovacoes, $bibliotecario, $periodo);
        if ($_POST['assistente']) {
            $diario->setAssistente($_POST['assistente']);
        }
        $diario->setId($id);
        $diarioDao->atualizar($diario);
    }

    header("location: library.php?periodo=$periodo");
}

if (isset($_POST["atualizar2"])) {

    $data = $_POST['data'];
    $qtdEmprestimos = $_POST['qtdEmprestimos'];
    $qtdDevolvidos = $_POST['qtdDevolvidos'];
    $qtdRenovacoes = $_POST['qtdRenovacoes'];
    $bibliotecario = $_POST['bibliotecario'];
    $id = $_POST['id'];

    if ($data != '' && $qtdEmprestimos != "" && $qtdDevolvidos != "" && $qtdRenovacoes != "" && $bibliotecario != "") {
        $diario = new Diario($data, $qtdEmprestimos, $qtdDevolvidos, $qtdRenovacoes, $bibliotecario, $periodo);
        if ($_POST['assistente']) {
            $diario->setAssistente($_POST['assistente']);
        }
        $diario->setId($id);
        $diarioDao->atualizar($diario);
    }

    header("location: lista.php?periodo=$periodo&pesquisa=$pesquisa");
}

if (isset($_POST['pesquisar'])) {
    $pesquisa = $_POST['barraPesquisa'];

    header("location: lista.php?pesquisa=$pesquisa&periodo=$periodo");
    exit();

}

if (isset($_POST["cadastrar"])) {
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];
    $cSenha = $_POST["cSenha"];
    if(!empty($nome) && !empty($email) && !empty($senha) && !empty($cSenha)){
        if($senha == $cSenha){
            $usuarioDao->inserir(new Usuario($nome, $email, $senha));
        }
    }
}


?>