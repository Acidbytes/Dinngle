<?php


// executador de querys ----------------------------

function executador_querys($querys_array){


// executando query --------------------------------

foreach($querys_array as $query_executar){

comando_executa($query_executar); // executando query

};

// --------------------------------------------------------


};

// --------------------------------------------------------


?>