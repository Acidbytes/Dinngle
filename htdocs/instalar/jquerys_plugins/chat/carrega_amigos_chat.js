
// contador de avanco de amigos de chat ------

var contador_avanco_amigos_chat = 0; // contador

// ---------------------------------------------------------




// carrega os amigos do chat ----------------------

function carrega_amigos_chat(){


// endereco de script ---------------------------------

endereco_script = pasta_acoes + "/carrega_amigos_chat.php"; // endereco de script

// ----------------------------------------------------------


// monta requisicao -----------------------------------

$.post(endereco_script, {numero_pagina: contador_avanco_amigos_chat}, function(retorno){


// verifica tamanho de retorno -----------------------

if(retorno.length == 0){


// reseta contador de avanco de chat --------------

contador_avanco_amigos_chat = 0; // reseta contador de avanco de chat

// -----------------------------------------------------------


// carrega usuarios novamente ----------------------

carrega_amigos_chat(); // carrega usuarios novamente

// -----------------------------------------------------------


};

// -----------------------------------------------------------


// retorno -------------------------------------------------

document.getElementById("div_lista_amigos_chat_usuario").innerHTML = retorno; // retorno

// -----------------------------------------------------------


});

// -----------------------------------------------------------


};

// -----------------------------------------------------------
