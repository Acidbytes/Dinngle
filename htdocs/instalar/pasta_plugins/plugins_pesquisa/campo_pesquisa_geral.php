<?php

function campo_pesquisa_geral($exibir_imagem){


// globals
global $url_pagina_inicial_site;
global $imagem_servidor;


// tipo de pesquis geral
$tipo_pesquisa_geral = retorna_modo_pesquisa_geral();


// termo de pesquisa
$termo_pesquisa = retorne_termo_pesquisa();


// campo de imagem de pesquisa
if($exibir_imagem == true){

$campo_imagem_pesquisa = "<img src='".$imagem_servidor['pesquisar']."' title='Pesquisar' class='classe_imagem_campo_pesquisa_geral' onclick='simular_enter_campo_pesquisa_geral();'>";

};


// formulario de pesquisa geral
$codigo_html .= "<div class='classe_div_campo_pesquisa_geral'>";
$codigo_html .= "<form id='id_formulario_pesquisa_geral' action='$url_pagina_inicial_site' method='get'>";
$codigo_html .= $campo_imagem_pesquisa;
$codigo_html .= "<input type='text' id='campo_pesquisa_generica' name='pesquisa_generica' value='$termo_pesquisa' placeholder='Pesquisar'>";
$codigo_html .= "<input type='hidden' name='tipo_pagina' value='10'>";
$codigo_html .= "<input type='hidden' name='tipo_pesquisa_geral' value='$tipo_pesquisa_geral'>";
$codigo_html .= "</form>";
$codigo_html .= "</div>";


// retorno
return $codigo_html;


};

?>