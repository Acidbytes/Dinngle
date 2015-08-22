<?php


// retorna o modo de pesquisa geral ------------

function retorna_modo_pesquisa_geral(){


// tipo de pesquisa -----------------------------------

$tipo_pesquisa_geral = remove_html($_GET['tipo_pesquisa_geral']); // tipo de pesquisa

// ---------------------------------------------------------


// tipo de pesquisa padrao -------------------------

if($tipo_pesquisa_geral == null){

$tipo_pesquisa_geral = 1; // tipo de pesquisa padrao

};

// --------------------------------------------------------


// retorna o tipo de pesquisa ----------------------

return $tipo_pesquisa_geral; // retorna o tipo de pesquisa

// --------------------------------------------------------


};

// --------------------------------------------------------


?>