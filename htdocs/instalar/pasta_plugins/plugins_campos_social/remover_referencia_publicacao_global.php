<?php


// remove a referencia de publicacao global ----
// publicacoes, comentar, curtir, imagens etc...

function remover_referencia_publicacao_global($idpost_remover){


// globals --------------------------------------------

global $tabela_banco; // tabela de banco de dados

// ------------------------------------------------------


// dados de formulario ----------------------------

$idpost = remove_html($_POST['idpost']); // data de nascimento

// ------------------------------------------------------


// valido para postagens com imagens -------

if($idpost_remover != null){

$idpost = $idpost_remover; // igualando ids

};

// ------------------------------------------------------


// exclui todas as curtidas ------------------------

exclui_curtidas_gerais($idpost); // exclui todas as curtidas

// -------------------------------------------------------


// query remove postagem -----------------------

$query[] = "delete from $tabela_banco[10] where id='$idpost';"; // query
$query[] = "delete from $tabela_banco[11] where idcomentario='$idpost';"; // query

// -------------------------------------------------------


// removendo publicacao completa ------------

foreach($query as $valor_query){


// verifica se query e valida e executa ----------

if($valor_query != null){

comando_executa($valor_query); // removendo dados de tabela

};

// -------------------------------------------------------


};

// -------------------------------------------------------


};

// --------------------------------------------------------


?>