<?php

// constroe a barra de tarefas
function constroe_barra_tarefas(){

// codigo html
$codigo_html .= "<span id='campo_beep_notificacoes_gerais'></span>";
$codigo_html .= carregar_chat_usuario();
$codigo_html .= "<div class='classe_barra_tarefas'>";
$codigo_html .= constroe_player_audio();
$codigo_html .= campo_ocultar_exibir_chat();
$codigo_html .= "</div>";

// retorno
return $codigo_html;

};


?>