<?php


// constroe campo sentimento --------------------

function constroe_campo_sentimento_usuario(){


// tipo de sentimento --------------------------------

$tipo_sentimento = retorne_tipo_sentimento_usuario(); // tipo de sentimento

// --------------------------------------------------------


// valida tipo de sentimento -----------------------

if($tipo_sentimento == null and retorna_usuario_vendo_perfil_dono() == false){

return null; // retorno

};

// --------------------------------------------------------


// codigo html bruto ---------------------------------

$codigo_html_bruto .= "<div class='classe_div_campo_sentimento_usuario'>";
$codigo_html_bruto .= constroe_select_sentimentos_disponiveis();
$codigo_html_bruto .= "<div id='div_exibe_tipo_humor_usuario'>";
$codigo_html_bruto .= retorne_tipo_sentimento_usuario();
$codigo_html_bruto .= "</div>";
$codigo_html_bruto .= "</div>";

// --------------------------------------------------------


// retorno ----------------------------------------------

return $codigo_html_bruto; // retorno

// --------------------------------------------------------


};

// --------------------------------------------------------


?>