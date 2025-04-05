<?php

class Diario{

    private $id;
    private $data;
    private $qtdEmprestimos;
    private $qtdDevolvidos;
    private $qtdRenovacoes;
    private $bibliotecario;
    private $assistente;

    public function __construct($data, $qtdEmprestimos, $qtdDevolvidos, $qtdRenovacoes, $bibliotecario) {
        $this->data = $data;
        $this->qtdEmprestimos = $qtdEmprestimos;
        $this->qtdDevolvidos = $qtdDevolvidos;
        $this->qtdRenovacoes = $qtdRenovacoes;
        $this->bibliotecario = $bibliotecario;
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

    public function getBibliotecario(){
        return $this->bibliotecario;
    }

    public function setBibliotecario($bibliotecario){
        $this->bibliotecario=$bibliotecario;
    }

    public function getAssistente(){
        return $this->assistente;
    }

    public function setAssistente($assistente){
        $this->assistente = $assistente;
    }

}


?>