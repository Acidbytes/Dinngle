<?php


// exibe a mensagem de bloqueado ------------

function exibe_mensagem_bloqueado(){


// globals ---------------------------------------------

global $url_pagina_inicial_site; // pagina inicial servidor

// -------------------------------------------------------


// codigo html bruto -------------------------------

$codigo_html_bruto .= "Parece que este perfíl não pode ser visto por você!";
$codigo_html_bruto .= ", não se sinta mal com isto.";
$codigo_html_bruto .= "<br>";
$codigo_html_bruto .= "<br>";
$codigo_html_bruto .= "<a href='$url_pagina_inicial_site' title='Início'>Início</a>";

// ----------------------------------------------------------------


// titulo ---------------------------------------------------------

$titulo = "Ops ;-("; // titulo

// ----------------------------------------------------------------


// adiciona div especial ------------------------------------

$codigo_html_bruto = div_especial_mensagem_sistema($titulo, $codigo_html_bruto); // mensagem de sistema

// ----------------------------------------------------------------


return $codigo_html_bruto;




};

// --------------------------------------------------------


?>