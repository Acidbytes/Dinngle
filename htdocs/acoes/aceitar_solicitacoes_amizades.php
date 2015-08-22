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


// dados de formulario -------------------------------------------------

$aceitar_todos = $_POST['aceitar_todos']; // aceitar todos resposta

// 1 aceita todos
// 2 cancela todos

// ---------------------------------------------------------------------------


// id de usuario logado ------------------------------------------------

$idusuario_logado = retorne_idusuario_logado(); // id de usuario logado

// ---------------------------------------------------------------------------


// data atual --------------------------------------------------------------

$data_atual = data_atual(); // data atual

// ---------------------------------------------------------------------------


// monta query ----------------------------------------------------------

switch($aceitar_todos){


case 1:
$query[] = "update $tabela_banco[4] set aceitou='2', data_aceitou='$data_atual' where idusuario='$idusuario_logado' and aceitou='3' and idusuario!=idamigo and tipo_solicita='1';"; // aceita todos
$query[] = "update $tabela_banco[4] set aceitou='2', data_aceitou='$data_atual' where idamigo='$idusuario_logado' and aceitou='3' and idamigo!=idusuario and tipo_solicita='2';"; // aceita todos
$query[] = "delete from $tabela_banco[4] where idusuario='';"; // limpa dados vazios se houver
$query[] = "delete from $tabela_banco[4] where idamigo='';"; // limpa dados vazios se houver
break;


case 2:
$query[] = "delete from $tabela_banco[4] where idusuario='$idusuario_logado' and aceitou='3' and tipo_solicita='1';"; // cancela todos
$query[] = "delete from $tabela_banco[4] where idamigo='$idusuario_logado' and aceitou='3' and tipo_solicita='2';"; // cancela todos
break;


};

// --------------------------------------------------------------------------


// comandos ------------------------------------------------------------

foreach($query as $query_executar){




// verifica se query e valida ------------------------------------------

if($query_executar != null){

comando_executa($query_executar); // executando comando

};

// --------------------------------------------------------------------------




};

// --------------------------------------------------------------------------


// desconecta do mysql ----------------------------------------------

desconecta_mysql(); // desconecta do mysql

// ---------------------------------------------------------------------------


// chama index de usuario --------------------------------------------

pagina_index_usuario(); // chama index de usuario

// ----------------------------------------------------------------------------


?>