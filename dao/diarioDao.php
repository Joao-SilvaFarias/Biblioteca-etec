<?php

include_once('../obj/diario.php');

class DiarioDao{
    private $connection;

    public function __construct($connection){
        $this->connection = $connection;
    }

    function inserir(Diario $diario){
        $data = $diario->getData();
        $qtdDevolvidos = $diario->getQtdDevolvidos();
        $qtdEmprestimos = $diario->getQtdEmprestimos();
        $qtdRenovacoes = $diario->getQtdRenovacoes();
        $sql = "insert into diario (_data, qtd_emprestimos, qtd_devolvidos, qtd_renovacoes) values (?, ?, ?, ?);";
        $stmt = $this->connection->prepare($sql);
        $stmt->bind_param("siii", $data, $qtdEmprestimos, $qtdDevolvidos, $qtdRenovacoes);
        $stmt->execute();
    }
    
    function lista(){
        $sql = "select * from diario;";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        $result = $stmt->get_result();
        while($row = $result->fetch_assoc()){
            $id = $row["id"];
            $data = $row["_data"];
            $qtdEmprestimos = $row["qtd_emprestimos"];
            $qtdDevolvidos = $row["qtd_devolvidos"];
            $qtdRenovacoes = $row["qtd_renovacoes"];
    
            echo "<div class='diario'>
                    <p>$data</p>
                    <p>$qtdEmprestimos</p>
                    <p>$qtdDevolvidos</p>
                    <p>$qtdRenovacoes</p>
                    <div class='buttons'>
                    <form method='post'>
                        <input type='hidden' value='$id' name='id'>
                        <input type='submit' name='deletar' value='Deletar' class='btn-deletar-diario'>
                    </form>
                    <button onclick='abrirForm($id, $data,  $qtdEmprestimos, $qtdDevolvidos, $qtdRenovacoes)' class='btn-deletar-diario'>Editar</button>
                    </div>
                </div>";
        }
    }
    
    function atualizar(Diario $diario){
        $data = $diario->getData();
        $qtdDevolvidos = $diario->getQtdDevolvidos();
        $qtdEmprestimos = $diario->getQtdEmprestimos();
        $qtdRenovacoes = $diario->getQtdRenovacoes();
        $id = $diario->getId();
        $sql = "update diario set _data = ?, qtd_emprestimos = ?, qtd_devolvidos = ?, qtd_renovacoes = ? where id = ?;";
        $stmt = $this->connection->prepare($sql);
        $stmt->bind_param("siiii", $data, $qtdEmprestimos, $qtdDevolvidos, $qtdRenovacoes, $id);
        $stmt->execute();
    }
    
    function deletar($id){
        $sql = "delete from diario where id = ?";
        $stmt = $this->connection->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
    }
}


?>