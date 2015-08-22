<?php


// retorna o id real da curtida ----------------------

function retorne_id_real_curtida($id, $identificador){


// globals ----------------------------------------------

global $tabela_banco; // tabela de banco de dados

// --------------------------------------------------------


// query ------------------------------------------------

$query = "select *from $tabela_banco[11] where id='$id' and identificador='$identificador';"; // query

// --------------------------------------------------------


// dados -----------------------------------------------

$dados = retorne_dados_query($query); // dados

// --------------------------------------------------------


// id real de comentario ----------------------------

$idcomentario = $dados['idcomentario']; // id real de comentario

// --------------------------------------------------------


// valida id de comentario -------------------------

if($idcomentario == null){

$idcomentario = $id; // iguala

};

// --------------------------------------------------------


// retorno ----------------------------------------------

return $idcomentario; // retorno

// --------------------------------------------------------


};

// --------------------------------------------------------


?>