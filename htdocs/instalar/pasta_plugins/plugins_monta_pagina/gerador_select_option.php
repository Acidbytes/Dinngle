<?php


// gerador de select option -------------------------

function gerador_select_option($dados_select_option, $valor_atual, $nome){


// codigo html bruto ---------------------------------

foreach($dados_select_option as $valor){


// monta option ---------------------------------------

if($valor == $valor_atual){

$codigo_html_bruto .= "<option value='$valor' selected>$valor</option>";

}else{

$codigo_html_bruto .= "<option value='$valor'>$valor</option>";

};

// --------------------------------------------------------


};

// --------------------------------------------------------


// monta select ---------------------------------------

$codigo_html_bruto = "<select name='$nome'>$codigo_html_bruto</select>"; // monta select

// --------------------------------------------------------


// retorno ----------------------------------------------

return $codigo_html_bruto; // retorno

// --------------------------------------------------------


};

// --------------------------------------------------------


?>