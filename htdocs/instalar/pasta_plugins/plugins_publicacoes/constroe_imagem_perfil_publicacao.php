<?php


// controe a imagem de perfil de publicacao --

function constroe_imagem_perfil_publicacao($idusuario){


// global -----------------------------------------------

global $url_pagina_inicial_site; // url de pagina inicial de site

// -------------------------------------------------------


// url da imagem de perfil -------------------------

$url_imagem_perfil = retorna_imagem_perfil_miniatura($idusuario); // url da imagem de perfil

// --------------------------------------------------------


// nome de usuario ---------------------------------

$nome_usuario = func_retorna_nome_de_usuario_por_id($idusuario); // nome de usuario

// --------------------------------------------------------


// codigo html bruto ---------------------------------

$codigo_html_bruto .= "<a href='$url_pagina_inicial_site?idusuario=$idusuario' title='$nome_usuario'>";
$codigo_html_bruto .= "<img src='$url_imagem_perfil' title='$nome_usuario' alt='$nome_usuario' class='imagem_perfil_miniatura_postagem'>";
$codigo_html_bruto .= "</a>";

// --------------------------------------------------------


// retorno ----------------------------------------------

return $codigo_html_bruto; // retorno

// --------------------------------------------------------


};

// --------------------------------------------------------


?>