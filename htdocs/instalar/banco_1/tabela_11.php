<?php




// seleciona o banco de dados ----------------------------------------------------------------------------------------

mysql_select_db($nome_de_banco_de_dados); // banco de dados

// -------------------------------------------------------------------------------------------------------------------




// nome de tabela ----------------------------------------------------------------------------------------------------

$nome_de_tabela = $tabela_banco[11]; // nome de tabela

// -------------------------------------------------------------------------------------------------------------------




// comando para criar a tabela ---------------------------------------------------------------------------------------

$campos = null; // limpando campo antigo
$campos .= "id int not null auto_increment primary key, "; // campos da tabela
$campos .= "idcomentario text, "; // campos da tabela
$campos .= "idusuario text, "; // campos da tabela
$campos .= "idusuario_comentario text, "; // campos da tabela
$campos .= "data_comentou text, "; // campos da tabela
$campos .= "comentario text, "; // campos da tabela
$campos .= "identificador text"; // campos da tabela

// -------------------------------------------------------------------------------------------------------------------




# COMANDO ------------------------------------------------------------------------------------------------------------

$query = "create table $nome_de_tabela($campos);"; // comando para criar a tabela

// -------------------------------------------------------------------------------------------------------------------




// cria a tabela -----------------------------------------------------------------------------------------------------

$comando = comando_executa($query); // executa o comando

// -------------------------------------------------------------------------------------------------------------------




?>
