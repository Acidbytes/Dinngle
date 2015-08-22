<?php


// carrega os amigos do chat ---------------------

function carrega_amigos_chat(){


// id de usuario logado -----------------------------

$idusuario = retorne_idusuario_logado(); // id de usuario logado

// --------------------------------------------------------


// tipo de mensagem de chat ---------------------

$tipo_mensagem_chat = retorne_tipo_mensagem_chat_carregar(false, null); // tipo de mensagem de chat

// --------------------------------------------------------


// array ids amigos usuario -----------------------

if($tipo_mensagem_chat == 1){

$array_amigos = retorne_idusuarios_novas_mensagens(); // array ids amigos mensagens novas

}else{

$array_amigos = retorne_array_amigos_listados($idusuario); // array ids amigos usuario

};

// --------------------------------------------------------


// se nao houver mais amigos retorne nulo ---

if(count($array_amigos) == 0){

return null; // retorno nulo

};

// --------------------------------------------------------


// atualiza sessao ids usuarios disponiveis ----

atualizar_sessao_idusuarios_disponiveis_chat($array_amigos); // atualiza a sessao de ids de usuarios disponiveis

// --------------------------------------------------------


// codigo html bruto ---------------------------------

$codigo_html_bruto .= constroe_amigos_chat($array_amigos);

// --------------------------------------------------------


// retorno ----------------------------------------------

return $codigo_html_bruto; // retorno

// --------------------------------------------------------


};

// --------------------------------------------------------


?>