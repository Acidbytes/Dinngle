<?php


// publicar ajuda -------------------------------------

function publicar_ajuda(){


// globals -----------------------------------------------

global $tabela_banco; // tabela de banco de dados

// ---------------------------------------------------------


// dados de formulario ------------------------------

$topico_id = topico_pagina_ajuda_get(); // dados de formulario

$titulo = remove_html($_POST['titulo']); // dados de formulario

$campo_publicar = remove_html($_POST['campo_publicar']); // dados de formulario

$tipo_ajuda = remove_html($_POST['tipo_ajuda']); // tipo de ajuda

// ---------------------------------------------------------


// dados de formulario atualizar -------------------

$idalbum_imagens = remove_html($_POST['idalbum_imagens']); // id de album

$publicar_tipo = remove_html($_POST['publicar_tipo']); // tipo de publicacao

// ---------------------------------------------------------


// numero de imagens -------------------------------

$numero_imagens = retorne_numero_array_post_imagens(); // numero de imagens

// ---------------------------------------------------------


// verifica se esta publicando sem imagens ----

if($numero_imagens == 0 and $publicar_tipo == true){

return null; // retorno nulo

};

// ---------------------------------------------------------


// valida dados de formulario ----------------------

if($titulo == null or $campo_publicar == null){


// verifica se esta publicando ou atualizando --

if($publicar_tipo == true){

return null; // retorno nulo

};

// ---------------------------------------------------------


};

// ---------------------------------------------------------


// verifica se e o super usuario --------------------

if(retorne_super_usuario() == false){

return null; // retorno nulo

};

// ---------------------------------------------------------


// id de album de publicacao ----------------------

if($idalbum_imagens == null){


// obtem o id de album de imagens --------------

$idalbum_imagens = gera_idalbum_postagem_usuario(); // id de album de publicacao

// ---------------------------------------------------------


// seta array global -----------------------------------

$_POST['idalbum_imagens'] = $idalbum_imagens; // array global com id de album de imagens

// ---------------------------------------------------------


};

// --------------------------------------------------------


// salva imagens em album -----------------------

publica_imagens_album_postagem_ajuda($idalbum_imagens); // salva imagens em album

// --------------------------------------------------------


// query -------------------------------------------------

if($publicar_tipo == true){

$query = "insert into $tabela_banco[25] values('null', '$tipo_ajuda', '$titulo', '$campo_publicar', '$idalbum_imagens');"; // query

}else{

$query = "update $tabela_banco[25] set titulo_post='$titulo', tipo_ajuda='$tipo_ajuda', conteudo_post='$campo_publicar' where id='$topico_id';"; // query

};

// ---------------------------------------------------------


// comando ---------------------------------------------

comando_executa($query); // comando

// ----------------------------------------------------------


};

// --------------------------------------------------------


?>