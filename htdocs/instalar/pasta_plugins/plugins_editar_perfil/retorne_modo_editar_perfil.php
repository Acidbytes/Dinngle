<?php


// retorna o modo de editar perfil -----------------

function retorne_modo_editar_perfil(){


// modo editar perfil ---------------------------------

$editar_perfil_modo = $_GET['editar_perfil_modo']; // modo editar perfil

// ---------------------------------------------------------


// verifica se o modo foi definido antes ----------

if($editar_perfil_modo == null){

$editar_perfil_modo = 1; // modo padrao

};

// ---------------------------------------------------------


// retorno -----------------------------------------------

return $editar_perfil_modo; // retorno

// ---------------------------------------------------------


};

// --------------------------------------------------------


?>