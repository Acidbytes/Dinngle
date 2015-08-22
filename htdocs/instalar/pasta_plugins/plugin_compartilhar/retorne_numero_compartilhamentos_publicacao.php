<?php


// numero compartilhamentos publicacao ------

function retorne_numero_compartilhamentos_publicacao($idpublicacao){


// globals ----------------------------------------------

global $tabela_banco; // tabela banco

// --------------------------------------------------------


// query ------------------------------------------------

$query = "select *from $tabela_banco[17] where idpublicacao='$idpublicacao';";

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