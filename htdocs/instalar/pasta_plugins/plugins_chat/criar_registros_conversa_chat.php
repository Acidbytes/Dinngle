<?php


// criar registros conversa chat ---------------

function criar_registros_conversa_chat($idusuario){


// globals ---------------------------------------------

global $tabela_banco; // tabela do banco

// --------------------------------------------------------


// id de usuario logado ---------------------------

$idusuario_logado = retorne_idusuario_logado(); // id de usuario logado

// --------------------------------------------------------


// query -----------------------------------------------

$query = "select *from $tabela_banco[22] where idusuario='$idusuario_logado' and idamigo='$idusuario';"; // query

// -------------------------------------------------------


// numero de linhas -------------------------------

$numero_linhas = retorne_numero_linhas_query($query); // numero de linhas

// --------------------------------------------------------


// limpa query antiga -----------------------------

$query = null; // limpa query antiga

// -------------------------------------------------------


// limpa duplicatas se houver -----------------

if($numero_linhas > 1){


// querys ---------------------------------------------

$query[] = "delete from $tabela_banco[22] where idamigo='$idusuario_logado' and idusuario='$idusuario';"; // query
$query[] = "delete from $tabela_banco[22] where idamigo='$idusuario' and idusuario='$idusuario_logado';"; // query

// -------------------------------------------------------


// excluindo duplicatas -------------------------

executador_querys($query); // excluindo duplicatas

// ------------------------------------------------------


// zera querys -------------------------------------

$query[] = null; // zera querys

// ------------------------------------------------------


};

// --------------------------------------------------------


// criando registros --------------------------------

if($numero_linhas == 0){


// querys -----------------------------------------------

$query[] = "insert into $tabela_banco[22] values('null', '$idusuario_logado', '$idusuario', '', '', '');"; // query
$query[] = "insert into $tabela_banco[22] values('null', '$idusuario', '$idusuario_logado', '', '', '');"; // query

// --------------------------------------------------------


// executando querys -----------------------------

executador_querys($query); // executando querys

// ---------------------------------------------------------


};

// --------------------------------------------------------


};

// --------------------------------------------------------


?>