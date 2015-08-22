<?php


// retorna a imagem de papel de parede -------

function retorne_imagem_papel_parede_capa_inicial($modo_exibir){


// globals -----------------------------------------------

global $tabela_banco; // tabela de banco

global $url_do_servidor; // url do servidor

// ---------------------------------------------------------


// query -------------------------------------------------

$query = "select *from $tabela_banco[27];"; // query

// ---------------------------------------------------------


// dados -------------------------------------------------

$dados = retorne_dados_query($query); // dados

// ----------------------------------------------------------


// url de imagem ---------------------------------------

$url_imagem = $dados['url_imagem']; // url de imagem

// ----------------------------------------------------------


// div com imagem ------------------------------------

switch($modo_exibir){


case 1:
$codigo_html_bruto .= "<a href='$url_do_servidor'>";
$codigo_html_bruto .= "<img src='$url_imagem' class='imagem_miniatura_papel_parede'>";
$codigo_html_bruto .= "</a>";
break;


case 2:
$codigo_html_bruto .= "<style>";
$codigo_html_bruto .= "body{";
$codigo_html_bruto .= "background-image: url('$url_imagem');";
$codigo_html_bruto .= "background-repeat: no-repeat;";
$codigo_html_bruto .= "background-attachment: fixed;";
$codigo_html_bruto .= "background-position: center;";
$codigo_html_bruto .= "-webkit-background-size: cover;";
$codigo_html_bruto .= "-moz-background-size: cover;";
$codigo_html_bruto .= "-o-background-size: cover;";
$codigo_html_bruto .= "background-size: cover;";
$codigo_html_bruto .= "}";
$codigo_html_bruto .= "</style>";
break;


};

// ----------------------------------------------------------


// retorno ------------------------------------------------

return $codigo_html_bruto; // retorno

// ----------------------------------------------------------


};

// --------------------------------------------------------


?>