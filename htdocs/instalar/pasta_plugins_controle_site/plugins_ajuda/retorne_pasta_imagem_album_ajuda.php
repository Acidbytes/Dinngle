<?php


// retorna a url de pasta de album de usuario -------------

function retorne_pasta_imagem_album_ajuda(){


// globals -----------------------------------------------------------

global $pasta_upload_imagens_ajuda; // pasta de arquivos

global $pasta_arquivos_imagem_album; // pasta de imagem de album

// ----------------------------------------------------------------------


// id de usuario logado --------------------------------------------

$idusuario_logado = retorne_idusuario_logado(); // id de usuario logado

// ----------------------------------------------------------------------


// pasta de album ---------------------------------------------------

$pasta_retorno = $pasta_upload_imagens_ajuda."/".$idusuario_logado."/"; // pasta de perfil

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