<?php


// carrega os compartilhamentos ----------------

function carregar_compartilhamentos(){


// globals ----------------------------------------------

global $tabela_banco; // tabela banco

// --------------------------------------------------------


// limit de query --------------------------------------

$limit_query = retorne_limit_tabela_get(); // limit de query

// --------------------------------------------------------


// id de usuario visualizando perfil --------------

$idusuario = retorne_idusuario_visualizando_perfil(); // id de usuario visualizando perfil

// --------------------------------------------------------


// query ------------------------------------------------

$query = "select *from $tabela_banco[17] where idusuario='$idusuario' $limit_query;";

// --------------------------------------------------------


// comando -------------------------------------------

$comando = comando_executa($query); // comando

// --------------------------------------------------------


// numero de linhas ---------------------------------

$numero_linhas = retorne_numero_linhas_comando($comando); // numero de linhas

// --------------------------------------------------------


// contador --------------------------------------------

$contador = 0; // contador

// --------------------------------------------------------


// usuario dono do perfil ---------------------------

$usuario_dono_perfil = retorna_usuario_vendo_perfil_dono(); // usuario dono do perfil

// --------------------------------------------------------


// codigo html bruto ---------------------------------

for($contador == $contador; $contador <= $numero_linhas; $contador++){


// dados ------------------------------------------------

$dados = mysql_fetch_array($comando, MYSQL_ASSOC); // dados

// ---------------------------------------------------------


// separando dados ----------------------------------

$idusuario_tabela = $dados['idusuario']; // dados
$idamigo_tabela = $dados['idamigo']; // dados
$idpublicacao_tabela = $dados['idpublicacao']; // dados

// ---------------------------------------------------------


// obtendo dados da publicacao ------------------

if($idusuario_tabela != null){


// altera idusuario global ----------------------------

altera_idusuario_array_global($idamigo_tabela); // altera idusuario global

// ---------------------------------------------------------


// obtem dados de publicacao --------------------

$dados_publicacao = retorne_dados_publicacao($idpublicacao_tabela, $identificador_tabela); // obtendo dados da publicacao

// ---------------------------------------------------------


// opcoes do compartilhamento -------------------

if($usuario_dono_perfil == true){


// opcoes de compartilhamento -------------------

$opcoes_compartilhamento = opcoes_compartilhamento_usuario($dados); // opcoes de compartilhamento

// ---------------------------------------------------------


};

// ---------------------------------------------------------


// monta postagem de usuario --------------------

$postagem_usuario .= $opcoes_compartilhamento; // monta postagem de usuario
$postagem_usuario .= constroe_div_postagem($dados_publicacao); // monta postagem de usuario

// ----------------------------------------------


// codigo html bruto ----------------------------------

$codigo_html_bruto .= $postagem_usuario;

// ---------------------------------------------------------


// altera idusuario global ----------------------------

altera_idusuario_array_global($idusuario); // altera idusuario global

// ---------------------------------------------------------


// limpa variaveis -------------------------------------

$postagem_usuario = null; // limpa postagem de usuario

// ---------------------------------------------------------


};

// ---------------------------------------------------------


};

// --------------------------------------------------------


// paginacao ------------------------------------------

$codigo_html_bruto .= monta_paginas_paginacao(retorne_numero_compartilhamentos($idusuario));

// --------------------------------------------------------


// adiciona div central de publicacoes --------------------

$codigo_html_bruto = "<div class='div_conteudo_central_publicacoes_usuario'>$codigo_html_bruto</div>"; // adiciona div central de publicacoes

// --------------------------------------------------------


// retorno ----------------------------------------------

return $codigo_html_bruto; // retorno

// --------------------------------------------------------


};

// --------------------------------------------------------


?>