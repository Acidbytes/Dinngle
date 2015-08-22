<?php


// topo da pagina -----------------------------------

$topo_pagina = constroe_topo_pagina(); // topo da pagina

// --------------------------------------------------------


// rodape da pagina --------------------------------

$rodape_pagina = constroe_rodape(); // rodape da pagina

// ---------------------------------------------------------


// pasta de arquivos de jogos ------------------

$pasta_arquivos_jogos = "../".$pasta_jogos; // pasta de arquivos de jogos

// --------------------------------------------------------


// array pastas com jogos -----------------------

$array_pastas_jogos = scandir($pasta_arquivos_jogos); // array pastas com jogos

// --------------------------------------------------------


// query -------------------------------------------------

$query = "delete from $tabela_banco[29];"; // query

// ---------------------------------------------------------


// executa comando --------------------------------

$comando = mysql_query($query); // comando

// --------------------------------------------------------


// array com jogos listados ----------------------

$array_jogos_listados = array(); // array com jogos listados

// --------------------------------------------------------


// anuncio de pagina ------------------------------

$anuncio_pagina = constroe_anuncio_pagina(0); // anuncio de pagina

// --------------------------------------------------------


// obtendo pastas ----------------------------------

foreach($array_pastas_jogos as $pasta_jogo){


// valida destino de pasta ------------------------

if ($pasta_jogo != "." and $pasta_jogo != "..") {


// pasta de jogo original ---------------------------

$pasta_jogo_original = $pasta_jogo; // pasta de jogo original

// ---------------------------------------------------------


// pasta root de jogo --------------------------------

$pasta_jogo_root = $pasta_arquivos_jogos.$pasta_jogo."/"; // pasta root de jogo

// ---------------------------------------------------------


// pasta de jogo -------------------------------------

$pasta_jogo = $pasta_jogo_root."informa/"; // pasta de jogo

// ---------------------------------------------------------


// pasta informa --------------------------------------

$pasta_informa = $pasta_jogo_root."informa/"; // pasta informa

// ---------------------------------------------------------


// cria pasta informa --------------------------------

if(is_dir($pasta_informa) == false){

mkdir($pasta_informa); // cria pasta informa

};

// ---------------------------------------------------------


// descricao de jogo --------------------------------

$descricao = "Jogar $pasta_jogo_original - $nome_do_sistema"; // descricao de jogo

// ---------------------------------------------------------


// imagem do jogo ----------------------------------

$imagem_jogo = $url_pasta_jogos.$pasta_jogo_original."/informa/imagem.jpg"; // imagem do jogo

// ---------------------------------------------------------


// url do jogo ------------------------------------------

$url_jogo = "$dominio_host_site/jogos/$pasta_jogo_original/"; // url do jogo

// ---------------------------------------------------------


// token do jogo --------------------------------------

$token_jogo = md5($url_jogo); // token do jogo

// ----------------------------------------------------------


// data completa -------------------------------------

$data_atual = Date("d-m-y G:i:s"); // data atual

// ---------------------------------------------------------


// categoria --------------------------------------------

$categoria = file_get_contents($pasta_informa."categoria.txt"); // categoria
$categoria .= ", jogos"; // categoria

// ---------------------------------------------------------


// codigo de escape -------------------------------

$categoria = htmlentities($categoria); // codigo de escape

// ---------------------------------------------------------


// query -------------------------------------------------

$query = "insert into $tabela_banco[29] values('$pasta_jogo_original', '$descricao', '$imagem_jogo', '$url_jogo', '$token_jogo', '$data_atual', '$categoria');"; // query

// ---------------------------------------------------------


// executa comando --------------------------------

$comando = mysql_query($query); // comando

// --------------------------------------------------------


// atualiza lista com jogos ------------------------

$array_jogos_listados[] = $pasta_jogo_root; // atualiza lista com jogos

// --------------------------------------------------------


};

// --------------------------------------------------------


};

// --------------------------------------------------------


// listando e criando paginas de jogos -------

