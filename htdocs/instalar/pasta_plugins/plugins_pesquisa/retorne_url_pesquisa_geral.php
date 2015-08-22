<?php


// retorna url de pesquisa geral -------------------

function retorne_url_pesquisa_geral($termo_pesquisa, $tipo_pesquisa_geral){


// globals -----------------------------------------------

global $url_pagina_inicial_site; // url de pagina inicial

// ---------------------------------------------------------


// url de retorno ---------------------------------------

$url_retorno = $url_pagina_inicial_site."?tipo_pagina=10&pesquisa_generica=$termo_pesquisa&tipo_pesquisa_geral=$tipo_pesquisa_geral"; // url de retorno

// ---------------------------------------------------------


// retorno -----------------------------------------------

return $url_retorno; // retorno

// ---------------------------------------------------------


};

// --------------------------------------------------------


?>