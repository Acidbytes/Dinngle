<?php


// carrega as visitas do perfil ----------------------

function carregar_visitas_perfil_usuario(){


// globals ----------------------------------------------

global $tabela_banco; // tabela de banco de dados

// --------------------------------------------------------


// id de usuario ---------------------------------------

$idusuario = retorne_idusuario_logado(); // id de usuario

// --------------------------------------------------------


// limit de query --------------------------------------

$limit_query = retorne_limit_tabela_get(); // limit de query

// --------------------------------------------------------


// query ------------------------------------------------

$query = "select *from $tabela_banco[13] where idusuario='$idusuario' $limit_query;"; // query

// --------------------------------------------------------


// comando -------------------------------------------

$comando = comando_executa($query); // comando

// --------------------------------------------------------


// numero de visitas em perfil --------------------

$numero_visitas_perfil = retorne_numero_visitas_perfil(); // numero de visitas em perfil

// --------------------------------------------------------


// codigo html bruto ---------------------------------

$codigo_html_bruto .= monta_pacotes_visitas_perfil($comando);
$codigo_html_bruto .= monta_paginas_paginacao($numero_visitas_perfil);



// --------------------------------------------------------


// titulo -------------------------------------------------

$titulo_div_especial = "Visitantes"; // titulo

// --------------------------------------------------------


// adiciona div especial ----------------------------

$codigo_html_bruto = constroe_div_especial_geral($titulo_div_especial, $codigo_html_bruto, null); // adiciona div especial

// --------------------------------------------------------


// retorno ----------------------------------------------

return $codigo_html_bruto; // retorno

// --------------------------------------------------------


};

// --------------------------------------------------------


?>