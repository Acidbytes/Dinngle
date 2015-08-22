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


// verifica tamanho de imagem -------------------------------------

$tamanho_arquivo_imagem = $_FILES['foto']['size']; // tamanho do arquivo

// ---------------------------------------------------------------------------


// pasta de upload --------------------------------------------------------

$pasta_upload_excluir = retorne_pasta_upload_imagem(); // pasta de upload

// -----------------------------------------------------------------------------


// id de usuario logado --------------------------------------------------

$idusuario_logado = retorne_idusuario_logado(); // id de usuario logado

// ----------------------------------------------------------------------------


// verifica tamanho de imagem --------------------------------------

if($tamanho_arquivo_imagem == 0 or $pasta_upload_excluir == null or $idusuario_logado == null){


// chama index de usuario --------------------------------------------

pagina_index_usuario(); // chama index de usuario

// ----------------------------------------------------------------------------


// saindo do script -------------------------------------------------------

die; // saindo do script

// -----------------------------------------------------------------------------


};

// -----------------------------------------------------------------------------


// exclui arquivos antigos -----------------------------------------------

excluir_pastas_subpastas($pasta_upload_excluir); // exclui arquivos antigos

// -----------------------------------------------------------------------------


// pasta de upload --------------------------------------------------------

$pasta_upload = retorne_pasta_upload_imagem(); // pasta de upload

// -----------------------------------------------------------------------------


// pasta de perfil de usuario --------------------------------------------

$pasta_imagem_perfil = retorne_pasta_imagem_perfil(); // pasta de perfil de usuario

// ------------------------------------------------------------------------------


// upload de imagem de perfil -----------------------------------------

$url_imagem_perfil = upload_imagem_unica($pasta_upload, $tamanho_imagem_perfil_padrao, $pasta_imagem_perfil, false); // upload de imagem de perfil

// -----------------------------------------------------------------------------


// upload de imagem de perfil miniatura ----------------------------

$completa_destino_pasta = "miniatura/"; // completa o destino da pasta

$pasta_upload_miniatura = $pasta_upload.$completa_destino_pasta; // pasta de upload miniatura

$pasta_imagem_perfil .= $completa_destino_pasta;

criar_pasta($pasta_upload_miniatura); // criando pasta

$url_imagem_perfil_miniatura = upload_imagem_unica($pasta_upload_miniatura, $tamanho_imagem_perfil_padrao_miniatura, $pasta_imagem_perfil, false); // upload de imagem de perfil miniatura

// -----------------------------------------------------------------------------


// query ----------------------------------------------------------------------

$query = "select *from $tabela_banco[2] where idusuario='$idusuario_logado';"; // query

// -----------------------------------------------------------------------------


// numero de linhas ------------------------------------------------------

$numero_linhas = retorne_numero_linhas_query($query); // numero de linhas

// -----------------------------------------------------------------------------


// cria nova query --------------------------------------------------------

if($numero_linhas > 0){

$query_salvar[1] = "update $tabela_banco[2] set imagem_perfil='$url_imagem_perfil' where idusuario='$idusuario_logado';"; // query

}else{

$query_salvar[1] = "insert into $tabela_banco[2] values('$idusuario_logado', '$url_imagem_perfil');"; // query

};

// -----------------------------------------------------------------------------


// query ----------------------------------------------------------------------

$query = "delete from $tabela_banco[5] where idusuario='$idusuario_logado';"; // query

// -----------------------------------------------------------------------------


// comando ----------------------------------------------------------------

$comando = comando_executa($query); // comando

// -----------------------------------------------------------------------------


// query imagem miniatura ---------------------------------------------

$query_salvar[2] = "insert into $tabela_banco[5] values('$idusuario_logado', '$url_imagem_perfil_miniatura');"; // query

// -----------------------------------------------------------------------------


// comando ----------------------------------------------------------------

$comando = comando_executa($query_salvar[1]); // comando

$comando = comando_executa($query_salvar[2]); // comando

// -----------------------------------------------------------------------------


// desconecta do mysql -------------------------------------------------

desconecta_mysql(); // desconecta do mysql

// -----------------------------------------------------------------------------


// chama index de usuario --------------------------------------------

pagina_index_usuario(); // chama index de usuario

// ----------------------------------------------------------------------------


?>