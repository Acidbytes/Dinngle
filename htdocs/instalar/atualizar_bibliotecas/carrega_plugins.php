<?php




// carrega e lista todas as funcoes ----------------------------------

$endereco_de_pasta_funcoes = "$pasta_plugins/"; // endereço de pasta de funcoes

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

$codigo_fonte_scripts_php_todos .= $conteudo_script_php; // atualiza codigo fonte final

// ----------------------------------------------------------------------------




// limpando variaveis ---------------------------------------------------

$conteudo_script_php = null; // limpando conteudo antigo de conteudo de scripts php

// ----------------------------------------------------------------------------




?>
