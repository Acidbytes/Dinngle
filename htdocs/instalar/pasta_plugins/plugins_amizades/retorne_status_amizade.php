<?php


// retorna status de amizade ----------------------

function retorne_status_amizade($idamigo){


// 1 adicionar
// 2 excluir
// 3 cancelar
// 4 aceitar


// globals ----------------------------------------------

global $tabela_banco; // tabela

// --------------------------------------------------------


// id de usuario logado -----------------------------

$idusuario_logado = retorne_idusuario_logado(); // id de usuario logado

// --------------------------------------------------------


// query ------------------------------------------------

$query = "select *from $tabela_banco[4] where idusuario='$idusuario_logado' and idamigo='$idamigo';"; // query

// --------------------------------------------------------


// comando -------------------------------------------

$comando = comando_executa($query); // comando

// --------------------------------------------------------


// numero de linhas ---------------------------------

$numero_linhas = mysql_num_rows($comando); // numero de linhas

// --------------------------------------------------------


// dados -----------------------------------------------

$dados = mysql_fetch_array($comando, MYSQL_ASSOC); // dados

// --------------------------------------------------------


// retorna que pode adicionar ---------------------

if($numero_linhas == 0){

return 1; // retorna que pode adicionar

};

// --------------------------------------------------------


// dados de tabela -----------------------------------

$aceitou = $dados['aceitou']; // dados

$tipo_solicita = $dados['tipo_solicita']; // tipo de solicitacao

// --------------------------------------------------------


// tipo de solicitacao --------------------------------

switch($tipo_solicita){


// se for amigo nao faca nada --------------------
case 1:
if($aceitou != 2){
$aceitou = 4; // aceitar solicitacao
};
break;
// --------------------------------------------------------








};

// --------------------------------------------------------


// tipo de retorno ------------------------------------

return $aceitou; // retorno

// -------------------------------------------------------


};

// --------------------------------------------------------


?>