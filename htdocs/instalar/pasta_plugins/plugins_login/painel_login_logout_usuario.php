<?php


// painel login logout usuario --------------------

function painel_login_logout_usuario(){


// globals ----------------------------------------------

global $enderecos_arquivos_php_uteis; // arquivos php uteis

// ---------------------------------------------------------


// informa se o usuario esta logado -----------

$usuario_logado = retorne_esta_logado(); // informa se o usuario esta logado

// --------------------------------------------------------


// codigo html bruto ------------------------------------------

if($usuario_logado == true){


// url de logout -------------------------------------------------

$url_logout = $enderecos_arquivos_php_uteis['logout']; // url de logout

// --------------------------------------------------------------------


// codigo html bruto -------------------------------------------

$codigo_html_bruto .= "<div class='div_logout_usuario'>";
$codigo_html_bruto .= "<a href='$url_logout' title='Sair'>Sair</a>";
$codigo_html_bruto .= "</div>";

// --------------------------------------------------------------------


};

// -------------------------------------------------------------------


// retorno ---------------------------------------------------------

return $codigo_html_bruto; // retorno

// --------------------------------------------------------------------


};

// --------------------------------------------------------


?>