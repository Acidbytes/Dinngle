<?php


// retorna a url de pasta de album de usuario -------------

function retorne_pasta_imagem_album(){


// globals -----------------------------------------------------------

global $pasta_arquivos_usuarios; // pasta de arquivos

global $pasta_arquivos_imagem_album; // pasta de imagem de album

// ----------------------------------------------------------------------


// id de usuario logado --------------------------------------------

$idusuario_logado = retorne_idusuario_logado(); // id de usuario logado

// ----------------------------------------------------------------------


// pasta de album ---------------------------------------------------

$pasta_retorno = retorne_pasta_pessoal_usuario_logado().$pasta_arquivos_imagem_album."/".$idusuario_logado."/".$pasta_arquivos_imagem_album."/"; // pasta de perfil

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