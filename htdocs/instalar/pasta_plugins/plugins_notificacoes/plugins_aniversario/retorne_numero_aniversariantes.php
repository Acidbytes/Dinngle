<?php


// retorna o numero de aniverariantes -----------

function retorne_numero_aniversariantes($modo_retorno){


// 1 retorna numero
// 2 retorna lista com amigos aniversariantes


// globals ------------------------------------------------

global $tabela_banco; // tabela de banco

// ----------------------------------------------------------


// id de usuario ----------------------------------------

$idusuario = retorne_idusuario_logado(); // id de usuario

// ----------------------------------------------------------


// dados de usuarios ----------------------------------

switch($modo_retorno){


case 1: // todos
$dados_array = retorne_array_amigos_listados_sem_limit($idusuario); // dados de usuarios
break;


case 2: // retorna lista
$dados_array = retorne_array_amigos_listados($idusuario); // dados de usuarios
break;


};

// ----------------------------------------------------------


// contador de retorno --------------------------------

$contador_retorno = 0; // contador

// ----------------------------------------------------------


// obtendo id de amigo -------------------------------

foreach($dados_array as $idamigo){


// verifica se id de amigo e valido ------------------

if($idamigo != null){


// verifica o modo de retorno ------------------------

switch($modo_retorno){


case 1:
if(retorna_aniversario($idamigo) == true){
$contador_retorno++; // contador de retorno
};
break;


case 2:
if(retorna_aniversario($idamigo) == true){
$arrays_idusuarios[] = $idamigo; // atualiza array
};
break;


default:
if(retorna_aniversario($idamigo) == true){
$contador_retorno++; // contador de retorno
};


};

// ----------------------------------------------------------


};

// ----------------------------------------------------------


};

// ----------------------------------------------------------


// verifica o modo de retorno ------------------------

switch($modo_retorno){


case 1:
return $contador_retorno; // retorno
break;




case 2:


// numero de amigos aceitos ----------------------------

$numero_amigos = retorne_numero_amizades_solicitacoes(1); // numero de amigos aceitos

// ---------------------------------------------------------------


// codigo html bruto ----------------------------------------

$codigo_html_bruto .= monta_pacotes_usuarios($arrays_idusuarios, 2);
$codigo_html_bruto .= monta_paginas_paginacao($numero_amigos);

// ---------------------------------------------------------------


// retorna pacotes com usuarios ------------------------

return $codigo_html_bruto; // retorna pacotes com usuarios

// ---------------------------------------------------------------


break;




default: 
return $contador_retorno; // retorno


};

// ----------------------------------------------------------


};

// --------------------------------------------------------


?>