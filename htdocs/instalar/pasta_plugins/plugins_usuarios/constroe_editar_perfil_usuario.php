<?php


// constroe editar perfil ------------------------------

function constroe_editar_perfil_usuario(){


// id do usuario ---------------------------------------

$idusuario = retorne_idusuario_logado(); // id do usuario

// ---------------------------------------------------------


// modo editar perfil ----------------------------------

$editar_perfil_modo = retorne_modo_editar_perfil(); // modo editar perfil

// ---------------------------------------------------------


// abas modos editar perfil -------------------------

$codigo_html_bruto .= constroe_abas_editar_perfil(); // abas modos editar perfil

// ---------------------------------------------------------


// valida super usuario ------------------------------

if(retorne_super_usuario() == true){


// carrega plugins de super usuario -------------

include("../maniparq/plugins_ajuda.php"); // carrega plugins de super usuario

// --------------------------------------------------------


}else{


// verifica se e o painel de controle -------------

if($editar_perfil_modo == 0){


// chama pagina de login -------------------------

chama_pagina_login(); // chama pagina de login

// -------------------------------------------------------


// retorno nulo ---------------------------------------

return null; // retorno nulo

// -------------------------------------------------------


};

// -------------------------------------------------------


};

// ---------------------------------------------------------


// codigo html bruto ----------------------------------

switch($editar_perfil_modo){


case 0:
$codigo_html_bruto .= monta_painel_controle(); // monta painel de controle
break;


case 1:
$codigo_html_bruto .= formulario_editar_perfil($idusuario);
break;


case 2:
$codigo_html_bruto .= formulario_cadastro_curriculo(); // formulario de cadastro de curriculo
break;


case 3:
$codigo_html_bruto .= monta_curriculo(); // monta o curriculo
break;


case 4:
$codigo_html_bruto .= formulario_alterar_imagem_fundo(); // monta formulario imagem de fundo
break;


case 5:
$codigo_html_bruto .= formulario_alterar_senha(); // formulario alterar senha
break;


case 6:
$codigo_html_bruto .= carregar_usuarios_bloqueados(); // carrega usuarios bloqueados
break;


case 7:
$codigo_html_bruto .= monta_excluir_conta_usuario(); // monta excluir conta de usuario
break;


case 8:
$codigo_html_bruto .= formulario_editar_perfil_completo(); // editar perfil completo
break;


default:
$codigo_html_bruto .= monta_painel_controle(); // monta painel de controle


};

// ---------------------------------------------------------


// retorno -----------------------------------------------

return $codigo_html_bruto; // retorno

// ---------------------------------------------------------


};

// --------------------------------------------------------


?>