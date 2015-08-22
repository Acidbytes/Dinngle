<?php


// abre pasta maniparq 
chdir("../maniparq");


// carrega bibliotecas
include("bibliotecas_php.php");


// carrega dados de servidor
include("../servidor/dados_servidor.php");


// conecta ao mysql
conecta_mysql(true);


// id de usuario logado
$idusuario_logado = retorne_idusuario_logado();


// dados do formulario
$idalbum_imagens = remove_html($_POST['idalbum_imagens']);
$nome_album_identificador = remove_html($_POST['nome_album_identificador']);


// dados de publicacao a partir de idalbum
$dados_publicacao = retorne_dados_publicacao_idalbum($idalbum_imagens);


// remove referencia global
remover_referencia_publicacao_global($dados_publicacao['id']);


// comandos
$query = "select *from $tabela_banco[6] where idusuario='$idusuario_logado' and idalbum_imagens='$idalbum_imagens' and nome_album_identificador='$nome_album_identificador';"; // query


// comando
$comando = comando_executa($query);


// numero de linhas
$numero_linhas = retorne_numero_linhas_comando($comando);


// contador
$contador = 0;


// listando e excluindo imagens de album
for($contador == $contador; $contador <= $numero_linhas; $contador++){


// dados
$dados = mysql_fetch_array($comando, MYSQL_ASSOC);


// separa dados
$id = $dados['id'];
$idalbum_imagens = $dados['idalbum_imagens'];
$nome_album_identificador = $dados['nome_album_identificador'];


// valida dados de imagem
if($id != null and $idalbum_imagens != null){


// id de album em variavel de $_POST
$_POST['id'] = $id;
$_POST['idalbum_imagens'] = $idalbum_imagens;
$_POST['nome_album_identificador'] = $nome_album_identificador;


// excluindo imagem
excluir_imagem_album();


};


};


// desconecta do mysql
desconecta_mysql();


// chama pagina especifica
chamar_pagina_especifica(5);


?>