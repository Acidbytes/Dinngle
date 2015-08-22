<?php


// salva o lembrete de usuario --------------------

function salva_lembrete_usuario(){


// globals ----------------------------------------------

global $tabela_banco; // tabela

// --------------------------------------------------------


// id de usuario logado -----------------------------

$idusuario_logado = retorne_idusuario_logado(); // id de usuario logado

// --------------------------------------------------------


// dados formulario ----------------------------------

$lembrete = remove_html($_POST['lembrete']); // dados de formulario

// --------------------------------------------------------


// dados de data
$data_dia = remove_html($_POST['select_dia']); // dados de usuario
$data_mes = remove_html($_POST['select_mes']); // dados de usuario
$data_ano = remove_html($_POST['select_ano']); // dados de usuario


// data de nascimento
$data_salvar = "$data_ano-$data_mes-$data_dia"; // data de nascimento


// querys -----------------------------------------------

$query[] = "delete from $tabela_banco[16] where idusuario='$idusuario_logado';"; // query

// --------------------------------------------------------


// verifica se ha conteudo em lembrete --------

if($lembrete != null){

$query[] = "insert into $tabela_banco[16] values('$idusuario_logado', '$lembrete', '$data_salvar');"; // query

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