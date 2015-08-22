

// beep notificacao ----------------------------------

function beep_notificacao(){


arquivo_som = pasta_sons_sistema + "/nova_notificacao.mp3"; // arquivo de som

codigo_html_bruto = "<audio src='" + arquivo_som + "' autoplay>"; // codigo html bruto

document.getElementById("campo_beep_notificacoes_gerais").innerHTML = codigo_html_bruto; // retorno


};

// --------------------------------------------------------

