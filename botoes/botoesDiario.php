<?php

include_once('../dao/diarioDao.php');
include_once('../db/db.php');

$diarioDao = new DiarioDao($connection);

function stopIsset() {
    header("Location: home.php");
    exit();
}

if(isset($_POST['inserir'])){

    $data = $_POST['data'];
    $qtdEmprestimos = $_POST['qtdEmprestimos'];
    $qtdDevolvidos = $_POST['qtdDevolvidos'];
    $qtdRenovacoes = $_POST['qtdRenovacoes'];

    if($data != '' && $qtdEmprestimos != "" && $qtdDevolvidos != "" && $qtdRenovacoes != ""){
        $diarioDao->inserir(new Diario($data, $qtdEmprestimos, $qtdDevolvidos, $qtdRenovacoes));  
    }

    stopIsset();
}

if(isset($_POST["deletar"])){
    $id = $_POST["id"];
    $diarioDao->deletar($id);
}

if(isset($_POST["atualizar"])){

    $data = $_POST['data'];
    $qtdEmprestimos = $_POST['qtdEmprestimos'];
    $qtdDevolvidos = $_POST['qtdDevolvidos'];
    $qtdRenovacoes = $_POST['qtdRenovacoes'];
    $id = $_POST['id'];

    if($data != '' && $qtdEmprestimos != "" && $qtdDevolvidos != "" && $qtdRenovacoes != ""){
        $diario = new Diario($data, $qtdEmprestimos, $qtdDevolvidos, $qtdRenovacoes);
        $diario->setId($id);
        $diarioDao->atualizar($diario);
    }

    stopIsset();
}

?>