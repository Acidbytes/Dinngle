<?php


// retorna a pasta de upload de imagem de perfil de usuario --

function retorne_pasta_upload_albuns_imagens_ajuda(){


// globals -----------------------------------------------------------

global $pasta_upload_imagens_ajuda; // pasta de arquivos

global $pasta_root_servidor; // url de servidor

// ----------------------------------------------------------------------


// id de usuario logado --------------------------------------------

$idusuario_logado = retorne_idusuario_logado(); // id de usuario logado

// ----------------------------------------------------------------------


// pasta de perfil ---------------------------------------------------

$pasta_retorno = $pasta_root_servidor."/".$pasta_upload_imagens_ajuda."/".$idusuario_logado."/"; // pasta de perfil

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