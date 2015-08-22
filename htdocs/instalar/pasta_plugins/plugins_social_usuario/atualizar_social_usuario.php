<?php


// atualizar social usuario -------------------------

function atualizar_social_usuario(){


// globals ----------------------------------------------

global $tabela_banco; // tabela de banco de dados

// --------------------------------------------------------


// dados de formulario -----------------------------

$idusuario = remove_html($_POST['idusuario']); // id de usuario

$tipo_social = remove_html($_POST['tipo_social']); // tipo social

// --------------------------------------------------------


// idusuario logado ----------------------------------

$idusuario_logado = retorne_idusuario_logado(); // idusuario logado

// --------------------------------------------------------


// query ------------------------------------------------

$query = "select *from $tabela_banco[19] where idusuario='$idusuario' and idamigo='$idusuario_logado';"; // query

// --------------------------------------------------------


// numero de linhas ---------------------------------

$numero_linhas = retorne_numero_linhas_query($query); // numero de linhas

// --------------------------------------------------------


// verifica se registro ja existe --------------------

if($numero_linhas == 0){


// query ------------------------------------------------

$query = "insert into $tabela_banco[19] values('$idusuario', '$idusuario_logado', '0', '0', '0');"; // query

// --------------------------------------------------------


// comando -------------------------------------------

comando_executa($query); // comando

// --------------------------------------------------------


};

// --------------------------------------------------------


// limpa variavel de query --------------------------

$query = null; // limpa variavel de query

// --------------------------------------------------------


// dados -----------------------------------------------

$dados = retorne_dados_social_usuario($idusuario, $idusuario_logado, 2); // dados

// --------------------------------------------------------


// separa dados -------------------------------------

$legal = $dados['legal']; // dados
$inteligente = $dados['inteligente']; // dados
$bonito = $dados['bonito']; // dados

// --------------------------------------------------------


// tipo de social --------------------------------------

switch($tipo_social){


case 1:
if($legal == 0){
$query = "update $tabela_banco[19] set legal='1' where idusuario='$idusuario' and idamigo='$idusuario_logado';"; // query
}else{
$query = "update $tabela_banco[19] set legal='0' where idusuario='$idusuario' and idamigo='$idusuario_logado';"; // query
};
break;


case 2:
if($inteligente == 0){
$query = "update $tabela_banco[19] set inteligente='1' where idusuario='$idusuario' and idamigo='$idusuario_logado';"; // query
}else{
$query = "update $tabela_banco[19] set inteligente='0' where idusuario='$idusuario' and idamigo='$idusuario_logado';"; // query
};
break;


case 3:
if($bonito == 0){
$query = "update $tabela_banco[19] set bonito='1' where idusuario='$idusuario' and idamigo='$idusuario_logado';"; // query
}else{
$query = "update $tabela_banco[19] set bonito='0' where idusuario='$idusuario' and idamigo='$idusuario_logado';"; // query
};
break;


};

// --------------------------------------------------------


// comando -------------------------------------------

comando_executa($query); // comando

// --------------------------------------------------------


// retorno ----------------------------------------------

return constroe_campo_social_usuario($idusuario); // retorno

// --------------------------------------------------------


};

// --------------------------------------------------------


?>