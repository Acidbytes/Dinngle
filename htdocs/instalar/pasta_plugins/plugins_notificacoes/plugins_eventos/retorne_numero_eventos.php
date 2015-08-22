<?php


// retorne numero de eventos --------------------

function retorne_numero_eventos(){


// globals ----------------------------------------------

global $tabela_banco; // tabela

// --------------------------------------------------------


// id de usuario logado -----------------------------

$idusuario_logado = retorne_idusuario_logado(); // id de usuario logado

// --------------------------------------------------------


// array com amigos de usuario ------------------

$array_amigos = retorne_array_amigos_listados_sem_limit($idusuario_logado); // array amigos

// --------------------------------------------------------


// atualiza array com idusuario logado ---------

$array_amigos[] = $idusuario_logado; // atualizando...

// --------------------------------------------------------


// numero de eventos -------------------------------

$numero_eventos = 0; // numero de eventos

// --------------------------------------------------------


// obtendo dados de idusuario amigo -----------

foreach($array_amigos as $idamigo){


// valida idamigo -------------------------------------

if($idamigo != null){


// query ------------------------------------------------

$query = "select *from $tabela_banco[20] where idusuario='$idamigo';"; // query

// --------------------------------------------------------


// atualiza numero de eventos -------------------

$numero_eventos += retorne_numero_linhas_query($query); // atualiza numero de eventos

// --------------------------------------------------------


};

// --------------------------------------------------------


};

// --------------------------------------------------------


// retorno ----------------------------------------------

return $numero_eventos; // retorno

// --------------------------------------------------------


};

// --------------------------------------------------------


?>