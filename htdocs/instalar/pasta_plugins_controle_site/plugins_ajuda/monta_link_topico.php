<?php


// monta o link do topico ---------------------------

function monta_link_topico($id, $titulo_topico){


// globals ----------------------------------------------

global $url_pagina_inicial_ajuda; // url de pagina inicial de ajuda

// --------------------------------------------------------


// retorno ----------------------------------------------

return "<a href='$url_pagina_inicial_ajuda?topico_id=$id' title='$titulo_topico' class='links_topicos_ajuda'>$titulo_topico</a>"; // topico

// --------------------------------------------------------


};

// --------------------------------------------------------


?>