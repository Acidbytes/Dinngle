<?php


// constroe campo bloquear usuario ------------

function constroe_campo_bloquear_usuario(){


// globals ----------------------------------------------

global $url_pagina_inicial_site; // url de pagina inicial

global $enderecos_arquivos_php_uteis; // arquivos php uteis

// --------------------------------------------------------


// usuario dono do perfil ---------------------------

$usuario_dono_perfil = retorna_usuario_vendo_perfil_dono(); // usuario dono do perfil

// --------------------------------------------------------


// status de amizade --------------------------------

$status_amizade = retorne_status_amizade(retorne_idusuario_visualizando_perfil());

// --------------------------------------------------------


// se for o dono do perfil retorne nulo -----------

if($usuario_dono_perfil == true or $status_amizade != 2){

return null; // retorno nulo

};

// --------------------------------------------------------


// monta array de retorno --------------------------

$array_retorno[] = "<li role='presentation'><a href='#' onclick='dialogo_bloquear_usuario();'>Bloquear</a></li>"; // monta array de retorno

// --------------------------------------------------------


// titulo do menu -------------------------------------

$titulo_menu = "Mais"; // titulo do menu

// --------------------------------------------------------


// id de usuario ---------------------------------------

$idusuario = retorne_idusuario_visualizando_perfil(); // id de usuario

// --------------------------------------------------------


// url de script de formulario ----------------------

$url_script = $enderecos_arquivos_php_uteis['bloquear_usuario']; // url de script de formulario

// --------------------------------------------------------


// formulario de bloqueio --------------------------

$formulario_bloqueio .= "<form action='$url_script' method='post'>"; // formulario de bloqueio
$formulario_bloqueio .= "<input type='hidden' name='idusuario' value='$idusuario'>"; // formulario de bloqueio
$formulario_bloqueio .= "Bloquear esta pessoa?"; // formulario de bloqueio
$formulario_bloqueio .= "<br>"; // formulario de bloqueio
$formulario_bloqueio .= "<br>"; // formulario de bloqueio
$formulario_bloqueio .= constroe_imagem_perfil_miniatura($idusuario); // formulario de bloqueio
$formulario_bloqueio .= "&nbsp;"; // formulario de bloqueio
$formulario_bloqueio .= retorna_link_perfil_usuario($idusuario); // formulario de bloqueio
$formulario_bloqueio .= "<br>"; // formulario de bloqueio
$formulario_bloqueio .= "<br>"; // formulario de bloqueio
$formulario_bloqueio .= "<input type='submit' class='botao_padrao' value='Sim'>"; // formulario de bloqueio
$formulario_bloqueio .= "&nbsp;"; // formulario de bloqueio
$formulario_bloqueio .= "<a href='$url_pagina_inicial_site?idusuario=$idusuario' title='Não' class='botao_padrao'>Não</a>"; // formulario de bloqueio
$formulario_bloqueio .= "</form>"; // formulario de bloqueio

// -------------------------------------------------------


// titulo de janela ------------------------------------

$titulo_janela = "Bloquear usuário"; // titulo de janela

// --------------------------------------------------------


// id de div --------------------------------------------

$div_id = "div_bloquear_usuario"; // id de div

// --------------------------------------------------------


// adiciona dialogo ao formulario bloqueio ----

$formulario_bloqueio = janela_mensagem_dialogo($titulo_janela, $formulario_bloqueio, $div_id); // adiciona dialogo

// --------------------------------------------------------


// codigo html bruto ---------------------------------

$codigo_html_bruto .= "<div class='classe_div_campo_bloqueio_usuario'>";
$codigo_html_bruto .= constroe_menu_drop_especial($array_retorno, $titulo_menu);
$codigo_html_bruto .= $formulario_bloqueio;
$codigo_html_bruto .= "</div>";

// --------------------------------------------------------


// retorno ----------------------------------------------

return $codigo_html_bruto; // retorno

// --------------------------------------------------------


};

// --------------------------------------------------------


?>