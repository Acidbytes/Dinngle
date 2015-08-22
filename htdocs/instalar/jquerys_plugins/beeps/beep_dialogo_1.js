

// beep de dialogo -----------------------------------------

function beep_dialogo(tipo_beep){


// converte para inteiro
tipo_beep = parseInt(tipo_beep); // converte para inteiro


// tipo de beep
switch(tipo_beep){

case 1:
arquivo_som = pasta_sons_sistema + "/mensagem_dialogo.mp3"; // arquivo de som
break;


case 2:
arquivo_som = pasta_sons_sistema + "/mensagem_dialogo_fecha.mp3"; // arquivo de som
break;

};


// codigo html bruto
codigo_html_bruto = "<audio src='" + arquivo_som + "' autoplay>"; // codigo html bruto


// ouve beep
document.getElementById("campo_beep_notificacoes_gerais").innerHTML = codigo_html_bruto; // retorno


};

// ---------------------------------------------------------------

