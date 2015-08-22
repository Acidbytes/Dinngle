<?php


// monta excluir conta de usuario -----------------

function monta_excluir_conta_usuario(){


// globals -----------------------------------------------

global $nome_do_sistema; // nome do sistema

global $nome_fundador_site; // nome fundador do site

// ---------------------------------------------------------


// super usuario logado -----------------------------

$super_usuario_logado = retorne_super_usuario(); // super usuario logado

// ---------------------------------------------------------


// valida super usuario logado ---------------------

if($super_usuario_logado == true){


// codigo html bruto ----------------------------------

$codigo_html_bruto .= "<br>";
$codigo_html_bruto .= "Sua conta não pode ser excluida.";

// ---------------------------------------------------------


// titulo de div -----------------------------------------

$titulo_div = "Excluir minha conta do $nome_do_sistema"; // titulo de div

// --------------------------------------------------------


// adiciona div especial de sistema -------------

$codigo_html_bruto = div_especial_mensagem_sistema($titulo_div, $codigo_html_bruto); // adiciona div especial de sistema

// --------------------------------------------------------


// adiciona div especial ----------------------------

$codigo_html_bruto = constroe_div_especial_geral($titulo_div, $codigo_html_bruto, null); // adiciona div especial

// --------------------------------------------------------


// retorno ----------------------------------------------

return $codigo_html_bruto; // retorno

// --------------------------------------------------------


};

// ---------------------------------------------------------


// codigo html bruto ----------------------------------

$codigo_html_bruto .= "<br>";
$codigo_html_bruto .= "<li>Nós do $nome_do_sistema, lamentamos muito por você querer excluir sua conta.";
$codigo_html_bruto .= "<li>Más para excluir sua conta para sempre, informe seu e-mail, e senha logo abaixo.";
$codigo_html_bruto .= formulario_excluir_conta_usuario();
$codigo_html_bruto .= "<li>Atenciosamente <b>$nome_fundador_site</b> fundador do $nome_do_sistema.";

// --------------------------------------------------------


// titulo de div -----------------------------------------

$titulo_div = "Excluir minha conta do $nome_do_sistema"; // titulo de div

// --------------------------------------------------------


// adiciona div especial de sistema -------------

$codigo_html_bruto = div_especial_mensagem_sistema($titulo_div, $codigo_html_bruto); // adiciona div especial de sistema

// --------------------------------------------------------


// adiciona div especial ----------------------------

$codigo_html_bruto = constroe_div_especial_geral($titulo_div, $codigo_html_bruto, null); // adiciona div especial

// --------------------------------------------------------


// retorno ----------------------------------------------

return $codigo_html_bruto; // retorno

// --------------------------------------------------------


};

// --------------------------------------------------------


?>