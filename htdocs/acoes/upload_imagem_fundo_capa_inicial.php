<?php


// abre pasta maniparq ------------------------------------------------

chdir("../maniparq"); // abre pasta maniparq

// ---------------------------------------------------------------------------


// carrega bibliotecas --------------------------------------------------

include("bibliotecas_php.php"); // carrega bibliotecas

// ---------------------------------------------------------------------------


// carrega dados de servidor ----------------------------------------

include("../servidor/dados_servidor.php"); // carrega dados de servidor

// ---------------------------------------------------------------------------


// conecta ao mysql ----------------------------------------------------

conecta_mysql(true); // conecta ao mysql

// ---------------------------------------------------------------------------


// endereco de pasta de upload de imagens ---------------------

$pasta_upload = retorne_pasta_capa_inicial(); // endereco de pasta de upload de imagens

// ---------------------------------------------------------------------------


// upload de imagem ---------------------------------------------------

if(retorne_super_usuario() == true){

upload_de_imagem_papel_parede_capa_inicial($pasta_upload); // upload de imagem de album

};

// -----------------------------------------------------------------------------


// desconecta do mysql -------------------------------------------------

desconecta_mysql(); // desconecta do mysql

// -----------------------------------------------------------------------------


// endereco url de pagina -----------------------------------------------

$endereco_url = $url_pagina_inicial_site."?tipo_pagina=7&editar_perfil_modo=0&numero_controle=1"; // endereco url de pagina

// -----------------------------------------------------------------------------


// chama pagina ----------------------------------------------------------

chama_pagina_por_endereco($endereco_url); // chama pagina

// -----------------------------------------------------------------------------


?>