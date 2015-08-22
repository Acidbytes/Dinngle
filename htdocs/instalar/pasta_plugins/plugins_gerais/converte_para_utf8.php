<?php


// converte para utf-8 --------------------------------

function converte_para_utf8($texto_decodificar){


// codifica se precisar -----------------------------------

if(mb_detect_encoding($texto_decodificar, 'utf-8', true) == false){
	
$texto_decodificar = utf8_encode($texto_decodificar); // codifica utf-8

};

// --------------------------------------------------------


// retorno de texto decodificado -------------------------

return $texto_decodificar; // retorno de texto decodificado

// -------------------------------------------------------


};

// --------------------------------------------------------


?>