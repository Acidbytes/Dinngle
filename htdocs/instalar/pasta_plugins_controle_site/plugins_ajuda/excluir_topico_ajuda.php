<?php


// exclui topico de ajuda -----------------------------

function excluir_topico_ajuda(){


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

$idalbum_imagens = remove_html($_POST['idalbum_imagens']); // id de album de imagens

// ----------------------------------------------------------


// query --------------------------------------------------

$query = "select *from $tabela_banco[26] where idalbum_imagens='$idalbum_imagens';"; // query

// ----------------------------------------------------------


// contador ----------------------------------------------

$contador = 0; // contador

// ----------------------------------------------------------


// numero de linhas -----------------------------------

$numero_linhas = retorne_numero_linhas_query($query); // numero de linhas

// ----------------------------------------------------------


// comando ---------------------------------------------

$comando = comando_executa($query); // comando

// -----------------------------------------------------------


// apagando imagens ----------------------------------

for($contador == $contador; $contador <= $numero_linhas; $contador++){


// dados ---------------------------------------------------

$dados = mysql_fetch_array($comando, MYSQL_ASSOC); // dados

// -----------------------------------------------------------


// separando dados ------------------------------------

$url_imagem = $dados['url_imagem']; // url de imagem

// -----------------------------------------------------------


// valida url de imagem -------------------------------

if($url_imagem != null){


// completa endereco de imagem ------------------

$url_imagem = "../$url_imagem"; // completa endereco de imagem

// -----------------------------------------------------------


// exclui arquivo -----------------------------------------

exclui_arquivo_unico($url_imagem); // exclui arquivo

// -----------------------------------------------------------


};

// -----------------------------------------------------------


};

// -----------------------------------------------------------


// limpa query antiga -----------------------------------

$query = null; // limpa query antiga

// -----------------------------------------------------------


// querys --------------------------------------------------

$query[] = "delete from $tabela_banco[25] where id='$topico_id' and idalbum_imagens='$idalbum_imagens';"; // query
$query[] = "delete from $tabela_banco[26] where idalbum_imagens='$idalbum_imagens';"; // query

// -----------------------------------------------------------


// exclui registros ---------------------------------------

executador_querys($query); // exclui registros

// -----------------------------------------------------------


};

// ----------------------------------------------------------


?>