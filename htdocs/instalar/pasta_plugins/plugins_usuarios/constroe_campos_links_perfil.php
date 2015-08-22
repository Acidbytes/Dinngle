<?php


// constroe campos links perfil --------------------

function constroe_campos_links_perfil(){


// globals -----------------------------------------------

global $imagem_servidor; // imagens de servidor

global $url_pagina_inicial_site; // url de pagina inicial

global $url_pagina_inicial_jogos; // url de jogos

// ---------------------------------------------------------


// id de usuario logado ------------------------------

$idusuario = retorne_idusuario_visualizando_perfil(); // id de usuario logado

// ---------------------------------------------------------


// tipo de pagina --------------------------------------

$tipo_pagina = retorne_tipo_pagina(); // tipo de pagina

// ---------------------------------------------------------


// numero de visitas no perfil --------------------

$numero_visitas_perfil = retorne_numero_visitas_perfil(); // numero de visitas no perfil

// ---------------------------------------------------------


// numero de depoimentos ----------------------

$numero_depoimentos = retorne_tamanho_resultado(retorne_numero_depoimentos(1)); // numero de depoimentos

// ---------------------------------------------------------


// numero de lembretes
$numero_lembretes = retorne_numero_lembretes();


// numero de eventos
$numero_eventos = retorne_numero_eventos();


// numero aniversariantes
$numero_aniversariantes = retorne_numero_aniversariantes(1);


// numero de usuarios bloqueados
$numero_usuarios_bloqueados = retorne_numero_usuarios_bloqueados();


// numero de novas mensagens
$numero_novas_mensagens = retorne_numero_novas_mensagens();


// imagens --------------------------------------------

$imagens[1] = "<img src='".$imagem_servidor['campo_1']."'>&nbsp;";
$imagens[2] = "<img src='".$imagem_servidor['campo_2']."'>&nbsp;";
$imagens[3] = "<img src='".$imagem_servidor['campo_3']."'>&nbsp;";
$imagens[4] = "<img src='".$imagem_servidor['campo_4']."'>&nbsp;";
$imagens[5] = "<img src='".$imagem_servidor['campo_5']."'>&nbsp;";
$imagens[6] = "<img src='".$imagem_servidor['campo_6']."'>&nbsp;";
$imagens[7] = "<img src='".$imagem_servidor['campo_7']."'>&nbsp;";
$imagens[8] = "<img src='".$imagem_servidor['campo_8']."'>&nbsp;";
$imagens[9] = "<img src='".$imagem_servidor['campo_9']."'>&nbsp;";
$imagens[10] = "<img src='".$imagem_servidor['campo_10']."'>&nbsp;";
$imagens[11] = "<img src='".$imagem_servidor['campo_11']."'>&nbsp;";
$imagens[12] = "<img src='".$imagem_servidor['campo_12']."'>&nbsp;";
$imagens[13] = "<img src='".$imagem_servidor['campo_13']."'>&nbsp;";

// ---------------------------------------------------------


// links --------------------------------------------------

$links[0] = "<a href='$url_pagina_inicial_site?idusuario=$idusuario&tipo_pagina=3' class='campos_links_perfil'>$imagens[3]Perfíl</a>"; // links
$links[1] = "<a href='$url_pagina_inicial_site?idusuario=$idusuario&tipo_pagina=5' class='campos_links_perfil'>$imagens[5]Fotos</a>"; // links
$links[2] = "<a href='$url_pagina_inicial_site?idusuario=$idusuario&tipo_pagina=4' class='campos_links_perfil'>$imagens[2]Amigos</a>"; // links
$links[3] = "<a href='$url_pagina_inicial_site?idusuario=$idusuario&tipo_pagina=6' class='campos_links_perfil'>$imagens[4]Músicas</a>"; // links
$links[4] = "<a href='#1' id='#1' class='campos_links_perfil' onclick='altera_modo_tipo_carrega_mensagens_chat(2);'>$imagens[6]Mensagens - <span id='span_link_perfil_num_mensagens'>$numero_novas_mensagens</span></a>"; // links
$links[5] = "<a href='$url_pagina_inicial_site?tipo_pagina=8' class='campos_links_perfil'>$imagens[1]Novidades</a>"; // links
$links[6] = "<a href='$url_pagina_inicial_site?idusuario=$idusuario&tipo_pagina=11' class='campos_links_perfil'>$imagens[7]Depoimentos - $numero_depoimentos</a>"; // links
$links[7] = "<a href='$url_pagina_inicial_site?idusuario=$idusuario&tipo_pagina=12' class='campos_links_perfil'>$imagens[8]Visitantes - $numero_visitas_perfil</a>"; // links
$links[8] = "<a href='$url_pagina_inicial_jogos' class='campos_links_perfil'>$imagens[9]Jogos</a>"; // links
$links[9] = "<a href='$url_pagina_inicial_site?tipo_pagina=13&tipo_notifica=2' class='campos_links_perfil'>$imagens[10]Lembrete - $numero_lembretes</a>"; // links
$links[10] = "<a href='$url_pagina_inicial_site?tipo_pagina=13&tipo_notifica=3' class='campos_links_perfil'>$imagens[11]Evento - $numero_eventos</a>"; // links
$links[11] = "<a href='$url_pagina_inicial_site?tipo_pagina=13&tipo_notifica=1' class='campos_links_perfil'>$imagens[12]Aniversariantes - $numero_aniversariantes</a>"; // links
$links[12] = "<a href='$url_pagina_inicial_site?tipo_pagina=7&editar_perfil_modo=6' class='campos_links_perfil'>$imagens[13]Bloqueados - $numero_usuarios_bloqueados</a>"; // links

// ---------------------------------------------------------


// links disponiveis ---------------------------------

foreach($links as $valor_link){


// valida valor link ----------------------------------

if($valor_link != null){

$links_disponiveis .= $valor_link;

};

// ---------------------------------------------------------


};

// ---------------------------------------------------------


// codigo html bruto ----------------------------------

$codigo_html .= "<div class='div_campos_links_perfil'>";
$codigo_html .= constroe_campo_editar_perfil();
$codigo_html .= $links_disponiveis;
$codigo_html .= "</div>";

// ---------------------------------------------------------


// retorno -----------------------------------------------

return $codigo_html; // retorno

// ---------------------------------------------------------


};

// --------------------------------------------------------


?>