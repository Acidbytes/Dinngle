<?php


// retorna se pode adicionar o amigo ------------

function retorne_pode_adicionar_amigo(){


// global -------------------------------------------------

global $numero_maximo_amigos_usuario_adicionar; // numero maximo de amigos que o usuario pode ter

// ---------------------------------------------------------


// numero de amigos aceitos ----------------------

$numero_amigos = retorne_numero_amizades_logado(); // numero de amigos aceitos

// ---------------------------------------------------------


// retorna se pode adicionar mais amigos ------

if($numero_amigos < $numero_maximo_amigos_usuario_adicionar){

return true; // pode adicionar

}else{

return false; // nao pode adicionar

};

// --------------------------------------------------------


};

// --------------------------------------------------------


?>