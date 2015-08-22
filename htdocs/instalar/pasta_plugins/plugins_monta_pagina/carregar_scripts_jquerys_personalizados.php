<?php


// carrega scripts jquerys personalizados -------

function carregar_scripts_jquerys_personalizados(){


// codigo html bruto ----------------------------------

$codigo_html_bruto .= "<script>";
$codigo_html_bruto .= jquery_personalizado_enderecos_de_pastas();
$codigo_html_bruto .= "</script>";

// ---------------------------------------------------------


// retorno -----------------------------------------------

return $codigo_html_bruto; // retorno

// ---------------------------------------------------------


};

// --------------------------------------------------------


?>