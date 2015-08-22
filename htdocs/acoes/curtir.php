<?php


// abre pasta maniparq -----------------------------

chdir("../maniparq"); // abre pasta maniparq

// --------------------------------------------------------


// carrega bibliotecas ------------------------------

include("bibliotecas_php.php"); // carrega bibliotecas

// -------------------------------------------------------


// carrega dados de servidor ---------------------

include("../servidor/dados_servidor.php"); // carrega dados de servidor

// -------------------------------------------------------


// conecta ao mysql -------------------------------

conecta_mysql(true); // conecta ao mysql

// ------------------------------------------------------


// dados de formulario ---------------------------

$curtir_social = $_POST['curtir_social']; // curtir social

// ------------------------------------------------------


// curte -----------------------------------------------

if($curtir_social == null){

curtir_social(); // curte

};

// ------------------------------------------------------


// constroe campos social --------------------

switch(remove_html($_POST['tipo_curtida'])){


case 1:
$codigo_html_bruto = constroe_campos_social_publicacoes_gerais(null); // codigo html bruto
break;


case 2:
$codigo_html_bruto = constroe_campos_social_publicacoes_gerais(null); // codigo html bruto
break;


case 3:
// imagem
$imagem = "<img src='".$imagem_servidor['tick']."' title='Ok'>"; // imagem

// codigo html bruto
$codigo_html_bruto .= $imagem; // codigo html bruto
$codigo_html_bruto .= "&nbsp;"; // codigo html bruto
$codigo_html_bruto .= "Ok"; // codigo html bruto
break;


};

// -------------------------------------------------------


// exibe codigo da pagina ----------------------

echo $codigo_html_bruto; // exibe codigo da pagina

// ------------------------------------------------------


// desconecta do mysql ------------------------

desconecta_mysql(); // desconecta do mysql

// ------------------------------------------------------


?>