<?php


// retorna o numero de amizades ou solicitacoes ---------------

function retorne_numero_amizades_solicitacoes($tipo_retorno){


// 1 retorna amigos ja aceitos
// 2 retorna solicitacoes


// tipo_solicita = 1 solicitacoes que enviou
// tipo_solicita = 2 solicitacoes que recebeu


// globals -----------------------------------------------

global $tabela_banco; // tabela de banco de dados

// ---------------------------------------------------------


// id de usuario visualizando perfil ----------------

$idusuario = retorne_idusuario_visualizando_perfil(); // id de usuario visualizando perfil

// ---------------------------------------------------------


// id de usuario logado ------------------------------

$idusuario_logado = retorne_idusuario_logado(); // id de usuario logado

// ---------------------------------------------------------


// tipo de query ----------------------------------------

switch($tipo_retorno){


case 1:
$query = "select *from $tabela_banco[4] where idusuario='$idusuario' and aceitou='2';"; // query
break;


case 2:
$query = "select *from $tabela_banco[4] where idusuario='$idusuario_logado' and aceitou='3' and tipo_solicita='2';"; // query
break;


case 3:
$query = "select *from $tabela_banco[4] where idusuario='$idusuario_logado' and aceitou='3' and tipo_solicita='1';"; // query
break;


};

// --------------------------------------------------------


// executa query --------------------------------------

$comando = comando_executa($query); // executa query

// --------------------------------------------------------


// retorno ----------------------------------------------

return retorne_numero_linhas_comando($comando); // retorno

// --------------------------------------------------------


};

// ---------------------------------------------------------------------------


?>