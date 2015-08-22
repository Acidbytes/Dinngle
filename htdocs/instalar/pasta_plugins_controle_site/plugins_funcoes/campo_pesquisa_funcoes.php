<?php


// campo pesquisa funcoes -----------------------

function campo_pesquisa_funcoes(){


// globals ----------------------------------------------

global $url_pagina_inicial_site; // url de pagina de funcao

// --------------------------------------------------------


// retorna o termo de pesquisa -------------------

$pesquisa_generica = retorne_termo_pesquisa(); // retorna o termo de pesquisa

// ---------------------------------------------------------


// tipo de pesquisa por funcoes -------------------

$tipo_pesquisa_funcoes = tipo_pesquisa_funcoes(); // tipo de pesquisa por funcoes

// ---------------------------------------------------------


// tipo de radio utilizando ---------------------------

$radio_utilizado[$tipo_pesquisa_funcoes] = "checked"; // tipo de radio utilizando

// ---------------------------------------------------------


// codigo html bruto ----------------------------------

$codigo_html_bruto .= "<form action='$url_pagina_inicial_site' method='get'>"; // codigo html bruto
$codigo_html_bruto .= "<input type='text' name='pesquisa_generica' class='campo_entrada_pesquisa_ajuda' value='$pesquisa_generica' placeholder='Pesquisar funcao'>"; // codigo html bruto
$codigo_html_bruto .= "<br>"; // codigo html bruto
$codigo_html_bruto .= "<input type='hidden' name='tipo_pagina' value='7'>"; // codigo html bruto
$codigo_html_bruto .= "<input type='hidden' name='editar_perfil_modo' value='0'>"; // codigo html bruto
$codigo_html_bruto .= "<input type='hidden' name='numero_controle' value='3'>"; // codigo html bruto
$codigo_html_bruto .= "<input type='radio' name='tipo_pesquisa_funcoes' $radio_utilizado[1] value='1'>"; // codigo html bruto
$codigo_html_bruto .= "&nbsp;"; // codigo html bruto
$codigo_html_bruto .= "php"; // codigo html bruto
$codigo_html_bruto .= "<br>"; // codigo html bruto
$codigo_html_bruto .= "<input type='radio' name='tipo_pesquisa_funcoes' $radio_utilizado[2] value='2'>"; // codigo html bruto
$codigo_html_bruto .= "&nbsp;"; // codigo html bruto
$codigo_html_bruto .= "jquery"; // codigo html bruto
$codigo_html_bruto .= "<br>"; // codigo html bruto
$codigo_html_bruto .= "<input type='radio' name='tipo_pesquisa_funcoes' $radio_utilizado[3] value='3'>"; // codigo html bruto
$codigo_html_bruto .= "&nbsp;"; // codigo html bruto
$codigo_html_bruto .= "todos"; // codigo html bruto
$codigo_html_bruto .= "<br>"; // codigo html bruto
$codigo_html_bruto .= "<br>"; // codigo html bruto
$codigo_html_bruto .= "<input type='submit' class='uibutton large confirm' value='Pesquisar'>"; // codigo html bruto
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