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

$pasta_upload = retorne_pasta_upload_imagem_fundo(); // endereco de pasta de upload de imagens

// ---------------------------------------------------------------------------


// id de usuario logado ------------------------------------------------

$idusuario_logado = retorne_idusuario_logado(); // id de usuario logado

// ---------------------------------------------------------------------------


// upload de imagem de album --------------------------------------

if($idusuario_logado != null){


// exclui pasta, e subpastas ----------------------------

excluir_pastas_subpastas($pasta_upload); // remove arquivos antigos

// -------------------------------------------------------------


// recria pasta novamente ------------------------------

$pasta_upload = retorne_pasta_upload_imagem_fundo(); // endereco de pasta de upload de imagens

// -------------------------------------------------------------


// upload de imagem ------------------------------------

upload_de_imagem_papel_parede($pasta_upload); // upload de imagem de album

// -------------------------------------------------------------


};

// ---------------------------------------------------------------------------


// desconecta do mysql -------------------------------------------------

desconecta_mysql(); // desconecta do mysql

// -----------------------------------------------------------------------------


// endereco url de pagina ----------------------------------------------

$endereco_url = $url_pagina_inicial_site."?idusuario=$idusuario_logado&tipo_pagina=7&editar_perfil_modo=4"; // endereco url de pagina

// -----------------------------------------------------------------------------


// chama pagina ----------------------------------------------------------

chama_pagina_por_endereco($endereco_url); // chama pagina

// ----------------------------------------------------------------------------


?>