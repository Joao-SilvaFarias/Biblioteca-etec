<?php

class Livro{
    private $id, $titulo, $autor, $cod;

    public function __construct($titulo, $autor, $cod){
        $this->titulo = $titulo;
        $this->autor = $autor;
        $this->cod = $cod;
    }

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getTitulo(){
        return $this->titulo;
    }

    public function setTitulo($titulo){
        $this->titulo = $titulo;
    }

    public function getAutor(){
        return $this->autor;
    }
     
    public function setAutor($autor){
        $this->autor = $autor;
    }

    public function getCod(){
        return $this->cod;
    }

    public function setCod($cod){
        $this->cod = $cod;
    }

}

?>