<?php

// campo interesse sexual formulario
function campo_interesse_sexual_formulario($valor_atual, $nome_campo){

// monta option
switch($valor_atual){

case "Homem";
$codigo_html .= "<option value=''></option>";
$codigo_html .= "<option value='Homem' selected>Homem</option>";
$codigo_html .= "<option value='Mulher'>Mulher</option>";
$codigo_html .= "<option value='Bisexual'>Bisexual</option>";
break;

case "Mulher";
$codigo_html .= "<option value=''></option>";
$codigo_html .= "<option value='Mulher' selected>Mulher</option>";
$codigo_html .= "<option value='Homem'>Homem</option>";
$codigo_html .= "<option value='Bisexual'>Bisexual</option>";
break;

case "Bissexual";
$codigo_html .= "<option value=''></option>";
$codigo_html .= "<option value='Bisexual' selected>Bissexual</option>";
$codigo_html .= "<option value='Homem'>Homem</option>";
$codigo_html .= "<option value='Mulher'>Mulher</option>";
break;

default:
$codigo_html .= "<option value='' selected></option>";
$codigo_html .= "<option value='Homem'>Homem</option>";
$codigo_html .= "<option value='Mulher'>Mulher</option>";
$codigo_html .= "<option value='Bisexual'>Bisexual</option>";

};

// constroe option
$codigo_html = "<select name='$nome_campo'>".$codigo_html."</select>";

// retorno
return $codigo_html;

};

?>