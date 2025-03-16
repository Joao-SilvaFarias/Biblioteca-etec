<?php

include_once('livro.php');

function inserir($connection, Livro $livro){
    $titulo = $livro->getTitulo();
    $autor = $livro->getAutor();
    $editora = $livro->getEditora();
    $sql = "insert into livro (titulo, autor, editora) values (?, ?, ?);";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("sss", $titulo, $autor, $editora);
    $stmt->execute();
}

function lista($connection){
    $sql = "select * from livro;";
    $stmt = $connection->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();
    while($row = $result->fetch_assoc()){
        $titulo = $row["titulo"];
        $autor = $row["autor"];
        $editora = $row["editora"];
        $id = $row["id_livro"];

        echo "<div class='livro'>
                <p>$titulo</p>
                <p>$autor</p>
                <p>$editora</p>
                <form method='post'>
                    <input type='hidden' value='$id' name='id'>
                    <input type='submit' name='deletar' value='Deletar'>
                </form>
            </div>";
    }
}

function atualizar($connection, Livro $livro){
    $titulo = $livro->getTitulo();
    $autor = $livro->getAutor();
    $editora = $livro->getEditora();
    $id = $livro->getId();
    $sql = "update livro set titulo = ?, autor = ?, editora = ? where id_livro = ?";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("sssi", $titulo, $autor, $editora, $id);
    $stmt->execute();
}

function deletar($connection, $id){
    $sql = "delete from livro where id_livro = ?";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
}
?>