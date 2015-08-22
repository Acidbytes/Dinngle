<?php


// tipo de mensagem de chat a carregar -------

function retorne_tipo_mensagem_chat_carregar($modo_retorno, $tipo_mensagem){


// inicia a sessao ------------------------------------

session_start(); // inicia a sessao

// --------------------------------------------------------


// tipo de retorno -------------------------------------

if($modo_retorno == true){


// salva na sessao -----------------------------------

$_SESSION['tipo_mensagem_chat_carregar'] = $tipo_mensagem; // seta valor

// --------------------------------------------------------


// retorno nulo ----------------------------------------

return null; // retorno nulo

// --------------------------------------------------------


}else{


// obtem valor da sessao para retorno ---------

$tipo_mensagem = $_SESSION['tipo_mensagem_chat_carregar']; // obtem o valor

// --------------------------------------------------------


};

// --------------------------------------------------------


// valida retorno --------------------------------------

if($tipo_mensagem == null){

$tipo_mensagem = 2; // valor padrao

};

// --------------------------------------------------------


// retorno ----------------------------------------------

return $tipo_mensagem; // retorno

// --------------------------------------------------------


};

// --------------------------------------------------------


?>