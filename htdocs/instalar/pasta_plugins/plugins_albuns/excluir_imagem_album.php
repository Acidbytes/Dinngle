<?php


// excluir a imagem no album
function excluir_imagem_album(){


// globals
global $tabela_banco;


// dados de formulario
$id_imagem = remove_html($_POST['id_imagem']);
$nome_album_identificador = remove_html($_POST['nome_album_identificador']);
$imagem_unica = remove_html($_POST['imagem_unica']);


// id de usuario logado
$idusuario_logado = retorne_idusuario_logado();


// exclui imagem por id, exclui apenas uma imagem
if($imagem_unica == true){

$query = "select *from $tabela_banco[6] where idusuario='$idusuario_logado' and id='$id_imagem';";

};


// exclui album por completo, exclui todas as imagens de um album
if($nome_album_identificador != null and $imagem_unica == null){

$query = "select *from $tabela_banco[6] where idusuario='$idusuario_logado' and nome_album_identificador='$nome_album_identificador';";

};


// valida se ha query a ser executada
if($query == null){

return null;

};


// listando imagens
$comando = comando_executa($query);


// numero de linhas
$numero_linhas = retorne_numero_linhas_comando($comando);


// contador
$contador = 0;


// obtendo enderecos de imagens
for($contador == $contador; $contador <= $numero_linhas; $contador++){


// dados
$dados = mysql_fetch_array($comando, MYSQL_ASSOC);


// separando dados
$id = $dados['id'];
$idalbum_imagens = $dados['idalbum_imagens'];
$idalbum_nome = $dados['idalbum_nome'];
$endereco_imagem_normal = $dados['url_imagem'];
$endereco_imagem_miniatura = $dados['url_imagem_miniatura'];


// removendo imagens
if($id != null){


// dados de publicacao
$dados_post = retorne_dados_publicacao_idalbum($idalbum_imagens);


// separa dados de publicacao
$idpublicacao = $dados_post['id'];


// prepara para excluir publicacao
$_GET['idalbum_nome'] = $idalbum_nome;


// excluindo arquivos
exclui_arquivo_unico($endereco_imagem_normal);
exclui_arquivo_unico($endereco_imagem_miniatura);


// remove qualquer referencia global
remover_referencia_publicacao_global($id);


// remove de banco de dados
$query = "delete from $tabela_banco[6] where idusuario='$idusuario_logado' and id='$id';";


// comando executa
comando_executa($query);


// remove publicacao
if(retorne_numero_total_imagens_albuns_usuario() == 0){


// remove de banco de dados
$query_1 = "delete from $tabela_banco[9] where idusuario='$idusuario_logado' and idalbum_imagens='$idalbum_imagens';";
$query_2 = "delete from $tabela_banco[17] where idpublicacao='$idpublicacao';";


// comando executa
comando_executa($query_1);
comando_executa($query_2);


};


// remove de banco de dados
$query = "delete from $tabela_banco[17] where idpublicacao='$id';";


// comando executa
comando_executa($query);


};


};


};


?>