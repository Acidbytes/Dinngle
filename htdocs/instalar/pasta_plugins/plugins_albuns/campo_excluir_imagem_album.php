<?php


// campo excluir imagem de album --------------

function campo_excluir_imagem_album($dados){


// globals -----------------------------------------------

global $enderecos_arquivos_php_uteis; // enderecos de scripts uteis

// ---------------------------------------------------------


// dados ------------------------------------------------

$id = $dados['id'];

$nome_album_identificador = $dados['nome_album_identificador'];

// ---------------------------------------------------------


// numero div id excluir imagem ------------------

$numero_div_id_excluir_imagem = "div_campo_excluir_imagem_".$id; // numero div id excluir imagem

// --------------------------------------------------------


// endereco url de script para excluir imagem ------

$endereco_url_script_excluir_imagem = $enderecos_arquivos_php_uteis['excluir_imagem_album']; // endereco url de script para excluir imagem

// --------------------------------------------------------------


// campo excluir imagem --------------------------

$codigo_html_bruto .= "<form action='$endereco_url_script_excluir_imagem' method='post'>"; // campo excluir imagem
$codigo_html_bruto .= "Excluir esta imagem?"; // campo excluir imagem
$codigo_html_bruto .= "<br>"; // campo excluir imagem
$codigo_html_bruto .= "<br>"; // campo excluir imagem
$codigo_html_bruto .= "<input type='hidden' name='id_imagem' value='$id'>"; // campo excluir imagem
$codigo_html_bruto .= "<input type='hidden' name='nome_album_identificador' value='$nome_album_identificador'>"; // campo excluir imagem
$codigo_html_bruto .= "<input type='hidden' name='imagem_unica' value='true'>"; // campo excluir imagem
$codigo_html_bruto .= "<input type='submit' class='botao_padrao' value='Excluir'>"; // campo excluir imagem
$codigo_html_bruto .= "</form>"; // campo excluir imagem

// --------------------------------------------------------


// constroe dialogo excluir imagem -------------

$codigo_html_bruto = janela_mensagem_dialogo("Excluir imagem", $codigo_html_bruto, $numero_div_id_excluir_imagem); // constroe dialogo excluir imagem

// --------------------------------------------------------


// retorno ---------------------------------------

return $codigo_html_bruto; // retorno

// --------------------------------------------------


};

// --------------------------------------------------------


?>