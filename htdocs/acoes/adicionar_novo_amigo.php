<?php


// abre pasta maniparq ------------------------------------------------

chdir("../maniparq"); // abre pasta maniparq

// ---------------------------------------------------------------------------


// carrega bibliotecas --------------------------------------------------

include("bibliotecas_php.php"); // carrega bibliotecas

// ---------------------------------------------------------------------------


// carrega dados de servidor ----------------------------------------

include("../servidor/dados_servidor.php"); // carrega dados de servidor

// ---------------------------------------------------------------------------


// conecta ao mysql ----------------------------------------------------

conecta_mysql(true); // conecta ao mysql

// ---------------------------------------------------------------------------


// dados formulario ----------------------------------------------------

$idamigo = $_POST['idamigo']; // id de amigo

$rejeitar = $_POST['rejeitar']; // rejeitar amizade

// ----------------------------------------------------------------------------


// resposta pode adicionar novo amigo ----------------------------

$pode_adicionar_amigo = retorne_pode_adicionar_amigo(); // resposta pode adicionar novo amigo

// ----------------------------------------------------------------------------


// id de usuario logado -------------------------------------------------

$idusuario_logado = retorne_idusuario_logado(); // id de usuario logado

// ----------------------------------------------------------------------------


// status de amizade ----------------------------------------------------

$status_amizade = retorne_status_amizade($idamigo); // status de amizade

// ----------------------------------------------------------------------------


// verifica se rejeita amizade -----------------

if($rejeitar == 1){

$status_amizade = 3; // excluir solicitacao

};

// ----------------------------------------------------


// data atual --------------------------------------

$data_atual = data_atual(); // data atual

// ---------------------------------------------------


// adiciona notificacao -----------------------------

$dados_ntusuario['idamigo'] = $idamigo; // dados de notificacao

// ---------------------------------------------------------


// verifica tipo de amizade atual e monta query ------------------

switch($status_amizade){



case 1:
$query[1] = "insert into $tabela_banco[4] values(null, '$idusuario_logado', '$idamigo', '3', 'null', '2');"; // adicionar
$query[2] = "insert into $tabela_banco[4] values(null, '$idamigo', '$idusuario_logado', '3', 'null', '1');"; // adicionar

$dados_ntusuario['tipo_notificacao'] = 5; // dados de notificacao
adiciona_notificacao($dados_ntusuario); // adiciona notificacao
break;



case 2:
remove_referencia_amizade(); // remove referencia de amizade
break;



case 3:
remove_referencia_amizade(); // remove referencia de amizade
break;



case 4:
$query[1] = "update $tabela_banco[4] set aceitou='2', data_aceitou='$data_atual' where idusuario='$idamigo' and idamigo='$idusuario_logado';"; // adicionar
$query[2] = "update $tabela_banco[4] set aceitou='2', data_aceitou='$data_atual' where idusuario='$idusuario_logado' and idamigo='$idamigo';"; // adicionar

$dados_ntusuario['tipo_notificacao'] = 4; // dados de notificacao
adiciona_notificacao($dados_ntusuario); // adiciona notificacao
break;



default:
$query[1] = "insert into $tabela_banco[4] values(null, '$idusuario_logado', '$idamigo', '3', 'null', '2');"; // adicionar
$query[2] = "insert into $tabela_banco[4] values(null, '$idamigo', '$idusuario_logado', '3', 'null', '1');"; // adicionar

$dados_ntusuario['tipo_notificacao'] = 5; // dados de notificacao
adiciona_notificacao($dados_ntusuario); // adiciona notificacao



};

// ----------------------------------------------------------------------------


// verifica se pode adicionar nova amizade ou nao --------------

if($pode_adicionar_amigo == false and $status_amizade == 1){


// remove querys --------------------------------------------------------

$query = null; // remove querys

// ----------------------------------------------------------------------------


};

// ----------------------------------------------------------------------------


// comando ---------------------------------------------------------------

$comando = comando_executa($query[1]); // comando

$comando = comando_executa($query[2]); // comando

// ----------------------------------------------------------------------------


// desconecta do mysql -------------------------------------------------

desconecta_mysql(); // desconecta do mysql

// -----------------------------------------------------------------------------


// abre perfil de usuario amigo ---------------------------------------

abre_perfil_usuario($idamigo); // abre perfil de usuario amigo

// ----------------------------------------------------------------------------


?>