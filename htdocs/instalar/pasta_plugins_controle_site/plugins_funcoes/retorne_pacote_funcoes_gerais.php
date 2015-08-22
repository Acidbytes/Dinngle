<?php


// retorna o pacote com todas as funcoes -----

function retorne_pacote_funcoes_gerais($query){


// contador ---------------------------------------------

$contador = 0; // contador

// ---------------------------------------------------------


// comando --------------------------------------------

$comando = comando_executa($query); // comando

// ---------------------------------------------------------


// numero de linhas de comando -----------------

$numero_linhas = retorne_numero_linhas_comando($comando); // numero de linhas de comando

// ---------------------------------------------------------


// obtendo dados de tabela ------------------------

for($contador == $contador; $contador <= $numero_linhas; $contador++){


// dados -------------------------------------------------

$dados = mysql_fetch_array($comando, MYSQL_ASSOC); // dados

// ----------------------------------------------------------


// separando dados ----------------------------------

$nome = $dados['nome']; // dados
$tipo = $dados['tipo']; // dados
$conteudo = $dados['conteudo']; // dados

// ----------------------------------------------------------


// adiciona barras removidas ---------------------

$conteudo = stripslashes($conteudo); // adiciona barras removidas

// ----------------------------------------------------------


// valida nome de funcao ----------------------------

if($nome != null){

$codigo_html_bruto .= "<div class='classe_div_funcoes_gerais'>"; // codigo html bruto
$codigo_html_bruto .= "<div class='classe_div_funcoes_gerais_titulo'><li>$nome</div>"; // codigo html bruto
$codigo_html_bruto .= "<div class='classe_div_funcoes_gerais_conteudo'>"; // codigo html bruto
$codigo_html_bruto .= "<textarea cols='40' rows='40'>"; // codigo html bruto
$codigo_html_bruto .= $conteudo; // codigo html bruto
$codigo_html_bruto .= "</textarea>"; // codigo html bruto
$codigo_html_bruto .= "</div>"; // codigo html bruto
$codigo_html_bruto .= "</div>"; // codigo html bruto

};

// ----------------------------------------------------------


};

// ---------------------------------------------------------


// retorno -----------------------------------------------

return $codigo_html_bruto; // retorno

// ---------------------------------------------------------


};

// --------------------------------------------------------


?>