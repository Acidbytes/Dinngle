<?php


// abre pasta maniparq ------------------------------------------------

chdir("../maniparq"); // abre pasta maniparq

// ---------------------------------------------------------------------------


// carrega bibliotecas --------------------------------------------------

include("bibliotecas_php.php"); // carrega bibliotecas

// ---------------------------------------------------------------------------


// carrega dados de servidor ----------------------------------------

include("../servidor/dados_servidor.php"); // carrega dados de servidor

// ---------------------------------------------------------------------------


// deleta todos os cookies --------------------------------------------

deleta_cookies(); // deleta todos os cookies

// ----------------------------------------------------------------------------


// chama index de usuario --------------------------------------------

pagina_index_usuario(); // chama index de usuario

// ----------------------------------------------------------------------------


?>