<?php


// retorna a pesquisa hashtag ---------------------

function retorne_pesquisa_hashtag(){


// globals -----------------------------------------------

global $tabela_banco; // tabelas do banco de dados

// ---------------------------------------------------------


// tabela de cadastro ---------------------------------

$tabela[0] = $tabela_banco[9]; // tabela de postagens

// ---------------------------------------------------------


// termo de pesquisa --------------------------------

$termo_pesquisa = retorne_termo_pesquisa(); // termo de pesquisa

// ---------------------------------------------------------


// adiciona marcador hashtag ---------------------

$termo_pesquisa = "#".$termo_pesquisa; // adiciona marcador hashtag

// ---------------------------------------------------------


// limit query -------------------------------------------

$limit_query = retorne_limit_pesquisa_geral_get(); // limit query

// ---------------------------------------------------------


// id de usuario logado ------------------------------

$idusuario_logado = retorne_idusuario_logado(); // id de usuario logado

// ---------------------------------------------------------


// querys ------------------------------------------------

$query[0] = "select *from $tabela[0] where conteudo_post like '%$termo_pesquisa%' $limit_query;"; // query
$query[1] = "select *from $tabela[0] where conteudo_post like '%$termo_pesquisa%';"; // query

// ---------------------------------------------------------


// comando --------------------------------------------

$comando = comando_executa($query[0]); // comando

// ---------------------------------------------------------


// numero de linhas ----------------------------------

$numero_linhas = retorne_numero_linhas_comando($comando); // numero de linhas

// ---------------------------------------------------------


// contador ---------------------------------------------

$contador = 0; // contador

// ---------------------------------------------------------


// obtendo ids de usuarios -------------------------

for($contador == $contador; $contador <= $numero_linhas; $contador++){


// dados ------------------------------------------------

$dados = mysql_fetch_array($comando, MYSQL_ASSOC); // dados

// ---------------------------------------------------------


// id de postagem -----------------------------------

$arrays_idposts[] = $dados['id']; // id de postagem

$arrays_idusuarios[] = $dados['idusuario']; // id de usuario

// ---------------------------------------------------------


};

// ---------------------------------------------------------


// total de resultados --------------------------------

$numero_resultados = retorne_numero_linhas_query($query[1]); // numero de linhas

// ---------------------------------------------------------


// tamanho de resultados ---------------------------

$tamanho_resultados = retorne_tamanho_resultado($numero_resultados); // tamanho de resultados

// ---------------------------------------------------------


// codigo html bruto ----------------------------------

$codigo_html_bruto .= "<div class='classe_div_numero_resultados_pesquisa_geral'>";
$codigo_html_bruto .= "Falando sobre";
$codigo_html_bruto .= "&nbsp;";
$codigo_html_bruto .= $termo_pesquisa;
$codigo_html_bruto .= "<br>";
$codigo_html_bruto .= "<font size='15px'>";
$codigo_html_bruto .= $tamanho_resultados;
$codigo_html_bruto .= "</font>";
$codigo_html_bruto .= "</div>";
$codigo_html_bruto .= monta_pacotes_hashtags($arrays_idposts, $arrays_idusuarios, $numero_resultados);
$codigo_html_bruto .= monta_paginas_paginacao($numero_resultados);



// ---------------------------------------------------------


// retorno -----------------------------------------------

return $codigo_html_bruto; // retorno

// ---------------------------------------------------------


};

// --------------------------------------------------------


?>