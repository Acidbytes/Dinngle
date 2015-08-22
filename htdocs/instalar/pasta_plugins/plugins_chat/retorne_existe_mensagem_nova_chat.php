<?php


// retorne se existe mensagem nova no chat --

function retorne_existe_mensagem_nova_chat($idusuario){


// globals -----------------------------------------------

global $tabela_banco; // tabela de banco de dados

// ---------------------------------------------------------


// id de usuario logado ------------------------------

$idusuario_logado = retorne_idusuario_logado(); // id de usuario logado

// ---------------------------------------------------------


// query -------------------------------------------------

$query = "select *from $tabela_banco[22] where idusuario='$idusuario' and idamigo='$idusuario_logado' and visualizada='0';"; // query

// ---------------------------------------------------------


// numero de linhas ----------------------------------

$numero_linhas = retorne_numero_linhas_query($query); // numero de linhas

// ---------------------------------------------------------


// retorno -----------------------------------------------

if($numero_linhas > 0){

return true; // retorno verdadeiro

}else{

return false; // retorno falso

};

// ---------------------------------------------------------


};

// --------------------------------------------------------


?>