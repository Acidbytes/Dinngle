<?php


// salva o curriculo ----------------------------------

function salva_curriculo(){


// globals -----------------------------------------------

global $tabela_banco; // tabelas

// ---------------------------------------------------------


// dados de formulario -------------------------------

$profissao = remove_html($_POST['profissao']); // dados
$objetivo = remove_html($_POST['objetivo']); // dados
$empresas_trabalhou = remove_html($_POST['empresas_trabalhou']); // dados
$formacao = remove_html($_POST['formacao']); // dados
$experiencia = remove_html($_POST['experiencia']); // dados
$idiomas = remove_html($_POST['idiomas']); // dados
$email = remove_html($_POST['email']); // dados
$telefone = remove_html($_POST['telefone']); // dados
$endereco = remove_html($_POST['endereco']); // dados
$adicionais = remove_html($_POST['adicionais']); // dados
$projetos = remove_html($_POST['projetos']); // dados
$empregado = remove_html($_POST['empregado']); // dados

// -----------------------------------------------------------


// id de usuario -----------------------------------------

$idusuario = retorne_idusuario_logado(); // id de usuario

// -----------------------------------------------------------


// dados do usuario ------------------------------------

$dados_usuario = retorna_dados_usuario_array($idusuario); // dados do usuario

// -----------------------------------------------------------


// obtendo estado de usuario ------------------------

$estado = $dados_usuario['estado']; // obtendo estado de usuario

// ------------------------------------------------------------


// querys --------------------------------------------------

$query[] = "delete from $tabela_banco[14] where idusuario='$idusuario';"; // query

$query[] = "insert into $tabela_banco[14] values('$idusuario', '$profissao', '$objetivo', '$empresas_trabalhou', '$formacao', '$experiencia', '$idiomas', '$email', '$telefone', '$endereco', '$adicionais', '$projetos', '$empregado', '$estado');"; // query

// -----------------------------------------------------------


// executando querys ----------------------------------

foreach($query as $query_valor){

if($query_valor != null and $idusuario != null){

comando_executa($query_valor); // executa query

};

};

// -----------------------------------------------------------


};

// --------------------------------------------------------


?>