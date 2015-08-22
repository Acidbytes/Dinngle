<?php


// links com opcoes de pesquisa geral ---------

function opcoes_links_pesquisa_geral(){


// globals -----------------------------------------------

global $imagem_servidor; // imagens de servidor

global $url_pagina_inicial_site; // url de pagina inicial

// ---------------------------------------------------------


// id de usuario logado ------------------------------

$idusuario = retorne_idusuario_logado(); // id de usuario logado

// ---------------------------------------------------------


// tipo de pagina --------------------------------------

$tipo_pagina = retorne_tipo_pagina(); // tipo de pagina

// ---------------------------------------------------------


// termo de pesquisa --------------------------------

$termo_pesquisa = retorne_termo_pesquisa(); // termo de pesquisa

// ---------------------------------------------------------


// div opcoes de pesquisa ----------------------------------

$div_opcoes_pesquisa .= "<div class='classe_div_opcoes_pesquisa_geral'>"; // div opcoes de pesquisa
$div_opcoes_pesquisa .= "Mais opções"; // div opcoes de pesquisa
$div_opcoes_pesquisa .= "</div>"; // div opcoes de pesquisa
$div_opcoes_pesquisa .= "<br>"; // div opcoes de pesquisa

// ---------------------------------------------------------


// contador ---------------------------------------------

$contador = 0; // contador

// ---------------------------------------------------------


// monta urls de pesquisa --------------------------

$contador++; // incrementa
$urls[$contador] = retorne_url_pesquisa_geral($termo_pesquisa, $contador); // url de pesquisa
$links[$contador] = "<a href='$urls[$contador]'><br><li>Pessoas</a>"; // links
$codigo_html_bruto .= $links[$contador];

$contador++; // incrementa
$urls[$contador] = retorne_url_pesquisa_geral($termo_pesquisa, $contador); // url de pesquisa
$links[$contador] = "<a href='$urls[$contador]'><br><li>Cidades</a>"; // links
$codigo_html_bruto .= $links[$contador];

$contador++; // incrementa
$urls[$contador] = retorne_url_pesquisa_geral($termo_pesquisa, $contador); // url de pesquisa
$links[$contador] = "<a href='$urls[$contador]'><br><li>Estados</a>"; // links
$codigo_html_bruto .= $links[$contador];

$contador++; // incrementa
$urls[$contador] = retorne_url_pesquisa_geral($termo_pesquisa, $contador); // url de pesquisa
$links[$contador] = "<a href='$urls[$contador]'><br><li>Sites</a>"; // links
$codigo_html_bruto .= $links[$contador];

$contador++; // incrementa
$urls[$contador] = retorne_url_pesquisa_geral($termo_pesquisa, $contador); // url de pesquisa
$links[$contador] = "<a href='$urls[$contador]'><br><li>Jogos</a>"; // links
$codigo_html_bruto .= $links[$contador];


// sexo -----------------------------------------------

$contador++; // incrementa
$urls[$contador] = retorne_url_pesquisa_geral("Mulher", $contador); // url de pesquisa
$links[$contador] = "<a href='$urls[$contador]'><br><li>Mulher</a>"; // links
$codigo_html_bruto .= $links[$contador];
// nao atualiza o contador neste ponto!
$urls[$contador] = retorne_url_pesquisa_geral("Homem", $contador); // url de pesquisa
$links[$contador] = "<a href='$urls[$contador]'><br><li>Homem</a>"; // links
$codigo_html_bruto .= $links[$contador];

// -------------------------------------------------------


$contador++; // incrementa
$urls[$contador] = retorne_url_pesquisa_geral($termo_pesquisa, $contador); // url de pesquisa
$links[$contador] = "<a href='$urls[$contador]'><br><li>Pessoas próximas</a>"; // links
$codigo_html_bruto .= $links[$contador];

$contador++; // incrementa
$urls[$contador] = retorne_url_pesquisa_geral($termo_pesquisa, $contador); // url de pesquisa
$links[$contador] = "<a href='$urls[$contador]'><br><li>Relacionamento</a>"; // links
$codigo_html_bruto .= $links[$contador];

$contador++; // incrementa
$urls[$contador] = retorne_url_pesquisa_geral($termo_pesquisa, $contador); // url de pesquisa
$links[$contador] = "<a href='$urls[$contador]'><br><li>Hashtags</a>"; // links
$codigo_html_bruto .= $links[$contador];


// sexo proximo ---------------------------------------

$codigo_html_bruto .= "<br>";
$codigo_html_bruto .= "<br>";
$codigo_html_bruto .= "<div class='classe_div_opcoes_pesquisa_geral'>";
$codigo_html_bruto .= "Pessoas próximas";
$codigo_html_bruto .= "</div>";
$codigo_html_bruto .= "<br>";


$contador++; // incrementa
$urls[$contador] = retorne_url_pesquisa_geral("Mulher", $contador); // url de pesquisa
$links[$contador] = "<a href='$urls[$contador]'><br><li>Mulher</a>"; // links
$codigo_html_bruto .= $links[$contador];
// nao atualiza o contador neste ponto!
$urls[$contador] = retorne_url_pesquisa_geral("Homem", $contador); // url de pesquisa
$links[$contador] = "<a href='$urls[$contador]'><br><li>Homem</a>"; // links
$codigo_html_bruto .= $links[$contador];

// -------------------------------------------------------


// profissional ---------------------------------------

$codigo_html_bruto .= "<br>";
$codigo_html_bruto .= "<br>";
$codigo_html_bruto .= "<div class='classe_div_opcoes_pesquisa_geral'>";
$codigo_html_bruto .= "Profissional";
$codigo_html_bruto .= "</div>";
$codigo_html_bruto .= "<br>";

$contador++; // incrementa
$urls[$contador] = retorne_url_pesquisa_geral($termo_pesquisa, $contador); // url de pesquisa
$links[$contador] = "<a href='$urls[$contador]'><br><li>Profissão</a>"; // links
$codigo_html_bruto .= $links[$contador];

$contador++; // incrementa
$urls[$contador] = retorne_url_pesquisa_geral($termo_pesquisa, $contador); // url de pesquisa
$links[$contador] = "<a href='$urls[$contador]'><br><li>Projetos</a>"; // links
$codigo_html_bruto .= $links[$contador];

$contador++; // incrementa
$urls[$contador] = retorne_url_pesquisa_geral($termo_pesquisa, $contador); // url de pesquisa
$links[$contador] = "<a href='$urls[$contador]'><br><li>Formação</a>"; // links
$codigo_html_bruto .= $links[$contador];

$contador++; // incrementa
$urls[$contador] = retorne_url_pesquisa_geral($termo_pesquisa, $contador); // url de pesquisa
$links[$contador] = "<a href='$urls[$contador]'><br><li>Experiência</a>"; // links
$codigo_html_bruto .= $links[$contador];

$contador++; // incrementa
$urls[$contador] = retorne_url_pesquisa_geral($termo_pesquisa, $contador); // url de pesquisa
$links[$contador] = "<a href='$urls[$contador]'><br><li>Desempregado</a>"; // links
$codigo_html_bruto .= $links[$contador];

$contador++; // incrementa
$urls[$contador] = retorne_url_pesquisa_geral($termo_pesquisa, $contador); // url de pesquisa
$links[$contador] = "<a href='$urls[$contador]'><br><li>Desempregado próximo</a>"; // links
$codigo_html_bruto .= $links[$contador];

// --------------------------------------------------------


// sobre pessoas -----------------------------------

$codigo_html_bruto .= "<br>";
$codigo_html_bruto .= "<br>";
$codigo_html_bruto .= "<div class='classe_div_opcoes_pesquisa_geral'>";
$codigo_html_bruto .= "Sobre pessoas";
$codigo_html_bruto .= "</div>";
$codigo_html_bruto .= "<br>";

$contador++; // incrementa
$urls[$contador] = retorne_url_pesquisa_geral($termo_pesquisa, $contador); // url de pesquisa
$links[$contador] = "<a href='$urls[$contador]'><br><li>Perfíl completo</a>"; // links
$codigo_html_bruto .= $links[$contador];

$contador++; // incrementa
$urls[$contador] = retorne_url_pesquisa_geral($termo_pesquisa, $contador); // url de pesquisa
$links[$contador] = "<a href='$urls[$contador]'><br><li>Perfíl básico</a>"; // links
$codigo_html_bruto .= $links[$contador];

// ---------------------------------------------------------


// adiciona div opcoes de busca ---------------

$codigo_html_bruto = $div_opcoes_pesquisa.$codigo_html_bruto; // adiciona div opcoes de busca

// ---------------------------------------------------------


// adiciona div -----------------------------------------

$codigo_html_bruto = "<div class='classe_div_opcoes_pesquisa_geral_links'>$codigo_html_bruto</div>"; // adiciona div; // adiciona div

// ---------------------------------------------------------


// retorno -----------------------------------------------

return $codigo_html_bruto; // retorno

// ---------------------------------------------------------


};

// --------------------------------------------------------


?>