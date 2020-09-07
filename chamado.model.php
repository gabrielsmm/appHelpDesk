<?php

class Chamado{
    private $id;
    private $titulo;
    private $categoria;
    private $descricao;
    private $usuario_id;

    public function __get($atributo){
        return $this->$atributo;
    }

    public function __set($atributo, $valor){
        $this->$atributo = $valor;
    }
}

?>