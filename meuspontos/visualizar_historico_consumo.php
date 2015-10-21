<?php
    session_start();
    include_once("header.php");
    include_once("conexao.php");

    $sql = "SELECT cons_dataHora FROM Consumo WHERE hp_idUsuario = ".$_SESSION['id_logado']." GROUP BY cons_dataHora";
    $result = mysql_query($sql) or die (mysql_error());
    $dias_totalPontos = array();
    $index = 0;
    while ($dados = mysql_fetch_array($result)) {
        $query = "SELECT a.alim_qtdePontos as 'qtde_pontos',
                  c.cons_quantidade as 'qtde_consumida' FROM Consumo c, Alimento a
                  WHERE c.cons_idAlimento = a.alim_id  AND c.cons_dataHora = '".$dados['cons_dataHora']."'
                  AND c.hp_idUsuario = ".$_SESSION['id_logado'];

        $resultado = mysql_query($query);
        $total_pontos_consumidos = 0;
        while($dado = mysql_fetch_array($resultado)){
            $tot = $dado['qtde_pontos'] * $dado['qtde_consumida'];
            $total_pontos_consumidos += $tot;
        }

        $dias_totalPontos[$index][0] = $dados['cons_dataHora'];
        $dias_totalPontos[$index][1] = $total_pontos_consumidos;
        $index++;
    }
?>
<style media="screen">
    table{
        width: 34%;
        margin: auto;
    }

    table th{
        text-align: center;
    }
    table td{
        text-align: center;
    }
</style>

<div class="panel panel-warning">
    <div class="panel-heading">
        <h4>Visualizar Histórico de Consumo</h4>
    </div>

    <div class="panel-body">
        <table>
            <tr>
                <th>Data</th>
                <th>Pontos</th>
                <th></th>
            </tr>
            <?php
            $fimlaco = count($dias_totalPontos);
            for ($i = 0; $i < $fimlaco; $i++) {?>
                <tr>
                    <td><?php echo date("d-m-Y", strtotime($dias_totalPontos[$i][0]))?></td>
                    <td><?php echo $dias_totalPontos[$i][1];?></td>
                    <td></td>
                </tr>
            <?php } ?>
        </table>
    </div>

    <div class="panel-footer"></div>
</div>


<?php include_once("footer.php");?>
