<?php


// links social publicacoes gerais -----------------

function links_social_publicacoes_gerais($dados){


// globals -------------------------------------------------

global $identificador_album; // identificador do album

global $identificador_postagem; // identificador postagem

global $identificador_comentario_usuario; // identificador de comentario

global $enderecos_arquivos_php_uteis; // enderecos de arquivos php uteis

global $url_pagina_inicial_site; // url de pagina inicial

// -----------------------------------------------------------


// separando dados de album -----------------------

$url_imagem = $dados['url_imagem']; // dados de tabela
$url_imagem_miniatura = $dados['url_imagem_miniatura']; // dados de tabela
$descricao = $dados['descricao']; // dados de tabela

// ---------------------------------------------------------


// separando dados de postagem ----------------

$id = $dados['id']; // dados de tabela
$idusuario = $dados['idusuario']; // dados de tabela
$conteudo_post = $dados['conteudo_post']; // dados de tabela
$idalbum_imagens = $dados['idalbum_imagens']; // dados de tabela
$data_publicacao = $dados['data_publicacao']; // dados de tabela
$privacidade = $dados['privacidade']; // dados de tabela
$idcomentario = $dados['idcomentario'];

// ---------------------------------------------------------


// identificador de tabela ----------------------------

$identificador = $dados['identificador']; // identificador de tabela

// ---------------------------------------------------------


// obtendo id de publicacao get temporario ----

$idpublicacao_get_temporario = define_idpublicacao_temporario_get(null, false); // obtendo id de publicacao get temporario

// ---------------------------------------------------------


// id de usuario logado ------------------------------

$idusuario_logado = retorne_idusuario_logado(); // id de usuario logado

// --------------------------------------------------------


// url de link ancora ----------------------------------

$url_link_ancora = "#social"; // url de link ancora

// ---------------------------------------------------------


// define tipo de identificador ----------------------

switch($identificador){


case $identificador_album: // imagem
$tipo_identificador = 1; // imagem
$id_real_curtida = retorne_id_real_curtida($id, $identificador_album); // id real da curtida
break;


case $identificador_postagem: // album
$tipo_identificador = 2; // album
$id_real_curtida = retorne_id_real_curtida($id, $identificador_postagem); // id real da curtida
break;


case $identificador_comentario_usuario; // comentario
$tipo_identificador = 3; // comentario
$id_real_curtida = retorne_id_real_curtida($id, $identificador_comentario_usuario); // id real da curtida
break;


};

// ---------------------------------------------------------


// campo curtir ----------------------------------------

if(retorne_curtiu($id, $identificador) == false){

$campo_curtir = "<a href='$url_link_ancora' title='Curtir' onclick='curtir_social_geral($id, $tipo_identificador, $id_real_curtida, $idusuario);'>Curtir</a>"; // campo curtir

}else{

$campo_curtir = "<a href='$url_link_ancora' title='Descurtir' onclick='curtir_social_geral($id, $tipo_identificador, $id_real_curtida, $idusuario);'>Descurtir</a>"; // campo curtir

};

// ---------------------------------------------------------


// informa se ja foi compartilhado ----------------

$compartilhado_resposta = retorne_esta_compartilhado($idusuario_logado, $idusuario, $idpublicacao_get_temporario); // informa se ja foi compartilhado

// ---------------------------------------------------------


// numero de compartilhamentos -----------------

$numero_compartilhamentos = retorne_numero_compartilhamentos_publicacao($idpublicacao_get_temporario); // numero de compartilhamentos

// ---------------------------------------------------------


// codigo de numero de compartilhamentos ----

if($numero_compartilhamentos > 1){

$codigo_numero_compartilhamentos .= retorne_tamanho_resultado($numero_compartilhamentos); // informa o numero de compartilhamentos
$codigo_numero_compartilhamentos .= "&nbsp;"; // informa o numero de compartilhamentos
$codigo_numero_compartilhamentos .= "vezes"; // informa o numero de compartilhamentos

}else{

$codigo_numero_compartilhamentos .= $numero_compartilhamentos; // informa o numero de compartilhamentos
$codigo_numero_compartilhamentos .= "&nbsp;"; // informa o numero de compartilhamentos
$codigo_numero_compartilhamentos .= "vêz"; // informa o numero de compartilhamentos

};

// --------------------------------------------------------


// adiciona link compartilhamento ----------------

$codigo_numero_compartilhamentos = "<a href='$url_pagina_inicial_site?tipo_pagina=15&post_id=$idpublicacao_get_temporario'>$codigo_numero_compartilhamentos</a>"; // adiciona link compartilhamento

// --------------------------------------------------------


// campo compartilhar ------------------------------

if($idusuario_logado != $idusuario and $idusuario != null and $compartilhado_resposta == false and $idpublicacao_get_temporario != null){


// url de script compartilhar -------------------------

$url_script_compartilhar = $enderecos_arquivos_php_uteis['compartilhar_conteudo']; // url de script compartilhar

// ----------------------------------------------------------


// monta formulario compartilhar ------------------

$campo_compartilhar .= "<form action='$url_script_compartilhar' method='post'>"; // campo compartilhar
$campo_compartilhar .= "Compartilhar isto?"; // campo compartilhar
$campo_compartilhar .= "<br>"; // campo compartilhar
$campo_compartilhar .= "Ao fazer isto este conteúdo será colocado em sua linha de tempo."; // campo compartilhar
$campo_compartilhar .= "<input type='hidden' name='idusuario' value='$idusuario_logado'>"; // campo compartilhar
$campo_compartilhar .= "<input type='hidden' name='idamigo' value='$idusuario'>"; // campo compartilhar
$campo_compartilhar .= "<input type='hidden' name='id' value='$idpublicacao_get_temporario'>"; // campo compartilhar
$campo_compartilhar .= "<br>"; // campo compartilhar
$campo_compartilhar .= "<br>"; // campo compartilhar
$campo_compartilhar .= "<input type='submit' class='botao_padrao' value='Compartilhar'>"; // campo compartilhar
$campo_compartilhar .= "</form>"; // campo compartilhar

// ---------------------------------------------------------


// titulo de compartilhar -----------------------------

$titulo_compartilhar = "Compartilhar isto"; // titulo de compartilhar

// ---------------------------------------------------------


// id de div compartilhar ----------------------------

$id_div_compartilhar = "div_compartilhar_conteudo".retorne_numero_div_id($dados); // id de div compartilhar

// ---------------------------------------------------------


// adiciona janela de dialogo ----------------------

$campo_compartilhar = janela_mensagem_dialogo($titulo_compartilhar, $campo_compartilhar, $id_div_compartilhar);

// ---------------------------------------------------------


// adiciona link compartilhar -----------------------

$campo_compartilhar .= "&nbsp;"; // campo compartilhar
$campo_compartilhar .= "-"; // campo compartilhar
$campo_compartilhar .= "&nbsp;"; // campo compartilhar
$campo_compartilhar .= "<a href='$url_link_ancora' title='Compartilhar' onclick='compartilhar_conteudo_usuario($id, $tipo_identificador)'>Compartilhar</a>"; // campo compartilhar

// ---------------------------------------------------------


};

// ---------------------------------------------------------


// informa se ja foi compartilhado ----------------

if($compartilhado_resposta == true){

$campo_compartilhar .= "&nbsp;"; // campo compartilhar
$campo_compartilhar .= "-"; // campo compartilhar
$campo_compartilhar .= "&nbsp;"; // campo compartilhar
$campo_compartilhar .= "Compartilhado"; // campo compartilhar
$campo_compartilhar .= "&nbsp;"; // campo compartilhar
$campo_compartilhar .= $codigo_numero_compartilhamentos; // campo compartilhar

};

// ---------------------------------------------------------


// codigo html bruto ----------------------------------

$codigo_html_bruto .= "<div class='links_social_publicacoes_gerais'>";
$codigo_html_bruto .= $campo_curtir;
$codigo_html_bruto .= $campo_compartilhar;
$codigo_html_bruto .= "</div>";

// ---------------------------------------------------------


// retorno ------------------------------------------------

return $codigo_html_bruto; // retorno

// ----------------------------------------------------------


};

// --------------------------------------------------------


?>