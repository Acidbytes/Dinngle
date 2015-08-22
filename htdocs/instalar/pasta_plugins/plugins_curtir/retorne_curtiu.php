<?php

// retorne curtiu ou nao ----------------------------

function retorne_curtiu($id, $identificador){


// globals ------------------------------------------------

global $tabela_banco; // tabela de banco de dados

// ----------------------------------------------------------


// id de usuario logado ------------------------------

$idusuario_logado = retorne_idusuario_logado(); // id de usuario logado

// --------------------------------------------------------


// query -------------------------------------------------

$query = "select *from $tabela_banco[10] where id='$id' and identificador='$identificador' and idusuario_curtiu='$idusuario_logado';"; // query

// ---------------------------------------------------------


// retorno -----------------------------------------------

if(retorne_numero_linhas_query($query) > 0){

return true; // ja curtiu

}else{

return false; // ainda nao curtiu

};

// ---------------------------------------------------------


};

// --------------------------------------------------------


?>