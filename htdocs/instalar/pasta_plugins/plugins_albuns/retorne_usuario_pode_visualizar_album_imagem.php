<?php


// retorna se o usuario pode visualizar a imagem ou album ----

function retorne_usuario_pode_visualizar_album_imagem($privacidade){


// tipo de privacidade atual ------------------------

if($privacidade == null){

$privacidade = 1; // publico

};

// --------------------------------------------------------


// id de usuario vendo perfil -----------------------

$idusuario = retorne_idusuario_visualizando_perfil(); // id de usuario vendo perfil

// --------------------------------------------------------


// informa se o usuario e o dono do perfil ------

$usuario_dono_perfil_resposta = retorna_usuario_vendo_perfil_dono(); // informa se o usuario e o dono do perfil

// --------------------------------------------------------


// verifica se e o dono da imagem ---------------

if($usuario_dono_perfil_resposta == true or $privacidade == 1){

return true; // retorna verdadeiro

};

// --------------------------------------------------------


// status de amizade --------------------------------

$status_amizade_usuario = retorne_status_amizade($idusuario); // status de amizade

// --------------------------------------------------------


// se for amigo automaticamente pode visualizar -------------

if($status_amizade_usuario == 2 and $privacidade == 2){

return true; // pode visualizar

}else{

return false; // nao pode visualizar

};

// -------------------------------------------------------------------------


};

// -----------------------------------------------------------------------------


?>