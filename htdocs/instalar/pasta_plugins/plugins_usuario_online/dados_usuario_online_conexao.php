<?php


// dados da conexao de usuario online ---------

function dados_usuario_online_conexao($idusuario){


// globals -----------------------------------------------

global $tabela_banco; // tabela de banco de dados

// ---------------------------------------------------------


// query -------------------------------------------------

$query = "select *from $tabela_banco[23] where idusuario='$idusuario';"; // query

// ---------------------------------------------------------


// retorno de dados -----------------------------------

return retorne_dados_query($query); // retorno de dados

// ---------------------------------------------------------


};

// --------------------------------------------------------


?>