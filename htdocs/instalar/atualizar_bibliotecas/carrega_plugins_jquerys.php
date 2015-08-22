<?php




// carrega e lista todas as funcoes ----------------------------------

$endereco_de_pasta_funcoes = "$pasta_plugins_jquerys/"; // endereço de pasta de funcoes

$arquivos = retorna_arquivos_pasta($endereco_de_pasta_funcoes, ".js"); // listando somente arquivos

// ----------------------------------------------------------------------------




// carregando arquivos -------------------------------------------------

foreach($arquivos as $endereco_de_arquivo){




// conteudo de script php ----------------------------------------------

if($endereco_de_arquivo != null){

$conteudo_script_jquery .= file_get_contents($endereco_de_arquivo); // conteudo de script php

};

// ----------------------------------------------------------------------------




};

// ----------------------------------------------------------------------------




// remove linhas em branco ------------------------------------------

$conteudo_script_jquery = remove_linhas_em_branco($conteudo_script_jquery); // remove linhas em branco

// ----------------------------------------------------------------------------




// salvando jquery ----------------------------------------------------------

func_salvar_arquivo($end_arquivo_jquery_plugin, $conteudo_script_jquery); // salvando jquery

// ----------------------------------------------------------------------------




// limpando variaveis ---------------------------------------------------

$conteudo_script_jquery = null; // limpando conteudo antigo de conteudo de scripts jquery

// ----------------------------------------------------------------------------




?>
