<?php


// retorna se esta logado ou nao
function retorne_esta_logado(){


// conexao com mysql nao usar o desconectar!
conecta_mysql(true);


// inicializa a sessao
session_start(); 


// cookies
$email_cookie = email_cookie();
$senha_cookie = senha_cookie();


// valida existencia de usuario
$usuario_existe = retorne_usuario_existe($email_cookie, $senha_cookie);


// valida existencia de usuario
if($usuario_existe == true){


// salva o id de usuario na sessao
$_SESSION['idusuario'] = retorne_idusuario_por_email($email_cookie);


// usuario existe e esta logado
return true;


}else{


// usuario nao existe ou nao esta logado
return false;


};


};


?>