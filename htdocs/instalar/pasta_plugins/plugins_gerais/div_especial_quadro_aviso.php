<?php


// div especial quadro de aviso -------------------

function div_especial_quadro_aviso($titulo, $conteudo, $rodape){


// codigo html bruto ---------------------------------

$codigo_html_bruto .= "<div class='classe_div_especial_quadro_aviso'>";
$codigo_html_bruto .= "<div class='classe_div_especial_quadro_aviso_titulo'>";
$codigo_html_bruto .= $titulo;
$codigo_html_bruto .= "</div>";
$codigo_html_bruto .= "<div class='classe_div_especial_quadro_aviso_corpo'>";
$codigo_html_bruto .= $conteudo;
$codigo_html_bruto .= "</div>";
$codigo_html_bruto .= "<div class='classe_div_especial_quadro_aviso_rodape'>";
$codigo_html_bruto .= $rodape;
$codigo_html_bruto .= "</div>";
$codigo_html_bruto .= "</div>";

// --------------------------------------------------------


// retorno ----------------------------------------------

return $codigo_html_bruto; // retorno

// --------------------------------------------------------


};

// --------------------------------------------------------


?>