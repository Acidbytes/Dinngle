<?php


// constroe campo editar perfil --------------------

function constroe_campo_editar_perfil(){


// globals -----------------------------------------------

global $imagem_servidor; // imagens de servidor

global $url_pagina_inicial_site; // url de pagina inicial

// ---------------------------------------------------------


// imagem configurar --------------------------------

$imagem_configurar = $imagem_servidor['configurar']; // imagem configurar

$imagem_configurar = "<img src='$imagem_configurar' title='Configurar'>"; // imagem configurar

// ---------------------------------------------------------


// url para editar perfil -------------------------------

$url[0] = "$url_pagina_inicial_site?idusuario=$idusuario&tipo_pagina=7"; // url para editar perfil

// ---------------------------------------------------------


// id de usuario logado ------------------------------

$idusuario_logado = retorne_idusuario_logado(); // id de usuario logado

// ---------------------------------------------------------


// id de usuario visualizando perfil -----------------------

$idusuario = retorne_idusuario_visualizando_perfil(); // id de usuario visualizando perfil

// --------------------------------------------------------


// imagem de usuario logado -----------------------

$imagem_usuario_logado = constroe_imagem_perfil_publicacao($idusuario_logado); // imagem de usuario logado

// ----------------------------------------------------------


// codigo html bruto ----------------------------------

$codigo_html_bruto .= "<div class='div_campo_editar_perfil'>";
$codigo_html_bruto .= $imagem_usuario_logado;
$codigo_html_bruto .= "<a href='$url[0]'>";
$codigo_html_bruto .= $imagem_configurar;
$codigo_html_bruto .= "</a>";
$codigo_html_bruto .= "&nbsp;";
$codigo_html_bruto .= "<a href='$url[0]' class='uibutton icon edit' title='Editar'>";
$codigo_html_bruto .= "Editar";
$codigo_html_bruto .= "</a>";
$codigo_html_bruto .= "</div>";

// ---------------------------------------------------------


// adiciona div especial
//$codigo_html_bruto = constroe_div_especial_geral("Editar meu perfíl", $codigo_html_bruto, null);


// retorno -----------------------------------------------

return $codigo_html_bruto; // retorno

// ---------------------------------------------------------


};

// --------------------------------------------------------


?>