<?php


// retorna idamigos online --------------------------

function retorne_idamigos_online($modo_usuarios){


// idusuario logado -----------------------------------

$idusuario_logado = retorne_idusuario_logado(); // idusuario logado

// ---------------------------------------------------------


// idusuarios online ----------------------------------

$idamigos_array = retorne_array_amigos_listados_sem_limit($idusuario_logado); // idusuarios online

// ---------------------------------------------------------


// array de retorno ------------------------------------

$array_retorno = array(); // array de retorno

// ---------------------------------------------------------


// cria condicao ---------------------------------------

switch($modo_usuarios){


case 1:
$condicao = true; // online
break;


case 2:
$condicao = false; // onffline
break;


};

// ---------------------------------------------------------


// obtendo idusuarios amigos ---------------------

foreach($idamigos_array as $idamigo){


// usuario online -------------------------------------

$usuario_online = retorne_usuario_online($idamigo); // usuario online

// ---------------------------------------------------------


// verifica se esta online ----------------------------

if($usuario_online == $condicao){

$array_retorno[] = $idamigo; // atualiza o array

};

// ---------------------------------------------------------


};

// ---------------------------------------------------------


// retorno -----------------------------------------------

return $array_retorno; // retorno

// ---------------------------------------------------------


};

// --------------------------------------------------------


?>