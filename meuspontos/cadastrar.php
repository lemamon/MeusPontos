<?php

    // Aqui estamos chamando nossa conexão 
    // com o banco de dados. Uma vez que vamos 
    // utilizar ela em todo esse documento;
	include_once("conexao.php");

	// Fazendo as variáveis receberem os valores
	// vindos lá da página HTML.
	$nome = $_POST["nome"];
	$dataNasc = $_POST["data_nasc"];

	// Convertendo a data para o padrão (aaaa-mm-dd)
	// para poder os dados serem salvos corretamente no banco de dados.
	$dataNascArray = explode("/", $dataNasc);
	$dataNasc = $dataNascArray[2]."-".$dataNascArray[1]."-".$dataNascArray[0];

	
	// Continuando com o preechimento de variáveis vindas
	// formulário.
	$sexo = $_POST["sexo"];
	$peso = $_POST["peso"];	
	$altura = $_POST["altura"];
	$email = $_POST["email"];
	$senha = md5($_POST["senha"]); // Senha "criptografada".

	// Convertendo a string para float.
	// Tirando a vírgula e colocando o ponto. (padrão americano)
	$altura = (float) str_replace(",", ".", $altura);

	// Calculando o IMC
	$imc  = round($peso/pow($altura, 2), 2);

	// Aqui estamos construindo uma instrução SQL para inserção 
	// no banco de dados.
	$sql = "INSERT INTO Usuario (us_email, us_senha, us_nome, us_dataNasc, us_sexo, us_altura, us_peso, us_limPontos, us_IMC) VALUES ";
	$sql .= "('".$email."', '".$senha."', '".$nome."', '".$dataNasc."', '".$sexo."', ".$altura.", ".$peso.", 0, ".$imc.")";


	// Aqui estamos executando a instrução SQL criada.
	// Note que se der erro, a função mysql_error() será chamada 
	// mostrando qual erro encontrado.
	mysql_query($sql) or die(mysql_error()." Erro ao inserir");

	// Caso não dê erro, o usuário será redirecionado para
	// a tela de cadastrado com sucesso.
?>
<html>
    <meta http-equiv="refresh" content="0; url=login.php" />
    <script language="javascript" type="text/javascript">
         alert("Cadastrado com sucesso!!! :D");
    </script>
</html>    