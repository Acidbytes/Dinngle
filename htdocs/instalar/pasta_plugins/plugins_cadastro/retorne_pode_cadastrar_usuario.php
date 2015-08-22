<?php


// retorna se pode cadastrar o usuario --------

function retorne_pode_cadastrar_usuario(){


// globals ---------------------------------------------

global $tamanho_minimo_senha; // tamanho minimo senha

// -------------------------------------------------------


// dados de formulario ----------------------------

$nome = remove_html($_POST['nome']); // nome
$email = remove_html($_POST['email']); // email
$senha_1 = remove_html($_POST['senha_1']); // senha 1
$senha_2 = remove_html($_POST['senha_2']); // senha 2

// -------------------------------------------------------


// dados validos ------------------------------------

$dados_validos = true; // dados validos

// -------------------------------------------------------


// verifica se o email e valido --------------------

$email_valido = verifica_se_email_valido($email); // verifica se o email e valido

// -------------------------------------------------------


// verifica se o email esta cadastrado ----------

$email_cadastrado = verifica_email_cadastrado($email); // verificando

// -------------------------------------------------------


// valida senha --------------------------------------

if(strlen($senha_1) < $tamanho_minimo_senha or strlen($senha_2) < $tamanho_minimo_senha or $senha_1 != $senha_2){


// codigo html bruto --------------------------------

$codigo_html_bruto .= "Verifique a senha.";
$codigo_html_bruto .= "<br>";

// -------------------------------------------------------


// encontrou erro -----------------------------------

$dados_validos = false; // encontrou erro

// -------------------------------------------------------


};

// -------------------------------------------------------


// valida nome ---------------------------------------

if($nome == null){


// codigo html bruto --------------------------------

$codigo_html_bruto .= "Verifique o nome.";
$codigo_html_bruto .= "<br>";

// -------------------------------------------------------


// encontrou erro -----------------------------------

$dados_validos = false; // encontrou erro

// -------------------------------------------------------
};

// -------------------------------------------------------


// valida email ---------------------------------------

if($email_valido == false){


// codigo html bruto --------------------------------
$codigo_html_bruto .= "O e-mail não é válido.";
$codigo_html_bruto .= "<br>";

// -------------------------------------------------------


// encontrou erro -----------------------------------

$dados_validos = false; // encontrou erro

// -------------------------------------------------------


};

// -------------------------------------------------------


// valida email ---------------------------------------

if($email_cadastrado == true){


// codigo html bruto --------------------------------

$codigo_html_bruto .= "O e-mail já existe.";
$codigo_html_bruto .= "<br>";

// -------------------------------------------------------


// encontrou erro -----------------------------------

$dados_validos = false; // encontrou erro

// -------------------------------------------------------


};

// --------------------------------------------------------


// cria array de retorno -----------------------------

$dados_retorno[1] = $dados_validos; // dados validos
$dados_retorno[2] = $codigo_html_bruto; // codigo de erro

// --------------------------------------------------------


// retorno ----------------------------------------------

return $dados_retorno; // retorno

// --------------------------------------------------------


};

// --------------------------------------------------------


?>