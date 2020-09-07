<?php

$confirma_senha = true;
$valida_campos = true;

if($_POST['senha'] != $_POST['confirmasenha']){
    header('Location: cadastro.php?erro=senha');
    $confirma_senha = false;
}

foreach($_POST as $campo){
    if(empty($campo)){
        header('Location: cadastro.php?erro=campo');
        $valida_campos = false;
    }
}

require 'usuario.model.php';
require 'usuario.service.php';
require 'conexao.php';

if($confirma_senha && $valida_campos){
    $usuario = new Usuario();
    $usuario->__set('email', $_POST['email']);
    $usuario->__set('nome', $_POST['nome']);
    $usuario->__set('senha', $_POST['senha']);

    $conexao = new Conexao();

    $usuarioService = new UsuarioService($conexao, $usuario);

    echo $usuarioService->cadastrar();

    header('Location: cadastro.php?cadastro=sucesso');
}

?>