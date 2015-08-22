<?php


// retorna a pasta de upload de imagem de fundo --------

function retorne_pasta_upload_imagem_fundo(){


// globals -----------------------------------------------------------

global $pasta_arquivos_usuarios; // pasta de arquivos

global $pasta_papel_parede_peril_usuario; // pasta de imagem de perfil

global $pasta_root_servidor; // url de servidor

// ----------------------------------------------------------------------


// id de usuario logado --------------------------------------------

$idusuario_logado = retorne_idusuario_logado(); // id de usuario logado

// ----------------------------------------------------------------------


// pasta de perfil ---------------------------------------------------

$pasta_retorno = retorne_pasta_pessoal_usuario_logado().$pasta_papel_parede_peril_usuario."/".$idusuario_logado."/".$pasta_papel_parede_peril_usuario."/"; // pasta de perfil

// ----------------------------------------------------------------------


// retorno ------------------------------------------------------------

if($idusuario_logado != null){

criar_pasta($pasta_retorno); // cria pasta antes

return $pasta_retorno; // retorno

}else{

return null; // retorno nulo

};

// ----------------------------------------------------------------------



};

// -----------------------------------------------------------------------------


?>