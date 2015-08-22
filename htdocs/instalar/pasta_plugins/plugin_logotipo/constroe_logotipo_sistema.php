<?php


// constroe o logotipo do sistema ---------------

function constroe_logotipo_sistema($tipo_logotipo){


// globals ----------------------------------------------

global $imagem_servidor; // imagens de servidor

global $nome_do_sistema; // nome do sistema

global $url_do_servidor; // url de servidor

// --------------------------------------------------------


// tipo de logotipo -----------------------------------

switch($tipo_logotipo){


case 1:
$url_imagem = $imagem_servidor['logotipo_1']; // url de imagem
break;




};

// --------------------------------------------------------


// codigo html bruto ---------------------------------

$codigo_html_bruto .= "<div class='classe_logotipo_sistema'>";
$codigo_html_bruto .= "<a href='$url_do_servidor'>";
$codigo_html_bruto .= "<img src='$url_imagem' title='$nome_do_sistema'>";
$codigo_html_bruto .= "</a>";
$codigo_html_bruto .= "</div>";

// ---------------------------------------------------------


// retorno -----------------------------------------------

return $codigo_html_bruto; // retorno

// ---------------------------------------------------------


};

// --------------------------------------------------------


?>