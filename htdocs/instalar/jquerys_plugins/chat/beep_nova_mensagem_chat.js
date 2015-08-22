

// beep nova mensagem chat ---------------------

function beep_nova_mensagem_chat(){


arquivo_som = pasta_sons_sistema + "/nova_mensagem.mp3"; // arquivo de som

codigo_html_bruto = "<audio src='" + arquivo_som + "' autoplay>"; // codigo html bruto

document.getElementById("div_campo_troca_mensagens_chat").innerHTML = document.getElementById("div_campo_troca_mensagens_chat").innerHTML + codigo_html_bruto; // retorno


};

// --------------------------------------------------------

