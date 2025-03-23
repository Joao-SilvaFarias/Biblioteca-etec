<?php

include_once('usuarioDao.php');
include_once('db.php');

$usuarioDao = new UsuarioDao($connection);

function stopIsset() {
    header("Location: pagUsuario.php");
    exit();
}

if(isset($_POST['inserir'])){

    $nome = $_POST['nome'];
    $email = $_POST['email'];

    if($nome != '' && $email != ""){
        $usuarioDao->inserir(new Usuario($nome,$email));  
    }

    stopIsset();
}

if(isset($_POST["deletar"])){
    $id = $_POST["id"];
    $usuarioDao->deletar($id);
}

if(isset($_POST["atualizar"])){

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $id = $_POST['id'];

    if($nome != '' && $email != ""){
        $usuario = new Usuario($nome,$email);
        $usuario->setId($id);
        $usuarioDao->atualizar($usuario);
    }

    stopIsset();
}

?>