<?php


// deleta cookies ------------------------------------

function deleta_cookies(){


// globals ----------------------------------------------

global $nome_de_cookie_usr_comum_email; // nome de cookie de email comum

global $nome_de_cookie_usr_comum_senha; // nome de cookie de email comum

global $nome_de_cookie_usr_comum_id; // id de usuario

global $nome_de_cookie_resolucao; // nome de cookie resolucao

// --------------------------------------------------------


// inicializa a sessao -------------------------------

session_start(); // inicializa a sessao

// -------------------------------------------------------


// limpa todas as variaveis de sessao ---------

$_SESSION = array(); // limpa todas as variaveis de sessao

// -------------------------------------------------------


// remove variaveis de sessao ------------------

session_unset(); // libera variaveis de sessao

session_destroy(); // destruindo sessao

// ------------------------------------------------------


// email de cookie --------------------------------

$email_cookie = email_cookie(); // email de cookie

// -----------------------------------------------------


// zera valores de cookies ----------------------

salvar_cookies($email_cookie, null, null);

setcookie($nome_de_cookie_resolucao, null, 0, "/");

// ------------------------------------------------------


};

// ------------------------------------------------------


?>