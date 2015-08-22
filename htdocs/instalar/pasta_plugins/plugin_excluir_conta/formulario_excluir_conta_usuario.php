<?php


// formulario excluir conta usuario ---------------

function formulario_excluir_conta_usuario(){


// globals ----------------------------------------------

global $enderecos_arquivos_php_uteis; // arquivos php uteis

// --------------------------------------------------------


// script excluir conta -------------------------------

$script_excluir_conta = $enderecos_arquivos_php_uteis['excluir_conta_usuario']; // script excluir conta

// --------------------------------------------------------


// codigo html bruto ---------------------------------

$codigo_html_bruto .= "<br>";
$codigo_html_bruto .= "<br>";
$codigo_html_bruto .= "<form action='$script_excluir_conta' method='post'>";
$codigo_html_bruto .= "<input type='text' name='email' placeholder='E-mail'>";
$codigo_html_bruto .= "<br>";
$codigo_html_bruto .= "<br>";
$codigo_html_bruto .= "<input type='password' name='senha' placeholder='Senha'>";
$codigo_html_bruto .= "<br>";
$codigo_html_bruto .= "<br>";
$codigo_html_bruto .= "<input type='submit' class='botao_padrao' value='Excluir conta'>";

$codigo_html_bruto .= "</form>";
$codigo_html_bruto .= "<br>";

// --------------------------------------------------------


// retorno ----------------------------------------------

return $codigo_html_bruto; // retorno

// --------------------------------------------------------


};

// --------------------------------------------------------


?>