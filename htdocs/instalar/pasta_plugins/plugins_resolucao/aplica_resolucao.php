<?php

// aplica a resolucao
function aplica_resolucao($modo){


// 1 aplica
// 2 retorna


// globals
global $url_arquivo_css_resolucao;
global $nome_de_cookie_resolucao;
global $salvar_quantidade_de_dias;


// modo de resolucao
switch($modo){


case 1:
// cria cookie com arquivo de resolucao
$valor_cookie = "<link rel='stylesheet' type='text/css' href='$url_arquivo_css_resolucao'/>";
$tempo_validade_cookie = time() + ($salvar_quantidade_de_dias * 24 * 3600);
setcookie($nome_de_cookie_resolucao, $valor_cookie, $tempo_validade_cookie, "/");
break;


case 2:
// retorna o valor de cookie
return retorne_valor_cookie($nome_de_cookie_resolucao);
break;


};


};


?>