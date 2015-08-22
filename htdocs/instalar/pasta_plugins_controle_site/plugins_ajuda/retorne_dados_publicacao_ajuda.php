<?php


// retorne dados da publicacao de ajuda -------

function retorne_dados_publicacao_ajuda($topico_id){


// globals -----------------------------------------------

global $tabela_banco; // tabelas de banco de dados

// ---------------------------------------------------------


// query -------------------------------------------------

$query = "select *from $tabela_banco[25] where id='$topico_id';"; // query

// ---------------------------------------------------------


// retorna dados --------------------------------------

return retorne_dados_query($query); // retorna dados

// ---------------------------------------------------------


};

// --------------------------------------------------------


?>