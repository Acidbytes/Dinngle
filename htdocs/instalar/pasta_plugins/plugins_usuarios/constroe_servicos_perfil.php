<?php

// constroe servicos de perfil ---------------------

function constroe_servicos_perfil($idusuario){


// globals
global $url_pagina_inicial_site;


// id de usuario
$idusuario = retorne_idusuario_visualizando_perfil();


// numero de amigos de usuario
$numero_amigos_usuario = retorne_tamanho_resultado(retorne_numero_amizades_solicitacoes(1));


// numero de imagens em albuns
$numero_total_imagens_albuns_usuario = retorne_tamanho_resultado(retorne_numero_total_imagens_albuns_usuario());


// bloco imagens de album --------------------

$bloco_imagens_album .= "<a href='$url_pagina_inicial_site?idusuario=$idusuario&tipo_pagina=5'>"; // bloco imagens de album
$bloco_imagens_album .= retorne_ultima_imagem_album(); // bloco imagens de album
$bloco_imagens_album .= "</a>"; // bloco imagens de album


// adiciona div especial
$bloco_imagens_album = constroe_div_especial_geral("<a href='$url_pagina_inicial_site?idusuario=$idusuario&tipo_pagina=5' title='Fotos'>Fotos - $numero_total_imagens_albuns_usuario</a>", $bloco_imagens_album, null);

// --------------------------------------------------------


// bloco de amizades -----------------------------

$bloco_amizades = constroe_div_especial_geral("<a href='$url_pagina_inicial_site?idusuario=$idusuario&tipo_pagina=4' title='Amigos'>Amigos - $numero_amigos_usuario</a>", constroe_bloco_amizades(), null);

// -------------------------------------------------------


// codigo html bruto -----------------------------

$codigo_html_bruto .= $bloco_amizades;
$codigo_html_bruto .= $bloco_imagens_album;

// -------------------------------------------------------


// retorno ---------------------------------------------

return $codigo_html_bruto; // retorno

// -------------------------------------------------------


};

// -------------------------------------------------------

?>