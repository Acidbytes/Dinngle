<?php


// salva ou obtem o numero da pagina da sessao ---------

function sessao_numero_pagina_atual($modo_retorno){


// inicia sessao --------------------------------------------

session_start(); // inicia sessao

// -------------------------------------------------------------


// modo de retorno ---------------------------------------

if($modo_retorno == 1){


// salva sessao --------------------------------------------

if($_SESSION['numero_pagina'] == null){

$_SESSION['numero_pagina'] = retorne_numero_pagina_resultado(); // salva valor na sessao

};

// --------------------------------------------------------------


// retorno nulo ----------------------------------------------

return null; // retorno nulo

// --------------------------------------------------------------


};

// --------------------------------------------------------------


// obtendo valor --------------------------------------------

$numero_pagina = $_SESSION['numero_pagina']; // obtendo valor

// --------------------------------------------------------------


// retorno ----------------------------------------------------

return $numero_pagina; // retorno

// --------------------------------------------------------------


};

// ----------------------------------------------------------------------


?>