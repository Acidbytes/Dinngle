<?php


// constroe a pagina de ajdua ---------------------

function constroe_pagina_ajuda(){


// globals -----------------------------------------------

global $nome_do_sistema; // nome do sistema

// ---------------------------------------------------------


// codigo html bruto ----------------------------------

$codigo_html_bruto .= "<div class='div_inicio_topicos_ajuda'>"; // codigo html bruto
$codigo_html_bruto .= "Ajuda do $nome_do_sistema"; // codigo html bruto
$codigo_html_bruto .= "</div>"; // codigo html bruto
$codigo_html_bruto .= campo_pesquisa_ajuda(); // codigo html bruto
$codigo_html_bruto .= constroe_topicos_ajuda(1); // codigo html bruto

// --------------------------------------------------------


// adiciona div especial -----------------------------

$codigo_html_bruto = constroe_div_especial_geral("Tópicos de ajuda", $codigo_html_bruto, null); // adiciona div especial

// --------------------------------------------------------


// retorno ----------------------------------------------

return $codigo_html_bruto; // retorno

// --------------------------------------------------------


};

// --------------------------------------------------------


?>