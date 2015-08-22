<?php


// publica imagens em album de postagens --

function publica_imagens_album_postagem_ajuda($idalbum_imagens){


// globals ----------------------------------------------

global $tabela_banco; // tabela de banco de dados

// --------------------------------------------------------


// id de usuario logado -----------------------------

$idusuario = retorne_idusuario_logado(); // id de usuario logado

// --------------------------------------------------------


// data atual -------------------------------------------

$data_atual = data_atual(); // data atual

// --------------------------------------------------------


// endereco de pasta de upload de imagens ---------------------

$pasta_upload = retorne_pasta_upload_albuns_imagens_ajuda(); // endereco de pasta de upload de imagens

// ---------------------------------------------------------------------------


// faz upload de imagem para album ----------------------------

upload_de_imagem_album_ajuda($pasta_upload); // faz upload de imagem para album

// ---------------------------------------------------------------------------


};

// --------------------------------------------------------


?>