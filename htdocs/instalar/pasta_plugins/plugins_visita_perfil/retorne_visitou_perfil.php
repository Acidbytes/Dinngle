<?php


// retorna se ja visitou o perfil ---------------------

function retorne_visitou_perfil(){


// globals ----------------------------------------------

global $tabela_banco; // tabela de banco de dados

// --------------------------------------------------------


// id usuario -------------------------------------------

$idusuario = retorne_idusuario_visualizando_perfil(); // id usuario

// ---------------------------------------------------------


// id de usuario logado ------------------------------

$idusuario_logado = retorne_idusuario_logado(); // id de usuario logado

// ---------------------------------------------------------


// usuario dono do perfil -----------------------------

$usuario_dono_perfil = retorna_usuario_vendo_perfil_dono(); // usuario dono do perfil

// ---------------------------------------------------------


// informa que ja visitou -----------------------------

if($usuario_dono_perfil == true){

return true; // retorno

};

// ---------------------------------------------------------


// query -------------------------------------------------

$query = "select *from $tabela_banco[13] where idusuario='$idusuario' and idamigo='$idusuario_logado';"; // query

// ---------------------------------------------------------


// numero de linhas ----------------------------------

$numero_linhas = retorne_numero_linhas_query($query); // numero de linhas

// ---------------------------------------------------------


// retorna se visitou ou nao ------------------------

if($numero_linhas > 0){

return true; // visitou

}else{

return false; // nao visitou

};

// ---------------------------------------------------------


};

// --------------------------------------------------------


?>