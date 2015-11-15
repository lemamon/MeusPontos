<?php
    include_once("header.php");
    include_once("conexao.php");

    $sql = "SELECT * FROM Usuario WHERE us_id = ".$_SESSION["id_logado"];
    $resultado = mysql_query($sql);
    $dados_do_banco = mysql_fetch_array($resultado);

    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        //echo "<script>alert('meta: '+".$_POST['nova_meta'].");</script>";

        $sql = "UPDATE Usuario SET us_limPontos = '".$_POST['nova_meta']."' WHERE us_id = ".$_SESSION["id_logado"];
        $resultado = mysql_query($sql);

        if($resultado){
            echo "<script>alert('Nova meta definida!');</script>";
        }
        header("location: telainicial.php");

        $sql = "SELECT * FROM Usuario WHERE us_id = ".$_SESSION["id_logado"];
        $resultado = mysql_query($sql);
        $dados_do_banco = mysql_fetch_array($resultado);
    }



?>
  <link rel="stylesheet" href="css/telainicial.css" media="all" type="text/javascript">
  <script type="text/javascript" src="js/telainicial.js"></script>
  <style media="screen">
    .ptInput{
        width: 90px;
        float: left;
    }
    .btsAlterar{
        margin-top: 15px;
    }
   	


  </style>

  <!--Alterar Meta-->
  <div class="controleMeta" >
      <h2>Sua Meta: <small><?php echo $dados_do_banco['us_limPontos']?> pontos</small></h2>
      <div class="input-group input-group-sm btAlterarMeta">
          <span class="input-group-btn">
              <button class="btn btn-default btControleBts" type="button">
                  <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                  Alterar Meta
              </button>
          </span>
      </div>
      <div class="clear" ></div>

      <form action="telainicial.php" method="post">
          <div class="btsAlterar">
              <div class="btn-group" role="group" aria-label="...">
                  <button type="button" class="btn btn-default btleft"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></button>
                  <input type="text" class="form-control ptInput" name="nova_meta" value="<?php echo $dados_do_banco['us_limPontos']?>" readonly="readonly">
                  <button type="button" class="btn btn-default btright"><span class="glyphicon glyphicon-minus" aria-hidden="true"></button>
              </div>
              <br><br>
              <input type="submit" class="btConfirma" value="Confirmar">
              <input type="reset" class="btCancelar" value="Cancelar">
          </div>
      </form>
  </div>
  <br>

    <div class="container center-block ">
      <div class="row">
      <div class="text-center bg-info col-md-6 alert alert-info">
          <h2>Dieta dos Pontos</h2>
          <h4 style="text-align: justify;"><br><br> A dieta dos pontos foi desenvolvida para quem quer emagrecer com sa&uacute;de sem deixar de comer o que gosta. <br><br>
	No lugar de calorias, voc&ecirc; soma pontos , assim fica livre para comer o que quiser, dentro do seu limite di&aacute;rio de pontos, e emagrece sem passar fome!<br><br>
Todo alimento &eacute; permitido, mas deve-se calcular o limite di&aacute;rio de pontos a serem consumidos, baseado nos fatores: sexo, idade, altura e peso.<br><br>
Ap&oacute;s o c&aacute;lculo do limite di&aacute;rio &eacute; s&oacute; consultar a tabela para saber quantos pontos tem cada alimento e come&ccedil;ar a registrar o consumo para controlar 
a quantidade de pontos ingeridos no dia. <br>
<br>Emagre&ccedil;a facilmente registrando e controlando o consumo de pontos com o Sistema Meus Pontos!<br> </h4></div>
        <div class="text-center bg-info col-md-5">      
	<canvas class="alert-info" id="GraficoDonut" style="width:100%;"></canvas>
	    <script type="text/javascript">

        	var options = {
                responsive:true
            };

        	var data = [
            {
                value: 20,
                color:"#d9534f",
                highlight: "#FF5A5E",
                label: "Pontos Consumidos"
        	},

            {
                value: 10,
                color: "#5bc0de",
                highlight: "#5AD3D1",
                label: "Pontos Restantes"
            },
            ]

            window.onload = function(){
            var ctx = document.getElementById("GraficoDonut").getContext("2d");
            var PizzaChart = new Chart(ctx).Doughnut(data, options);
            }
        </script>
	<br><br>	
    <div class="alert alert-danger text-center" role="alert"><h3>Pontos Consumidos: 20</h3></div>
    <div class="alert alert-info text-center" role="alert"><h3>Pontos Restantes: 10</h3></div>
    </div>
<?php
    include_once("footer.php")
?>
