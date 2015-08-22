<?php


// carrega os depoimentos do usuario ----------

function carregar_depoimentos_usuario(){


// codigo html bruto ----------------------------------

$codigo_html_bruto .= campo_gerenciar_depoimentos();
$codigo_html_bruto .= campo_criar_depoimento();
$codigo_html_bruto .= carregar_depoimentos_gerais();

// --------------------------------------------------------


// adiciona div especial -----------------------------

$codigo_html_bruto = constroe_div_especial_geral("Depoimentos", $codigo_html_bruto, null); // adiciona div especial

// --------------------------------------------------------


// retorno ----------------------------------------------

return $codigo_html_bruto; // retorno

// --------------------------------------------------------


};

// --------------------------------------------------------


?>