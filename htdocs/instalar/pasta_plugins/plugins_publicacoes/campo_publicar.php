<?php


// campo publicar ------------------------------------

function campo_publicar(){


// globals ------------------------------------------------

global $enderecos_arquivos_php_uteis; // url de publicacao de conteudo

// ----------------------------------------------------------


// informa se o usuario logado e o dono do perfil

$usuario_dono_perfil_resposta = retorna_usuario_vendo_perfil_dono(); // informa se o usuario logado e o dono do perfil

// ----------------------------------------------------------


// url de publicacao de conteudo ----------------

$url_publicacao_conteudo = $enderecos_arquivos_php_uteis['publicar_conteudo']; // url de publicacao de conteudo

// ---------------------------------------------------------


// campo adicionar imagens -----------------------

$campo_adicionar_imagens = "<input type='file' name='foto[]' id='campo_file_upload_postagem' onchange='publicacao_imagens_selecionadas();' multiple>"; // campo adicionar imagens

// ---------------------------------------------------------


// campo exibe imagens upload -------------------

$campo_exibe_imagens_upload = "<output id='output_imagens_upload_publicacao'></output>"; // campo exibe imagens upload

// ---------------------------------------------------------


// campo privacidade --------------------------------

$campo_privacidade .= "<div class='campo_privacidade_publicacao_usuario_postar'>"; // campo privacidade
$campo_privacidade .= campo_select_privacidade(null); // campo privacidade
$campo_privacidade .= "</div>"; // campo privacidade

// ---------------------------------------------------------


// opcoes de publicacao
$opcoes_publicacao .= "<div class='div_campo_publicacao_opcoes'>";
$opcoes_publicacao .= constroe_aba_publicacao_conteudo();
$opcoes_publicacao .= "</div>";


// codigo html bruto ----------------------------------

$codigo_html_bruto .= "<div class='div_campo_publicar'>";
$codigo_html_bruto .= "<form action='$url_publicacao_conteudo' method='post' enctype='multipart/form-data' id='formulario_publica_conteudo_geral'>";
$codigo_html_bruto .= $opcoes_publicacao;
$codigo_html_bruto .= "<textarea cols='100' rows='4' name='campo_publicar' class='textarea_campo_publicar' placeholder='O que você tem de novo?' id='campo_entrada_publicar_conteudo_geral'></textarea>";
$codigo_html_bruto .= "<br>";
$codigo_html_bruto .= "<input type='hidden' name='campo_publica_tipo' value='true'>";
$codigo_html_bruto .= $campo_privacidade;
$codigo_html_bruto .= montar_barra_progresso("barra_progresso_postagem_conteudo");
$codigo_html_bruto .= $campo_adicionar_imagens;
$codigo_html_bruto .= "<input type='submit' class='botao_padrao' value='Publicar isto' onclick='barra_progresso(1);'>";
$codigo_html_bruto .= "</form>";
$codigo_html_bruto .= "</div>";
$codigo_html_bruto .= $campo_exibe_imagens_upload;

// --------------------------------------------------------


// retorno ----------------------------------------------

return $codigo_html_bruto; // retorno

// --------------------------------------------------------


};

// --------------------------------------------------------


?>