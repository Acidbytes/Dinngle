<?php

// retorna a diferenca entre datas
function diferenca_datas($data_1, $data_2, $tipo_retorno){


// formato dia-mes-ano
// ano formato: 2015


// obtendo diferenca
$diff = abs(strtotime($data_2) - strtotime($data_1));


// calculando
$anos = floor($diff / (365*60*60*24));

$meses = floor(($diff - $anos * 365*60*60*24) / (30*60*60*24));

$dias = floor(($diff - $anos * 365*60*60*24 - $meses*30*60*60*24) / (60*60*24));


// retorno
switch($tipo_retorno){


case 1: // ano
return $anos;
break;


case 2: // mes
return $meses;
break;


case 3: // dia
return $dias;
break;


};


};

?>