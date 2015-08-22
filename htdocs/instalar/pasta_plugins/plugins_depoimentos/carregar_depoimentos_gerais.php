<?php


// carrega depoimentos gerais ------------------

function carregar_depoimentos_gerais(){


// globals ---------------------------------------------

global $tabela_banco; // tabela de banco de dados

// -------------------------------------------------------


// tipo de depoimento ------------------------------

$tipo_depoimento = retorne_tipo_depoimento_get(); // tipo de depoimento

// -------------------------------------------------------


// id de usuario --------------------------------------

$idusuario = retorne_idusuario_visualizando_perfil(); // id de usuario

// -------------------------------------------------------


// limit query -----------------------------------------

$limit_query = retorne_limit_tabela_get(); // limit query

// -------------------------------------------------------


// carrega tipo de depoimentos -----------------

switch($tipo_depoimento){


case 1:
$query[0] = "select *from $tabela_banco[12] where idusuario='$idusuario' and aceitou='1' $limit_query;"; // query
$query[1] = "select *from $tabela_banco[12] where idusuario='$idusuario' and aceitou='1';"; // query
break;


case 2:
$query[0] = "select *from $tabela_banco[12] where idamigo='$idusuario' and aceitou='1' $limit_query;"; // query
$query[1] = "select *from $tabela_banco[12] where idamigo='$idusuario' and aceitou='1';"; // query
break;


case 3:
$query[0] = "select *from $tabela_banco[12] where idusuario='$idusuario' and aceitou='2' $limit_query;"; // query
$query[1] = "select *from $tabela_banco[12] where idusuario='$idusuario' and aceitou='2';"; // query
break;


case 4:
$query[0] = "select *from $tabela_banco[12] where idamigo='$idusuario' and aceitou='2' $limit_query;"; // query
$query[1] = "select *from $tabela_banco[12] where idamigo='$idusuario' and aceitou='2';"; // query
break;


};

// -------------------------------------------------------


// comando ------------------------------------------

$comando = comando_executa($query[0]); // comando

// -------------------------------------------------------


// numero de resultados --------------------------

$numero_resultados = retorne_numero_linhas_query($query[1]); // numero de resultados

// -------------------------------------------------------


// codigo html bruto --------------------------------

$codigo_html_bruto .= monta_pacote_depoimentos($comando);
$codigo_html_bruto .= monta_paginas_paginacao($numero_resultados);

// -------------------------------------------------------


// retorno ----------------------------------------------

return $codigo_html_bruto; // retorno

// --------------------------------------------------------


};

// --------------------------------------------------------


?>