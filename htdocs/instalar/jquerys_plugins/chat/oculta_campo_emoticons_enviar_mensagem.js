

// oculta os emoticons ao enviar mensagem ----------------------

function oculta_campo_emoticons_enviar_mensagem(){

exibindo_meme_emoticon = false; // nao pode exibir
document.getElementById("div_exibe_memes_emoticons").style.display = "none"; // oculta
document.getElementById("div_carregar_mais_memes_emoticons").style.display = "none"; // exibe
document.getElementById("div_campo_troca_mensagens_chat").style.display = "block"; // exibe

};

// --------------------------------------------------------------------------------

