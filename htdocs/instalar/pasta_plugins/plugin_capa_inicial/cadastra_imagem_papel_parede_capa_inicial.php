<?php


// cadastra a imagem no banco ------------------

function cadastra_imagem_papel_parede_capa_inicial($endereco_final_salvar_imagem){


// globals -----------------------------------------------

global $tabela_banco; // tabelas de banco de dados

global $pasta_capa_inicial_site; // pasta de capa inicial

// ---------------------------------------------------------


// nome da imagem ----------------------------------

$nome_imagem = basename($endereco_final_salvar_imagem); // nome da imagem

// ---------------------------------------------------------


// url de imagem --------------------------------------

$url_imagem = "../".$pasta_capa_inicial_site."/".$nome_imagem; // url de imagem

// ---------------------------------------------------------


// query -------------------------------------------------

$query[] = "delete from $tabela_banco[27];"; // query

$query[] = "insert into $tabela_banco[27] values('$url_imagem');"; // query

// ---------------------------------------------------------


// executa comando ----------------------------------

foreach($query as $valor_query){


// se for valido cadastra -----------------------------

if($valor_query != null){

comando_executa($valor_query); // executa comando

};

// ---------------------------------------------------------


};

// ---------------------------------------------------------


};

// --------------------------------------------------------


?>