<?php


// constroe campo iniciar notificacoes ----------

function constroe_campo_iniciar_notificacoes(){


// global ------------------------------------------------

global $imagem_servidor; // imagem de servidor

global $url_pagina_inicial_site; // url pagina inicial de site

// --------------------------------------------------------


// imagens --------------------------------------------

$imagem[0] = "<img src='".$imagem_servidor['notificacoes']."' title='Notificações'>";
$imagem[1] = "<img src='".$imagem_servidor['notifica_amigo_add']."' title='Solicitações de amizade'>";

// --------------------------------------------------------


// numero de notificacoes -------------------------

$numero_notificacoes[0] = retorne_numero_notificacoes(null); // numero de notificacoes
$numero_notificacoes[1] = retorne_numero_notificacoes(5); // numero de notificacoes

// --------------------------------------------------------


// url para abrir notificacoes ----------------------

$url_notificacao[0] = "$url_pagina_inicial_site?tipo_pagina=13"; // url para abrir notificacoes
$url_notificacao[1] = "$url_pagina_inicial_site?tipo_pagina=13&tipo_notifica=8"; // url para abrir notificacoes

// --------------------------------------------------------


// codigo html bruto ---------------------------------

$codigo_html_bruto .= "<div class='classe_div_campo_iniciar_notificacoes'>";
$codigo_html_bruto .= "<div class='div_separa_notificacao'>";
$codigo_html_bruto .= "<a href='$url_notificacao[0]' title='Notificações'>";
$codigo_html_bruto .= $imagem[0];
$codigo_html_bruto .= "</a>";
$codigo_html_bruto .= "&nbsp;";
$codigo_html_bruto .= "<span id='span_numero_notificacoes_usuario' class='label label-danger'>";
$codigo_html_bruto .= $numero_notificacoes[0];
$codigo_html_bruto .= "</span>";
$codigo_html_bruto .= "</div>";
$codigo_html_bruto .= "<div class='div_separa_notificacao'>";
$codigo_html_bruto .= "<a href='$url_notificacao[1]' title='Solicitações de amizade'>";
$codigo_html_bruto .= $imagem[1];
$codigo_html_bruto .= "</a>";
$codigo_html_bruto .= "&nbsp;";
$codigo_html_bruto .= "<span id='span_numero_notificacoes_amizade_usuario' class='label label-danger'>";
$codigo_html_bruto .= $numero_notificacoes[1];
$codigo_html_bruto .= "</span>";
$codigo_html_bruto .= "</div>";
$codigo_html_bruto .= "</div>";

// --------------------------------------------------------


// retorno ----------------------------------------------

return $codigo_html_bruto; // retorno

// --------------------------------------------------------


};

// --------------------------------------------------------


?>