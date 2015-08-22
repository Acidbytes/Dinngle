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


// dados de formulario -------------------------------------------------

$tamanho_arquivo = $_FILES['musica']['size']; // tamanho arquivo

// ---------------------------------------------------------------------


// pasta de upload -----------------------------------------------------

$pasta_upload_excluir = retorne_pasta_upload_musicas_usuario(); // pasta de upload

// ---------------------------------------------------------------------------


// id de usuario logado ------------------------------------------------

$idusuario_logado = retorne_idusuario_logado(); // id de usuario logado

// ---------------------------------------------------------------------------


// verifica se pode continuar -----------------------------------------

if($idusuario_logado == null or $pasta_upload_excluir == null){


// chama index de usuario --------------------------------------------

pagina_index_usuario(); // chama index de usuario

// ----------------------------------------------------------------------------


// saindo do script -------------------------------------------------------

die; // saindo do script

// -----------------------------------------------------------------------------


};

// ---------------------------------------------------------------------------


// excluindo arquivos antigos ----------------------------------------

if($tamanho_arquivo > 0){
	
excluir_pastas_subpastas($pasta_upload_excluir); // exclui arquivos antigos

};

// ---------------------------------------------------------------------------


// pasta de upload -----------------------------------------------------

$pasta_upload = retorne_pasta_upload_musicas_usuario(); // pasta de upload

// ---------------------------------------------------------------------------


// upload de musica nova ---------------------------------------------

upload_musica_perfil($pasta_upload); // upload de musica nova

// ---------------------------------------------------------------------------


// desconecta do mysql -------------------------------------------------

desconecta_mysql(); // desconecta do mysql

// -----------------------------------------------------------------------------


// endereco url de pagina ----------------------------------------------

$endereco_url = $url_pagina_inicial_site."?idusuario=$idusuario_logado&tipo_pagina=6"; // endereco url de pagina

// -----------------------------------------------------------------------------


// chama pagina ----------------------------------------------------------

chama_pagina_por_endereco($endereco_url); // chama pagina

// ----------------------------------------------------------------------------


?>