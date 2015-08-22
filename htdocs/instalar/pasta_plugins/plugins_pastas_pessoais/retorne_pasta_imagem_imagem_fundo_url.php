<?php


// retorna a url de imagem de fundo de usuario -----------

function retorne_pasta_imagem_imagem_fundo_url(){


// globals -----------------------------------------------------------

global $pasta_arquivos_usuarios; // pasta de arquivos

global $pasta_papel_parede_peril_usuario; // pasta de imagem de album

// ----------------------------------------------------------------------


// id de usuario logado --------------------------------------------

$idusuario_logado = retorne_idusuario_logado(); // id de usuario logado

// ----------------------------------------------------------------------


// pasta de album ---------------------------------------------------

$pasta_retorno = retorne_pasta_pessoal_usuario_logado().$pasta_papel_parede_peril_usuario."/".$idusuario_logado."/".$pasta_papel_parede_peril_usuario."/"; // pasta de perfil

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