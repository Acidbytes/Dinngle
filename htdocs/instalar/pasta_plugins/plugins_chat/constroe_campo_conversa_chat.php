<?php


// constroe o campo de conversa do chat -------

function constroe_campo_conversa_chat(){


// globals ----------------------------------------------

global $imagem_servidor; // imagens servidor

// --------------------------------------------------------


// id de usuario ---------------------------------------

$idusuario = retorne_idusuario_post(); // id de usuario

// ---------------------------------------------------------


// atualiza id de sessao -----------------------------

retorne_idusuario_sessao_chat($idusuario, true); // atualiza id de sessao

// ---------------------------------------------------------



// imagem emoticon ---------------------------------

$imagem_emoticon = "<img src='".$imagem_servidor['emoticon']."' title='Memes e emoticons'>"; // imagem emoticon

// ----------------------------------------------------------


// imagem carregar mais ----------------------------

$imagem_carregar_mais = "<img src='".$imagem_servidor['carregar_mais']."' title='Mais' onclick='carregar_mais_mensagens_chat_usuario(1);'>"; // imagem carregar mais

// ----------------------------------------------------------


// imagem carregar menos --------------------------

$imagem_carregar_menos = "<img src='".$imagem_servidor['carregar_menos']."' title='Menos' onclick='carregar_mais_mensagens_chat_usuario(2);'>"; // imagem carregar menos

// ----------------------------------------------------------


// campo carregar mais ------------------------------

$campo_carregar_mais .= "<div id='div_carregar_mais_mensagens_chat'>"; // campo carregar mais
$campo_carregar_mais .= $imagem_carregar_mais; // campo carregar mais
$campo_carregar_mais .= "&nbsp;"; // campo carregar mais
$campo_carregar_mais .= "&nbsp;"; // campo carregar mais
$campo_carregar_mais .= $imagem_carregar_menos; // campo carregar mais
$campo_carregar_mais .= "</div>"; // campo carregar mais

// ----------------------------------------------------------


// codigo html bruto ----------------------------------

$codigo_html_bruto .= constroe_perfil_chat_usuario($idusuario);
$codigo_html_bruto .= menu_opcoes_conversa_chat($idusuario);
$codigo_html_bruto .= "<div id='div_campo_troca_mensagens_chat'></div>";
$codigo_html_bruto .= "<div class='campo_escreve_mensagem_chat'>";
$codigo_html_bruto .= $campo_carregar_mais;
$codigo_html_bruto .= campo_exibir_emoticons_memes();
$codigo_html_bruto .= "<input type='text' id='campo_input_chat' placeholder='Sua mensagem' onkeydown='if(event.keyCode == 13){enviar_mensagem_chat($idusuario);}' autofocus>";
$codigo_html_bruto .= "<br>";
$codigo_html_bruto .= "<input type='button' class='botao_padrao' value='Enviar' onclick='enviar_mensagem_chat($idusuario);'>";
$codigo_html_bruto .= "</div>";

// --------------------------------------------------------


// retorno ----------------------------------------------

return $codigo_html_bruto; // retorno

// --------------------------------------------------------


};

// --------------------------------------------------------


?>