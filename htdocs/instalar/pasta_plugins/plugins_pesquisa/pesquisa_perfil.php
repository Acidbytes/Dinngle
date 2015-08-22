<?php


// pesquisa perfil de usuario ----------------------

function pesquisa_perfil(){


// globals -----------------------------------------------

global $tabela_banco; // tabelas do banco de dados

// ---------------------------------------------------------


// tabela de cadastro ---------------------------------

$tabela[0] = $tabela_banco[1]; // tabela de cadastro

$tabela[1] = $tabela_banco[3]; // tabela de informacoes

// ---------------------------------------------------------


// termo de pesquisa --------------------------------

$termo_pesquisa = retorne_termo_pesquisa(); // termo de pesquisa

// ---------------------------------------------------------


// limit query -------------------------------------------

$limit_query = retorne_limit_pesquisa_geral_get(); // limit query

// ---------------------------------------------------------


// query -------------------------------------------------

$query[0] = "select *from $tabela[0] where nome like '%$termo_pesquisa%' $limit_query;"; // query

$query[1] = "select *from $tabela[0] where nome like '%$termo_pesquisa%';"; // query

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


// id de usuario ----------------------------------------

$arrays_idusuarios[] = $dados['idusuario']; // id de usuario

// ---------------------------------------------------------


};

// ---------------------------------------------------------


// total de resultados --------------------------------

$numero_resultados = retorne_numero_linhas_query($query[1]); // numero de linhas

// ---------------------------------------------------------


// informa numero de resultados -----------------

if($numero_resultados > 1){

$resultados_encontrados = "Encontrados $numero_resultados resultados"; // plural

}else{

$resultados_encontrados = "Encontrado $numero_resultados resultado"; // singular

};

// ---------------------------------------------------------


// codigo html bruto ----------------------------------

$codigo_html_bruto .= "<div class='classe_div_numero_resultados_pesquisa_geral'>";
$codigo_html_bruto .= $resultados_encontrados;
$codigo_html_bruto .= "</div>";
$codigo_html_bruto .= monta_pacotes_usuarios($arrays_idusuarios, 1);
$codigo_html_bruto .= monta_paginas_paginacao($numero_resultados);



// ---------------------------------------------------------


// retorno -----------------------------------------------

return $codigo_html_bruto; // retorno

// ---------------------------------------------------------


};

// --------------------------------------------------------


?>