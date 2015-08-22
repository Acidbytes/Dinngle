<?php


// imagem de perfil de depoimento -----------

function constroe_imagem_perfil_depoimento($idusuario){


// globals --------------------------------------------

global $url_pagina_inicial_site; // url de pagina inicial

// ------------------------------------------------------


// url de imagem de perfil miniatura -----------

$url_imagem = retorna_imagem_perfil_miniatura($idusuario); // url de imagem de perfil miniatura

// -------------------------------------------------------


// nome do usuario ---------------------------------

$nome_usuario = func_retorna_nome_de_usuario_por_id($idusuario); // nome do usuario

// -------------------------------------------------------


// imagem de retorno ------------------------------

$imagem_retorno .= "<a href='$url_pagina_inicial_site?idusuario=$idusuario' title='$nome_usuario'>"; // imagem de retorno
$imagem_retorno .= "<img src='$url_imagem' title='$nome_usuario' alt='$nome_usuario' class='imagem_miniatura_depoimento_usuario'>"; // imagem de retorno
$imagem_retorno .= "</a>"; // imagem de retorno

// -------------------------------------------------------


// retorno ---------------------------------------------

return $imagem_retorno; // retorno

// -------------------------------------------------------


};

// -------------------------------------------------------


?>