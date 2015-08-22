<?php




// seleciona o banco de dados ---------------------------------------

conecta_mysql(true); // conecta ao mysql

// ----------------------------------------------------------------------------




// nome de tabela -------------------------------------------------------

$nome_de_tabela = $tabela_banco[4]; // nome de tabela

// ----------------------------------------------------------------------------




// comando para criar a tabela --------------------------------------

$campos = null; // limpando campo antigo
$campos .= "id int not null auto_increment primary key, "; // campos da tabela
$campos .= "idusuario text, "; // campos da tabela
$campos .= "idamigo text, "; // campos da tabela
$campos .= "aceitou text, "; // campos da tabela
$campos .= "data_aceitou text, "; // campos da tabela
$campos .= "tipo_solicita text"; // campos da tabela

// ---------------------------------------------------------------------------




// query para criar tabela ----------------------------------------------

$query = "create table $nome_de_tabela($campos);"; // comando para criar a tabela

// ----------------------------------------------------------------------------




// cria a tabela -----------------------------------------------------------

$comando = comando_executa($query); // executa o comando

// ----------------------------------------------------------------------------




?>
