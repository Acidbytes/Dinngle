<?php


// exclui compartilhamento ------------------------

function exclui_compartilhamento(){


// globals ----------------------------------------------

global $tabela_banco; // tabela de banco

// --------------------------------------------------------


// dados de formulario -----------------------------

$id = remove_html($_POST['id']); // id de compartilhamento

$idamigo = remove_html($_POST['idamigo']); // idamigo dono do compartilhamento

// --------------------------------------------------------


// query ------------------------------------------------

$query = "delete from $tabela_banco[17] where id='$id' and idamigo='$idamigo';"; // query

// --------------------------------------------------------


// comando -------------------------------------------

comando_executa($query); // comando

// --------------------------------------------------------


};

// --------------------------------------------------------


?>