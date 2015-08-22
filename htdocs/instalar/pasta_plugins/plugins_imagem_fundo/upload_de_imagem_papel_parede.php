<?php


// faz upload da imagem para fundo -------------------------------

function upload_de_imagem_papel_parede($destino_da_imagem){


// global ------------------------------------------------------------------

global $tamanho_escala_imagem_papel_parede; // tamanho em escala de imagem de album

global $tamanho_escala_imagem_papel_parede_miniatura; // tamanho de imagem de album em miniatura

global $tabela_banco; // tabela de banco de dados

// ---------------------------------------------------------------------------


// id de usuario logado ------------------------------

$idusuario_logado = retorne_idusuario_logado(); // id de usuario logado

// ---------------------------------------------------------


// valida numero de imagens -------------------------------

if(retorne_numero_array_post_imagens() == 0){


// query --------------------------------------------------

$query = "delete from $tabela_banco[15] where idusuario='$idusuario_logado';"; // query

// --------------------------------------------------------


// executa comando query ----------------------------------

comando_executa($query);

// --------------------------------------------------------


// retorno nulo -------------------------------------------

return null; // retorno nulo

// --------------------------------------------------------


};

// ---------------------------------------------------------


// data atual --------------------------------------------------------------

$data_atual = data_atual(); // data atual

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

$nome_imagem = $fotos['tmp_name'][0]; // nome imagem

$nome_imagem_real = $fotos['name'][0]; // nome imagem

// ----------------------------------------------------------------------------


// extencao ----------------------------------------------------------------

$extensao_imagem = ".".strtolower(pathinfo($nome_imagem_real, PATHINFO_EXTENSION)); // extencao 

// ----------------------------------------------------------------------------


// nome final de imagem -----------------------------------------------

$nome_imagem_final = md5($nome_imagem_real.$data_atual).$extensao_imagem; // nome final de imagem

$nome_imagem_final_miniatura = md5($nome_imagem_real."miniatura".$data_atual).$extensao_imagem; // nome final de imagem

// ----------------------------------------------------------------------------


// endereco final de imagem ------------------------------------------

$endereco_final_salvar_imagem = $destino_da_imagem.$nome_imagem_final; // endereco final de imagem

// ----------------------------------------------------------------------------


// endereco final de imagem miniatura ----------------------------

$endereco_final_salvar_imagem_miniatura = $destino_da_imagem.$nome_imagem_final_miniatura; // endereco final de imagem miniatura

// ----------------------------------------------------------------------------


// informa se a extensao de imagem e permitida ----------------

$extensao_permitida = retorne_elemento_array_existe($extensoes_disponiveis, $extensao_imagem); // informa se a extensao de imagem e permitida

// ----------------------------------------------------------------------------


// se nome for valido entao faz upload -----------------------------

if($nome_imagem != null and $nome_imagem_real != null and $extensao_permitida == true){


// adiciona imagem no banco de dados ---------------------------

cadastra_imagem_papel_parede($endereco_final_salvar_imagem, $endereco_final_salvar_imagem_miniatura); // adiciona imagem no banco de dados

// ---------------------------------------------------------------------------


// imagem tamanho real ----------------------------------------------

$image = new SimpleImage(); // nova classe
$image->load($nome_imagem); // carrega imagem
$image->scale($tamanho_escala_imagem_papel_parede); // escala ou tamanho de imagem
$image->save($endereco_final_salvar_imagem); // destino final de imagem

// ---------------------------------------------------------------------------


// imagem tamanho miniatura ---------------------------------------

$image = new SimpleImage(); // nova classe
$image->load($nome_imagem); // carrega imagem
$image->scale($tamanho_escala_imagem_papel_parede_miniatura); // escala ou tamanho de imagem
$image->save($endereco_final_salvar_imagem_miniatura); // destino final de imagem

// ---------------------------------------------------------------------------


};

// ---------------------------------------------------------------------------


};

// --------------------------------------------------------


?>
