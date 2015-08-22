<?php


// compartilhar conteudo --------------------------

function compartilhar_conteudo(){


// globals ----------------------------------------------

global $tabela_banco; // tabela de banco

// --------------------------------------------------------


// dados de formulario -----------------------------

$idusuario = remove_html($_POST['idusuario']); // dados de formulario

$idamigo = remove_html($_POST['idamigo']); // dados de formulario

$idpublicacao = remove_html($_POST['id']); // dados de formulario

// --------------------------------------------------------


// informa se ja foi compartilhado ---------------

$compartilhado_resposta = retorne_esta_compartilhado($idusuario, $idamigo, $idpublicacao); // informa se ja foi compartilhado

// --------------------------------------------------------


// query ------------------------------------------------

$query = "Insert into $tabela_banco[17] values('null', '$idusuario', '$idamigo', '$idpublicacao');"; // query

// --------------------------------------------------------


// adiciona notificacao -----------------------------

$dados_ntusuario['tipo_notificacao'] = 3; // dados de notificacao
$dados_ntusuario['idamigo'] = $idamigo; // dados de notificacao
$dados_ntusuario['id'] = $idpublicacao; // dados de notificacao

// ---------------------------------------------------------


// adiciona notificacao ------------------------------

if($compartilhado_resposta == false){

adiciona_notificacao($dados_ntusuario); // adiciona notificacao

};

// --------------------------------------------------------


// comando -------------------------------------------

if($compartilhado_resposta == false){

comando_executa($query); // comando

};

// --------------------------------------------------------


};

// -------------------------------------------------------


?>