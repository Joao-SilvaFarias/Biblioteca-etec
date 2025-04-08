<?php

include_once('./obj/diario.php');
if(session_status() == PHP_SESSION_NONE){
    session_start();
}

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
        $periodo = $diario->getPeriodo();
        $fk_usuario = $diario->getFkUsuario();
        if ($diario->getAssistente()) {
            $assistente = $diario->getAssistente();
            $sql = "insert into diario (_data, qtd_emprestimos, qtd_devolvidos, qtd_renovacoes, bibliotecario, periodo, assistente, fk_usuario) values (?, ?, ?, ?, ?, ?, ?, ?);";
            $stmt = $this->connection->prepare($sql);
            $stmt->bind_param("siiisssi", $data, $qtdEmprestimos, $qtdDevolvidos, $qtdRenovacoes, $bibliotecario, $periodo, $assistente, $fk_usuario);
        } else {
            $sql = "insert into diario (_data, qtd_emprestimos, qtd_devolvidos, qtd_renovacoes, bibliotecario, periodo, fk_usuario) values (?, ?, ?, ?, ?, ?, ?);";
            $stmt = $this->connection->prepare($sql);
            $stmt->bind_param("siiissi", $data, $qtdEmprestimos, $qtdDevolvidos, $qtdRenovacoes, $bibliotecario, $periodo, $fk_usuario);
        }
        $stmt->execute();
    }

    function lista($periodo1)
    {
        $sql = "select * from diario where periodo = ? and fk_usuario = ?;";
        $stmt = $this->connection->prepare($sql);
        $stmt->bind_param("si", $periodo1, $_SESSION["id"]);
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
            $periodo = $row['periodo'];
            $dataFormatada = date("d/m/Y", strtotime($data));

            echo "<div class='diario'>
                    <div class='item'>
                    <p class='title-item' >Date</p>
                    <p>$dataFormatada</p>
                    </div>
                    <div class='item'>
                    <p class='title-item' >We lend</p>
                    <p>$qtdEmprestimos</p>
                    </div>
                    <div class='item'>
                    <p class='title-item' >Returned</p>
                    <p>$qtdDevolvidos</p>
                    </div>
                    <div class='item'>
                    <p class='title-item' >Renewals</p>
                    <p>$qtdRenovacoes</p>
                    </div>
                    <div class='buttons'>
                    <form method='post'>
                        <input type='hidden' value='$id' name='id'>
                        <input type='submit' name='deletar' value='Delete' class='btn-deletar-diario'>
                    </form>
                    <div class='btn-deletar-diario' id='btn-editar'><a href='update.php?id=$id&data=$data&emprestimos=$qtdEmprestimos&devolvidos=$qtdDevolvidos&renovacoes=$qtdRenovacoes&bibliotecario=$bibliotecario&assistente=$assistente&periodo=$periodo'>Edit</a></div>
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
        $periodo = $diario->getPeriodo();
        $fkUsuario = $diario->getFkUsuario();
        $id = $diario->getId();
        if ($diario->getAssistente()) {
            $assistente = $diario->getAssistente();
            $sql = "update diario set _data = ?, qtd_emprestimos = ?, qtd_devolvidos = ?, qtd_renovacoes = ?, bibliotecario = ?, periodo = ?, assistente = ? where id = ?;";
            $stmt = $this->connection->prepare($sql);
            $stmt->bind_param("siiisssi", $data, $qtdEmprestimos, $qtdDevolvidos, $qtdRenovacoes, $bibliotecario, $periodo, $assistente, $id);
        } else {
            $sql = "update diario set _data = ?, qtd_emprestimos = ?, qtd_devolvidos = ?, qtd_renovacoes = ?, bibliotecario = ?, periodo = ? where id = ?;";
            $stmt = $this->connection->prepare($sql);
            $stmt->bind_param("siiissi", $data, $qtdEmprestimos, $qtdDevolvidos, $qtdRenovacoes, $bibliotecario, $periodo, $id);
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

    function pesquisar($pesquisa1, $periodo)
    {

        if ($periodo != "General") {
            $pesquisa = "%$pesquisa1%";
            $sql = "select * from diario where _data like ? and periodo = ? and fk_usuario = ?";
            $stmt = $this->connection->prepare($sql);
            $stmt->bind_param("ssi", $pesquisa, $periodo, $_SESSION["id"]);

            $stmt->execute();
            $result = $stmt->get_result();
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $id = $row["id"];
                    $data = $row["_data"];
                    $qtdEmprestimos = $row["qtd_emprestimos"];
                    $qtdDevolvidos = $row["qtd_devolvidos"];
                    $qtdRenovacoes = $row["qtd_renovacoes"];
                    $bibliotecario = $row['bibliotecario'];
                    $assistente = $row['assistente'];
                    $periodo = $row['periodo'];
                    $dataFormatada = date("d/m/Y", strtotime($data));

                    echo "<div class='diario'>
                            <div class='item'>
                            <p class='title-item' >Date</p>
                            <p>$dataFormatada</p>
                            </div>
                            <div class='item'>
                            <p class='title-item' >We lend</p>
                            <p>$qtdEmprestimos</p>
                            </div>
                            <div class='item'>
                            <p class='title-item' >Returned</p>
                            <p>$qtdDevolvidos</p>
                            </div>
                            <div class='item'>
                            <p class='title-item' >Renewals</p>
                            <p>$qtdRenovacoes</p>
                            </div>
                            <div class='buttons'>
                            <form method='post'>
                                <input type='hidden' value='$id' name='id'>
                                <input type='submit' name='deletar' value='Delete' class='btn-deletar-diario'>
                            </form>
                            <div class='btn-deletar-diario' id='btn-editar'><a href='listaUpdate.php?id=$id&data=$data&emprestimos=$qtdEmprestimos&devolvidos=$qtdDevolvidos&renovacoes=$qtdRenovacoes&bibliotecario=$bibliotecario&assistente=$assistente&periodo=$periodo&pesquisa=$pesquisa1'>Edit</a></div>
                            </div>
                        </div>";
                }
            } else {
                echo "<h1>No results found</h1>";
            }
        } else{
            $pesquisa = "%$pesquisa1%";
            $sql = "select * from diario where _data like ? and fk_usuario = ?;";
            $stmt = $this->connection->prepare($sql);
            $stmt->bind_param("si", $pesquisa, $_SESSION["id"]);

            $stmt->execute();
            $result = $stmt->get_result();
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $id = $row["id"];
                    $data = $row["_data"];
                    $qtdEmprestimos = $row["qtd_emprestimos"];
                    $qtdDevolvidos = $row["qtd_devolvidos"];
                    $qtdRenovacoes = $row["qtd_renovacoes"];
                    $bibliotecario = $row['bibliotecario'];
                    $assistente = $row['assistente'];
                    $periodo = "Geral";
                    $dataFormatada = date("d/m/Y", strtotime($data));

                    echo "<div class='diario'>
                            <div class='item'>
                            <p class='title-item' >Date</p>
                            <p>$dataFormatada</p>
                            </div>
                            <div class='item'>
                            <p class='title-item' >We lend</p>
                            <p>$qtdEmprestimos</p>
                            </div>
                            <div class='item'>
                            <p class='title-item' >Returned</p>
                            <p>$qtdDevolvidos</p>
                            </div>
                            <div class='item'>
                            <p class='title-item' >Renewals</p>
                            <p>$qtdRenovacoes</p>
                            </div>
                            <div class='buttons'>
                            <form method='post'>
                                <input type='hidden' value='$id' name='id'>
                                <input type='submit' name='deletar' value='Delete' class='btn-deletar-diario'>
                            </form>
                            <div class='btn-deletar-diario' id='btn-editar'><a href='listaUpdate.php?id=$id&data=$data&emprestimos=$qtdEmprestimos&devolvidos=$qtdDevolvidos&renovacoes=$qtdRenovacoes&bibliotecario=$bibliotecario&assistente=$assistente&periodo=$periodo&pesquisa=$pesquisa1'>Edit</a></div>
                            </div>
                        </div>";
                }
            } else {
                echo "<h1>No results found</h1>";
            }
        }

    }
}


?>