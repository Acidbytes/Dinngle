<?php


// retorna a senha de cadastro do usuario -----

function retorne_senha_cadastro_usuario(){


// id de usuario ---------------------------------------

$idusuario = retorne_idusuario_logado(); // id de usuario

// ---------------------------------------------------------


// dados do usuario ----------------------------------

$dados = retorna_dados_cadastrais_usuario_array($idusuario); // dados do usuario

// ---------------------------------------------------------


// senha de usuario ----------------------------------

$senha = $dados['senha']; // senha de usuario

// ---------------------------------------------------------


// retorno -----------------------------------------------

return $senha; // senha

// ---------------------------------------------------------


};

// --------------------------------------------------------


?>