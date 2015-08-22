<?php


// envia depoimento ---------------------------------

function enviar_depoimento(){


// globals ----------------------------------------------

global $tabela_banco; // tabela de banco de dados

// --------------------------------------------------------


// dados formulario ----------------------------------

$depoimento = remove_html($_POST['depoimento']); // dados de formulario

$idusuario = remove_html($_POST['idusuario']); // id de usuario

// ---------------------------------------------------------


// nao permite depoimentos vazios --------------

if($depoimento == null or $idusuario == null){

return null; // retorno nulo

};

// ---------------------------------------------------------


// id de usuario logado ------------------------------

$idusuario_logado = retorne_idusuario_logado(); // id de usuario logado

// ---------------------------------------------------------


// data atual -------------------------------------------

$data_atual = data_atual(); // data atual

// ---------------------------------------------------------


// query -------------------------------------------------

$query = "insert into $tabela_banco[12] values(null, '$idusuario', '$idusuario_logado', '$depoimento', '$data_atual', '2');"; // query

// ---------------------------------------------------------


// salvando depoimento -----------------------------

comando_executa($query); // salvando depoimento

// ---------------------------------------------------------


// adiciona notificacao ------------------------------

$dados_ntusuario['tipo_notificacao'] = 6; // dados de notificacao
$dados_ntusuario['idamigo'] = $idusuario; // dados de notificacao
$dados_ntusuario['identificador'] = 2; // dados de notificacao

// --------------------------------------------------------


// adiciona notificacao ------------------------------

adiciona_notificacao($dados_ntusuario); // adiciona notificacao

// --------------------------------------------------------


};

// --------------------------------------------------------


?>