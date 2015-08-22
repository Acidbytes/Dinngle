<?php


// retorna a pasta host de album de usuario

function retorne_host_pasta_album_usuario($idusuario){


// globals
global $url_do_servidor;
global $pasta_arquivos_imagem_album;
global $pasta_arquivos_usuarios;


// id de usuario logado
if($idusuario == null){

$idusuario = retorne_idusuario_logado();

};


// pasta de album
$pasta_retorno = $url_do_servidor."/".$pasta_arquivos_usuarios."/pasta_usuario/".$idusuario."/".$idusuario."/".$pasta_arquivos_imagem_album."/".$idusuario."/".$pasta_arquivos_imagem_album."/";


// retorno
return $pasta_retorno; // retorno


};

// ------------------------------------------------------------------


?>