$(function(){
    $(".btsAlterar").hide();

    $(".btControleBts").click(function(){
        $(".btsAlterar").show("1000");
    });

     $(".btConfirma, .btCancelar").click(function(){
        $(".btsAlterar").hide("1000");
    });

    $(".btleft").click(function(){
        var valormeta = $(".ptInput").val();
        valormeta = parseInt(valormeta);
        valormeta += 25;
        $(".ptInput").val(valormeta);
    });

    $(".btright").click(function(){
        var valormeta = $(".ptInput").val();
        valormeta = parseInt(valormeta);
        valormeta -= 25;
        if(valormeta < 0){
            valormeta = 0;
        }
        $(".ptInput").val(valormeta);
    });

});
