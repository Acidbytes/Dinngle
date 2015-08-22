<?php


// campo exibir emoticons e memes ------------

function campo_exibir_emoticons_memes(){


// globals ----------------------------------------------

global $imagem_servidor; // imagens servidor

// --------------------------------------------------------


// imagem emoticon ---------------------------------

$imagem_emoticon = "<img src='".$imagem_servidor['emoticon']."' title='Emoticons'>"; // imagem emoticon

// ----------------------------------------------------------


// imagem carregar mais ----------------------------

$imagem_carregar_mais = "<img src='".$imagem_servidor['carregar_mais']."' title='Mais' onclick='carregar_mais_memes_emoticons(1);'>"; // imagem carregar mais

// ----------------------------------------------------------


// imagem carregar menos --------------------------

$imagem_carregar_menos = "<img src='".$imagem_servidor['carregar_menos']."' title='Menos' onclick='carregar_mais_memes_emoticons(2);'>"; // imagem carregar menos

// ----------------------------------------------------------


// campo carregar mais ------------------------------

$campo_carregar_mais .= "<div id='div_carregar_mais_memes_emoticons'>"; // campo carregar mais
$campo_carregar_mais .= $imagem_carregar_mais; // campo carregar mais
$campo_carregar_mais .= "&nbsp;"; // campo carregar mais
$campo_carregar_mais .= "&nbsp;"; // campo carregar mais
$campo_carregar_mais .= $imagem_carregar_menos; // campo carregar mais
$campo_carregar_mais .= "</div>"; // campo carregar mais

// ----------------------------------------------------------


// codigo html bruto -----------------------------------

$codigo_html_bruto .= "<div id='div_carregar_memes_emoticons' onclick='carregar_memes_emoticons_div();'>";
$codigo_html_bruto .= $imagem_emoticon;
$codigo_html_bruto .= "&nbsp;";
$codigo_html_bruto .= "-";
$codigo_html_bruto .= "&nbsp;";
$codigo_html_bruto .= "Emoticons";
$codigo_html_bruto .= "</div>";
$codigo_html_bruto .= "<div id='div_exibe_memes_emoticons'></div>";
$codigo_html_bruto .= $campo_carregar_mais;

// ----------------------------------------------------------


// adiciona div especial ------------------------------

$codigo_html_bruto = div_especial_basica_campos($codigo_html_bruto); // adiciona div especial

// ----------------------------------------------------------


// retorno ------------------------------------------------

return $codigo_html_bruto; // retorno

// ----------------------------------------------------------


};

// -------------------------------------------------------


?>