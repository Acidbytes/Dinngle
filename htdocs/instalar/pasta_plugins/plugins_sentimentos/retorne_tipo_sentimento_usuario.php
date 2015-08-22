<?php


// retorna o tipo de sentimento -------------------

function retorne_tipo_sentimento_usuario(){


// globals ----------------------------------------------

global $tabela_banco; // tabela

global $url_pasta_imagens_emoticons_sentimentos; // url de pasta com imagens

// --------------------------------------------------------


// idusuario visualizando perfil -------------------

$idusuario = retorne_idusuario_visualizando_perfil(); // idusuario visualizando perfil

// --------------------------------------------------------


// query ------------------------------------------------

$query = "select *from $tabela_banco[18] where idusuario='$idusuario';"; // query

// --------------------------------------------------------


// dados -----------------------------------------------

$dados = retorne_dados_query($query); // dados

// --------------------------------------------------------


// tipo de sentimento -------------------------------

$tipo_humor = $dados['sentindo_tipo']; // tipo de sentimento

// -------------------------------------------------------


// valida humor --------------------------------------

if($tipo_humor == null){

return null; // retorno

};

// -------------------------------------------------------


// url de imagem ------------------------------------

$url_imagem = $url_pasta_imagens_emoticons_sentimentos."$tipo_humor.png"; // url de imagem

// -------------------------------------------------------


// tipo sentimento ----------------------------------

switch($tipo_humor){

case 1:
$tipo_sentimento = "Zangado"; // tipo de sentimento
break;

case 2:
$tipo_sentimento = "Coração partido"; // tipo de sentimento
break;

case 3:
$tipo_sentimento = "Confuso"; // tipo de sentimento
break;

case 4:
$tipo_sentimento = "Triste"; // tipo de sentimento
break;

case 5:
$tipo_sentimento = "Louco"; // tipo de sentimento
break;

case 6:
$tipo_sentimento = "Fêliz"; // tipo de sentimento
break;

case 7:
$tipo_sentimento = "Apaixonado"; // tipo de sentimento
break;

case 8:
$tipo_sentimento = "Muito fêliz"; // tipo de sentimento
break;

case 9:
$tipo_sentimento = "Fantástico"; // tipo de sentimento
break;

case 10:
$tipo_sentimento = "Normal"; // tipo de sentimento
break;

case 11:
$tipo_sentimento = "Mal"; // tipo de sentimento
break;

case 12:
$tipo_sentimento = "Surpresa"; // tipo de sentimento
break;

case 13:
$tipo_sentimento = "Rindo á toa"; // tipo de sentimento
break;

case 14:
$tipo_sentimento = "Palhaço"; // tipo de sentimento
break;

case 15:
$tipo_sentimento = "Esperto"; // tipo de sentimento
break;

};

// --------------------------------------------------------


// codigo html bruto ---------------------------------

$codigo_html_bruto .= "<img src='$url_imagem' title='$tipo_sentimento'>";
$codigo_html_bruto .= "&nbsp;";
$codigo_html_bruto .= "-";
$codigo_html_bruto .= "&nbsp;";
$codigo_html_bruto .= $tipo_sentimento;

// --------------------------------------------------------


// retorno ----------------------------------------------

return $codigo_html_bruto; // retorno

// --------------------------------------------------------


};

// --------------------------------------------------------


?>