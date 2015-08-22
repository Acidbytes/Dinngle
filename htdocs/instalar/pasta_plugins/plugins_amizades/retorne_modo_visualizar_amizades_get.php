<?php


// retorna o modo de visualizar amizades get --

function retorne_modo_visualizar_amizades_get(){


// modo de visualizar amizade ---------------------

$modo_amizade = $_GET['modo_amizade']; // modo de visualizar amizade

// ---------------------------------------------------------


// verifica se modo e valido ------------------------

if($modo_amizade == null){

$modo_amizade = 1; // amigos aceitos

};

// ---------------------------------------------------------


// retorno -----------------------------------------------

return $modo_amizade; // retorno

// ---------------------------------------------------------


};

// --------------------------------------------------------


?>