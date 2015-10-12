$(function(){
    var dataConsumo;
    var arrConsumo;
    var obj = new Array();

    $("#bt_alterar_data").click(function(){
        dataConsumo = formatarData($("#data").val());
        $.post('buscar_consumo_diario.php', {dataConsumo:dataConsumo}, function(data){
            //gerarArrayDados(data);
            console.log(data.length);
        }, 'json');
    });

    function formatarData(data){
        if(data.indexOf("/") > 0){
            data = data.split("/");
            var us_data = data.reverse().join("-");
            return us_data;
        }
    }

    function gerarArrayDados(dados){
        var arrCafeManha = new Array();
        var arrLancheManha = new Array();
        var arrAlmoco = new Array();
        var arrLancheTarde = new Array();
        var arrJanta = new Array();
        var arrLancheNoite = new Array();

        for (var i = 0; i < dados.length; i++) {
            if(dados[i]["refeicao"] == 'cafe_da_manha'){
              arrCafeManha.push(dados[i]);
            }
        }

        for (var i = 0; i < dados.length; i++) {
            if(dados[i]["refeicao"] == 'lanche_da_manha'){
              arrLancheManha.push(dados[i]);
            }
        }

        for (var i = 0; i < dados.length; i++) {
            if(dados[i]["refeicao"] == 'almoco'){
              arrAlmoco.push(dados[i]);
            }
        }

        for (var i = 0; i < dados.length; i++) {
            if(dados[i]["refeicao"] == 'lanche_da_tarde'){
              arrLancheTarde.push(dados[i]);
            }
        }
        for (var i = 0; i < dados.length; i++) {
            if(dados[i]["refeicao"] == 'janta'){
              arrJanta.push(dados[i]);
            }
        }

        for (var i = 0; i < dados.length; i++) {
            if(dados[i]["refeicao"] == 'lanche_da_noite'){
              arrLancheNoite.push(dados[i]);
            }
        }

        gerarConteudoResposta(arrCafeManha, arrLancheManha, arrAlmoco, arrLancheTarde, arrJanta, arrLancheNoite);
    }

    function gerarConteudoResposta(arrCafeManha, arrLancheManha, arrAlmoco,arrLancheTarde, arrJanta, arrLancheNoite){
        var conteudoHtml = "";
        if(arrCafeManha.length > 0){
            conteudoHtml += "<h3>Café da Manhã</h3>";
            conteudoHtml += "<table><tr><th>Alimento</th><th>Quantidade</th>";
            conteudoHtml += "<th>Pontos do Alimento</th><th>Total</th></tr>";
            conteudoHtml += "</table>";
        }

        if(arrLancheManha.length > 0){
            conteudoHtml += "<h3>Lanche da Manhã</h3>";
            conteudoHtml += "<table><tr><th>Alimento</th><th>Quantidade</th>";
            conteudoHtml += "<th>Pontos do Alimento</th><th>Total</th></tr>";
            conteudoHtml += "</table>";
        }

        if(arrAlmoco.length > 0){
            conteudoHtml += "<h3>Almoço</h3>";
            conteudoHtml += "<table><tr><th>Alimento</th><th>Quantidade</th>";
            conteudoHtml += "<th>Pontos do Alimento</th><th>Total</th></tr>";
            conteudoHtml += "</table>";
        }

        if(arrLancheTarde.length > 0){
            conteudoHtml += "<h3>Lanche da Tarde</h3>";
            conteudoHtml += "<table><tr><th>Alimento</th><th>Quantidade</th>";
            conteudoHtml += "<th>Pontos do Alimento</th><th>Total</th></tr>";
            conteudoHtml += "</table>";
        }

        if(arrJanta.length > 0){
            conteudoHtml += "<h3>Janta</h3>";
            conteudoHtml += "<table><tr><th>Alimento</th><th>Quantidade</th>";
            conteudoHtml += "<th>Pontos do Alimento</th><th>Total</th></tr>";
            conteudoHtml += "</table>";
        }

        if(arrLancheNoite.length > 0){
            conteudoHtml += "<h3>Lanche da Noite</h3>";
            conteudoHtml += "<table><tr><th>Alimento</th><th>Quantidade</th>";
            conteudoHtml += "<th>Pontos do Alimento</th><th>Total</th></tr>";
            conteudoHtml += "</table>";
        }

        $("#painel_exibir_consumo .panel-body").html(conteudoHtml);
    }
});
