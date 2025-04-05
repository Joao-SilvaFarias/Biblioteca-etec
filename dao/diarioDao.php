<?php

include_once('./obj/diario.php');

class DiarioDao
{
    private $connection;

    public function __construct($connection)
    {
        $this->connection = $connection;
    }

    function inserir(Diario $diario)
    {
        $data = $diario->getData();
        $qtdDevolvidos = $diario->getQtdDevolvidos();
        $qtdEmprestimos = $diario->getQtdEmprestimos();
        $qtdRenovacoes = $diario->getQtdRenovacoes();
        $bibliotecario = $diario->getBibliotecario();
        if ($diario->getAssistente()) {
            $assistente = $diario->getAssistente();
            $sql = "insert into diario (_data, qtd_emprestimos, qtd_devolvidos, qtd_renovacoes, bibliotecario, assistente) values (?, ?, ?, ?, ?, ?);";
            $stmt = $this->connection->prepare($sql);
            $stmt->bind_param("siiiss", $data, $qtdEmprestimos, $qtdDevolvidos, $qtdRenovacoes, $bibliotecario, $assistente);
        } else {
            $sql = "insert into diario (_data, qtd_emprestimos, qtd_devolvidos, qtd_renovacoes, bibliotecario) values (?, ?, ?, ?, ?);";
            $stmt = $this->connection->prepare($sql);
            $stmt->bind_param("siiis", $data, $qtdEmprestimos, $qtdDevolvidos, $qtdRenovacoes, $bibliotecario);
        }
        $stmt->execute();
    }

    function lista()
    {
        $sql = "select * from diario;";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        $result = $stmt->get_result();
        while ($row = $result->fetch_assoc()) {
            $id = $row["id"];
            $data = $row["_data"];
            $qtdEmprestimos = $row["qtd_emprestimos"];
            $qtdDevolvidos = $row["qtd_devolvidos"];
            $qtdRenovacoes = $row["qtd_renovacoes"];
            $bibliotecario = $row['bibliotecario'];
            $assistente = $row['assistente'];
            $dataFormatada = date("d/m/Y", strtotime($data));

            echo "<div class='diario'>
                    <div class='item'>
                    <p class='title-item' >Data</p>
                    <p>$dataFormatada</p>
                    </div>
                    <div class='item'>
                    <p class='title-item' >Emprestimos</p>
                    <p>$qtdEmprestimos</p>
                    </div>
                    <div class='item'>
                    <p class='title-item' >Devolvidos</p>
                    <p>$qtdDevolvidos</p>
                    </div>
                    <div class='item'>
                    <p class='title-item' >Renovações</p>
                    <p>$qtdRenovacoes</p>
                    </div>
                    <div class='buttons'>
                    <form method='post'>
                        <input type='hidden' value='$id' name='id'>
                        <input type='submit' name='deletar' value='Deletar' class='btn-deletar-diario'>
                    </form>
                    <div class='btn-deletar-diario' id='btn-editar'><a href='update.php?id=$id&data=$data&emprestimos=$qtdEmprestimos&devolvidos=$qtdDevolvidos&renovacoes=$qtdRenovacoes&bibliotecario=$bibliotecario&assistente=$assistente'>Editar</a></div>
                    </div>
                </div>";
        }
    }

    function atualizar(Diario $diario)
    {
        $data = $diario->getData();
        $qtdDevolvidos = $diario->getQtdDevolvidos();
        $qtdEmprestimos = $diario->getQtdEmprestimos();
        $qtdRenovacoes = $diario->getQtdRenovacoes();
        $bibliotecario = $diario->getBibliotecario();
        $id = $diario->getId();
        if ($diario->getAssistente()) {
            $assistente = $diario->getAssistente();
            $sql = "update diario set _data = ?, qtd_emprestimos = ?, qtd_devolvidos = ?, qtd_renovacoes = ?, bibliotecario = ?, assistente = ? where id = ?;";
            $stmt = $this->connection->prepare($sql);
            $stmt->bind_param("siiissi", $data, $qtdEmprestimos, $qtdDevolvidos, $qtdRenovacoes, $bibliotecario, $assistente, $id);
        } else {
            $sql = "update diario set _data = ?, qtd_emprestimos = ?, qtd_devolvidos = ?, qtd_renovacoes = ?, bibliotecario = ? where id = ?;";
            $stmt = $this->connection->prepare($sql);
            $stmt->bind_param("siiisi", $data, $qtdEmprestimos, $qtdDevolvidos, $qtdRenovacoes, $bibliotecario, $id);
        }


        $stmt->execute();
    }

    function deletar($id)
    {
        $sql = "delete from diario where id = ?";
        $stmt = $this->connection->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
    }
}


?>