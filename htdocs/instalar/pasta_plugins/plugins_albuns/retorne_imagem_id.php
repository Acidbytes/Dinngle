<?php


// retorna a imagem por id -------------------------

function retorne_imagem_id($post_id, $idusuario, $tipo_tamanho){


// tabela de banco -----------------------------------

global $tabela_banco; // tabela de banco

global $url_pagina_inicial_site; // url pagina inicial site

// --------------------------------------------------------


// valida usuario -------------------------------------

if($idusuario == null){

$idusuario = retorne_idusuario_logado(); // id de usuario logado

};

// --------------------------------------------------------


// query ------------------------------------------------

$query = "select *from $tabela_banco[6] where idusuario='$idusuario' and id='$post_id';"; // query

// --------------------------------------------------------


// dados -----------------------------------------------

$dados = retorne_dados_query($query); // dados

// --------------------------------------------------------


// obtendo url de imagem -------------------------

$url_imagem = $dados['url_imagem']; // dados
$url_imagem_miniatura = $dados['url_imagem_miniatura']; // dados

// --------------------------------------------------------


// valida urls de imagens --------------------------

if($url_imagem == null or $url_imagem_miniatura == null){

return null; // retorno  nulo

};

// --------------------------------------------------------


// tipo de imagem normal ou miniatura ---------

switch($tipo_tamanho){


case 1:
$imagem .= "<div class='classe_div_imagem_album_usuario'>"; // imagem
$imagem .= "<a href='$url_pagina_inicial_site?tipo_pagina=5&idusuario=$idusuario&post_id=$post_id'>"; // imagem
$imagem .= "<img src='".$url_imagem_miniatura."'>"; // imagem
$imagem .= "</a>"; // imagem
$imagem .= "</div>"; // imagem
break;


case 2:
$imagem .= "<div class='classe_div_imagem_album_usuario'>"; // imagem
$imagem .= "<a href='$url_pagina_inicial_site?tipo_pagina=5&idusuario=$idusuario&post_id=$post_id'>"; // imagem
$imagem .= "<img src='".$url_imagem."'>"; // imagem
$imagem .= "</a>"; // imagem
$imagem .= "</div>"; // imagem
break;

};

// --------------------------------------------------------


// codigo html bruto ---------------------------------

$codigo_html_bruto .= $imagem;

// ----------------------------------------------------------


// retorno ------------------------------------------------

return $codigo_html_bruto; // retorno

// ----------------------------------------------------------


};

// --------------------------------------------------------


?>