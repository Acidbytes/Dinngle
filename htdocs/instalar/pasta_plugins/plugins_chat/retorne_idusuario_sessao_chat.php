<?php


// retorne o id de usuario de sessao de chat ----

function retorne_idusuario_sessao_chat($idusuario, $modo_sessao){


// inicia sessao ----------------------------------------

session_start(); // inicia sessao

// ----------------------------------------------------------


// salva ou retorna id de sessao de chat ---------

if($modo_sessao == true){

$_SESSION['idusuario_chat'] = $idusuario; // id de usuario do chat

}else{

return $_SESSION['idusuario_chat']; // retorno

};

// ----------------------------------------------------------


};

// -----------------------------------------------------------


?>