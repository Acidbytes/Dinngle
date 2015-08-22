<?php


// monta paginas de paginacao de resultados ---

function monta_paginas_paginacao_ajuda($numero_resultados){


// globals -------------------------------------------------

global $limite_resultados_pagina_ajuda; // limite de resultados por pagina

global $imagem_servidor; // imagens de servidor

global $url_pagina_inicial_ajuda; // url de pagina inicial

// -----------------------------------------------------------


// numero da pagina atual ----------------------------

$numero_pagina_atual = retorne_numero_pagina_resultado(); // numero da pagina atual

$numero_pagina_atual /= $limite_resultados_pagina_ajuda; // calcula pagina atual real

$numero_pagina_atual = round($numero_pagina_atual); // arredonda

// -----------------------------------------------------------


// valida numero de pagina atual -------------------

if($numero_pagina_atual == null){

$numero_pagina_atual = 0; // valor padrao

};

// -----------------------------------------------------------


// calcula numero de paginas -----------------------

$numero_paginas = round($numero_resultados / $limite_resultados_pagina_ajuda) + 1; // calcula numero de paginas

$numero_paginas_real = round($numero_resultados / $limite_resultados_pagina_ajuda); // numero de paginas real

// -----------------------------------------------------------


// calculando porcentagem ---------------------------

@$porcentagem = ($numero_pagina_atual / $numero_paginas_real) * 100; // calculando porcentagem

$porcentagem = round($porcentagem); // arredonda

// -----------------------------------------------------------


// campo de porcentagem ----------------------------

if($porcentagem > 0 and $porcentagem <= 100){

$campo_porcentagem .= "<div class='progress' id='barra_progresso_paginacao'>"; // campo de porcentagem
$campo_porcentagem .= " <div class='progress-bar' role='progressbar' aria-valuenow='$porcentagem' aria-valuemin='0' aria-valuemax='100' style='width: $porcentagem%;'>"; // campo de porcentagem
$campo_porcentagem .= "$porcentagem%"; // campo de porcentagem
$campo_porcentagem .= "</div>"; // campo de porcentagem
$campo_porcentagem .= "</div>"; // campo de porcentagem

};

// -----------------------------------------------------------


// calcula pagina anterior e proxima ---------------

$numero_pagina_anterior = ($numero_pagina_atual - 1) * $limite_resultados_pagina_ajuda; // numero de pagina anterior

$numero_pagina_proxima = ($numero_pagina_atual + 1) * $limite_resultados_pagina_ajuda; // numero de proxima pagina

// -----------------------------------------------------------


// retorna o termo de pesquisa ----------------------

$pesquisa_generica = retorne_termo_pesquisa(); // retorna o termo de pesquisa

// ------------------------------------------------------------


// url padrao de index ---------------------------------

$url_padrao_index = $url_pagina_inicial_ajuda."?pesquisa_generica=$pesquisa_generica"; // url padrao de index

// -----------------------------------------------------------


// url voltar e avancar ----------------------------------

$url_voltar = $url_padrao_index."&numero_pagina=$numero_pagina_anterior"; // url voltar

$url_avancar = $url_padrao_index."&numero_pagina=$numero_pagina_proxima"; // url avancar

// -----------------------------------------------------------


// imagem voltar ----------------------------------------

if($numero_pagina_atual > 0){

$imagem_voltar = $imagem_servidor['voltar']; // imagem voltar
$imagem_voltar = "<img src='$imagem_voltar' title='Voltar' alt='Voltar'>"; // imagem voltar
$imagem_voltar = "<a href='$url_voltar'>$imagem_voltar</a>"; // imagem voltar

};

// -----------------------------------------------------------


// imagem avancar -------------------------------------

if($numero_paginas_real > $numero_pagina_atual){

$imagem_avancar = $imagem_servidor['avancar']; // imagem avancar
$imagem_avancar = "<img src='$imagem_avancar' title='Avançar' alt='Avançar'>"; // imagem avancar
$imagem_avancar = "<a href='$url_avancar'>$imagem_avancar</a>"; // imagem avancar

};

// -----------------------------------------------------------


// codigo html bruto ------------------------------------

$codigo_html_bruto .= "<div class='campo_paginacao_paginas_resultados'>"; // codigo html bruto
$codigo_html_bruto .= $imagem_voltar; // codigo html bruto
$codigo_html_bruto .= $imagem_avancar; // codigo html bruto
$codigo_html_bruto .= $campo_porcentagem; // codigo html bruto
$codigo_html_bruto .= "</div>"; // codigo html bruto

// -----------------------------------------------------------


// retorno -------------------------------------------------

return $codigo_html_bruto; // retorno

// -----------------------------------------------------------


};

// ----------------------------------------------------------


?>