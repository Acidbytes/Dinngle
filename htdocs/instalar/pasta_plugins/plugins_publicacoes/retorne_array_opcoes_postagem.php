<?php


// retorna o array com opcoes de postagem ---

function retorne_array_opcoes_postagem($dados){


// separando dados ----------------------------------

$id = $dados['id']; // dados de tabela
$idusuario = $dados['idusuario']; // dados de tabela
$conteudo_post = $dados['conteudo_post']; // dados de tabela
$idalbum_imagens = $dados['idalbum_imagens']; // dados de tabela
$data_publicacao = $dados['data_publicacao']; // dados de tabela
$privacidade = $dados['privacidade']; // dados de tabela

// ---------------------------------------------------------


// monta array de retorno ---------------------------

$array_retorno[] = "<li role='presentation'><a href='#' onclick='altera_numero_janela_dialogo_postagem_opcoes($id); dialogo_alterar_data_postagem();'>Alterar data</a></li>"; // monta array de retorno
$array_retorno[] = "<li role='presentation'><a href='#' onclick='altera_numero_janela_dialogo_postagem_opcoes($id); dialogo_alterar_conteudo_postagem();'>Editar</a></li>"; // monta array de retorno
$array_retorno[] = "<li role='presentation' class='divider'></li>"; // monta array de retorno
$array_retorno[] = "<li role='presentation'><a href='#' onclick='altera_numero_janela_dialogo_postagem_opcoes($id); dialogo_excluir_postagem_usuario();'>Excluir...</a></li>"; // monta array de retorno

// ---------------------------------------------------------


// retorna -----------------------------------------------

return $array_retorno; // retorna

// ---------------------------------------------------------


};

// --------------------------------------------------------


?>