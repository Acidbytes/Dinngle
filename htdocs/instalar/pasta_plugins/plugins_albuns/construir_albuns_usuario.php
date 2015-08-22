<?php


// constroe albuns de usuario --------------------

function construir_albuns_usuario(){


// codigo html bruto ---------------------------------

$codigo_html_bruto .= "<div class='div_exibe_imagens_gerais_album'>";
$codigo_html_bruto .= constroe_adicionar_imagens();
$codigo_html_bruto .= constroe_carregar_imagens(null);
$codigo_html_bruto .= "</div>";

// --------------------------------------------------------


// retorno ----------------------------------------------

return $codigo_html_bruto; // retorno

// --------------------------------------------------------


};

// --------------------------------------------------------


?>