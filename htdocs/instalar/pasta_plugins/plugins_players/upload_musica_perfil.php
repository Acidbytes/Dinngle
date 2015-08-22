<?php


// upload para musica de perfil --------------------

function upload_musica_perfil($pasta_upload){


// globals ------------------------------------------------

global $tabela_banco; // tabela de banco de dados

global $tamanho_maximo_musica_perfil_pode_enviar; // tamanho maximo de musica de perfil que pode enviar

global $extensao_arquivo_audio_permitido_upload; // extensao de arquivo de upload permitido

// ----------------------------------------------------------


// dados de formulario -------------------------------

$campo_auto_play = remove_html($_POST['campo_auto_play']); // campo autoplay

// ---------------------------------------------------------


// verifica configuracao de autoplay --------------

if($campo_auto_play != null){

$campo_auto_play = 1; // toca automaticamente

}else{

$campo_auto_play = 0; // nao toca automaticamente

};

// ---------------------------------------------------------


// dados do arquivo -----------------------------------

$nome_arquivo = $_FILES['musica']['name']; // nome de arquivo

$extensao_arquivo = ".".strtolower(pathinfo($nome_arquivo, PATHINFO_EXTENSION)); // extensao

$nome_temporario_arquivo = $_FILES['musica']['tmp_name']; // nome temporario de arquivo

$tamanho_arquivo = $_FILES['musica']['size']; // tamanho arquivo

// ----------------------------------------------------------


// nome em md5 de arquivo ------------------------

$nome_md5_arquivo = md5($nome_arquivo).$extensao_arquivo; // nome em md5 de arquivo

// ----------------------------------------------------------


// endereco final de arquivo -------------------------

$endereco_final_arquivo = $pasta_upload.$nome_md5_arquivo; // endereco final de arquivo

// ----------------------------------------------------------


// endereco url de arquivo ---------------------------

$endereco_url_arquivo = retorne_pasta_musica_perfil().$nome_md5_arquivo; // endereco url de arquivo

// ----------------------------------------------------------


// movendo arquivo de upload ----------------------

if($tamanho_maximo_musica_perfil_pode_enviar >= $tamanho_arquivo and $extensao_arquivo == $extensao_arquivo_audio_permitido_upload){


// fazendo upload de arquivo ------------------------

move_uploaded_file($nome_temporario_arquivo, $endereco_final_arquivo); // movendo arquivo de upload

// -----------------------------------------------------------


}else{


// upload nao sera feito limpar url de arquivo ----

$endereco_url_arquivo = null; // limpando endereco final de arquivo

$nome_arquivo = null; // limpando nome de arquivo

// ----------------------------------------------------------


};

// ----------------------------------------------------------


// id de usuario logado -------------------------------

$idusuario = retorne_idusuario_logado(); // id de usuario logado

// ----------------------------------------------------------


// query campos existem em tabelas --------------------------

$query_campo[0] = "select *from $tabela_banco[7] where idusuario='$idusuario';";
$query_campo[1] = "select *from $tabela_banco[8] where idusuario='$idusuario';";

// ----------------------------------------------------------


// querys ---------------------------------------------------

if(retorne_numero_linhas_query($query_campo[0]) > 0 and retorne_numero_linhas_query($query_campo[1]) > 0){


// valida novo upload ---------------------------------------

if($tamanho_arquivo > 0){

$query[] = "update $tabela_banco[7] set url_musica_perfil='$endereco_url_arquivo', titulo_original_musica='$nome_arquivo' where idusuario='$idusuario';"; // query

};

// ----------------------------------------------------------


// atualiza autoplay ----------------------------------------

$query[] = "update $tabela_banco[8] set musica_auto_play='$campo_auto_play' where idusuario='$idusuario';"; // query

// ----------------------------------------------------------


}else{


// novo upload ----------------------------------------------

$query[] = "insert into $tabela_banco[7] values('$idusuario', '$endereco_url_arquivo', '$nome_arquivo');"; // query

$query[] = "insert into $tabela_banco[8] values('$idusuario', '$campo_auto_play');"; // query

// ----------------------------------------------------------


};

// ----------------------------------------------------------


// executando querys ---------------------------------

foreach($query as $valor_query){


// executa query ---------------------------------------

if($valor_query != null){

comando_executa($valor_query); // executando comando

};

// ----------------------------------------------------------


};

// ----------------------------------------------------------


};

// --------------------------------------------------------


?>