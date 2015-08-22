<?php


// topico de pagina de ajuda modo get --------

function topico_pagina_ajuda_get(){


// id de topico ----------------------------------------

$topico_id = $_GET['topico_id']; // id de topico

// --------------------------------------------------------


// obtendo id de topico via post ------------------

if($topico_id == null){

$topico_id = $_POST['topico_id']; // obtendo id de topico via post

};

// --------------------------------------------------------


// remove html ----------------------------------------

$topico_id = remove_html($topico_id); // remove html

// ---------------------------------------------------------


// retorno -----------------------------------------------

return $topico_id; // retorno

// ---------------------------------------------------------


};

// ---------------------------------------------------------


?>