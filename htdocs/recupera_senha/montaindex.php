<?php


// tipo de pagina -----------------------------------------

$_GET['tipo_pagina'] = 21; // tipo de pagina

// ------------------------------------------------------------


// conecta ao mysql -------------------------------------

conecta_mysql(true); // conecta ao mysql

// ------------------------------------------------------------


// codigo html bruto -------------------------------------

$codigo_html_bruto = monta_pagina(); // codigo html bruto

// ------------------------------------------------------------


// desconecta do mysql --------------------------------

desconecta_mysql(); // desconecta do mysql

// ------------------------------------------------------------


// exibe codigo html bruto -----------------------------

echo $codigo_html_bruto; // exibe codigo html bruto

// ------------------------------------------------------------


?>