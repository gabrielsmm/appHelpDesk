<?php

class ChamadoService{
    private $conexao;
    private $chamado;

    public function __construct(Conexao $conexao, Chamado $chamado){
        $this->conexao = $conexao->conectar();
        $this->chamado = $chamado;
    }

    public function inserir(){
        $query = 'insert into chamados(titulo, categoria, descricao, usuario_id) values (?, ?, ?, ?)';

        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(1, $this->chamado->__get('titulo'));
        $stmt->bindValue(2, $this->chamado->__get('categoria'));
        $stmt->bindValue(3, $this->chamado->__get('descricao'));
        $stmt->bindValue(4, $this->chamado->__get('usuario_id'));

        $stmt->execute();
    }

    public function recuperar(){
        $query = 'select titulo, categoria, descricao from chamados where usuario_id = ?';

        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(1, $this->chamado->__get('usuario_id'));
        $stmt->execute();
        
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function recuperar_todos(){
        $query = 'select u.nome, c.titulo, c.categoria, c.descricao from usuarios u join chamados c on u.id = c.usuario_id';

        $stmt = $this->conexao->prepare($query);
        $stmt->execute();
        
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function remover(){
        
    }
}

?>