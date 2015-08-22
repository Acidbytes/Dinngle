<?php


// constroe adicionar amigo ------------------------------

function constroe_adicionar_amigo($idusuario){


// globals ------------------------------------------------------

global $enderecos_arquivos_php_uteis; // enderecos de arquivos php

global $numero_maximo_amigos_usuario_adicionar; // numero maximo de amigos que o usuario pode ter

// ----------------------------------------------------------------


// id de usuario logado ------------------------------------

$idusuario_logado = retorne_idusuario_logado(); // id de usuario logado

// ----------------------------------------------------------------


// status de amizade ---------------------------------------

$status_amizade = retorne_status_amizade($idusuario); // status de amizade

// ---------------------------------------------------------------


// endereco de script para nova amizade -------------

$endereco_script_novo_amigo = $enderecos_arquivos_php_uteis['adicionar_novo_amigo']; // endereco de script para nova amizade

// ---------------------------------------------------------------


// resposta pode adicionar novo amigo ----------------

$pode_adicionar_amigo = retorne_pode_adicionar_amigo(); // resposta pode adicionar novo amigo

// ---------------------------------------------------------------


// resposta de usuario dono do perfil -------------------

$usuario_dono_perfil = retorna_usuario_vendo_perfil_dono(); // resposta de usuario dono do perfil

// ----------------------------------------------------------------


// verifica se pode adicionar nova amizade ------------

if(($status_amizade == 1 or $status_amizade == null) and $pode_adicionar_amigo == false){


// mensagem de sistema ----------------------------------

$mensagem_sistema .= "Você tem amigos demais."; // mensagem de sistema
$mensagem_sistema .= "<br>"; // mensagem de sistema
$mensagem_sistema .= "Só são permitidos $numero_maximo_amigos_usuario_adicionar amigos."; // mensagem de sistema

// -----------------------------------------------------------------


// retorno de mensagem ------------------------------------

return div_especial_mensagem_sistema("Adicionar amigo", $mensagem_sistema);

// -----------------------------------------------------------------


};

// ---------------------------------------------------------------


// verifica tipo de amizade --------------------------------

switch($status_amizade){


case 1: // adiciona
$botao_amizade[0] = "<input type='submit' class='botao_adicionar' title='+ Adicionar' value='+ Adicionar'>"; // botao de amizade
break;


case 2: // excluir
$botao_amizade[0] = "<input type='submit' class='botao_cancela' title='Excluir amizade' value='Excluir amizade' onclick='dialogo_excluir_cancelar_amizade($idusuario);'>"; // botao de amizade
// titulo da janela ------------------------------------------
$titulo_janela = "Excluir?"; // titulo da janela
// --------------------------------------------------------------
break;


case 3: // cancelar
$botao_amizade[0] = "<input type='submit' class='botao_cancela' title='Cancelar solicitação' value='Cancelar solicitação' onclick='dialogo_excluir_cancelar_amizade($idusuario);'>"; // botao de amizade
// titulo da janela ------------------------------------------
$titulo_janela = "Cancelar solicitação?"; // titulo da janela
// --------------------------------------------------------------
break;


case 4: // aceitar
$botao_amizade[0] = "<input type='submit' class='botao_adicionar' title='Aceitar' value='Aceitar'>"; // botao de amizade
$botao_amizade[1] = "<input type='submit' class='botao_cancela' title='Rejeitar' value='Rejeitar'>"; // botao de amizade
$campo_confirma_rejeitar = "<input type='hidden' name='rejeitar' value='1'>"; // campo confirma rejeitar
break;


default: // adiciona
$botao_amizade[0] = "<input type='submit' class='botao_adicionar' title='+ Adicionar' value='+ Adicionar'>"; // botao de amizade


};

// ---------------------------------------------------------------


// codigo html bruto ----------------------------------------

if($idusuario != $idusuario_logado){


// adiciona campo rejeitar se necessario -------------

if($status_amizade != 4){

$codigo_html_bruto .= "<div class='div_campo_amizade'>";
$codigo_html_bruto .= "<form action='$endereco_script_novo_amigo' method='post'>";
$codigo_html_bruto .= "<input type='hidden' name='idamigo' value='$idusuario'>";
$codigo_html_bruto .= $botao_amizade[0];
$codigo_html_bruto .= "</form>";
$codigo_html_bruto .= "</div>";

}else{

$codigo_html_bruto .= "<div class='div_campo_amizade'>";
$codigo_html_bruto .= "<form action='$endereco_script_novo_amigo' method='post'>";
$codigo_html_bruto .= "<input type='hidden' name='idamigo' value='$idusuario'>";
$codigo_html_bruto .= $botao_amizade[0];
$codigo_html_bruto .= "</form>";
$codigo_html_bruto .= "</div>";
$codigo_html_bruto .= "<div class='div_campo_amizade'>";
$codigo_html_bruto .= "<form action='$endereco_script_novo_amigo' method='post'>";
$codigo_html_bruto .= "<input type='hidden' name='idamigo' value='$idusuario'>";
$codigo_html_bruto .= $botao_amizade[1];
$codigo_html_bruto .= $campo_confirma_rejeitar;
$codigo_html_bruto .= "</form>";
$codigo_html_bruto .= "</div>";

};

// --------------------------------------------------------------

}else{

return null; // retorno nulo

};

// --------------------------------------------------------------


// cancelar ou Excluir --------------------------

if($status_amizade == 2 or $status_amizade == 3){


// link para perfil de usuario -----------------------------

$link_perfil_usuario = retorna_link_perfil_usuario($idusuario); // link para perfil de usuario

// ---------------------------------------------------------------


// id de janela -----------------------------------------------

$div_id_janela_cancelar_excluir_amizade = "div_id_janela_cancelar_excluir_amizade_".$idusuario;

// ---------------------------------------------------------------


// status de amizade ---------------------------------------

switch($status_amizade){


case 2:
$mensagem_excluir_cancelar .= "Deseja excluir $link_perfil_usuario da sua lista de amigos?"; // mensagem excluir cancelar
$mensagem_excluir_cancelar .= "<br>"; // mensagem excluir cancelar
$mensagem_excluir_cancelar .= "<br>"; // mensagem excluir cancelar
break;


case 3:
$mensagem_excluir_cancelar .= "Canelar solicitação de amizade para $link_perfil_usuario?"; // mensagem excluir cancelar
$mensagem_excluir_cancelar .= "<br>"; // mensagem excluir cancelar
$mensagem_excluir_cancelar .= "<br>"; // mensagem excluir cancelar
break;


};

// ---------------------------------------------------------------


// completa codigo html bruto ---------------------------

$codigo_html_bruto = $mensagem_excluir_cancelar.$codigo_html_bruto; // completa codigo html bruto

// ---------------------------------------------------------------


// janela de dialogo ----------------------------------------

$codigo_html_bruto = janela_mensagem_dialogo($titulo_janela, $codigo_html_bruto, $div_id_janela_cancelar_excluir_amizade); // janela de dialogo

// ---------------------------------------------------------------


// codigo html bruto ----------------------------------------

$codigo_html_bruto .= "<div class='div_campo_amizade'>";
$codigo_html_bruto .= $botao_amizade[0];
$codigo_html_bruto .= "</div>";

// ---------------------------------------------------------------


};

// --------------------------------------------------------------


// adiciona campo bloquear usuario ------------------

$codigo_html_bruto .= constroe_campo_bloquear_usuario(); // campo bloquear usuario

// --------------------------------------------------------------


// retorno ----------------------------------------------------

return $codigo_html_bruto; // retorno

// --------------------------------------------------------------


};

// --------------------------------------------------------


?>