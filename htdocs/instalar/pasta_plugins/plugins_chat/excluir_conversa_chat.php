<?php


// exclui conversa de chat -------------------------

function excluir_conversa_chat(){


// globals ----------------------------------------------

global $tabela_banco; // tabela de banco de dados

// --------------------------------------------------------


// retorna id de usuario de chat -------------------

$idusuario = retorne_idusuario_sessao_chat(null, false); // retorna id de usuario de chat

// ---------------------------------------------------------


// id de usuario logado ------------------------------

$idusuario_logado = retorne_idusuario_logado(); // id de usuario logado

// ---------------------------------------------------------


// querys ------------------------------------------------

$query[] = "update $tabela_banco[22] set mensagem='', data_mensagem='', visualizada='0' where idusuario='$idusuario_logado' and idamigo='$idusuario';"; // query
$query[] = "update $tabela_banco[22] set visualizada='1' where idamigo='$idusuario_logado' and idusuario='$idusuario';"; // query
$query[] = "update $tabela_banco[22] set visualizada='1' where idusuario='$idusuario_logado' and idamigo='$idusuario';"; // query

// ---------------------------------------------------------


// salvando mensagens ----------------------------

executador_querys($query); // salvando mensagens

// ---------------------------------------------------------


};

// --------------------------------------------------------


?>