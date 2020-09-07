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
              Login
            </div>
            <div class="card-body">
              <form action="valida_login.php" method="post">
                <div class="form-group">
                  <input name="email" type="email" class="form-control" placeholder="E-mail">
                </div>
                <div class="form-group">
                  <input name="senha" type="password" class="form-control" placeholder="Senha">
                </div>

                <? if(isset($_GET['erro']) && $_GET['erro'] == 'campo'){ ?>

                <p class="text-danger">
                  Preencha todos os campos!
                </p>

                <? } ?>

                <? if(isset($_GET['erro']) && $_GET['erro'] == 'login'){ ?>

                <p class="text-danger">
                  Faça login antes de acessar as páginas protegidas
                </p>

                <? } ?>

                <? if(isset($_GET['erro']) && $_GET['erro'] == 'usuario'){ ?>

                <p class="text-danger">
                  Usuário ou senha inválidos
                </p>

                <? } ?>

                <button class="btn btn-lg btn-info btn-block" type="submit">Entrar</button>

                <p style="margin: 10px 0px 5px 0px;">Não possui cadastro?</p>
                <a class="btn btn-info btn-block" href="cadastro.php">Ir para página de cadastro</a>

              </form>
            </div>
          </div>
        </div>

    </div>
  </body>
</html>