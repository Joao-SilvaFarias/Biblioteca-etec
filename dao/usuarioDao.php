<?php

include_once("../obj/usuario.php");

class UsuarioDao{

    private $connection;

    public function __construct($connection){
        $this->connection = $connection;
    }

    public function inserir(Usuario $usuario){
        $nome = $usuario->getNome();
        $email = $usuario->getEmail();
        $sql = "insert into usuarios (nome, email) values (?, ?);";
        $stmt = $this->connection->prepare($sql);
        $stmt->bind_param("ss", $nome, $email);
        $stmt->execute();
    }

    public function listar(){
        $sql = "select * from usuarios;";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        $result = $stmt->get_result();
        while ($row = $result->fetch_assoc()) {
            $nome = $row["nome"];
            $email = $row["email"];
            $id = $row["id"];
            echo "<div class='usuario'>
                    <p>$nome</p>
                    <p>$email</p>
                    <form method='post'>
                        <input type='hidden' value='$id'>
                        <input type='submit' value='deletar'>
                    </form> 
                </div>";
        }
    }

    public function atualizar(Usuario $usuario){
        $nome = $usuario->getNome();
        $email = $usuario->getEmail();
        $id = $usuario->getId();
        $sql = "update usuarios set nome = ?, email = ? where id = ?;";
        $stmt = $this->connection->prepare($sql);
        $stmt->bind_param("ssi", $nome, $email, $id);
        $stmt->execute();
    }

    public function deletar($id){
        $sql = "delete from usuarios where id = ?;";
        $stmt = $this->connection->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
    }

}

?>