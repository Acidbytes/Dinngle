<?php


// atualiza sessao ids usuarios disponiveis ----

function atualizar_sessao_idusuarios_disponiveis_chat($array_amigos){


// inicia a sessao ------------------------------------

session_start(); // inicia a sessao

// --------------------------------------------------------


// atualiza sessao -----------------------------------

$_SESSION['sessao_idusuarios_disponiveis_chat'] = $array_amigos; // atualiza sessao

// --------------------------------------------------------


};

// --------------------------------------------------------


?>