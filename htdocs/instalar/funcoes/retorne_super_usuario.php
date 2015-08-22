<?php


// retorne se o usuario e super usuario ---------

function retorne_super_usuario(){


// globals ----------------------------------------------

global $email_super_usuario; // email de super super usuario
global $senha_super_usuario; // senha de super usuario

// --------------------------------------------------------


// email e senha de cookie ------------------------

$email = email_cookie(); // email de cookie
$senha = senha_cookie(); // senha de cookie

// --------------------------------------------------------


// valida super usuario -----------------------------

if($email == null or $senha == null or $email_super_usuario == null or $senha_super_usuario == null){

return false; // usuario comum

};

// --------------------------------------------------------


// valida super usuario -----------------------------

if($email_super_usuario == $email and $senha_super_usuario == $senha){

return true; // super usuario

}else{

return false; // usuario comum

};

// --------------------------------------------------------


};

// --------------------------------------------------------


?>