<?php

class Diario{

    private $id;
    private $data;
    private $qtdEmprestimos;
    private $qtdDevolvidos;
    private $qtdRenovacoes;

    public function __construct($data, $qtdEmprestimos, $qtdDevolvidos, $qtdRenovacoes) {
        $this->data = $data;
        $this->qtdEmprestimos = $qtdEmprestimos;
        $this->qtdDevolvidos = $qtdDevolvidos;
        $this->qtdRenovacoes = $qtdRenovacoes;
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getData() {
        return $this->data;
    }

    public function setData($data) {
        $this->data = $data;
    }

    public function getQtdEmprestimos(){
        return $this->qtdEmprestimos;
    }

    public function setQtdEmprestimos($qtdEmprestimos){
        $this->qtdEmprestimos = $qtdEmprestimos;
    }

    public function getQtdDevolvidos(){
        return $this->qtdDevolvidos;
    }

    public function setQtdDevolvidos($qtdDevolvidos){
        $this->qtdDevolvidos = $qtdDevolvidos;
    }

    public function getQtdRenovacoes(){
        return $this->qtdRenovacoes;
    }

    public function setQtdRenovacoes($qtdRenovacoes){
        $this->qtdRenovacoes = $qtdRenovacoes; 
    }

}


?>