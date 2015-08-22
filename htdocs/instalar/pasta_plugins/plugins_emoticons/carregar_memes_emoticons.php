<?php


// carrega memes e emoticons -------------------

function carregar_memes_emoticons(){


// globals -----------------------------------------------

global $url_pasta_imagens_emoticons; // url de pasta com imagens

global $numero_emoticons_atual; // numero de emoticons

// ---------------------------------------------------------


// contador ---------------------------------------------

$contador = 1; // contador

// ---------------------------------------------------------


// convertendo codigos em emoticons -----------

for($contador == $contador; $contador <= $numero_emoticons_atual; $contador++){


// url de imagem ---------------------------------------

$url_imagem = $url_pasta_imagens_emoticons."s ($contador).png"; // url de imagem

// -----------------------------------------------------------


// cria a imagem ----------------------------------------

$imagem_emoticon = "<img src='$url_imagem' title='s($contador)' class='imagem_emoticon_meme'>"; // imagem emoticon

// -----------------------------------------------------------


// adiciona meme e emoticon -----------------------

$codigo_html_bruto .= "<div class='div_classe_emoticon_meme' onclick='adicionar_emoticon_meme_campo_entrada($contador);'>"; // adiciona meme e emoticon
$codigo_html_bruto .= $imagem_emoticon; // adiciona meme e emoticon
$codigo_html_bruto .= "<br>"; // adiciona meme e emoticon
$codigo_html_bruto .= "s($contador)"; // adiciona meme e emoticon
$codigo_html_bruto .= "</div>"; // adiciona meme e emoticon

// -----------------------------------------------------------


};

// ---------------------------------------------------------


// retorno -----------------------------------------------

return $codigo_html_bruto; // retorno

// ---------------------------------------------------------


};

// --------------------------------------------------------


?>