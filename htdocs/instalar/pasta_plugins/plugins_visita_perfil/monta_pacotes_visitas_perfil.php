<?php


// monta pacotes visitas perfil ---------------------

function monta_pacotes_visitas_perfil($comando){


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


// dados de tabela ------------------------------------

$idamigo = $dados['idamigo']; // dados de tabela

// ---------------------------------------------------------


// atualizando array ----------------------------------

if($idamigo != null){

$arrays_idusuarios[] = $idamigo; // atualizando array

};

// ---------------------------------------------------------


};

// ---------------------------------------------------------


// codigo html bruto ----------------------------------

$codigo_html_bruto = monta_pacotes_usuarios($arrays_idusuarios, 1);

// ---------------------------------------------------------


// retorno -----------------------------------------------

return $codigo_html_bruto; // retorno

// ---------------------------------------------------------


};

// --------------------------------------------------------


?>