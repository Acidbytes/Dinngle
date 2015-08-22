<?php


// retorna numero de comentarios ---------------

function retorne_numero_comentarios($dados){


// globals ----------------------------------------------

global $tabela_banco; // tabela de banco de dados

// --------------------------------------------------------


// separando dados ----------------------------------

$id = $dados['id']; // dados de tabela

$identificador = $dados['identificador']; // dados de tabela

// ---------------------------------------------------------


// query ------------------------------------------------

$query = "select *from $tabela_banco[11] where idcomentario='$id' and identificador='$identificador';"; // query

// --------------------------------------------------------


// numero de linhas ---------------------------------

$numero_linhas = retorne_numero_linhas_query($query); // numero de linhas

// --------------------------------------------------------


// retorno ----------------------------------------------

return $numero_linhas; // retorno

// --------------------------------------------------------


};

// --------------------------------------------------------


?>