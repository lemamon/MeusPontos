<?php

	// Aqui chamamos o arquivo de conexão
    // com o banco de dados
	include_once("conexao.php");

	// Aqui estamos recebendo os valores
	// preenchidos pelo usuário no formulário.
	$email = $_POST["email"];
	$senha = $_POST["senha"];

	// Aqui estamos utilizando uma medida de segurança
	// para evitar o SQL Injection.
	$email = mysql_real_escape_string($email);
	$senha = mysql_real_escape_string($senha);

	// Aqui estamos criando uma consulta no banco de dados e
	// passando os valores digitados no formulário para verificar
	// junto ao banco de dados se existem valores.
	$sql = "SELECT * FROM Usuario WHERE us_email = '".$email."' AND us_senha = '".md5($senha)."'";

	// Aqui estamos executando a consulta no banco de dados.
	// Notem que se der erro, a função: mysql_error() vai ser chamada,
	// informando o erro encontrado.
	$busca = mysql_query($sql) or die(mysql_error()." <br/>Erro");


	// Aqui estamos contando o número de resultados encontrados.
	$num_resultados = mysql_num_rows($busca);

	// Aqui estamos colocando os resultados encontrados,
	// dentro de uma variável (que na verdade é um array)
	$dados_do_banco = mysql_fetch_array($busca);


	// Aqui estamos verificando se o número de resultados
	// encontrados é maior que 0.
	if($num_resultados > 0){

		//Se for maior que 0, então iniciamos a sessão.
		session_start();

		// Aqui estamos criando as variáveis de sessão
		// para armezar os valores e utilizá-los entre as
		// páginas.
		$_SESSION["id_logado"] = $dados_do_banco["us_id"];
		$_SESSION["nome_logado"] = $dados_do_banco["us_nome"];
		$_SESSION["email_logado"] = $dados_do_banco["us_email"];

        //Verifica se a opção lembrar-me foi habilitada.
        if(isset($_POST["lembrar"])){
            //Tempo de vida do cookie.
            $tempo_expiracao = (time()+(60*60*24*30));
            //Set o cookie com a tag lembrar.
            setcookie('lembrar', $senha, $tempo_expiracao);
        }

		// Aqui estamos redirecionando para tela inicial do usuário logado.
		header("Location: telainicial.php");

	}else{
		// O usuário não foi encontrado.
		// Redirecionamos para a página de não econtrado.
		?>
        <html>
        <meta http-equiv="refresh" content="0; url=login.php" />
            <script language="javascript" type="text/javascript">
                 alert("Dados não encontrados... :'(");
            </script>
        </html>    
        <?php
    }    
?>