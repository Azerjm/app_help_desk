
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
              <form action="valida_login.php" method="post" >
                <div class="form-group">
                  <input type="email" class="form-control" name="email" placeholder="E-mail">
                </div>
                <div class="form-group">
                  <input type="password" class="form-control" name="senha" placeholder="Senha">
                </div>
                             
                 <?php
                    //verifica se existe o indice LOGIN ou foi atrib erro2,,  
                    if(isset($_GET['login']) && $_GET['login'] == 'erro2' ){  
                   ?>

                   <div class="text-danger" style="font-size: 13px;" >Faça login antes de acessar as páginas</div>

                   <?php } ?>
                   <?php
                   //verif se exist o indic LOGIN ou foi atrib erro,,
                   if(isset($_GET['login']) && $_GET['login'] == 'erro' ){  
                     //abre o iF mas só fecha após encaminhar a mensagem
                   ?>

                   <div class="text-danger" style="font-size: 13px;" >Usuário ou senha inválidos</div>

                   <?php } ?>
                   
                <button class="btn btn-lg btn-info btn-block" type="submit">Entrar</button>
              </form>
            </div>
          </div>
        </div>
    </div>
  </body>
</html>