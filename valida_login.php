<?php

session_start();

$valida_campos = true;

foreach($_POST as $campo){
    if(empty($campo)){
        header('Location: index.php?erro=campo');
        $valida_campos = false;
    }
}

require 'usuario.model.php';
require 'usuario.service.php';
require 'conexao.php';

if($valida_campos){
    $usuario = new Usuario();
    $usuario->__set('email', $_POST['email']);
    $usuario->__set('senha', $_POST['senha']);

    $conexao = new Conexao();

    $usuarioService = new UsuarioService($conexao, $usuario);

    $usuario = $usuarioService->validar_login();

    if(!empty($usuario)){
        $_SESSION['autenticado'] = 'SIM';
        $_SESSION['id_usuario'] = $usuario->id;
        $_SESSION['nome_usuario'] = $usuario->nome;
        $_SESSION['perfil_usuario'] = $usuario->perfil_id;
        header('Location: home.php');
    } else {
        header('Location: index.php?erro=usuario');
    }
}

?>