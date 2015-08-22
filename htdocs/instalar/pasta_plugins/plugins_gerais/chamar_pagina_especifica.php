<?php


// chama pagina especifica --------------------

function chamar_pagina_especifica($tipo_pagina){


// globals --------------------------------------------

global $url_pagina_inicial_site; // url pagina inicial

// -----------------------------------------------------


// id de usuario -----------------------------------

$idusuario = retorne_idusuario_logado(); // id de usuario

// -----------------------------------------------------


// numero de pagina -----------------------------

$numero_pagina = retorne_numero_pagina_resultado(); // numero de pagina

// ------------------------------------------------------


// endereco url de pagina -----------------------

$endereco_url = $url_pagina_inicial_site."?idusuario=$idusuario&tipo_pagina=$tipo_pagina&numero_pagina=$numero_pagina"; // endereco url de pagina

// -----------------------------------------------------


// chama pagina ----------------------------------

chama_pagina_por_endereco($endereco_url); // chama pagina

// -----------------------------------------------------


};

// -----------------------------------------------------


?>