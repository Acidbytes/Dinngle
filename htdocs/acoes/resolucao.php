<?php


// abre pasta maniparq 
chdir("../maniparq");


// carrega bibliotecas
include("bibliotecas_php.php");
include("plugins_ajuda.php");


// carrega dados de servidor 
include("../servidor/dados_servidor.php");


// dados de formulario
$largura = intval($_POST['largura']);


// salva valor em sessao
if($largura <= 320 or $largura <= 480){

aplica_resolucao(1);

};


?>