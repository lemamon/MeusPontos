<?php
    session_start();
    include_once("conexao.php");
    $data = $_POST["date"];

    $sql = "SELECT a.alim_descricao as 'Alimento', a.alim_qtdePontos as 'QtdePontos',
            a.alim_medida as 'Medida', c.cons_quantidade as 'Qtde' FROM Consumo c, Alimento a
            WHERE a.alim_id = c.cons_idAlimento AND
            c.hp_idUsuario = ".$_SESSION['id_logado']." AND
            c.cons_dataHora = '".$data."'";

    $result = mysql_query($sql) or die(mysql_error());
    $total = 0;
?>
<table>
    <tr>
        <th>Alimento consumido</th>
        <th>Pontos do alimento</th>
        <th>Quantidade consumida</th>
        <th>Total</th>
    </tr>
    <?php while($dados = mysql_fetch_array($result)){?>
        <tr>
            <td><?php echo utf8_encode($dados["Alimento"]);?></td>
            <td><?php echo $dados["QtdePontos"];?></td>
            <td><?php echo $dados["Qtde"];?>x - <?php echo utf8_encode($dados["Medida"]);?></td>
            <td><?php echo $dados["Qtde"] * $dados["QtdePontos"];?></td>
        </tr>
        <?php $total += $dados["Qtde"] * $dados["QtdePontos"];?>
    <?php } ?>
    <tr>
        <td colspan="4" style="text-align:right;"><b>Total: </b><?php echo $total; ?> pontos</td>
    </tr>
</table>
