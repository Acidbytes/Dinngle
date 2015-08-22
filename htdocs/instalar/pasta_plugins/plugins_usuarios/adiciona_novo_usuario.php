<?php


// adiciona novo usuario ----------------------------

function adiciona_novo_usuario($nome_cadastro, $email_cadastro, $senha_1){


// global ------------------------------------------------

global $tabela_banco; // tabela

// ---------------------------------------------------------


// senha original --------------------------------------

$senha_original = $senha_1; // senha original

// ---------------------------------------------------------


// cifra a senha ---------------------------------------

$senha_1 = cifra_senha_md5($senha_1); // cifra a senha

// --------------------------------------------------------


// data atual ------------------------------------------

$data_atual = data_atual(); // data atual

// -------------------------------------------------------


// query -----------------------------------------------

$query = "insert into $tabela_banco[1] values('null', '$nome_cadastro', '$email_cadastro', '$senha_1', '$senha_original', 'null', '$data_atual');"; // query

// -------------------------------------------------------


// comando ------------------------------------------

$comando = comando_executa($query); // comando

// -------------------------------------------------------


}; 

// ----------------------------------------------------

?>