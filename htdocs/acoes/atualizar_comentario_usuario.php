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

$idusuario = $_POST['idusuario']; // id de usuario

// -------------------------------------------------------


// dados de formulario ----------------------------

$numero_pagina = retorne_numero_pagina_resultado(); // numero da pagina atual

// ------------------------------------------------------


// atualiza comentario ----------------------------

atualizar_comentario(); // atualiza comentario

// ------------------------------------------------------


// desconecta do mysql --------------------------

desconecta_mysql(); // desconecta do mysql

// ------------------------------------------------------


// endereco url de pagina -----------------------

$endereco_url = $url_pagina_inicial_site."?idusuario=$idusuario&tipo_pagina=$tipo_pagina&numero_pagina=$numero_pagina"; // endereco url de pagina

// -----------------------------------------------------


// chama pagina ----------------------------------

chama_pagina_por_endereco($endereco_url); // chama pagina

// -----------------------------------------------------


?>