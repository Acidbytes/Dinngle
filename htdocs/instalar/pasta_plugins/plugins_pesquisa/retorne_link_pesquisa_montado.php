<?php


// retorna o link de pesquisa montado ----------

function retorne_link_pesquisa_montado($termo_pesquisa, $tipo_pesquisa_geral){


// url de pesquisa ------------------------------------

$url_pesquisa = retorne_url_pesquisa_geral($termo_pesquisa, $tipo_pesquisa_geral); // url de pesquisa

// ---------------------------------------------------------


// url de pesquisa completa ------------------------

$url_pesquisa = "<a href='$url_pesquisa'>$termo_pesquisa</a>"; // url de pesquisa completa

// ----------------------------------------------------------


// retorno ------------------------------------------------

return $url_pesquisa; // retorno

// ----------------------------------------------------------


};

// --------------------------------------------------------


?>