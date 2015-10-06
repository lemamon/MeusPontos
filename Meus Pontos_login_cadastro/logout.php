<?php
	// Primeiro iniciamos a sessão.
	session_start();

	// Zeramos as variáveis de sessão
	$_SESSION["nome_logado"] = "";
	$_SESSION["email_logado"] = "";

	// Chama a função de Destruição da Sessão!
	session_destroy();

	// redireciona para a tela inicial...
	header("location: index.html");
?>