<?php


// monta o numero de usuarios do site -------

function monta_numero_usuarios_site(){


// globals -----------------------------------------------

global $tabela_banco; // tabela de banco de dados

// ---------------------------------------------------------


// query -------------------------------------------------

$query = "select *from $tabela_banco[1];"; // query

// ---------------------------------------------------------


// numero linhas ------------------------------------

$numero_resultados = retorne_numero_linhas_query($query); // numero linhas

// ---------------------------------------------------------


// plural ou singular --------------------------------

if($numero_resultados > 1){

$plural_singular = "usuários"; // plural

}else{

$plural_singular = "usuário"; // singular

};

// --------------------------------------------------------


// codigo html bruto -------------------------------

$codigo_html_bruto .= "<div class='classe_div_painel_controle_num_usuarios'>"; // codigo html bruto
$codigo_html_bruto .= retorne_tamanho_resultado($numero_resultados); // codigo html bruto
$codigo_html_bruto .= "&nbsp;"; // codigo html bruto
$codigo_html_bruto .= $plural_singular; // codigo html bruto
$codigo_html_bruto .= "</div>"; // codigo html bruto

// --------------------------------------------------------


// retorno ----------------------------------------------

return $codigo_html_bruto; // retorno

// --------------------------------------------------------


};

// --------------------------------------------------------


?>