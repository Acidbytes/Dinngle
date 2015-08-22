<?php


// retorna o numero de novas mensagens -----

function retorne_numero_novas_mensagens(){


// globals ----------------------------------------------

global $tabela_banco; // tabela de banco de dados

// --------------------------------------------------------


// id de usuario logado ------------------------------

$idusuario_logado = retorne_idusuario_logado(); // id de usuario logado

// ---------------------------------------------------------


// query -------------------------------------------------

$query = "select *from $tabela_banco[22] where idamigo='$idusuario_logado' and visualizada='0';"; // query

// ---------------------------------------------------------


// retorna numero de linhas ------------------------

return retorne_numero_linhas_query($query); // retorna numero de linhas

// ---------------------------------------------------------


};

// --------------------------------------------------------


?>