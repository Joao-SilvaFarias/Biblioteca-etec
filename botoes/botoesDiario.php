<?php

include_once('./dao/diarioDao.php');
include_once('./db/db.php');

$diarioDao = new DiarioDao($connection);

function stopIsset() {
    header("Location: index.php");
    exit();
}

if(isset($_POST['inserir'])){

    $data = $_POST['data'];
    $qtdEmprestimos = $_POST['qtdEmprestimos'];
    $qtdDevolvidos = $_POST['qtdDevolvidos'];
    $qtdRenovacoes = $_POST['qtdRenovacoes'];
    $bibliotecario = $_POST['bibliotecario'];
    

    if($data != '' && $qtdEmprestimos != "" && $qtdDevolvidos != "" && $qtdRenovacoes != "" && $bibliotecario != ""){
        $diario = new Diario($data, $qtdEmprestimos, $qtdDevolvidos, $qtdRenovacoes, $bibliotecario);
        if($_POST['assistente']){
            $diario->setAssistente($_POST['assistente']);
        }
        $diarioDao->inserir($diario);  
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
    $bibliotecario = $_POST['bibliotecario'];
    $id = $_POST['id'];

    if($data != '' && $qtdEmprestimos != "" && $qtdDevolvidos != "" && $qtdRenovacoes != "" && $bibliotecario != ""){
        $diario = new Diario($data, $qtdEmprestimos, $qtdDevolvidos, $qtdRenovacoes, $bibliotecario);
        if($_POST['assistente']){
            $diario->setAssistente($_POST['assistente']);
        }
        $diario->setId( $id );
        $diarioDao->atualizar($diario);  
    }

    stopIsset();
}


?>