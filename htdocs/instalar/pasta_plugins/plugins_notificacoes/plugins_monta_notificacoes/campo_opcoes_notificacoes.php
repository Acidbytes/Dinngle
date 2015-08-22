<?php

// campo opcoes notificacoes ---------------------

function campo_opcoes_notificacoes(){


// globals ----------------------------------------------

global $enderecos_arquivos_php_uteis; // arquivos php uteis

// --------------------------------------------------------


// url do link para limpar notificacoes -----------

$url_link = $enderecos_arquivos_php_uteis['limpar_notificacoes']; // url do link para limpar notificacoes

// --------------------------------------------------------


// opcoes menu --------------------------------------

$opcoes_menu[] = "<li role='presentation'><a href='$url_link' title='Limpar notificações'>Limpar notificações</a></li>"; // opcoes menu

// --------------------------------------------------------


// codigo html bruto ----------------------------------

$codigo_html_bruto .= constroe_menu_drop_especial($opcoes_menu, "Ações");

$codigo_html_bruto = constroe_div_especial_geral("Opções de notificações", $codigo_html_bruto, null);

// --------------------------------------------------------


// retorno ----------------------------------------------

return $codigo_html_bruto; // retorno

// --------------------------------------------------------


};

// --------------------------------------------------------


?>