<?php


// adiciona notificacao ------------------------------

function adiciona_notificacao($dados_ntusuario){

// 1 comentarios
// 2 curtidas
// 3 compartilhamentos
// 4 aceitou amizade
// 5 solicitacao amizade
// 6 depoimentos


// global -----------------------------------------------

global $tabela_banco; // tabela de banco de dados

// --------------------------------------------------------


// dados de notificacao -----------------------------

$tipo_notificacao = remove_html($dados_ntusuario['tipo_notificacao']); // dados de notificacao
$idamigo = remove_html($dados_ntusuario['idamigo']); // dados de notificacao
$id = remove_html($dados_ntusuario['id']); // dados de notificacao
$identificador = remove_html($dados_ntusuario['identificador']); // dados de notificacao
$url_elemento = remove_html($dados_ntusuario['url_elemento']); // dados de notificacao

// --------------------------------------------------------


// id de usuario logado -----------------------------

$idusuario = retorne_idusuario_logado(); // id de usuario logado

// --------------------------------------------------------


// valida tipo de notificacao -----------------------

if($tipo_notificacao == null or $idamigo == null or $idamigo == $idusuario){

return null; // retorno nulo

};

// --------------------------------------------------------


// data atual ------------------------------------------

$data_notifica = data_atual(); // data atual

// --------------------------------------------------------


// query ------------------------------------------------

$query = "insert into $tabela_banco[24] values('$tipo_notificacao', '$idusuario', '$idamigo', '$id', '$identificador', '$url_elemento', '$data_notifica', '0');"; // query

// --------------------------------------------------------


// comando -------------------------------------------

comando_executa($query); // comando

// --------------------------------------------------------


};

// --------------------------------------------------------


?>