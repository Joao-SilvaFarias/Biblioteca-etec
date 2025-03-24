<?php

include_once('../dao/livroDao.php');
include_once('../db/db.php');


$livroDao = new LivroDao($connection);

function stopIsset() {
    header("Location: pagLivro.php");
    exit();
}

if(isset($_POST['inserir'])){

    $titulo = $_POST['titulo'];
    $autor = $_POST['autor'];
    $cod = $_POST['cod'];

    if($titulo != '' && $autor != "" && $cod != "") {
        $livroDao->inserir(new Livro($titulo,$autor, $cod));  
    }

    stopIsset();
}

if(isset($_POST["deletar"])){
    $id = $_POST["id"];
    $livroDao->deletar($id);
}

if(isset($_POST["atualizar"])){

    $titulo = $_POST['titulo'];
    $autor = $_POST['autor'];
    $cod = $_POST['cod'];
    $id = $_POST['id'];

    if($titulo != '' && $autor != "" && $cod != "") {
        $livro = new Livro($titulo,$autor, $cod);
        $livro->setId($id);
        $livroDao->atualizar($livro);  
    }


    stopIsset();
}

?>