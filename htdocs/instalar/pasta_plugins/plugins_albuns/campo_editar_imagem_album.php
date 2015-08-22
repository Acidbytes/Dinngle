<?php


// campo para editar imagem em album ---------

function campo_editar_imagem_album($dados){


// globals -----------------------------------------------

global $enderecos_arquivos_php_uteis; // urls uteis

global $url_pagina_inicial_site; // url de pagina inicial

// ---------------------------------------------------------


// dados ------------------------------------------------

$idusuario = $dados['idusuario']; // dados
$url_imagem = $dados['url_imagem']; // dados
$url_imagem_miniatura = $dados['url_imagem_miniatura']; // dados
$privacidade = $dados['privacidade']; // dados
$descricao = $dados['descricao']; // dados
$data_publicacao = $dados['data_publicacao']; // dados
$idalbum_imagens = $dados['idalbum_imagens']; // dados
$nome_album_identificador = $dados['nome_album_identificador']; // dados

// --------------------------------------------------------


// url para salvar informacoes --------------------

$url_salvar_informacoes = $enderecos_arquivos_php_uteis['salvar_informacoes_imagem_album'] ; // url para salvar informacoes

// --------------------------------------------------------


// informa se o usuario e o dono do perfil -----

$usuario_dono_perfil = retorna_usuario_vendo_perfil_dono(); // informa se o usuario e o dono do perfil

// --------------------------------------------------------


// nome do usuario ---------------------------------

$nome_usuario = func_retorna_nome_de_usuario_por_id($idusuario); // nome do usuario

// --------------------------------------------------------


// nome link de usuario ----------------------------

$nome_usuario_link = retorna_link_perfil_usuario($idusuario); // nome link de usuario

// -------------------------------------------------------


// identificacao de div ------------------------------

$div_identificacao = md5($url_imagem); // identificacao de div

$div_identificacao = "div_detalhes_".$div_identificacao; // identificacao de div

// --------------------------------------------------------


// titulo de detalhes ----------------------------------

$titulo_detalhes = "Imagem de $nome_usuario"; // titulo de detalhes

// --------------------------------------------------------


// imagem em miniatura ---------------------------

$imagem_miniatura = "<img src='$url_imagem_miniatura' title='$titulo_detalhes' class='imagem_album_miniatura_detalhes'>"; // imagem em miniatura

// --------------------------------------------------------


// numero da pagina atual -------------------------

$numero_pagina = retorne_numero_pagina_resultado(); // numero da pagina atual

// --------------------------------------------------------


// campo de privacidade de imagem -----------

if($usuario_dono_perfil == true){

$campo_privacidade_imagem = campo_select_privacidade($privacidade); // campo de privacidade de imagem

};

// --------------------------------------------------------


// campo descricao de imagem ------------------

if($usuario_dono_perfil == true){


// campo descricao de imagem -------------------------------------

$campo_descricao .= "<form action='$url_salvar_informacoes' method='post'>"; // campo descricao de imagem
$campo_descricao .= $campo_privacidade_imagem; // campo descricao de imagem
$campo_descricao .= "<textarea cols='50' rows='10' name='descricao_imagem'>$descricao</textarea>"; // campo descricao de imagem
$campo_descricao .= "<br>"; // campo descricao de imagem
$campo_descricao .= "<input type='hidden' value='$url_imagem' name='url_imagem'>"; // campo descricao de imagem
$campo_descricao .= "<input type='hidden' value='$numero_pagina' name='numero_pagina'>"; // campo descricao de imagem
$campo_descricao .= "<input type='checkbox' name='salvar_todas' value='1'>Salvar isto em todas as imagens"; // campo descricao de imagem
$campo_descricao .= "<br>"; // campo descricao de imagem
$campo_descricao .= "<br>"; // campo descricao de imagem
$campo_descricao .= "<input type='submit' class='botao_padrao' value='Salvar'>"; // campo descricao de imagem
$campo_descricao .= "<br>"; // campo descricao de imagem
$campo_descricao .= "<br>"; // campo descricao de imagem
$campo_descricao .= "</form>"; // campo descricao de imagem

// ----------------------------------------------------------------------------


// menu opcoes de imagem -------------------------------------------

$opcoes_menu_imagem = constroe_menu_drop(retorne_array_opcoes_imagem($dados)); // menu opcoes de imagem

// ----------------------------------------------------------------------------


}else{


// verifica se conteudo de descricao existe -------------

if($descricao != null){

$campo_descricao .= "<br>"; // campo descricao de imagem
$campo_descricao .= $descricao; // campo descricao de imagem
$campo_descricao .= "<br>"; // campo descricao de imagem

};

// -----------------------------------------------------------------


};

// --------------------------------------------------------


// campo visualizar detalhes ----------------------

$campo_visualizar_detalhes .= "<a class='various' href='#$div_identificacao' title='$titulo_detalhes'>Detalhes</a>"; // campo visualizar detalhes
$campo_visualizar_detalhes .= "<div class='campo_visualizar_detalhes' id='$div_identificacao'>"; // campo visualizar detalhes
$campo_visualizar_detalhes .= $opcoes_menu_imagem; // campo visualizar detalhes
$campo_visualizar_detalhes .= "<br>"; // campo visualizar detalhes
$campo_visualizar_detalhes .= $imagem_miniatura; // campo visualizar detalhes
$campo_visualizar_detalhes .= "<br>"; // campo visualizar detalhes
$campo_visualizar_detalhes .= "<br>"; // campo visualizar detalhes
$campo_visualizar_detalhes .= "Adicionado em: $data_publicacao"; // campo visualizar detalhes
$campo_visualizar_detalhes .= "<br>"; // campo visualizar detalhes
$campo_visualizar_detalhes .= "Imagem de: "; // campo visualizar detalhes
$campo_visualizar_detalhes .= $nome_usuario_link; // campo visualizar detalhes
$campo_visualizar_detalhes .= "<br>"; // campo visualizar detalhes
$campo_visualizar_detalhes .= "<a href='$url_imagem' title='$titulo_detalhes' target='_blank'>Download</a>"; // campo visualizar detalhes
$campo_visualizar_detalhes .= $campo_descricao; // campo visualizar detalhes
$campo_visualizar_detalhes .= "</div>"; // campo visualizar detalhes

// --------------------------------------------------------


// link para abrir o album --------------------------

$link_abrir_album = "<a href='$url_pagina_inicial_site?idusuario=$idusuario&tipo_pagina=5&idalbum_nome=$nome_album_identificador' title='Abrir este álbum'>Abrir este álbum</a>"; // link para abrir o album

// --------------------------------------------------------


// codigo html bruto ---------------------------------

$codigo_html_bruto .= $campo_visualizar_detalhes;
$codigo_html_bruto .= "&nbsp;";
$codigo_html_bruto .= "-";
$codigo_html_bruto .= "&nbsp;";
$codigo_html_bruto .= $link_abrir_album;

// --------------------------------------------------------


// retorno ----------------------------------------------

return $codigo_html_bruto; // retorno

// --------------------------------------------------------


};

// --------------------------------------------------------


?>