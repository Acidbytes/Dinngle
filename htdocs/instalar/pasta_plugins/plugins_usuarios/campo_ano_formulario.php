<?php

// campo ano formulario
function campo_ano_formulario($ano_informado, $nome_campo){

// contador
$contador_ano = 1929;

// ano atual
$ano_atual = Date("Y");

// criando select
for($contador_ano == $contador_ano; $contador_ano <= $ano_atual; $contador_ano++){

// selecionado
if($contador_ano == $ano_informado){

$codigo_html .= "<option value='$contador_ano' selected>$contador_ano</option>";

}else{

$codigo_html .= "<option value='$contador_ano'>$contador_ano</option>";

};

};

// select vazio
$codigo_html = "<option value=''></option>".$codigo_html;

// constroe option
$codigo_html = "<select name='$nome_campo'>".$codigo_html."</select>";

// retorno
return $codigo_html;

};

?>