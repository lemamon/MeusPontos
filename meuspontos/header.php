<?php
    // Iniciando a sessão
    session_start();

    // Verificando se o usuário não está logado.
    if(($_SESSION["nome_logado"] == "") && ($_SESSION["email_logado"] == "")){

        // Já que não está logado, então rediciona o usuário
        // para a tela de login.
        header("location: login.php");
    }
?>

<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>+Meus Pontos</title>

        <!-- Bootstrap -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <!-- biblioteca Chart.js para criar graficos -->
        <script src="js/Chart.min.js"></script>

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <style type="text/css">
            body{
                background-image: url(images/background.jpg);
            }

            .box {
            	margin: 0px auto;
        			width: 70%;
    			}

 			   .box-chart {
        			width: 100%;
        			margin: 0 auto;
        			padding: 10px;
    			}
        </style>

    </head>

    <body>
        <!-- jQuery (obrigatório para plugins JavaScript do Bootstrap) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <!-- Inclui todos os plugins compilados (abaixo), ou inclua arquivos separadados se necessário -->
        <script src="js/bootstrap.min.js"></script>
        <script src="js/registrarconsumo.js"></script>

        <br>
        <div class="row">
            <!-- header (cabeçalho) -->
            <div class="col-xs-10 col-xs-offset-1 bg-info">
                <div class="page-header dropdown">
                    <a class="navbar-brand" href="index.html">
                        <img alt="Brand" src="images\icone.png">
                    </a>
                    <h1>+Meus Pontos<br><small>Emagrecendo com Saúde</small></h1>
                    <p class="text-right">Seja Bem Vindo! <a href="logout.php"><small>Sair</small></a></p>
                </div>
            </div>
        </div>
        <!-- menu -->
        <div class="row">
            <div class="col-xs-10 col-xs-offset-1 bg-info">
                <nav class="navbar navbar-default">
                        <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="container-fluid">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <a class="navbar-brand" href="index.html">Principal</a>
                        </div>
                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <button type="button" class="btn btn-default navbar-btn btn-primary" onclick="location.href='RegistrarConsumo.php'">Registrar Consumo</button>
                            <button type="button" class="btn btn-default navbar-btn btn-primary" onclick="location.href='acompanhar_consumo_diario.php'">Consumo Diário</button>
                            <button type="button" class="btn btn-default navbar-btn btn-primary">Histórico de Consumo</button>
                            <button type="button" class="btn btn-default navbar-btn btn-primary">Tabela de Alimentos</button>
                        </div><!-- /.navbar-collapse -->
                    </div><!-- /.container-fluid -->
                </nav>
            </div>
        </div>

        <!-- o corpão -->
        <div class="row">
            <div class="col-xs-10 col-xs-offset-1 bg-info">
