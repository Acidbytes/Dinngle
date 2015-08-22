<?php


// carrega as mensagens do chat ----------------

function carregar_mensagens_chat(){


// globals -----------------------------------------------

global $separador_mensagem_chat; // separador de mensagens de chat

// ---------------------------------------------------------


// retorna id de usuario de chat -------------------

$idusuario = retorne_idusuario_sessao_chat(null, false); // retorna id de usuario de chat

// ---------------------------------------------------------


// id de usuario logado ------------------------------

$idusuario_logado = retorne_idusuario_logado(); // id de usuario logado

// ---------------------------------------------------------


// dados da mensagem -----------------------------

$dados_mensagem[0] = dados_mensagem(0); // dados da mensagem

// ---------------------------------------------------------


// recupera conteudo antigo de mensagem ----

$conteudo_mensagem_chat = $dados_mensagem[0]['mensagem']; // recupera conteudo antigo de mensagem

// ---------------------------------------------------------


// adiciona baloes ------------------------------------

$conteudo_mensagem_chat = str_replace($separador_mensagem_chat[0], "<div class='balao_mensagem_enviou'>", $conteudo_mensagem_chat); // separador de mensagem
$conteudo_mensagem_chat = str_replace($separador_mensagem_chat[1], "<div class='balao_mensagem_recebeu'>", $conteudo_mensagem_chat); // separador de mensagem
$conteudo_mensagem_chat = str_replace($separador_mensagem_chat[2], "</div>", $conteudo_mensagem_chat); // separador de mensagem
$conteudo_mensagem_chat = str_replace($separador_mensagem_chat[3], "<br><br>", $conteudo_mensagem_chat); // separador de mensagem

// ---------------------------------------------------------


// converte urls para links ------------------------

$conteudo_mensagem_chat = converte_urls_texto_links($conteudo_mensagem_chat); // converte urls para links

// ----------------------------------------------------------


// converte emoticons ------------------------------

$conteudo_mensagem_chat = converte_codigo_emoticon($conteudo_mensagem_chat); // converte emoticons

// ---------------------------------------------------------


// codigo html bruto --------------------------------

$codigo_html_bruto .= $conteudo_mensagem_chat;

// ---------------------------------------------------------


// retorno -----------------------------------------------

return $codigo_html_bruto; // retorno

// ---------------------------------------------------------


};

// --------------------------------------------------------


?>