<?php


// retorna o link para perfil do usuario ----------

function retorna_link_perfil_usuario($idusuario){


// globals ----------------------------------------------

global $url_pagina_inicial_site; // url de pagina inicial

// --------------------------------------------------------


// nome de usuario ---------------------------------

$nome_usuario = func_retorna_nome_de_usuario_por_id($idusuario); // nome de usuario

// --------------------------------------------------------


// codigo html bruto ---------------------------------

$codigo_html_bruto = "<a href='$url_pagina_inicial_site?idusuario=$idusuario' title='$nome_usuario'>$nome_usuario</a>";

// --------------------------------------------------------


// retorno ----------------------------------------------

return $codigo_html_bruto; // retorno

// --------------------------------------------------------


};

// --------------------------------------------------------


?>