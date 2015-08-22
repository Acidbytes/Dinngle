<?php


// exibe evento ao usuario ----------------------

function exibe_evento_usuario($idusuario){


// dados do evento --------------------------------

$dados = dados_evento_idusuario($idusuario); // dados do evento

// ------------------------------------------------------


// verifica se exibe evento ou nao --------------

if(retorne_exibe_evento($dados) == false){

return null; // retorno nulo

};

// --------------------------------------------------------


// separando dados ---------------------------------

$evento = $dados['evento']; // dados

$data_evento = $dados['data_evento']; // dados

$idusuario = $dados['idusuario']; // dados

// --------------------------------------------------------


// imagem do usuario ------------------------------

$imagem_usuario = constroe_imagem_perfil_miniatura($idusuario); // imagem do usuario

// --------------------------------------------------------


// codigo html bruto ---------------------------------

$codigo_html_bruto .= $imagem_usuario;
$codigo_html_bruto .= "&nbsp;";
$codigo_html_bruto .= retorna_link_perfil_usuario($idusuario);
$codigo_html_bruto .= "<br>";
$codigo_html_bruto .= "<br>";
$codigo_html_bruto .= $evento;

// --------------------------------------------------------


// adiciona emoticon --------------------------------

$codigo_html_bruto = converte_codigo_emoticon($codigo_html_bruto); // adiciona emoticon

// --------------------------------------------------------


// adiciona div especial ----------------------------

$codigo_html_bruto = div_especial_quadro_aviso("Evento!", $codigo_html_bruto, $data_evento); // adiciona div especial

// --------------------------------------------------------


// retorno ----------------------------------------------

return $codigo_html_bruto; // retorno

// --------------------------------------------------------


};

// --------------------------------------------------------


?>