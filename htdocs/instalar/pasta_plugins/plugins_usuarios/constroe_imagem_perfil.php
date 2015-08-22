<?php


// constroe a imagem de perfil --------------------

function constroe_imagem_perfil($idusuario){


// globals --------------------------------------------------

global $imagem_servidor; // imagem de servidor

global $enderecos_arquivos_php_uteis; // scripts uteis

global $url_pagina_inicial_site; // url de pagina inicial

// ------------------------------------------------------------


// imagem de perfil --------------------------------------

$imagem_perfil = retorna_imagem_perfil($idusuario); // imagem de perfil

// ------------------------------------------------------------


// imagem de camera ----------------------------------

$imagem_camera = $imagem_servidor['camera']; // imagem de camera
$imagem_camera = "<img src='$imagem_camera'>"; // imagem de camera

// ------------------------------------------------------------


// obtendo endereco ------------------------------------

$endereco_script_upload = $enderecos_arquivos_php_uteis['foto_perfil']; // obtendo endereco

// ------------------------------------------------------------


// nome de usuario -------------------------------------

$nome_usuario = func_retorna_nome_de_usuario_por_id($idusuario); // nome de usuario

// ------------------------------------------------------------


// informa se o usuario e o dono do perfil ----------

$usuario_dono_perfil = retorna_usuario_vendo_perfil_dono(); // informa se o usuario e o dono do perfil 

// ------------------------------------------------------------


// codigo html de formulario --------------------------

if($usuario_dono_perfil == true){

$codigo_formulario .= "<a href='#' onclick='clique_botao_imagem_perfil_upload();'>$imagem_camera</a>";
$codigo_formulario .= "&nbsp;";
$codigo_formulario .= "<a href='#' onclick='clique_botao_imagem_perfil_upload();'>Alterar</a>";
$codigo_formulario .= "<input id='campo_file_imagem_perfil' type='file' name='foto' onchange='barra_progresso(3); enviar_foto_perfil_automatico();'>";

};

// ------------------------------------------------------------


// codigo html bruto -------------------------------------

$codigo_html_bruto .= "<div class='div_imagem_perfil'>";
$codigo_html_bruto .= "<form action='$endereco_script_upload' method='post' enctype='multipart/form-data' id='formulario_foto_perfil'>";
$codigo_html_bruto .= "<a href='$url_pagina_inicial_site?idusuario=$idusuario&tipo_pagina=9' title='$nome_usuario' alt='$nome_usuario'>";
$codigo_html_bruto .= "<img src='$imagem_perfil' class='imagem_perfil'>";
$codigo_html_bruto .= "</a>";
$codigo_html_bruto .= "<br>";
$codigo_html_bruto .= montar_barra_progresso("barra_progresso_upload_imagem_perfil");
$codigo_html_bruto .= $codigo_formulario;
$codigo_html_bruto .= "</form>";
$codigo_html_bruto .= "</div>";

// -----------------------------------------------------------


// retorno -------------------------------------------------

return $codigo_html_bruto; // retorno

// -----------------------------------------------------------


};

// --------------------------------------------------------


?>