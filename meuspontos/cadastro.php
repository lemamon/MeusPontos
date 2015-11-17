<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>+Meus Pontos - Cadastro</title>

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
            <div class="text-center bg-info col-sm-6 col-md-offset-3">
                <br>
                <img src="images\logo.png" alt="..." class="img-circle">
                <h1>+Meus Pontos</h1>
                <h3>Cadastro</h3>
                <form class="form-horizontal" method="post" action="cadastrar.php">
                    <div class="form-group">
                        <label for="inputNome" class="col-sm-2 control-label col-md-offset-2">Nome</label>
                        <div class="col-sm-4">
                            <input type="text" name="nome" required class="form-control" id="inputNome" placeholder="João Silva">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputBday" class="col-sm-2 control-label col-md-offset-2">Data de Nascimento</label>
                        <div class="col-xs-4">
                            <input type="text" name="data_nasc" required class="form-control" id="inputBday" placeholder="DD/MM/AAAA"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail" class="col-sm-2 control-label col-md-offset-2">Email</label>
                        <div class="col-sm-4">
                            <input type="email" name="email" required class="form-control" id="inputEmail" placeholder="mail@mail.com">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword" class="col-sm-2 control-label col-md-offset-2">Senha</label>
                        <div class="col-sm-4">
                            <input type="password" name="senha" required class="form-control" id="inputPassword" placeholder="Password">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputSexo" class="col-sm-2 control-label col-md-offset-2">Sexo</label>
                        <div class="col-sm-4">
                            <label class="radio-inline">
                                <input type="radio" checked  name="sexo" id="inlineRadio1" value="masculino">Masculino
                            </label>
                            <label class="radio-inline">
                                <input type="radio"  name="sexo" id="inlineRadio2" value="feminino">Feminino
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPeso" class="col-sm-2 control-label col-md-offset-2">Peso</label>
                        <div class="col-sm-2">
                            <input type="text" name="peso" required class="form-control" id="inputPeso" placeholder="70">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputAltura" class="col-sm-2 control-label col-md-offset-2">Altura</label>
                        <div class="col-sm-2">
                            <input type="text" name="altura" required class="form-control" id="inputAltura" placeholder="1,55">
                        </div>
                    </div>
                    <br>
                    <div class="form-group">
                        <div class="col-sm-offset-4 col-sm-4">
                            <button type="submit" class="btn btn-default">Cadastrar</button>
                        </div>
                    </div>
                    <br>
                </form>
            </div>
        </div>
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>