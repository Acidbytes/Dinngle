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


// id de usuario de sessao de chat, este usuario e o amigo do usuario logado
$idusuario = retorne_idusuario_sessao_chat(null, false); // idusuario sessao chat anterior


// query
$query[] = "delete from $tabela_banco[22] where idusuario='$idusuario_logado';";
$query[] = "update $tabela_banco[22] set visualizada='1' where idamigo='$idusuario_logado' and idusuario='$idusuario';"; // query
$query[] = "update $tabela_banco[22] set visualizada='1' where idusuario='$idusuario_logado' and idamigo='$idusuario';"; // query


// excluindo
executador_querys($query);


// desconecta do mysql
desconecta_mysql();


?>