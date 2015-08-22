<?php


// cadastra a imagem no album ------------------

function cadastra_imagem_album($url_imagem, $url_imagem_miniatura, $tipo_privacidade, $idalbum_imagens){


// globals -----------------------------------------------

global $tabela_banco; // tabelas de banco de dados

global $identificador_album; // identificador de album

// ---------------------------------------------------------


// dados de formulario ------------------------------

$tipo_privacidade = remove_html($_POST['tipo_privacidade']); // tipo de privacidade

$descricao_imagem = remove_html($_POST['descricao_imagem']); // descricao de imagem

$nome_album_imagem = remove_html($_POST['nome_album_imagem']); // nome do album da imagem

$nome_album_identificador = remove_html($_POST['nome_album_identificador']); // nome de album identificador

// ---------------------------------------------------------


// gera nome identificador de album ---------

if($nome_album_identificador == null){

$nome_album_identificador = gera_nome_identificador_album($nome_album_imagem, $idalbum_imagens);

};

// ---------------------------------------------------------


// id de usuario logado ------------------------------

$idusuario_logado = retorne_idusuario_logado(); // id de usuario logado

// ---------------------------------------------------------


// nome da imagem ----------------------------------

$nome_imagem = basename($url_imagem); // nome da imagem

// ---------------------------------------------------------


// nome da imagem miniatura ---------------------

$nome_imagem_miniatura = basename($url_imagem_miniatura); // nome da imagem miniatura

// ---------------------------------------------------------


// url de imagem --------------------------------------

$url_imagem = retorne_pasta_imagem_album().$nome_imagem; // url de imagem

// ---------------------------------------------------------


// url de imagem miniatura -------------------------

$url_imagem_miniatura = retorne_pasta_imagem_album().$nome_imagem_miniatura; // url de imagem

// ---------------------------------------------------------


// data atual --------------------------------------------

$data_atual = data_atual(); // data atual

// ---------------------------------------------------------


// query -------------------------------------------------

$query = "insert into $tabela_banco[6] values(null, '$idusuario_logado','$url_imagem','$url_imagem_miniatura','$tipo_privacidade','$descricao_imagem','$data_atual', '$idalbum_imagens', '$identificador_album', '$nome_album_imagem', '$nome_album_identificador');"; // query

// ---------------------------------------------------------


// executa comando ----------------------------------

$comando = comando_executa($query); // executa comando

// ---------------------------------------------------------


// retorno ---------------------------------------------

return $nome_album_identificador; // retorno

// --------------------------------------------------------


};

// --------------------------------------------------------


?>