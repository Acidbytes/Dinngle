<?php


// define a timezone -----------------------------------------------------

date_default_timezone_set('America/Sao_Paulo'); // define a timezone

// -----------------------------------------------------------------------------


// pasta root do servidor ------------------------------------------------

$pasta_root_servidor = $_SERVER['DOCUMENT_ROOT']; // pasta root do servidor

$url_do_servidor = "http://".$_SERVER['SERVER_NAME']; // url do servidor

// ----------------------------------------------------------------------------


// dados de conexao ----------------------------------------------------

include("dados_conexao.php"); // dados de conexao

include("banco_dados_tabelas.php"); // banco de dados e tabelas

// ----------------------------------------------------------------------------


// carrega pastas de sistema disponiveis --------------------------

include("todas_pastas.php"); // todas as pastas

// ----------------------------------------------------------------------------


// carrega logotipo ------------------------------------------------------

include("../$pasta_logotipo/logotipo.php"); // carrega logotipo

// ----------------------------------------------------------------------------


// enderecos de todos os arquivos do site ------------------------

include("enderecos_arquivos_site.php"); // enderecos de todos os arquivos do site

// ----------------------------------------------------------------------------


// enderecos urls de arquivos de site ------------------------------

include("enderecos_url_arquivos_site.php"); // enderecos urls de arquivos de site

// ----------------------------------------------------------------------------


// urls uteis do site ------------------------------------------------------

include("dados_urls_site.php"); // urls uteis do site

// ----------------------------------------------------------------------------


// variaveis de sistema -------------------------------------------------

include("variaveis_sistema.php"); // variaveis de sistema

include("variaveis_chat.php"); // variaveis de chat

// ----------------------------------------------------------------------------


// dados de cookies -----------------------------------------------------

include("dados_de_cookies.php"); // dados de cookies

// ----------------------------------------------------------------------------


// imagens do servidor -------------------------------------------------

include("imagens_servidor.php"); // imagens do servidor

// ----------------------------------------------------------------------------


// enderecos de arquivos uteis ---------------------------------------

include("enderecos_arquivos_php_uteis.php"); // enderecos de arquivos uteis

// ----------------------------------------------------------------------------


// codigos de anuncios -----------------------------------------------

include("codigos_anuncio.php"); // codigos de anuncios

// -----------------------------------------------------------------------------


// oculta erros ------------------------------------------------------------

// include("oculta_erros.php"); // oculta erros

// ----------------------------------------------------------------------------


// dados do super usuario ---------------------------------------------

include("dados_super_usuario.php"); // dados do super usuario

// ----------------------------------------------------------------------------












?>