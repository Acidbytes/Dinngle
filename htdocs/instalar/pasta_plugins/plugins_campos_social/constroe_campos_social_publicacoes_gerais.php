<?php


// constroe os campos social de publicacao ---

function constroe_campos_social_publicacoes_gerais($dados){


// globals ----------------------------------------------

global $tabela_banco; // tabela de banco de dados

// --------------------------------------------------------


// dados de formulario ------------------------------

$id = $_POST['id']; // id de item a ser curtido

$tipo_curtida = $_POST['tipo_curtida']; // tipo de curtida

$tipo_comentario = $_POST['tipo_comentario']; // tipo de comentario

// ---------------------------------------------------------


// tipo identificador -----------------------------------

if($tipo_curtida != null){

$tipo_identificador = $tipo_curtida; // curtida

}else{

$tipo_identificador = $tipo_comentario; // comentario

};

// --------------------------------------------------------


// obtem dados --------------------------------------

if($id != null){


// query ------------------------------------------------

switch($tipo_identificador){


case 1: // imagens
$query = "select *from $tabela_banco[6] where id='$id';"; // query
break;


case 2: // postagens
$query = "select *from $tabela_banco[9] where id='$id';"; // query
break;


case 3: // comentarios
$query = "select *from $tabela_banco[11] where id='$id';"; // query
break;


};

// --------------------------------------------------------


// dados ------------------------------------------------

$dados = retorne_dados_query($query); // dados

// ---------------------------------------------------------


};

// ---------------------------------------------------------


// separando dados ----------------------------------

$id = $dados['id']; // dados de tabela
$idusuario = $dados['idusuario']; // dados de tabela
$conteudo_post = $dados['conteudo_post']; // dados de tabela
$idalbum_imagens = $dados['idalbum_imagens']; // dados de tabela
$data_publicacao = $dados['data_publicacao']; // dados de tabela
$privacidade = $dados['privacidade']; // dados de tabela
$identificador = $dados['identificador']; // dados de tabela

// ---------------------------------------------------------


// numero da div id -----------------------------------

$numero_div_id = retorne_numero_div_id($dados); // numero da div id

// ---------------------------------------------------------


// id unica da div --------------------------------------

$div_id = "campos_social_publicacoes_gerais".$numero_div_id; // id unica da div

// ---------------------------------------------------------


// campos disponiveis -------------------------------

$campos_disponiveis .= links_social_publicacoes_gerais($dados); // campos disponiveis
$campos_disponiveis .= campo_comentario($dados); // campos disponiveis
$campos_disponiveis .= campo_exibe_curtidas($dados); // campos disponiveis
$campos_disponiveis .= campo_div_comentarios_usuarios($dados); // campos disponiveis

// ---------------------------------------------------------


// codigo html bruto ----------------------------------

if($tipo_curtida == null and $tipo_comentario == null){

$codigo_html_bruto .= "<div class='campos_social_publicacoes_gerais' id='$div_id'>";
$codigo_html_bruto .= $campos_disponiveis;
$codigo_html_bruto .= "</div>";

}else{

$codigo_html_bruto .= $campos_disponiveis;

};

// ----------------------------------------------------------


// retorno ------------------------------------------------

return $codigo_html_bruto; // retorno

// ----------------------------------------------------------


};

// --------------------------------------------------------


?>