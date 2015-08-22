<?php


// retorna o tipo de pagina -------------------------

function retorne_tipo_pagina(){


// usuario dono do perfil ---------------------------

$usuario_dono_perfil = retorna_usuario_vendo_perfil_dono(); // usuario dono do perfil

// --------------------------------------------------------


// tipo de pagina -------------------------------------

$tipo_pagina = $_GET['tipo_pagina']; // tipo de pagina

// --------------------------------------------------------


// tipo de pagina modo post -----------------------

if($tipo_pagina == null){

$tipo_pagina = $_POST['tipo_pagina']; // tipo de pagina

};

// --------------------------------------------------------


// tipo de pagina modo post -----------------------

if($tipo_pagina == null and $usuario_dono_perfil == true){

$tipo_pagina = 8; // tipo de pagina

};

// --------------------------------------------------------


// define tipo de pagina padrao ------------------

if($tipo_pagina == null){

$tipo_pagina = 9; // define tipo de pagina padrao

};

// --------------------------------------------------------


// retorna tipo de pagina ---------------------------

return $tipo_pagina; // retorna tipo de pagina

// --------------------------------------------------------


};

// --------------------------------------------------------


?>