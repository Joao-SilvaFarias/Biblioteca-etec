<?php

include_once('daoLivro.php');
include_once('db.php');

function stopIsset() {
    header("Location: index.php");
    exit();
}

if(isset($_POST['inserir'])){

    $titulo = $_POST['titulo'];
    $autor = $_POST['autor'];
    $editora = $_POST['editora'];

    if($titulo != '' && $autor != '' && $editora != ""){
        inserir($connection, new Livro($titulo, $autor, $editora));
    }

    stopIsset();
}

if(isset($_POST["deletar"])){
    $id = $_POST["id"];
    deletar($connection, $id);
}

if(isset($_POST["atualizar"])){

    $titulo = $_POST['titulo'];
    $autor = $_POST['autor'];
    $editora = $_POST['editora'];
    $id = $_POST['id'];

    if($titulo != '' && $autor != '' && $editora != '' && $id != ''){
        $livro = new Livro($titulo, $autor, $editora);
        $livro->setId($id);
        atualizar($connection, $livro);
    }

    stopIsset();
}

?>