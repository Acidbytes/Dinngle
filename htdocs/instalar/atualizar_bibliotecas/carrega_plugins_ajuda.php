<?php




// carrega e lista todas as funcoes ----------------------------------

$endereco_de_pasta_funcoes = "$pasta_plugins_controle_site/"; // endereço de pasta de funcoes

$arquivos = retorna_arquivos_pasta($endereco_de_pasta_funcoes, ".php"); // listando somente arquivos

// ----------------------------------------------------------------------------




// carregando arquivos -------------------------------------------------

foreach($arquivos as $endereco_de_arquivo){




// conteudo de script php ----------------------------------------------

if($endereco_de_arquivo != null){

$conteudo_script_php .= file_get_contents($endereco_de_arquivo); // conteudo de script php

};

// ----------------------------------------------------------------------------




};

// ----------------------------------------------------------------------------




// remove marcadores php --------------------------------------------

$conteudo_script_php = str_replace("<?php", null, $conteudo_script_php); // inicio

$conteudo_script_php = str_replace("?>", null, $conteudo_script_php); // fim

// ----------------------------------------------------------------------------




// atualiza codigo fonte final ------------------------------------------

$codigo_fonte_scripts_php_plugins_ajuda .= "<?php"; // atualiza codigo fonte final
$codigo_fonte_scripts_php_plugins_ajuda .= $conteudo_script_php; // atualiza codigo fonte final
$codigo_fonte_scripts_php_plugins_ajuda .= "?>"; // atualiza codigo fonte final

// ----------------------------------------------------------------------------




// remove linhas em branco ------------------------------------------

$codigo_fonte_scripts_php_plugins_ajuda = remove_linhas_em_branco($codigo_fonte_scripts_php_plugins_ajuda); // remove linhas em branco

// ---------------------------------------------------------------------------




// limpando variaveis ---------------------------------------------------

$conteudo_script_php = null; // limpando conteudo antigo de conteudo de scripts php

// ----------------------------------------------------------------------------




?>
