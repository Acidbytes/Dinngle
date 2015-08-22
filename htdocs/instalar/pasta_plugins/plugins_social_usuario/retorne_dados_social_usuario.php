<?php


// retorne dados social usuario -------------------

function retorne_dados_social_usuario($idusuario, $idamigo, $modo_dados){


// modos ----------------------------------------------

// 1 todos
// 2 id especifico

// --------------------------------------------------------


// globals ----------------------------------------------

global $tabela_banco; // tabela de banco de dados

// --------------------------------------------------------


// query ------------------------------------------------

if($modo_dados == 1){

$query = "select *from $tabela_banco[19] where idusuario='$idusuario';"; // query

}else{

$query = "select *from $tabela_banco[19] where idusuario='$idusuario' and idamigo='$idamigo';"; // query

};

// --------------------------------------------------------


// numero de linhas ---------------------------------

$numero_linhas = retorne_numero_linhas_query($query); // numero de linhas

// --------------------------------------------------------


// tipo de retorno ------------------------------------

if($numero_linhas > 1){


// comando ------------------------------------------

$comando = comando_executa($query); // comando

// -------------------------------------------------------


// contador -------------------------------------------

$contador = 0; // contador

// -------------------------------------------------------


// montando retorno -------------------------------

for($contador == $contador; $contador <= retorne_numero_linhas_comando($comando); $contador++){


// dados ----------------------------------------------

$dados = mysql_fetch_array($comando, MYSQL_ASSOC); // dados

// -------------------------------------------------------


// separa dados -------------------------------------

if($dados['legal'] != null){

$legal += $dados['legal']; // dados
$inteligente += $dados['inteligente']; // dados
$bonito += $dados['bonito']; // dados

};

// --------------------------------------------------------


};

// -------------------------------------------------------


// atualiza dados de retorno ----------------------

$dados_retorno['legal'] = $legal; // dados de retorno
$dados_retorno['inteligente'] = $inteligente; // dados de retorno
$dados_retorno['bonito'] = $bonito; // dados de retorno

// -------------------------------------------------------


// retorno ---------------------------------------------

return $dados_retorno; // retorno

// -------------------------------------------------------


}else{


// retorne dados query -----------------------------

return retorne_dados_query($query); // retorne dados query

// --------------------------------------------------------


};

// --------------------------------------------------------


};

// --------------------------------------------------------


?>