<?php

// constroe o topico de ajuda ---------------------

function constroe_topico_ajuda(){


// globals ----------------------------------------------

global $tabela_banco; // tabela de banco de dados

// --------------------------------------------------------


// super usuario -------------------------------------

$super_usuario = retorne_super_usuario(); // super usuario

// --------------------------------------------------------


// topico de ajuda ------------------------------------

$topico_ajuda = topico_pagina_ajuda_get(); // topico de ajuda

// ---------------------------------------------------------


// valida topico de ajuda ----------------------------

if($topico_ajuda == null){

return null; // retorno nulo

};

// ---------------------------------------------------------


// condicao query tipo de ajuda -------------------

if($super_usuario == false){

$condicao_query = "and tipo_ajuda='1';"; // condicao query

};

// ---------------------------------------------------------


// query --------------------------------------------------

$query = "select *from $tabela_banco[25] where id='$topico_ajuda' $condicao_query;"; // query

// ---------------------------------------------------------


// dados ------------------------------------------------

$dados = retorne_dados_query($query); // dados de query

// ---------------------------------------------------------


// separa dados --------------------------------------

$id = $dados['id']; // separando dados
$titulo_post = $dados['titulo_post']; // separando dados
$conteudo_post = $dados['conteudo_post']; // separando dados
$idalbum_imagens = $dados['idalbum_imagens']; // separando dados

// --------------------------------------------------------


// converte urls em links ---------------------------

$conteudo_post = converte_urls_texto_links($conteudo_post); // converte urls em links

// --------------------------------------------------------


// adiciona imagens ---------------------------------

$conteudo_post .= constroe_imagens_ajuda($idalbum_imagens, $id); // adiciona imagens

// ---------------------------------------------------------


// codigo html bruto ----------------------------------

$codigo_html_bruto .= "<div class='classe_titulo_post_ajuda'>"; // codigo html bruto
$codigo_html_bruto .= $titulo_post; // codigo html bruto
$codigo_html_bruto .= "</div>"; // codigo html bruto
$codigo_html_bruto .= "<div class='classe_corpo_post_ajuda'>"; // codigo html bruto
$codigo_html_bruto .= campo_excluir_conteudo_ajuda($dados); // codigo html bruto
$codigo_html_bruto .= $conteudo_post; // codigo html bruto
$codigo_html_bruto .= "</div>"; // codigo html bruto

// ---------------------------------------------------------


// adiciona div especial -----------------------------

$codigo_html_bruto = constroe_div_especial_geral("Tópico $id", $codigo_html_bruto, null); // adiciona div especial

// --------------------------------------------------------


// retorno -----------------------------------------------

return $codigo_html_bruto; // retorno

// ---------------------------------------------------------


};

// --------------------------------------------------------


?>