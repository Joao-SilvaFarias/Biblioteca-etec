<?php

include_once('diario.php');

function inserir($connection, Diario $diario){
    $data = $diario->getData();
    $nVisitantes = $diario->getVisitantes();
    $nRetirados = $diario->getRetirados();
    $nDevolvidos = $diario->getDevolvidos();
    $nEmprestimo = $diario->getEmprestimo();
    $sql = "insert into diario (_data, numero_visitantes, numero_livros_retirados, numero_livros_devolvidos, numero_livros_emprestimo) values (?, ?, ?, ?, ?);";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("siiii", $data, $nVisitantes, $nRetirados, $nDevolvidos, $nEmprestimo);
    $stmt->execute();
}

function lista($connection){
    $sql = "select * from diario;";
    $stmt = $connection->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();
    while($row = $result->fetch_assoc()){
        $id = $
        $data = $row["_data"];
        $nVisitantes = $row["numero_visitantes"];
        $nRetirados = $row["numero_livros_retirados"];
        $nDevolvidos = $row["numero_livros_devolvidos"];
        $nEmprestimo = $row["numero_livros_emprestimo"];

        echo "<div class='diario'>
                <p>$data</p>
                <p>$nVisitantes</p>
                <p>$nRetirados</p>
                <p>$nDevolvidos</p>
                <p>$nEmprestimo</p>
                <form method='post'>
                    <input type='hidden' value='$id' name='id'>
                    <input type='submit' name='deletar' value='Deletar'>
                </form>
            </div>";
    }
}

function atualizar($connection, Diario $diario){
    $id = $diario->getId();
    $data = $diario->getData();
    $nVisitantes = $diario->getVisitantes();
    $nRetirados = $diario->getRetirados();
    $nDevolvidos = $diario->getDevolvidos();
    $nEmprestimo = $diario->getEmprestimo();
    $sql = "update diario set _data = ?, numero_visitantes = ?, numero_livros_retirados = ?, numero_livros_devolvidos = ?, numero_livros_emprestimo = ? where id = ?;";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("siiiii", $data, $nVisitantes, $nRetirados, $nDevolvidos, $nEmprestimo, $id);
    $stmt->execute();
}

function deletar($connection, $id){
    $sql = "delete from diario where id = ?";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
}
?>