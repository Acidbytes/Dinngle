<?php


// salva cookies de login -------------------------

function salvar_cookies($email, $senha, $idusuario){


// globals ---------------------------------------------

global $nome_de_cookie_usr_comum_email; // nome de cookie de email comum

global $nome_de_cookie_usr_comum_senha; // nome de cookie de email comum

global $nome_de_cookie_usr_comum_id; // id de usuario

global $salvar_quantidade_de_dias; // quantidade de dias

// --------------------------------------------------------


// tempo de validade do cookie ------------------

$tempo_validade_cookie = time() + ($salvar_quantidade_de_dias * 24 * 3600); // tempo de validade do cookie

// -------------------------------------------------------


// salvando valor de cookie agora --------------

setcookie($nome_de_cookie_usr_comum_email, $email, $tempo_validade_cookie, "/"); // setando...

setcookie($nome_de_cookie_usr_comum_senha, $senha, $tempo_validade_cookie, "/"); // setando...

setcookie($nome_de_cookie_usr_comum_id, $idusuario, $tempo_validade_cookie, "/"); // setando...

// ------------------------------------------------------


};

// -----------------------------------------------------


?>
