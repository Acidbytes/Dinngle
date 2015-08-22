<?php


// conecta-se ao mysql ----------------------------

function conecta_mysql($seleciona_banco_dados){


// globals ----------------------------------------------

global $conexao_mysql_conectar; // variavel de conexao

global $servidor_mysql_conectar; // servidor

global $usuario_mysql_conectar; // usuario

global $senha_mysql_conectar; // senha

global $prefixo_banco_de_dados; // prefixo do banco de dados

// --------------------------------------------------------


// conecta-se -----------------------------------------

$conexao_mysql_conectar = mysql_connect($servidor_mysql_conectar, $usuario_mysql_conectar, $senha_mysql_conectar); // conectando-se

// --------------------------------------------------------


// chaset de conexao ----------------------------

mysql_set_charset('utf8',$conexao_mysql_conectar); // chaset de conexao

// ----------------------------------------------


// seleciona o banco de dados -------------------

if($seleciona_banco_dados == true){

mysql_select_db($prefixo_banco_de_dados); // seleciona o banco de dados

};

// --------------------------------------------------------


};

// --------------------------------------------------------


?>