foreach($array_jogos_listados as $jogo_endereco){


// valida endereco de jogo -----------------------

if($jogo_endereco != null){


// categoria --------------------------------------------

$categoria = file_get_contents($jogo_endereco."informa/categoria.txt"); // categoria
$categoria .= ", jogos"; // categoria

// ---------------------------------------------------------


// codigo de escape -------------------------------

$categoria = htmlentities($categoria); // codigo de escape

// ---------------------------------------------------------


// obtendo categoria --------------------------------

$categoria = explode(",", $categoria); // separa

$categoria = remove_html($categoria[0]); // remove html

// ---------------------------------------------------------


// termo de pesquisa -------------------------------

$_GET['pesquisa_generica'] = $categoria; // termo de pesquisa

// ---------------------------------------------------------


// codigo html bruto --------------------------------

$codigo_html_bruto .= "<html>"; // codigo html bruto
$codigo_html_bruto .= "<head>"; // codigo html bruto
$codigo_html_bruto .= "<title>$pasta_jogo_original - $nome_do_sistema</title>"; // codigo html bruto
$codigo_html_bruto .= "<meta charset='UTF-8'>"; // codigo html bruto
$codigo_html_bruto .= ""; // codigo html bruto
$codigo_html_bruto .= "<link rel='stylesheet' type='text/css' href='$url_arquivo_css'/>"; // codigo html bruto
$codigo_html_bruto .= "<link rel='stylesheet' type='text/css' href='$url_arquivo_css_plugins'/>"; // codigo html bruto
$codigo_html_bruto .= "<meta name='description' content='Jogos em flash on-line $nome_do_sistema - #_nome_jogo_#'>"; // codigo html bruto
$codigo_html_bruto .= "</head>"; // codigo html bruto
$codigo_html_bruto .= "<body>"; // codigo html bruto
$codigo_html_bruto .= "<div id='div_corpo_pagina'>"; // codigo html bruto
$codigo_html_bruto .= "<div id='div_topo_pagina'>$topo_pagina</div>"; // codigo html bruto
$codigo_html_bruto .= "<div class='div_principal_corpo_jogo'>"; // codigo html bruto
$codigo_html_bruto .= "<object width='100%' height='100%'>"; // codigo html bruto
$codigo_html_bruto .= "<param name='movie' value='jogo.swf'>"; // codigo html bruto
$codigo_html_bruto .= "<param name=quality value=high>"; // codigo html bruto
$codigo_html_bruto .= "<embed src='jogo.swf' quality='high' type='application/x-shockwave-flash' width='100%' height='100%'></embed>"; // codigo html bruto
$codigo_html_bruto .= "</object>"; // codigo html bruto
$codigo_html_bruto .= "</div>"; // codigo html bruto
$codigo_html_bruto .= $anuncio_pagina; // codigo html bruto
$codigo_html_bruto .= monta_pagina_jogos(); // codigo html bruto
$codigo_html_bruto .= $anuncio_pagina; // codigo html bruto
$codigo_html_bruto .= "<div id='div_rodape_pagina'>$rodape_pagina</div>"; // codigo html bruto
$codigo_html_bruto .= "</div>"; // codigo html bruto
$codigo_html_bruto .= "</body>"; // codigo html bruto
$codigo_html_bruto .= "</html>"; // codigo html bruto

// --------------------------------------------------------


// abrindo arquivo e salvando conteudo ------

$arquivo = fopen($jogo_endereco."index.html", "w+"); // abrindo...

fwrite($arquivo, $codigo_html_bruto); // salvando...

// --------------------------------------------------------


// limpa codigo html bruto -----------------------

$codigo_html_bruto = null; // limpa codigo html bruto

// --------------------------------------------------------


};

// ---------------------------------------------------------


};

// --------------------------------------------------------


// limpa array de pastas --------------------------

$array_pastas_jogos = null; // limpa array de pastas

$array_jogos_listados = null; // limpa array de jogos listados

// --------------------------------------------------------


?>