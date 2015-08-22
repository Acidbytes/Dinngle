<?php


// constroe o topo da pagina ---------------------------------

function constroe_topo_pagina(){


// informa se o usuario esta logado ---------------------

$usuario_logado = retorne_esta_logado(); // informa se o usuario esta logado

// -------------------------------------------------------------------


// id de usuario ---------------------------------------------------

$idusuario = retorne_idusuario_visualizando_perfil(); // id de usuario

// ----------------------------------------------------------------------


// constroe formularioe e paineis -------------

if($usuario_logado == true){


// painel logout
$painel_logout = painel_login_logout_usuario(); // painel logout


// painel de notificacoes
$painel_notificacaoes = constroe_campo_iniciar_notificacoes(); // painel de notificacoes


// formulario de pesquisa geral
$formulario_topo = campo_pesquisa_geral(true);


}else{


// formulario de login
$formulario_topo .= formulario_login_usuario(); // formulario de pesquisa geral


};

// -------------------------------------------------------------------


// codigo html bruto --------------------------------------------

$codigo_html_bruto .= constroe_logotipo_sistema(1);
$codigo_html_bruto .= $formulario_topo;
$codigo_html_bruto .= $painel_logout;
$codigo_html_bruto .= $painel_notificacaoes;

// ------------------------------------------------------------------


// retorno --------------------------------------------------------

return $codigo_html_bruto; // retorno

// ------------------------------------------------------------------


};

// ------------------------------------------------------------------


?>