<?php


// retorne idusuarios novas mensagens -------

function retorne_idusuarios_novas_mensagens(){


// globals ----------------------------------------------

global $tabela_banco; // tabela de banco de dados

// --------------------------------------------------------


// id de usuario logado ------------------------------

$idusuario_logado = retorne_idusuario_logado(); // id de usuario logado

// ---------------------------------------------------------


// query -------------------------------------------------

$query = "select *from $tabela_banco[22] where idamigo='$idusuario_logado' and visualizada='0';"; // query

// ---------------------------------------------------------


// comando --------------------------------------------

$comando = comando_executa($query); // comando

// ---------------------------------------------------------


// contador ---------------------------------------------

$contador = 0; // contador

// ----------------------------------------------------------


// numero de linhas -----------------------------------

$numero_linhas = retorne_numero_linhas_comando($comando); // numero de linhas

// -----------------------------------------------------------


// lista de retorno com id de usuarios -------------

$array_idusuarios_retorno = array(); // array...

// -----------------------------------------------------------


// obtendo dados ---------------------------------------

for($contador == $contador; $contador <= $numero_linhas; $contador++){


// dados --------------------------------------------------

$dados = mysql_fetch_array($comando, MYSQL_ASSOC); // dados

// -----------------------------------------------------------


// id de usuario ------------------------------------------

$idusuario = $dados['idusuario']; // id de usuario

// -----------------------------------------------------------


// obtendo idusuario -----------------------------------

if($idusuario != null){

$array_idusuarios_retorno[] = $idusuario; // atualizando lista...

};

// -----------------------------------------------------------


};

// -----------------------------------------------------------


// retorno -------------------------------------------------

return $array_idusuarios_retorno; // retorno

// -----------------------------------------------------------


};

// -------------------------------------------------------


?>