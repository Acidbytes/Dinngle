<?php


// retorna o numero de imagens no array de post de imagens -------

function retorne_numero_array_post_imagens(){


// array com imagens ---------------------------------------

$array_imagens_upload = $_FILES['foto']['name']; // array com imagens

// -----------------------------------------------------------------


// contador -----------------------------------------------------

$contador = 0; // contador

// -----------------------------------------------------------------


// contando numero de imagens validas ----------------

foreach($array_imagens_upload as $imagem){


// atualiza o contador ----------------------------------------

if($imagem != null){

$contador++; // atualiza o contador

};

// -----------------------------------------------------------------


};

// -----------------------------------------------------------------


// retorno -------------------------------------------------------

return $contador; // retorno

// -----------------------------------------------------------------


};

// -----------------------------------------------------------------------------------


?>