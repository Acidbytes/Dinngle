<?php


// codigo fonte de todos os scripts PHP ---------------------------

$codigo_fonte_scripts_php_todos = null; // codigo fonte de todos os scripts PHP

// ---------------------------------------------------------------------------


// lista e carrega todas as bibliotecas disponiveis --------------

include("carrega_funcoes.php"); // carrega php principal antes de todas

// -------------------------------------------------------------------------


// carrega plugins ----------------------------------------------------

include("carrega_plugins.php"); // carrega plugins
include("carrega_plugins_jquerys.php"); // carrega plugins
include("carrega_plugins_ajuda.php"); // carrega plugins

// -------------------------------------------------------------------------


// carrega agora os javascripts -----------------------------------

include("carrega_jquerys.php"); // todos os scripts basicos do jquery do site

// ------------------------------------------------------------------------


// compila scripts css ----------------------------------------------

include("carrega_css.php"); // compilando scripts css do site
include("carrega_plugins_css.php"); // compilando scripts css do site plugins

// -----------------------------------------------------------------------


// salva bibliotecas php -------------------------------------------

$codigo_salvar_biblioteca_php .= "<?php"; // codigo para salvar biblioteca php
$codigo_salvar_biblioteca_php .= ""; // codigo para salvar biblioteca php
$codigo_salvar_biblioteca_php .= $codigo_fonte_scripts_php_todos; // codigo para salvar biblioteca php
$codigo_salvar_biblioteca_php .= ""; // codigo para salvar biblioteca php
$codigo_salvar_biblioteca_php .= "?>"; // codigo para salvar biblioteca php

// ----------------------------------------------------------------------------


// remove linhas em branco ------------------------------------------

$codigo_salvar_biblioteca_php = remove_linhas_em_branco($codigo_salvar_biblioteca_php); // remove linhas em branco

// ---------------------------------------------------------------------------


// salvando bibliotecas php ------------------------------------------

func_salvar_arquivo("../maniparq/bibliotecas_php.php", $codigo_salvar_biblioteca_php); // salvando bibliotecas php

func_salvar_arquivo("../maniparq/plugins_ajuda.php", $codigo_fonte_scripts_php_plugins_ajuda); // salvando bibliotecas php

// --------------------------------------------------------------------------


?>
