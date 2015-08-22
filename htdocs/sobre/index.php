<?php


// abre pasta maniparq -----------------------------

chdir("../maniparq"); // abre pasta maniparq

// --------------------------------------------------------


// carrega bibliotecas ------------------------------

include("bibliotecas_php.php"); // carrega bibliotecas

// -------------------------------------------------------


// carrega dados de servidor ---------------------

include("../servidor/dados_servidor.php"); // carrega dados de servidor

// -------------------------------------------------------


// endereco url de pagina -----------------------

$endereco_url = $url_pagina_inicial_ajuda."?topico_id=24"; // endereco url de pagina

// ------------------------------------------------------


// chama pagina -----------------------------------

chama_pagina_por_endereco($endereco_url); // chama pagina

// ------------------------------------------------------


?>