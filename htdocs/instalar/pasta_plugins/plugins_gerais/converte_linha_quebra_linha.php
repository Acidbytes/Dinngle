<?php


// converte linha em quebra de linha ----------------------

function converte_linha_quebra_linha($conteudo, $modo){
	
	
// converte -----------------------------------------------

if($modo == true){
	
$conteudo = str_replace("\n", "<br>", $conteudo); // converte

}else{

$conteudo = str_replace("<br>", "&#13;", $conteudo); // remove

};

// --------------------------------------------------------


// retorno ------------------------------------------------

return $conteudo; // retorno

// --------------------------------------------------------


};

// --------------------------------------------------------


?>