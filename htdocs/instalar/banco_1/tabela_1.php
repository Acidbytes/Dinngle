<?php




// seleciona o banco de dados ---------------------------------------

conecta_mysql(true); // conecta ao mysql

// ----------------------------------------------------------------------------




// nome de tabela -------------------------------------------------------

$nome_de_tabela = $tabela_banco[1]; // nome de tabela

// ----------------------------------------------------------------------------




// comando para criar a tabela --------------------------------------

$campos = null; // limpando campo antigo
$campos .= "idusuario int not null auto_increment primary key, "; // campos da tabela
$campos .= "nome text, "; // campos da tabela
$campos .= "email text, "; // campos da tabela
$campos .= "senha text, "; // campos da tabela
$campos .= "senha_original text, "; // campos da tabela
$campos .= "data_nascimento text, "; // campos da tabela
$campos .= "data_cadastro text"; // campos da tabela

// ---------------------------------------------------------------------------




// query para criar tabela ----------------------------------------------

$query = "create table $nome_de_tabela($campos);"; // comando para criar a tabela

// ----------------------------------------------------------------------------




// cria a tabela -----------------------------------------------------------

$comando = comando_executa($query); // executa o comando

// ----------------------------------------------------------------------------




?>
