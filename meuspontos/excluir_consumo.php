<?php

  include_once("conexao.php");

  $idUsuario = $_POST['idUsuario'];
  $idAlimento = $_POST['idAlimento'];
  $data = $_POST['dt'];

  $sql = "DELETE FROM Consumo WHERE hp_idUsuario = ".$idUsuario."
          AND cons_idAlimento = ".$idAlimento." AND cons_dataHora = '".$data."'";

  //echo mysql_query($sql) or die(mysql_error());
  if(mysql_query($sql)){
      echo "true";
  }else{
      echo "false";
  }

?>
