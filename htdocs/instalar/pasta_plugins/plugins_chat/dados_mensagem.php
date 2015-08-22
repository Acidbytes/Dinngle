<?php


// dados da mensagem -----------------------------

function dados_mensagem($tipo_mensagem){


// globals ----------------------------------------------

global $tabela_banco; // tabela de banco de dados

// --------------------------------------------------------


// retorna id de usuario de chat -------------------

$idusuario = retorne_idusuario_sessao_chat(null, false); // retorna id de usuario de chat

// ---------------------------------------------------------


// id de usuario logado ------------------------------

$idusuario_logado = retorne_idusuario_logado(); // id de usuario logado

// ---------------------------------------------------------


// query -------------------------------------------------

switch($tipo_mensagem){


case 0: // logado
$query = "select *from $tabela_banco[22] where idusuario='$idusuario_logado' and idamigo='$idusuario';"; // query
break;


case 1: // amigo
$query = "select *from $tabela_banco[22] where idusuario='$idusuario' and idamigo='$idusuario_logado';"; // query
break;


};

// ---------------------------------------------------------


// dados de retorno ----------------------------------

return retorne_dados_query($query); // dados de retorno

// ---------------------------------------------------------


};

// --------------------------------------------------------


?>