<?php


// constroe a imagem do album ------------------

function constroe_imagem_album($dados){


// globals -----------------------------------------------

global $imagem_servidor; // imagens de servidor

// ---------------------------------------------------------


// dados ------------------------------------------------

$id = $dados['id']; // dados
$idusuario = $dados['idusuario']; // dados
$url_imagem = $dados['url_imagem']; // dados
$url_imagem_miniatura = $dados['url_imagem_miniatura']; // dados
$privacidade = $dados['privacidade']; // dados
$descricao = $dados['descricao']; // dados
$data_publicacao = $dados['data_publicacao']; // dados
$idalbum_imagens = $dados['idalbum_imagens']; // dados
$nome_album_identificador = $dados['nome_album_identificador']; // dados

// --------------------------------------------------------


// tipo de pagina -----------------------------------------

$tipo_pagina = retorne_tipo_pagina(); // tipo de pagina

// --------------------------------------------------------


// adiciona hashtag ---------------------------------

$descricao = gera_link_hashtag($descricao); // adiciona hashtag

// --------------------------------------------------------


// usuario dono do perfil ---------------------------

$usuario_dono_perfil = retorna_usuario_vendo_perfil_dono(); // usuario dono do perfil

// --------------------------------------------------------


// id de album no modo get -----------------------

$idalbum_imagens_get = tipo_album_exibir_get(); // id de album no modo get

// --------------------------------------------------------


// se nao for modo publicacao construir campo social ------

if($tipo_pagina != 8 and $tipo_pagina != 9 and $tipo_pagina != 16){


// campo social imagem ------------------------------------

$campo_social_imagem = constroe_campos_social_publicacoes_gerais($dados); // campo social imagem

// --------------------------------------------------------


};

// --------------------------------------------------------


// define classe e endereco de imagem --------

if($idalbum_imagens_get == null){


// definindo classes --------------------------------------------------

$div_corpo_imagem_classe = "div_corpo_imagem_classe"; // classe de div

$imagem_album_usuario_classe = "imagem_album_usuario_classe"; // classe de imagem

// -------------------------------------------------------------------------


}else{


// definindo classes --------------------------------------------------

$div_corpo_imagem_classe = "div_corpo_imagem_classe_postagem"; // classe de div

$imagem_album_usuario_classe = "imagem_album_usuario_classe_postagem"; // classe de imagem

// -------------------------------------------------------------------------


};

// --------------------------------------------------------


// imagem de bloqueio -----------------------------

$imagem_bloqueado = "<img src='".$imagem_servidor['bloqueado']."' title='Bloqueado'>"; // imagem de bloqueio

// --------------------------------------------------------


// informa se o usuario pode ver a imagem ou album ------

$usuario_pode_ver_album_imagem = retorne_usuario_pode_visualizar_album_imagem($privacidade); // informa se o usuario pode ver a imagem ou album

// ------------------------------------------------------------------------


// campo para editar imagem --------------------

$campo_editar_imagem = campo_editar_imagem_album($dados); // campo para editar imagem

// --------------------------------------------------------


// campo descricao de imagem ------------------

if($descricao != null){

$campo_descricao .= "<br>"; // campo descricao de imagem
$campo_descricao .= "<br>"; // campo descricao de imagem
$campo_descricao .= $descricao; // campo descricao de imagem
$campo_descricao .= "<br>"; // campo descricao de imagem

};

// --------------------------------------------------------


// nome do usuario ---------------------------------

$nome_usuario = func_retorna_nome_de_usuario_por_id($idusuario); // nome do usuario

// --------------------------------------------------------


// titulo de detalhes ---------------------------------

$titulo_detalhes = "Imagem de $nome_usuario"; // titulo de detalhes

// --------------------------------------------------------


// codigo html bruto ---------------------------------

if($usuario_pode_ver_album_imagem == true){

$codigo_html_bruto .= "<div class='$div_corpo_imagem_classe'>";
$codigo_html_bruto .= "<a class='fancybox' rel='group' href='$url_imagem'>";
$codigo_html_bruto .= "<img src='$url_imagem_miniatura' title='$titulo_detalhes' class='$imagem_album_usuario_classe'>";
$codigo_html_bruto .= "</a>";
$codigo_html_bruto .= "<br>";
$codigo_html_bruto .= $campo_editar_imagem;
$codigo_html_bruto .= $campo_descricao;
$codigo_html_bruto .= $campo_social_imagem;
$codigo_html_bruto .= "</div>";

}else{

$codigo_html_bruto .= "<div class='div_corpo_imagem_classe'>";
$codigo_html_bruto .= $imagem_bloqueado;
$codigo_html_bruto .= "<br>";
$codigo_html_bruto .= "<br>";
$codigo_html_bruto .= "Imagem bloqueada.";
$codigo_html_bruto .= "<br>";
$codigo_html_bruto .= "</div>";

};

// --------------------------------------------------------


// campo para excluir imagem --------------------

if($usuario_dono_perfil == true){

$codigo_html_bruto .= campo_excluir_imagem_album($dados);

};

// --------------------------------------------------------


// retorno ----------------------------------------------

if($url_imagem != null){

return $codigo_html_bruto; // retorno

};

// --------------------------------------------------------


};

// --------------------------------------------------------


?>