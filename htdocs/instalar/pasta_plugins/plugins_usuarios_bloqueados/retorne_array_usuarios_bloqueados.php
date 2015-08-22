<?php


// retorne o array com usuarios bloqueados ---

function retorne_array_usuarios_bloqueados(){


// globals --------------------------------------------

global $tabela_banco; // tabela de banco

// ------------------------------------------------------


// array de retorno --------------------------------

$array_retorno = array(); // array de retorno

// -----------------------------------------------------


// id de usuario logado --------------------------

$idusuario_logado = retorne_idusuario_logado(); // id de usuario logado

// ----------------------------------------------------


// limit de query ----------------------------------

$limit_query = retorne_limit_pesquisa_geral_get(); // limit de query

// ----------------------------------------------------


// query --------------------------------------------

$query = "select *from $tabela_banco[21] where idusuario='$idusuario_logado' $limit_query;"; // query

// ------------------------------------------------------


// comando -----------------------------------------

$comando = comando_executa($query); // comando

// ------------------------------------------------------


// numero de linhas -------------------------------

$numero_linhas = retorne_numero_linhas_comando($comando); // numero de linhas

// ------------------------------------------------------


// contador ------------------------------------------

$contador = 0; // contador

// ------------------------------------------------------


// obtendo lista -------------------------------------

for($contador == $contador; $contador <= $numero_linhas; $contador++){


// dados ---------------------------------------------

$dados = mysql_fetch_array($comando, MYSQL_ASSOC); // dados

// ------------------------------------------------------


// separa valores ----------------------------------

$idusuario_bloqueado = $dados['idusuario_bloqueado']; // id de usuario bloqueado

// ------------------------------------------------------


// valida idusuario bloqueado -------------------

if($idusuario_bloqueado != null){

$array_retorno[] = $idusuario_bloqueado; // atualiza array

};

// ------------------------------------------------------


};

// ------------------------------------------------------


// retorno --------------------------------------------

return $array_retorno; // retorno

// ------------------------------------------------------


};

// -------------------------------------------------------


?>