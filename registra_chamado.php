<?php

session_start();

$valida_campos = true;

foreach ($_POST as $campo){
    if(empty($campo)){
        header('Location: abrir_chamado.php?erro=campo');
        $valida_campos = false;
    }
}

if($valida_campos){
    require 'chamado.model.php';
    require 'chamado.service.php';
    require 'conexao.php';

    $chamado = new Chamado();
    $chamado->__set('titulo', $_POST['titulo']);
    $chamado->__set('categoria', $_POST['categoria']);
    $chamado->__set('descricao', $_POST['descricao']);
    $chamado->__set('usuario_id', $_SESSION['id_usuario']);

    $conexao = new Conexao();

    $chamadoService = new ChamadoService($conexao, $chamado);

    $chamadoService->inserir();

    header('Location: abrir_chamado.php?chamado=sucesso');
}



?>