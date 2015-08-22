<?php


// abre pasta maniparq -----------------------------

chdir("../maniparq"); // abre pasta maniparq

// --------------------------------------------------------


// carrega bibliotecas ------------------------------

include("bibliotecas_php.php"); // carrega bibliotecas

// -------------------------------------------------------


// carrega dados de servidor ---------------------

include("../servidor/dados_servidor.php"); // carrega dados de servidor

// -------------------------------------------------------


// conecta ao mysql -------------------------------

conecta_mysql(true); // conecta ao mysql

// ------------------------------------------------------


// comentario ---------------------------------------

comentar_social(); // comentario

// ------------------------------------------------------


// monta campo exibe curtidas -----------------

$codigo_html_bruto = constroe_campos_social_publicacoes_gerais(null); // monta campo exibe curtidas
$codigo_html_bruto = converte_para_utf8($codigo_html_bruto); // codigo html bruto

// ------------------------------------------------------


// exibe codigo da pagina ------------------------

echo $codigo_html_bruto; // exibe codigo da pagina

// ------------------------------------------------------


// desconecta do mysql --------------------------

desconecta_mysql(); // desconecta do mysql

// ------------------------------------------------------


?>