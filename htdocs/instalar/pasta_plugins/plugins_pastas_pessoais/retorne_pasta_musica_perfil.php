<?php


// retorna a url de pasta de musica de perfil ---------------

function retorne_pasta_musica_perfil(){


// globals -----------------------------------------------------------

global $pasta_arquivos_usuarios; // pasta de arquivos

global $pasta_musicas_usuarios; // pasta de imagem de musica

// ----------------------------------------------------------------------


// id de usuario logado --------------------------------------------

$idusuario_logado = retorne_idusuario_logado(); // id de usuario logado

// ----------------------------------------------------------------------


// pasta de musica -------------------------------------------------

$pasta_retorno = retorne_pasta_pessoal_usuario_logado().$pasta_musicas_usuarios."/".$idusuario_logado."/".$pasta_musicas_usuarios."/"; // pasta de perfil

// ----------------------------------------------------------------------


// retorno ------------------------------------------------------------

if($idusuario_logado != null){

return $pasta_retorno; // retorno

}else{

return null; // retorno nulo

};

// ----------------------------------------------------------------------



};

// -----------------------------------------------------------------------------


?>