<?php




// carrega dados de servidor ------------------------------------------

include("../servidor/dados_servidor.php"); // carrega dados de servidor

// ----------------------------------------------------------------------------




// inicializa todas as funcoes -----------------------------------------

include("carregar_funcoes_gerais.php"); // inicializa todas as funcoes

// ----------------------------------------------------------------------------




// inicializa todas as funcoes plugins ----------------------------

include("carregar_funcoes_gerais_plugins.php"); // inicializa todas as funcoes plugins

// ----------------------------------------------------------------------------




// conecta ao mysql -----------------------------------------------------

conecta_mysql(false); // conecta ao mysql

// ----------------------------------------------------------------------------




// instala banco de dados e tabelas ---------------------------------

include("banco_1/banco_dados_1.php"); // banco de dados e tabela

// ----------------------------------------------------------------------------




// atualiza as bibliotecas disponiveis -------------------------------

include("atualizar_bibliotecas/atualizar.php"); // atualiza bibliotecas disponiveis

// ----------------------------------------------------------------------------




// atualiza o banco de dados com as funcoes --------------------

// include("atualizar_banco_dados_funcoes.php"); // atualiza o banco de dados com as funcoes

// ----------------------------------------------------------------------------




// instala os jogos ------------------------------------------------------

include("instalar_jogos.php"); // instala os jogos

// ----------------------------------------------------------------------------




// instalacao concluida -------------------------------------------------

$mensagem_sucesso .= "<li>Instalação bem sucedida."; // mensagem de sucesso

// ----------------------------------------------------------------------------




// decodifica utf-8 -----------------------------------------------------

$mensagem_sucesso = utf8_decode($mensagem_sucesso); // decodifica utf-8

// --------------------------------------------------------------------




// exibindo mensagem --------------------------------------------------

echo $mensagem_sucesso; // exibindo mensagem

// ----------------------------------------------------------------------------




// desconecta do mysql ------------------------------------------------

desconecta_mysql(); // desconecta do mysql

// ----------------------------------------------------------------------------




?>
