<?php


// retorne tamanho de resultado -------------------

function retorne_tamanho_resultado($numero_resultados){


// tamanhos disponiveis -----------------------------

$tamanho_mil = 1000; // tamanho

$tamanho_milhao = 1000000; // tamanho

$tamanho_bilhao = 1000000000; // tamanho

// ----------------------------------------------------------


// em caso de nulo entao zerar --------------------

if($numero_resultados == null){

$numero_resultados = 0; // zera

};

// ----------------------------------------------------------


// retorno ------------------------------------------------

$retorno = $numero_resultados; // retorno

// ----------------------------------------------------------


// calculando -------------------------------------------

if($numero_resultados >= $tamanho_mil){

$retorno = round($numero_resultados / $tamanho_mil, 2)."k"; // retorno

};

// ---------------------------------------------------------


// calculando -------------------------------------------

if($numero_resultados >= $tamanho_milhao){

$retorno = round($numero_resultados / $tamanho_milhao, 2)."mi"; // retorno

};

// ---------------------------------------------------------


// calculando -------------------------------------------

if($numero_resultados >= $tamanho_bilhao){

$retorno = round($numero_resultados / $tamanho_bilhao, 2)."bi"; // retorno

};

// ---------------------------------------------------------


// retorno ------------------------------------------------

return $retorno; // retorno

// ---------------------------------------------------------


};

// --------------------------------------------------------


?>