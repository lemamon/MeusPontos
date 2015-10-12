<?php
include_once("conexao.php");

function salvarRegistroConsumo($data, $refeicao, $alimentos){
    session_start();
    $salvou = 0;
    $msgErro;
    foreach ($alimentos as $alimento) {
        $sql = "INSERT INTO ";
        $sql .= "Consumo(hp_idUsuario, cons_idAlimento, cons_refeicao, cons_quantidade, cons_dataHora)";
        $sql .= "values (";
        $sql .= $_SESSION["id_logado"].",".$alimento["id"].",'".$refeicao."',".$alimento["qtdeAlimento"].",'".$data."'";
        $sql .= ")";

        echo mysql_query($sql) or die("Erro ao inserir. ".mysql_error());
    }
}
//----------------
function nomeRefeicao($str){
    if($str == "cafe_da_manha"){
        return "Café da Manhã";
    }else if($str == "lanche_da_manha"){
        return "Lanche da Manhã";
    }else if($str == "almoco"){
        return "Almoço";
    }else if($str == "lanche_da_tarde"){
        return "Lanche da Tarde";
    }else if($str == "janta"){
        return "Janta";
    }else if($str == "lanche_da_manha"){
        return "Lanche da Noite";
    }
}
//----------------
function pesquisarAlimento($id){
    $sql = "SELECT * FROM Alimento WHERE alim_id = ".$id;
    $resultado = mysql_query($sql);
    $dados = mysql_fetch_array($resultado, MYSQL_ASSOC);
    echo json_encode($dados);
}

$jsonData = $_POST["jsonData"];
if($jsonData == ""){
    echo "Dados estão vazios.";
}else{
    $jsonData = json_decode($jsonData, true);
    $data = $jsonData["data"];
    $refeicao = $jsonData["refeicao"];
    $alimentos = $jsonData["alimentos"];

    salvarRegistroConsumo($data, $refeicao, $alimentos);
}

?>
