<?php


// retorna o id de album por id de topico --------

function retorne_idalbum_topico_id($topico_id){


// globals ------------------------------------------------

global $tabela_banco; // tabela de banco de dados

// ----------------------------------------------------------


// query --------------------------------------------------

$query = "select *from $tabela_banco[25] where id='$topico_id';"; // query

// ----------------------------------------------------------


// dados -------------------------------------------------

$dados = retorne_dados_query($query); // dados

// ----------------------------------------------------------


// retorno de de album -------------------------------

return $dados['idalbum_imagens']; // retorno de de album

// ----------------------------------------------------------


};

// --------------------------------------------------------


?>