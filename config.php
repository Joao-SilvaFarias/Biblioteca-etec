<?php

include_once('emprestimoDao.php');
include_once('db.php');

function stopIsset() {
    header("Location: index.php");
    exit();
}

if(isset($_POST['inserir'])){

    $dataEmprestimo = $_POST['data-emprestimo'];
    $horario = $_POST['horario'];

    if($dataEmprestimo != '' && $horario != ""){
        inserir($connection, new Emprestimo($dataEmprestimo,$horario));  
    }

    stopIsset();
}

if(isset($_POST["deletar"])){
    $id = $_POST["id"];
    deletar($connection, $id);
}

if(isset($_POST["atualizar"])){

    $dataEmprestimo = $_POST['data-emprestimo'];
    $horario = $_POST['horario'];
    $id = $_POST['id'];

    if($dataEmprestimo != '' && $horario != ""){
        $emprestimo = new Emprestimo($dataEmprestimo,$horario);
        $emprestimo->setId($id);
        atualizar($connection, $emprestimo);
    }

    stopIsset();
}

?>