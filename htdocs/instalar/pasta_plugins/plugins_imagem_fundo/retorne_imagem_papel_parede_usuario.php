<?php


// retorna a imagem de papel de parede -------

function retorne_imagem_papel_parede_usuario($idusuario, $modo_exibir){


// globals -----------------------------------------------

global $tabela_banco; // tabela de banco

// ---------------------------------------------------------


// query -------------------------------------------------

$query = "select *from $tabela_banco[15] where idusuario='$idusuario';"; // query

// ---------------------------------------------------------


// dados -------------------------------------------------

$dados = retorne_dados_query($query); // dados

// ----------------------------------------------------------


// modo a exibir ----------------------------------------

switch($modo_exibir){

case 1:
$url_imagem = $dados['url_imagem_miniatura']; // url de imagem
break;


case 2:
$url_imagem = $dados['url_imagem']; // url de imagem
break;

};

// ----------------------------------------------------------


// valida url de imagem -----------------------------------

if($url_imagem == null){
	
return null; // retorno nulo

};

// --------------------------------------------------------


// div com imagem ------------------------------------

switch($modo_exibir){


case 1:
$codigo_html_bruto .= "<img src='$url_imagem' class='imagem_miniatura_papel_parede'>";
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