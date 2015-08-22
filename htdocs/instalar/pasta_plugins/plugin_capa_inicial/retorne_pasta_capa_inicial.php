<?php


// retorna a pasta de capa inicial -----------------

function retorne_pasta_capa_inicial(){


// globals ----------------------------------------------

global $pasta_capa_inicial_site; // pasta de capa inicial de site

// --------------------------------------------------------


// pasta de retorno ----------------------------------

$pasta_retorno = "../".$pasta_capa_inicial_site."/"; // pasta de retorno

// --------------------------------------------------------


// cria a pasta se necessario ---------------------

criar_pasta($pasta_retorno); // cria a pasta se necessario

// --------------------------------------------------------


// retorno ----------------------------------------------

return $pasta_retorno; // retorno

// --------------------------------------------------------


};

// --------------------------------------------------------


?>