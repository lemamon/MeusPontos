<?php     // Iniciando a sessão
    session_start();    // Verificando se o usuário já está logado. Ou existe um cookie salvo com a opção lembrar-me.    if((($_SESSION["nome_logado"] != "") && ($_SESSION["email_logado"] != "")) || ($_COOKIE['lembrar'] != null )){        // Se ele já está logado, não vai ser necessário mais fazer login...        // Sendo assim, é melhor redirecioná-lo para a tela inicial.        header("location: telainicial.php");    }?>
<!DOCTYPE html><html lang="pt-BR">
  <head>
    <meta content="text/html; charset=utf-8" http-equiv="content-type">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>+Meus Pontos - Login</title>
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/modal.css">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>        <![endif]-->
    <style>

             body{
                background-image: url(images/background.jpg);
         </style>
    <script src="js/jquery.js"> </script>
    <script src="js/modal.js"> </script>
  </head>
  <body>
    <div class="container center-block "> <br>
      <div class="row"> <br>
        <div class="text-center bg-info col-md-8"> <br>
          <img src="images/logo.png" alt="..." class="img-circle">
          <h1>+Meus Pontos</h1>
          <p>Emagrecendo com Saúde</p>
          <p> </p>
        </div>
      </div>
      <div class="row">
        <div class="text-center bg-info col-md-4 index">
          <h2>Dieta dos Pontos</h2>
          <p> A dieta dos pontos foi desenvolvida para quem quer emagrecer com
            saúde sem deixar de comer o que gosta. <br>
            Utilize o Sistema Meus Pontos para anotar a quantidade de pontos
            consumidas por dia e emagreça de maneira saudável e sem sacrifícios!
          </p>
          <div class="botao btn btn-default">Saiba mais</div>
          <br>
          <br>
          <br>
        </div>
        <div class="text-center bg-info col-md-4">
          <h2> Acesse</h2>
          <p><br>
          </p>
          <form class="form-horizontal" method="post" action="logar.php">
            <div class="form-group"> <label for="inputEmail" class="col-sm-2 control-label col-md-offset-1">Email</label>
              <div class="col-sm-6"> <input name="email" required="" class="form-control"

                  id="inputEmail3" placeholder="mail@mail.com" type="email"> </div>
            </div>
            <div class="form-group"> <label for="inputPassword" class="col-sm-2 control-label col-md-offset-1">Senha</label>
              <div class="col-sm-6"> <input name="senha" required="" class="form-control"

                  id="inputPassword3" placeholder="Password" type="password"> </div>
            </div>
            <div class="form-group">
              <div class="col-sm-offset-4 col-sm-4">
                <div class="checkbox"> <label> <input name="lembrar" type="checkbox">
                    Lembrar-me </label> </div>
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-offset-4 col-md-4"> <button type="submit" class="btn btn-default">Entrar</button>
              </div>
            </div>
            Não possui cadastro? <a href="cadastro.php"><em>Cadastre-se aqui!</em></a><br>
            <br>
          </form>
        </div>
      </div>
      <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
      <!-- Include all compiled plugins (below), or include individual files as needed -->
      <script src="js/bootstrap.min.js"></script> </div>
    <div class="janelaModal">
      <div class="Titulo">
        <div class="Fechar"> </div>
      </div>
      <div class="Conteudo bg-info">
        <div class="text-center"> <br>
          <img src="images/logo.png" alt="..." class="img-circle">
          <h1>+Meus Pontos</h1>
        </div>
        <p> A dieta dos pontos foi desenvolvida para quem quer emagrecer com
          saúde sem deixar de comer o que gosta. No lugar de calorias você soma
          pontos, assim fica livre para comer o que quiser, dentro do seu limite
          diário de pontos, e emagrece sem passar fome! <br>
          Eficiente e simples, a dieta dos pontos não restringe nenhum tipo de
          alimento, ensina a comer de forma adequada e promove um emagrecimento
          saudável.<br>
          Nessa dieta, as calorias são substituídas por pontos, cada ponto
          equivale a 3,6 calorias. Todo alimento é permitido, mas deve-se
          calcular o limite diário de pontos a serem consumidos, baseado nos
          fatores: sexo, idade, altura e peso. <br>
          Após o cálculo do limite diário é só consultar a tabela para saber
          quantos pontos tem cada alimento e começar a registrar o consumo para
          controlar a quantidade de pontos ingeridos no dia. A dieta dos pontos
          é uma das mais fáceis de seguir, pois não é muito restritiva nem
          monótona. <br>
          <br>
          Emagreça facilmente registrando e controlando o consumo de pontos com
          o Sistema Meus Pontos! </p>
      </div>
    </div>
    <div class="Fundo"> </div>
  </body>
</html>
