<?php


// retorna idusuario de cookie -------------------

function idusuario_cookie(){


// globals ----------------------------------------------

global $nome_de_cookie_usr_comum_id; // nome de cookie de id comum

// --------------------------------------------------------


// inicia sessao --------------------------------------

session_start(); // inicia sessao

// --------------------------------------------------------


// valor em sessao ----------------------------------

$valor_sessao = $_SESSION['idusuario']; // valor em sessao

// --------------------------------------------------------


// valor de cookie ------------------------------------

if(isset($_COOKIE[$nome_de_cookie_usr_comum_id]) == true){


// retorna o valor de cookie -----------------------

return $_COOKIE[$nome_de_cookie_usr_comum_id]; // valor de retorno de cookie

// -------------------------------------------------------


}else{


// retorno nulo --------------------------------------

if($valor_sessao != null){

return $valor_sessao; // retorna valor em sessao

}else{

return null; // retorno de valor nulo

};

// ------------------------------------------------------


};

// -----------------------------------------------------


};

// -----------------------------------------------------


?>