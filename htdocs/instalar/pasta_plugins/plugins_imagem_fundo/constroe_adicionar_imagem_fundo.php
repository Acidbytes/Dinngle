<?php


// constroe adicionar imagens fundo ------------

function constroe_adicionar_imagem_fundo(){


// globals ----------------------------------------------

global $imagem_servidor; // imagens do servidor

global $enderecos_arquivos_php_uteis; // enderecos de arquivos php

// --------------------------------------------------------


// url de script de upload --------------------------
 
$url_script_upload = $enderecos_arquivos_php_uteis['upload_imagem_fundo']; // url de script de upload

// --------------------------------------------------------


// imagem adicionar --------------------------------

$imagem_adicionar = "<img src='".$imagem_servidor['camera_add']."' title='Adicionar mais imagens'>"; // imagem adicionar

// --------------------------------------------------------


// campo adicionar imagens ----------------------

$campo_adicionar_imagens .= "<div class='campo_file_imagem_albuns'>"; // campo adicionar imagens
$campo_adicionar_imagens .= "<input type='file' name='foto[]' id='campo_file_imagem_albuns' onchange='barra_progresso(4); enviar_imagens_albuns_automatico();'>"; // campo adicionar imagens
$campo_adicionar_imagens .= "</div>"; // campo adicionar imagens

// --------------------------------------------------------


// codigo remove imagem -----------------------------------

$codigo_remove_imagem .= "<input type='submit' class='uibutton confirm' value='Remover'>"; // codigo remove imagem

// --------------------------------------------------------


// adiciona div especial ----------------------------------

$codigo_remove_imagem = div_especial_mensagem_sistema("Remover imagem de fundo atual", $codigo_remove_imagem); // adiciona div especial

// --------------------------------------------------------


// codigo html bruto ---------------------------------

$codigo_html_bruto .= "<form id='formulario_enviar_imagens_albuns' action='$url_script_upload' method='post' enctype='multipart/form-data'>";
$codigo_html_bruto .= "<div class='div_campo_adicionar_imagens' onclick='clique_botao_adicionar_imagens_albuns();'>";
$codigo_html_bruto .= $imagem_adicionar;
$codigo_html_bruto .= "&nbsp;";
$codigo_html_bruto .= "Adicionar imagem...";
$codigo_html_bruto .= $campo_adicionar_imagens;
$codigo_html_bruto .= "</div>";
$codigo_html_bruto .= "<br>";
$codigo_html_bruto .= $codigo_remove_imagem;
$codigo_html_bruto .= "</form>";
$codigo_html_bruto .= montar_barra_progresso("barra_progresso_upload_imagem_fundo");

// --------------------------------------------------------


// retorno ----------------------------------------------

return $codigo_html_bruto; // retorno

// --------------------------------------------------------


};

// --------------------------------------------------------


?>