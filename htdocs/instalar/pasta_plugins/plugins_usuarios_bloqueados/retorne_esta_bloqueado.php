<?php


// retorna se esta bloqueado -------------------

function retorne_esta_bloqueado($idusuario){


// globals -----------------------------------------

global $tabela_banco; // tabela de banco

// ----------------------------------------------------


// id do usuario ---------------------------------

if($idusuario == null){

$idusuario = retorne_idusuario_visualizando_perfil(); // id do usuario

};

// ----------------------------------------------------


// se for dono do perfil nao fazer nada -------

if(retorna_usuario_vendo_perfil_dono() == true and $idusuario == null){

return false; // nao esta bloqueado

};

// -----------------------------------------------------


// id de usuario logado -------------------------

$idusuario_logado = retorne_idusuario_logado(); // id de usuario logado

// ----------------------------------------------------


// numero de linhas ----------------------------

$numero_linhas = 0; // numero de linhas

// ---------------------------------------------------


// query --------------------------------------------

$query[] = "select *from $tabela_banco[21] where idusuario='$idusuario_logado' and idusuario_bloqueado='$idusuario';"; // query
$query[] = "select *from $tabela_banco[21] where idusuario='$idusuario' and idusuario_bloqueado='$idusuario_logado';"; // query

// ------------------------------------------------------


// analiza querys -----------------------------------

foreach($query as $valor_query){


// verifica se query e valida ----------------------

if($valor_query != null){

$numero_linhas += retorne_numero_linhas_query($valor_query); // atualiza numero de linhas

};

// ------------------------------------------------------


};

// ------------------------------------------------------


// retorno --------------------------------------------

if($numero_linhas > 0){

return true; // bloqueado

}else{

return false; // nao bloqueado

};

// ------------------------------------------------------


};

// -----------------------------------------------------


?>