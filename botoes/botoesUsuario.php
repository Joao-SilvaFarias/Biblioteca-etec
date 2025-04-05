<?php

include_once('./dao/usuarioDao.php');
include_once('./db/db.php');

$usuarioDao = new UsuarioDAO($connection);

if (isset($_POST["cadastrar"])) {
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];
    $cSenha = $_POST["cSenha"];
    if(!empty($nome) && !empty($email) && !empty($senha) && !empty($cSenha)){
        if($senha == $cSenha){
            $id = $usuarioDao->inserir(new Usuario($nome, $email, $senha));
            if($id){
                $_SESSION["id"] = $id;
            }
        }
    }
}

if(isset($_POST["login"])){
    $email = $_POST["email"];
    $senha = $_POST["senha"];

    if(!empty($email) && !empty($senha)){
        $id = $usuarioDao->login($email, $senha);
        if($id){
            $_SESSION["id"] = $id;
        }
    }
}

?>