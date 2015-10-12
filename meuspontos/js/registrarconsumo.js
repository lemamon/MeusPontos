$(document).ready(function(){
    setTimeout(function() {}, 2000);

    var arrAlimentos = new Array();
    var nomeAlimento;
    var idAlimento;
    var qtdeAlimento;
    var qtdePontos;
    var elementoAlimento;
    var json;

    $("#msg_erro_nenhum_alimento").hide();
    $("#msg_erro_ao_salvar").hide();
    $("#msg_sucesso_ao_salvar").hide();
    $("#panelAddAlimento").hide();

    $(":radio").click(function(){
        $("#panelAddAlimento").show();
    });

    $("#alimentos li a").click(function(){
        elementoAlimento = $(this);
        if(!$(this).parent().hasClass("disabled")){
            $("#painelAlimentoQuantidade").show();
            nomeAlimento = $(this).html();
            idAlimento = $(this).children("#id_alimento").val();
            qtdePontos = $(this).children("#qtde_pontos").val();

            var indiceFimAlimento = nomeAlimento.indexOf(" -");
            nomeAlimento = nomeAlimento.substring(0, indiceFimAlimento);
            var titulo = "Informe a quantidade ingerida de <b>" + nomeAlimento + "</b>";
            $("#titulo_painel_quantidade").html(titulo);
            $("#quantidade").focus();
            //alert($(this).children("#alim_medida").val());
            $(".qtde-wrapper div#medida").text($(this).children("#alim_medida").val());
        }
    });

    function adicionarAlimento(){
        qtdeAlimento = $("#quantidade").val();
        qtdeAlimento = parseInt(qtdeAlimento);
        var total = qtdeAlimento * qtdePontos;

        arrAlimentos.push(idAlimento);
        arrAlimentos.push(nomeAlimento);
        arrAlimentos.push(qtdePontos);
        arrAlimentos.push(qtdeAlimento);

        $("#painelAlimentoSelecionado").show();

        var corpo_tabela = $("#painelAlimentoSelecionado table tbody").html();
        corpo_tabela += "<tr><td>"+nomeAlimento+"</td><td>"+qtdePontos+"</td><td>"+qtdeAlimento+"</td><td>"+total+"</td></tr>";

        $("#painelAlimentoSelecionado table tbody").html(corpo_tabela);
        $("#bt_limpar_lista").show();
        $("#painelAlimentoQuantidade").hide();
        $(elementoAlimento).parent().addClass("disabled");
        if($("#msg_erro_nenhum_alimento").is(":visible")){
            $("#msg_erro_nenhum_alimento").hide();
        }
    }

    $("#bt_add_alimento_consumido").click(function(){
        var qtde = $("#quantidade").val();
        qtde = parseInt(qtde);
        if( !isNaN(qtde) && qtde > 0 ){
            adicionarAlimento();
        }
        $("#quantidade").val("");

    });

    $("#quantidade").keypress(function(e){
        var qtde = $("#quantidade").val();
        qtde = parseInt(qtde);
        if(e.which == 13){
            if( !isNaN(qtde) && qtde > 0 ){
                adicionarAlimento();
            }
            $("#quantidade").val("");
        }
    });

    $("#bt_limpar_lista").click(function(){
        var corpo_tabela = $("#painelAlimentoSelecionado table tbody").html();
        corpo_tabela = "";
        $("#painelAlimentoSelecionado table tbody").html(corpo_tabela);
        arrAlimentos = new Array();

        $("#alimentos li").each(function(index, element){
            if($(element).hasClass("disabled")){
                $(element).removeClass("disabled");
            }
        });

        $(this).hide();
    });

    $("#bt_fechar_modal").click(function(){
        $("#painelAlimentoQuantidade").hide();
    });

    $("#form_registro_consumo").submit(function(){
        if(arrAlimentos.length == 0){
            $("#msg_erro_nenhum_alimento").show();
        }else{
            gerarJSON();
            salvarRegistroConsumo();
            console.log(json);
        }
        return false;
    });

    function salvarRegistroConsumo(){
        $.post('salvar_registros_consumo.php',
              {jsonData:json},
              function(data){
                  $("#painel_de_insercao").hide();
                  if(data == parseInt(data, 10)){
                      $("#msg_sucesso_ao_salvar").show();
                  }else{
                      $("#msg_erro_ao_salvar").show();
                      $("#msg_erro_server").text(data);
                  }
              }, "text");
    }

    function gerarJSON(){
        var data = formatarData($("#data").val());

        json = "{\"data\": \"" + data + "\", ";
        json += "\"refeicao\": \"" + $(":radio:checked").val() + "\", ";
        json += "\"alimentos\":[";
        for(var i = 0; i < arrAlimentos.length; i+=4){
            json += "{";
            json += "\"id\": \"" + arrAlimentos[i] + "\",";
            json += "\"nomeAlimento\": \"" + arrAlimentos[i + 1] + "\",";
            json += "\"qtdePontos\": " + arrAlimentos[i + 2] + ",";
            json += "\"qtdeAlimento\": "  + arrAlimentos[i + 3] + "";
            json += "},";
        }
        json = json.substring(0, json.lastIndexOf(","));
        json += "]}";
    }

    function formatarData(data){
        if(data.indexOf("/") > 0){
            data = data.split("/");
            var us_data = data.reverse().join("-");
            return us_data;
        }
    }
});
