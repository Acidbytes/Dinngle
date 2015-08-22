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


// dados de formulario ------------------------------------------------

$descricao_imagem = remove_html($_POST['descricao_imagem']); // descricao de imagem

$salvar_todas = remove_html($_POST['salvar_todas']); // salvar configuracoes em todas

$tipo_privacidade = remove_html($_POST['tipo_privacidade']); // tipo de privacidade

$url_imagem = $_POST['url_imagem']; // url de imagem

$numero_pagina = $_POST['numero_pagina']; // numero da pagina

// ---------------------------------------------------------------------------


// id de usuario logado ------------------------------------------------

$idusuario_logado = retorne_idusuario_logado(); // id de usuario logado

// ---------------------------------------------------------------------------


// verifica tipo de query a montar -----------------------------------

switch($salvar_todas){


case 1:
$query = "update $tabela_banco[6] set descricao='$descricao_imagem', privacidade='$tipo_privacidade' where idusuario='$idusuario_logado';"; // query salvar em imagem especifica
break;


default:
$query = "update $tabela_banco[6] set descricao='$descricao_imagem', privacidade='$tipo_privacidade' where idusuario='$idusuario_logado' and url_imagem='$url_imagem';"; // query salvar em todas


};

// ---------------------------------------------------------------------------


// comando --------------------------------------------------------------

$comando = comando_executa($query); // comando

// --------------------------------------------------------------------------


// desconecta do mysql -------------------------------------------------

desconecta_mysql(); // desconecta do mysql

// -----------------------------------------------------------------------------


// endereco url de pagina ----------------------------------------------

$endereco_url = $url_pagina_inicial_site."?idusuario=$idusuario_logado&tipo_pagina=5&numero_pagina=$numero_pagina"; // endereco url de pagina

// -----------------------------------------------------------------------------


// chama pagina ----------------------------------------------------------

chama_pagina_por_endereco($endereco_url); // chama pagina

// ----------------------------------------------------------------------------


?>