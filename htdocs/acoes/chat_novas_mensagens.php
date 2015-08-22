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


// array com idusuario mensagens novas ---

$idusuarios_array = retorne_idusuarios_novas_mensagens(); // array com idusuario mensagens novas

// ------------------------------------------------------


// obtendo ids --------------------------------------

foreach($idusuarios_array as $idusuario){

$lista_retorno .= "$idusuario,"; // lista de retorno

};

// ------------------------------------------------------


// exibe lista com idusuarios --------------------

echo $lista_retorno; // exibe lista com idusuarios

// ------------------------------------------------------


// desconecta do mysql --------------------------

desconecta_mysql(); // desconecta do mysql

// ------------------------------------------------------


?>