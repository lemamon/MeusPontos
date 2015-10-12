<?php
    include_once("conexao.php");
    $term = $_GET["term"];


    echo "<script type='text/javascript'>
              alert('".$term."');
          </script>";

?>
