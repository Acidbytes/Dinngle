<?php


// pesquisa geral ------------------------------------

function pesquisa_geral(){


// globals --------------------------------

global $nome_do_sistema; // nome do sistema

// ------------------------------------------


// termo de pesquisa -----------------

$termo_pesquisa = retorne_termo_pesquisa(); // termo de pesquisa

// -----------------------------------------


// pesquisa padrao -------------------

if($termo_pesquisa == null){

$_GET['pesquisa_generica'] = $nome_do_sistema; // pesquisa padrao

$termo_pesquisa = $nome_do_sistema; // pesquisa padrao

};

// -----------------------------------------


// modo de pesquisa -----------------

switch(retorna_modo_pesquisa_geral()){


case 1:
$conteudo_pesquisa = pesquisa_perfil(); // pesquisa
break;


case 2:
$conteudo_pesquisa = pesquisa_informacoes_perfil(); // pesquisa
break;


case 3:
$conteudo_pesquisa = pesquisa_informacoes_perfil(); // pesquisa
break;


case 4:
$conteudo_pesquisa = pesquisa_informacoes_perfil(); // pesquisa
break;


case 5:
$conteudo_pesquisa = pesquisa_jogos_disponiveis(); // pesquisa
break;


case 6:
$conteudo_pesquisa = pesquisa_informacoes_perfil(); // pesquisa
break;


case 7:
$conteudo_pesquisa = pesquisa_informacoes_perfil(); // pesquisa
break;


case 8:
$conteudo_pesquisa = pesquisa_informacoes_perfil(); // pesquisa
break;


case 9:
$conteudo_pesquisa = retorne_pesquisa_hashtag(); // pesquisa
break;


case 10:
$conteudo_pesquisa = pesquisa_informacoes_perfil(); // pesquisa
break;


case 11:
$conteudo_pesquisa = pesquisa_informacoes_perfil(); // pesquisa
break;


case 12:
$conteudo_pesquisa = pesquisa_informacoes_perfil(); // pesquisa
break;


case 13:
$conteudo_pesquisa = pesquisa_informacoes_perfil(); // pesquisa
break;


case 14:
$conteudo_pesquisa = pesquisa_informacoes_perfil(); // pesquisa
break;


case 15:
$conteudo_pesquisa = pesquisa_informacoes_perfil(); // pesquisa
break;


case 16:
$conteudo_pesquisa = pesquisa_informacoes_perfil(); // pesquisa
break;


case 17:
$conteudo_pesquisa = pesquisa_informacoes_perfil(); // pesquisa
break;


case 18:
$conteudo_pesquisa = pesquisa_informacoes_perfil(); // pesquisa
break;


default:
$conteudo_pesquisa = pesquisa_perfil(); // pesquisa


};

// --------------------------------------------


// titulo de pesquisa ---------------------

$titulo_pesquisa = "Pesquisando por '$termo_pesquisa'"; // titulo de pesquisa

// --------------------------------------------


// codigo html bruto ---------------------

$codigo_html_bruto .= "<div class='classe_div_pesquisa_geral'>";
$codigo_html_bruto .= $conteudo_pesquisa;
$codigo_html_bruto .= "</div>";
$codigo_html_bruto .= opcoes_links_pesquisa_geral();

// ---------------------------------------------


// aplica div especial --------------------

$codigo_html_bruto = constroe_div_especial_geral($titulo_pesquisa, $codigo_html_bruto, null); // aplica div especial

// ---------------------------------------------


// retorno -----------------------------------

return $codigo_html_bruto; // retorno

// ---------------------------------------------


};

// --------------------------------------------------------


?>