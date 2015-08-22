<?php


// formulario alterar imagem de fundo ---

function formulario_alterar_imagem_fundo_capa_inicial(){


// codigo html bruto ---------------------------

$codigo_html_bruto .= retorne_imagem_papel_parede_capa_inicial(1);
$codigo_html_bruto .= "<div class='classe_div_formulario_upload'>";
$codigo_html_bruto .= constroe_adicionar_imagem_fundo_capa_inicial();
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