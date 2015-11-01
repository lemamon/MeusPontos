<?php

  include("header.php");
  include("conexao.php");

  $query = "SELECT alim_id, alim_descricao, alim_tipo, alim_medida, alim_qtdePontos FROM Alimento";
  $result = mysql_query($query);

  if($_SERVER['REQUEST_METHOD'] === 'POST') {
      $descricao = $_POST["alimento"];
      $tipo = $_POST["tipo_alimento"];
      $medida = $_POST["medida"];
      $qtdePontos = $_POST["qtde_pontos"];

      $query = "INSERT INTO Alimento(alim_descricao, alim_tipo, alim_medida, alim_qtdePontos) VALUES
      ('".$descricao."', '".$tipo."', '".$medida."', '".$qtdePontos."')";

      mysql_query($query) or die(mysql_error());
      $query = "SELECT alim_id, alim_descricao, alim_tipo, alim_medida, alim_qtdePontos FROM Alimento";
      $result = mysql_query($query);
  }

?>
<style media="screen">
    table{
      width: 100%;
    }

    table th{
      text-align: left;
      border-bottom: 2px solid #DDDDDD;
      padding-top: 0.5%;
      padding-bottom: 0.5%;
    }

    table td{
      padding-top: 1%;
      padding-bottom: 1%;
      text-align: left;
      border-bottom: 1px solid #ccc;
    }

    #btnAdicionar{
        float: right;
    }
    #titulo{
        float:left;
    }
    .panel-heading{
        height: 60px;
    }

    .btcontrols{
        cursor: pointer;
        margin-left: 20px;
    }

    .delete{
        width: 30px;
        height: 30px;
    }
</style>

<script type="text/javascript" src="js/tabela_alimentos.js"></script>
<form action="TabelaDeAlimentos.php" method="post" id="form">
    <div class="panel panel-default">
        <div class="panel-heading">
            <div>
                <h4 id="titulo">Manter Tabela de Alimentos</h4>
                <button type="button" id="btnAdicionar" class="btn btn-default">Adicionar</button>
                <div class="clear" id="clear_titulo"></div>
            </div>
        </div>
        <div class="panel-body">
            <table id="tblCadastro" class="table">
                <thead>
                    <tr>
                        <th>Alimento</th>
                        <th>Tipo de Alimento</th>
                        <th>Quantidade Pontos</th>
                        <th>Medida</th>
                    </tr>
                </thead>

                <tbody>
                <?php while($dado = mysql_fetch_array($result)){ ?>
                    <tr>
                        <td>
                            <span class="row-description"><?php echo utf8_encode($dado["alim_descricao"]);?></span>
                        </td>
                        <td>
                            <span class="row-description"><?php echo utf8_encode($dado["alim_tipo"]);?></span>
                        </td>
                        <td>
                            <span class="row-description"><?php echo $dado["alim_qtdePontos"];?></span>
                        </td>
                        <td>
                            <span class="row-description"><?php echo utf8_encode($dado["alim_medida"]);?></span>
                        </td>
                    </tr>
                  <?php } ?>
                </tbody>
            </table>
        </div>
        <div class="panel-footer"></div>
    </div>
</form>
<?php include("footer.php"); ?>
