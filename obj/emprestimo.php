<?php

class Emprestimo{

    private $id;
    private $dataEmprestimo;
    private $horario;
    private $nDevolvidos;
    private $nEmprestimo;

    public function __construct($dataEmprestimo, $horario) {
        $this->dataEmprestimo = $dataEmprestimo;
        $this->horario = $horario;
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getDataEmprestimo(){
        return $this->dataEmprestimo;
    }

    public function setDataEmprestimo($dataEmprestimo){
        $this->dataEmprestimo = $dataEmprestimo;
    }

    public function getHorario(){
        return $this->horario;
    }

    public function setHorario($horario){
        $this->horario = $horario;
    }
}


?>