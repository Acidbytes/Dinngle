<?php


// carregar chat de usuario -------------------------

function carregar_chat_usuario(){


// codigo html bruto ---------------------------------

$codigo_html_bruto .= "<div class='classe_div_chat_usuario' id='div_chat_usuarios_disponiveis' onkeydown='if(event.keyCode == 27){ocultar_chat_usuario();}'>";
$codigo_html_bruto .= constroe_modo_tipo_mensagens_carregar();
$codigo_html_bruto .= campo_avanco_usuarios_chat();
$codigo_html_bruto .= "<div id='div_lista_amigos_chat_usuario'></div>";
$codigo_html_bruto .= "</div>";

// --------------------------------------------------------


// retorno ----------------------------------------------

return $codigo_html_bruto; // retorno

// --------------------------------------------------------


};

// --------------------------------------------------------


?>