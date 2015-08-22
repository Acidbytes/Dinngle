<?php


// retorna o numero total de imagens no album do usuario -----------

function retorne_numero_total_imagens_albuns_usuario(){


// tabela de banco -----------------------------------

global $tabela_banco; // tabela de banco

// --------------------------------------------------------


// id de usuario ---------------------------------------

$idusuario = retorne_idusuario_visualizando_perfil(); // id de usuario

// --------------------------------------------------------


// id de album no modo get -----------------------

$idalbum_nome = retorne_idalbum_nome_get(); // id de album no modo get

// --------------------------------------------------------


// query ------------------------------------------------

if($idalbum_nome == null){

$query = "select *from $tabela_banco[6] where idusuario='$idusuario';"; // query

}else{

$query = "select *from $tabela_banco[6] where idusuario='$idusuario' and nome_album_identificador='$idalbum_nome';"; // query

};

// --------------------------------------------------------


// numero de linhas ---------------------------------

$numero_linhas = retorne_numero_linhas_query($query); // numero de linhas

// --------------------------------------------------------


// retorna numero de linhas -----------------------

return $numero_linhas; // retorna numero de linhas

// --------------------------------------------------------


};

// -----------------------------------------------------------------------------------


?>