<?php


// constroe select sentimentos disponiveis ----

function constroe_select_sentimentos_disponiveis(){


// globals -----------------------------------------------

global $url_pasta_imagens_emoticons_sentimentos; // url de pasta com imagens

global $numero_emoticons_sentimentos_atual; // numero de emoticons

// ---------------------------------------------------------


// usuario dono do perfil ----------------------------

$usuario_dono_perfil = retorna_usuario_vendo_perfil_dono(); // usuario dono do perfil

// ---------------------------------------------------------


// verifica se e o dono do perfil --------------------

if($usuario_dono_perfil == false){

return null; // retorno nulo

};

// ---------------------------------------------------------


// contador ---------------------------------------------

$contador = 1; // contador

// --------------------------------------------------------


// convertendo codigos em emoticons ---------

for($contador == $contador; $contador <= $numero_emoticons_sentimentos_atual; $contador++){


// url de imagem -------------------------------------

$url_imagem = $url_pasta_imagens_emoticons_sentimentos."$contador.png"; // url de imagem

// --------------------------------------------------------


// tipo sentimento -----------------------------------

switch($contador){

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

$codigo_html_bruto .= "<div class='div_opcao_sentimento_menu_drop_usuario' onclick='salvar_humor_usuario($contador);'>";
$codigo_html_bruto .= "<img src='$url_imagem' title='$contador'>";
$codigo_html_bruto .= "&nbsp;";
$codigo_html_bruto .= "-";
$codigo_html_bruto .= "&nbsp;";
$codigo_html_bruto .= $tipo_sentimento;
$codigo_html_bruto .= "</div>";

// --------------------------------------------------------


// adiciona meme e emoticon --------------------

$array_retorno[] = "<li role='presentation'>$codigo_html_bruto</li>"; // monta array de retorno

// --------------------------------------------------------


// limpa variaveis ------------------------------------

$codigo_html_bruto = null; // limpando

// --------------------------------------------------------


};

// --------------------------------------------------------


// retorno ---------------------------------------------

return constroe_menu_drop_especial($array_retorno, "Sentindo"); // retorno

// -------------------------------------------------------


};

// -------------------------------------------------------


?>