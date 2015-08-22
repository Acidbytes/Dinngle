<?php


// retorna o numero de depoimentos -----------

function retorne_numero_depoimentos($tipo_depoimento){


// globals ---------------------------------------------

global $tabela_banco; // tabela de banco de dados

// -------------------------------------------------------


// id usuario ------------------------------------------

$idusuario = retorne_idusuario_visualizando_perfil(); // id usuario

// -------------------------------------------------------


// query -----------------------------------------------

switch($tipo_depoimento){


case 1:
$query = "select *from $tabela_banco[12] where idusuario='$idusuario' and aceitou='1';"; // query
break;


case 2:
$query = "select *from $tabela_banco[12] where idamigo='$idusuario' and aceitou='1';"; // query
break;


case 3:
$query = "select *from $tabela_banco[12] where idusuario='$idusuario' and aceitou='2';"; // query
break;


case 4:
$query = "select *from $tabela_banco[12] where idamigo='$idusuario' and aceitou='2';"; // query
break;


};

// --------------------------------------------------------


// retorna numero de linhas -----------------------

return retorne_numero_linhas_query($query); // retorna numero de linhas

// --------------------------------------------------------


};

// --------------------------------------------------------


?>