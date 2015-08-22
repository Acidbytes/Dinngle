<?php


// retorna a imagem de perfil ----------------------

function retorna_imagem_perfil($idusuario){


// globals ----------------------------------------------

global $tabela_banco; // tabela de banco de dados

global $imagem_servidor; // imagens de servidor

// --------------------------------------------------------


// query ------------------------------------------------

$query = "select *from $tabela_banco[2] where idusuario='$idusuario';"; // query

// --------------------------------------------------------


// comando -------------------------------------------

$comando = comando_executa($query); // comando

// --------------------------------------------------------


// dados -----------------------------------------------

$dados = mysql_fetch_array($comando, MYSQL_ASSOC); // dados

// --------------------------------------------------------


// imagem de perfil ----------------------------------

$imagem_perfil = $dados['imagem_perfil']; // imagem de perfil

// --------------------------------------------------------


// imagem de servidor padrao ------------------------------

if($imagem_perfil == null){

$imagem_perfil = $imagem_servidor['usuario']; // imagem de servidor padrao

};

// -----------------------------------------------------------------


// retorno -------------------------------------------------------

return $imagem_perfil; // retorno

// -----------------------------------------------------------------


};

// --------------------------------------------------------


?>