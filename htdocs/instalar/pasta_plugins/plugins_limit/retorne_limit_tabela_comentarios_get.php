<?php


// limit de dados de tabela por get ---------------

function retorne_limit_tabela_comentarios_get(){


// globals ----------------------------------------------

global $limite_resultados_pagina_comentarios; // limite de resultados por pagina

// --------------------------------------------------------


// numero da pagina --------------------------------

$numero_pagina = retorne_numero_pagina_resultado(); // numero da pagina

// --------------------------------------------------------


// limit de retorno de dados -----------------------

$limit_retorno = "order by id desc limit $numero_pagina, $limite_resultados_pagina_comentarios"; // limit de retorno de dados

// --------------------------------------------------------


// retorno ----------------------------------------------

return $limit_retorno; // retorno

// --------------------------------------------------------


};

// --------------------------------------------------------


?>