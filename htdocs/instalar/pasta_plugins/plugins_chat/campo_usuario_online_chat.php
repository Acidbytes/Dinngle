<?php


// campo usuario online chat ---------------------

function campo_usuario_online_chat($idusuario){


// globals ----------------------------------------------

global $imagem_servidor; // imagens do servidor

// --------------------------------------------------------


// imagens --------------------------------------------

$imagem[0] = "<img src='".$imagem_servidor['online']."' title='On-line'>"; // imagem

// --------------------------------------------------------


// codigo html bruto ---------------------------------

$codigo_html_bruto .= "<span class='classe_span_usuario_online_chat' id='span_usuario_online_chat_$idusuario'>";
$codigo_html_bruto .= $imagem[0];
$codigo_html_bruto .= "</span>";

// --------------------------------------------------------


// retorno ----------------------------------------------

return $codigo_html_bruto; // retorno

// --------------------------------------------------------


};

// --------------------------------------------------------


?>