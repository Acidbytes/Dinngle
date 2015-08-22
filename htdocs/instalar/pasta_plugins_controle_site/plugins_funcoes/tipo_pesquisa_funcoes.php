<?php


// tipo de pesquisa por funcoes -------------------

function tipo_pesquisa_funcoes(){


// tipo de pesquisa ------------------------------------

$tipo_pesquisa = remove_html($_GET['tipo_pesquisa_funcoes']); // tipo de pesquisa

// -----------------------------------------------------------


// tipo de pesquisa -----------------------------------

if($tipo_pesquisa == null){

$tipo_pesquisa = 1; // tipo de pesquisa

};

// -----------------------------------------------------------


// tipo de pesquisa por funcoes ------------------

return $tipo_pesquisa; // tipo de pesquisa por funcoes

// -----------------------------------------------------------


};

// --------------------------------------------------------


?>