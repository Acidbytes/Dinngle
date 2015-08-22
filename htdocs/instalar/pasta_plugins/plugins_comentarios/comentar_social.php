<?php


// comentar social ------------------------------------

function comentar_social(){


// tipo de identificador --------------------------------

// 1: imagens

// 2: postagem

// ---------------------------------------------------------


// globals -----------------------------------------------

global $identificador_album; // identificador do album

global $identificador_postagem; // identificador postagem

global $tabela_banco; // tabela de banco de dados

// ---------------------------------------------------------


// dados de formulario ------------------------------

$id = $_POST['id']; // id de item a ser curtido

$idusuario = $_POST['idusuario']; // id de usuario dono do post/imagem

$tipo_comentario = $_POST['tipo_comentario']; // tipo de comentario

$comentario = remove_html($_POST['comentario']); // comentario

// ---------------------------------------------------------


// id de usuario logado -----------------------------

$idusuario_logado = retorne_idusuario_logado(); // id de usuario logado

// --------------------------------------------------------


// adiciona notificacao -----------------------------

$dados_ntusuario['tipo_notificacao'] = 1; // dados de notificacao
$dados_ntusuario['idamigo'] = $idusuario; // dados de notificacao
$dados_ntusuario['id'] = $id; // dados de notificacao
$dados_ntusuario['identificador'] = $tipo_comentario; // dados de notificacao

// ---------------------------------------------------------


// adiciona notificacao ------------------------------

adiciona_notificacao($dados_ntusuario); // adiciona notificacao

// --------------------------------------------------------


// tipo de comentario -------------------------------

switch($tipo_comentario){


case 1:
$identificador = $identificador_album; // tipo de identificador
break;


case 2:
$identificador = $identificador_postagem; // tipo de identificador
break;


};

// --------------------------------------------------------


// data atual -------------------------------------------

$data_atual = data_atual(); // data atual

// --------------------------------------------------------


// query ------------------------------------------------

$query = "insert into $tabela_banco[11] values('null', '$id', '$idusuario', '$idusuario_logado', '$data_atual', '$comentario', '$identificador');"; // query

// --------------------------------------------------------


// comando -------------------------------------------

if($id != null and $comentario != null and $tipo_comentario != null){

comando_executa($query); // comando

};

// --------------------------------------------------------


};

// --------------------------------------------------------


?>