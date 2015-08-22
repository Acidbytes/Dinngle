<?php


// retorne o numero da div id ----------------------

function retorne_numero_div_id($dados){


// tipo de identificador --------------------------------

// 1: imagens
// 2: postagens
// 3 comentarios

// ---------------------------------------------------------


// globals -----------------------------------------------

global $identificador_album; // identificador do album

global $identificador_postagem; // identificador postagem

global $identificador_comentario_usuario; // identificador de comentario

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


case $identificador_comentario_usuario:
$numero_div_id = "_".$id."_3"; // numero de div
break;


};

// ---------------------------------------------------------


// retorno -----------------------------------------------

return $numero_div_id; // retorno

// ---------------------------------------------------------


};

// --------------------------------------------------------


?>