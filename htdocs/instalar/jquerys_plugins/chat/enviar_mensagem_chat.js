
// envia a mensagem de chat ----------------------

function enviar_mensagem_chat(idusuario){


// endereco de script ---------------------------------

endereco_script = pasta_acoes + "/enviar_mensagem_chat.php"; // endereco de script

// ----------------------------------------------------------


// obtem o conteudo da mensagem ---------------

conteudo_mensagem_chat = document.getElementById("campo_input_chat").value; // obtem o conteudo da mensagem

// ----------------------------------------------------------


// id de usuario utilizando atual --------------------

idusuario_chat_utilizando_atual = idusuario; // id de usuario utilizando

// ----------------------------------------------------------


// valida conteudo de mensagem ------------------

if(conteudo_mensagem_chat.length == 0){

return false; // retorno falso

};

// ----------------------------------------------------------


// monta requisicao -----------------------------------

$.post(endereco_script, {conteudo_mensagem_chat: conteudo_mensagem_chat}, function(retorno){


// atualiza elementos ---------------------------------

document.getElementById("campo_input_chat").value = ""; // limpa campo de mensgem

document.getElementById("campo_input_chat").focus(); // move o foco

document.getElementById("span_campo_existe_nova_mensagem_" + idusuario).innerHTML = ""; // limpa campo informa nova mensagem

// -----------------------------------------------------------


});

// -----------------------------------------------------------


// oculta os emoticons ao enviar mensagem
oculta_campo_emoticons_enviar_mensagem();


};

// -----------------------------------------------------------
