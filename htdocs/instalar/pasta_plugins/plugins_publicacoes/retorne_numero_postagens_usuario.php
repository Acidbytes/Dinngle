<?php


// retorna o numero de postagens de usuario -

function retorne_numero_postagens_usuario(){


// globals ----------------------------------------------

global $tabela_banco; // tabela de banco de dados

// --------------------------------------------------------


// id usuario -------------------------------------------

$idusuario = retorne_idusuario_visualizando_perfil(); // id usuario

// --------------------------------------------------------


// query ------------------------------------------------

$query = "select *from $tabela_banco[9] where idusuario='$idusuario';"; // query

// --------------------------------------------------------


// retorna numero de linhas -----------------------

return retorne_numero_linhas_query($query); // retorna numero de linhas

// --------------------------------------------------------


};

// --------------------------------------------------------


?>