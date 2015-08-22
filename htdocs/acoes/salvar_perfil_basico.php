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

$nome = remove_html($_POST['nome']); // dados de usuario

$estado = remove_html($_POST['estado']); // dados de usuario

$sobre_usuario = remove_html($_POST['sobre_usuario']); // dados de usuario

$sexo = remove_html($_POST['sexo']); // dados de usuario

$estado_civil = remove_html($_POST['estado_civil']); // dados de usuario

$cidade = remove_html($_POST['cidade']); // dados de usuario

$telefone = remove_html($_POST['telefone']); // dados de usuario

$site = remove_html($_POST['site']); // dados de usuario

$tribo_urbana = remove_html($_POST['tribo_urbana']); // dados de usuario

$data_dia = remove_html($_POST['select_dia']); // dados de usuario

$data_mes = remove_html($_POST['select_mes']); // dados de usuario

$data_ano = remove_html($_POST['select_ano']); // dados de usuario

// ---------------------------------------------------------------------------


// data de nascimento --------------------------------------------

$data_nascimento = "$data_ano-$data_mes-$data_dia"; // data de nascimento

// -------------------------------------------------------------------------


// adiciona quebra de linha -------------------------------------

$sobre_usuario = converte_linha_quebra_linha($sobre_usuario, true); // adiciona quebra de linha

// -----------------------------------------------------------------------


// id de usuario logado --------------------------------------------------

$idusuario_logado = retorne_idusuario_logado(); // id de usuario logado

// ----------------------------------------------------------------------------


// query ----------------------------------------------------------------------

$query[] = "delete from $tabela_banco[3] where idusuario='$idusuario_logado';"; // query

$query[] = "insert into $tabela_banco[3] values('$idusuario_logado', '$data_nascimento', '$cidade', '$estado', '$sobre_usuario', '$sexo', '$estado_civil', '$telefone', '$site', '$tribo_urbana');"; // query

// -----------------------------------------------------------------------------


// verifica se nome e valido --------------------------------------------

if($nome != null){

$query[] = "update $tabela_banco[1] set nome='$nome' where idusuario='$idusuario_logado';"; // query

};

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

$endereco_url = $url_pagina_inicial_site."?idusuario=$idusuario_logado&tipo_pagina=7&editar_perfil_modo=1"; // endereco url de pagina

// -----------------------------------------------------------------------------


// chama pagina ----------------------------------------------------------

chama_pagina_por_endereco($endereco_url); // chama pagina

// ----------------------------------------------------------------------------


?>