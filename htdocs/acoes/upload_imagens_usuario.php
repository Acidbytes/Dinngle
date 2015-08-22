<?php


// abre pasta maniparq ------------------------------------------------

chdir("../maniparq"); // abre pasta maniparq

// ---------------------------------------------------------------------------


// carrega bibliotecas --------------------------------------------------

include("bibliotecas_php.php"); // carrega bibliotecas

// ---------------------------------------------------------------------------


// carrega dados de servidor ----------------------------------------

include("../servidor/dados_servidor.php"); // carrega dados de servidor

// ---------------------------------------------------------------------------


// conecta ao mysql ----------------------------------------------------

conecta_mysql(true); // conecta ao mysql

// ---------------------------------------------------------------------------


// endereco de pasta de upload de imagens ---------------------

$pasta_upload = retorne_pasta_upload_albuns_imagens(); // endereco de pasta de upload de imagens

// ---------------------------------------------------------------------------


// id de usuario logado ------------------------------------------------

$idusuario_logado = retorne_idusuario_logado(); // id de usuario logado

// ---------------------------------------------------------------------------


// dados de formulario ------------------------------------------------

$numero_imagens_enviando = count($_FILES['foto']['name']); // dados de formulario

// ---------------------------------------------------------------------------


// upload de imagem de album --------------------------------------

if($numero_imagens_enviando > 0 and $idusuario_logado != null){

upload_de_imagem_album($pasta_upload); // upload de imagem de album

};

// ---------------------------------------------------------------------------


// atualiza somente informacoes de album
if($idusuario_logado != null){


// dados de formulario
$descricao_imagem = remove_html($_POST['descricao_imagem']);
$nome_album_imagem = remove_html($_POST['nome_album_imagem']);
$tipo_privacidade = remove_html($_POST['tipo_privacidade']);
$nome_album_identificador = remove_html($_POST['nome_album_identificador']);


// query
$query = "update $tabela_banco[6] set nome_album='$nome_album_imagem', descricao='$descricao_imagem', privacidade='$tipo_privacidade' where idusuario='$idusuario_logado' and nome_album_identificador='$nome_album_identificador';";


// salva
comando_executa($query);


};


// desconecta do mysql -------------------------------------------------

desconecta_mysql(); // desconecta do mysql

// -----------------------------------------------------------------------------


// endereco url de pagina ----------------------------------------------

if($idusuario_logado == null){

$endereco_url = $url_pagina_inicial_site."?idusuario=$idusuario_logado&tipo_pagina=5"; // endereco url de pagina

}else{

$endereco_url = $url_pagina_inicial_site."?idusuario=$idusuario_logado&tipo_pagina=5&idalbum_nome=$nome_album_identificador"; // endereco url de pagina

};

// -----------------------------------------------------------------------------


// chama pagina ----------------------------------------------------------

chama_pagina_por_endereco($endereco_url); // chama pagina

// ----------------------------------------------------------------------------


?>