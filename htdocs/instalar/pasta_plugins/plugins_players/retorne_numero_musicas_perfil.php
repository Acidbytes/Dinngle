<?php


// retorne numeor de musicas perfil --------------

function retorne_numero_musicas_perfil(){


// globals ------------------------------------------------

global $tabela_banco; // tabela de banco

// ----------------------------------------------------------


// id de usuario ----------------------------------------

$idusuario = retorne_idusuario_visualizando_perfil(); // id de usuario

// ----------------------------------------------------------


// query --------------------------------------------------

$query = "select *from $tabela_banco[7] where idusuario='$idusuario';"; // query

// ----------------------------------------------------------


// numero de linhas -----------------------------------

$numero_linhas =  retorne_numero_linhas_query($query); // numero de linhas

// ----------------------------------------------------------


// retorna numero de linhas -------------------------

return $numero_linhas; // retorna numero de linhas

// ----------------------------------------------------------


};

// --------------------------------------------------------


?>