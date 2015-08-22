<?php


// retorna as opcoes de imagem ------------------

function retorne_array_opcoes_imagem($dados){


// dados ------------------------------------------------

$id = $dados['id']; // dados

// --------------------------------------------------------


// monta array de retorno ---------------------------

$array_retorno[] = "<li role='presentation'><a href='#' onclick='altera_numero_janela_dialogo_postagem_opcoes($id); dialogo_excluir_imagem();'>Excluir imagem</a></li>"; // monta array de retorno

// ---------------------------------------------------------


// retorna -----------------------------------------------

return $array_retorno; // retorna

// ---------------------------------------------------------


};

// ---------------------------------------------------------


?>