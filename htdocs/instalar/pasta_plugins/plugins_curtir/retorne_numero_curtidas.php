<?php


// retorna o numero de curtidas ------------------

function retorne_numero_curtidas($dados){


// globals ----------------------------------------------

global $tabela_banco; // tabela de banco de dados

// --------------------------------------------------------


// separando dados ----------------------------------

$id = $dados['id']; // dados de tabela

$identificador = $dados['identificador']; // dados de tabela

// ---------------------------------------------------------


// query ------------------------------------------------

$query = "select *from $tabela_banco[10] where id='$id' and identificador='$identificador';"; // query

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