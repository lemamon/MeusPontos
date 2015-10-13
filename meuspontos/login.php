<?php
    // Iniciando a sessão
    session_start();

    // Verificando se o usuário já está logado. Ou existe um cookie salvo com a opção lembrar-me.
    if((($_SESSION["nome_logado"] != "") && ($_SESSION["email_logado"] != "")) || ($_COOKIE['lembrar'] != null )){

        // Se ele já está logado, não vai ser necessário mais fazer login...
        // Sendo assim, é melhor redirecioná-lo para a tela inicial.
        header("location: telainicial.php");
    }
?>
<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>+Meus Pontos - Login</title>

        <!-- Bootstrap -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
         <style>

             body{
                background-image: url(images/background.jpg);
            }
         </style>
    </head>

    <body>
        <div class="container-fluid">
            <br>
            <div class="text-center bg-warning col-sm-6 col-md-offset-3">
                <br>
                <img src="images\logo.png" alt="..." class="img-circle">
                <h1>+Meus Pontos</h1>
                <p>Emagrecendo com Saúde</p>
                <form class="form-horizontal" method="post" action="logar.php">
                    <div class="form-group">
                        <label for="inputEmail" class="col-sm-2 control-label col-md-offset-2">Email</label>
                        <div class="col-sm-4">
                            <input type="email" name="email" required class="form-control" id="inputEmail3" placeholder="mail@mail.com">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword" class="col-sm-2 control-label col-md-offset-2">Senha</label>
                        <div class="col-sm-4">
                            <input type="password" name="senha" required class="form-control" id="inputPassword3" placeholder="Password">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-4 col-sm-4">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="lembrar"> Lembrar-me
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-4 col-sm-4">
                            <button type="submit" class="btn btn-default">Entrar</button>
                        </div>
                    </div>
                    <br>
                    <p class="text-info">Não possui cadastro? <a href="cadastro.php"><em>Cadastre-se aqui!</em></a></p>
                </form>
            </div>
        </div>
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>
