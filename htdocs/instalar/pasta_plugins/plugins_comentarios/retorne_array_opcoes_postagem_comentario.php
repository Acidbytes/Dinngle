<?php


// retorna o array com opcoes de postagem de comentario ---

function retorne_array_opcoes_postagem_comentario($dados){


// dados de tabela -----------------------------------

$id = $dados['id']; // dados de tabela
$idcomentario = $dados['idcomentario']; // dados de tabela
$idusuario = $dados['idusuario']; // dados de tabela
$idusuario_comentario = $dados['idusuario_comentario']; // dados de tabela
$data_comentou = $dados['data_comentou']; // dados de tabela
$comentario = $dados['comentario']; // dados de tabela
$identificador = $dados['identificador']; // dados de tabela

// -------------------------------------------------------


// id de usuario logado ----------------------------

$idusuario_logado = retorne_idusuario_logado(); // id de usuario logado

// -------------------------------------------------------


// monta array de retorno --------------------------

if($idusuario_comentario == $idusuario_logado){

$array_retorno[] = "<li role='presentation'><a href='#' onclick='dialogo_editar_comentario($id, $idusuario_comentario);'>Editar</a></li>"; // monta array de retorno
$array_retorno[] = "<li role='presentation' class='divider'></li>"; // monta array de retorno

};

// -------------------------------------------------------


// monta array de retorno --------------------------

$array_retorno[] = "<li role='presentation'><a href='#' onclick='dialogo_excluir_comentario($id, $idusuario_comentario);'>Excluir...</a></li>"; // monta array de retorno

// --------------------------------------------------------


// retorna ----------------------------------------------

return $array_retorno; // retorna

// --------------------------------------------------------


};

// --------------------------------------------------------


?>