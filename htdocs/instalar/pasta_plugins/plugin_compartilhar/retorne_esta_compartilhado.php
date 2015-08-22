<?php


// retorna se ja esta compartilhado --------------

function retorne_esta_compartilhado($idusuario, $idamigo, $idpublicacao){


// globals ----------------------------------------------

global $tabela_banco; // tabela de banco

// --------------------------------------------------------


// query ------------------------------------------------

$query = "select *from $tabela_banco[17] where idusuario='$idusuario' and idamigo='$idamigo' and idpublicacao='$idpublicacao';"; // query

// --------------------------------------------------------


// numero de linhas ---------------------------------

$numero_linhas = retorne_numero_linhas_query($query); // numero de linhas

// --------------------------------------------------------


// retorno ----------------------------------------------

if($numero_linhas > 0){

return true; // retorna ja compartilhado

}else{

return false; // retorna nao compartilhado

};

// --------------------------------------------------------


};

// --------------------------------------------------------


?>