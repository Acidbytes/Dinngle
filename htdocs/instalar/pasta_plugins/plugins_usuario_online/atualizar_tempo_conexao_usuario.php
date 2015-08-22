<?php


// atualiza o tempo de conexao de usuario ----

function atualizar_tempo_conexao_usuario(){


// globals -----------------------------------------------

global $tabela_banco; // tabela de banco de dados

// ---------------------------------------------------------


// id de usuario logado ------------------------------

$idusuario_logado = retorne_idusuario_logado(); // id de usuario logado

// ---------------------------------------------------------


// data atual --------------------------------------------

$data_atual = data_atual_modo_conexao_usuario(); // data atual

// ---------------------------------------------------------


// query -------------------------------------------------

$query[] = "delete from $tabela_banco[23] where idusuario='$idusuario_logado';"; // query
$query[] = "insert into $tabela_banco[23] values('$idusuario_logado', '$data_atual');"; // query

// ---------------------------------------------------------


// executa querys -------------------------------------

executador_querys($query); // executa querys

// ---------------------------------------------------------


};

// --------------------------------------------------------


?>