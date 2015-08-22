<?php


// retorne dados publicacao por idalbum ----

function retorne_dados_publicacao_idalbum($idalbum_imagens){


// globals ----------------------------------------------

global $tabela_banco; // tabela banco

// --------------------------------------------------------


// query -------------------------------------------------

$query = "select *from $tabela_banco[9] where idalbum_imagens='$idalbum_imagens';"; // query

// --------------------------------------------------------


// dados -----------------------------------------------

$dados = retorne_dados_query($query); // dados

// --------------------------------------------------------


// retorno ----------------------------------------------

return $dados; // retorno

// --------------------------------------------------------


};

// --------------------------------------------------------


?>