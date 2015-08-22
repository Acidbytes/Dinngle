<?php


// campo select privacidade -----------------------

function campo_select_privacidade($valor_atual){


// monta valores disponiveis ----------------------

switch($valor_atual){


case 1:
$texto_option = "Público"; // texto do campo option
break;


case 2:
$texto_option = "Amigos"; // texto do campo option
break;


default:
$texto_option = "Público"; // texto do campo option


};

// --------------------------------------------------------


// verifica se possui valor atual -------------------

if($valor_atual != null){

$campo_option_atual = "<option value='$valor_atual' selected>$texto_option</option>"; // campo option atual

};

// --------------------------------------------------------


// tipo de privacidade -------------------------------

$tipo_privacidade .= "<div class='div_tipo_privacidade_campo'>"; // tipo de privacidade
$tipo_privacidade .= "<select name='tipo_privacidade' class='uibutton'>"; // tipo de privacidade
$tipo_privacidade .= "<option value='1'>Público</option>"; // tipo de privacidade
$tipo_privacidade .= "<option value='2'>Amigos</option>"; // tipo de privacidade
$tipo_privacidade .= $campo_option_atual; // tipo de privacidade
$tipo_privacidade .= "</select>"; // tipo de privacidade
$tipo_privacidade .= "</div>"; // tipo de privacidade

// --------------------------------------------------------


// retorno ----------------------------------------------

return $tipo_privacidade; // retorno

// --------------------------------------------------------


};

// --------------------------------------------------------


?>