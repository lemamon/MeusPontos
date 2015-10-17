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
              <br/><br/>
              <input type="submit" class="btConfirma" value="Confirmar"/>
              <input type="reset" class="btCancelar" value="Cancelar"/>
          </div>
      </form>
  </div>
  <br>
  <br>

  <div class="box-chart">
      <canvas id="GraficoDonut" style="width:100%;"></canvas>
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
    </div>
    <div class="alert alert-danger text-center" role="alert"><h3>Pontos Consumido: 20</h3></div>
    <div class="alert alert-info text-center" role="alert"><h3>Pontos Restantes: 10</h3></div>
<?php
    include_once("footer.php")
?>
