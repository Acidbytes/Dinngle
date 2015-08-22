<?php


// carrega os comentarios -------------------------

function carregar_comentarios(){


// globals ----------------------------------------------

global $tabela_banco; // tabela de banco de dados

global $identificador_album; // identificador do album

global $identificador_postagem; // identificador postagem

// --------------------------------------------------------


// salva numero pagina atual em sessao -------

sessao_numero_pagina_atual(1); // salvando

// --------------------------------------------------------


// numero de pagina modo post ------------------

$numero_pagina_post = $_POST['numero_pagina']; // numero de pagina modo post

// --------------------------------------------------------


// igualando dados de formulario ----------------

if($numero_pagina_post != null){

$_GET['numero_pagina'] = $numero_pagina_post; // igualando

};

// --------------------------------------------------------


// dados de formulario ------------------------------

$id = $_POST['id']; // id de item a ser curtido

$tipo_curtida = $_POST['tipo_curtida']; // tipo de curtida

$tipo_comentario = $_POST['tipo_comentario']; // tipo de comentario

$numero_pagina = retorne_numero_pagina_resultado(); // numero da pagina atual

// ---------------------------------------------------------


// verifica se a curtida foi solicitada --------------

if($tipo_curtida != null){

return null; // retorno nulo

};

// ---------------------------------------------------------


// limit de query --------------------------------------

$limit_query = retorne_limit_tabela_comentarios_get(); // limit de query

// --------------------------------------------------------


// id de usuario logado -----------------------------

$idusuario_logado = retorne_idusuario_logado(); // id de usuario logado

// --------------------------------------------------------


// tipo de comentario -------------------------------

switch($tipo_comentario){


case 1:
$identificador = $identificador_album; // tipo de identificador
break;


case 2:
$identificador = $identificador_postagem; // tipo de identificador
break;


};

// --------------------------------------------------------


// query ------------------------------------------------

$query = "select *from $tabela_banco[11] where idcomentario='$id' and identificador='$identificador' $limit_query;"; // query

// --------------------------------------------------------


// comando -------------------------------------------

$comando = comando_executa($query); // comando

// --------------------------------------------------------


// numero de linhas ---------------------------------

$numero_linhas = retorne_numero_linhas_comando($comando); // numero de linhas

// --------------------------------------------------------


// contador --------------------------------------------

$contador = 0; // contador

// --------------------------------------------------------


// montando comentario ---------------------------

for($contador == $contador; $contador <= $numero_linhas; $contador++){


// dados ------------------------------------------------

$dados = mysql_fetch_array($comando, MYSQL_ASSOC); // dados

// ---------------------------------------------------------


// codigo html bruto ----------------------------------

$codigo_html_bruto .= monta_comentario_usuario($dados);

// ---------------------------------------------------------


};

// --------------------------------------------------------


// adiciona hashtag ---------------------------------

$codigo_html_bruto = gera_link_hashtag($codigo_html_bruto); // adiciona hashtag

// --------------------------------------------------------


// retorno ----------------------------------------------

return $codigo_html_bruto; // retorno

// --------------------------------------------------------


};

// --------------------------------------------------------


?>