<?php


// campo pesquisa jogos ------------------------

function campo_pesquisa_jogos(){


// globals ----------------------------------------------

global $nome_do_sistema; // nome do sistema

global $imagem_servidor; // imagens de servidor

global $url_pagina_inicial_jogos; // url de pagina inicial de jogos

// --------------------------------------------------------


// termo de pesquisa ------------------------------

$pesquisa_generica = retorne_termo_pesquisa(); // termo de pesquisa

// --------------------------------------------------------


// imagem de jogo ---------------------------------

$imagem = "<img src='".$imagem_servidor['jogo']."' title='Jogos $nome_do_sistema'>"; // imagem de jogo

// --------------------------------------------------------


// campo numero de jogos ----------------------

if($pesquisa_generica != null){


// numero de jogos --------------------------------

$numero_jogos = retorne_numero_jogos(); // numero de jogos

// --------------------------------------------------------


// plural ou singular -------------------------------

if($numero_jogos > 1){

$plural_singular = "jogos"; // plural ou singular

}else{

$plural_singular = "jogo"; // plural ou singular

};

// --------------------------------------------------------


// campo numero de jogos ----------------------

$campo_numero_jogos .= "<div class='div_campo_numero_jogos'>"; // campo numero de jogos
$campo_numero_jogos .= "$nome_do_sistema encontrou $numero_jogos $plural_singular"; // campo numero de jogos
$campo_numero_jogos .= ", para <span class='span_numero_jogos'>$pesquisa_generica</span>."; // campo numero de jogos
$campo_numero_jogos .= "</div>"; // campo numero de jogos

// --------------------------------------------------------

};

// --------------------------------------------------------


// codigo html bruto -------------------------------

$codigo_html_bruto .= "<div class='div_pesquisa_jogos'>";
$codigo_html_bruto .= "<form action='$url_pagina_inicial_jogos' method='get'>";
$codigo_html_bruto .= $imagem;
$codigo_html_bruto .= "<br>";
$codigo_html_bruto .= "Pesquisar jogos $nome_do_sistema";
$codigo_html_bruto .= "<br>";
$codigo_html_bruto .= "<input type='text' name='pesquisa_generica' class='input_termo_pesquisa_jogos' value='$pesquisa_generica' placeholder='Nome do jogo' autofocus>";
$codigo_html_bruto .= "<br>";
$codigo_html_bruto .= "<input type='submit' class='botao_padrao' value='Pesquisar'>";
$codigo_html_bruto .= "</form>";
$codigo_html_bruto .= $campo_numero_jogos;
$codigo_html_bruto .= "</div>";

// --------------------------------------------------------


// retorno ---------------------------------------------

return $codigo_html_bruto; // retorno

// --------------------------------------------------------


};

// --------------------------------------------------------


?>