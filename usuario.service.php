<?php

class UsuarioService{
    private $conexao;
    private $usuario;

    public function __construct(Conexao $conexao, Usuario $usuario){
        $this->conexao = $conexao->conectar();
        $this->usuario = $usuario;
    }

    public function cadastrar(){
        $query = 'insert into usuarios(nome, email, senha) values (?, ?, ?)';

        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(1, $this->usuario->__get('nome'));
        $stmt->bindValue(2, $this->usuario->__get('email'));
        $stmt->bindValue(3, $this->usuario->__get('senha'));

        return $stmt->execute();
    }

    public function validar_login(){
        $query = 'select id, nome, email, senha, perfil_id from usuarios where email = ? and senha = ?';

        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(1, $this->usuario->__get('email'));
        $stmt->bindValue(2, $this->usuario->__get('senha'));
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    public function consultar_chamados(){
        
    }

    public function remover(){
        
    }
}

?>