<?php
    $sql = "SELECT a.alim_descricao as 'alimento', c.cons_quantidade as 'quantidade',
            c.cons_refeicao as 'refeicao', a.alim_medida as 'medida',
            a.alim_qtdePontos as 'pontos' FROM Consumo c, Alimento a
            WHERE c.cons_idAlimento = a.alim_id AND c.cons_dataHora = '".$data."' AND
            c.cons_refeicao = 'janta' AND
            c.hp_idUsuario = ".$_SESSION['id_logado']." ORDER BY c.cons_refeicao";

    $result = mysql_query($sql) or die("Erro ao buscar dados. ".mysql_error());
    $total_registros = mysql_num_rows($result);

    if($total_registros > 0){
?>
        <style media="screen">
            #janta_titulo{
                border-bottom: 1px dotted #000;
                padding-left: 74px;
                background: url("images/dinner.png") no-repeat left bottom;
                background-size: 55px 46px;
                padding-bottom: 5px;
                padding-top: 37px;
            }
        </style>
        <h3 id="janta_titulo">Janta</h3>
        <table>
            <tr>
                <th>Alimento</th>
                <th>Quantidade</th>
                <th>Pontos adicionados</th>
            </tr>

            <?php while($dados = mysql_fetch_array($result)){?>
                <tr>
                    <td><?php echo utf8_encode($dados['alimento']) ?></td>
                    <td><?php echo $dados['quantidade']?> (<?php echo utf8_encode($dados['medida'])?>)</td>
                    <td><?php echo $dados['pontos']?></td>
                    <td>
                        <a class="glyphicon glyphicon-pencil btsControle" id="editar" href=""></a>
                        <a class="glyphicon glyphicon-remove btsControle" id="excluir" href="javascript:func()" onclick="funExcluir()"></a>
                        <a class="glyphicon glyphicon-ok btsControle" id="submit" href=""></a>
                    </td>
                </tr>
            <?php }?>
        </table>
<?php } ?>
