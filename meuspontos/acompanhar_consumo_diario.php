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

   $query = "SELECT a.alim_descricao, a.alim_qtdePontos as 'qtde_pontos',
             c.cons_quantidade as 'qtde_consumida' FROM Consumo c, Alimento a
             WHERE c.cons_idAlimento = a.alim_id  AND c.cons_dataHora = '".$data."'
             AND c.hp_idUsuario = ".$_SESSION['id_logado'];

   $resultado = mysql_query($query);
   $total_pontos_consumidos = 0;
   while($dados = mysql_fetch_array($resultado)){
      $tot = $dados['qtde_pontos'] * $dados['qtde_consumida'];
      //echo $dados['qtde_pontos'] ."*". $dados['qtde_consumida']."=".$tot."<br/>";
      $total_pontos_consumidos += $tot;
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
              <b>Total para o dia <?php echo date("d-m-Y", strtotime($data))?>:</b>
              <?php
                  if($total_pontos_consumidos >= 1000){
                      $tmp = $total_pontos_consumidos / 1000;
                  }else{
                      $tmp = $total_pontos_consumidos;
                  }
                  echo $tmp ." pontos consumidos!"
                ?>
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

<!-- Modal -->
<div id="modalExcluir" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Confirma a exclusão dos dados abaixo?</h4>
            </div>
            <div class="modal-body">
                <table>
                    <thead>
                        <tr>
                            <th>Alimento</th>
                            <th>Quantidade - Medida</th>
                            <th>Pontos do alimento</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="btConfirmarExcluir" data-dismiss="modal">Sim</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(function(){
        var id_usuario, id_alimento, data;
        $(".btExcluir").click(function(){
            var btContent = $(this).attr("data-content");

            var arrContent = btContent.split(';');
            var qtde = parseInt(arrContent[1]);
            var pontos = parseInt(arrContent[3]);
            id_usuario = parseInt(arrContent[4]);
            id_alimento = parseInt(arrContent[5]);
            data = arrContent[6];
            var htmlContent = "<tr><td>"+arrContent[0]+"</td><td>"+qtde+"x ("+arrContent[2]+")</td><td>"+pontos+"</td></tr>";
            $(".modal-body tbody").html(htmlContent);

            //alert(id_usuario + " - "+id_alimento+" - "+data);
        });

        $("#btConfirmarExcluir").click(function(){
            $.post("excluir_consumo.php", {idUsuario:id_usuario, idAlimento:id_alimento, dt:data}, function(data){
                if(data == "true"){
                    alert("Excluído com sucesso!");
                    location.href="acompanhar_consumo_diario.php";
                }
            }, 'text');
        });
    });
</script>

<?php include_once("footer.php") ?>
