<?php

// abas de navegacao de perfil
function abas_navegacao_perfil_usuario(){


// globals
global $url_pagina_inicial_site;


// id de usuario
$idusuario = retorne_idusuario_visualizando_perfil();


// numero de amigos de usuario
$numero_amigos_usuario = retorne_tamanho_resultado(retorne_numero_amizades_solicitacoes(1));


// numero de imagens em albuns
$numero_total_imagens_albuns_usuario = retorne_tamanho_resultado(retorne_numero_total_imagens_albuns_usuario());


// retorne o numero de musicas no perfil
$numero_musicas_perfil = retorne_tamanho_resultado(retorne_numero_musicas_perfil());


// numero de postagens de usuario
$numero_postagens_usuario = retorne_tamanho_resultado(retorne_numero_postagens_usuario());


// numero de depoimentos
$numero_depoimentos = retorne_tamanho_resultado(retorne_numero_depoimentos(1));


// numero de compartilhamentos
$numero_compartilhamentos = retorne_tamanho_resultado(retorne_numero_compartilhamentos($idusuario));


// aba selecionada
$aba_selecionada[retorne_tipo_pagina()] = "classe_aba_selecionada_perfil";


// links de perfil 
$links['perfil'] = "<div class='classe_links_abas_perfil_usuario $aba_selecionada[3]'><a href='$url_pagina_inicial_site?idusuario=$idusuario&tipo_pagina=3'>Perfíl</a></div>";
$links['fotos'] = "<div class='classe_links_abas_perfil_usuario $aba_selecionada[5]'><a href='$url_pagina_inicial_site?idusuario=$idusuario&tipo_pagina=5'>Fotos - $numero_total_imagens_albuns_usuario</a></div>";
$links['amigos'] = "<div class='classe_links_abas_perfil_usuario $aba_selecionada[4]'><a href='$url_pagina_inicial_site?idusuario=$idusuario&tipo_pagina=4'>Amigos - $numero_amigos_usuario</a></div>";
$links['musica'] = "<div class='classe_links_abas_perfil_usuario $aba_selecionada[6]'><a href='$url_pagina_inicial_site?idusuario=$idusuario&tipo_pagina=6'>Músicas - $numero_musicas_perfil</a></div>";
$links['publicar'] = "<div class='classe_links_abas_perfil_usuario $aba_selecionada[9]'><a href='$url_pagina_inicial_site?idusuario=$idusuario&tipo_pagina=9'>Publicações - $numero_postagens_usuario</a></div>";
$links['depoimentos'] = "<div class='classe_links_abas_perfil_usuario $aba_selecionada[11]'><a href='$url_pagina_inicial_site?idusuario=$idusuario&tipo_pagina=11'>Depoimentos - $numero_depoimentos</a></div>";
$links['profissional'] = "<div class='classe_links_abas_perfil_usuario $aba_selecionada[7]'><a href='$url_pagina_inicial_site?idusuario=$idusuario&tipo_pagina=7&editar_perfil_modo=3'>Profissional</a></div>";
$links['compartilhado'] = "<div class='classe_links_abas_perfil_usuario $aba_selecionada[14]'><a href='$url_pagina_inicial_site?idusuario=$idusuario&tipo_pagina=14'>Compartilhados - $numero_compartilhamentos</a></div>";


// links disponiveis
foreach($links as $valor_link){


// valida valor de link
if($valor_link != null){

$links_abas_perfil .= $valor_link;

};


};


// adiciona div de abas
$links_abas_perfil = "<div class='classe_div_aba_links_selecao'>$links_abas_perfil</div>"; // adiciona div de abas


// codigo html
$codigo_html .= "<div class='classe_abas_perfil_usuario'>";
$codigo_html .= $links_abas_perfil;
$codigo_html .= "</div>";


// retorno
return $codigo_html;


};

?>