<?php


// constroe o modo de tipo de mensagem a carregar ------

function constroe_modo_tipo_mensagens_carregar(){


// globals ---------------------------------------------------------------

global $imagem_servidor; // imagens de servidor

// -------------------------------------------------------------------------


// imagem de chat ---------------------------------------------------

$imagem[0] = $imagem_servidor['chat']; // imagem de chat
$imagem[0] = "<img src='$imagem[0]' title='Chat'>"; // imagem de chat

// ------------------------------------------------------------------------


// numero de novas mensagens ---------------------------------

$numero_novas_mensagens = retorne_numero_novas_mensagens(); // numero de novas mensagens

// -------------------------------------------------------------------------


// span com o numero de novas mensagens -----------------

$span_numero_novas_mensagens = "<span id='span_numero_novas_mensagens_chat_menu_modo_tipo'>$numero_novas_mensagens</span>"; // span com o numero de novas mensagens

// ------------------------------------------------------------------------


// titulo de menu especial ------------------------------------------

$titulo_menu_especial .= "$imagem[0]"; // titulo de menu especial
$titulo_menu_especial .= "&nbsp;"; // titulo de menu especial
$titulo_menu_especial .= "Mensagens"; // titulo de menu especial
$titulo_menu_especial .= " - "; // titulo de menu especial
$titulo_menu_especial .= "<span id='span_numero_novas_mensagens_chat_menu_modo_tipo_titulo'>$numero_novas_mensagens</span>"; // titulo de menu especial

// ------------------------------------------------------------------------


// dialogo excluir mensagens
$dialogo_excluir_mensagens .= "Isto apagará todas as suas mensagens.";
$dialogo_excluir_mensagens .= "<br>";
$dialogo_excluir_mensagens .= "<br>";
$dialogo_excluir_mensagens .= "<input type='button' class='botao_padrao' value='Faça isto' onclick='excluir_todas_mensagens_usuario();'>";
$dialogo_excluir_mensagens .= "<input type='button' class='botao_padrao' value='Cancelar' onclick='dialogo_excluir_todas_mensagens();'>";


// adiciona janela de dialogo em dialogo excluir mensagens
$dialogo_excluir_mensagens = janela_mensagem_dialogo("Excluir todas", $dialogo_excluir_mensagens, "div_excluir_todas_mensagens_usuario");


// opcoes menu ------------------------------------------------------

$opcoes_menu[] = "<li role='presentation'><a href='#1' id='#1' onclick='altera_modo_tipo_carrega_mensagens_chat(1);'>Novas mensagens - $span_numero_novas_mensagens</a></li>"; // opcoes menu
$opcoes_menu[] = "<li role='presentation'><a href='#2' id='#2' onclick='altera_modo_tipo_carrega_mensagens_chat(2);'>Todas</a></li>"; // opcoes menu
$opcoes_menu[] = "<li role='presentation' class='divider'></li>"; // opcoes menu
$opcoes_menu[] = "<li role='presentation'><a href='#3' id='#3' onclick='dialogo_excluir_todas_mensagens();'>Excluir todas</a></li>"; // opcoes menu
// ------------------------------------------------------------------------


// codigo html bruto -------------------------------------------------

$codigo_html_bruto .= "<div class='classe_modo_tipo_mensagens_carregar'>";
$codigo_html_bruto .= constroe_menu_drop_especial($opcoes_menu, $titulo_menu_especial);
$codigo_html_bruto .= "</div>";
$codigo_html_bruto .= $dialogo_excluir_mensagens;

// ------------------------------------------------------------------------


// retorno --------------------------------------------------------------

return $codigo_html_bruto; // retorno

// ------------------------------------------------------------------------


};

// ------------------------------------------------------------------------


?>