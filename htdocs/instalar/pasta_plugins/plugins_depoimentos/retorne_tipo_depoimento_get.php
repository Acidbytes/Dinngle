<?php


// retorna o tipo de depoimento ------------------

function retorne_tipo_depoimento_get(){


// tipo de depoimento ------------------------------

$tipo_depoimento = $_GET['tipo_depoimento']; // tipo de depoimento

// --------------------------------------------------------


// verifica se tipo de pagina e valida ------------

if($tipo_depoimento == null){

$tipo_depoimento = 1; // tipo de pagina

};

// -------------------------------------------------------


// retorna o tipo de pagina ------------------------

return $tipo_depoimento; // retorna o tipo de pagina

// -------------------------------------------------------


};

// --------------------------------------------------------


?>