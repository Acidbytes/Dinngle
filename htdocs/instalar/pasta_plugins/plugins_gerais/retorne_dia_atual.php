<?php


// retorna dia atual ----------------------------------

function retorne_dia_atual(){


// dia
$dia = Date("d");


// remove o zero
if($dia <= 9){

$dia = str_replace("0", null, $dia);

};


// retorno
return $dia; // retorne data atual


};

// --------------------------------------------------------


?>