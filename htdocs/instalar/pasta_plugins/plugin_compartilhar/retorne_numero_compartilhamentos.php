<?php


// retorna o numero de compartilhamentos ----

function retorne_numero_compartilhamentos($idusuario){


// globals ----------------------------------------------

global $tabela_banco; // tabela banco

// --------------------------------------------------------


// query ------------------------------------------------

$query = "select *from $tabela_banco[17] where idusuario='$idusuario';";

// --------------------------------------------------------


// comando -------------------------------------------

$comando = comando_executa($query); // comando

// --------------------------------------------------------


// numero de linhas ---------------------------------

$numero_linhas = retorne_numero_linhas_comando($comando); // numero de linhas

// --------------------------------------------------------


// retorno ----------------------------------------------

return $numero_linhas; // retorno

// --------------------------------------------------------


};

// --------------------------------------------------------


?>