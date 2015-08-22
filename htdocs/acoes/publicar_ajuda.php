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


// dados de formulario ----------------------------

$topico_id = topico_pagina_ajuda_get(); // id de topico

$publicar_tipo = remove_html($_POST['publicar_tipo']); // tipo de publicacao

// -------------------------------------------------------


// conecta ao mysql -------------------------------

conecta_mysql(true); // conecta ao mysql

// ------------------------------------------------------


// publicar ajuda -----------------------------------

publicar_ajuda(); // publicar ajuda

// ------------------------------------------------------


// desconecta do mysql --------------------------

desconecta_mysql(); // desconecta do mysql

// ------------------------------------------------------


// endereco url de pagina -----------------------

if($publicar_tipo == true){

$endereco_url = $url_pagina_inicial_ajuda; // endereco url de pagina

}else{

$endereco_url = $url_pagina_inicial_ajuda."?topico_id=$topico_id"; // endereco url de pagina

};

// ------------------------------------------------------


// chama pagina -----------------------------------

chama_pagina_por_endereco($endereco_url); // chama pagina

// ------------------------------------------------------


?>