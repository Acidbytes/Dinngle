
// carrega mais mensagens chat usuario -------------------------------

function carregar_mais_mensagens_chat_usuario(tipo_carrega){


// posicao atual ------------------------------

var y = $("#div_campo_troca_mensagens_chat").scrollTop(); // posicao atual

// ------------------------------------------------


// verifica o tipo de carregamento -------

if(tipo_carrega == 1){

$("#div_campo_troca_mensagens_chat").scrollTop(y + 50); // avanca em pixel

}else{

$("#div_campo_troca_mensagens_chat").scrollTop(y - 50); // avanca em pixel

};

// ----------------------------------------------


};

// --------------------------------------------------------------------------------
