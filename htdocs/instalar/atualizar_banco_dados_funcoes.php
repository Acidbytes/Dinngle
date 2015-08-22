<?php


// nomes de pastas de funcoes gerais -------------------

$nome_pasta_funcao_geral[] = "../funcoes/"; // nome de pasta de funcao
$nome_pasta_funcao_geral[] = "../pasta_plugins/"; // nome de pasta de funcao
$nome_pasta_funcao_geral[] = "../pasta_plugins_controle_site/"; // nome de pasta de funcao
$nome_pasta_funcao_geral[] = "jquerys/"; // nome de pasta de funcao
$nome_pasta_funcao_geral[] = "jquerys_plugins/"; // nome de pasta de funcao

// ------------------------------------------------------------------


// query ----------------------------------------------------------

$query = "delete from $tabela_banco[28];"; // query

// ------------------------------------------------------------------


// executa query -----------------------------------------------

mysql_query($query); // executa query

// ------------------------------------------------------------------


// carregando funcoes ---------------------------------------

foreach($nome_pasta_funcao_geral as $nome_pasta_func){


// valida nome de pasta de funcao ------------------------

if($nome_pasta_func != null){


// array com arquivos ----------------------------------------

$arquivos = retorna_arquivos_pasta($nome_pasta_func, null); // array com arquivos

// -----------------------------------------------------------------


// listando arquivos ------------------------------------------

foreach($arquivos as $endereco_arquivo){


// valida endereco de arquivo -----------------------------

if($endereco_arquivo != null){


// extencao de arquivo --------------------------------------

$extencao_arquivo = ".".pathinfo($endereco_arquivo, PATHINFO_EXTENSION); // extencao de arquivo

$extencao_arquivo = strtolower($extencao_arquivo); // converte para minusculo

// -----------------------------------------------------------------


// nome de arquivo -------------------------------------------

$nome_arquivo = basename($endereco_arquivo); // nome de arquivo

$nome_arquivo = str_replace("_", " ", $nome_arquivo); // remove underline

$nome_arquivo = str_replace($extencao_arquivo, null, $nome_arquivo); // remove extensao

// -----------------------------------------------------------------


// filtra extensoes ---------------------------------------------

if($extencao_arquivo == ".php" or $extencao_arquivo == ".js"){


// obtendo conteudo ----------------------------------------

$conteudo = file_get_contents($endereco_arquivo); // obtendo conteudo

$conteudo = addslashes($conteudo); // remove aspas

// ----------------------------------------------------------------


// tipo de funcao ----------------------------------------------

switch($extencao_arquivo){


case ".php":
$query = "insert into $tabela_banco[28] values('$nome_arquivo', '1', '$conteudo');"; // query
break;


case ".js":
$query = "insert into $tabela_banco[28] values('$nome_arquivo', '2', '$conteudo');"; // query
break;


};

// -----------------------------------------------------------------


// executa query -----------------------------------------------

mysql_query($query); // executa query

// ------------------------------------------------------------------


};

// -----------------------------------------------------------------


};

// -----------------------------------------------------------------


};


// -----------------------------------------------------------------


};

// ------------------------------------------------------------------


};

// ------------------------------------------------------------------


?>