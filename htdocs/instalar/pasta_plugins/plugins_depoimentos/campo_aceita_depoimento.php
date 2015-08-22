<?php


// campo aceita depoimento ----------------------

function campo_aceita_depoimento($dados){


// globals ----------------------------------------------

global $enderecos_arquivos_php_uteis; // enderecos de arquivos uteis

// --------------------------------------------------------


// dados -----------------------------------------------

$id = $dados['id']; // dados

$idamigo = $dados['idamigo']; // id do amigo

// --------------------------------------------------------


// id de usuario logado ----------------------------

$idusuario_logado = retorne_idusuario_logado(); // id de usuario logado

// -------------------------------------------------------


// status de depoimento ---------------------------

$status_depoimento = retorne_status_depoimento($dados); // status de depoimento

// --------------------------------------------------------


// usuario dono do perfil --------------------------

$usuario_dono_perfil = retorna_usuario_vendo_perfil_dono(); // usuario dono do perfil

// -------------------------------------------------------


// verifica se e o dono do depoimento ---------

if($idamigo != $idusuario_logado and $usuario_dono_perfil == false){

return null; // retorno nulo

};

// -------------------------------------------------------


// script aceitar depoimento ----------------------

$script_aceitar_depoimento = $enderecos_arquivos_php_uteis['aceitar_depoimento']; // script aceitar depoimento

// -------------------------------------------------------


// tipo de depoimento -----------------------------

$tipo_depoimento = retorne_tipo_depoimento_get(); // tipo de depoimento

// ------------------------------------------------------


// classe da div excluir depoimento ------------

$classe_div_excluir_depoimento = "div_campo_aceita_depoimento"; // classe

// -------------------------------------------------------


// tipo de depoimento -----------------------------

switch($status_depoimento){


case 1:

// campo para gerenciar depoimento ------------------

$campo_gerenciar_depoimento .= "Excluir este depoimento?"; // campo para gerenciar depoimento
$campo_gerenciar_depoimento .= "<br>"; // campo para gerenciar depoimento
$campo_gerenciar_depoimento .= "<br>"; // campo para gerenciar depoimento

// ---------------------------------------------------------------


// excluindo classe de div --------------------------------

$classe_div_excluir_depoimento = null; // excluindo classe de div

// ---------------------------------------------------------------


// exclui aceitos enviei/enviou ---------------------------

if($idamigo != $idusuario_logado){

$campo_gerenciar_depoimento .= "<input type='submit' class='botao_padrao' value='Excluir depoimento'>"; // campo para gerenciar depoimento
$campo_gerenciar_depoimento .= "<input type='hidden' name='aceitar' value='2'>"; // campo para gerenciar depoimento
$campo_gerenciar_depoimento .= "<input type='hidden' name='id' value='$id'>"; // campo para gerenciar depoimento

}else{

$campo_gerenciar_depoimento .= "<input type='submit' class='botao_padrao' value='Excluir depoimento'>"; // campo para gerenciar depoimento
$campo_gerenciar_depoimento .= "<input type='hidden' name='aceitar' value='4'>"; // campo para gerenciar depoimento
$campo_gerenciar_depoimento .= "<input type='hidden' name='id' value='$id'>"; // campo para gerenciar depoimento

};

// --------------------------------------------------------
break;


case 2:

// verifica se cancela envio de depoimento ---

if($idamigo != $idusuario_logado){

$campo_gerenciar_depoimento .= "<input type='submit' class='botao_padrao' value='Aceitar'>"; // campo para gerenciar depoimento
$campo_gerenciar_depoimento .= "<input type='hidden' name='aceitar' value='1'>"; // campo para gerenciar depoimento
$campo_gerenciar_depoimento .= "<input type='hidden' name='id' value='$id'>"; // campo para gerenciar depoimento


// campo rejeitar depoimento -------------------

$campo_rejeitar_depoimento .= "<form action='$script_aceitar_depoimento' method='post'>"; // campo rejeitar depoimento
$campo_rejeitar_depoimento .= "<input type='submit' class='botao_cancela' value='Rejeitar depoimento'>"; // campo para gerenciar depoimento
$campo_rejeitar_depoimento .= "<input type='hidden' name='aceitar' value='5'>"; // campo para gerenciar depoimento
$campo_rejeitar_depoimento .= "<input type='hidden' name='id' value='$id'>"; // campo para gerenciar depoimento
$campo_rejeitar_depoimento .= "</form>"; // campo rejeitar depoimento

// ------------------------------------------------------


}else{

$campo_gerenciar_depoimento .= "<input type='submit' class='botao_cancela' value='Cancelar'>"; // campo para gerenciar depoimento
$campo_gerenciar_depoimento .= "<input type='hidden' name='aceitar' value='3'>"; // campo para gerenciar depoimento
$campo_gerenciar_depoimento .= "<input type='hidden' name='id' value='$id'>"; // campo para gerenciar depoimento

};

// -------------------------------------------------------
break;


};

// --------------------------------------------------------


// campo para gerenciar depoimento -----------

$campo_gerenciar_depoimento .= "<input type='hidden' name='tipo_depoimento' value='$tipo_depoimento'>"; // campo para gerenciar depoimento
$campo_gerenciar_depoimento .= "<input type='hidden' name='idusuario' value='$idamigo'>"; // campo para gerenciar depoimento

// --------------------------------------------------------


// codigo html bruto ---------------------------------

$codigo_html_bruto .= "<div class='$classe_div_excluir_depoimento'>";
$codigo_html_bruto .= "<form action='$script_aceitar_depoimento' method='post'>";
$codigo_html_bruto .= $campo_gerenciar_depoimento;
$codigo_html_bruto .= "</form>";
$codigo_html_bruto .= $campo_rejeitar_depoimento;
$codigo_html_bruto .= "</div>";

// ---------------------------------------------------------


// adiciona dialogo em caso de exclusao -------

if($status_depoimento == 1){


// titulo --------------------------------------------------

$titulo_janela = "Excluir depoimento"; // titulo

// ---------------------------------------------------------


// id da div ----------------------------------------------

$div_id = "div_dialogo_excluir_depoimento_$id"; // id da div

// ---------------------------------------------------------


// botao excluir depoimento ------------------------

$botao_excluir_depoimento = "<input type='button' class='botao_padrao' value='Excluir depoimento' onclick='exibe_dialogo_excluir_depoimento_usuario($id)'>"; // botao excluir depoimento

// ---------------------------------------------------------


// adiciona dialogo -----------------------------------

$codigo_html_bruto = janela_mensagem_dialogo($titulo_janela, $codigo_html_bruto, $div_id); // adiciona dialogo

// ---------------------------------------------------------


// adiciona botao excluir ----------------------------

$codigo_html_bruto .= $botao_excluir_depoimento; // adiciona botao excluir

// ---------------------------------------------------------


};

// ---------------------------------------------------------


// retorno -----------------------------------------------

return $codigo_html_bruto; // retorno

// ---------------------------------------------------------


};

// --------------------------------------------------------


?>