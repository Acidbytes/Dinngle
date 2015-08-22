<?php


// retorne o numero da pagina de resultados --

function retorne_numero_pagina_resultado(){


// numero da pagina --------------------------------

$numero_pagina = $_GET['numero_pagina']; // numero da pagina

// --------------------------------------------------------


// verifica se numero de pagina e valido -------

if($numero_pagina == null){

$numero_pagina = $_POST['numero_pagina']; // valor de post

};

// --------------------------------------------------------


// verifica se numero de pagina e valido -------

if($numero_pagina == null){

$numero_pagina = 0; // valor padrao

};

// --------------------------------------------------------


// retorno ----------------------------------------------

return $numero_pagina; // retorno

// --------------------------------------------------------


};

// --------------------------------------------------------


?>