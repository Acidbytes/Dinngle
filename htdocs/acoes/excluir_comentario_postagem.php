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


// tipo de pagina ------------------------------------

$tipo_pagina = $_POST['tipo_pagina']; // tipo de pagina

// -------------------------------------------------------


// remove comentario ----------------------------

remove_comentario(); // remove comentario

// ------------------------------------------------------


// desconecta do mysql --------------------------

desconecta_mysql(); // desconecta do mysql

// ------------------------------------------------------


// chama pagina especifica ---------------------

chamar_pagina_especifica($tipo_pagina); // chama pagina especifica

// ------------------------------------------------------


?>