<?php


// constroe anuncio em pagina -------------------

function constroe_anuncio_pagina($numero_anuncio){


// globals -----------------------------------------------

global $codigo_anuncio; // codigos de anuncios

// ----------------------------------------------------------


// codigo padrao --------------------------------------

if($numero_anuncio == null){

$numero_anuncio = 0; // codigo padrao

};

// ----------------------------------------------------------


// codigo html bruto ---------------------------------

$codigo_html_bruto .= $codigo_anuncio[$numero_anuncio];

// --------------------------------------------------------


// retorno ----------------------------------------------

return $codigo_html_bruto; // retorno

// --------------------------------------------------------


};

// --------------------------------------------------------


?>