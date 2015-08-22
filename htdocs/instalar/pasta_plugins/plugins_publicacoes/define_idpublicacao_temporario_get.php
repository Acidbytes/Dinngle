<?php


// define o id de publicacao no modo get ------

function define_idpublicacao_temporario_get($idpublicacao, $modo_tipo){


// identificador de array global get ---------------

$identificador_md5 = md5("000"); // identificador

// ---------------------------------------------------------


// verifica modo tipo ---------------------------------

if($modo_tipo == true){

$_GET[$identificador_md5] = $idpublicacao; // atualizando array

}else{

return $_GET[$identificador_md5]; // retorno

};

// ---------------------------------------------------------


};

// --------------------------------------------------------


?>