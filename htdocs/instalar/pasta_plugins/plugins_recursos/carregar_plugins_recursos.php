<?php


// carregar plugins recursos -----------------------

function carregar_plugins_recursos(){


// usuario esta logado -------------------------------

$usuario_logado = retorne_esta_logado(); // usuario esta logado

// ---------------------------------------------------------


// verifica se o usuario esta logado ---------------

if($usuario_logado == false){

return null; // retorno nulo

};

// ---------------------------------------------------------


// codigo html bruto ----------------------------------

$codigo_html_bruto .= adicionar_visita_perfil();
$codigo_html_bruto .= carrega_notificacoes_gerais();





// --------------------------------------------------------


// retorno ----------------------------------------------

return $codigo_html_bruto; // retorno

// --------------------------------------------------------


};

// --------------------------------------------------------


?>