<?php

include_once('../obj/emprestimo.php');

class EmprestimoDao{
    private $connection;

    public function __construct($connection){
        $this->connection = $connection;
    }

    function inserir(Emprestimo $emprestimo){
        $dataEmprestimo = $emprestimo->getDataEmprestimo();
        $horario = $emprestimo->getHorario();
        $sql = "insert into emprestimos (data_emprestimo, horario) values (?, ?);";
        $stmt = $this->connection->prepare($sql);
        $stmt->bind_param("ss", $dataEmprestimo, $horario);
        $stmt->execute();
    }
    
    function lista(){
        $sql = "select * from emprestimos;";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        $result = $stmt->get_result();
        while($row = $result->fetch_assoc()){
            $id = $row["id"];
            $dataEmprestimo = $row["data_emprestimo"];
            $dataDevolucao = $row["data_devolucao"];
            $horario = $row["horario"];
    
            echo "<div class='emprestimo'>
                    <p>$dataEmprestimo</p>
                    <p>$dataDevolucao</p>
                    <p>$horario</p>
                    <form method='post'>
                        <input type='hidden' value='$id' name='id'>
                        <input type='submit' name='deletar' value='Deletar'>
                    </form>
                </div>";
        }
    }
    
    function atualizar(Emprestimo $emprestimo){
        $id = $emprestimo->getId();
        $dataEmprestimo = $emprestimo->getDataEmprestimo();
        $horario = $emprestimo->getHorario();
        $sql = "update diario set data_emprestimo = ?, horario = ? where id = ?;";
        $stmt = $this->connection->prepare($sql);
        $stmt->bind_param("ssi", $dataEmprestimo, $horario, $id);
        $stmt->execute();
    }
    
    function deletar($id){
        $sql = "delete from emprestimos where id = ?";
        $stmt = $this->connection->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
    }
}


?>