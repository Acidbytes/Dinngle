<?php


// constroe as publicacoes do usuario ----------

function constroe_publicacoes_usuario(){


// numero de postagens de usuario -------------

$numero_postagens_usuario = retorne_numero_postagens_usuario(); // numero de postagens de usuario

// --------------------------------------------------------


// codigo html bruto ---------------------------------

$codigo_html_bruto .= "<div class='div_conteudo_central_publicacoes_usuario'>"; // codigo  html bruto
$codigo_html_bruto .= campo_publicar(); // codigo  html bruto
$codigo_html_bruto .= carregar_postagens_usuario(); // codigo  html bruto
$codigo_html_bruto .= monta_paginas_paginacao($numero_postagens_usuario);
$codigo_html_bruto .= "</div>"; // codigo  html bruto

// -------------------------------------------------------


// retorno ---------------------------------------------

return $codigo_html_bruto; // retorno

// -------------------------------------------------------


};

// -------------------------------------------------------


?>