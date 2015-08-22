<?php


// retorna se a mensagem ja foi respondida --

function retorne_mensagem_respondida_usuario($idusuario){


// globals ----------------------------------------------

global $tabela_banco; // tabela de banco de dados

// --------------------------------------------------------


// query -------------------------------------------------

$query = "select *from $tabela_banco[22] where idamigo='$idusuario' and visualizada='0';"; // query

// ---------------------------------------------------------


// numero de linhas ----------------------------------

$numero_linhas = retorne_numero_linhas_query($query); // numero de linhas

// ---------------------------------------------------------


// retorno -----------------------------------------------

if($numero_linhas > 0){

return true; // mensagem nao lida

}else{

return false; // mensagem lida

};

// ---------------------------------------------------------


};

// --------------------------------------------------------


?>