<?php




// endereço de pasta de funcoes ------------------------------------

$endereco_de_pasta_funcoes = "$pasta_funcoes_plugins/"; // endereço de pasta de funcoes

// ----------------------------------------------------------------------------




// criando lista de arquivos de funcoes -----------------------------

$arquivos = retorna_arquivos_pasta($endereco_de_pasta_funcoes, ".php"); // listando somente arquivos

// ----------------------------------------------------------------------------




// atualiza lista de arquivos de funcoes ----------------------------

foreach($arquivos as $endereco_arquivo){




// verifica se endereco de arquivo e valido ------------------------

if($endereco_arquivo != null){

include($endereco_arquivo); // auto-include

};

// ----------------------------------------------------------------------------




};

// ----------------------------------------------------------------------------




?>
