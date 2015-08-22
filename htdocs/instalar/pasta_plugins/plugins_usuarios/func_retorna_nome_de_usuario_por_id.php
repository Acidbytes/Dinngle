<?php


// função que retorna o nome de usuario ---------------------------

function func_retorna_nome_de_usuario_por_id($idusuario){


// globals ------------------------------------------------------------------

global $tabela_banco; // tabela

global $tamanho_maximo_caracteres_nome_perfil_exibir; // tamanho maximo do nome

// ----------------------------------------------------------------------------


// query --------------------------------------------------------------------

$query = "select *from $tabela_banco[1] where idusuario='$idusuario';"; // query

// ----------------------------------------------------------------------------


// comando --------------------------------------------------------------

$comando = comando_executa($query); // comando

// --------------------------------------------------------------------------


// dados -----------------------------------------------------------------

$dados = mysql_fetch_array($comando, MYSQL_ASSOC); // obtem os dados

// -------------------------------------------------------------------------


// nome -----------------------------------------------------------------

$nome_usuario = $dados['nome']; // nome de usuario

// -------------------------------------------------------------------------


// encurta nome -------------------------------------------------------

if(strlen($nome_usuario) > $tamanho_maximo_caracteres_nome_perfil_exibir){

$nome_usuario = substr($nome_usuario, 0, $tamanho_maximo_caracteres_nome_perfil_exibir)."..."; // encurta nome

};

// -------------------------------------------------------------------------


// retorno ---------------------------------------------------------------

return $nome_usuario; // retorno

// -------------------------------------------------------------------------


};

// ------------------------------------------------------------------------


?>
