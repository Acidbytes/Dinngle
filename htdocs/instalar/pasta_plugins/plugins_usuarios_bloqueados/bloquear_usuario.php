<?php


// bloqueia usuario ---------------------------------

function bloquear_usuario(){


// globals --------------------------------------------

global $tabela_banco; // tabela de banco

// ------------------------------------------------------


// dados de formulario ----------------------------

$idusuario = remove_html($_POST['idusuario']); // id a ser bloqueado

$desbloquear = remove_html($_POST['desbloquear']); // desbloquear

// -------------------------------------------------------


// id de usuario logado ----------------------------

$idusuario_logado = retorne_idusuario_logado(); // id de usuario logado

// -------------------------------------------------------


// valida ids de usuarios --------------------------

if($idusuario == $idusuario_logado or $idusuario == null or $idusuario_logado == null){

return null; // retorno nulo

};

// -------------------------------------------------------


// querys ---------------------------------------------

$query[] = "delete from $tabela_banco[21] where idusuario='$idusuario_logado' and idusuario_bloqueado='$idusuario';";
$query[] = "insert into $tabela_banco[21] values('$idusuario_logado', '$idusuario');"; // query

// -------------------------------------------------------


// desbloqueia --------------------------------------

if($desbloquear == true){


// limpa array de query ----------------------------

$query = null; // limpa array de query

// -------------------------------------------------------


// querys ---------------------------------------------

$query[] = "delete from $tabela_banco[21] where idusuario='$idusuario_logado' and idusuario_bloqueado='$idusuario';";

// -------------------------------------------------------


};

// -------------------------------------------------------


// atualizando tabela --------------------------------

foreach($query as $valor_query){


// verifica se query e valida ------------------------

if($valor_query != null){

comando_executa($valor_query); // comando

};

// --------------------------------------------------------


};

// --------------------------------------------------------


// remove referencias de amizade --------------

remove_referencia_amizade(); // remove referencias de amizade

// -------------------------------------------------------


};

// --------------------------------------------------------


?>