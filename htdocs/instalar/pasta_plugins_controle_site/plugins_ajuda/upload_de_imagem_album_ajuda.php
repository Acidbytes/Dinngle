<?php


// faz upload da imagem para album -------------------------------

function upload_de_imagem_album_ajuda($destino_da_imagem){


// global ------------------------------------------------------------------

global $tamanho_escala_imagem_album; // tamanho em escala de imagem de album

// ---------------------------------------------------------------------------


// data atual --------------------------------------------------------------

$data_atual = data_atual(); // data atual

// ---------------------------------------------------------------------------


// dados de formulario ------------------------------------------------

$numero_imagens_enviando = count($_FILES['foto']['name']); // dados de formulario

$idalbum_imagens = $_POST['idalbum_imagens']; // id unico de album de imagens

// ---------------------------------------------------------------------------


// array com fotos ------------------------------------------------------

$fotos = $_FILES['foto']; // array com fotos

// ---------------------------------------------------------------------------


// contador ---------------------------------------------------------------

$contador = 0; // contador

// ---------------------------------------------------------------------------


// extensoes de imagens disponiveis ------------------------------

$extensoes_disponiveis[] = ".jpeg"; // extensoes de imagens disponiveis
$extensoes_disponiveis[] = ".jpg"; // extensoes de imagens disponiveis
$extensoes_disponiveis[] = ".png"; // extensoes de imagens disponiveis
$extensoes_disponiveis[] = ".gif"; // extensoes de imagens disponiveis

// ---------------------------------------------------------------------------


// upload de imagens --------------------------------------------------

for($contador == $contador; $contador <= $numero_imagens_enviando; $contador++){


// nome imagem --------------------------------------------------------

$nome_imagem = $fotos['tmp_name'][$contador]; // nome imagem

$nome_imagem_real = $fotos['name'][$contador]; // nome imagem

// ----------------------------------------------------------------------------


// extencao ----------------------------------------------------------------

$extensao_imagem = ".".strtolower(pathinfo($nome_imagem_real, PATHINFO_EXTENSION)); // extencao 

// ----------------------------------------------------------------------------


// nome final de imagem -----------------------------------------------

$nome_imagem_final = md5($nome_imagem_real.$data_atual).$extensao_imagem; // nome final de imagem

// ----------------------------------------------------------------------------


// endereco final de imagem ------------------------------------------

$endereco_final_salvar_imagem = $destino_da_imagem.$nome_imagem_final; // endereco final de imagem

// ----------------------------------------------------------------------------


// informa se a extensao de imagem e permitida ----------------

$extensao_permitida = retorne_elemento_array_existe($extensoes_disponiveis, $extensao_imagem); // informa se a extensao de imagem e permitida

// ----------------------------------------------------------------------------


// se nome for valido entao faz upload -----------------------------

if($nome_imagem != null and $nome_imagem_real != null and $extensao_permitida == true){


// adiciona imagem no banco de dados ---------------------------

cadastra_imagem_album_ajuda($endereco_final_salvar_imagem, $idalbum_imagens); // adiciona imagem no banco de dados

// ---------------------------------------------------------------------------


// imagem tamanho real ----------------------------------------------

$image = new SimpleImage(); // nova classe
$image->load($nome_imagem); // carrega imagem
$image->scale($tamanho_escala_imagem_album); // escala ou tamanho de imagem
$image->save($endereco_final_salvar_imagem); // destino final de imagem

// ---------------------------------------------------------------------------


};

// ---------------------------------------------------------------------------


};

// ---------------------------------------------------------------------------


};

// ---------------------------------------------------------------------------


?>
