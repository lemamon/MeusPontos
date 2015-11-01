$(function(){
    $(".cancelEditing").hide();
    $(".save").hide();
    $(".row-edition").hide();
    $("#btnAdicionar").click(function(){
        var corpotabela = $("#tblCadastro tbody").html();
        var variavel = "<tr id='novoalimento'><td><input type='text' required name='alimento' placeholder='Nome do Alimento' id='alimento'></td><td><input type='text' required name='tipo_alimento' placeholder='Ex.: Temperos' id='alimento'></td><td><input type='text' required name='qtde_pontos' placeholder='Quantidade de Pontos'></td><td><input name='medida' required placeholder='Ex.: 2 colheres de sopa'></td><td><img class='save btcontrols' src='images/disk.png' title='Salvar'/><img class='cancelEditing btcontrols' src='images/cancel.png' title='Cancelar Inserção'/></td></tr>";
        corpotabela += variavel;
        $("#tblCadastro tbody").html(corpotabela);
        $("#alimento").focus();
        $(this).hide();

        $(".cancelEditing").click(function(){
            $(".row-description").show();
            $(".row-edition").hide();
            $(this).hide();
            $(".save").hide();
            $("#btnAdicionar").show();

            var res = corpotabela.toString();
            var ultimaLinha = parseInt(res.lastIndexOf("<tr"));
            var a = res.substring(0, ultimaLinha);
            $("#tblCadastro tbody").html(a);
        });

        $(".save").click(function(){
            $("#form").submit();
        });

    });

    $(".edit").click(function(){
        $(".row-description").hide();
        $(".row-edition").show();
        $(this).hide();
        $(".save").show();
        $(".cancelEditing").show();
    });

    $(".cancelEditing").click(function(){
        alert("oi");
        $(".row-description").show();
        $(".row-edition").hide();
        $(this).hide();
        $(".save").hide();
        $(".edit").show();
    });
});
