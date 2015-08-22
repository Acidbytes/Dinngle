<?php


// carrega todos os eventos do usuario ---------

function carregar_todos_eventos_usuario(){


// id de usuario logado -----------------------------

$idusuario_logado = retorne_idusuario_logado(); // id de usuario logado

// --------------------------------------------------------


// array com amigos de usuario ------------------

$array_amigos = retorne_array_amigos_listados($idusuario_logado); // array amigos

// --------------------------------------------------------


// atualiza array com idusuario logado ---------

$array_amigos[] = $idusuario_logado; // atualizando...

// --------------------------------------------------------


// obtendo dados de idusuario amigo -----------

foreach($array_amigos as $idamigo){


// valida idamigo -------------------------------------

if($idamigo != null){

$codigo_html_bruto .= exibe_evento_usuario($idamigo);

};

// --------------------------------------------------------


};

// --------------------------------------------------------


// numero de todos os eventos -------------------

$numero_resultados = retorne_numero_eventos(); // numero de todos os eventos

// --------------------------------------------------------


// paginacao ------------------------------------------

$codigo_html_bruto .= monta_paginas_paginacao($numero_resultados);

// --------------------------------------------------------


// retorno ----------------------------------------------

return $codigo_html_bruto; // retorno

// --------------------------------------------------------


};

// --------------------------------------------------------


?>