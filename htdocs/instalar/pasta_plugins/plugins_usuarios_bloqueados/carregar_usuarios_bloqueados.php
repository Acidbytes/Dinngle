<?php


// carregar usuarios bloqueados ----------------

function carregar_usuarios_bloqueados(){


// globals ----------------------------------------------

global $enderecos_arquivos_php_uteis; // arquivos php uteis

// --------------------------------------------------------


// array com usuarios bloqueados -------------

$array_usuarios = retorne_array_usuarios_bloqueados(); // array com usuarios bloqueados

// -------------------------------------------------------


// url de script de formulario ----------------------

$url_script = $enderecos_arquivos_php_uteis['bloquear_usuario']; // url de script de formulario

// --------------------------------------------------------


// montando usuario bloqueado ----------------

foreach($array_usuarios as $idusuario){


// codigo html bruto --------------------------------

$codigo_html_bruto .= "<form action='$url_script' method='post'>";
$codigo_html_bruto .= constroe_imagem_perfil_miniatura($idusuario);
$codigo_html_bruto .= "<br>";
$codigo_html_bruto .= retorna_link_perfil_usuario($idusuario);
$codigo_html_bruto .= "<br>";
$codigo_html_bruto .= "<br>";
$codigo_html_bruto .= "<input type='hidden' name='idusuario' value='$idusuario'>";
$codigo_html_bruto .= "<input type='hidden' name='desbloquear' value='true'>";
$codigo_html_bruto .= "<input type='submit' class='botao_padrao' value='Desbloquear'>";
$codigo_html_bruto .= "</form>";

// --------------------------------------------------------


// adiciona div especial -----------------------------

$codigo_html_bruto = div_especial_basica_campos($codigo_html_bruto); // adiciona div especial

// --------------------------------------------------------


};

// --------------------------------------------------------


// titulo -------------------------------------------------

$titulo = "Você bloqueou"; // titulo

// --------------------------------------------------------


// adiciona div especial ----------------------------

$codigo_html_bruto = constroe_div_especial_geral($titulo, $codigo_html_bruto, null); // adiciona div especial

// --------------------------------------------------------


// adiciona paginacao ------------------------------

$codigo_html_bruto .= monta_paginas_paginacao(retorne_numero_usuarios_bloqueados()); // adiciona paginacao

// --------------------------------------------------------


// retorno ----------------------------------------------

return $codigo_html_bruto; // retorno

// --------------------------------------------------------


};

// --------------------------------------------------------


?>