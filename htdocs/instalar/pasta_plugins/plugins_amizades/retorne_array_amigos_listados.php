<?php


// retorne o array com amigos listados ---------

function retorne_array_amigos_listados($idusuario){


// globals -----------------------------------------------

global $tabela_banco; // tabela de banco

// ---------------------------------------------------------


// limit query -------------------------------------------

$limit_query = retorne_limit_tabela_get(); // limit query

// ---------------------------------------------------------


// query -------------------------------------------------

$query = "select *from $tabela_banco[4] where idusuario='$idusuario' and aceitou='2' $limit_query;"; // query

// ---------------------------------------------------------


// comando --------------------------------------------

$comando = comando_executa($query); // comando

// ---------------------------------------------------------


// numero de linhas ----------------------------------

$numero_linhas = retorne_numero_linhas_comando($comando); // numero de linhas

// ----------------------------------------------------------


// contador ----------------------------------------------

$contador = 0; // contador

// ----------------------------------------------------------


// array de retorno de amigos -----------------------

$array_idamigo = array(); // array de retorno de amigos

// ----------------------------------------------------------


// obtendo ids -------------------------------------------

for($contador == $contador; $contador <= $numero_linhas; $contador++){


// dados --------------------------------------------------

$dados = mysql_fetch_array($comando, MYSQL_ASSOC); // dados

// -----------------------------------------------------------


// idamigo ------------------------------------------------

$idamigo = $dados['idamigo']; // id de amigo

// -----------------------------------------------------------


// atualiza array de retorno ---------------------------

if($idamigo != null){

$array_idamigo[] = $idamigo; // atualizando array com ids de amigos

};

// -----------------------------------------------------------


};

// -----------------------------------------------------------


// retorno -------------------------------------------------

return $array_idamigo; // retorno

// -----------------------------------------------------------


};

// --------------------------------------------------------


?>