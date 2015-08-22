<?php


// constroe topicos de ajuda -----------------------

function constroe_topicos_ajuda($tipo_topicos){


// globals -----------------------------------------------

global $tabela_banco; // tabela de banco de dados

// ---------------------------------------------------------


// limit de query ---------------------------------------

$limit_query = retorne_limit_tabela_ajuda(); // limit de query

// ---------------------------------------------------------


// termo de pesquisa ---------------------------------

$pesquisa_generica = retorne_termo_pesquisa(); // termo de pesquisa

// ---------------------------------------------------------


// super usuario -------------------------------------

$super_usuario = retorne_super_usuario(); // super usuario

// --------------------------------------------------------


// condicao query tipo de ajuda ------------------

if($super_usuario == false){

$condicao_query[1] = "where tipo_ajuda='1'"; // condicao query
$condicao_query[2] = "and tipo_ajuda='1'"; // condicao query

}else{

$condicao_query[1] = null; // condicao query
$condicao_query[2] = null; // condicao query

};

// --------------------------------------------------------


// tipo de topicos a carregar ----------------------

switch($tipo_topicos){


case 2:
$modo_carrega_topicos = " where tipo_ajuda='2' "; // modo que carrega os topicos
break;






};

// --------------------------------------------------------


// modo de carregar topicos -----------------------

$condicao_query[1] .= $modo_carrega_topicos; // adiciona modo
$condicao_query[2] .= $modo_carrega_topicos; // adiciona modo

// --------------------------------------------------------


// query ------------------------------------------------

if($pesquisa_generica == null){

$query[0] = "select *from $tabela_banco[25] $condicao_query[1] $limit_query;"; // query
$query[1] = "select *from $tabela_banco[25] $condicao_query[1];"; // query

}else{

$query[0] = "select *from $tabela_banco[25] where (conteudo_post like '%$pesquisa_generica%' or titulo_post like '%$pesquisa_generica%') $condicao_query[2] $limit_query;"; // query
$query[1] = "select *from $tabela_banco[25] where (conteudo_post like '%$pesquisa_generica%' or titulo_post like '%$pesquisa_generica%') $condicao_query[2];"; // query

};

// ---------------------------------------------------------


// comando --------------------------------------------

$comando = comando_executa($query[0]); // comando

// ---------------------------------------------------------


// contador ---------------------------------------------

$contador = 0; // contador

// ---------------------------------------------------------


// numero de linhas ----------------------------------

$numero_linhas = retorne_numero_linhas_comando($comando); // numero de linhas

// ---------------------------------------------------------


// obtendo dados -------------------------------------

for($contador == $contador; $contador <= $numero_linhas; $contador++){


// dados -------------------------------------------------

$dados = mysql_fetch_array($comando, MYSQL_ASSOC); // dados

// ---------------------------------------------------------


// dados ------------------------------------------------

$id = $dados['id']; // dados de tabela
$titulo_post = $dados['titulo_post']; // dados de tabela

// ---------------------------------------------------------


// topicos de ajuda -----------------------------------

if($id != null){

$topicos_ajuda .= monta_link_topico($id, $titulo_post); // topicos de ajuda

};

// ---------------------------------------------------------


};

// ---------------------------------------------------------


// numero total de topicos --------------------------

$numero_total_topicos = retorne_numero_linhas_query($query[1]); // numero total de topicos

// ---------------------------------------------------------


// codigo html bruto ----------------------------------

$codigo_html_bruto .= "<div class='div_topicos_ajuda'>"; // codigo html bruto
$codigo_html_bruto .= $topicos_ajuda; // codigo html bruto
$codigo_html_bruto .= "</div>"; // codigo html bruto
$codigo_html_bruto .= monta_paginas_paginacao_ajuda($numero_total_topicos); // codigo html bruto

// --------------------------------------------------------


// retorno ----------------------------------------------

return $codigo_html_bruto; // retorno

// --------------------------------------------------------


};

// --------------------------------------------------------


?>