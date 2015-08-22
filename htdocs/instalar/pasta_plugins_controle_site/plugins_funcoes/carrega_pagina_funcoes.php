<?php


// carrega pagina de funcoes ---------------------

function carrega_pagina_funcoes(){


// codigo html bruto ---------------------------------

$codigo_html_bruto .= campo_pesquisa_funcoes(); // codigo html bruto
$codigo_html_bruto .= carrega_pesquisa_funcoes_gerais(); // codigo html bruto
$codigo_html_bruto .= ""; // codigo html bruto

// --------------------------------------------------------


// retorno ----------------------------------------------

return $codigo_html_bruto; // retorno

// --------------------------------------------------------


};

// --------------------------------------------------------


?>