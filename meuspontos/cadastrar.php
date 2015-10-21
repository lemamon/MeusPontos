<?php
		function calcularLimite($i, $p){
				$limite = 0;
				if(strcmp($sexo, "masculino") == 0){
						$limite = calcularLimiteMasculino($i, $p);
				}else{
						$limite = calcularLimiteFeminino($i, $p);
				}
				return $limite;
		}

		function calcularLimiteMasculino($i, $p){
				$limite = 0;
				if($i <= 50){
						$limite = calcularMascMenores50($p);
				}else{
						$limite = calcularMascMaiores50($p);
				}
				return $limite;
		}

		function calcularMascMenores50($peso){
				$limite = 0;
				if($peso <= 70){
						$limite = 400;
				}else if($peso > 70 && $peso < 80){
						$limite = 425;
				}else if($peso >= 80 && $peso < 90){
						$limite = 450;
				}else if($peso >= 90 && $peso < 100){
						$limite = 475;
				}else if($peso >= 100 && $peso < 110){
						$limite = 500;
				}else if($peso >= 110 && $peso < 120){
						$limite = 525;
				}else if($peso >= 120){
						$limite = 550;
				}
				return $limite;
		}

		function calcularMascMaiores50($peso){
				$limite = 0;
				if($peso <= 70){
						$limite = 380;
				}else if($peso > 70 && $peso < 80){
						$limite = 405;
				}else if($peso >= 80 && $peso < 90){
						$limite = 430;
				}else if($peso >= 90 && $peso < 100){
						$limite = 445;
				}else if($peso >= 100 && $peso < 110){
						$limite = 480;
				}else if($peso >= 110 && $peso < 120){
						$limite = 505;
				}else if($peso >= 120){
						$limite = 530;
				}
				return $limite;
		}

		function calcularLimiteFeminino($i, $p){
				$limite = 0;
				if($i <= 50){
						$limite = calcularFemMenores50($p);
				}else{
						$limite = calcularFemMaiores50($p);
				}
				return $limite;
		}

		function calcularFemMenores50($peso){
				$limite = 0;
				if($peso <= 60){
						$limite = 300;
				}else if($peso > 60 && $peso < 70){
						$limite = 325;
				}else if($peso >= 70 && $peso < 80){
						$limite = 350;
				}else if($peso >= 80 && $peso < 90){
						$limite = 375;
				}else if($peso >= 100 && $peso < 110){
						$limite = 400;
				}else if($peso >= 110 && $peso < 120){
						$limite = 425;
				}else if($peso >= 120){
						$limite = 450;
				}
				return $limite;
		}

		function calcularFemMaiores50($peso){
				$limite = 0;
				if($peso <= 60){
						$limite = 280;
				}else if($peso > 60 && $peso < 70){
						$limite = 305;
				}else if($peso >= 70 && $peso < 80){
						$limite = 330;
				}else if($peso >= 80 && $peso < 90){
						$limite = 355;
				}else if($peso >= 100 && $peso < 110){
						$limite = 380;
				}else if($peso >= 110 && $peso < 120){
						$limite = 405;
				}else if($peso >= 120){
						$limite = 430;
				}
				return $limite;
		}


		function calcularIdade($birthDate){
				//date in mm/dd/yyyy format; or it can be in other formats as well

				//explode the date to get month, day and year
				$birthDate = explode("/", $birthDate);

				//get age from date or birthdate
				$age = (date("md", date("U", mktime(0, 0, 0, $birthDate[0], $birthDate[1], $birthDate[2]))) > date("md") ? ((date("Y") - $birthDate[2]) - 1) : (date("Y") - $birthDate[2]));
				return $age;
		}

  // Aqui estamos chamando nossa conexão
  // com o banco de dados. Uma vez que vamos
  // utilizar ela em todo esse documento;
	include_once("conexao.php");

	// Fazendo as variáveis receberem os valores
	// vindos lá da página HTML.
	$nome = $_POST["nome"];
	$dataNasc = $_POST["data_nasc"];

	// Continuando com o preechimento de variáveis vindas
	// formulário.
	$sexo = $_POST["sexo"];
	$peso_usuario = $_POST["peso"];
	$altura = $_POST["altura"];
	$email = $_POST["email"];
	$senha = md5($_POST["senha"]); // Senha "criptografada".

	// Convertendo a string para float.
	// Tirando a vírgula e colocando o ponto. (padrão americano)
	$altura = (float) str_replace(",", ".", $altura);

	// Calculando o IMC
	$imc  = round($peso_usuario/pow($altura, 2), 2);

	$idade = calcularIdade($dataNasc);
	$limPontos = calcularLimite($idade, $peso_usuario);

	// Convertendo a data para o padrão (aaaa-mm-dd)
	// para poder os dados serem salvos corretamente no banco de dados.
	$dataNascArray = explode("/", $dataNasc);
	$dataNasc = $dataNascArray[2]."-".$dataNascArray[1]."-".$dataNascArray[0];

	// Aqui estamos construindo uma instrução SQL para inserção
	// no banco de dados.
	$sql = "INSERT INTO Usuario (us_email, us_senha, us_nome, us_dataNasc, us_sexo, us_altura, us_peso, us_limPontos, us_IMC) VALUES ";
	$sql .= "('".$email."', '".$senha."', '".$nome."', '".$dataNasc."', '".$sexo."', ".$altura.", ".$peso_usuario.", ".$limPontos.", ".$imc.")";


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

<?php

?>
