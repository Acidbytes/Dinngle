<?php

// seta as notificacoes como visualizadas
function seta_notificacoes_visualizadas(){


// global -----------------------------------------------

global $tabela_banco; // tabela de banco de dados

// --------------------------------------------------------


// id de usuario logado --------------------------

$idusuario = retorne_idusuario_logado(); // id de usuario logado

// --------------------------------------------------------


// query -----------------------------------------------

$query = "update $tabela_banco[24] set visualizada='1' where idamigo='$idusuario' and visualizada='0';"; // query

// -------------------------------------------------------


// comando executa -----------------------------

comando_executa($query); // comando executa

// -------------------------------------------------------


};

?>