<?php


// atualizar o comentario ---------------------------------

function atualizar_comentario(){


// globals ----------------------------------------------------

global $tabela_banco; // tabela de banco de dados

// --------------------------------------------------------------


// dados de formulario ------------------------------------

$id = remove_html($_POST['id']); // id de post

$comentario = remove_html($_POST['comentario']); // comentario de usuario

// --------------------------------------------------------------


// converte comentario para utf8 -----------------------
// isto acontece porque o comentario ja foi
// decodificado em utf8 anteriormente, entao e necessario
// converte-lo novamente

$comentario = converte_para_utf8($comentario); // converte comentario para utf8

// --------------------------------------------------------------


// id de usuario logado -----------------------------------

$idusuario_logado = retorne_idusuario_logado(); // id de usuario logado

// --------------------------------------------------------------


// data atual ------------------------------------------------

$data_atual = data_atual(); // data atual

// --------------------------------------------------------------


// query ------------------------------------------------------

$query = "update $tabela_banco[11] set comentario='$comentario', data_comentou='$data_atual' where idcomentario='$id' and idusuario_comentario='$idusuario_logado';"; // query

// --------------------------------------------------------------


// comando -------------------------------------------------

comando_executa($query); // comando

// --------------------------------------------------------------


};

// ---------------------------------------------------------------


?>