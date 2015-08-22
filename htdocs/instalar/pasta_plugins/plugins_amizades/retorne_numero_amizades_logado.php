<?php


// numero amigos usuario logado ----------------

function retorne_numero_amizades_logado(){


// globals -----------------------------------------------

global $tabela_banco; // tabela de banco de dados

// ---------------------------------------------------------


// id de usuario logado ------------------------------

$idusuario_logado = retorne_idusuario_logado(); // id de usuario logado

// ---------------------------------------------------------


// query -------------------------------------------------

$query = "select *from $tabela_banco[4] where idusuario='$idusuario_logado' and aceitou='2';"; // query

// ---------------------------------------------------------


// retorno -----------------------------------------------

return retorne_numero_linhas_query($query); // retorno

// ----------------------------------------------------------


};

// --------------------------------------------------------


?>