<?php


// monta pacotes com depoimentos -------------

function monta_pacote_depoimentos($comando){


// numero de linhas ----------------------------------

$numero_linhas = retorne_numero_linhas_comando($comando); // numero de linhas

// ---------------------------------------------------------


// contador ---------------------------------------------

$contador = 0; // contador

// ---------------------------------------------------------


// organizando dados --------------------------------

for($contador == $contador; $contador <= $numero_linhas; $contador++){


// obtendo dados -------------------------------------

$dados = mysql_fetch_array($comando, MYSQL_ASSOC); // obtendo dados

// ---------------------------------------------------------


// codigo html bruto ----------------------------------

$codigo_html_bruto .= monta_depoimento($dados);

// ---------------------------------------------------------


};

// ---------------------------------------------------------


// retorno -----------------------------------------------

return $codigo_html_bruto; // retorno

// ---------------------------------------------------------


};

// --------------------------------------------------------


?>