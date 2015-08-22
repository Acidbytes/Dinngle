<?php


// dados evento ------------------------------------

function dados_evento(){


// globals ----------------------------------------------

global $tabela_banco; // tabela

// --------------------------------------------------------


// id de usuario logado -----------------------------

$idusuario_logado = retorne_idusuario_logado(); // id de usuario logado

// --------------------------------------------------------


// query ------------------------------------------------

$query = "select *from $tabela_banco[20] where idusuario='$idusuario_logado';"; // query

// --------------------------------------------------------


// retorna dados de query --------------------------

return retorne_dados_query($query); // dados de query

// ---------------------------------------------------------


};

// --------------------------------------------------------


?>