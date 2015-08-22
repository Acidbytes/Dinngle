<?php


// monta pacotes de usuarios ---------------------

function monta_pacotes_usuarios($arrays_idusuarios, $tipo_exibir){


// tipo exibir --------------------------------------------

// 1 exibe usuarios normal
// 2 exibe usuarios miniatura

// ---------------------------------------------------------


// globals -----------------------------------------------

global $url_pagina_inicial_site; // url de pagina inicial

// ---------------------------------------------------------


// verifica tamanho de array ------------------------

if(count($arrays_idusuarios) == 0){

return null; // retorno nulo

};

// ---------------------------------------------------------


// id de usuario get -----------------------------------

$idusuario_get = retorne_idusuario_get(); // id de usuario get

// ---------------------------------------------------------


// listando ids de usuario e montando pacote -

foreach($arrays_idusuarios as $idusuario){


// construindo perfil ultra basico ------------------

if($idusuario != null){

$lista_resultados .= constroe_perfil_ultra_basico_usuario($idusuario, $tipo_exibir); // construindo perfil ultra basico

};

// ---------------------------------------------------------


};

// --------------------------------------------------------


// tipo de perfil a exibir -----------------------------

switch($tipo_exibir){


case 2:

// numero de amigos ------------------------------

$numero_amigos = retorne_numero_amizades_solicitacoes(1); // numero de amigos

// -------------------------------------------------------


// div para completar perfis miniaturas --------

$div_completa_perfis_miniaturas .= "<div class='div_separa_sessao_perfil'>"; // div para completar perfis miniaturas
$div_completa_perfis_miniaturas .= "<a href='$url_pagina_inicial_site?idusuario=$idusuario_get&tipo_pagina=4' title='Amigos'>"; // div para completar perfis miniaturas
$div_completa_perfis_miniaturas .= "Amigos($numero_amigos)"; // div para completar perfis miniaturas
$div_completa_perfis_miniaturas .= "</a>"; // div para completar perfis miniaturas
$div_completa_perfis_miniaturas .= "</div>"; // div para completar perfis miniaturas
$div_completa_perfis_miniaturas .= "<div class='div_completa_perfis_miniaturas'>"; // div para completar perfis miniaturas
$div_completa_perfis_miniaturas .= $lista_resultados; // div para completar perfis miniaturas
$div_completa_perfis_miniaturas .= "</div>"; // div para completar perfis miniaturas

// --------------------------------------------------------


// adiciona div a lista -------------------------------

$lista_resultados = $div_completa_perfis_miniaturas; // adiciona div a lista

// --------------------------------------------------------

break;








};

// --------------------------------------------------------


// retorno ----------------------------------------------

return $lista_resultados; // retorno

// --------------------------------------------------------


};

// --------------------------------------------------------


?>