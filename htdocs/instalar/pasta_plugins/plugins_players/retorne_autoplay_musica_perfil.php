<?php


// retorna se a musica toca automaticamente ----

function retorne_autoplay_musica_perfil(){


// globals --------------------------------------------------

global $tabela_banco; // tabela de banco de dados

// ------------------------------------------------------------


// id de usuario -------------------------------------------

$idusuario = retorne_idusuario_visualizando_perfil(); // id de usuario

// ------------------------------------------------------------


// query ----------------------------------------------------

$query = "select *from $tabela_banco[8] where idusuario='$idusuario';"; // query

// ------------------------------------------------------------


// comando -----------------------------------------------

$comando = comando_executa($query); // comando

// ------------------------------------------------------------


// dados ---------------------------------------------------

$dados = mysql_fetch_array($comando, MYSQL_ASSOC); // dados

// ------------------------------------------------------------


// separando dados -------------------------------------

$musica_auto_play = $dados['musica_auto_play']; // autoplay

// ------------------------------------------------------------


// verifica se valor e valido ----------------------------

if($musica_auto_play == null){

$musica_auto_play = 0; // nao toca automaticamente

};

// -----------------------------------------------------------


// retorno de autoplay ---------------------------------

return $musica_auto_play; // retorno de autoplay

// -----------------------------------------------------------


};

// ------------------------------------------------------------


?>