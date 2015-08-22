<?php


// formulario exibe recuperar a senha ---------

function formulario_exibe_recuperar_senha(){


// codigo html bruto ---------------------------------

$codigo_html_bruto .= "Então você esqueceu sua senha!";
$codigo_html_bruto .= "<br>";
$codigo_html_bruto .= "Vou ajudar você, mandarei sua senha por e-mail.";
$codigo_html_bruto .= "&nbsp;";
$codigo_html_bruto .= formulario_recuperar_senha(); // formulario de login

// --------------------------------------------------------


// adiciona div especial ----------------------------------

$codigo_html_bruto = div_especial_basica_campos($codigo_html_bruto); // adiciona div especial

// --------------------------------------------------------


// retorno ---------------------------------------------

return $codigo_html_bruto; // retorno

// -------------------------------------------------------


};

// --------------------------------------------------------


?>