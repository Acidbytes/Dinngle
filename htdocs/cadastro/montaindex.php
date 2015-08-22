<?php


// verifica se esta logado -----------------------------------

if(retorne_esta_logado() == true){


// chama index de usuario ---------------------------------

pagina_index_usuario(); // chama index de usuario

// -----------------------------------------------------------------


// saindo do script --------------------------------------------

die; // saindo do script

// -----------------------------------------------------------------


};

// -----------------------------------------------------------------


// tipo de pagina -----------------------------------------

$_GET['tipo_pagina'] = 1; // tipo de pagina

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