<?php


// carrega monta notificacoes usuario -----------

function carrega_monta_notificacoes_usuario(){


// tipo de notificacao a montar ---------------------

$tipo_notificacao = retorne_tipo_notificacao(); // tipo de notificacao a montar

// ----------------------------------------------------------


// analiza tipo de notificacao ------------------------

switch($tipo_notificacao){


case 4:
$codigo_html_bruto = abrir_notificacao_usuario(1);
break;


case 5:
$codigo_html_bruto = abrir_notificacao_usuario(2);
break;


case 6:
$codigo_html_bruto = abrir_notificacao_usuario(3);
break;


case 7:
$codigo_html_bruto = abrir_notificacao_usuario(4);
break;


case 8:
$codigo_html_bruto = abrir_notificacao_usuario(5);
break;


case 9:
$codigo_html_bruto = abrir_notificacao_usuario(6);
break;


};

// ----------------------------------------------------------


// retorno ------------------------------------------------

return $codigo_html_bruto; // retorno

// ----------------------------------------------------------


};

// --------------------------------------------------------


?>