<?php

// campo data de formulario
function campo_data_formulario_lembrete_evento($data_atual, $nome_campo){


// separa a data atual
$data_atual = explode("-", $data_atual);


// separa valores de data
$dia = $data_atual[2]; // dia
$mes = $data_atual[1]; // mes
$ano = $data_atual[0]; // ano


// define valores
$numero_dias = 31;
$numero_meses = 12;
$numero_anos = Date("Y") + 10;
$contador_1 = 1;
$contador_2 = 1;
$contador_3 = Date("Y");


// select dias -------------------------------------------
for($contador_1 == $contador_1; $contador_1 <= $numero_dias; $contador_1++){


if($contador_1 == $dia){

$select_dias .= "<option value='$contador_1' selected>$contador_1</option>";

}else{

$select_dias .= "<option value='$contador_1'>$contador_1</option>";

};


};


// select vazio
$select_dias = "<option value=''></option>".$select_dias;

// ------------------------------------------------------------


// select meses ----------------------------------------
for($contador_2 == $contador_2; $contador_2 <= $numero_meses; $contador_2++){


// nome do mes
switch($contador_2){

case 1:
$nome_mes = "Janeiro"; // nome do mes
break;

case 2:
$nome_mes = "Fevereiro"; // nome do mes
break;

case 3:
$nome_mes = "Março"; // nome do mes
break;

case 4:
$nome_mes = "Abril"; // nome do mes
break;

case 5:
$nome_mes = "Maio"; // nome do mes
break;

case 6:
$nome_mes = "Junho"; // nome do mes
break;

case 7:
$nome_mes = "Julho"; // nome do mes
break;

case 8:
$nome_mes = "Agosto"; // nome do mes
break;

case 9:
$nome_mes = "Setembro"; // nome do mes
break;

case 10:
$nome_mes = "Outubro"; // nome do mes
break;

case 11:
$nome_mes = "Novembro"; // nome do mes
break;

case 12:
$nome_mes = "Dezembro"; // nome do mes
break;

};


// adiciona mes selecionado
if($contador_2 == $mes){

$select_meses .= "<option value='$contador_2' selected>$nome_mes</option>";

}else{

$select_meses .= "<option value='$contador_2'>$nome_mes</option>";

};


};


// select vazio
$select_meses = "<option value=''></option>".$select_meses;

// ------------------------------------------------------------


// select anos -------------------------------------------
for($contador_3 == $contador_3; $contador_3 <= $numero_anos; $contador_3++){


if($contador_3 == $ano){

$select_anos .= "<option value='$contador_3' selected>$contador_3</option>";

}else{

$select_anos .= "<option value='$contador_3'>$contador_3</option>";

};


};


// select vazio
$select_anos = "<option value=''></option>".$select_anos;

// ------------------------------------------------------------


// adiciona select
$select_dias = "<select name='select_dia' class='classe_select_data_formulario'>$select_dias</select>";
$select_meses = "<select name='select_mes' class='classe_select_data_formulario'>$select_meses</select>";
$select_anos = "<select name='select_ano' class='classe_select_data_formulario'>$select_anos</select>";


// codigo html
$codigo_html .= "<div class='classe_div_campo_data_formulario'>";
$codigo_html .= $select_dias;
$codigo_html .= $select_meses;
$codigo_html .= $select_anos;
$codigo_html .= "</div>";


// retorno
return $codigo_html;

};

?>