<?php


// abre pasta maniparq -----------------------------

chdir("../maniparq"); // abre pasta maniparq

// --------------------------------------------------------


// carrega bibliotecas ------------------------------

include("bibliotecas_php.php"); // carrega bibliotecas

// -------------------------------------------------------


// carrega dados de servidor ---------------------

include("../servidor/dados_servidor.php"); // carrega dados de servidor

// -------------------------------------------------------


// conecta ao mysql ------------------------------

conecta_mysql(true); // conecta ao mysql

// ------------------------------------------------------


// tipo de notificacao ----------------------------

$tipo_notificacao = remove_html($_POST['tipo_notificacao']); // tipo de notificacao

// -------------------------------------------------------


// carrega o numero de notificacoes --------

echo retorne_numero_notificacoes($tipo_notificacao); // carrega o numero de notificacoes

// -------------------------------------------------------


// desconecta do mysql --------------------------

desconecta_mysql(); // desconecta do mysql

// ------------------------------------------------------


?>