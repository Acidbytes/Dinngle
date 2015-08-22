<?php


// campo select tipo de ajuda ---------------------

function campo_select_tipo_ajuda($dados){


// tipo de ajuda --------------------------------------

$tipo_ajuda = $dados['tipo_ajuda']; // tipo de ajuda

// -------------------------------------------------------


// valida tipo de ajuda -----------------------------

if($tipo_ajuda == null){

$tipo_ajuda = 1; // tipo de ajuda

};

// --------------------------------------------------------


// tipo de ajuda atual --------------------------------

if($tipo_ajuda == 1){

$opcao_atual = "<option value='1' selected>Ajuda</option>"; // opcao atual

}else{

$opcao_atual = "<option value='2' selected>Documentação</option>"; // opcao atual

};

// --------------------------------------------------------


// campo de tipo de ajuda -------------------------

if(retorne_tipo_pagina() == 7){

$campo_tipo_ajuda .= "<input type='hidden' name='tipo_ajuda' value='2'>"; // campo tipo de ajuda
$campo_tipo_ajuda .= "<li>Modo documentação"; // campo tipo de ajuda

}else{

$campo_tipo_ajuda .= "<select name='tipo_ajuda'>"; // campo de tipo de ajuda
$campo_tipo_ajuda .= "<option value='1'>Ajuda</option>"; // campo de tipo de ajuda
$campo_tipo_ajuda .= "<option value='2'>Documentação</option>"; // campo de tipo de ajuda
$campo_tipo_ajuda .= $opcao_atual; // campo de tipo de ajuda
$campo_tipo_ajuda .= "</select>"; // campo de tipo de ajuda

};

// --------------------------------------------------------


// codigo html bruto ---------------------------------

$codigo_html_bruto .= $campo_tipo_ajuda; // codigo html bruto
$codigo_html_bruto .= ""; // codigo html bruto

// --------------------------------------------------------


// adiciona div especial basica -------------------

$codigo_html_bruto = div_especial_basica_campos($codigo_html_bruto); // adiciona div especial basica

// --------------------------------------------------------


// retorno ----------------------------------------------

return $codigo_html_bruto; // retorno

// --------------------------------------------------------


};

// --------------------------------------------------------


?>