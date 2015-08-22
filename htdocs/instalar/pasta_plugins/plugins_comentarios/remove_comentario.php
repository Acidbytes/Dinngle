<?php


// remove comentario ------------------------------------

function remove_comentario(){


// globals ----------------------------------------------------

global $tabela_banco; // tabela de banco de dados

// --------------------------------------------------------------


// id de usuario logado -----------------------------------

$idusuario_logado = retorne_idusuario_logado(); // id de usuario logado

// --------------------------------------------------------------


// dados de formulario ------------------------------------

$id = $_POST['id']; // id de post

$idusuario = $_POST['idusuario']; // id de usuario dono do post

// --------------------------------------------------------------


// query ------------------------------------------------------

$query = "delete from $tabela_banco[11] where id='$id' and idusuario='$idusuario';"; // query

// --------------------------------------------------------------


// comando --------------------------------------------------

comando_executa($query); // comando

// --------------------------------------------------------------


// remove referencia de publicacao global -----------

remover_referencia_publicacao_global($id); // removendo referencia

// ---------------------------------------------------------------


};

// ---------------------------------------------------------------


?>