<?php


// constroe abas editar perfil ----------------------

function constroe_abas_editar_perfil(){


// globals ----------------------------------------------

global $url_pagina_inicial_site; // url de pagina inicial

// --------------------------------------------------------


// id de usuario --------------------------------------

$idusuario = retorne_idusuario_visualizando_perfil(); // id de usuario

// --------------------------------------------------------


// usuario dono do perfil --------------------------

$usuario_dono_perfil = retorna_usuario_vendo_perfil_dono(); // usuario dono do perfil

// --------------------------------------------------------


// aba selecionada --------------------------------

$aba_selecionada[retorne_modo_editar_perfil()] = "classe_aba_selecionada_perfil"; // aba selecionada

// --------------------------------------------------------


// array de links ------------------------------------

$links = array();

// --------------------------------------------------------


// valida super usuario ----------------------------

if(retorne_super_usuario() == true){

$links[] = "<div class='classe_links_abas_perfil_usuario $aba_selecionada[0]'><a href='$url_pagina_inicial_site?idusuario=$idusuario&tipo_pagina=7&editar_perfil_modo=0' title='Administrar'>Administrar</a></div>"; // links

};

// --------------------------------------------------------


// links -------------------------------------------------

if($usuario_dono_perfil == true){

$links[] = "<div class='classe_links_abas_perfil_usuario $aba_selecionada[1]'><a href='$url_pagina_inicial_site?idusuario=$idusuario&tipo_pagina=7&editar_perfil_modo=1' title='Básico'>Básico</a></div>"; // links
$links[] = "<div class='classe_links_abas_perfil_usuario $aba_selecionada[8]'><a href='$url_pagina_inicial_site?idusuario=$idusuario&tipo_pagina=7&editar_perfil_modo=8' title='Principal'>Principal</a></div>"; // links
$links[] = "<div class='classe_links_abas_perfil_usuario $aba_selecionada[2]'><a href='$url_pagina_inicial_site?idusuario=$idusuario&tipo_pagina=7&editar_perfil_modo=2' title='Profissional'>Profissional</a></div>"; // links
$links[] = "<div class='classe_links_abas_perfil_usuario $aba_selecionada[4]'><a href='$url_pagina_inicial_site?idusuario=$idusuario&tipo_pagina=7&editar_perfil_modo=4' title='Wallpaper'>Wallpaper</a></div>"; // links
$links[] = "<div class='classe_links_abas_perfil_usuario $aba_selecionada[5]'><a href='$url_pagina_inicial_site?idusuario=$idusuario&tipo_pagina=7&editar_perfil_modo=5' title='Senha'>Senha</a></div>"; // links
$links[] = "<div class='classe_links_abas_perfil_usuario $aba_selecionada[6]'><a href='$url_pagina_inicial_site?idusuario=$idusuario&tipo_pagina=7&editar_perfil_modo=6' title='Bloqueio'>Bloqueio</a></div>"; // links
$links[] = "<div class='classe_links_abas_perfil_usuario $aba_selecionada[7]'><a href='$url_pagina_inicial_site?idusuario=$idusuario&tipo_pagina=7&editar_perfil_modo=7' title='Excluir conta'>Excluir conta</a></div>"; // links

};

// --------------------------------------------------------


// codigo html bruto ---------------------------------

foreach($links as $valor_link){


// verifica se e valido --------------------------------

if($valor_link != null){

$codigo_html .= $valor_link;

};

// --------------------------------------------------------


};

// --------------------------------------------------------


// adiciona div de abas --------------------------

$codigo_html = "<div class='classe_div_aba_links_selecao'>$codigo_html</div>"; // adiciona div de abas

// --------------------------------------------------------


// adiciona div especial --------------------------

$codigo_html = constroe_div_especial_geral("Editar perfíl", $codigo_html, null); // adiciona div especial

// --------------------------------------------------------


// retorno -----------------------------------------------

return $codigo_html; // retorno

// ---------------------------------------------------------


};

// --------------------------------------------------------


?>