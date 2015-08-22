<?php


// constroe aba de publicacao de conteudo ---

function constroe_aba_publicacao_conteudo(){


// globals -------------------------------------------------

global $imagem_servidor;

// ------------------------------------------------------------


// imagem de camera ---------------------------------

$imagem[0] = "<img src='".$imagem_servidor['campo_5']."' title='Adicionar imagens'>"; // imagem de camera

// ------------------------------------------------------------


// codigo html bruto -----------------------------------

$codigo_html_bruto .= "<a href='#imgpost' id='imgpost' title='Adicionar imagens' onclick='clique_botao_adicionar_imagens_publicacao();'>";
$codigo_html_bruto .= $imagem[0];
$codigo_html_bruto .= "</a>";
$codigo_html_bruto .= "&nbsp;";
$codigo_html_bruto .= "<a href='#imgpost' id='imgpost' title='Adicionar imagens' onclick='clique_botao_adicionar_imagens_publicacao();'>";
$codigo_html_bruto .= "Adicionar imagens";
$codigo_html_bruto .= "</a>";

// ------------------------------------------------------------


// retorno -------------------------------------------------

return $codigo_html_bruto; // retorno

// ------------------------------------------------------------


};

// ------------------------------------------------------------


?>