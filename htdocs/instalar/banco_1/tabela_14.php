<?php




// seleciona o banco de dados ----------------------------------------------------------------------------------------

mysql_select_db($nome_de_banco_de_dados); // banco de dados

// -------------------------------------------------------------------------------------------------------------------




// nome de tabela ----------------------------------------------------------------------------------------------------

$nome_de_tabela = $tabela_banco[14]; // nome de tabela

// -------------------------------------------------------------------------------------------------------------------




// comando para criar a tabela ---------------------------------------------------------------------------------------

$campos = null; // limpando campo antigo
$campos .= "idusuario text, "; // campos da tabela
$campos .= "profissao text, "; // campos da tabela
$campos .= "objetivo text, "; // campos da tabela
$campos .= "empresas_trabalhou text, "; // campos da tabela
$campos .= "formacao text, "; // campos da tabela
$campos .= "experiencia text, "; // campos da tabela
$campos .= "idiomas text, "; // campos da tabela
$campos .= "email text, "; // campos da tabela
$campos .= "telefone text, "; // campos da tabela
$campos .= "endereco text, "; // campos da tabela
$campos .= "adicionais text, "; // campos da tabela
$campos .= "projetos text, "; // campos da tabela
$campos .= "empregado text, "; // campos da tabela
$campos .= "estado text"; // campos da tabela

// -------------------------------------------------------------------------------------------------------------------




# COMANDO ------------------------------------------------------------------------------------------------------------

$query = "create table $nome_de_tabela($campos);"; // comando para criar a tabela

// -------------------------------------------------------------------------------------------------------------------




// cria a tabela -----------------------------------------------------------------------------------------------------

$comando = comando_executa($query); // executa o comando

// -------------------------------------------------------------------------------------------------------------------




?>
