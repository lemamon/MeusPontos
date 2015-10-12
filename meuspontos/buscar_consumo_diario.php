<?php
    session_start();
    include_once("conexao.php");

    $data = $_POST['dataConsumo'];

    $sql = "SELECT a.alim_descricao as 'alimento', c.cons_quantidade as 'quantidade',
            c.cons_refeicao as 'refeicao', a.alim_medida as 'medida',
            a.alim_qtdePontos as 'pontos' FROM Consumo c, Alimento a
            WHERE c.cons_idAlimento = a.alim_id AND c.cons_dataHora = '".$data."' AND ";
    $sql .= "c.hp_idUsuario = ".$_SESSION['id_logado']." ORDER BY c.cons_refeicao";

    $result = mysql_query($sql) or die("Erro ao buscar dados. ".mysql_error());

    /*$index = 0;
    $meuJson = "{";
    while($dados = mysql_fetch_array($result, MYSQL_ASSOC)){
        $meuJson .= "".$index.":{";
        $meuJson .= "\"alimento\":\"".$dados["alimento"]."\",";
        $meuJson .= "\"quantidade\":".$dados["quantidade"].",";
        $meuJson .= "\"refeicao\":\"".$dados["refeicao"]."\",";
        $meuJson .= "\"medida\":\"".$dados["medida"]."\",";
        $meuJson .= "\"pontos\":".$dados["pontos"]."";
        $meuJson .= "},";
        $index++;
    }
    $lastIndex = strripos($meuJson, ",");
    $meuJson = substr($meuJson, 0, $lastIndex);
    $meuJson .= "}";
    echo $meuJson;*/

    
?>
