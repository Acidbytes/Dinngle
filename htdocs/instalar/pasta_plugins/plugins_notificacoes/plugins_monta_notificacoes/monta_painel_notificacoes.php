<?php


// monta painel de notificacoes ------------------

function monta_painel_notificacoes(){


// verifica o tipo de notificacao --------------------

switch(retorne_tipo_notificacao()){


case 1:
$codigo_html_bruto = retorne_numero_aniversariantes(2); // retorna aniversariantes
$codigo_html_bruto = constroe_div_especial_geral("Aniversariantes", $codigo_html_bruto, null); // adiciona div especial
break;


case 2:
$codigo_html_bruto = montar_criar_lembrete(); // monta criar lembrete
break;


case 3:
$codigo_html_bruto = montar_criar_evento(); // monta criar evento
break;


case 4:
$codigo_html_bruto = carrega_monta_notificacoes_usuario(); // monta criar evento
break;


case 5:
$codigo_html_bruto = carrega_monta_notificacoes_usuario(); // monta criar evento
break;


case 6:
$codigo_html_bruto = carrega_monta_notificacoes_usuario(); // monta criar evento
break;


case 7:
$codigo_html_bruto = carrega_monta_notificacoes_usuario(); // monta criar evento
break;


case 8:
$codigo_html_bruto = carrega_monta_notificacoes_usuario(); // monta criar evento
break;


case 9:
$codigo_html_bruto = carrega_monta_notificacoes_usuario(); // monta criar evento
break;


default:
$codigo_html_bruto = monta_abas_painel_notificacoes(); // retorna pagina inicial de abas


};

// --------------------------------------------------------


// seta as notificacoes como visualizadas
seta_notificacoes_visualizadas();


// retorno ----------------------------------------------

return $codigo_html_bruto; // retorno

// --------------------------------------------------------


};

// --------------------------------------------------------


?>