<?php


// remove referencia de amizade ----------------

function remove_referencia_amizade(){


// globals ----------------------------------------------

global $tabela_banco; // tabela de banco de dados

// --------------------------------------------------------


// contador --------------------------------------------

$contador = 4; // contador inicia em 4

// --------------------------------------------------------


// id de usuario logado ----------------------------

$idusuario_logado = retorne_idusuario_logado(); // id de usuario logado

// -------------------------------------------------------


// id do usuario -------------------------------------

$idamigo = remove_html($_POST['idamigo']); // id do usuario

// -------------------------------------------------------


// em caso de nulo ---------------------------------

if($idamigo == null){

$idamigo = remove_html($_POST['idusuario']); // id do usuario

};

// -------------------------------------------------------


// usuario dono do perfil --------------------------
// nota deixe como esta!

if($idusuario_logado == $idamigo or $idamigo == null){

return null; // retorno nulo

};

// -------------------------------------------------------


// criando querys ------------------------------------

for($contador == $contador; $contador <= count($tabela_banco); $contador++){


// querys -----------------------------------------------

$query[] = "delete from $tabela_banco[$contador] where idusuario='$idamigo' and idamigo='$idusuario_logado';"; // remove
$query[] = "delete from $tabela_banco[$contador] where idusuario='$idusuario_logado' and idamigo='$idamigo';"; // remove
$query[] = "delete from $tabela_banco[$contador] where idusuario='$idamigo' and idusuario_comentario='$idusuario_logado';"; // remove
$query[] = "delete from $tabela_banco[$contador] where idusuario='$idusuario_logado' and idusuario_comentario='$idamigo';"; // remove

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