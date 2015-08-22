<?php


// retorne numero de lembretes ------------------

function retorne_numero_lembretes(){


// globals ----------------------------------------------

global $tabela_banco; // tabela

// --------------------------------------------------------


// id de usuario logado -----------------------------

$idusuario_logado = retorne_idusuario_logado(); // id de usuario logado

// --------------------------------------------------------


// query ------------------------------------------------

$query = "select *from $tabela_banco[16] where idusuario='$idusuario_logado';"; // query

// --------------------------------------------------------


// retorno ----------------------------------------------

return retorne_numero_linhas_query($query); // retorno

// --------------------------------------------------------


};

// --------------------------------------------------------


?>