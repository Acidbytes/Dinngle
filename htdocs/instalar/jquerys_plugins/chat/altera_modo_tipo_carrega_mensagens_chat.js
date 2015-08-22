
// altera modo carrega mensagem ----------------

function altera_modo_tipo_carrega_mensagens_chat(tipo_mensagem_chat_carregar){


// endereco de script ---------------------------------

endereco_script = pasta_acoes + "/altera_modo_tipo_carrega_mensagens_chat.php"; // endereco de script

// ----------------------------------------------------------


// monta requisicao -----------------------------------

$.post(endereco_script, {tipo_mensagem_chat_carregar: tipo_mensagem_chat_carregar}, function(retorno){


// reseta contador de avanco de chat
reseta_contador_avanco_chat(); // reseta contador de avanco de chat


// carrega o chat do usuario
carregar_chat_usuario(); // carrega o chat do usuario


// exibe div
document.getElementById("div_chat_usuarios_disponiveis").style.display = "inline"; // exibindo div


});

// -----------------------------------------------------------


};

// -----------------------------------------------------------
