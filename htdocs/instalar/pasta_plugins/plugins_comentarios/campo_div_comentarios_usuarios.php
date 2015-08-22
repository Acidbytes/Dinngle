<?php


// campo div comentarios --------------------------

function campo_div_comentarios_usuarios($dados){


// numero de comentarios -------------------------

$numero_comentarios = retorne_numero_comentarios($dados); // numero de comentarios

// --------------------------------------------------------


// campo numero de comentarios ---------------

$campo_numero_comentarios .= "<div class='campo_numero_comentarios'>"; // campo numero de comentarios
$campo_numero_comentarios .= campo_exibe_numero_comentarios($dados); // campo numero de comentarios
$campo_numero_comentarios .= "</div>"; // campo numero de comentarios

// --------------------------------------------------------


// nome de identificacao de div -------------------

$nome_identifica_div = "div_comentarios_usuarios_exibir".retorne_numero_div_id($dados); // nome de identificacao de div

// --------------------------------------------------------


// nome de span contadora de avanco ---------

$nome_identifica_span_contadora = "span_conta_avanco_comentario".retorne_numero_div_id($dados); // nome de span contadora de avanco

// --------------------------------------------------------


// codigo html bruto ---------------------------------

$codigo_html_bruto .= "<div class='campo_div_comentarios_usuarios'>";
$codigo_html_bruto .= $campo_numero_comentarios;
$codigo_html_bruto .= "<span class='classe_span_conta_avanco_comentario' id='$nome_identifica_span_contadora'>0</span>";
$codigo_html_bruto .= "<div id='$nome_identifica_div'>";
$codigo_html_bruto .= carregar_comentarios();
$codigo_html_bruto .= "</div>";
$codigo_html_bruto .= "</div>";
$codigo_html_bruto .= "<div class='campo_div_comentarios_usuarios'>";
$codigo_html_bruto .= campo_carregar_mais_comentarios($dados);
$codigo_html_bruto .= "</div>";

// --------------------------------------------------------


// retorno ----------------------------------------------

if($numero_comentarios > 0){

return $codigo_html_bruto; // retorno

}else{

return null; // retorno sem conteudo

};

// --------------------------------------------------------


};

// --------------------------------------------------------


?>