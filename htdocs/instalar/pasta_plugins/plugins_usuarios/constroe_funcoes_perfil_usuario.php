<?php


// constroe as funcoes do perfil de usuario ----------------

function constroe_funcoes_perfil_usuario(){


// idusuario visualizando perfil ----------------------------

$idusuario = retorne_idusuario_visualizando_perfil();

// ----------------------------------------------------------


// constroe funcoes de perfil -------------------------------------

$codigo_html_bruto .= constroe_campos_links_perfil();

// ----------------------------------------------------------------


// retorno --------------------------------------------------------

return $codigo_html_bruto; // retorno

// ----------------------------------------------------------------


};

// --------------------------------------------------------


?>