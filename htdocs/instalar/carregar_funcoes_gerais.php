<?php




// endereço de pasta de funcoes ------------------------------------

$endereco_de_pasta_funcoes = "$pasta_funcoes/"; // endereço de pasta de funcoes

// ----------------------------------------------------------------------------




// criando lista de arquivos de funcoes -----------------------------

$arquivos = glob("$endereco_de_pasta_funcoes{*.php}", GLOB_BRACE); // criando lista de arquivos de funcoes

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
