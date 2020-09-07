<? require_once 'validador_acesso.php'; ?>

<?php

require 'chamado.model.php';
require 'chamado.service.php';
require 'conexao.php';

$chamado = new Chamado();
$chamado->__set('usuario_id', $_SESSION['id_usuario']);

$conexao = new Conexao();

$chamadoService = new ChamadoService($conexao, $chamado);

if($_SESSION['perfil_usuario'] == 1){
  $chamados = $chamadoService->recuperar_todos();
} else if ($_SESSION['perfil_usuario'] == 2){
  $chamados = $chamadoService->recuperar();
}

?>

<html>
  <head>
    <meta charset="utf-8" />
    <title>App Help Desk</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/1c887938cb.js" crossorigin="anonymous"></script>
    
    <style>
      .card-consultar-chamado {
        padding: 30px 0 0 0;
        width: 100%;
        margin: 0 auto;
      }

      .navbar-nav{
        flex-direction: row;
      }
    </style>
  </head>

  <body>

    <nav class="navbar navbar-dark bg-dark">
      <a class="navbar-brand" href="#">
        <img src="logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
        App Help Desk
      </a>
      <ul class="navbar-nav ml-auto">
        <a class="nav-item nav-link active d-inline" href="#"><i class="fas fa-user"></i> <?=$_SESSION['nome_usuario']?></a>
        <a class="ml-3 nav-item nav-link d-inline" href="logoff.php">SAIR</a> 
      </ul>
    </nav>

    <div class="container">    
      <div class="row">

        <div class="card-consultar-chamado">
          <div class="card">
            <div class="card-header">
              Consulta de chamado
            </div>

            <? if(empty($chamados)){ ?>
            <h5 class="text-danger ml-3 mt-3">Você ainda não fez nenhum chamado</h5>
            <div class="col-md-6">
              <a class="btn btn-info btn-lg btn-block" href="abrir_chamado.php">Abrir chamado</a>
            </div>
            <? } ?>

            <? foreach($chamados as $chamado){ ?>
              <div class="card-body">
                  <div class="card mb-3 bg-light">
                    
                    <div class="card-body">
                      <? if($_SESSION['perfil_usuario'] == 1){ ?>
                      <p class="card-text">Cliente: <?= $chamado->nome ?></p>
                      <? } ?>
                      <h5 class="card-title"><?= $chamado->titulo ?></h5>
                      <h6 class="card-subtitle mb-2 text-muted"><?= $chamado->categoria ?></h6>
                      <p class="card-text"><?= $chamado->descricao ?></p>
                    </div>

                  </div>
              </div>
            <? } ?>


              <div class="row mt-5">
                <div class="col-6">
                  <a href="home.php" class="ml-1 mb-1 btn btn-lg btn-warning btn-block">Voltar</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>