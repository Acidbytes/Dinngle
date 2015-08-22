<?php


// carrega pesquisa de funcoes gerais ---------

function carrega_pesquisa_funcoes_gerais(){


// globals ----------------------------------------------

global $tabela_banco; // tabela de banco de dados

// --------------------------------------------------------


// retorna o termo de pesquisa -------------------

$pesquisa_generica = retorne_termo_pesquisa(); // retorna o termo de pesquisa

// ---------------------------------------------------------


// tipo de pesquisa por funcoes -------------------

$tipo_pesquisa_funcoes = tipo_pesquisa_funcoes(); // tipo de pesquisa por funcoes

// ---------------------------------------------------------


// limit de query ---------------------------------------

$limit_query = retorne_limit_tabela_sem_id(); // limit de query

// ---------------------------------------------------------


// monta a query --------------------------------------

switch($tipo_pesquisa_funcoes){


case 1:
$query[0] = "select *from $tabela_banco[28] where (nome like '%$pesquisa_generica%') and tipo='1' $limit_query;"; // query
$query[1] = "select *from $tabela_banco[28] where (nome like '%$pesquisa_generica%') and tipo='1';"; // query
break;


case 2:
$query[0] = "select *from $tabela_banco[28] where (nome like '%$pesquisa_generica%') and tipo='2' $limit_query;"; // query
$query[1] = "select *from $tabela_banco[28] where (nome like '%$pesquisa_generica%') and tipo='2';"; // query
break;


case 3:
$query[0] = "select *from $tabela_banco[28] where (nome like '%$pesquisa_generica%') $limit_query;"; // query
$query[1] = "select *from $tabela_banco[28] where (nome like '%$pesquisa_generica%');"; // query
break;


};

// ---------------------------------------------------------


// numero de resultados ----------------------------

$numero_resultados = retorne_numero_linhas_query($query[1]); // numero de resultados

// ---------------------------------------------------------


// codigo html bruto ---------------------------------

$codigo_html_bruto .= "Pesquisando por <b>$pesquisa_generica</b> total $numero_resultados resultado(s)."; // codigo html bruto
$codigo_html_bruto .= "<br>"; // codigo html bruto
$codigo_html_bruto .= "<br>"; // codigo html bruto
$codigo_html_bruto .= retorne_pacote_funcoes_gerais($query[0]); // codigo html bruto
$codigo_html_bruto .= monta_paginas_paginacao_funcoes_gerais($numero_resultados); // codigo html bruto

// --------------------------------------------------------


// retorno ----------------------------------------------

return $codigo_html_bruto; // retorno

// --------------------------------------------------------


};

// ---------------------------------------------------------


?>