<?php


// atualizar conteudo de ajuda --------------------

function atualizar_conteudo_ajuda(){


// globals -----------------------------------------------

global $tabela_banco; // tabela de banco de dados

// ---------------------------------------------------------


// valida super usuario ------------------------------

if(retorne_super_usuario() == false){

return null; // retorno nulo

};

// ---------------------------------------------------------


// dados de formulario -------------------------------

$topico_id = topico_pagina_ajuda_get(); // id de topico
$descricao_imagem = remove_html($_POST['descricao_imagem']); // descricao de imagem
$imagem_id = remove_html($_POST['imagem_id']); // id de imagem
$url_imagem = remove_html($_POST['url_imagem']); // url de imagem
$excluir_imagem = remove_html($_POST['excluir_imagem']); // resposta excluir imagem

// ----------------------------------------------------------


// query --------------------------------------------------

if($excluir_imagem == true){

$query = "delete from $tabela_banco[26] where id='$imagem_id';"; // query

}else{

$query = "update $tabela_banco[26] set descricao_imagem='$descricao_imagem' where id='$imagem_id';"; // query

};

// ----------------------------------------------------------


// executa comando ----------------------------------

comando_executa($query); // executa comando

// ----------------------------------------------------------


// exclui imagem --------------------------------------

if($excluir_imagem == true){


// completa url de imagem --------------------------

$url_imagem = "../".$url_imagem; // completa url de imagem

// ---------------------------------------------------------


// exclui imagem --------------------------------------

exclui_arquivo_unico($url_imagem); // exclui imagem

// ---------------------------------------------------------


// retorno nulo -----------------------------------------

return null; // retorno nulo

// ---------------------------------------------------------

};

// ---------------------------------------------------------


// verifica tamanho de imagem ---------------------

$tamanho_arquivo_imagem = $_FILES['foto']['size']; // tamanho do arquivo

// -----------------------------------------------------------


// valida tamanho de imagem -----------------------

if($tamanho_arquivo_imagem == 0){

return null; // retorno nulo

};

// -----------------------------------------------------------


// endereco da imagem a ser removida -----------

$endereco_imagem_remover = "../".$url_imagem; // endereco da imagem a ser removida

// -----------------------------------------------------------


// exclui imagem antiga -------------------------------

exclui_arquivo_unico($endereco_imagem_remover); // exclui imagem antiga

// -----------------------------------------------------------


// pasta de upload --------------------------------------

$pasta_upload = retorne_pasta_upload_albuns_imagens_ajuda(); // pasta de upload

// ------------------------------------------------------------


// upload de imagem -----------------------------------

$url_imagem = upload_imagem_unica($pasta_upload, 100, retorne_pasta_imagem_album_ajuda(), true); // upload de imagem

// ------------------------------------------------------------


// query ----------------------------------------------------

$query = "update $tabela_banco[26] set url_imagem='$url_imagem' where id='$imagem_id';"; // query

// ------------------------------------------------------------


// executa comando ----------------------------------

comando_executa($query); // executa comando

// ----------------------------------------------------------


};

// ----------------------------------------------------------


?>