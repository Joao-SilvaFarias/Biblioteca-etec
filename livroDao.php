<?php

class LivroDao{
    private $connection;

    public function __construct($connection){
        $this->connection = $connection;
    }

    public function inserir(Livro $livro){
        $titulo = $livro->getTitulo();
        $autor = $livro->getAutor();
        $cod = $livro->getCod();
        $sql = "insert into livros (titulo, autor, codigo_verificacao) values (?, ?, ?);";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam("sss", $titulo, $autor, $cod);
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
            $cod = $row["cod"];
            $id = $row["id"];
            `<div class="livro">
            <p>$titulo</p>
            <p>$autor</p>
            <p>$cod</p>
            <form method="post">
            <input type="hidden" value="$id">
            <input type="submit" value="deletar">
            </form> 
            </div>`;
        }
    }

    public function atualizar(Livro $livro){
        $titulo = $livro->getTitulo();
        $autor = $livro->getAutor();
        $cod = $livro->getCod();
        $id = $livro->getId();
        $sql = "update livros set titulo = ?, autor = ?, codigo_verificacao = ? where id = ?;";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam("sssi", $titulo, $autor, $cod, $id);
        $stmt->execute();
    }

    public function deletar($id){
        $sql = "delete from livros where id = ?;";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam("i", $id);
        $stmt->execute();
    }
}

?>