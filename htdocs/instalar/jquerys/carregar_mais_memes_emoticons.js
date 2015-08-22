
// carrega mais memes e emoticons --

function carregar_mais_memes_emoticons(tipo_carrega){


// posicao atual ------------------------------

var y = $("#div_exibe_memes_emoticons").scrollTop(); // posicao atual

// ------------------------------------------------


// verifica o tipo de carregamento -------

if(tipo_carrega == 1){

$("#div_exibe_memes_emoticons").scrollTop(y + 50); // avanca em pixel

}else{

$("#div_exibe_memes_emoticons").scrollTop(y - 50); // avanca em pixel

};

// ----------------------------------------------


};

// ----------------------------------------------
