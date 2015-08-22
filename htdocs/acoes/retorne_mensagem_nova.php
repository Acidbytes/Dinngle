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


// dados de formulario ----------------------------

$idusuario = remove_html($_POST['idusuario']); // id de usuario

// ------------------------------------------------------


// verifica se ha nova mensagem --------------

$nova_mensagem_existe = retorne_existe_mensagem_nova_chat($idusuario);

// ------------------------------------------------------


// tipo de retorno ----------------------------------

if($nova_mensagem_existe == true){

echo "1"; // nova mensagem

}else{

echo null; // nenhuma mensagem nova

};

// ------------------------------------------------------


// desconecta do mysql --------------------------

desconecta_mysql(); // desconecta do mysql

// ------------------------------------------------------


?>