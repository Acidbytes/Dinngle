<?php


// codigo html bruto -------------------------------

function formulario_login_usuario(){


// globals ----------------------------------------------

global $url_pagina_login; // url de pagina de login

global $url_pagina_recupera_senha; // url pagina inicial recuperar senha

// --------------------------------------------------------


// loga usuario ----------------------------------------

if(retorne_esta_logado() == true){

die; // saindo

};

// ---------------------------------------------------------


// dados de formulario -----------------------------

$email_cadastro = remove_html($_POST['email_cadastro']); // email de cadastro

// --------------------------------------------------------


// email de cookie -----------------------------------

if($email_cadastro == null){

$email_cadastro = email_cookie(); // email de cookie

};

// --------------------------------------------------------


// codigo html bruto -------------------------------

$codigo_html_bruto .= "<div class='div_formulario_login'>";
$codigo_html_bruto .= "<form action='$url_pagina_login' method='post'>";
$codigo_html_bruto .= "<div class='div_formulario_login_separa'>";
$codigo_html_bruto .= "<span class='formulario_login_span_email'>E-mail</span>";
$codigo_html_bruto .= "<br>";
$codigo_html_bruto .= "<input type='text' name='email_cadastro' placeholder='E-mail' class='campo_email_login' value='$email_cadastro'>";
$codigo_html_bruto .= "<br>";
$codigo_html_bruto .= "<input type='submit' value='Logar' class='uibutton'>";
$codigo_html_bruto .= "</div>";
$codigo_html_bruto .= "<div class='div_formulario_login_separa'>";
$codigo_html_bruto .= "<span class='formulario_login_span_senha'>Senha</span>";
$codigo_html_bruto .= "<br>";
$codigo_html_bruto .= "<input type='password' name='senha_cadastro' placeholder='Senha' class='campo_senha_login'>";
$codigo_html_bruto .= "<br>";
$codigo_html_bruto .= "<a href='$url_pagina_recupera_senha' title='Recuperar senha' class='formulario_login_link_recupera_senha'>Recuperar senha</a>";
$codigo_html_bruto .= "</div>";
$codigo_html_bruto .= "</form>";
$codigo_html_bruto .= "</div>";

// --------------------------------------------------------


// retorno ----------------------------------------------

return $codigo_html_bruto; // retorno

// --------------------------------------------------------


};

// --------------------------------------------------------


?>