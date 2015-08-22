<?php


// retorna o numero de visitas no perfil ---------

function retorne_numero_visitas_perfil(){


// globals ----------------------------------------------

global $tabela_banco; // tabela de banco de dados

// --------------------------------------------------------


// id de usuario logado -----------------------------

$idusuario_logado = retorne_idusuario_logado(); // id de usuario logado

// --------------------------------------------------------


// query ------------------------------------------------

$query = "select *from $tabela_banco[13] where idusuario='$idusuario_logado';"; // query

// --------------------------------------------------------


// retorno ----------------------------------------------

return retorne_numero_linhas_query($query); // retorno

// --------------------------------------------------------


};

// --------------------------------------------------------


?>