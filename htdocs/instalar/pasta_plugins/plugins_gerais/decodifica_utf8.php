<?php


// decodifica utf-8 -----------------------------------

function decodifica_utf8($texto_decodificar){


// codifica se precisar -----------------------------------

if(mb_detect_encoding($texto_decodificar, 'utf-8', true) == true){
	
$texto_decodificar = utf8_decode($texto_decodificar); // decodifica utf-8

};

// --------------------------------------------------------


// retorno de texto decodificado -------------------------

return $texto_decodificar; // retorno de texto decodificado

// -------------------------------------------------------


};

// --------------------------------------------------------


?>