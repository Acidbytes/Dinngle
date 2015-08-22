
// mensagens antigas de chat ----------------------

var mensagens_antigas_chat = null; // mensagens antigas de chat 

// -----------------------------------------------------------


// carrega as mensagens do chat -----------------

function carregar_mensagens_chat(){


// endereco de script ---------------------------------

endereco_script = pasta_acoes + "/carregar_mensagens_chat.php"; // endereco de script

// ----------------------------------------------------------


// monta requisicao -----------------------------------

$.post(endereco_script, {}, function(retorno){


// verifica se a mensagem e nova ------------------

if(mensagens_antigas_chat != retorno && retorno.length > 0){


// retorno -------------------------------------------------

document.getElementById("div_campo_troca_mensagens_chat").innerHTML = retorno; // retorno

// -----------------------------------------------------------


// atualiza mensagens antigas ----------------------

mensagens_antigas_chat = retorno; // atualiza mensagens antigas

// -----------------------------------------------------------


// desce ate o fim da div ------------------------------

$("#div_campo_troca_mensagens_chat").animate({ scrollTop: $("#div_campo_troca_mensagens_chat")[0].scrollHeight}, 1000); // desce ate o final da div

// -----------------------------------------------------------


// beep nova mensagem ------------------------------

beep_nova_mensagem_chat(); // beep nova mensagem

// -----------------------------------------------------------


};

// -----------------------------------------------------------


});

// -----------------------------------------------------------


};

// -----------------------------------------------------------
