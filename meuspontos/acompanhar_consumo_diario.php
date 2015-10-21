<?php
    include_once("conexao.php");
    include_once("header.php");
    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        $data = $_POST['data'];
        $explode = "-";
        $pos = strripos($data, "/");
        if($pos != false){
            $explode = "/";
        }
        $dataArr = explode($explode, $data);
        $dataArr = array_reverse($dataArr);
        $data = $dataArr[0]."-".$dataArr[1]."-".$dataArr[2];
   }else{
        $data = date('Y-m-d');
   }

?>

<link type="text/css" rel="stylesheet" href="css/acompanharconsumodiario.css" charset="utf-8">
<script src="js/acompanharconsumodiario.js"></script>

<div class="panel panel-default" id="painel_exibir_consumo">
    <div class="panel-heading">
          <form action="acompanhar_consumo_diario.php" method="post">
              <h3>Acompanhar Consumo</h3>
              <div class="input-group input-group-sm" id="alterarData">
                  <input type="text" class="form-control" id="data" name="data" value="<?php echo date("d-m-Y", strtotime($data))?>">
                  <span class="input-group-btn">
                      <button class="btn btn-default " type="submit" id="bt_alterar_data">
                          <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                          Alterar Data
                      </button>
                  </span>
              </div>
          </form>
    </div>
    <div class="panel-body">
        <?php
           include_once("consumo_diario_cafe_da_manha.php");
           include_once("consumo_diario_lanche_manha.php");
           include_once("consumo_diario_almoco.php");
           include_once("consumo_diario_lanche_tarde.php");
           include_once("consumo_diario_janta.php");
           include_once("consumo_diario_lanche_da_noite.php");
        ?>
    </div>
    <div class="panel-footer">

    </div>
</div>

<?php include_once("footer.php") ?>
