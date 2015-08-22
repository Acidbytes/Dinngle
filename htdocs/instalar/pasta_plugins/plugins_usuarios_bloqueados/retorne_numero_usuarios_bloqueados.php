<?php


// retorna o numero de usuarios bloqueados ---------------

function retorne_numero_usuarios_bloqueados(){


// globals --------------------------------------------

global $tabela_banco; // tabela de banco

// ------------------------------------------------------


// id de usuario logado --------------------------

$idusuario_logado = retorne_idusuario_logado(); // id de usuario logado

// ----------------------------------------------------


// query --------------------------------------------

$query = "select *from $tabela_banco[21] where idusuario='$idusuario_logado';"; // query

// ------------------------------------------------------


// retorno --------------------------------------------

return retorne_numero_linhas_query($query); // retorno

// ------------------------------------------------------


};

// -----------------------------------------------------------------------


?>