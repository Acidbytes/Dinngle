<?php


// retorna a senha do cookie ----------------------

function senha_cookie(){


// globals ----------------------------------------------

global $nome_de_cookie_usr_comum_senha; // nome de cookie de senha comum

// --------------------------------------------------------


// inicia sessao --------------------------------------

session_start(); // inicia sessao

// --------------------------------------------------------


// valor em sessao ----------------------------------

$valor_sessao = $_SESSION['senha_cadastro']; // valor em sessao

// --------------------------------------------------------


// valor de cookie -----------------------------------

if(isset($_COOKIE[$nome_de_cookie_usr_comum_senha]) == true){


// valor de cookie ----------------------------------

$valor_de_cookie = $_COOKIE[$nome_de_cookie_usr_comum_senha]; // valor de cookie

// ------------------------------------------------------


// retorna o valor de cookie ---------------------

return $valor_de_cookie; // valor de retorno de cookie

// -----------------------------------------------------


}else{


// retorno nulo --------------------------------------

if($valor_sessao != null){

return $valor_sessao; // retorna valor em sessao

}else{

return null; // retorno de valor nulo

};

// ------------------------------------------------------


};

// --------------------------------------------------------


};

// --------------------------------------------------------


?>