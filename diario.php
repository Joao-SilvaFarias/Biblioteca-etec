<?php

class Diario{

    private $id;
    private $data;
    private $nVisitantes;
    private $nRetirados;
    private $nDevolvidos;
    private $nEmprestimo;

    public function __construct($data, $nVisitantes, $nRetirados, $nDevolvidos, $nEmprestimo) {
        $this->data = $data;
        $this->nVisitantes = $nVisitantes;
        $this->nRetirados = $nRetirados;
        $this->nDevolvidos = $nDevolvidos;
        $this->nEmprestimo = $nEmprestimo;
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getData(){
        return $this->data;
    }

    public function setData($data){
        $this->data = $data;
    }

    public function getVisitantes(){
        return $this->nVisitantes;
    }

    public function setVisitantes($nVisitantes){
        $this->nVisitantes = $nVisitantes;
    }

    public function getRetirados(){
        return $this->nRetirados;
    }

    public function setRetirados($nRetirados){
        $this->nRetirados = $nRetirados;
    }

    public function getDevolvidos(){
        return $this->nDevolvidos;
    }

    public function setDevolvidos($nDevolvidos){
        $this->nDevolvidos = $nDevolvidos;
    }

    public function getEmprestimo(){
        return $this->nEmprestimo;
    }

    public function setEmprestimo($nEmprestimo){
        $this->nEmprestimo = $nEmprestimo;
    }
}


?>