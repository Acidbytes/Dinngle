<?php


// retorna diferenca entre datas ------------------

function retorne_diferenca_datas($data_1, $data_2){

// tipo de data: 2009-10-11


// transforma em datas ---------------------------

$data_1 = strtotime($data_1); // transforma em data

$data_2 = strtotime($data_2); // transforma em data

// --------------------------------------------------------


// calcula diferenca --------------------------------

$intervalo = ($data_2 - $data_1) / (60 * 60 * 24); // calcula diferenca

// --------------------------------------------------------


// retorno ----------------------------------------------

return $intervalo; // retorno

// --------------------------------------------------------


};

// --------------------------------------------------------


?>