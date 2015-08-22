<?php

// campo oculta exibe chat
function campo_ocultar_exibir_chat(){

// codigo html
$codigo_html .= "<div class='classe_campo_ocultar_exibir_chat' onclick='ocultar_chat_usuario();'>"; // codigo html
$codigo_html .= "Novas mensagens"; // codigo html
$codigo_html .= " - "; // codigo html
$codigo_html .= "<span id='div_campo_ocultar_exibir_chat' class='label label-danger'>0</span>"; // codigo html
$codigo_html .= "</div>"; // codigo html

// retorno
return $codigo_html;

};

?>