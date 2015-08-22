<?php


// altera array global com ids de usuario ------------------------

function altera_idusuario_array_global($idusuario){


// alterando ids -----------------------------------------------

$_GET['idusuario'] = $idusuario; // alterando get

$_POST['idusuario'] = $idusuario; // alterando post

// -----------------------------------------------------------------


};

// --------------------------------------------------------------------------


?>