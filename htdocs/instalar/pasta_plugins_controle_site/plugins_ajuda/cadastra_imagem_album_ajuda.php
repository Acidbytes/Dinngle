<?php


// cadastra a imagem no album ------------------

function cadastra_imagem_album_ajuda($url_imagem, $idalbum_imagens){


// globals -----------------------------------------------

global $tabela_banco; // tabelas de banco de dados

// ---------------------------------------------------------


// id de usuario logado ------------------------------

$idusuario_logado = retorne_idusuario_logado(); // id de usuario logado

// ---------------------------------------------------------


// nome da imagem ----------------------------------

$nome_imagem = basename($url_imagem); // nome da imagem

// ---------------------------------------------------------


// url de imagem --------------------------------------

$url_imagem = retorne_pasta_imagem_album_ajuda().$nome_imagem; // url de imagem

// ---------------------------------------------------------


// query -------------------------------------------------

$query = "insert into $tabela_banco[26] values(null, '$url_imagem', '$idalbum_imagens', '');"; // query

// ---------------------------------------------------------


// executa comando ----------------------------------

$comando = comando_executa($query); // executa comando

// ---------------------------------------------------------


};

// --------------------------------------------------------


?>