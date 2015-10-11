<?php
    include_once("header.php");
?>
  <h2 class="text-center">Sua Meta: <small>50 pontos.</small></h2>

  <!--Alterar Meta-->
  <div class="col-lg-2 col-md-offset-5 ">
      <div class="input-group input-group-sm">
          <input type="text" class="form-control" placeholder="60">
          <span class="input-group-btn">
              <button class="btn btn-default " type="button">
                  <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                  Alterar Meta
              </button>
          </span>
      </div>
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
