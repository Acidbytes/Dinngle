<?php


// upload de imagem unica ------------------------------------------

function upload_imagem_unica($pasta_upload, $escala, $host_retorno, $modo_escala){


// data atual --------------------------------------------------------------

$data_atual = data_atual(); // data atual

// ---------------------------------------------------------------------------


// dados de formulario ------------------------------------------------

$numero_imagens_enviando = count($_FILES['foto']['name']); // dados de formulario

// ---------------------------------------------------------------------------


// array com fotos ------------------------------------------------------

$fotos = $_FILES['foto']; // array com fotos

// ---------------------------------------------------------------------------


// extensoes de imagens disponiveis ------------------------------

$extensoes_disponiveis[] = ".jpeg"; // extensoes de imagens disponiveis
$extensoes_disponiveis[] = ".jpg"; // extensoes de imagens disponiveis
$extensoes_disponiveis[] = ".png"; // extensoes de imagens disponiveis
$extensoes_disponiveis[] = ".gif"; // extensoes de imagens disponiveis

// ---------------------------------------------------------------------------


// nome imagem --------------------------------------------------------

$nome_imagem = $fotos['tmp_name']; // nome imagem

$nome_imagem_real = $fotos['name']; // nome imagem

// ----------------------------------------------------------------------------


// extencao ----------------------------------------------------------------

$extensao_imagem = ".".strtolower(pathinfo($nome_imagem_real, PATHINFO_EXTENSION)); // extencao 

// ----------------------------------------------------------------------------


// nome final de imagem -----------------------------------------------

$nome_imagem_final = md5($nome_imagem_real.$data_atual).$extensao_imagem; // nome final de imagem

// ----------------------------------------------------------------------------


// endereco final de imagem ------------------------------------------

$endereco_final_salvar_imagem = $pasta_upload.$nome_imagem_final; // endereco final de imagem

// ----------------------------------------------------------------------------


// informa se a extensao de imagem e permitida ----------------

$extensao_permitida = retorne_elemento_array_existe($extensoes_disponiveis, $extensao_imagem); // informa se a extensao de imagem e permitida

// ----------------------------------------------------------------------------


// se nome for valido entao faz upload -----------------------------

if($nome_imagem != null and $nome_imagem_real != null and $extensao_permitida == true){


// imagem tamanho real ----------------------------------------------

if($modo_escala == true){

$image = new SimpleImage(); // nova classe
$image->load($nome_imagem); // carrega imagem
$image->scale($escala); // escala ou tamanho de imagem
$image->save($endereco_final_salvar_imagem); // destino final de imagem

}else{

$image = new SimpleImage(); // nova classe
$image->load($nome_imagem); // carrega imagem
$image->resizeToWidth($escala); // escala ou tamanho de imagem
$image->save($endereco_final_salvar_imagem); // destino final de imagem

};

// ---------------------------------------------------------------------------


// retorno -----------------------------------------------------------------

return $host_retorno.$nome_imagem_final; // host de retorno

// ---------------------------------------------------------------------------


};

// ---------------------------------------------------------------------------


// retorno nulo -----------------------------------------------------------

return null; // retorno nulo

// ---------------------------------------------------------------------------


};

// ---------------------------------------------------------------------------


?>