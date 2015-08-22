

// beep nova mensagem chat ---------------------

function beep_mensagem_nova_nao_respondida(){


arquivo_som = pasta_sons_sistema + "/mensagem_nao_lida.mp3"; // arquivo de som

codigo_html_bruto = "<audio src='" + arquivo_som + "' autoplay>"; // codigo html bruto

document.getElementById("campo_beep_notificacoes_gerais").innerHTML = codigo_html_bruto; // retorno


};

// --------------------------------------------------------

