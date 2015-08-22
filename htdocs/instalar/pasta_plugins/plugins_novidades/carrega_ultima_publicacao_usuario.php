<?php


// carrega a ultima publicacao de usuario ------

function carrega_ultima_publicacao_usuario($idusuario){


// globals ----------------------------------------------

global $tabela_banco; // tabela de banco de dados

// ---------------------------------------------------------


// idusuario visualizando perfil ---------------------

$idusuario_perfil = retorne_idusuario_visualizando_perfil(); // idusuario visualizando perfil

// ----------------------------------------------------------


// limit de retorno de dados -------------------------

$limit_retorno = retorne_limit_tabela_ultimo_campo(); // limit de retorno de dados

// ----------------------------------------------------------


// query --------------------------------------------------

$query = "select *from $tabela_banco[9] where idusuario='$idusuario' $limit_retorno;"; // query

// ----------------------------------------------------------


// comando ---------------------------------------------

$comando = comando_executa($query); // comando

// ----------------------------------------------------------


// altera array global com ids de usuario ---------

altera_idusuario_array_global($idusuario); // alterando

// ----------------------------------------------------------


// codigo html bruto -----------------------------------

$codigo_html_bruto .= monta_pacote_postagem($comando);

// ----------------------------------------------------------


// altera array global com ids de usuario ---------

altera_idusuario_array_global($idusuario_perfil); // alterando

// ----------------------------------------------------------


// retorno ------------------------------------------------

return $codigo_html_bruto; // retorno

// ----------------------------------------------------------


};

// --------------------------------------------------------


?>