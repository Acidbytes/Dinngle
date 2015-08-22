<?php


// carregar novidades usuario ---------------------

function carregar_novidades_usuario(){


// usuario dono do perfil -----------------------------

$usuario_dono_perfil = retorna_usuario_vendo_perfil_dono(); // usuario dono do perfil

// ----------------------------------------------------------


// verifica se e o dono do perfil ---------------------

if($usuario_dono_perfil == false){

return null; // retorno nulo

};

// ----------------------------------------------------------


// codigo html bruto ----------------------------------

$codigo_html_bruto .= campo_publicar();
$codigo_html_bruto .= carregar_publicacoes_amizades();

// ----------------------------------------------------------


// retorno ------------------------------------------------

return $codigo_html_bruto; // retorno

// ----------------------------------------------------------


};

// --------------------------------------------------------


?>