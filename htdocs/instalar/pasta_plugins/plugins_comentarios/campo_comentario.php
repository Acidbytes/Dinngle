<?php


// campo comentario -------------------------------

function campo_comentario($dados){


// globals -----------------------------------------------

global $identificador_album; // identificador do album

global $identificador_postagem; // identificador postagem

// ---------------------------------------------------------


// separando dados ----------------------------------

$id = $dados['id']; // dados de tabela
$idusuario = $dados['idusuario']; // dados de tabela
$conteudo_post = $dados['conteudo_post']; // dados de tabela
$idalbum_imagens = $dados['idalbum_imagens']; // dados de tabela
$data_publicacao = $dados['data_publicacao']; // dados de tabela
$privacidade = $dados['privacidade']; // dados de tabela
$identificador = $dados['identificador']; // dados de tabela

// ---------------------------------------------------------


// id de usuario logado -----------------------------

$idusuario_logado = retorne_idusuario_logado(); // id de usuario logado

// --------------------------------------------------------


// nome id de campo input -------------------------

$nome_id_campo_input = gera_idcampo_input_comentario($dados); // nome id

// ---------------------------------------------------------


// tipo de comentario --------------------------------

switch($identificador){


case $identificador_album: // album
$tipo_comentario = 1; // tipo de comentario
break;


case $identificador_postagem: // postagem
$tipo_comentario = 2; // tipo de comentario
break;


};

// ---------------------------------------------------------


// codigo html bruto ----------------------------------

$codigo_html_bruto .= "<div class='div_imagem_perfil_campo_comentario'>";
$codigo_html_bruto .= constroe_imagem_perfil_publicacao($idusuario_logado);
$codigo_html_bruto .= "</div>";
$codigo_html_bruto .= "<input type='text' id='$nome_id_campo_input' class='campo_input_comentario_publicacao' placeholder='Comentar' onkeydown='if(event.keyCode == 13){publicar_comentario_publicacao($id, $tipo_comentario, $idusuario);}'>";

// ---------------------------------------------------------


// retorno ------------------------------------------------

return $codigo_html_bruto; // retorno

// ----------------------------------------------------------


};

// --------------------------------------------------------


?>