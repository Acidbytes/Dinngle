<?php


// retorna se o usuario do perfil e o dono -------

function retorna_usuario_vendo_perfil_dono(){


// dados de id de usuario ---------------------------

$idusuario_get = retorne_idusuario_get(); // id de usuario modo get

$idusuario_logado = retorne_idusuario_logado(); // id de usuario logado

$usuario_esta_logado_resposta = retorne_esta_logado(); // retorna se usuario esta logado

// ---------------------------------------------------------


// retorna se e o dono do perfil --------------------

if($idusuario_get == $idusuario_logado and $usuario_esta_logado_resposta == true){

return true; // e o dono do perfil

}else{

return false; // nao e o dono

};

// ---------------------------------------------------------


};

// --------------------------------------------------------


?>