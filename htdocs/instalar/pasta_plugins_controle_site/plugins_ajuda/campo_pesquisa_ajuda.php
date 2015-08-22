<?php


// campo pesquisa ajuda ---------------------------

function campo_pesquisa_ajuda(){


// globals ----------------------------------------------

global $url_pagina_inicial_ajuda; // url de pagina de ajuda

// --------------------------------------------------------


// retorna o termo de pesquisa -------------------

$pesquisa_generica = retorne_termo_pesquisa(); // retorna o termo de pesquisa

// ---------------------------------------------------------


// codigo html bruto ----------------------------------

$codigo_html_bruto .= "<form action='$url_pagina_inicial_ajuda' method='get'>"; // codigo html bruto
$codigo_html_bruto .= "<input type='text' name='pesquisa_generica' class='campo_entrada_pesquisa_ajuda' value='$pesquisa_generica' placeholder='Pesquisar ajuda'>"; // codigo html bruto
$codigo_html_bruto .= "<br>"; // codigo html bruto
$codigo_html_bruto .= "<input type='submit' class='uibutton' value='Pesquisar'>"; // codigo html bruto
$codigo_html_bruto .= "</form>"; // codigo html bruto

// --------------------------------------------------------


// adiciona div especial ----------------------------

$codigo_html_bruto = div_especial_basica_campos($codigo_html_bruto); // adiciona div especial

// --------------------------------------------------------


// retorno ----------------------------------------------

return $codigo_html_bruto; // retorno

// --------------------------------------------------------


};

// --------------------------------------------------------


?>