<?php


// retorna a url de pasta de perfil de usuario ---------------

function retorne_pasta_imagem_perfil(){


// globals -----------------------------------------------------------

global $pasta_arquivos_usuarios; // pasta de arquivos

global $pasta_arquivos_imagem_perfil; // pasta de imagem de perfil

// ----------------------------------------------------------------------


// id de usuario logado --------------------------------------------

$idusuario_logado = retorne_idusuario_logado(); // id de usuario logado

// ----------------------------------------------------------------------


// pasta de perfil ---------------------------------------------------

$pasta_retorno = retorne_pasta_pessoal_usuario_logado().$pasta_arquivos_imagem_perfil."/".$idusuario_logado."/"; // pasta de perfil

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