<?php




// seleciona o banco de dados ----------------------------------------------------------------------------------------

mysql_select_db($nome_de_banco_de_dados); // banco de dados

// -------------------------------------------------------------------------------------------------------------------




// nome de tabela ----------------------------------------------------------------------------------------------------

$nome_de_tabela = $tabela_banco[30]; // nome de tabela

// -------------------------------------------------------------------------------------------------------------------




// comando para criar a tabela ---------------------------------------------------------------------------------------

$campos = null; // limpando campo antigo
$campos .= "idusuario text, "; // campos da tabela
$campos .= "ensino_medio text, "; // campos da tabela
$campos .= "ensino_medio_ano text, "; // campos da tabela
$campos .= "faculdade text, "; // campos da tabela
$campos .= "faculdade_ano text, "; // campos da tabela
$campos .= "habilidade_profissional text, "; // campos da tabela
$campos .= "trabalha_onde text, "; // campos da tabela
$campos .= "trabalha_onde_ano text, "; // campos da tabela
$campos .= "interesse_sexual text, "; // campos da tabela
$campos .= "endereco text, "; // campos da tabela
$campos .= "religiao text, "; // campos da tabela
$campos .= "politica text, "; // campos da tabela
$campos .= "apelido text, "; // campos da tabela
$campos .= "citacao text, "; // campos da tabela
$campos .= "odeia text, "; // campos da tabela
$campos .= "cidade_natal text, "; // campos da tabela
$campos .= "livros text, "; // campos da tabela
$campos .= "cinema text, "; // campos da tabela
$campos .= "tv text, "; // campos da tabela
$campos .= "atividades text, "; // campos da tabela
$campos .= "jogos text"; // campos da tabela

// -------------------------------------------------------------------------------------------------------------------




# COMANDO ------------------------------------------------------------------------------------------------------------

$query = "create table $nome_de_tabela($campos);"; // comando para criar a tabela

// -------------------------------------------------------------------------------------------------------------------




// cria a tabela -----------------------------------------------------------------------------------------------------

$comando = comando_executa($query); // executa o comando

// -------------------------------------------------------------------------------------------------------------------




?>
