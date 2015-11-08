$(document).ready(function(){
	$(".janelaModal, .Fundo").hide();

	$(".botao").click(function(){

		$(".janelaModal, .Fundo").fadeIn();
	});

	$(".Fechar").click(function(){
		$(".janelaModal, .Fundo").fadeOut();

	})
});

