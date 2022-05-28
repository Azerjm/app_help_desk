<?php require("validador_acesso.php"); ?>

<?php
  $chamados_usuario = [];
  $user_id = $_SESSION['ID'];
  $perfil_id = $_SESSION['perfil'];
  //abrir o arquivo das chamadas
  $arquivo = fopen('../../app_help_desk/arquivo.txt', 'r');
  // feof = verifica onde está o fim do arquivo e retorna true. não!fim retornará a primeira linha
  while(!feof($arquivo)){
    //recupera o que está naquela linha em forma de string (COM O WHILE RETORNA ATÈ O FINAL)
    $registro = fgets($arquivo);
    //transforma novamente em vetor separando os índices pela'#'
    $dados_chamados = explode('#', $registro);
    // Se o perfil for de usuario -- e se ID !não corresponde ao ID do chamado
    // --- Continue(não faça nada)
    if($perfil_id == 2){
      if($user_id != $dados_chamados[0]){
        continue; //não faça nada
        //Se acha um ID igual ao CHAMADO --- ADC ao array vazio O correspondente na String Registro
      }  else {
        $chamados_usuario[] = $registro;
      } 
      //Se o perfil !não for de usuário --- 
      //Apenas adicione ao array vazio todos os chamados em string de REGISTRO    
    } else { 
      $chamados_usuario[] = $registro;
  }
}
  fclose($arquivo);
?>


<html>
  <head>
    <meta charset="utf-8" />
    <title>App Help Desk</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <style>
      .card-consultar-chamado {
        padding: 30px 0 0 0;
        width: 100%;
        margin: 0 auto;
      }
    </style>
  </head>

  <body>

    <nav class="navbar navbar-dark bg-dark">
      <a class="navbar-brand" href="home.php">
        <img src="logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
        App Help Desk
      </a>
      </a>
      <a href="logoff.php">SAIR</a>
    </nav>

    <div class="container">    
      <div class="row">

        <div class="card-consultar-chamado">
          <div class="card">
            <div class="card-header">
              Consulta de chamado
            </div>

            <div class="card-body">
                <!-- transforma novamente em string os chamados encontrados
                Em seguida volta a transformalos em vetor e os separa pela '#' 
                 capturando e expondo os arrays antes de fechar o comando-->
              <?php foreach($chamados_usuario as $chamado) { ?>
              <?php $chamado_dados = explode('#', $chamado); ?>

              <div class="card mb-3 bg-light">
                <div class="card-body">
                  <h5 class="card-title"><?= $chamado_dados[1] ?></h5>
                  <h6 class="card-subtitle mb-2 text-muted"><?= $chamado_dados[2] ?></h6>
                  <p class="card-text"><?= $chamado_dados[3] ?></p>
                </div>
              </div>
            
                <?php  } ?>
              
              <div class="row mt-5">
                <div class="col-6">
                  <a href="home.php" class="btn btn-lg btn-warning btn-block" type="submit">Voltar</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>