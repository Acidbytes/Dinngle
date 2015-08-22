<?php


// gera o nome id do campo input de comentario ---------

function gera_idcampo_input_comentario($dados){


// tipo de identificador --------------------------------

// 1: imagens

// 2: postagem

// ---------------------------------------------------------


// globals -----------------------------------------------

global $identificador_album; // identificador do album

global $identificador_postagem; // identificador postagem

// ---------------------------------------------------------


// separando dados ----------------------------------

$id = $dados['id']; // dados de tabela

$identificador = $dados['identificador']; // dados de tabela

// ---------------------------------------------------------


// verifica o tipo de div -------------------------------

switch($identificador){


case $identificador_album:
$numero_div_id = "_".$id."_1"; // numero de div
break;


case $identificador_postagem:
$numero_div_id = "_".$id."_2"; // numero de div
break;


};

// ---------------------------------------------------------


// nome id ---------------------------------------------

$nome_id_campo_input = "campo_input_comentario_publicacao".$numero_div_id; // nome id

// --------------------------------------------------------


// retorno -----------------------------------------------

return $nome_id_campo_input; // retorno

// ---------------------------------------------------------


};

// --------------------------------------------------------------------


?>