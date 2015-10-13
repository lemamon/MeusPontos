<?php
	// Primeiro iniciamos a sessão.
	session_start();

	// Zeramos as variáveis de sessão
	$_SESSION["nome_logado"] = "";
	$_SESSION["email_logado"] = "";
    
    if(isset($_COOKIE['lembrar'])) {
        //Salvando um valor nulo no cookie e expirando o tempo de vida dele.
        setcookie('lembrar',null,-(time()+(60*60*24*30)));
    }

	// Chama a função de Destruição da Sessão!
	session_destroy();

	// redireciona para a tela inicial...
	header("location: index.html");
?>