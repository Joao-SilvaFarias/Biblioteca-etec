<?php

include_once('./obj/usuario.php');

if(session_status() == PHP_SESSION_NONE){
    session_start();
}
class UsuarioDao
{
    private $connection;

    public function __construct($connection)
    {
        $this->connection = $connection;
    }

    function inserir(Usuario $usuario)
    {
        $nome = $usuario->getNome();
        $email = $usuario->getEmail();
        $senha = $usuario->getsenha();
        $sql = "insert into usuario (nome, email, senha) values (?, ?, ?);";
        $stmt = $this->connection->prepare($sql);
        $stmt->bind_param("sss", $nome, $email, $senha);
        $stmt->execute();
        $sql = "select * from usuario where email = ? and senha = ?;";
        $stmt = $this->connection->prepare($sql);
        $stmt->bind_param("ss", $email, $senha);
        $stmt->execute();
        $resul = $stmt->get_result();
        if ($resul->num_rows > 0) {
            $row = $resul->fetch_assoc();
            header("location: index.php");
            $_SESSION["nome"] = $row["nome"];
            return $row["id"];
        } else {
            echo "<script>alert('User not found')</script>";
        }
    }

    function login($email, $senha)
    {
        $sql = "select * from usuario where email = ? and senha = ?;";
        $stmt = $this->connection->prepare($sql);
        $stmt->bind_param("ss", $email, $senha);
        $stmt->execute();
        $resul = $stmt->get_result();
        if ($resul->num_rows > 0) {
            $row = $resul->fetch_assoc();
            header("location: index.php");
            $_SESSION["nome"] = $row["nome"];
            return $row["id"];
        } else {
            echo "<script>alert('User not found')</script>";
        }
    }

}


?>