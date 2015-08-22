<?php


// campo adicionar musica -------------------------

function campo_adicionar_musica(){


// globals ------------------------------------------------

global $enderecos_arquivos_php_uteis; // enderecos de arquivos uteis

global $imagem_servidor; // imagens de servidor

global $extensao_arquivo_audio_permitido_upload; // extensao de arquivo de audio

global $tabela_banco; // tabelas de banco de dados

// ---------------------------------------------------------


// url de script para adicionar de perfil -----------

$url_script_adicionar_musica_perfil = $enderecos_arquivos_php_uteis['upload_musica_perfil'];

// ---------------------------------------------------------


// imagem de musica -------------------------------

$imagem_musica = "<img src='".$imagem_servidor['musica']."' title='Adicionar música'>"; // imagem de musica

// ---------------------------------------------------------


// usuario e o dono do perfil resposta -----------

$usuario_dono_perfil_resposta = retorna_usuario_vendo_perfil_dono(); // usuario e o dono do perfil resposta

// ---------------------------------------------------------


// id de usuario logado -------------------------------

$idusuario = retorne_idusuario_logado(); // id de usuario logado

// ----------------------------------------------------


// query de dados -------------------------------------

$query = "select *from $tabela_banco[8] where idusuario='$idusuario';"; // query de dados

// ----------------------------------------------------


// dados ----------------------------------------------

$dados = retorne_dados_query($query);

// ----------------------------------------------------



// botao auto play ------------------------------------

if($dados['musica_auto_play'] == 1){

$botao_auto_play = "<input type='checkbox' name='campo_auto_play' value='1' checked>"; // botao auto play

}else{
	
$botao_auto_play = "<input type='checkbox' name='campo_auto_play' value='1'>"; // botao auto play

};

// ----------------------------------------------------


// campo tocar musica automatica ---------------

$campo_auto_play .= "<li>Tocar a música automáticamente quando entrarem em meu perfíl."; // campo autoplay
$campo_auto_play .= "<br>"; // campo autoplay
$campo_auto_play .= $botao_auto_play; // campo autoplay
$campo_auto_play .= "&nbsp;"; // campo autoplay
$campo_auto_play .= "Tocar automáticamente"; // campo autoplay
$campo_auto_play .= "<br>"; // campo autoplay
$campo_auto_play .= "<input type='submit' class='uibutton large confirm botao_salvar_configuracao_musica' value='Salvar configuração'>"; // campo autoplay

// -----------------------------------------------


// formulario adicionar musica --------------------

$formulario_adicionar_musica .= "<div class='div_formulario_upload_musica'>"; // formulario adicionar musica
$formulario_adicionar_musica .= "<form action='$url_script_adicionar_musica_perfil' method='post' enctype='multipart/form-data' id='formulario_musica_perfil'>"; // formulario adicionar musica
$formulario_adicionar_musica .= "<input type='file' name='musica' id='campo_file_musica_upload' onchange='barra_progresso(5); enviar_musica_perfil_automatico();'>"; // formulario adicionar musica
$formulario_adicionar_musica .= $campo_auto_play; // formulario adicionar musica
$formulario_adicionar_musica .= "</form>"; // formulario adicionar musica
$formulario_adicionar_musica .= "</div>"; // formulario adicionar musica

// ---------------------------------------------------------


// div adicionar musica ------------------------------

$div_adicionar_musica .= "<div class='div_campo_adicionar_musica_perfil' onclick='clique_botao_adicionar_musica_playlist();'>"; // div adicionar musica
$div_adicionar_musica .= $imagem_musica; // div adicionar musica
$div_adicionar_musica .= "&nbsp;"; // div adicionar musica
$div_adicionar_musica .= "+Adicionar música ($extensao_arquivo_audio_permitido_upload)"; // div adicionar musica
$div_adicionar_musica .= "</div>"; // div adicionar musica

// ---------------------------------------------------------


// codigo html bruto ----------------------------------

if($usuario_dono_perfil_resposta == true){

$codigo_html_bruto .= $div_adicionar_musica;
$codigo_html_bruto .= $formulario_adicionar_musica;



};

// ---------------------------------------------------------


// retorno -----------------------------------------------

return $codigo_html_bruto; // retorno

// ---------------------------------------------------------


};

// --------------------------------------------------------


?>