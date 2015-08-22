<?php


// formulario alterar imagem de fundo ---

function formulario_alterar_imagem_fundo(){


// id de usuario ---------------------------------

$idusuario = retorne_idusuario_visualizando_perfil(); // id de usuario

// --------------------------------------------------


// codigo html bruto ---------------------------

$codigo_html_bruto .= retorne_imagem_papel_parede_usuario($idusuario, 1);
$codigo_html_bruto .= "<div class='classe_div_formulario_upload'>";
$codigo_html_bruto .= constroe_adicionar_imagem_fundo();
$codigo_html_bruto .= "</div>";

// ---------------------------------------------------


// titulo div ---------------------------------------

$titulo = "Papel parede"; // titulo div

// ---------------------------------------------------


// adiciona div especial -----------------------

$codigo_html_bruto = constroe_div_especial_geral($titulo, $codigo_html_bruto, null); // adiciona div

// ---------------------------------------------------


// retorno -----------------------------------------

return $codigo_html_bruto; // retorno

// ---------------------------------------------------


};

// --------------------------------------------------


?>