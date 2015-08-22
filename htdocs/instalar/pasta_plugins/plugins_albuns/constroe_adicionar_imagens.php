<?php


// constroe adicionar imagens --------------------

function constroe_adicionar_imagens(){


// globals ----------------------------------------------

global $imagem_servidor; // imagens do servidor

global $enderecos_arquivos_php_uteis; // enderecos de arquivos php

global $tabela_banco;

// --------------------------------------------------------


// obtem nome album identificador ----------

$nome_album_identificador = remove_html($_GET['idalbum_nome']);

// --------------------------------------------------------


// valida nome de album identificador ------

if($nome_album_identificador != null){


// id de usuario logado
$idusuario = retorne_idusuario_logado();


// query
$query = "select *from $tabela_banco[6] where idusuario='$idusuario'  and nome_album_identificador='$nome_album_identificador' order by id desc limit 0,1;";


// dados de query
$dados = retorne_dados_query($query);


// separa dados
$id = $dados['id'];
$idusuario = $dados['idusuario'];
$url_imagem = $dados['url_imagem'];
$url_imagem_miniatura = $dados['url_imagem_miniatura'];
$privacidade = $dados['privacidade'];
$descricao = $dados['descricao'];
$data_publicacao = $dados['data_publicacao'];
$idalbum_imagens = $dados['idalbum_imagens'];
$identificador = $dados['identificador'];
$nome_album = $dados['nome_album'];
$nome_album_identificador = $dados['nome_album_identificador'];


// adiciona ou atualiza
$campo_modo_adicionar .= "<input type='hidden' name='nome_album_identificador' value='$nome_album_identificador'>";
$campo_modo_adicionar .= "<input type='hidden' name='idalbum_imagens' value='$idalbum_imagens'>";


};

// --------------------------------------------------------


// informa se o usuario e o dono do perfil --

$usuario_dono_perfil = retorna_usuario_vendo_perfil_dono(); // informa se o usuario e o dono do perfil 

// --------------------------------------------------------


// verifica se usuario e o dono do perfil --------

if($usuario_dono_perfil == false){

return null; // retorno nulo

};

// --------------------------------------------------------


// imagem adicionar --------------------------------

$imagem_adicionar = "<img src='".$imagem_servidor['camera_add']."' title='Adicionar mais imagens'>"; // imagem adicionar

// --------------------------------------------------------


// campo adicionar imagens ----------------------

$campo_adicionar_imagens .= "<div class='campo_file_imagem_albuns'>"; // campo adicionar imagens
$campo_adicionar_imagens .= "<input type='file' name='foto[]' id='campo_file_imagem_albuns' onchange='barra_progresso(2); enviar_imagens_albuns_automatico();' multiple>"; // campo adicionar imagens
$campo_adicionar_imagens .= "</div>"; // campo adicionar imagens

// --------------------------------------------------------


 // url de script de upload --------------------------
 
$url_script_upload = $enderecos_arquivos_php_uteis['upload_imagens_usuario']; // url de script de upload

// --------------------------------------------------------


// tipo de privacidade -------------------------------

$tipo_privacidade = campo_select_privacidade($privacidade); // tipo de privacidade

// --------------------------------------------------------


// campo descricao de imagem ------------------

$campo_descricao_imagem .= "<div class='adicionar_campo_descricao_imagem'>"; // campo descricao de imagem
$campo_descricao_imagem .= "<textarea class='textarea_campo_descricao_imagem' cols='75' rows='5' name='descricao_imagem' placeholder='Descrição do álbum'>$descricao</textarea>"; // campo descricao de imagem
$campo_descricao_imagem .= "</div>"; // campo descricao de imagem

// --------------------------------------------------------


// botao atualizar album -------------------------

if($nome_album_identificador != null){

$campo_atualiza .= "&nbsp;";
$campo_atualiza .= "<input type='submit' class='uibutton' value='Atualizar álbum'>";

};

// --------------------------------------------------------


// nome do album ---------------------------------

$campo_nome_album .= "<div class='adicionar_campo_titulo_imagem'>";
$campo_nome_album .= "<input type='text' name='nome_album_imagem' value='$nome_album' placeholder='Título do álbum'>";
$campo_nome_album .= $campo_atualiza;
$campo_nome_album .= "</div>";

// --------------------------------------------------------


// codigo html bruto ---------------------------------

$codigo_html_bruto .= "<form id='formulario_enviar_imagens_albuns' action='$url_script_upload' method='post' enctype='multipart/form-data'>";
$codigo_html_bruto .= $campo_nome_album;
$codigo_html_bruto .= $campo_descricao_imagem;
$codigo_html_bruto .= $tipo_privacidade;
$codigo_html_bruto .= $campo_modo_adicionar;
$codigo_html_bruto .= "<div class='div_campo_adicionar_imagens' onclick='clique_botao_adicionar_imagens_albuns();'>";
$codigo_html_bruto .= $imagem_adicionar;
$codigo_html_bruto .= "&nbsp;";
$codigo_html_bruto .= "+Adicione mais imagens";
$codigo_html_bruto .= $campo_adicionar_imagens;
$codigo_html_bruto .= "</div>";
$codigo_html_bruto .= "</form>";
$codigo_html_bruto .= montar_barra_progresso("barra_progresso_upload_imagens_album");

// --------------------------------------------------------


// retorno ----------------------------------------------

return $codigo_html_bruto; // retorno

// --------------------------------------------------------


};

// --------------------------------------------------------


?>