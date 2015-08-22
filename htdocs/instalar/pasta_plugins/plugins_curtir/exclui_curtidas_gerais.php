<?php


// exclui todas as curtidas gerais --------------

function exclui_curtidas_gerais($idpost){


// globals --------------------------------------------

global $tabela_banco; // tabela de banco de dados

// ------------------------------------------------------


// query remove postagem ----------------------

$query = "select *from $tabela_banco[11] where idcomentario='$idpost';"; // query

// ------------------------------------------------------


// comando -----------------------------------------

$comando = comando_executa($query); // comando

// ------------------------------------------------------


// numero de linhas -------------------------------

$numero_linhas = retorne_numero_linhas_comando($comando); // numero de linhas

// ------------------------------------------------------


// contador ------------------------------------------

$contador = 0; // contador

// ------------------------------------------------------


// excluindo dados --------------------------------

for($contador == $contador; $contador <= $numero_linhas; $contador++){


// dados ---------------------------------------------

$dados = mysql_fetch_array($comando, MYSQL_ASSOC); // dados

// ------------------------------------------------------


// id a ser removido de tabela curtidas -------

$id = $dados['id']; // id

// ------------------------------------------------------


// query para remover ----------------------------

$query_remove = "delete from $tabela_banco[10] where id='$id';"; // query para remover

// ------------------------------------------------------


// comando -----------------------------------------

if($id != null){

comando_executa($query_remove); // comando

};

// ------------------------------------------------------


};

// ------------------------------------------------------


};

// ------------------------------------------------------


?>