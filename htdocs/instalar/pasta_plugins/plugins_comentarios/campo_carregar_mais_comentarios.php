<?php


// campo carregar mais comentarios -------------

function campo_carregar_mais_comentarios($dados){


// tipo de identificador --------------------------------

// 1: imagens

// 2: postagem

// ---------------------------------------------------------


// globals ----------------------------------------------

global $tabela_banco; // tabela de banco de dados

global $imagem_servidor; // imagens de servidor

global $identificador_album; // identificador do album

global $identificador_postagem; // identificador postagem

// --------------------------------------------------------


// tipo de pagina atual -------------------------------

$tipo_pagina = retorne_tipo_pagina(); // tipo de pagina atual

// ---------------------------------------------------------


// dados de formulario ------------------------------

$id = $_POST['id']; // id de item a ser curtido

$tipo_comentario = $_POST['tipo_comentario']; // tipo de comentario

// ---------------------------------------------------------


// obtem dados --------------------------------------

if($id != null){


// query ------------------------------------------------

switch($tipo_comentario){


case 1: // imagens
$query = "select *from $tabela_banco[6] where id='$id' and identificador='$identificador_album';"; // query
break;


case 2: // postagens
$query = "select *from $tabela_banco[9] where id='$id' and identificador='$identificador_postagem';"; // query
break;


};

// --------------------------------------------------------


// dados ------------------------------------------------

$dados = retorne_dados_query($query); // dados

// ---------------------------------------------------------


};

// ---------------------------------------------------------


// separando dados de postagem ----------------

$id = $dados['id']; // dados de tabela
$identificador = $dados['identificador']; // dados de tabela

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


// numero de comentarios -------------------------

$numero_comentarios = retorne_numero_comentarios($dados); // numero de comentarios

// --------------------------------------------------------


// imagem comentario ------------------------------

$imagem_comentario = $imagem_servidor['mais']; // imagem comentario
$imagem_comentario = "<img src='$imagem_comentario' title='Mais comentários'>"; // imagem comentario

// --------------------------------------------------------


// codigo html bruto ---------------------------------

$codigo_html_bruto .= "<a href='#comentario' onclick='exibir_comentarios_postagem($id, $tipo_comentario, $tipo_pagina);'>";
$codigo_html_bruto .= $imagem_comentario;
$codigo_html_bruto .= "</a>";
$codigo_html_bruto .= "&nbsp;";
$codigo_html_bruto .= "<a href='#comentario' onclick='exibir_comentarios_postagem($id, $tipo_comentario, $tipo_pagina);'>";

$codigo_html_bruto .= "Carregar mais comentários";

$codigo_html_bruto .= "</a>";

// --------------------------------------------------------


// retorno ----------------------------------------------

return $codigo_html_bruto; // retorno

// --------------------------------------------------------


};

// --------------------------------------------------------


?>