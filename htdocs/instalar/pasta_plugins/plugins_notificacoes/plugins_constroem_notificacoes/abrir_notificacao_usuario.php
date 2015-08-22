<?php


// abrir notificacao de usuario ---------------------

function abrir_notificacao_usuario($tipo_notificacao){


// global -----------------------------------------------

global $tabela_banco; // tabela de banco de dados

global $url_pagina_inicial_site; // url pagina inicial de site

// --------------------------------------------------------


// id de usuario logado -----------------------------

$idusuario = retorne_idusuario_logado(); // id de usuario logado

// --------------------------------------------------------


// limit de query --------------------------------------

$limit_query = retorne_limit_pesquisa_geral_get(); // limit de query

// --------------------------------------------------------


// query ------------------------------------------------

$query[0] = "select *from $tabela_banco[24] where idamigo='$idusuario' and tipo_notificacao='$tipo_notificacao' $limit_query;"; // query
$query[1] = "select *from $tabela_banco[24] where idamigo='$idusuario' and tipo_notificacao='$tipo_notificacao';"; // query

// --------------------------------------------------------


// numero de linhas de query ---------------------

$numero_resultados = retorne_numero_linhas_query($query[1]); // numero de linhas de query

// --------------------------------------------------------


// comando -------------------------------------------

$comando = comando_executa($query[0]); // comando

// --------------------------------------------------------


// contador --------------------------------------------

$contador = 0; // contador

// --------------------------------------------------------


for($contador == $contador; $contador <= retorne_numero_linhas_comando($comando); $contador++){


// dados -----------------------------------------------

$dados = mysql_fetch_array($comando, MYSQL_ASSOC); // dados

// --------------------------------------------------------


// montando notificacao ----------------------------

$notificacao_usuario .= monta_div_notificacao_dados($dados, $tipo_notificacao); // montando notificacao

// --------------------------------------------------------


};

// --------------------------------------------------------


// codigo html bruto ---------------------------------

$codigo_html_bruto .= $notificacao_usuario;
$codigo_html_bruto .= monta_paginas_paginacao($numero_resultados);

// ----------------------------------------------------------


// retorno ------------------------------------------------

return $codigo_html_bruto; // retorno

// ----------------------------------------------------------


};

// --------------------------------------------------------


?>