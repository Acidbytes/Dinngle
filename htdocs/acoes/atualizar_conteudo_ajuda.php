<?php


// abre pasta maniparq -----------------------------

chdir("../maniparq"); // abre pasta maniparq

// --------------------------------------------------------


// carrega bibliotecas ------------------------------

include("bibliotecas_php.php"); // carrega bibliotecas

include("plugins_ajuda.php"); // carrega bibliotecas

// -------------------------------------------------------


// carrega dados de servidor ---------------------

include("../servidor/dados_servidor.php"); // carrega dados de servidor

// -------------------------------------------------------


// conecta ao mysql -------------------------------

conecta_mysql(true); // conecta ao mysql

// ------------------------------------------------------


// id de topico ---------------------------------------

$topico_id = topico_pagina_ajuda_get(); // id de topico

// ------------------------------------------------------


// atualizar conteudo de ajuda ------------------

atualizar_conteudo_ajuda(); // atualizar conteudo de ajuda

// -------------------------------------------------------


// desconecta do mysql --------------------------

desconecta_mysql(); // desconecta do mysql

// ------------------------------------------------------


// endereco url de pagina -----------------------

$endereco_url = $url_pagina_inicial_ajuda."?topico_id=$topico_id"; // endereco url de pagina

// ------------------------------------------------------


// chama pagina -----------------------------------

chama_pagina_por_endereco($endereco_url); // chama pagina

// ------------------------------------------------------


?>