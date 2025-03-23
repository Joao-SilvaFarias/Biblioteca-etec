<?php

include_once("usuario.php");

class UsuarioDao{

    public function inserir($connection, Usuario $usuario){
        $nome = $usuario->getNome();
        $email = $usuario->getEmail();
        $sql = "insert into usuario (nome, email) values (?, ?);";
        $stmt = $connection->prepare($sql);
        $stmt->bindParam("ss", $nome, $email);
        $stmt->execute();
    }

    public function listar($connection){
        $sql = "select * from usuario;";
        $stmt = $connection->prepare($sql);
        $stmt->execute();
        $result = $stmt->get_result();
        while ($row = $result->fetch_assoc()) {
            $nome = $row["nome"];
            $email = $row["email"];
            $id = $row["id"];
            `<div class="usuario">
            <p>$nome</p>
            <p>$email</p>
            <form method="post">
            <input type="hidden" value="$id">
            <input type="submit" value="deletar">
            </form> 
            </div>`;
        }
    }

    public function atualizar($connection, Usuario $usuario){
        $nome = $usuario->getNome();
        $email = $usuario->getEmail();
        $id = $usuario->getId();
        $sql = "update usuario set nome = ?, email = ? where id = ?;";
        $stmt = $connection->prepare($sql);
        $stmt->bindParam("ssi", $nome, $email, $id);
        $stmt->execute();
    }

    public function deletar($connection, $id){
        $sql = "delete from usuario where id = ?;";
        $stmt = $connection->prepare($sql);
        $stmt->bindParam("i", $id);
        $stmt->execute();
    }

}

?>