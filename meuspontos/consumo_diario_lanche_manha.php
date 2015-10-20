<?php
    $sql = "SELECT a.alim_descricao as 'alimento', c.cons_quantidade as 'quantidade',
            c.cons_refeicao as 'refeicao', a.alim_medida as 'medida',
            a.alim_qtdePontos as 'pontos' FROM Consumo c, Alimento a
            WHERE c.cons_idAlimento = a.alim_id AND c.cons_dataHora = '".$data."' AND
            c.cons_refeicao = 'lanche_da_manha' AND
            c.hp_idUsuario = ".$_SESSION['id_logado']." ORDER BY c.cons_refeicao";

    $result = mysql_query($sql) or die("Erro ao buscar dados. ".mysql_error());
    $total_registros = mysql_num_rows($result);
    if($total_registros > 0){
?>
        <h3>Lanche da manhã</h3>

        <table>
            <tr>
                <th>Alimento</th>
                <th>Quantidade</th>
                <th>Pontos adicionados</th>
            </tr>

            <?php while($dado = mysql_fetch_array($result)){?>
                <tr>
                    <td><?php echo $dado['alimento']?></td>
                    <td><?php echo $dado['quantidade']?> (<?php echo $dado['medida']?>)</td>
                    <td><?php echo $dado['pontos']?></td>
                    <td>
                        <a class="glyphicon glyphicon-pencil btsControle" id="editar" href=""></a>
                        <a class="glyphicon glyphicon-remove btsControle" id="excluir" href="javascript:func()" onclick="funExcluir()"></a>
                        <a class="glyphicon glyphicon-ok btsControle" id="submit" href=""></a>
                    </td>
                </tr>
            <?php }?>
        </table>
<?php } ?>
