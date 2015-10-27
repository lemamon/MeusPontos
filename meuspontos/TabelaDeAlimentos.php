<?php include("header.php"); ?>
<style media="screen">
    table{
      width: 100%;
    }

    table th{
      text-align: left;
      border-bottom: 2px solid #DDDDDD;
      padding-top: 0.5%;
      padding-bottom: 0.5%;
    }

    table td{
      padding-top: 1%;
      padding-bottom: 1%;
      text-align: left;
      border-bottom: 1px solid #ccc;
    }

    #btnAdicionar{
        float: right;
    }
    #titulo{
        float:left;
    }
    .panel-heading{
        height: 60px;
    }

    .btcontrols{
        cursor: pointer;
        margin-left: 20px;
    }

    .row-edition{
        display: none;
    }

    .delete{
        width: 30px;
        height: 30px;
    }
</style>

<script type="text/javascript" src="js/tabela_alimentos.js"></script>

<div class="panel panel-default">
    <div class="panel-heading">
        <div>
            <h4 id="titulo">Manter Tabela de Alimentos</h4>
            <button id="btnAdicionar" class="btn btn-default">Adicionar</button>
            <div class="clear" id="clear_titulo"></div>
        </div>
    </div>
    <div class="panel-body">
        <table id="tblCadastro" class="table">
            <thead>
                <tr>
                    <th>Alimento</th>
                    <th>Medida</th>
                    <th>Pontos</th>
                    <th>Opções</th>
                    <th></th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td>
                        <span class="row-description">Café</span>
                        <input type="text" name="alimento" class="row-edition" value="Café"/>
                    </td>
                    <td>
                        <span class="row-description">2 Copos</span>
                          <input type="text" name="alimento" class="row-edition" value="2 Copos"/>
                    </td>
                    <td>
                        <span class="row-description">2.5</span>
                        <input type="text" name="alimento" class="row-edition" value="2.5"/>
                    </td>
                    <td>
                        <img class='save btcontrols' src='images/disk.png' title="Salvar"/>
                        <img class='edit btcontrols' src='images/pencil.png' />
                        <img class='cancelEditing btcontrols' src='images/cancel.png' title="Cancelar Edição"/>
                        <img class='delete btcontrols' src='images/delete.png' title="Excluir Alimento"/>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="panel-footer">

    </div>
</div>
<div class="col-sm-offset-10 col-sm-5" style="display:none;">
    <button type="submit" class="btn btn-default">Salvar Alterações</button>
</div>
<?php include("footer.php"); ?>
