<?php


// exibe lembrete ao usuario ----------------------

function exibe_lembrete_usuario(){


// dados do lembrete --------------------------------

$dados = dados_lembrete(); // dados do lembrete

// ---------------------------------------------------------


// verifica se exibe lembrete ou nao --------------

if(retorne_exibe_lembrete($dados) == false){

return null; // retorno nulo

};

// ---------------------------------------------------------


// separando dados ---------------------------------

$lembrete = $dados['lembrete']; // dados
$data_lembrete = $dados['data_lembrete']; // dados

// --------------------------------------------------------


// codigo html bruto ----------------------------------

$codigo_html_bruto .= $lembrete;

// --------------------------------------------------------


// adiciona emoticon --------------------------------

$codigo_html_bruto = converte_codigo_emoticon($codigo_html_bruto); // adiciona emoticon

// --------------------------------------------------------


// adiciona div especial ----------------------------

$codigo_html_bruto = div_especial_quadro_aviso("Lembrete!", $codigo_html_bruto, $data_lembrete); // adiciona div especial

// --------------------------------------------------------


// retorno ----------------------------------------------

return $codigo_html_bruto; // retorno

// --------------------------------------------------------


};

// --------------------------------------------------------


?>