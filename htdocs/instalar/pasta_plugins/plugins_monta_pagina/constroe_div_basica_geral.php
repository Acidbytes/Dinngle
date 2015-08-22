<?php


// constroe div basica geral -------------------------

function constroe_div_basica_geral($conteudo_div, $aplicar_estilo){


// aplica ou nao o estilo ------------------------------

if($aplicar_estilo == true){

$estilo_div = "div_basica_geral"; // estilo de div

};

// ----------------------------------------------------------


// codigo html bruto -----------------------------------

$codigo_html_bruto .= "<div id='$estilo_div' class='box fade-in two'>";

$codigo_html_bruto .= $conteudo_div;

$codigo_html_bruto .= "</div>";

// --------------------------------------------------------


// retorno ----------------------------------------------

return $codigo_html_bruto; // retorno

// --------------------------------------------------------


};

// --------------------------------------------------------


?>