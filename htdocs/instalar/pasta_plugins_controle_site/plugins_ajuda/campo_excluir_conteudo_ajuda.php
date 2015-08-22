<?php


// campo excluir conteudo ajuda -----------------

function campo_excluir_conteudo_ajuda($dados){


// globals ---------------------------------------------

global $enderecos_arquivos_php_uteis; // arquivos php uteis

// -------------------------------------------------------


// super usuario -------------------------------------

$super_usuario = retorne_super_usuario(); // super usuario

// --------------------------------------------------------


// valida super usuario -----------------------------

if($super_usuario == false){

return null; // retorno nulo

};

// --------------------------------------------------------


// separa dados --------------------------------------

$id = $dados['id']; // separando dados
$titulo_post = $dados['titulo_post']; // separando dados
$idalbum_imagens = $dados['idalbum_imagens']; // separando dados

// --------------------------------------------------------


// escript excluir topico -----------------------------

$script_excluir_topico = $enderecos_arquivos_php_uteis['excluir_topico_ajuda']; // escript excluir topico

// --------------------------------------------------------


// campo excluir --------------------------------------

$campo_excluir .= "<form action='$script_excluir_topico' method='post'>"; // campo excluir
$campo_excluir .= "Deseja mesmo excluir o tópico $id?"; // campo excluir
$campo_excluir .= "<br>"; // campo excluir
$campo_excluir .= "<br>"; // campo excluir
$campo_excluir .= "<font size='4'>"; // campo excluir
$campo_excluir .= $titulo_post; // campo excluir
$campo_excluir .= "</font>"; // campo excluir
$campo_excluir .= "<br>"; // campo excluir
$campo_excluir .= "<br>"; // campo excluir
$campo_excluir .= "<input type='hidden' name='topico_id' value='$id'>"; // campo excluir
$campo_excluir .= "<input type='hidden' name='idalbum_imagens' value='$idalbum_imagens'>"; // campo excluir
$campo_excluir .= "<input type='submit' class='uibutton large confirm' value='Excluir'>"; // campo excluir
$campo_excluir .= "</form>"; // campo excluir

// --------------------------------------------------------


// adiciona janela de dialogo ----------------------

$campo_excluir = janela_mensagem_dialogo("Excluir tópico", $campo_excluir, "div_janela_excluir_topico_ajuda"); // janela de dialogo

// --------------------------------------------------------


// opcoes menu --------------------------------------

$opcoes_menu[] = "<li role='presentation'><a href='#1' id='#1' onclick='dialogo_janela_excluir_topico_ajuda();'>Excluir</a></li>"; // opcoes menu

// --------------------------------------------------------


// codigo html bruto ---------------------------------

$codigo_html_bruto .= "<br>"; // codigo html bruto
$codigo_html_bruto .= constroe_menu_drop_especial($opcoes_menu, "Excluir tópico"); // codigo  html bruto

// --------------------------------------------------------


// adiciona div especial ----------------------------

$codigo_html_bruto = div_especial_mensagem_sistema("Excluir tópico", $codigo_html_bruto); // adiciona div especial
$codigo_html_bruto .= $campo_excluir; // codigo html bruto

// --------------------------------------------------------


// codigo html bruto ---------------------------------

$codigo_html_bruto .= "<br>"; // codigo html bruto

// --------------------------------------------------------


// retorno ----------------------------------------------

return $codigo_html_bruto; // retorno

// --------------------------------------------------------


};

// --------------------------------------------------------


?>