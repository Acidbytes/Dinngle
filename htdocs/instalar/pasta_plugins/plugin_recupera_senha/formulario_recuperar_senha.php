<?php


// formulario recuperar senha --------------------

function formulario_recuperar_senha(){


// globals ----------------------------------------------

global $enderecos_arquivos_php_uteis; // arquivos php uteis

// --------------------------------------------------------


// codigo html bruto ---------------------------------

$link[0] = "<a href='#1' id='#1' onclick='exibe_formulario_recuperar_senha();' class='uibutton confirm'>Ok faça isso</a>";

// --------------------------------------------------------


// script para recuperar senha --------------------

$script_recupera_senha = $enderecos_arquivos_php_uteis['recuperar_senha']; // script para recuperar senha

// --------------------------------------------------------


// codigo html bruto ---------------------------------

$codigo_html_bruto .= "<br>";
$codigo_html_bruto .= "Se você esqueceu sua senha, informe seu e-mail de cadastro logo abaixo.";
$codigo_html_bruto .= "<br>";
$codigo_html_bruto .= "Logo em seguida acesse sua conta de e-mail.";
$codigo_html_bruto .= "<br>";
$codigo_html_bruto .= "<br>";
$codigo_html_bruto .= "<form action='$script_recupera_senha' method='post'>";
$codigo_html_bruto .= "<input type='text' name='email' placeholder='E-mail de login'>";
$codigo_html_bruto .= "<br>";
$codigo_html_bruto .= "<input type='submit' class='botao_padrao' value='Recuperar senha'>";
$codigo_html_bruto .= "</form>";

// --------------------------------------------------------


// adiciona div especial -----------------------------

$codigo_html_bruto = div_especial_mensagem_sistema("Esqueci a senha", $codigo_html_bruto); // adiciona div especial

// ---------------------------------------------------------


// codigo html bruto ----------------------------------

$codigo_html_bruto = "<div id='div_recuperar_senha_usuario'>$codigo_html_bruto</div>";

// ---------------------------------------------------------


// codigo html bruto ----------------------------------

$codigo_html_bruto = $link[0].$codigo_html_bruto;

// --------------------------------------------------------


// retorno ----------------------------------------------

return $codigo_html_bruto; // retorno

// --------------------------------------------------------


};

// --------------------------------------------------------


?>