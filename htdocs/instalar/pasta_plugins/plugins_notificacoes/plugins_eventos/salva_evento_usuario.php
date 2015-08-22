<?php


// salva o evento de usuario ----------------------

function salva_evento_usuario(){


// globals ----------------------------------------------

global $tabela_banco; // tabela

// --------------------------------------------------------


// id de usuario logado -----------------------------

$idusuario_logado = retorne_idusuario_logado(); // id de usuario logado

// --------------------------------------------------------


// dados formulario ----------------------------------

$evento = remove_html($_POST['evento']); // dados de formulario

// --------------------------------------------------------


// dados de data
$data_dia = remove_html($_POST['select_dia']); // dados de usuario
$data_mes = remove_html($_POST['select_mes']); // dados de usuario
$data_ano = remove_html($_POST['select_ano']); // dados de usuario


// data de nascimento
$data_salvar = "$data_ano-$data_mes-$data_dia"; // data de nascimento


// querys -----------------------------------------------

$query[] = "delete from $tabela_banco[20] where idusuario='$idusuario_logado';"; // query

// --------------------------------------------------------


// verifica se ha conteudo em evento -----------

if($evento != null){

$query[] = "insert into $tabela_banco[20] values('$idusuario_logado', '$evento', '$data_salvar');"; // query

};

// --------------------------------------------------------


// atualizando tabela --------------------------------

foreach($query as $valor_query){


// verifica se query e valida ------------------------

if($valor_query != null){

comando_executa($valor_query); // comando

};

// --------------------------------------------------------


};

// --------------------------------------------------------


};

// --------------------------------------------------------


?>