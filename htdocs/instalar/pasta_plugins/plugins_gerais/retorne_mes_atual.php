<?php


// retorna o mes atual ------------------------------

function retorne_mes_atual(){


// mes
$mes = Date("m");


// remove zero
if($mes <= 9){

$mes = str_replace("0", null, $mes);

};


// retorno
return $mes;

};

// --------------------------------------------------------


?>