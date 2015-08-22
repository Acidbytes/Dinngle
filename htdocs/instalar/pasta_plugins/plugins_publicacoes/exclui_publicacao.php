<?php


// exclui a publicacao -------------------------------

function exclui_publicacao(){


// globals --------------------------------------------

global $tabela_banco; // tabela de banco de dados

// ------------------------------------------------------


// dados de formulario ----------------------------

$idpost = remove_html($_POST['idpost']); // data de nascimento

// ------------------------------------------------------


// id de usuario logado ---------------------------

$idusuario_logado = retorne_idusuario_logado(); // id de usuario logado

// ------------------------------------------------------


// query remove postagem -----------------------

$query[] = "delete from $tabela_banco[9] where idusuario='$idusuario_logado' and id='$idpost';"; // query
$query[] = "delete from $tabela_banco[17] where idpublicacao='$idpost';"; // query

// -------------------------------------------------------


// removendo publicacao completa ------------

executador_querys($query);

// -------------------------------------------------------


// remove qualquer referencia global ----------

remover_referencia_publicacao_global(null); // remove qualquer referencia global

// -------------------------------------------------------


};

// --------------------------------------------------------


?>