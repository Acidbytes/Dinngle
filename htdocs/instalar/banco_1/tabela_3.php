<?php




// seleciona o banco de dados ---------------------------------------

conecta_mysql(true); // conecta ao mysql

// ----------------------------------------------------------------------------




// nome de tabela -------------------------------------------------------

$nome_de_tabela = $tabela_banco[3]; // nome de tabela

// ----------------------------------------------------------------------------




// comando para criar a tabela --------------------------------------

$campos = null; // limpando campo antigo
$campos .= "idusuario text, "; // campos da tabela
$campos .= "data_nascimento text, "; // campos da tabela
$campos .= "cidade text, "; // campos da tabela
$campos .= "estado text, "; // campos da tabela
$campos .= "sobre_usuario text, "; // campos da tabela
$campos .= "sexo text, "; // campos da tabela
$campos .= "estado_civil text, "; // campos da tabela
$campos .= "telefone text, "; // campos da tabela
$campos .= "site text, "; // campos da tabela
$campos .= "tribo_urbana text"; // campos da tabela

// ---------------------------------------------------------------------------




// query para criar tabela ----------------------------------------------

$query = "create table $nome_de_tabela($campos);"; // comando para criar a tabela

// ----------------------------------------------------------------------------




// cria a tabela -----------------------------------------------------------

$comando = comando_executa($query); // executa o comando

// ----------------------------------------------------------------------------




?>
