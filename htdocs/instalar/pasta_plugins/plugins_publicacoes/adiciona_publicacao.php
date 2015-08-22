<?php


// adiciona publicacao ------------------------------

function adiciona_publicacao(){


// globals ----------------------------------------------

global $tabela_banco; // tabela de banco de dados

global $identificador_postagem; // identificador de postagem

// --------------------------------------------------------


// dados de formulario -----------------------------

$conteudo_post = remove_html($_POST['campo_publicar']); // conteudo de post

$privacidade = remove_html($_POST['tipo_privacidade']); // tipo de privacidade

$idalbum_imagens = remove_html($_POST['idalbum_imagens']); // id unico de album de imagens

// --------------------------------------------------------


// numero de imagens a publicar --------------

$numero_imagens = retorne_numero_imagens_publicar(); // numero de imagens a publicar

// ---------------------------------------------------------


// valida publicacao ---------------------------------

if($conteudo_post == null and $numero_imagens == 0){

return null; // retorno nulo

};

// ---------------------------------------------------------


// converte linha em quebra de linha ----------

$conteudo_post = converte_linha_quebra_linha($conteudo_post, true); // converte linha em quebra de linha

// --------------------------------------------


// verifica se privacidade e valida ---------------

if($privacidade == null){

$privacidade = 1; // publico

};

// --------------------------------------------------------


// id de usuario logado -----------------------------

$idusuario = retorne_idusuario_logado(); // id de usuario logado

// --------------------------------------------------------


// data atual -------------------------------------------

$data_atual = data_atual(); // data atual

// --------------------------------------------------------


// id de album de publicacao ------------------

if($idalbum_imagens == null){


// gera id de album de imagens
$idalbum_imagens = gera_idalbum_postagem_usuario();


// informa o array global com id de album de imagens
$_POST['idalbum_imagens'] = $idalbum_imagens;


};

// --------------------------------------------------------


// query ------------------------------------------------

$query = "insert into $tabela_banco[9] values(null, '$idusuario', '$conteudo_post', '$idalbum_imagens', '$data_atual', '$privacidade', '$identificador_postagem');"; // query

// --------------------------------------------------------


// executa comando --------------------------------

comando_executa($query); // executa comando

// -------------------------------------------------------


// salva imagens em album ----------------------

if($numero_imagens > 0){

publica_imagens_album_postagem($idalbum_imagens); // salva imagens em album

};

// -------------------------------------------------------


};

// --------------------------------------------------------


?>