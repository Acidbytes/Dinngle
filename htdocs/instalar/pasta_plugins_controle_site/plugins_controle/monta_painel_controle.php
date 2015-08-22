<?php


// monta painel de controle -----------------------

function monta_painel_controle(){


// valida super usuario ------------------------------

if(retorne_super_usuario() == false){

return null; // retorno nulo

};

// ---------------------------------------------------------


// aba selecionada ---------------------------------

$aba_selecionada[retorne_tipo_controle()] = "classe_aba_selecionada_perfil"; // aba selecionada

// ---------------------------------------------------------


// links disponiveis ---------------------------------

$links[] = "<div class='classe_links_abas_perfil_usuario $aba_selecionada[1]'><a href='$url_pagina_inicial_site?tipo_pagina=7&editar_perfil_modo=0&numero_controle=1' title='Fundo de início'>Fundo de início</a></div>"; // links
$links[] = "<div class='classe_links_abas_perfil_usuario $aba_selecionada[2]'><a href='$url_pagina_inicial_site?tipo_pagina=7&editar_perfil_modo=0&numero_controle=2' title='Documentação'>Documentação</a></div>"; // links
$links[] = "<div class='classe_links_abas_perfil_usuario $aba_selecionada[3]'><a href='$url_pagina_inicial_site?tipo_pagina=7&editar_perfil_modo=0&numero_controle=3' title='Funções PHP'>Funções PHP</a></div>"; // links
$links[] = "<div class='classe_links_abas_perfil_usuario $aba_selecionada[4]'><a href='$url_pagina_inicial_site?tipo_pagina=7&editar_perfil_modo=0&numero_controle=4' title='Usuários'>Usuários</a></div>"; // links

// ---------------------------------------------------------


// codigo html bruto ---------------------------------

foreach($links as $valor_link){


// valida valor de link -------------------------------

if($valor_link != null){

$codigo_html .= $valor_link; // codigo html bruto

};

// --------------------------------------------------------


};

// --------------------------------------------------------


// adiciona div de abas --------------------------

$codigo_html = "<div class='classe_div_aba_links_selecao'>$codigo_html</div>"; // adiciona div de abas

// --------------------------------------------------------


// titulo de div ---------------------------------------

$titulo_div = "Controle geral"; // titulo de div

// --------------------------------------------------------


// adiciona div especial --------------------------

$codigo_html = constroe_div_especial_geral($titulo_div, $codigo_html, null); // adiciona div especial

// --------------------------------------------------------


// monta servicos de painel de controle ----

$codigo_html .= monta_servicos_painel_controle(); // monta servicos de painel de controle

// ---------------------------------------------------------


// retorno -----------------------------------------------

return $codigo_html; // retorno

// ---------------------------------------------------------


};

// --------------------------------------------------------


?>