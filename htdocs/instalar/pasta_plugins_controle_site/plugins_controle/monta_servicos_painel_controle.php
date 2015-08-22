<?php


// monta servicos de painel de controle --------

function monta_servicos_painel_controle(){


// valida super usuario ------------------------------

if(retorne_super_usuario() == false){

return null; // retorno nulo

};

// ---------------------------------------------------------


// tipo de servico -------------------------------------

$tipo_servico = retorne_tipo_controle(); // tipo de servico

// ---------------------------------------------------------


// seleciona tipo de servico a montar ------------

switch($tipo_servico){


case 1:
$codigo_servico = formulario_alterar_imagem_fundo_capa_inicial();
break;


case 2:
$codigo_servico = monta_pagina_documentacao(); // monta a pagina de documentacao
break;


case 3:
$codigo_servico = carrega_pagina_funcoes(); // carrega pagina de funcoes
break;


case 4:
$codigo_servico = monta_numero_usuarios_site(); // monta numero de usuarios
break;


};

// ---------------------------------------------------------


// codigo html bruto ----------------------------------

$codigo_html_bruto .= $codigo_servico; // codigo html bruto

// --------------------------------------------------------


// adiciona div especial ----------------------------

$codigo_html_bruto = constroe_div_especial_geral("Serviço do painel", $codigo_html_bruto, null); // adiciona div especial

// --------------------------------------------------------


// retorno ----------------------------------------------

return $codigo_html_bruto; // retorno

// --------------------------------------------------------


};

// --------------------------------------------------------


?>