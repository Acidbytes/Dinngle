<?php


// retorna os dados do array do curriculo -------

function retorne_dados_array_curriculo(){


// globals -----------------------------------------------

global $tabela_banco; // tabelas

// ---------------------------------------------------------


// id usuario visualizando perfil -------------------

$idusuario = retorne_idusuario_visualizando_perfil(); // id usuario visualizando perfil

// --------------------------------------------------------


// query -------------------------------------------------

$query = "select *from $tabela_banco[14] where idusuario='$idusuario';"; // query

// ---------------------------------------------------------


// retorno -----------------------------------------------

return retorne_dados_query($query); // retorno

// ---------------------------------------------------------


};

// --------------------------------------------------------


?>