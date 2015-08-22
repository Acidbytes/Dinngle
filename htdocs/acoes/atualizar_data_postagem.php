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

$idpost = remove_html($_POST['idpost']); // id do post

$numero_pagina = remove_html($_POST['numero_pagina']); // numero da pagina atual

// ------------------------------------------------------


// data atual ----------------------------------------

$data_atual = data_atual(); // data atual

// ------------------------------------------------------


// id de usuario logado ---------------------------

$idusuario_logado = retorne_idusuario_logado(); // id de usuario logado

// ------------------------------------------------------


// query ----------------------------------------------

$query = "update $tabela_banco[9] set data_publicacao='$data_atual' where idusuario='$idusuario_logado' and id='$idpost';"; // query para atualizar

// ------------------------------------------------------


// executa comando ------------------------------

comando_executa($query); // executa comando

// ------------------------------------------------------


// desconecta do mysql --------------------------

desconecta_mysql(); // desconecta do mysql

// ------------------------------------------------------


// endereco url de pagina ----------------------------------------------

$endereco_url = $url_pagina_inicial_site."?idusuario=$idusuario_logado&tipo_pagina=16&post_id=$idpost"; // endereco url de pagina

// -----------------------------------------------------------------------------


// chama pagina ----------------------------------------------------------

chama_pagina_por_endereco($endereco_url); // chama pagina

// ----------------------------------------------------------------------------


?>