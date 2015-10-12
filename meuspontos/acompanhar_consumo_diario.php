<?php
    include_once("header.php")
?>

<link type="text/css" rel="stylesheet" href="css/acompanharconsumodiario.css" charset="utf-8">
<script src="js/acompanharconsumodiario.js"></script>

<div class="panel panel-default" id="painel_exibir_consumo">
    <div class="panel-heading">
          <h3>Acompanhar Consumo</h3>
          <div class="input-group input-group-sm" id="alterarData">
              <input type="date" class="form-control" id="data" placeholder="60" value="<?php echo date('d/m/Y')?>">
              <span class="input-group-btn">
                  <button class="btn btn-default " type="button" id="bt_alterar_data">
                      <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                      Alterar Data
                  </button>
              </span>
          </div>
    </div>
    <div class="panel-body">

    </div>
    <div class="panel-footer">

    </div>
</div>



<?php include_once("footer.php") ?>
