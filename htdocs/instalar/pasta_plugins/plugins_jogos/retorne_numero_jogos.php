<?php


// retorna o numero de jogos -------------------

function retorne_numero_jogos(){


// globals -----------------------------------------------

global $tabela_banco; // banco de dados

global $pasta_jogos; // pasta de jogos

// ---------------------------------------------------------


// termo de pesquisa -------------------------------

$termo_pesquisa = retorne_termo_pesquisa(); // termo de pesquisa

// ---------------------------------------------------------


// query -------------------------------------------------

$query = "select *from $tabela_banco[29] where nome like '%$termo_pesquisa%' or descricao like '%$termo_pesquisa%';"; // query

// -----------------------------------------------------------


// retorno ------------------------------------------------

return retorne_numero_linhas_query($query); // retorno

// -----------------------------------------------------------


};

// --------------------------------------------------------


?>