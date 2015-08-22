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


// dados de formulario ----------------------------

$numero_pagina = remove_html($_POST['numero_pagina']); // numero da pagina atual

// ------------------------------------------------------


// id de usuario logado ---------------------------

$idusuario_logado = retorne_idusuario_logado(); // id de usuario logado

// ------------------------------------------------------


// comandos ----------------------------------------

echo carrega_amigos_chat(); // carrega os amigos do chat

// -------------------------------------------------------


// desconecta do mysql --------------------------

desconecta_mysql(); // desconecta do mysql

// ------------------------------------------------------


?>