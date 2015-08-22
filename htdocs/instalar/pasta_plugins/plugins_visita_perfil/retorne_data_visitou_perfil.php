<?php


// retorna a data que visitou o perfil -------------

function retorne_data_visitou_perfil($idusuario){


// globals ----------------------------------------------

global $tabela_banco; // tabela de banco de dados

// --------------------------------------------------------


// id de usuario logado -----------------------------

$idusuario_logado = retorne_idusuario_logado(); // id de usuario logado

// --------------------------------------------------------


// query ------------------------------------------------

$query = "select *from $tabela_banco[13] where idusuario='$idusuario_logado' and idamigo='$idusuario';"; // query

// --------------------------------------------------------


// dados -----------------------------------------------

$dados = retorne_dados_query($query); // dados

// --------------------------------------------------------


// data visita ------------------------------------------

$data_visita = $dados['data_visita']; // data visita

// --------------------------------------------------------


// converte para data amigavel -------------------

$data_visita = converte_data_amigavel($data_visita); // convertendo

// --------------------------------------------------------


// retorno ----------------------------------------------

return $data_visita; // retorno

// --------------------------------------------------------


};

// --------------------------------------------------------


?>