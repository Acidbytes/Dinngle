<?php


// div especial mensagem de sistema -----------

function div_especial_mensagem_sistema($titulo, $mensagem_sistema){


// codigo html bruto ----------------------------------

$codigo_html_bruto .= "<div class='div_especial_mensagem_sistema'>";
$codigo_html_bruto .= "<b>$titulo</b>";
$codigo_html_bruto .= "<br>";
$codigo_html_bruto .= $mensagem_sistema;
$codigo_html_bruto .= "</div>";

// --------------------------------------------------------


// retorno -----------------------------------------------

return $codigo_html_bruto; // retorno

// ---------------------------------------------------------


};

// --------------------------------------------------------


?>