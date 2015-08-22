<?php


// limpa as notificacoes de usuario --------------

function limpar_notificacoes_usuario(){


// globals ------------------------------------------------

global $tabela_banco; // tabela de banco de dados

// ----------------------------------------------------------


// id de usuario logado -------------------------------

$idusuario = retorne_idusuario_logado(); // id de usuario logado

// ----------------------------------------------------------


// query --------------------------------------------------

$query = "delete from $tabela_banco[24] where idamigo='$idusuario';"; // query

// ----------------------------------------------------------


// comando ---------------------------------------------

if($idusuario != null){

comando_executa($query); // comando

};

// ----------------------------------------------------------


};

// --------------------------------------------------------


?>