<?php


// gera link com hashtag ---------------------------

function gera_link_hashtag($conteudo_post){


// criando hastag -------------------------------------

$conteudo_post = preg_replace("/(?<!\S)#([0-9a-zA-Z]+)/", "<a href='index.php?tipo_pagina=10&tipo_pesquisa_geral=9&pesquisa_generica=$1'>#$1</a>", $conteudo_post); // criando hastag

// ---------------------------------------------------------


// retorno de conteudo ------------------------------

return $conteudo_post; // retorno de conteudo

// ---------------------------------------------------------


};

// --------------------------------------------------------


?>