<?php


// constroe o perfil de usuario do chat ----------

function constroe_perfil_chat_usuario($idusuario){


// nome usuario -------------------------------------

$nome_usuario = converte_para_utf8(func_retorna_nome_de_usuario_por_id($idusuario)); // nome do usuario

// -------------------------------------------------------


// imagem do usuario ------------------------------

$imagem_usuario = retorna_imagem_perfil_miniatura($idusuario); // imagem do usuario
$imagem_usuario = "<img src='$imagem_usuario' title='$nome_usuario' class='imagem_miniatura_perfil_chat'>"; // imagem do usuario

// -------------------------------------------------------


// mensagem nova existe ------------------------

$mensagem_nova_existe = retorne_existe_mensagem_nova_chat($idusuario); // mensagem nova existe

// -------------------------------------------------------


// verifica se ha mensagem nova ---------------

if($mensagem_nova_existe == true){

$campo_existe_nova_mensagem .= "<span id='span_campo_existe_nova_mensagem_$idusuario' class='label label-danger'>"; // campo existe nova mensagem
$campo_existe_nova_mensagem .= "1"; // campo existe nova mensagem
$campo_existe_nova_mensagem .= "</span>"; // campo existe nova mensagem
$campo_existe_nova_mensagem .= "&nbsp;"; // campo existe nova mensagem

}else{

$campo_existe_nova_mensagem .= "<span id='span_campo_existe_nova_mensagem_$idusuario' class='label label-danger'>"; // campo existe nova mensagem
$campo_existe_nova_mensagem .= ""; // campo existe nova mensagem
$campo_existe_nova_mensagem .= "</span>"; // campo existe nova mensagem
$campo_existe_nova_mensagem .= "&nbsp;"; // campo existe nova mensagem


};

// -------------------------------------------------------


// codigo html bruto --------------------------------

$codigo_html_bruto .= $imagem_usuario;
$codigo_html_bruto .= campo_usuario_online_chat($idusuario);
$codigo_html_bruto .= $campo_existe_nova_mensagem;
$codigo_html_bruto .= $nome_usuario;

// -------------------------------------------------------


// retorno ----------------------------------------------

return $codigo_html_bruto; // retorno

// --------------------------------------------------------


};

// --------------------------------------------------------


?>