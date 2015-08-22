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


// conecta ao mysql -------------------------------

conecta_mysql(true); // conecta ao mysql

// ------------------------------------------------------


// id de usuario logado ---------------------------

$idusuario_logado = retorne_idusuario_logado(); // id de usuario logado

// ------------------------------------------------------


// compartilhar conteudo -------------------------

compartilhar_conteudo(); // compartilhar conteudo

// -------------------------------------------------------


// desconecta do mysql --------------------------

desconecta_mysql(); // desconecta do mysql

// ------------------------------------------------------


// endereco url de pagina -----------------------

$endereco_url = $url_pagina_inicial_site."?idusuario=$idusuario_logado&tipo_pagina=14"; // endereco url de pagina

// ------------------------------------------------------


// chama pagina -----------------------------------

chama_pagina_por_endereco($endereco_url); // chama pagina

// ------------------------------------------------------


?>