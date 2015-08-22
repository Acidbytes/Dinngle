<?php


// salva a nova senha -------------------------------

function salvar_nova_senha(){


// globals ----------------------------------------------

global $tabela_banco; // tabela de banco

global $tamanho_minimo_senha; // tamanho minimo para uma senha

// --------------------------------------------------------


// dados de formulario ------------------------------

$senha_1 = remove_html($_POST['senha_1']); // senha principal
$senha_2 = remove_html($_POST['senha_2']); // nova senha
$senha_3 = remove_html($_POST['senha_3']); // confirma nova senha

// ---------------------------------------------------------


// senha original --------------------------------------

$senha_original = $senha_2; // senha original

// ---------------------------------------------------------


// senhas apenas para comparacao -------------
// nao cifrar a senha 4 e 5

$senha_4 = $senha_2; // senha apenas para comparacao
$senha_5 = $senha_3; // senha apenas para comparacao

// ---------------------------------------------------------


// verifica tamanho minimo antes de cifrar -----

if(strlen($senha_4) >= $tamanho_minimo_senha and strlen($senha_5) >= $tamanho_minimo_senha){

$tamanho_aceitavel = true; // tamanho aceitavel

}else{

$tamanho_aceitavel = false; // tamanho aceitavel

};

// ---------------------------------------------------------


// cifra a senha atual do formulario --------------

$senha_1 = cifra_senha_md5($senha_1); // cifrando senha

// ---------------------------------------------------------


// cifra a senha ---------------------------------------

$senha_2 = cifra_senha_md5($senha_2); // cifra a senha

// --------------------------------------------------------


// cifra a senha ---------------------------------------

$senha_3 = cifra_senha_md5($senha_3); // cifra a senha

// --------------------------------------------------------


// senha atual do usuario logado -----------------

$senha_atual = retorne_senha_cadastro_usuario(); // senha atual do usuario logado

// ---------------------------------------------------------


// id de usuario logado ------------------------------

$idusuario = retorne_idusuario_logado(); // id de usuario logado

// ---------------------------------------------------------


// compara senha atual -----------------------------

if($senha_atual != $senha_1 or retorne_esta_logado() == false or $senha_2 != $senha_3 or $tamanho_aceitavel == false){

return null; // retorno nulo

};

// ---------------------------------------------------------


// query -------------------------------------------------

$query = "update $tabela_banco[1] set senha='$senha_2', senha_original='$senha_original' where idusuario='$idusuario' and senha='$senha_1';";

// ---------------------------------------------------------


// executa query --------------------------------------

comando_executa($query); // executa query

// ---------------------------------------------------------


// faz logout --------------------------------------------

logout(true); // faz logout e redireciona

// ---------------------------------------------------------


};

// --------------------------------------------------------


?>