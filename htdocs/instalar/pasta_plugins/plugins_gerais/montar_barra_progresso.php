<?php


// monta a barra de progresso --------------------

function montar_barra_progresso($identificador_div){


// globals -----------------------------------------------

global $imagem_servidor; // imagens de servidor

// ---------------------------------------------------------


// imagem carregando ------------------------------

$imagem = "<img src='".$imagem_servidor['carregando']."' title='Carregando...'>"; // imagem carregando

// ---------------------------------------------------------


// codigo html bruto ----------------------------------

$codigo_html_bruto .= "<div class='classe_div_barra_progresso' id='$identificador_div'>";
$codigo_html_bruto .= $imagem;
$codigo_html_bruto .= "</div>";

// ---------------------------------------------------------


// retorno -----------------------------------------------

return $codigo_html_bruto; // retorno

// ---------------------------------------------------------


};

// --------------------------------------------------------


?>