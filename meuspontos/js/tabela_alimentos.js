$(function(){
    $(".cancelEditing").hide();
    $(".save").hide();
    $("#btnAdicionar").click(function(){
        var corpotabela = $("#tblCadastro tbody").html();
        var variavel = "<tr id='novoalimento'><td><input type='text' name='alimento' placeholder='Nome do Alimento' id='alimento'></td><td><input type='text' name='caloria' placeholder='Caloria'></td><td><input name='ponto' placeholder='Pontos'></td><td><img class='save btcontrols' src='images/disk.png'/><img class='edit btcontrols' src='images/pencil.png'/><img class='cancelEditing btcontrols' src='images/cancel.png'/></td></tr>";
        corpotabela += variavel;
        $("#tblCadastro tbody").html(corpotabela);
        $("#alimento").focus();
        $(this).hide();
    });

    $(".edit").click(function(){
        $(".row-description").hide();
        $(".row-edition").show();
        $(this).hide();
        $(".save").show();
        $(".cancelEditing").show();
    });

    $(".cancelEditing").click(function(){
        $(".row-description").show();
        $(".row-edition").hide();
        $(this).hide();
        $(".save").hide();
        $(".edit").show();
    });
});
