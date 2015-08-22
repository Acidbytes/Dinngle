<?php


// envia mensagem para chat --------------------

function enviar_mensagem_chat(){


// globals ----------------------------------------------

global $tabela_banco; // tabela de banco de dados

global $separador_mensagem_chat; // separador de mensagens de chat

// --------------------------------------------------------


// dados de formulario -----------------------------

$conteudo_mensagem_chat = remove_html($_POST['conteudo_mensagem_chat']); // conteudo da mensagem

// --------------------------------------------------------


// retorna id de usuario de chat ----------------

$idusuario = retorne_idusuario_sessao_chat(null, false); // retorna id de usuario de chat

// ---------------------------------------------------------


// valida conteudo de mensagem -------------

if($conteudo_mensagem_chat == null or $idusuario == null){

return null; // retorno nulo

};

// --------------------------------------------------------


// id de usuario logado -----------------------------

$idusuario_logado = retorne_idusuario_logado(); // id de usuario logado

// ---------------------------------------------------------


// cria registro de troca de mensagens ------

criar_registros_conversa_chat($idusuario); // cria registro de troca de mensagens

// ---------------------------------------------------------


// data atual --------------------------------------------

$data_atual = data_atual(); // data atual

$data_atual_normal = hora_atual(); // data atual normal

// ---------------------------------------------------------


// dados da mensagem -----------------------------

$dados_mensagem[0] = dados_mensagem(0); // dados da mensagem
$dados_mensagem[1] = dados_mensagem(1); // dados da mensagem

// ---------------------------------------------------------


// monta data de envio ------------------------------

$data_completa_envio = "Ás ".$data_atual_normal.$separador_mensagem_chat[3]; // monta data

$data_completa_envio = converte_para_utf8($data_completa_envio); // converte para utf-8

// ---------------------------------------------------------


// adiciona data ---------------------------------------

$conteudo_mensagem_chat = $data_completa_envio.$conteudo_mensagem_chat; // adiciona data

// ---------------------------------------------------------


// mensagem de usuario ---------------------------

$mensagem[0] = $dados_mensagem[0]['mensagem'].$separador_mensagem_chat[0].$conteudo_mensagem_chat.$separador_mensagem_chat[2]; // mensagem de usuario
$mensagem[1] = $dados_mensagem[1]['mensagem'].$separador_mensagem_chat[1].$conteudo_mensagem_chat.$separador_mensagem_chat[2]; // mensagem de usuario

// ---------------------------------------------------------


// querys ------------------------------------------------

$query[] = "update $tabela_banco[22] set mensagem='$mensagem[0]', data_mensagem='$data_atual', visualizada='0' where idusuario='$idusuario_logado' and idamigo='$idusuario';"; // query
$query[] = "update $tabela_banco[22] set mensagem='$mensagem[1]', data_mensagem='$data_atual', visualizada='1' where idusuario='$idusuario' and idamigo='$idusuario_logado';"; // query

// ---------------------------------------------------------


// salvando mensagens ----------------------------

executador_querys($query); // salvando mensagens

// ---------------------------------------------------------


};

// --------------------------------------------------------


?>