<?php


// monta a pagina de documentacao ------------

function monta_pagina_documentacao(){


// valida super usuario ------------------------------

if(retorne_super_usuario() == false){

return null; // retorno nulo

};

// ---------------------------------------------------------


// codigo html bruto ----------------------------------

$codigo_html_bruto .= campo_publicar_ajuda(); // codigo html bruto
$codigo_html_bruto .= campo_pesquisa_ajuda(); // codigo html bruto
$codigo_html_bruto .= constroe_topicos_ajuda(2); // codigo html bruto

// ---------------------------------------------------------


// retorno -----------------------------------------------

return $codigo_html_bruto; // retorno

// ---------------------------------------------------------


};

// --------------------------------------------------------


?>