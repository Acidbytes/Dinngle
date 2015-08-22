<?php


// tipo de pagina de controle ----------------------

function retorne_tipo_controle(){


// tipo de pagina -------------------------------------

$numero_controle = $_GET['numero_controle']; // tipo de pagina

// --------------------------------------------------------


// tipo de pagina modo post -----------------------

if($numero_controle == null){

$numero_controle = $_POST['numero_controle']; // tipo de pagina

};

// --------------------------------------------------------


// retorna tipo de pagina ---------------------------

return $numero_controle; // retorna tipo de pagina

// --------------------------------------------------------


};

// --------------------------------------------------------


?>