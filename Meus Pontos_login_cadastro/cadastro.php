<?php

    // Aqui estamos chamando nossa conexão 
    // com o banco de dados. Uma vez que vamos 
    // utilizar ela em todo esse documento;
	include_once("conexao.php");


	// Fazendo as variáveis receberem os valores
	// vindos lá da página HTML.
	$nome = $_POST["nome"];
	$email = $_POST["email"];
	
	$senha = md5($_POST["senha"]); // Senha criptografada.
	
	$sexo = $_POST["sexo"];
	$peso = $_POST["peso"];	
	$altura = $_POST["altura"];

	// Convertendo a string para float.
	// Tirando a vírgula e colocando o ponto. (padrão americano)
	$altura = (float) str_replace(",", ".", $altura);

	$imc  = round($peso/pow($altura, 2), 2);
	$dataNasc = date('Y-m-d');

	$sql = "INSERT INTO Usuario (us_email, us_senha, us_nome, us_dataNasc, us_sexo, us_altura, us_peso, us_limPontos, us_IMC) VALUES ";
	$sql .= "('".$email."', '".$senha."', '".$nome."', '".$dataNasc."', '".$sexo."', ".$altura.", ".$peso.", 0, ".$imc.")";
	mysql_query($sql) or die(mysql_error()." Erro ao inserir");

	header("Location: cadastrado_sucesso.html");

?>