<?php


// carrega o ultimo compartilhamento -----------

function carrega_ultimo_compartilhamento_usuario($idusuario){


// globals ----------------------------------------------

global $tabela_banco; // tabela banco

// --------------------------------------------------------


// limit de query --------------------------------------

$limit_query = retorne_limit_tabela_ultimo_campo(); // limit de query

// --------------------------------------------------------


// query ------------------------------------------------

$query = "select *from $tabela_banco[17] where idusuario='$idusuario' $limit_query;";

// --------------------------------------------------------


// dados -----------------------------------------------

$dados = retorne_dados_query($query); // dados

// --------------------------------------------------------


// id de publicacao ----------------------------------

$idpublicacao = $dados['idpublicacao']; // id de publicacao

$idamigo = $dados['idamigo']; // idamigo

$idusuario_tabela = $dados['idusuario']; // id usuario tabela

// --------------------------------------------------------


// constroe publicacao -----------------------------

if($idpublicacao != null){


// altera idusuario em array global --------------

altera_idusuario_array_global($idamigo); // alterando...

// --------------------------------------------------------


// dados de publicacao -----------------------------

$dados_publicacao = retorne_dados_publicacao($idpublicacao); // dados de publicacao

// --------------------------------------------------------


// informa que e um compartilhamento --------

$dados_publicacao['compartilhamento'] = true; // compartilhamento

$dados_publicacao['idamigo'] = $idusuario_tabela; // id de usuario que compartilhou

// -------------------------------------------------------


// codigo html bruto ---------------------------------

$codigo_html_bruto .= constroe_div_postagem($dados_publicacao);

// --------------------------------------------------------


// altera idusuario em array global --------------

altera_idusuario_array_global($idusuario); // alterando...

// --------------------------------------------------------


};

// --------------------------------------------------------


// retorno ----------------------------------------------

return $codigo_html_bruto; // retorno

// --------------------------------------------------------


};

// --------------------------------------------------------


?>