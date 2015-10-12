<?php
    include_once("conexao.php");
    include_once("header.php");
    $sql = "SELECT * FROM Alimento";
    $resultado = mysql_query($sql);
?>

<link type="text/css" rel="stylesheet" href="css/registrarconsumo.css" charset="utf-8">
<form role="form" action="inserir_registro_consumo.php" method="post" id="form_registro_consumo">
    <div class="panel panel-default" id="painel_de_insercao">
        <div class="panel-heading">
            <h3>Registrar Consumo</h3>
        </div>
        <div class="panel-body">
            <div class="form-group">
                <label for="data">Data: </label>
                <input type="date" required class="form-control" id="data" value="<?php echo date('d/m/Y')?>">
            </div>
            <div class="form-group">
                <label for="refeicao">Refeição:</label>
                <label class="radio-inline">
                    <input type="radio" required name="refeicao" value="cafe_da_manha">Café da Manhã
                </label>
                <label class="radio-inline">
                    <input type="radio" required name="refeicao" value="lanche_da_manha">Lanche da Manhã
                </label>
                <label class="radio-inline">
                    <input type="radio" required name="refeicao" value="almoco">Almoço
                </label>
                <label class="radio-inline">
                    <input type="radio" required name="refeicao" value="lanche_da_tarde">Lanche da Tarde
                </label>
                <label class="radio-inline">
                    <input type="radio" required name="refeicao" value="janta">Janta
                </label>
                <label class="radio-inline">
                    <input type="radio" required name="refeicao" value="lanche_da_noite">Lanche da Noite
                </label>
            </div>

            <!-- mensagem de erro para futuras validações --->
            <div class="alert alert-danger" role="alert" id="msg_erro_nenhum_alimento">
              <strong>Erro! </strong>Você deve inserir um alimento no mínimo.</div>

            <!-- inicio do subpainel -->
            <div class="panel panel-default" id="panelAddAlimento">
                <div class="panel-heading">Adicione os alimentos consumidos</div>
                <div class="panel-body">
                  <div class="dropdown">
                      <button class="btn btn-default dropdown-toggle" type="button" id="menuAlimentos" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                          Selecione um alimento
                          <span class="caret"></span>
                      </button>
                      <ul class="dropdown-menu" aria-labelledby="dropdownMenu1" id="alimentos">
                          <?php
                          while($dado = mysql_fetch_array($resultado)) {
                          ?>
                          <li>
                              <a>
                                  <?php echo utf8_encode($dado["alim_descricao"]) ?> -
                                  <span class="pontuacao_alimento"><?php echo $dado["alim_qtdePontos"] ?>pts</span>
                                  <input type="hidden" id="id_alimento" value="<?php echo $dado["alim_id"] ?>">
                                  <input type="hidden" id="qtde_pontos" value="<?php echo $dado["alim_qtdePontos"] ?>">
                                  <input type="hidden" id="alim_medida" value="<?php echo $dado["alim_medida"] ?>">
                              </a>
                          </li>
                          <?php
                          } // FIm do FOREACH
                          ?>
                      </ul>
                  </div>
                  <div class="panel panel-default" id="painelAlimentoQuantidade">
                      <div class="panel-heading" id="titulo_painel_quantidade"></div>
                      <div class="panel-body">
                          <div class="qtde-wrapper">
                              <input type="number" class="form-control" id="quantidade" placeholder="Digite a quantidade">
                              <div class="clear"></div>
                          </div>

                      </div>
                      <div class="panel-footer">
                          <button type="button" class="btn btn-default btn-primary" id="bt_add_alimento_consumido">Adicionar</button>
                      </div>
                 </div>
                  <div class="panel panel-default" id="painelAlimentoSelecionado">
                      <div class="panel-heading">Lista de Alimentos Inseridos
                          <button type="button" class="btn btn-default" id="bt_limpar_lista">Limpar Lista</button>
                      </div>
                      <div class="panel-body">
                          <table>
                                <thead>
                                    <tr>
                                        <th>
                                            Alimento
                                        </th>
                                        <th>
                                            Pontos
                                        </th>
                                        <th>
                                            Qtde. Consumida
                                        </th>
                                        <th>
                                            Total
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                          </table>
                      </div>
                  </div>
                </div>
            </div>
            <!-- fim subpainel -->
        </div>
        <div class="panel-footer">
            <button type="submit" class="btn btn-default btn-primary" id="bt_salvar_consumo">Salvar Consumo</button>
        </div>
    </div> <!-- fim painel de inserção -->

    <!-- mensagens de retorno do servidor -->
    <div class="alert alert-danger" role="alert" id="msg_erro_ao_salvar">
        <strong>Erro! </strong><span id="msg_erro_server"></span>
        <div class="panel-footer">
            <button type="button" class="btn btn-default navbar-btn btn-primary" onclick="location.href='RegistrarConsumo.php'">Refazer</button>
        </div>
    </div>

    <div class="alert alert-info" role="alert" id="msg_sucesso_ao_salvar">
        <strong>Sucesso! </strong><span id="msg_sucesso_server"></span>
        <div class="panel-footer">
            <button type="button" class="btn btn-default navbar-btn btn-primary" onclick="location.href='RegistrarConsumo.php'">Refazer</button>
        </div>
    </div>


  </form>

<?php include_once("footer.php"); ?>
