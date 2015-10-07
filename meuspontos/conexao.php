<?php
    
    /**
    * Este arquivo tem como objetivo
    * realizar a conexão com o banco de dados.
    * Para obter uma conexão de sucesso, seus parâmetros 
    * com o banco devem ser configurados aqui.
    */


    $servidor = "localhost";
    $usuario = "meuspontos";
    $senha = "MeusPontos2015";
    $nome_do_banco = "meuspontos";


    if(mysql_connect($servidor, $usuario, $senha)){
      //  echo  "Acessou o servidor do banco! <br/>";

       if(mysql_select_db($nome_do_banco)){
          //  echo "Conectou com o banco!";
       }else{
           echo "Erro ao conectar com o banco de dados.";
       }
    }else{
        echo "Erro";
    }


?>
