<?php


// monta pacote de postagem ---------------------

function monta_pacote_postagem($comando){


// contador --------------------------------------------

$contador = 0; // contador

// --------------------------------------------------------


// numero de linhas ---------------------------------

$numero_linhas = retorne_numero_linhas_comando($comando); // numero de linhas

// --------------------------------------------------------


// montando pacotes de retorno -----------------

for($contador == $contador; $contador <= $numero_linhas; $contador++){


// obtendo dados -------------------------------------

$dados = mysql_fetch_array($comando, MYSQL_ASSOC); // obtendo dados

// ---------------------------------------------------------


// codigo html bruto ----------------------------------

$codigo_html_bruto .= constroe_div_postagem($dados);

// --------------------------------------------------------


};

// --------------------------------------------------------


// retorno de codigo --------------------------------

return $codigo_html_bruto; // retorno de codigo

// --------------------------------------------------------


};

// --------------------------------------------------------

?>