<?php


// cadastra a imagem no banco ------------------

function cadastra_imagem_papel_parede($endereco_final_salvar_imagem, $endereco_final_salvar_imagem_miniatura){


// globals -----------------------------------------------

global $tabela_banco; // tabelas de banco de dados

// ---------------------------------------------------------


// id de usuario logado ------------------------------

$idusuario_logado = retorne_idusuario_logado(); // id de usuario logado

// ---------------------------------------------------------


// nome da imagem ----------------------------------

$nome_imagem = basename($endereco_final_salvar_imagem); // nome da imagem

// ---------------------------------------------------------


// nome da imagem miniatura ---------------------

$nome_imagem_miniatura = basename($endereco_final_salvar_imagem_miniatura); // nome da imagem miniatura

// ---------------------------------------------------------


// url de imagem --------------------------------------

$url_imagem = retorne_pasta_imagem_imagem_fundo_url().$nome_imagem; // url de imagem

// ---------------------------------------------------------


// url de imagem miniatura -------------------------

$url_imagem_miniatura = retorne_pasta_imagem_imagem_fundo_url().$nome_imagem_miniatura; // url de imagem

// ---------------------------------------------------------


// data atual --------------------------------------------

$data_atual = data_atual(); // data atual

// ---------------------------------------------------------


// query -------------------------------------------------

$query[] = "delete from $tabela_banco[15] where idusuario='$idusuario_logado';"; // query
$query[] = "insert into $tabela_banco[15] values('$idusuario_logado','$url_imagem','$url_imagem_miniatura');"; // query

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