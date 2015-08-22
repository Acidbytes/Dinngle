
// exclui todas as mensagens do usuario
function excluir_todas_mensagens_usuario(){


// endereco de script ---------------------------------

endereco_script = pasta_acoes + "/exclui_todas_mensagens_usuario.php"; // endereco de script

// ----------------------------------------------------------


// monta requisicao -----------------------------------

$.post(endereco_script, {}, function(retorno){


 // carrega usuarios disponiveis
carrega_amigos_chat();


// oculta o dialogo de excluir todas mensagens
dialogo_excluir_todas_mensagens();


});

// -----------------------------------------------------------


};

