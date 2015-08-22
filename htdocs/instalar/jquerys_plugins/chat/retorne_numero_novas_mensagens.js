
// numero de novas mensagens --------------------

var numero_novas_mensagens_nao_respondidas = 0; // numero de novas mensagens

// -----------------------------------------------------------


// retorna numero novas mensagens  ------------

function retorne_numero_novas_mensagens(){


// endereco de script ---------------------------------

endereco_script = pasta_acoes + "/retorne_numero_novas_mensagens.php"; // endereco de script

// ----------------------------------------------------------


// monta requisicao -----------------------------------

$.post(endereco_script, {}, function(retorno){


// converte para numero -----------------------------

retorno = parseInt(retorno); // converte para numero

// ----------------------------------------------------------


// verifica se ha nova mensagem ------------------

if(retorno != numero_novas_mensagens_nao_respondidas && retorno.length > 0){


// beep nova mensagem ------------------------------

if(retorno > numero_novas_mensagens_nao_respondidas){

beep_mensagem_nova_nao_respondida(); // beep nova mensagem

};

// -----------------------------------------------------------


// atualiza numero novas mensagens -------------

numero_novas_mensagens_nao_respondidas = retorno; // atualiza numero novas mensagens

// -----------------------------------------------------------


};

// -----------------------------------------------------------


// retorno -------------------------------------------------

document.getElementById("span_numero_novas_mensagens_chat_menu_modo_tipo").innerHTML = retorno; // retorno

document.getElementById("span_numero_novas_mensagens_chat_menu_modo_tipo_titulo").innerHTML = retorno; // retorno

document.getElementById("div_campo_ocultar_exibir_chat").innerHTML = retorno; // retorno

document.getElementById("span_link_perfil_num_mensagens").innerHTML = retorno; // retorno

// -----------------------------------------------------------


});

// -----------------------------------------------------------


};

// -----------------------------------------------------------
