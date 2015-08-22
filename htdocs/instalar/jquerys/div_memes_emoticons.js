
// informa se exibe ou nao meme e emoticon ----------------

var exibindo_meme_emoticon = false; // false

// ------------------------------------------------------------------------




// backup de memes e emoticons carregados ---------------

var backup_memes_emoticons_carregados = ""; // backup

// ------------------------------------------------------------------------




// carrega memes e emoticons ---------------------

function carregar_memes_emoticons_div(){


// endereco de script ----------------------------------

endereco_script = pasta_acoes + "/carregar_memes_emoticons.php"; // endereco de script

// -----------------------------------------------------------


// seta exibe meme emoticon -----------------------

if(exibindo_meme_emoticon == false){


// exibe
exibindo_meme_emoticon = true; // pode exibir
document.getElementById("div_exibe_memes_emoticons").style.display = "block"; // exibe
document.getElementById("div_carregar_mais_memes_emoticons").style.display = "block"; // exibe
document.getElementById("div_campo_troca_mensagens_chat").style.display = "none"; // exibe


}else{


// oculta
exibindo_meme_emoticon = false; // nao pode exibir
document.getElementById("div_exibe_memes_emoticons").style.display = "none"; // oculta
document.getElementById("div_carregar_mais_memes_emoticons").style.display = "none"; // exibe
document.getElementById("div_campo_troca_mensagens_chat").style.display = "block"; // exibe


// move o foco para o campo de mensagem
if($( "#campo_input_chat").length){

document.getElementById("campo_input_chat").focus(); // move o foco

};


};

// -----------------------------------------------------------


// verifica se exibe meme e emoticon --------------

if(backup_memes_emoticons_carregados.length > 0){


// seta memes e emoticons carregados antes --

document.getElementById("div_exibe_memes_emoticons").innerHTML = backup_memes_emoticons_carregados; // setando...

// -----------------------------------------------------------


// retorno falso ------------------------------------------

return false; // retorno falso

// -----------------------------------------------------------


};

// -----------------------------------------------------------


// monta requisicao ------------------------------------

$.post(endereco_script, {}, function(retorno){


// retorno ------------------------------------------------

document.getElementById("div_exibe_memes_emoticons").innerHTML = retorno; // retorno

// ----------------------------------------------------------


// faz backup ---------------------------------------------

backup_memes_emoticons_carregados = retorno; // faz backup

// -----------------------------------------------------------


});

// ----------------------------------------------------------


};

// --------------------------------------------------------------


