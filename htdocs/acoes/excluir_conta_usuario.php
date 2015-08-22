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


// exclui conta usuario ----------------------------

exclui_conta_usuario(); // exclui a conta do usuario

// ------------------------------------------------------


// desconecta do mysql --------------------------

desconecta_mysql(); // desconecta do mysql

// ------------------------------------------------------


// endereco url de pagina -----------------------

$endereco_url = $url_pagina_inicial_site."?tipo_pagina=7&editar_perfil_modo=7"; // endereco url de pagina

// ------------------------------------------------------


// chama pagina -----------------------------------

chama_pagina_por_endereco($endereco_url); // chama pagina

// ------------------------------------------------------


?>