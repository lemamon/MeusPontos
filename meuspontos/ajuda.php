<?php     include_once("conexao.php");
    include_once("header.php");    $sql = "SELECT * FROM Alimento ORDER BY alim_descricao ASC";
    $resultado = mysql_query($sql);?>
<html>
  <head>
    <meta content="text/html; charset=windows-1252" http-equiv="content-type">
    <link type="text/css" rel="stylesheet" href="css/ajuda.css" charset="utf-8">
  </head>
  <body>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3>Ajuda</h3>
      </div>
      <div class="panel-body">
        <div class="topico">Alterar Meta</div>
        <div class="conteudo"> O Sistema Meus Pontos calcula o limite di&aacute;rio de
          pontos com base nos fatores: sexo, idade, altura e peso.<br>
          Voc&ecirc; pode ajustar o seu limite de acordo com suas necessidades de
          consumo, aumentando ou diminuindo a meta de pontos di&aacute;rio.<br><br>
        </div>
        <div class="topico">Registrar Consumo</div>
        <div class="conteudo"> Selecione os alimentos e registre seu consumo
          para controlar a quantidade de pontos ingeridos no dia. <br><br> </div>
        <div class="topico">Consumo Di&aacute;rio</div>
        <div class="conteudo"> Acompanhe os itens consumidos na data escolhida.<br><br>
        </div>
        <div class="topico">Hist&oacute;rico de Consumo</div>
        <div class="conteudo"> Visualize o hist&oacute;rico do total de pontos
          consumidos diariamente e acompanhe como est&aacute; consumindo seus pontos. <br><br> </div>
        <div class="topico">Tabela de Alimentos</div>
        <div class="conteudo"> Consulte o valor em pontos de cada alimento. <br>
          Voc&ecirc; pode personalizar sua tabela de alimentos incluindo um novo
          alimento para adequar as suas necessidades. <br><br>
        </div>
        <div class="topico">Controlar Peso</div>
        <div class="conteudo"> Voc&ecirc; pode cadastrar seu peso na data que voc&ecirc;
          desejar, para acompanhar a evolu&ccedil;&atilde;o do seu processo de emagrecimento.
          <br><br>
        </div>
      </div>
    </div>
    <?php include_once("footer.php"); ?>
    
  </body>
</html>
