<?php

class Livro{

    private $id;
    private $titulo;
    private $autor;
    private $editora;

    public function __construct($titulo, $autor, $editora) {
        $this->titulo = $titulo;
        $this->autor = $autor;
        $this->editora =$editora;
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
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

    public function getEditora(){
        return $this->editora;
    }

    public function setEditora($autor){
        $this->editora = $autor;
    }
}

?>