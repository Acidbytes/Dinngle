<?php


// carrega o plano de fundo -----------------------------------------------------------------------------------------

function carrega_plano_fundo($codigo_html_bruto){




// globals ----------------------------------------------------------------------------------------------------------

global $tabela; // tabela

global $pasta_plano_fundo; // pasta de imagem de fundo

global $url_do_servidor; // url de servidor

global $imagem_de_fundo_padrao; // imagem de fundo padrao

// ------------------------------------------------------------------------------------------------------------------




// dados de formulario ----------------------------------------------------------------------------------------------

$idusuario = $_GET['idusuario']; // id de usuario

// ------------------------------------------------------------------------------------------------------------------




// id usuario logado ------------------------------------------------------------------------------------------------

$idusuario_logado = retorne_idusuario_logado(); // id de usuario logado

// ------------------------------------------------------------------------------------------------------------------




// se o id de usuario for nulo, entao usar o id de usuario logado ---------------------------------------------------

if($idusuario == null and $idusuario_logado != null){




// iguala ids -------------------------------------------------------------------------------------------------------

$idusuario = $idusuario_logado; // se o id de usuario for nulo, entao usar o id de usuario logado

// ------------------------------------------------------------------------------------------------------------------




};

// ------------------------------------------------------------------------------------------------------------------




// se o id de usuario for diferente de null entao consultar tabela em banco de dados --------------------------------

if($idusuario != null){




// query obtem url de imagem ----------------------------------------------------------------------------------------

$query = "select *from $tabela[2] where idusuario='$idusuario';"; // query obtem url de imagem

// ------------------------------------------------------------------------------------------------------------------




// comando ----------------------------------------------------------------------------------------------------------

$comando = comando_executa($query); // comando

// ------------------------------------------------------------------------------------------------------------------




// dados ------------------------------------------------------------------------------------------------------------

$dados = mysql_fetch_array($comando, MYSQL_ASSOC); // array com dados

// ------------------------------------------------------------------------------------------------------------------




// url de imagem ----------------------------------------------------------------------------------------------------

$url_imagem = $dados['url_imagem_fundo']; // url da imagem

// ------------------------------------------------------------------------------------------------------------------




// opcoes imagem de fundo -------------------------------------------------------------------------------------------

$opcoes_imagem_fundo = $dados['opcoes_imagem']; // opcoes de imagem de fundo

// ------------------------------------------------------------------------------------------------------------------




// obtem a url completa da imagem de fundo --------------------------------------------------------------------------

$url_imagem = $url_do_servidor.$pasta_plano_fundo."/".$idusuario."/".basename($url_imagem); // obtem a url completa da imagem de fundo 

// ------------------------------------------------------------------------------------------------------------------




}else{




// obtem a url completa da imagem de fundo --------------------------------------------------------------------------

$url_imagem = $imagem_de_fundo_padrao; // obtem a url completa da imagem de fundo 

// ------------------------------------------------------------------------------------------------------------------




// opcoes da imagem ------------------------------------------------------------------------

$opcoes_imagem_fundo .= ""; // opcoes da imagem
$opcoes_imagem_fundo .= ""; // opcoes da imagem
$opcoes_imagem_fundo .= "background-repeat: no-repeat;"; // opcoes da imagem
$opcoes_imagem_fundo .= ""; // opcoes da imagem
$opcoes_imagem_fundo .= "background-attachment: fixed;"; // opcoes da imagem
$opcoes_imagem_fundo .= ""; // opcoes da imagem
$opcoes_imagem_fundo .= "background-size: 100% 100%;"; // opcoes da imagem
$opcoes_imagem_fundo .= ""; // opcoes da imagem
$opcoes_imagem_fundo .= ""; // opcoes da imagem

// ---------------------------------------------------------------------------------------------------




};

// ------------------------------------------------------------------------------------------------------------------




// css imagem de plano de fundo ---------------------------------------------------------------------------------------

$css_imagem_fundo .= "<style type='text/css'>"; // css da imagem de fundo
$css_imagem_fundo .= ""; // css da imagem de fundo
$css_imagem_fundo .= "body{"; // css da imagem de fundo
$css_imagem_fundo .= ""; // css da imagem de fundo
$css_imagem_fundo .= "background-image: url('$url_imagem');"; // css da imagem de fundo
$css_imagem_fundo .= ""; // css da imagem de fundo
$css_imagem_fundo .= $opcoes_imagem_fundo; // css da imagem de fundo
$css_imagem_fundo .= ""; // css da imagem de fundo
$css_imagem_fundo .= ""; // css da imagem de fundo
$css_imagem_fundo .= ""; // css da imagem de fundo
$css_imagem_fundo .= ""; // css da imagem de fundo
$css_imagem_fundo .= ""; // css da imagem de fundo
$css_imagem_fundo .= ""; // css da imagem de fundo
$css_imagem_fundo .= ""; // css da imagem de fundo
$css_imagem_fundo .= ""; // css da imagem de fundo
$css_imagem_fundo .= "}"; // css da imagem de fundo
$css_imagem_fundo .= ""; // css da imagem de fundo
$css_imagem_fundo .= "</style>"; // css da imagem de fundo

// ------------------------------------------------------------------------------------------------------------------




// adiciona o css na pagina -----------------------------------------------------------------------------------------

$codigo_html_bruto = str_replace("#_css_imagem_fundo_#", $css_imagem_fundo, $codigo_html_bruto); // adiciona o css na pagina

// ------------------------------------------------------------------------------------------------------------------




// retorno ----------------------------------------------------------------------------------------------------------

return $codigo_html_bruto;

// ------------------------------------------------------------------------------------------------------------------




};

// ------------------------------------------------------------------------------------------------------------------


?>