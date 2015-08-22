<?php


// campo gerenciar depoimentos ----------------

function campo_gerenciar_depoimentos(){


// globals -----------------------------------------------

global $url_pagina_inicial_site; // url de pagina inicial

// ---------------------------------------------------------


// usuario dono do perfil ----------------------------

$usuario_dono_perfil = retorna_usuario_vendo_perfil_dono(); // usuario dono do perfil

// ---------------------------------------------------------


// gerencia somente se for o dono do perfil ----

if($usuario_dono_perfil != true){

return null; // retorno nulo

};

// ---------------------------------------------------------


// tipo de pagina --------------------------------------

$tipo_pagina = retorne_tipo_pagina(); // tipo de pagina

// ---------------------------------------------------------


// verifica o tipo de pagina --------------------------

if($tipo_pagina != 11){

return null; // retorno nulo

};

// ---------------------------------------------------------


// numero de depoimentos -------------------------

$numero_depoimentos[0] = retorne_numero_depoimentos(1); // numero de depoimentos
$numero_depoimentos[1] = retorne_numero_depoimentos(2); // numero de depoimentos
$numero_depoimentos[2] = retorne_numero_depoimentos(3); // numero de depoimentos
$numero_depoimentos[3] = retorne_numero_depoimentos(4); // numero de depoimentos

// ---------------------------------------------------------


// links --------------------------------------------------

$links[0] = "<a href='$url_pagina_inicial_site?tipo_pagina=11&tipo_depoimento=1'>Recebi - aceitos ($numero_depoimentos[0])</a>"; // links
$links[1] = "<a href='$url_pagina_inicial_site?tipo_pagina=11&tipo_depoimento=2'>Escrevi - aceitos ($numero_depoimentos[1])</a>"; // links
$links[2] = "<a href='$url_pagina_inicial_site?tipo_pagina=11&tipo_depoimento=3'>Eu recebi - cancelar/aceitar ($numero_depoimentos[2])</a>"; // links
$links[3] = "<a href='$url_pagina_inicial_site?tipo_pagina=11&tipo_depoimento=4'>Eu enviei - cancelar/administrar ($numero_depoimentos[3])</a>"; // links

// ---------------------------------------------------------


// codigo html bruto ----------------------------------

$codigo_html_bruto .= $links[0];
$codigo_html_bruto .= "<br>";
$codigo_html_bruto .= $links[1];
$codigo_html_bruto .= "<br>";
$codigo_html_bruto .= "<br>";
$codigo_html_bruto .= $links[2];
$codigo_html_bruto .= "<br>";
$codigo_html_bruto .= $links[3];
$codigo_html_bruto .= "<br>";

// ---------------------------------------------------------


// retorno -----------------------------------------------

return $codigo_html_bruto; // retorno

// ---------------------------------------------------------


};

// --------------------------------------------------------


?>