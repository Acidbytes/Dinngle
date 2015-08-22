<?php


// converte o codigo em emoticon ---------------

function converte_codigo_emoticon($conteudo_post){


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

$imagem_emoticon = "<img src='$url_imagem' title='s($contador)' class='imagem_emoticon_meme_uso'>"; // imagem emoticon

// -----------------------------------------------------------


// substituio codigo de imagem por emoticon ----

$conteudo_post = str_replace("s($contador)", $imagem_emoticon, $conteudo_post); // substituindo...

// -----------------------------------------------------------


};

// ---------------------------------------------------------


// retorno -----------------------------------------------

return $conteudo_post; // retorno

// ---------------------------------------------------------


};

// --------------------------------------------------------


?>