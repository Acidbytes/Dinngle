<?php


// curtir social -----------------------------------------

function curtir_social(){


// globals -------------------------------------------------

global $identificador_album; // identificador do album

global $identificador_postagem; // identificador postagem

global $identificador_comentario_usuario; // identificador de comentario

global $tabela_banco; // tabela de banco de dados

// -----------------------------------------------------------


// tipo de identificador --------------------------------

// 1: imagens

// 2: postagem

// 3 comentario

// ---------------------------------------------------------


// campo de formulario -----------------------------

$id = $_POST['id']; // campo de formulario

$tipo_curtida = $_POST['tipo_curtida']; // campo de formulario

$idusuario = $_POST['idusuario']; // id de usuario

// --------------------------------------------------------


// se id ou tipo de curtida nao for informado sair -------------------

if($id == null or $tipo_curtida == null){

return false; // se id ou tipo de curtida nao for informado sair

};

// -------------------------------------------------------------------------------


// id de usuario logado -----------------------------

$idusuario_logado = retorne_idusuario_logado(); // id de usuario logado

// --------------------------------------------------------


// tipo de curtida -------------------------------------

switch($tipo_curtida){


case 1:
$identificador = $identificador_album; // tipo de identificador
break;


case 2:
$identificador = $identificador_postagem; // tipo de identificador
break;


case 3:
$identificador = $identificador_comentario_usuario; // tipo de identificador
break;

};

// --------------------------------------------------------


// query ------------------------------------------------

$query = "select *from $tabela_banco[10] where id='$id' and idusuario_curtiu='$idusuario_logado' and identificador='$identificador';"; // query

// --------------------------------------------------------


// numero de curtidas -------------------------------

$numero_curtidas = retorne_numero_linhas_query($query); // numero de curtidas

// --------------------------------------------------------


// data atual -------------------------------------------

$data_atual = data_atual(); // data atual

// --------------------------------------------------------


// verifica se descurte ou curte -------------------

if($numero_curtidas == 0){

$query = "insert into $tabela_banco[10] values('$id', '$idusuario_logado', '$data_atual', '$identificador');"; // query curte

}else{

$query = "delete from $tabela_banco[10] where id='$id' and idusuario_curtiu='$idusuario_logado' and identificador='$identificador';"; // query descurte

};

// --------------------------------------------------------


// adiciona notificacao -----------------------------

$dados_ntusuario['tipo_notificacao'] = 2; // dados de notificacao
$dados_ntusuario['idamigo'] = $idusuario; // dados de notificacao
$dados_ntusuario['id'] = $id; // dados de notificacao
$dados_ntusuario['identificador'] = $tipo_curtida; // dados de notificacao

// ---------------------------------------------------------


// adiciona notificacao ------------------------------

if($numero_curtidas == 0){

adiciona_notificacao($dados_ntusuario); // adiciona notificacao

};

// --------------------------------------------------------


// comando -------------------------------------------

comando_executa($query); // comando

// ---------------------------------------------------------


};

// --------------------------------------------------------


?>