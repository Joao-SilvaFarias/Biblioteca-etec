<?php

include_once('daoDiario.php');
include_once('db.php');

function stopIsset() {
    header("Location: index.php");
    exit();
}

if(isset($_POST['inserir'])){

    $data = $_POST['data'];
    $nVisitantes = $_POST['n_visitantes'];
    $nRetirados = $_POST['n_retirados'];
    $nDevolvidos = $_POST['n_devolvidos'];
    $nEmpretimo = $_POST['n_emprestimo'];

    if($data != '' && $nVisitantes != '' && $nRetirados != "" && $nDevolvidos != "" && $nEmpretimo != ""){
        inserir($connection, new Diario($data, $nVisitantes, $nRetirados, $nDevolvidos, $nEmpretimo));
    }

    stopIsset();
}

if(isset($_POST["deletar"])){
    $id = $_POST["id"];
    deletar($connection, $id);
}

if(isset($_POST["atualizar"])){

    $data = $_POST['data'];
    $nVisitantes = $_POST['n_visitantes'];
    $nRetirados = $_POST['n_retirados'];
    $nDevolvidos = $_POST['n_devolvidos'];
    $nEmpretimo = $_POST['n_emprestimo'];
    $id = $_POST['id'];

    if($data != '' && $nVisitantes != '' && $nRetirados != "" && $nDevolvidos != "" && $nEmpretimo != ""){
        $diario = new Diario($data, $nVisitantes, $nRetirados, $nDevolvidos, $nEmpretimo);
        $diario->setId($id);
        atualizar($connection, $diario);
    }

    stopIsset();
}

?>