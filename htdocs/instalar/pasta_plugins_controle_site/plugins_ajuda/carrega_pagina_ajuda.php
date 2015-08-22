<?php


// carrega a pagina de ajuda ----------------------

function carrega_pagina_ajuda(){


// globals -----------------------------------------------

global $url_pagina_inicial_ajuda; // url de pagina inicial de ajuda

// ---------------------------------------------------------


// topico de pagina de ajuda -----------------------

$topico_pagina_ajuda = topico_pagina_ajuda_get(); // topico de pagina de ajuda

// ---------------------------------------------------------


// codigo html bruto ----------------------------------

$codigo_html_bruto .= campo_publicar_ajuda(); // codigo html bruto
$codigo_html_bruto .= constroe_topico_ajuda(); // codigo html bruto
$codigo_html_bruto .= constroe_pagina_ajuda(); // codigo html bruto

// --------------------------------------------------------


// retorno ----------------------------------------------

return $codigo_html_bruto; // retorno

// --------------------------------------------------------


};

// --------------------------------------------------------


?>