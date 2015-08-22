<?php


// verifica se o email ja esta cadastrado -----------

function verifica_email_cadastrado($email_informado){


// globals -------------------------------------------------

global $tabela_banco; // array com todas as tabelas

// -----------------------------------------------------------


// query ---------------------------------------------------

$query = "select *from $tabela_banco[1] where email='$email_informado';"; // query

// -----------------------------------------------------------


// comando ----------------------------------------------

$comando = comando_executa($query); // comando

// ----------------------------------------------------------


// numero de linhas ----------------------------------

$numero_linhas = mysql_num_rows($comando); // numero de linhas

// ---------------------------------------------------------


// verifica o numero de linhas ---------------------

if($numero_linhas > 0){


// email esta cadastrado --------------------------

return true; // email esta cadastrado

// --------------------------------------------------------


}else{


// email nao esta cadastrado ---------------------

return false; // email nao esta cadastrado

// --------------------------------------------------------


};

// --------------------------------------------------------


};

// --------------------------------------------------------


?>