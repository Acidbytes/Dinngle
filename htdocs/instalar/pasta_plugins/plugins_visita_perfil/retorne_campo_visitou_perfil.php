<?php


// retorne campo visitou perfil ---------------------

function retorne_campo_visitou_perfil($idusuario){


// id de usuario logado ------------------------------

$idusuario_logado = retorne_idusuario_logado(); // id de usuario logado

// ---------------------------------------------------------


// data que visitou perfil -----------------------------

$data_visitou = retorne_data_visitou_perfil($idusuario); // data que visitou perfil

// ---------------------------------------------------------


// verifica se e o mesmo id ou se a data de visita existe -----------------

if($idusuario == $idusuario_logado or $data_visitou == null){

return null; // retorno nulo

};

// --------------------------------------------------------------------------------------


// codigo html bruto ----------------------------------

$codigo_html_bruto .= "<div class='classe_div_campo_visitou_perfil'>";
$codigo_html_bruto .= $data_visitou;
$codigo_html_bruto .= "</div>";

// ----------------------------------------------------------


// retorno ------------------------------------------------

return $codigo_html_bruto; // retorno

// ----------------------------------------------------------


};

// --------------------------------------------------------


?>