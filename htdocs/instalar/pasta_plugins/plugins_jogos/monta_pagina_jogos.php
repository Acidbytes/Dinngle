<?php


// monta a pagina de jogos ----------------------

function monta_pagina_jogos(){


// codigo html bruto --------------------------------

$codigo_html_bruto = carrega_jogos();

// --------------------------------------------------------


// adiciona div especial ----------------------------------

$codigo_html_bruto = div_especial_basica_campos($codigo_html_bruto); // adiciona div especial

// --------------------------------------------------------


// retorno ---------------------------------------------

return $codigo_html_bruto; // retorno

// --------------------------------------------------------


};

// --------------------------------------------------------


?>