<?php


// retorna o numero de notificacoes -------------

function retorne_numero_notificacoes($tipo_notificacao){


// global -----------------------------------------------

global $tabela_banco; // tabela de banco de dados

// --------------------------------------------------------


// id de usuario logado ---------------------------

$idusuario = retorne_idusuario_logado(); // id de usuario logado

// --------------------------------------------------------


// query tipo de notificacao ------------------------

if($tipo_notificacao == null){

$query = "select *from $tabela_banco[24] where idamigo='$idusuario' and visualizada='0';"; // query

}else{

$query = "select *from $tabela_banco[24] where idamigo='$idusuario' and tipo_notificacao='$tipo_notificacao' and visualizada!='';"; // query

};

// --------------------------------------------------------


// retorno ----------------------------------------------

return retorne_numero_linhas_query($query); // retorno

// --------------------------------------------------------


};

// --------------------------------------------------------


?>