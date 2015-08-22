<?php


// gera a id de album de postagem de usuario -

function gera_idalbum_postagem_usuario(){


// id de usuario logado -----------------------------

$idusuario = retorne_idusuario_logado(); // id de usuario logado

// --------------------------------------------------------


// data atual -------------------------------------------

$data_atual = data_atual(); // data atual

// --------------------------------------------------------


// string a ser codificada ---------------------------

$string_codificar = $idusuario.$data_atual; // string a ser codificada

// --------------------------------------------------------


// cifrando e obtendo id de album de imagens

$idalbum_imagens = md5($string_codificar);

// --------------------------------------------------------


// retorno ----------------------------------------------

return $idalbum_imagens; // retorno

// -------------------------------------------------------


};

// --------------------------------------------------------


?>