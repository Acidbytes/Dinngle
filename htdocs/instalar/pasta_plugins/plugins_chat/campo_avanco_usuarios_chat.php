<?php


// campo de avanco de usuarios de chat -------

function campo_avanco_usuarios_chat(){


// globals ----------------------------------------------

global $imagem_servidor; // imagem de servidor

// --------------------------------------------------------


// imagens --------------------------------------------

$imagem[0] = "<img src='".$imagem_servidor['voltar']."' title='Voltar'>"; // imagem
$imagem[1] = "<img src='".$imagem_servidor['avancar']."' title='Avançar'>"; // imagem

// --------------------------------------------------------


// codigo html bruto ---------------------------------

$codigo_html_bruto .= "<div class='div_avanco_amigos_chat_usuario'>";
$codigo_html_bruto .= "<a href='#1' id='#1' onclick='avancar_amigos_chat(1);'>$imagem[0]</a>";
$codigo_html_bruto .= "&nbsp;";
$codigo_html_bruto .= "&nbsp;";
$codigo_html_bruto .= "<a href='#2' id='#2' onclick='avancar_amigos_chat(2);'>$imagem[1]</a>";
$codigo_html_bruto .= "</div>";

// --------------------------------------------------------


// retorno ----------------------------------------------

return $codigo_html_bruto; // retorno

// --------------------------------------------------------


};

// --------------------------------------------------------


?>