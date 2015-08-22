<?php




// seleciona o banco de dados ---------------------------------------

conecta_mysql(true); // conecta ao mysql

// ----------------------------------------------------------------------------




// nome de tabela -------------------------------------------------------

$nome_de_tabela = $tabela_banco[6]; // nome de tabela

// ----------------------------------------------------------------------------




// comando para criar a tabela --------------------------------------

$campos = null; // limpando campo antigo
$campos .= "id int not null auto_increment primary key, "; // campos da tabela
$campos .= "idusuario text, "; // campos da tabela
$campos .= "url_imagem text, "; // campos da tabela
$campos .= "url_imagem_miniatura text, "; // campos da tabela
$campos .= "privacidade text, "; // campos da tabela
$campos .= "descricao text, "; // campos da tabela
$campos .= "data_publicacao text, "; // campos da tabela
$campos .= "idalbum_imagens text, "; // campos da tabela
$campos .= "identificador text, "; // campos da tabela
$campos .= "nome_album text, "; // campos da tabela
$campos .= "nome_album_identificador text"; // campos da tabela

// ---------------------------------------------------------------------------




// query para criar tabela ----------------------------------------------

$query = "create table $nome_de_tabela($campos);"; // comando para criar a tabela

// ----------------------------------------------------------------------------




// cria a tabela -----------------------------------------------------------

$comando = comando_executa($query); // executa o comando

// ----------------------------------------------------------------------------




?>
