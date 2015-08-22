<?php


// retorne o id de usuario visualizando perfil ----

function retorne_idusuario_visualizando_perfil(){


// dados de id de usuario ---------------------------

$idusuario_get = retorne_idusuario_get(); // id de usuario modo get

$idusuario_post = retorne_idusuario_post(); // id de usuario modo post

$idusuario_logado = retorne_idusuario_logado(); // id de usuario logado

// ---------------------------------------------------------


// valida modo get ------------------------------------

if($idusuario_get == null){

$idusuario_get = $idusuario_post; // iguala com modo post

};

// ---------------------------------------------------------


// verifica tipo de retorno de id de usuario ------

if($idusuario_get == null){


// define idusuarios GET/POST ------------------

$_GET['idusuario'] = $idusuario_logado; // GET

$_POST['idusuario'] = $idusuario_logado; // POST

// ---------------------------------------------------------


// retorno de usuario ---------------------------------

return $idusuario_logado; // retorno de usuario

// ---------------------------------------------------------


}else{


// define idusuarios GET/POST ------------------

$_GET['idusuario'] = $idusuario_get; // GET

$_POST['idusuario'] = $idusuario_get; // POST

// ---------------------------------------------------------


// retorno de usuario ---------------------------------

return $idusuario_get; // retorno de usuario

// ---------------------------------------------------------


};

// ---------------------------------------------------------


};

// ---------------------------------------------------------


?>