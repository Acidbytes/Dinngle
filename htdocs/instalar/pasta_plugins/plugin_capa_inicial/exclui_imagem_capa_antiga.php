<?php


// exclui imagem antiga de capa -----------------

function exclui_imagem_capa_antiga(){


// globals -----------------------------------------------

global $tabela_banco; // tabela de banco de dados

// ---------------------------------------------------------


// query -------------------------------------------------

$query = "select *from $tabela_banco[27];"; // query

// ---------------------------------------------------------


// dados -------------------------------------------------

$dados = retorne_dados_query($query); // dados

// ----------------------------------------------------------


// url de imagem ---------------------------------------

$url_imagem = $dados['url_imagem']; // url de imagem

// ----------------------------------------------------------


// destino da imagem --------------------------------

$destino_imagem = retorne_pasta_capa_inicial().basename($url_imagem); // destino da imagem

// ----------------------------------------------------------


// excluindo imagem ----------------------------------

if($url_imagem != null){

exclui_arquivo_unico($destino_imagem); // excluindo imagem...

};

// ----------------------------------------------------------


};

// ----------------------------------------------------------


?>