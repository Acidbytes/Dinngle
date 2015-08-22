

// numero notificacoes --------------------------------

var numero_novas_notificacoes_gerais = 0; // numero notificacoes

// -----------------------------------------------------------


// carrega o numero de notificacoes ------------

function carrega_numero_notificacoes(tipo_notificacao){


// endereco de script ---------------------------------

endereco_script = pasta_acoes + "/carrega_numero_notificacoes.php"; // endereco de script

// ----------------------------------------------------------


// monta requisicao -----------------------------------

$.post(endereco_script, {tipo_notificacao: tipo_notificacao}, function(retorno){


// converte para numero -----------------------------

retorno = parseInt(retorno); // converte para numero

// ----------------------------------------------------------


// verifica se ha nova mensagem ------------------

if(retorno != numero_novas_notificacoes_gerais){


// beep notificacao -------------------------------------

if(retorno > numero_novas_notificacoes_gerais){

beep_notificacao(); // beep notificacao

};

// -----------------------------------------------------------


// numero notificacoes --------------------------------

numero_novas_notificacoes_gerais = retorno; // numero notificacoes

// -----------------------------------------------------------


};

// -----------------------------------------------------------


// retorno -------------------------------------------------

document.getElementById("span_numero_notificacoes_usuario").innerHTML = retorno; // retorno

// -----------------------------------------------------------


});

// -----------------------------------------------------------


};

// -----------------------------------------------------------
