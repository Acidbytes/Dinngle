<?php


// verifica no array de postagens se ja existe ---------------------

function retorne_postagem_exibiu_array($idpublicacao, $modo_retorno){


// array statica -----------------------------------------------------------

static $array_idpublicacao = array(); // array statica

// ---------------------------------------------------------------------------


// verifica modo ---------------------------------------------------------

if($modo_retorno == true){


// apenas atualiza array sem retorno ------------------------------

$array_idpublicacao[] = $idpublicacao; // atualizando...

// --------------------------------------------------------------------------


}else{


// retorna se existe no array -----------------------------------------

return in_array($idpublicacao, $array_idpublicacao); // retornando...

// --------------------------------------------------------------------------


};

// --------------------------------------------------------------------------


};

// --------------------------------------------------------------------------


?>