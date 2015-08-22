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


// conecta ao mysql -------------------------------

conecta_mysql(true); // conecta ao mysql

// ------------------------------------------------------


// inicia a sessao ------------------------------------

session_start(); // inicia a sessao

// --------------------------------------------------------


// atualiza sessao -----------------------------------

$array_amigos = $_SESSION['sessao_idusuarios_disponiveis_chat']; // atualiza sessao

// --------------------------------------------------------


// dados de formulario ------------------------------

$contador = remove_html($_POST['contador']); // contador

// --------------------------------------------------------


// exibe a id de usuario amigo --------------------

echo $array_amigos[$contador]; // exibe a id de usuario amigo

// --------------------------------------------------------


// desconecta do mysql --------------------------

desconecta_mysql(); // desconecta do mysql

// ------------------------------------------------------


?>