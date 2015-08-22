<?php


// div completa opcoes de postagem -----------

function divs_completa_opcoes_postagem($dados){


// globals ----------------------------------------------

global $enderecos_arquivos_php_uteis; // endereco de arquivos uteis

// --------------------------------------------------------


// salva a nova data ----------------------------------

$script_salvar_atualizacao[0] = $enderecos_arquivos_php_uteis['atualizar_data_postagem']; // salva a nova data
$script_salvar_atualizacao[1] = $enderecos_arquivos_php_uteis['atualizar_conteudo_postagem']; // salva novo conteudo de post
$script_salvar_atualizacao[2] = $enderecos_arquivos_php_uteis['excluir_postagem_usuario']; // excluir postagem de usuario

// ---------------------------------------------------------


// separando dados ----------------------------------

$id = $dados['id']; // dados de tabela
$idusuario = $dados['idusuario']; // dados de tabela
$conteudo_post = $dados['conteudo_post']; // dados de tabela
$idalbum_imagens = $dados['idalbum_imagens']; // dados de tabela
$data_publicacao = $dados['data_publicacao']; // dados de tabela
$privacidade = $dados['privacidade']; // dados de tabela

// ---------------------------------------------------------


// data atual -------------------------------------------

$data_atual = data_atual(); // data atual

// ---------------------------------------------------------


// numero da pagina ---------------------------------

$numero_pagina = retorne_numero_pagina_resultado(); // numero da pagina

// ---------------------------------------------------------


// campo numero de pagina -----------------------

$campo_numero_pagina = "<input type='hidden' name='numero_pagina' value='$numero_pagina'>"; // campo numero de pagina

// ---------------------------------------------------------


// id de div alterar data postagem ----------------

$opcoes_postagem_data_alterar = "opcoes_postagem_data_alterar_".$id; // id de div alterar data postagem
$opcoes_postagem_conteudo_alterar = "opcoes_postagem_conteudo_alterar_".$id; // id de div alterar conteudo de postagem
$opcoes_postagem_excluir = "opcoes_postagem_excluir_".$id; // div id excluir postagem

// ---------------------------------------------------------


// campo data -----------------------------------------

$campo_data .= "<form action='$script_salvar_atualizacao[0]' method='post'>"; // campo data
$campo_data .= "<div id='$opcoes_postagem_data_alterar'>"; // campo data
$campo_data .= "<div class='campos_opcoes_postagem_usuario_atualizar'>A data será atualizada para hoje $data_atual</div>"; // campo data
$campo_data .= "<input type='hidden' name='idpost' value='$id'>"; // campo data
$campo_data .= $campo_numero_pagina; // campo data
$campo_data .= ""; // campo data
$campo_data .= "<input type='submit' class='botao_padrao' value='Atualizar'>"; // campo data
$campo_data .= "</div>"; // campo data
$campo_data .= "</form>"; // campo data
$campo_data = janela_mensagem_dialogo("Alterar data", $campo_data, "$opcoes_postagem_data_alterar"); // campo data

// ---------------------------------------------------------


// campo altera conteudo post -------------------

$campo_altera_conteudo .= "<form action='$script_salvar_atualizacao[1]' method='post'>"; // campo altera conteudo post
$campo_altera_conteudo .= "<div id='$opcoes_postagem_conteudo_alterar'>"; // campo altera conteudo post
$campo_altera_conteudo .= campo_select_privacidade($privacidade); // campo altera conteudo post
$campo_altera_conteudo .= "<textarea cols='100' rows='4' name='conteudo_post' class='textarea_campo_publicar'>$conteudo_post</textarea>"; // campo altera conteudo post
$campo_altera_conteudo .= "<input type='hidden' name='idpost' value='$id'>"; // campo altera conteudo post
$campo_altera_conteudo .= $campo_numero_pagina; // campo altera conteudo post
$campo_altera_conteudo .= "<input type='submit' class='botao_padrao' value='Atualizar'>"; // campo altera conteudo post
$campo_altera_conteudo .= "</div>"; // campo altera conteudo post
$campo_altera_conteudo .= "</form>"; // campo altera conteudo post
$campo_altera_conteudo = janela_mensagem_dialogo("Editar", $campo_altera_conteudo, "$opcoes_postagem_conteudo_alterar"); // campo altera conteudo post

// ---------------------------------------------------------


// campo excluir postagem -------------------------

$campo_excluir_postagem .= "<form action='$script_salvar_atualizacao[2]' method='post'>"; // campo excluir postagem
$campo_excluir_postagem .= "<div id='$opcoes_postagem_excluir'>"; // campo excluir postagem
$campo_excluir_postagem .= "<div class='campos_opcoes_postagem_usuario_atualizar'>Excluir postagem?</div>"; // campo data
$campo_excluir_postagem .= "<input type='hidden' name='idpost' value='$id'>"; // campo altera conteudo post
$campo_excluir_postagem .= "<input type='submit' class='botao_padrao' value='Excluir'>"; // campo excluir postagem
$campo_excluir_postagem .= "<input type='hidden' name='idalbum_imagens' value='$idalbum_imagens'>"; // campo excluir postagem
$campo_excluir_postagem .= $campo_numero_pagina; // campo excluir postagem
$campo_excluir_postagem .= ""; // campo excluir postagem
$campo_excluir_postagem .= "</div>"; // campo excluir postagem
$campo_excluir_postagem .= "</form>"; // campo excluir postagem
$campo_excluir_postagem = janela_mensagem_dialogo("Excluir", $campo_excluir_postagem, "$opcoes_postagem_excluir"); // campo excluir postagem

// ---------------------------------------------------------


// codigo html bruto ---------------------------------

$codigo_html_bruto .= $campo_data;
$codigo_html_bruto .= $campo_altera_conteudo;
$codigo_html_bruto .= $campo_excluir_postagem;




// --------------------------------------------------------


// retorno ----------------------------------------------

return $codigo_html_bruto; // retorno

// --------------------------------------------------------


};

// --------------------------------------------------------


?>