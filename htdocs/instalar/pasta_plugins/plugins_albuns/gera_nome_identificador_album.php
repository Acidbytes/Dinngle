<?php

// gera nome identificador de album
function gera_nome_identificador_album($nome_album, $idalbum_imagens){

// id de usuario logado
$idusuario_logado = retorne_idusuario_logado();

// retorno
return md5($idusuario_logado.$nome_album.$idalbum_imagens);

};

?>