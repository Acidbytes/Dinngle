<?php


// dados evento ------------------------------------

function dados_evento_idusuario($idusuario){


// globals ----------------------------------------------

global $tabela_banco; // tabela

// --------------------------------------------------------


// query ------------------------------------------------

$query = "select *from $tabela_banco[20] where idusuario='$idusuario';"; // query

// --------------------------------------------------------


// retorna dados de query --------------------------

return retorne_dados_query($query); // dados de query

// ---------------------------------------------------------


};

// --------------------------------------------------------


?>