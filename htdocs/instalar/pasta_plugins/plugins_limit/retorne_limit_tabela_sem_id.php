<?php


// limit de dados de tabela por get sem id -----

function retorne_limit_tabela_sem_id(){


// globals ----------------------------------------------

global $limite_resultados_pagina; // limite de resultados por pagina

// --------------------------------------------------------


// numero da pagina --------------------------------

$numero_pagina = retorne_numero_pagina_resultado(); // numero da pagina

// --------------------------------------------------------


// limit de retorno de dados -----------------------

$limit_retorno = "limit $numero_pagina, $limite_resultados_pagina"; // limit de retorno de dados

// --------------------------------------------------------


// retorno ----------------------------------------------

return $limit_retorno; // retorno

// --------------------------------------------------------


};

// --------------------------------------------------------


?>