<?php
    session_start();
    include_once("conexao.php");
    include_once("header.php");

    // Para encontrar o peso inicial
    $sql1 = "SELECT us_peso FROM Usuario WHERE us_id = ".$_SESSION['id_logado'];
    $result1 = mysql_query($sql1);
    $dados1 = mysql_fetch_array($result1);

    // Para listar todos os pesos cadastrados
    $sql = "SELECT * FROM HistoricoPeso WHERE hp_idUsuario = ".$_SESSION['id_logado'];
    $result = mysql_query($sql);
    $qtdeHistorico = mysql_num_rows($result);

    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        $sql = "INSERT INTO HistoricoPeso(hp_data, hp_peso, hp_idUsuario) VALUES
        (now(), '".$_POST['novo_peso']."', '".$_SESSION['id_logado']."')";

        mysql_query($sql);

        // Para encontrar o peso inicial
        $sql1 = "SELECT us_peso FROM Usuario WHERE us_id = ".$_SESSION['id_logado'];
        $result1 = mysql_query($sql1);
        $dados1 = mysql_fetch_array($result1);

        // Para listar todos os pesos cadastrados
        $sql = "SELECT * FROM HistoricoPeso WHERE hp_idUsuario = ".$_SESSION['id_logado'];
        $result = mysql_query($sql);
        $qtdeHistorico = mysql_num_rows($result);
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

      .txtpeso{
          width: 30%;
      }

      .btsalvar{
          margin-top: 20px;
      }
</style>
<div class="panel panel-default" id="panel_historico_peso">
    <div class="panel-heading">
        <h4>Histórico de Peso</h4>
        <span>Peso inicial: <?php echo $dados1['us_peso']?> kg</span>
    </div>
    <div class="panel-body" id="panel-body-detalhes">
      <?php if($qtdeHistorico > 0){?>
        <table>
            <thead><style media="screen">
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
            </style>
                <tr>
                    <th>Data</th>
                    <th>Peso</th>
                </tr>
            </thead>

            <tbody>
                <?php while($dados = mysql_fetch_array($result)){?>
                  <tr>
                      <td><?php echo date('d-m-Y', strtotime($dados['hp_data']));?></td>
                      <td><?php echo $dados['hp_peso'];?> kg</td>
                  </tr>
                  <?php } ?>
            </tbody>
        </table>
      <?php }else{ echo "Não houve nenhum registro de modificação de peso.";} // fim do IF?>
    </div>
    <div class="panel-footer">
        <form action="controlarpeso.php" method="post">
              <input type="text" class="form-control txtpeso" name="novo_peso" id="peso" placeholder="Informe seu peso atual">
              <button type="submit" id="btnAdicionar" class="btn btn-default btsalvar">Adicionar</button>
        </form>
    </div>
</div>


<?php include_once("footer.php");?>
