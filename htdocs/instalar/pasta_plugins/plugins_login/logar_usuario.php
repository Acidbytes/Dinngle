<?php


// login de usuario -----------------------------------

function logar_usuario(){


// global ------------------------------------------------

global $tabela_banco; // tabela de dados

global $nome_do_sistema; // nome do sistema

// --------------------------------------------------------


// dados de formulario -----------------------------

$email_cadastro = remove_html($_POST['email_cadastro']); // email de cadastro

$senha_cadastro = remove_html($_POST['senha_cadastro']); // senha de cadastro

// --------------------------------------------------------


// retorna que nao tentou logar ------------------

if($email_cadastro == null or $senha_cadastro == null){

return false; // retorna que nao tentou logar

};

// --------------------------------------------------------


// cifra a senha de entrada ------------------------

$senha_cadastro = cifra_senha_md5($senha_cadastro); // cifra a senha de entrada

// --------------------------------------------------------


// query ------------------------------------------------

$query = "select *from $tabela_banco[1] where email='$email_cadastro' and senha='$senha_cadastro';"; // query

// --------------------------------------------------------


// comando -------------------------------------------

$comando = comando_executa($query); // comando

// -------------------------------------------------------


// numero de linhas --------------------------------

$numero_linhas = mysql_num_rows($comando); // numero de linhas

// -------------------------------------------------------


// retorna que tentou logar -----------------------

if($numero_linhas == 0){

return true; // retorna que tentou logar

};

// -------------------------------------------------------


// dados ----------------------------------------------

$dados = mysql_fetch_array($comando, MYSQL_ASSOC); // dados

// -------------------------------------------------------


// id do usuario -------------------------------------

$idusuario = $dados['idusuario']; // id do usuario

// -------------------------------------------------------


// limpa a sessao atual ---------------------------

logout(false); // limpa a sessao atual

// -------------------------------------------------------


// inicia nova sessao -------------------------------

session_start(); // inicia nova sessao

// --------------------------------------------------------


// salva idusuario em sessao ---------------------

$_SESSION['email_cadastro'] = $email_cadastro; // email
$_SESSION['idusuario'] = $idusuario; // idusuario
$_SESSION['senha_cadastro'] = $senha_cadastro; // senha cadastro

// --------------------------------------------------------


// salva cookies --------------------------------------

salvar_cookies($email_cadastro, $senha_cadastro, $idusuario); // salva cookies

// --------------------------------------------------------


// vai ate a pagina de usuario --------------------

pagina_index_usuario(); // vai ate a pagina de usuario

// -------------------------------------------------------


};

// -------------------------------------------------------


?>