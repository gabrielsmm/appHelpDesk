<html>
  <head>
    <meta charset="utf-8" />
    <title>App Help Desk</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <style>
      .card-login {
        padding: 30px 0 0 0;
        width: 350px;
        margin: 0 auto;
      }
    </style>
  </head>

  <body>

    <nav class="navbar navbar-dark bg-dark">
      <a class="navbar-brand" href="#">
        <img src="logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
        App Help Desk
      </a>
    </nav>

    <div class="container">    
      <div class="row">

        <div class="card-login">
          <div class="card">
            <div class="card-header">
              Cadastro
            </div>
            <div class="card-body">
              <form action="realiza_cadastro.php" method="post">
                <div class="form-group">
                  <input name="email" type="email" class="form-control" placeholder="Seu E-mail">
                </div>
                <div class="form-group">
                  <input name="nome" type="text" class="form-control" placeholder="Seu nome">
                </div>
                <div class="form-group">
                  <input name="senha" type="password" class="form-control" placeholder="Sua senha">
                </div>
                <div class="form-group">
                  <input name="confirmasenha" type="password" class="form-control" placeholder="Confirme sua senha">
                </div>

                <? if (isset($_GET['erro']) && $_GET['erro'] == 'senha'){ ?>

                <p class="text-danger">As senhas informadas são diferentes!</p>

                <? } ?>

                <? if (isset($_GET['erro']) && $_GET['erro'] == 'campo'){ ?>

                <p class="text-danger">Todos os campos devem ser preenchidos!</p>

                <? } ?>

                <? if (isset($_GET['cadastro']) && $_GET['cadastro'] == 'sucesso'){ ?>

                <p class="text-success">Usuário cadastrado com sucesso!</p>

                <? } ?>

                <button class="btn btn-lg btn-info btn-block" type="submit">Cadastrar</button>
                
                <p style="margin: 10px 0px 5px 0px;">Já possui cadastro?</p>
                <a class="btn btn-info btn-block" href="index.php">Ir para Login</a>
              </form>
            </div>
          </div>
        </div>

    </div>
  </body>
</html>