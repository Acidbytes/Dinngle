<?php




// carrega e lista todas as funcoes ----------------------------------

$endereco_de_pasta_funcoes = "$pasta_css/"; // endereço de pasta de funcoes

$arquivos = glob("$endereco_de_pasta_funcoes{*.css}", GLOB_BRACE); // listando somente arquivos

// ----------------------------------------------------------------------------




// carregando arquivos -------------------------------------------------

foreach($arquivos as $endereco_de_arquivo){




// conteudo de script php ----------------------------------------------

if($endereco_de_arquivo != null){

$conteudo_script_css .= file_get_contents($endereco_de_arquivo); // conteudo de script php

};

// ----------------------------------------------------------------------------




};

// ----------------------------------------------------------------------------




// remove linhas em branco ------------------------------------------

$conteudo_script_css = remove_linhas_em_branco($conteudo_script_css); // remove linhas em branco

// ----------------------------------------------------------------------------




// salvando css ----------------------------------------------------------

func_salvar_arquivo($end_arquivo_css, $conteudo_script_css); // salvando css

// ----------------------------------------------------------------------------




// limpando variaveis ---------------------------------------------------

$conteudo_script_css = null; // limpando conteudo antigo de conteudo de scripts php

// ----------------------------------------------------------------------------




?>
