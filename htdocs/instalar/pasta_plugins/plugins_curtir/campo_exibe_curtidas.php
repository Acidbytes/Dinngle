<?php


// campo exibe curtidas -----------------------------

function campo_exibe_curtidas($dados){


// globals ------------------------------------------------

global $imagem_servidor; // imagem de servidor

// ----------------------------------------------------------


// numero de curtidas --------------------------------

$numero_curtidas = retorne_numero_curtidas($dados); // numero de curtidas

// ----------------------------------------------------------


// imagem curtiu ---------------------------------------

$imagem_curtiu = $imagem_servidor['curtiu']; // imagem curtiu

$imagem_curtiu = "<img src='$imagem_curtiu' title='Curtiu'>"; // imagem curtiu

// ----------------------------------------------------------


// texto curtiram plural ou singular ----------------

if($numero_curtidas > 1){

$texto_curtiram = "curtiram"; // texto curtiram

}else{

$texto_curtiram = "curtiu"; // texto curtiram

};

// ----------------------------------------------------------


// codigo html bruto -----------------------------------

$codigo_html_bruto .= "<div class='campo_exibe_curtidas' id=''>";
$codigo_html_bruto .= $imagem_curtiu;
$codigo_html_bruto .= "&nbsp;";
$codigo_html_bruto .= $numero_curtidas;
$codigo_html_bruto .= "&nbsp;";
$codigo_html_bruto .= $texto_curtiram;
$codigo_html_bruto .= "</div>";

// ----------------------------------------------------------


// retorno ------------------------------------------------

return $codigo_html_bruto; // retorno

// ----------------------------------------------------------


};

// --------------------------------------------------------


?>