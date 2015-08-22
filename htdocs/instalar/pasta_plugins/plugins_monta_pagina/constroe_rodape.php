<?php


// constroe o rodape -------------------------------------------

function constroe_rodape(){


// globals ---------------------------------------------------------

global $url_pagina_cadastro; // url pagina de cadastro

global $url_pagina_login; // url de pagina de login

global $nome_do_sistema; // nome sistema

global $url_pagina_ajuda; // url de pagina de ajuda

global $url_pagina_sobre_sistema; // url sobre o sistema

global $url_pagina_desenvolvedor_sistema; // url sobre o desenvolvedor do sistema

global $url_pagina_inicial_jogos; // url de pagina de jogos

global $nome_fundador_site; // nome do fundador do site

// -------------------------------------------------------------------


// codigo html ---------------------------------------------------

$codigo_html .= "<a href='$url_pagina_cadastro' title='Cadastre-se' class='links_rodape'>Cadastre-se</a>"; // codigo html
$codigo_html .= "<a href='$url_pagina_login' title='Login' class='links_rodape'>Login</a>"; // codigo html
$codigo_html .= "<a href='$url_pagina_ajuda' class='links_rodape' title='Ajuda'>Ajuda</a>"; // codigo html
$codigo_html .= "<a href='$url_pagina_sobre_sistema' class='links_rodape' title='O que é $nome_do_sistema'>O que é $nome_do_sistema</a>"; // codigo html
$codigo_html .= "<a href='$url_pagina_desenvolvedor_sistema' class='links_rodape' title='Criador'>Criador</a>"; // codigo html
$codigo_html .= "<a href='$url_pagina_inicial_jogos' class='links_rodape' title='Jogos'>Jogos</a>"; // codigo html
$codigo_html .= "<br>"; // codigo html
$codigo_html .= "<br>"; // codigo html
$codigo_html .= $nome_fundador_site; // codigo html

// -------------------------------------------------------------------


// retorno ---------------------------------------------------------

return $codigo_html; // retorno

// -------------------------------------------------------------------


};

// ------------------------------------------------------------------


?>