<?php


// campo publicar ajuda ----------------------------

function campo_publicar_ajuda(){


// globals ------------------------------------------------

global $enderecos_arquivos_php_uteis; // url de publicacao de conteudo

// ----------------------------------------------------------


// valida super usuario -------------------------------

if(retorne_super_usuario() == false){

return null; // retorno nulo

};

// ----------------------------------------------------------


// id de topico ------------------------------------------

$topico_id = topico_pagina_ajuda_get(); // id de topico

// ----------------------------------------------------------


// dados de publicacao ------------------------------

$dados_publicacao = retorne_dados_publicacao_ajuda($topico_id); // dados da publicacao

// ----------------------------------------------------------


// separa dados de publicacao ---------------------

$titulo_post = $dados_publicacao['titulo_post']; // dados de tabela

$conteudo_post = $dados_publicacao['conteudo_post']; // dados de tabela

// ----------------------------------------------------------


// url de publicacao de conteudo ------------------

$url_publicacao_conteudo = $enderecos_arquivos_php_uteis['publicar_ajuda']; // url de publicacao de conteudo

// ---------------------------------------------------------


// campo adicionar imagens -----------------------

$campo_adicionar_imagens = "<input type='file' name='foto[]' id='campo_file_upload_postagem' onchange='publicacao_imagens_selecionadas();' multiple>"; // campo adicionar imagens

// ---------------------------------------------------------


// campo exibe imagens upload -------------------

$campo_exibe_imagens_upload = "<output id='output_imagens_upload_publicacao'></output>"; // campo exibe imagens upload

// ---------------------------------------------------------


// id de album de imagens -------------------------

$idalbum_imagens = retorne_idalbum_topico_id($topico_id); // id de album de imagens

// ---------------------------------------------------------


// campos de formulario condicionais -----------

if($idalbum_imagens == null){


// tipo de publicacao ---------------------------------

$campo_tipo_publicacao = "<input type='hidden' name='publicar_tipo' value='1'>"; // tipo de publicacao

// ---------------------------------------------------------


// botao submit ----------------------------------------

$botao_submit = "<input type='submit' class='uibutton large confirm' value='Publicar'>"; // botao submit

// ---------------------------------------------------------


}else{


// tipo de publicacao ---------------------------------

$campo_tipo_publicacao = "<input type='hidden' name='publicar_tipo' value='0'>"; // tipo de publicacao

// ---------------------------------------------------------


// botao submit ----------------------------------------

$botao_submit = "<input type='submit' class='uibutton large confirm' value='Atualizar'>"; // botao submit

// ---------------------------------------------------------


};

// ---------------------------------------------------------


// codigo html bruto ----------------------------------

$codigo_html_bruto .= "<div class='div_campo_publicar'>"; // codigo html bruto
$codigo_html_bruto .= "<form action='$url_publicacao_conteudo' method='post' enctype='multipart/form-data' id='formulario_publica_conteudo_geral'>"; // codigo html bruto
$codigo_html_bruto .= "<input type='text' name='titulo' placeholder='Título da ajuda' value='$titulo_post'>"; // codigo html bruto
$codigo_html_bruto .= "<br>"; // codigo html bruto
$codigo_html_bruto .= "<textarea cols='100' rows='10' name='campo_publicar' class='textarea_campo_publicar' placeholder='Conteúdo da ajuda' id='campo_entrada_publicar_conteudo_geral'>$conteudo_post</textarea>"; // codigo html bruto
$codigo_html_bruto .= "<br>"; // codigo html bruto
$codigo_html_bruto .= campo_select_tipo_ajuda($dados_publicacao); // codigo html bruto
$codigo_html_bruto .= "<input type='button' value='Imagens' class='uibutton large confirm' onclick='clique_botao_adicionar_imagens_publicacao();'>"; // codigo html bruto
$codigo_html_bruto .= "&nbsp;"; // codigo html bruto
$codigo_html_bruto .= $botao_submit; // codigo html bruto
$codigo_html_bruto .= $campo_tipo_publicacao; // codigo html bruto
$codigo_html_bruto .= "<input type='hidden' name='idalbum_imagens' value='$idalbum_imagens'>"; // codigo html bruto
$codigo_html_bruto .= "<input type='hidden' name='topico_id' value='$topico_id'>"; // codigo html bruto
$codigo_html_bruto .= montar_barra_progresso("barra_progresso_postagem_conteudo"); // codigo html bruto
$codigo_html_bruto .= $campo_adicionar_imagens; // codigo html bruto
$codigo_html_bruto .= "</form>"; // codigo html bruto
$codigo_html_bruto .= "</div>"; // codigo html bruto
$codigo_html_bruto .= $campo_exibe_imagens_upload; // codigo html bruto

// --------------------------------------------------------


// retorno ----------------------------------------------

return $codigo_html_bruto; // retorno

// --------------------------------------------------------


};

// --------------------------------------------------------


?>