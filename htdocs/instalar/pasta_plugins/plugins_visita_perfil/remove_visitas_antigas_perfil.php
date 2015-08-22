<?php


// remove visitas antigas de perfil ---------------

function remove_visitas_antigas_perfil(){


// globals ----------------------------------------------

global $tabela_banco; // tabela de banco de dados

// --------------------------------------------------------


// id de usuario --------------------------------------

$idusuario = retorne_idusuario_logado(); // id de usuario

// --------------------------------------------------------


// limit de retorno de dados -----------------------

$limit_query = "order by id asc limit 100"; // limit de retorno de dados

// --------------------------------------------------------


// query ------------------------------------------------

$query = "delete from $tabela_banco[13] where idusuario='$idusuario' $limit_query;"; // query

// --------------------------------------------------------


// remove registros antigos -----------------------

comando_executa($query); // remove registros antigos

// --------------------------------------------------------


};

// --------------------------------------------------------


?>