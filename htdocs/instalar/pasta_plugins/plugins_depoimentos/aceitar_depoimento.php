<?php


// aceitar depoimento ------------------------------

function aceitar_depoimento(){


// globals ---------------------------------------------

global $tabela_banco; // tabela de banco de dados

// -------------------------------------------------------


// dados de formulario -----------------------------

$aceitar = $_POST['aceitar']; // aceitar

$id = $_POST['id']; // id de depoimento

$idusuario = $_POST['idusuario']; // id de usuario que enviou o depoimento

// --------------------------------------------------------


// id de usuario logado ----------------------------

$idusuario_logado = retorne_idusuario_logado(); // id de usuario logado

// -------------------------------------------------------


// adiciona notificacao -----------------------------

$dados_ntusuario['tipo_notificacao'] = 6; // dados de notificacao
$dados_ntusuario['idamigo'] = $idusuario; // dados de notificacao
$dados_ntusuario['identificador'] = 1; // dados de notificacao

// --------------------------------------------------------


// aceitar excluir etc --------------------------------

switch($aceitar){


case 1:
$query = "update $tabela_banco[12] set aceitou='1' where id='$id' and idusuario='$idusuario_logado';"; // aceitar
adiciona_notificacao($dados_ntusuario); // adiciona notificacao
break;


case 2:
$query = "delete from $tabela_banco[12] where id='$id' and idusuario='$idusuario_logado';"; // aceitar
break;


case 3:
$query = "delete from $tabela_banco[12] where id='$id' and idamigo='$idusuario_logado';"; // aceitar
break;


case 4:
$query = "delete from $tabela_banco[12] where id='$id' and idamigo='$idusuario_logado';"; // aceitar
break;


case 5:
$query = "delete from $tabela_banco[12] where id='$id' and idusuario='$idusuario_logado';"; // aceitar
break;


};

// --------------------------------------------------------


// comando -------------------------------------------

comando_executa($query); // comando

// --------------------------------------------------------


};

// --------------------------------------------------------


?>