<?php


// janela de mensagem de dialogo --------------

function janela_mensagem_dialogo($titulo_janela, $conteudo_mensagem, $div_id){


// botao fechar ---------------------------------------

$botao_fechar .= "<span class='span_botao_fechar_mensagem_dialogo'>"; // botao fechar
$botao_fechar .= "<button class='botao_padrao' onclick='fechar_janela_mensagem_dialogo();'>x</button>"; // botao fechar
$botao_fechar .= "</span>"; // botao fechar

// --------------------------------------------------------


// codigo html bruto ---------------------------------

$codigo_html_bruto .= "<div id='$div_id' class='div_janela_principal_mensagem_dialogo' ondblclick='fechar_janela_mensagem_dialogo();'>";
$codigo_html_bruto .= "<div class='div_janela_mensagem_dialogo'>";
$codigo_html_bruto .= "<div class='div_janela_mensagem_dialogo_titulo'>";
$codigo_html_bruto .= $botao_fechar;
$codigo_html_bruto .= $titulo_janela;
$codigo_html_bruto .= "</div>";
$codigo_html_bruto .= "<div class='div_janela_mensagem_conteudo'>";
$codigo_html_bruto .= $conteudo_mensagem;
$codigo_html_bruto .= "</div>";
$codigo_html_bruto .= "</div>";
$codigo_html_bruto .= "</div>";

// --------------------------------------------------------


// retorno ----------------------------------------------

return $codigo_html_bruto; // retorno

// --------------------------------------------------------


};

// --------------------------------------------------------


?>