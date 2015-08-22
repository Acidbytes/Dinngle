<?php


// controe o menu drop -----------------------------

function constroe_menu_drop($array_conteudo_menu){


// obtendo valor de array ---------------------------

foreach($array_conteudo_menu as $valor_array){


// lista com opcoes ----------------------------------

if($valor_array != null){

$lista_opcoes .= $valor_array; // lista com opcoes

};

// ---------------------------------------------------------


};

// --------------------------------------------------------


// codigo html bruto ---------------------------------

$codigo_html_bruto .= "<div class='div_menu_drop_opcoes'>";
$codigo_html_bruto .= "<div class='dropdown'>";
$codigo_html_bruto .= "<button class='btn btn-default dropdown-toggle' type='button' id='dropdownMenu1' data-toggle='dropdown'>";
$codigo_html_bruto .= "<span class='caret'></span>";
$codigo_html_bruto .= "</button>";
$codigo_html_bruto .= "<ul class='dropdown-menu' role='menu' aria-labelledby='dropdownMenu1'>";
$codigo_html_bruto .= $lista_opcoes;
$codigo_html_bruto .= "</ul>";
$codigo_html_bruto .= "</div>";
$codigo_html_bruto .= "</div>";

// --------------------------------------------------------


// retorno ----------------------------------------------

return $codigo_html_bruto; // retorno

// --------------------------------------------------------


};

// --------------------------------------------------------


?>