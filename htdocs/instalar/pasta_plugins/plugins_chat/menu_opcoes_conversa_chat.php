<?php


// opcoes de conversa de chat -------------------

function menu_opcoes_conversa_chat($idusuario){


// opcoes menu --------------------------------------

$opcoes_menu[] = "<li role='presentation'><a href='#1' id='#1' onclick='reseta_contador_avanco_chat(); carregar_chat_usuario();'>Amigos</a></li>"; // opcoes menu
$opcoes_menu[] = "<li role='presentation' class='divider'></li>"; // opcoes menu
$opcoes_menu[] = "<li role='presentation'><a href='#2' id='#2' onclick='excluir_conversa_chat($idusuario);'>Excluir conversa</a></li>"; // opcoes menu

// --------------------------------------------------------


// codigo  html bruto --------------------------------

$codigo_html_bruto .= "<div class='div_menu_opcoes_conversa_chat'>"; // codigo  html bruto
$codigo_html_bruto .= constroe_menu_drop_especial($opcoes_menu, null); // codigo  html bruto
$codigo_html_bruto .= "</div>"; // codigo  html bruto

// ---------------------------------------------------------


// retorno -----------------------------------------------

return $codigo_html_bruto; // retorno

// ---------------------------------------------------------


};

// --------------------------------------------------------


?>