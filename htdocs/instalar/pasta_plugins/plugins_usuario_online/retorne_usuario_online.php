<?php


// retorna se o usuario esta online ---------------

function retorne_usuario_online($idusuario){


// globals -----------------------------------------------

global $tempo_usuario_conexao_offline; // tempo de conexao que considera o usuario offline

// ---------------------------------------------------------


// dados de conexao de usuario ------------------

$dados = dados_usuario_online_conexao($idusuario); // dados

// ---------------------------------------------------------


// data da conexao -----------------------------------

$data_conexao = $dados['data_conexao']; // data da conexao

// ---------------------------------------------------------


// valida data de conexao ---------------------------

if($data_conexao == null){

return false; // offline

};

// ---------------------------------------------------------


// diferenca entre conexoes ------------------------

$diferenca_data_conexao = diferenca_data_conexao($data_conexao); // diferenca entre conexoes

// ---------------------------------------------------------


// verifica diferenca e retorna ----------------------

if($diferenca_data_conexao > $tempo_usuario_conexao_offline){

return false; // offline

}else{

return true; // online

};

// ---------------------------------------------------------


};

// --------------------------------------------------------


?>