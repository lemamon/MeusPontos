<?php 
	// Inicia a sessão nesta página.
	session_start();

	// Verificando se o usuário não fez login
	if(($_SESSION["nome_logado"] == "") || ($_SESSION["email_logado"] == "")){

		// Se o usuário não fez login, 
		// redirecione-o para a tela inicial para 
		// fazer login....
		header("location: index.html");
	}


	// Aqui pega o nome completo da pessoa e separa em pedaços
	// transformando o resultado em um array
	$nome_logado_array = explode(" ", $_SESSION["nome_logado"]);

	// Aqui conta os elementos dentro desse array gerado.
	$numero_elementos = count($nome_logado_array);

	// Aqui monta uma String com o primeiro nome e 
	// o último nome.
	$nome_logado = $nome_logado_array[0]." ".$nome_logado_array[$numero_elementos - 1];
?>

<html>
	<head>
		<title>::Bem vindo! ::.</title>
		<meta charset="utf-8" />
	</head>

	<body>
		<h1>Olá <?php echo $nome_logado ?>, seja bem vindo ao sistema</h1>
		<a href="logout.php">Sair</a>
	</body>

</html>