<?php


// remove referencia em todas as tabelas ------

function remove_referencia_tabelas(){


// globals ----------------------------------------------

global $tabela_banco; // tabela de banco de dados

// --------------------------------------------------------


// contador --------------------------------------------

$contador = 0; // contador

// --------------------------------------------------------


// id de usuario logado ----------------------------

$idusuario_logado = retorne_idusuario_logado(); // id de usuario logado

// -------------------------------------------------------


// criando querys ------------------------------------

for($contador == $contador; $contador <= count($tabela_banco); $contador++){


// querys -----------------------------------------------

if($tabela_banco[$contador] != null){

$query[] = "delete from $tabela_banco[$contador] where idusuario='$idusuario_logado';"; // remove
$query[] = "delete from $tabela_banco[$contador] where idamigo='$idusuario_logado';"; // remove
$query[] = "delete from $tabela_banco[$contador] where idusuario_curtiu='$idusuario_logado';"; // remove
$query[] = "delete from $tabela_banco[$contador] where idusuario_comentario='$idusuario_logado';"; // remove
$query[] = "delete from $tabela_banco[$contador] where idusuario_bloqueado='$idusuario_logado';"; // remove

};

// --------------------------------------------------------


};

// --------------------------------------------------------


// analiza querys -----------------------------------

foreach($query as $valor_query){


// verifica se query e valida ----------------------

if($valor_query != null){

comando_executa($valor_query); // comando...

};

// ------------------------------------------------------


};

// ------------------------------------------------------


};

// --------------------------------------------------------


?>