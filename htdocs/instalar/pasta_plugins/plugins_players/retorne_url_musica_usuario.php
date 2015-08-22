<?php


// retorna a url de musica de usuario ---------------

function retorne_url_musica_usuario(){


// globals --------------------------------------------------

global $tabela_banco; // tabela de banco de dados

// ------------------------------------------------------------


// id de usuario -------------------------------------------

$idusuario = retorne_idusuario_visualizando_perfil(); // id de usuario

// ------------------------------------------------------------


// query ----------------------------------------------------

$query = "select *from $tabela_banco[7] where idusuario='$idusuario';"; // query

// ------------------------------------------------------------


// comando -----------------------------------------------

$comando = comando_executa($query); // comando

// ------------------------------------------------------------


// dados ---------------------------------------------------

$dados = mysql_fetch_array($comando, MYSQL_ASSOC); // dados

// ------------------------------------------------------------


// separando dados -------------------------------------

$url_musica_perfil = $dados['url_musica_perfil']; // url da musica

$titulo_original_musica = $dados['titulo_original_musica']; // titulo da musica

// ------------------------------------------------------------


// retorna url da musica --------------------------------

return $url_musica_perfil; // retorna url da musica

// ------------------------------------------------------------


};

// ------------------------------------------------------------


?>