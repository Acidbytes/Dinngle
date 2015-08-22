<?php


// campo criar depoimento ------------------------

function campo_criar_depoimento(){


// globals -----------------------------------------------

global $enderecos_arquivos_php_uteis; // arquivos php uteis

// ---------------------------------------------------------


// usuario dono do perfil ----------------------------

$usuario_dono_perfil = retorna_usuario_vendo_perfil_dono(); // usuario dono do perfil

// ---------------------------------------------------------


// id de usuario ----------------------------------------

$idusuario = retorne_idusuario_visualizando_perfil(); // id de usuario

// ---------------------------------------------------------


// status de amizade ---------------------------------

$status_amizade = retorne_status_amizade($idusuario); // status de amizade

// ---------------------------------------------------------


// nao permite criar depoimento para si mesmo --

if($usuario_dono_perfil == true or $status_amizade != 2){

return null; // retorno nulo

};

// ---------------------------------------------------------


// nome usuario recebe depoimento -------------

$nome_usuario = func_retorna_nome_de_usuario_por_id($idusuario); // nome usuario recebe depoimento

// ---------------------------------------------------------


// url para enviar depoimento ----------------------

$url_enviar_depoimento = $enderecos_arquivos_php_uteis['enviar_depoimento']; // url para enviar depoimento

// ---------------------------------------------------------


// codigo html bruto ----------------------------------

$codigo_html_bruto .= "<form action='$url_enviar_depoimento' method='post'>";
$codigo_html_bruto .= "<textarea cols='70' rows='5' name='depoimento' class='classe_campos_textaera_gerais' placeholder='Escreva um depoimento para $nome_usuario'></textarea>";
$codigo_html_bruto .= "<input type='hidden' name='idusuario' value='$idusuario'>";
$codigo_html_bruto .= "<input type='submit' value='Enviar' class='botao_padrao'>";
$codigo_html_bruto .= "</form>";

// --------------------------------------------------------


// div especial basica campo ---------------------

$codigo_html_bruto = div_especial_basica_campos($codigo_html_bruto); // div especial basica campo

// --------------------------------------------------------


// retorno ----------------------------------------------

return $codigo_html_bruto; // retorno

// --------------------------------------------------------


};

// --------------------------------------------------------


?>