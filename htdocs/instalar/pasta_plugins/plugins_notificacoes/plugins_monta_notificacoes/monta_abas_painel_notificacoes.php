<?php


// monta abas de painel de notificacoes -------

function monta_abas_painel_notificacoes(){


// globals ----------------------------------------------

global $imagem_servidor; // imagem de servidor

global $url_pagina_inicial_site; // url de servidor

// --------------------------------------------------------


// contador --------------------------------------------

$contador = 0; // contador

$contador_notificacao = 0; // contador notificacao

// --------------------------------------------------------


// tipo de pagina -------------------------------------

$tipo_pagina = retorne_tipo_pagina(); // tipo de pagina

// --------------------------------------------------------


// url padrao ------------------------------------------

$url_padrao = $url_pagina_inicial_site."?tipo_pagina=$tipo_pagina"; // url padrao

// --------------------------------------------------------


// numero de aniversariantes ---------------------

$numero_aniversariantes = retorne_numero_aniversariantes(1); // numero de aniversariantes

// --------------------------------------------------------


// numero de lembretes ----------------------------

$numero_lembretes = retorne_numero_lembretes(); // numero de lembretes

// --------------------------------------------------------


// numero de eventos -------------------------------

$numero_eventos = retorne_numero_eventos(); // numero de eventos

// --------------------------------------------------------


// imagens --------------------------------------------

$imagem[0] = "<img class='classe_imagem_notificacao' src='".$imagem_servidor['aniversario']."' title='Aniversário'>"; // imagem
$imagem[1] = "<img class='classe_imagem_notificacao' src='".$imagem_servidor['lembrete']."' title='Lembrete'>"; // imagem
$imagem[2] = "<img class='classe_imagem_notificacao' src='".$imagem_servidor['calendario']."' title='Evento'>"; // imagem
$imagem[3] = "<img class='classe_imagem_notificacao' src='".$imagem_servidor['nt1']."' title='Comentários'>"; // imagem
$imagem[4] = "<img class='classe_imagem_notificacao' src='".$imagem_servidor['nt2']."' title='Curtidas'>"; // imagem
$imagem[5] = "<img class='classe_imagem_notificacao' src='".$imagem_servidor['nt3']."' title='Compartilhamentos'>"; // imagem
$imagem[6] = "<img class='classe_imagem_notificacao' src='".$imagem_servidor['nt4']."' title='Aceitou amizade'>"; // imagem
$imagem[7] = "<img class='classe_imagem_notificacao' src='".$imagem_servidor['nt5']."' title='Solicitação de amizades'>"; // imagem
$imagem[8] = "<img class='classe_imagem_notificacao' src='".$imagem_servidor['nt6']."' title='Depoimentos'>"; // imagem

// --------------------------------------------------------


// links -------------------------------------------------

$contador++; // atualiza contador
$links[] = "<a href='$url_padrao&tipo_notifica=$contador' class='links_servicos_perfil_notificacao' title='Aniversário'>$imagem[0]$numero_aniversariantes</a>"; // links

$contador++; // atualiza contador
$links[] = "<a href='$url_padrao&tipo_notifica=$contador' class='links_servicos_perfil_notificacao' title='Lembrete'>$imagem[1]$numero_lembretes</a>"; // links

$contador++; // atualiza contador
$links[] = "<a href='$url_padrao&tipo_notifica=$contador' class='links_servicos_perfil_notificacao' title='Evento'>$imagem[2]$numero_eventos</a>"; // links

$contador++; // atualiza contador
$contador_notificacao++; // atualiza contador de notificacao
$numero_notificacao = retorne_numero_notificacoes($contador_notificacao); // numero de notificacoes
$numero_total_notificacoes += $numero_notificacao; // numero total de notificacoes
$links[] = "<a href='$url_padrao&tipo_notifica=$contador' class='links_servicos_perfil_notificacao' title='Comentários'>$imagem[3]$numero_notificacao</a>"; // links

$contador++; // atualiza contador
$contador_notificacao++; // atualiza contador de notificacao
$numero_notificacao = retorne_numero_notificacoes($contador_notificacao); // numero de notificacoes
$numero_total_notificacoes += $numero_notificacao; // numero total de notificacoes
$links[] = "<a href='$url_padrao&tipo_notifica=$contador' class='links_servicos_perfil_notificacao' title='Curtidas'>$imagem[4]$numero_notificacao</a>"; // links

$contador++; // atualiza contador
$contador_notificacao++; // atualiza contador de notificacao
$numero_notificacao = retorne_numero_notificacoes($contador_notificacao); // numero de notificacoes
$numero_total_notificacoes += $numero_notificacao; // numero total de notificacoes
$links[] = "<a href='$url_padrao&tipo_notifica=$contador' class='links_servicos_perfil_notificacao' title='Compartilhamentos'>$imagem[5]$numero_notificacao</a>"; // links

$contador++; // atualiza contador
$contador_notificacao++; // atualiza contador de notificacao
$numero_notificacao = retorne_numero_notificacoes($contador_notificacao); // numero de notificacoes
$numero_total_notificacoes += $numero_notificacao; // numero total de notificacoes
$links[] = "<a href='$url_padrao&tipo_notifica=$contador' class='links_servicos_perfil_notificacao' title='Aceitou amizade'>$imagem[6]$numero_notificacao</a>"; // links

$contador++; // atualiza contador
$contador_notificacao++; // atualiza contador de notificacao
$numero_notificacao = retorne_numero_notificacoes($contador_notificacao); // numero de notificacoes
$numero_total_notificacoes += $numero_notificacao; // numero total de notificacoes
$links[] = "<a href='$url_padrao&tipo_notifica=$contador' class='links_servicos_perfil_notificacao' title='Solicitação de amizades'>$imagem[7]$numero_notificacao</a>"; // links

$contador++; // atualiza contador
$contador_notificacao++; // atualiza contador de notificacao
$numero_notificacao = retorne_numero_notificacoes($contador_notificacao); // numero de notificacoes
$numero_total_notificacoes += $numero_notificacao; // numero total de notificacoes
$links[] = "<a href='$url_padrao&tipo_notifica=$contador' class='links_servicos_perfil_notificacao' title='Depoimentos'>$imagem[8]$numero_notificacao</a>"; // links

// -------------------------------------------------------


// atualiza lista de links uteis ---------------------

foreach($links as $valor_link){


// se for valido atualiza ----------------------------

if($valor_link != null){

$lista_links .= $valor_link; // atualiza lista de links

};

// --------------------------------------------------------


};

// --------------------------------------------------------


// codigo html bruto ---------------------------------

$codigo_html_bruto .= "<div class='classe_div_painel_notificacoes'>";
$codigo_html_bruto .= $lista_links;
$codigo_html_bruto .= "</div>";

// ---------------------------------------------------------


// titulo de div ------------------------------------------

$titulo_div = "Notificações"; // titulo de div

// ---------------------------------------------------------


// adiciona opcoes de notificacao ----------------

if($numero_total_notificacoes > 0){

$codigo_html_bruto .= campo_opcoes_notificacoes();

};

// ---------------------------------------------------------


// adiciona div especial ------------------------------

$codigo_html_bruto = constroe_div_especial_geral($titulo_div, $codigo_html_bruto, null); // adiciona div especial

// ---------------------------------------------------------


// retorno -----------------------------------------------

return $codigo_html_bruto; // retorno

// ---------------------------------------------------------


};

// --------------------------------------------------------


?>