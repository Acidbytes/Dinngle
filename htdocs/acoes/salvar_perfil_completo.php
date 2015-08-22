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


// dados formulario ----------------------------------------------------

$dados[0] = remove_html($_POST['ensino_medio']); // dados de formulario
$dados[1] = remove_html($_POST['ensino_medio_ano']); // dados de formulario
$dados[2] = remove_html($_POST['faculdade']); // dados de formulario
$dados[3] = remove_html($_POST['faculdade_ano']); // dados de formulario
$dados[4] = remove_html($_POST['habilidade_profissional']); // dados de formulario
$dados[5] = remove_html($_POST['trabalha_onde']); // dados de formulario
$dados[6] = remove_html($_POST['trabalha_onde_ano']); // dados de formulario
$dados[7] = remove_html($_POST['interesse_sexual']); // dados de formulario
$dados[8] = remove_html($_POST['endereco']); // dados de formulario
$dados[9] = remove_html($_POST['religiao']); // dados de formulario
$dados[10] = remove_html($_POST['politica']); // dados de formulario
$dados[11] = remove_html($_POST['apelido']); // dados de formulario
$dados[12] = remove_html($_POST['citacao']); // dados de formulario
$dados[13] = remove_html($_POST['odeia']); // dados de formulario
$dados[14] = remove_html($_POST['cidade_natal']); // dados de formulario
$dados[15] = remove_html($_POST['livros']); // dados de formulario
$dados[16] = remove_html($_POST['cinema']); // dados de formulario
$dados[17] = remove_html($_POST['tv']); // dados de formulario
$dados[18] = remove_html($_POST['atividades']); // dados de formulario
$dados[19] = remove_html($_POST['jogos']); // dados de formulario

// ---------------------------------------------------------------------------


// id de usuario logado --------------------------------------------------

$idusuario_logado = retorne_idusuario_logado(); // id de usuario logado

// ----------------------------------------------------------------------------


// query ----------------------------------------------------------------------

$query[] = "delete from $tabela_banco[30] where idusuario='$idusuario_logado';"; // query

$query[] = "insert into $tabela_banco[30] values('$idusuario_logado', '$dados[0]', '$dados[1]', '$dados[2]', '$dados[3]', '$dados[4]', '$dados[5]', '$dados[6]', '$dados[7]', '$dados[8]', '$dados[9]', '$dados[10]', '$dados[11]', '$dados[12]', '$dados[13]', '$dados[14]', '$dados[15]', '$dados[16]', '$dados[17]', '$dados[18]', '$dados[19]');"; // query

// -----------------------------------------------------------------------------


// comando ----------------------------------------------------------------

foreach($query as $query_executar){


// executa query ----------------------------------------------------------

if($query_executar != null){

$comando = comando_executa($query_executar); // comando

};

// -----------------------------------------------------------------------------


};

// -----------------------------------------------------------------------------


// desconecta do mysql -------------------------------------------------

desconecta_mysql(); // desconecta do mysql

// -----------------------------------------------------------------------------


// endereco url de pagina ----------------------------------------------

$endereco_url = $url_pagina_inicial_site."?idusuario=$idusuario_logado&tipo_pagina=7&editar_perfil_modo=8"; // endereco url de pagina

// -----------------------------------------------------------------------------


// chama pagina ----------------------------------------------------------

chama_pagina_por_endereco($endereco_url); // chama pagina

// ----------------------------------------------------------------------------


?>