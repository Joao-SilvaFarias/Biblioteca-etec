<?php

include_once("../obj/livro.php");

class LivroDao{
    private $connection;

    public function __construct($connection){
        $this->connection = $connection;
    }

    public function inserir(Livro $livro){
        $titulo = $livro->getTitulo();
        $autor = $livro->getAutor();
        $cod = $livro->getCod();
        $sql = "insert into livros (titulo, autor, codigo_identificacao) values (?, ?, ?);";
        $stmt = $this->connection->prepare($sql);
        $stmt->bind_param("sss", $titulo, $autor, $cod);
        $stmt->execute();
    }

    public function listar(){
        $sql = "select * from livros;";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        $result = $stmt->get_result();
        while ($row = $result->fetch_assoc()) {
            $titulo = $row["titulo"];
            $autor = $row["autor"];
            $cod = $row["codigo_identificacao"];
            $id = $row["id"];
            echo "<div class='livro'>
                    <p>$titulo</p>
                    <p>$autor</p>
                    <p>$cod</p>
                    <form method='post'>
                        <input type='hidden' value='$id' name='id'>
                        <input type='submit' name='deletar' value='Deletar'>
                    </form> 
                </div>";
        }
    }

    public function atualizar(Livro $livro){
        $titulo = $livro->getTitulo();
        $autor = $livro->getAutor();
        $cod = $livro->getCod();
        $id = $livro->getId();
        $sql = "update livros set titulo = ?, autor = ?, codigo_identificacao = ? where id = ?;";
        $stmt = $this->connection->prepare($sql);
        $stmt->bind_param("sssi", $titulo, $autor, $cod, $id);
        $stmt->execute();
    }

    public function deletar($id){
        $sql = "delete from livros where id = ?;";
        $stmt = $this->connection->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
    }
}

?>