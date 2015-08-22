<?php


// envia senha para email de usuario ------------

function enviar_senha_email_usuario(){


// globals -----------------------------------------------

global $dominio_host_site; // dominio host do site

// ---------------------------------------------------------


// dados de formulario ------------------------------

$email = remove_html($_POST['email']); // email

// --------------------------------------------------------


// usuario logado ------------------------------------

$usuario_logado = retorne_esta_logado(); // usuario logado

// --------------------------------------------------------


// valida email e usuario logado -----------------

if(strlen($email) == 0 or $usuario_logado == true or verifica_se_email_valido($email) == false){

return null; // retorno nulo

};

// --------------------------------------------------------


// id de usuario por email --------------------------

$idusuario = retorne_idusuario_por_email($email); // id de usuario por email

// --------------------------------------------------------


// dados cadastrais ---------------------------------

$dados = retorna_dados_cadastrais_usuario_array($idusuario); // dados cadastrais

// --------------------------------------------------------


// senha original -------------------------------------

$senha_original = $dados['senha_original']; // senha original

// --------------------------------------------------------


// nome do usuario ----------------------------------

$nome_usuario = $dados['nome']; // nome do usuario

// --------------------------------------------------------


// valida senha atual --------------------------------

if($senha_original == null){

return null; // retorno nulo

};

// --------------------------------------------------------


// mensagem de email -----------------------------

$mensagem_email .= $nome_usuario; // mensagem de email
$mensagem_email .= ", sua senha do $dominio_host_site é: $senha_original"; // mensagem de email

// --------------------------------------------------------


// envia email com a senha -----------------------

enviar_email($email, "Senha do $dominio_host_site", $mensagem_email); // envia email com a senha

// --------------------------------------------------------


};

// --------------------------------------------------------


?>