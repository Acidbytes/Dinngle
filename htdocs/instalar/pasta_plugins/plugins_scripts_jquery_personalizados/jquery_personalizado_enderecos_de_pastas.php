<?php


// jqureys com enderecos de pastas -------------

function jquery_personalizado_enderecos_de_pastas(){


// globals -----------------------------------------------

global $pasta_acoes; //pasta de acoes

global $pasta_sons_sistema; // pasta com sons de sistema

global $limite_resultados_pagina; // numero de resultados limit por pagina

global $limite_resultados_pagina_comentarios; // limite de comentarios

// ---------------------------------------------------------


// codigo html bruto ----------------------------------

$codigo_html .= "\n";
$codigo_html .= "// pasta de acoes";
$codigo_html .= "\n";
$codigo_html .= "var pasta_acoes = '$pasta_acoes';";
$codigo_html .= "\n";
$codigo_html .= "// pasta sons de sistema";
$codigo_html .= "\n";
$codigo_html .= "var pasta_sons_sistema='$pasta_sons_sistema';";
$codigo_html .= "\n";
$codigo_html .= "// limite de resultados por pagina";
$codigo_html .= "\n";
$codigo_html .= "var limite_resultados_pagina = $limite_resultados_pagina;";
$codigo_html .= "\n";
$codigo_html .= "aplica_resolucao();";
$codigo_html .= "\n";
$codigo_html .= "var numero_avancos_comentarios = $limite_resultados_pagina_comentarios;";
$codigo_html .= "\n";

// ---------------------------------------------------------


// codigo html bruto ----------------------------------

if(retorne_esta_logado() == true){

$codigo_html .= "carregar_chat_usuario();";
$codigo_html .= "\n";
$codigo_html .= "carregar_sessao_chat_anterior();";
$codigo_html .= "\n";

};

// ---------------------------------------------------------


// retorno -----------------------------------------------

return $codigo_html; // retorno

// ---------------------------------------------------------


};

// --------------------------------------------------------


?>