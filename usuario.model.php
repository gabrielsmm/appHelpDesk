<?php

class Usuario{
    private $id;
    private $email;
    private $nome;
    private $senha;
    private $perfil_id;

    public function __set($atributo, $valor){
        $this->$atributo = $valor;
    }

    public function __get($atributo){
        return $this->$atributo;
    }
}

?>