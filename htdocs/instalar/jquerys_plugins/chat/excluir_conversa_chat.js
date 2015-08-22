
// exclui conversa de chat ---------------------------

function excluir_conversa_chat(idusuario){


// endereco de script ---------------------------------

endereco_script = pasta_acoes + "/excluir_conversa_chat.php"; // endereco de script

// ----------------------------------------------------------


// monta requisicao -----------------------------------

$.post(endereco_script, {idusuario: idusuario}, function(retorno){

document.getElementById("campo_input_chat").focus(); // move o foco

});

// -----------------------------------------------------------


};

// -----------------------------------------------------------
