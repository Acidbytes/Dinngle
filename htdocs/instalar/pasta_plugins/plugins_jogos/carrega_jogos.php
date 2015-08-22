<?php


// carrega os jogos ----------------------------------

function carrega_jogos(){


// globals -----------------------------------------------

global $tabela_banco; // banco de dados

global $pasta_jogos; // pasta de jogos

global $url_pagina_inicial_jogos; // url de pagina inicial de jogos

global $url_pasta_jogos; // url de pasta de jogos

// ---------------------------------------------------------


// termo de pesquisa -------------------------------

$termo_pesquisa = retorne_termo_pesquisa(); // termo de pesquisa

// ---------------------------------------------------------


// limit de query --------------------------------------

$limit_query = retorne_limit_tabela_jogos(); // limit de query

// ----------------------------------------------------------


// query -------------------------------------------------

$query = "select *from $tabela_banco[29] where nome like '%$termo_pesquisa%' or descricao like '%$termo_pesquisa%' or categoria like '%$termo_pesquisa%' $limit_query;"; // query

// -----------------------------------------------------------


// comando ---------------------------------------------

$comando = comando_executa($query); // comando

// ------------------------------------------------------------


// numero de linhas ----------------------------------

$numero_linhas = retorne_numero_linhas_comando($comando); // numero de linhas

// -----------------------------------------------------------


// contador ----------------------------------------------

$contador = 0; // contador

// -----------------------------------------------------------


// codigo html bruto ----------------------------------

for($contador == $contador; $contador <= $numero_linhas; $contador++){


// dados de jogos ------------------------------------

$dados = mysql_fetch_array($comando, MYSQL_ASSOC); // dados de jogos

// ----------------------------------------------------------


// separando dados ----------------------------------

$nome = $dados['nome']; // dados
$descricao = $dados['descricao']; // dados
$imagem = $dados['imagem']; // dados
$pasta = $dados['pasta']; // dados
$token = $dados['token']; // dados
$data = $dados['data']; // dados
$categoria = $dados['categoria']; // dados

// ----------------------------------------------------------


// descricao --------------------------------------------

$descricao = gera_link_hashtag($descricao); // descricao

$descricao = converte_urls_texto_links($descricao); // descricao

// ----------------------------------------------------------



// url da pasta -----------------------------------------

$url_pasta = $url_pasta_jogos."$nome/"; // url da pasta

// ----------------------------------------------------------


// valida categorias ---------------------------------

if($categoria != null){


// cria array de categorias ------------------------

$categoria_array = explode(",", $categoria); // cria array de categorias

// --------------------------------------------------------


// listando categorias ------------------------------

foreach($categoria_array as $categoria_nova){


// valida categoria -----------------------------------

if($categoria_nova != null){


// url de pesquisa -----------------------------------

$url_pesquisa = "$url_pagina_inicial_jogos?pesquisa_generica=$categoria_nova"; // url de pesquisa

// --------------------------------------------------------


// cria campo de categoria de jogo -----------

$campo_categoria .= "<a href='$url_pesquisa' title='$categoria_nova' class='uibutton large confirm btn-xs'>$categoria_nova</a>&nbsp;"; // camp categoria

// --------------------------------------------------------


};

// --------------------------------------------------------


};

// --------------------------------------------------------


};

// --------------------------------------------------------


// monta jogo ----------------------------------------

$conteudo_post .= "<div class='div_corpo_jogo'>"; // conteudo post
$conteudo_post .= "<a href='$url_pasta' title='$nome' target='_blank'>"; // conteudo post
$conteudo_post .= "<span class='titulo_jogo'>$nome</span>"; // conteudo post
$conteudo_post .= "</a>"; // conteudo post
$conteudo_post .= "<br>"; // conteudo post
$conteudo_post .= "<a href='$url_pasta' title='$nome' target='_blank'>"; // conteudo post
$conteudo_post .= "<img src='$imagem' title='$nome' class='imagem_jogo'>"; // conteudo post
$conteudo_post .= "</a>"; // conteudo post
$conteudo_post .= "<br>"; // conteudo post
$conteudo_post .= "<li>$descricao"; // conteudo post
$conteudo_post .= "<br>"; // conteudo post
$conteudo_post .= "<br>"; // conteudo post
$conteudo_post .= "<a href='$url_pasta' title='$nome' class='botao_padrao' target='_blank'>Play</a>"; // conteudo post
$conteudo_post .= "<br>"; // conteudo post
$conteudo_post .= "<br>"; // conteudo post
$conteudo_post .= "<div class='div_categorias_jogos'>"; // conteudo post
$conteudo_post .= $campo_categoria; // conteudo post
$conteudo_post .= "</div>"; // conteudo post
$conteudo_post .= "</div>"; // conteudo post

// ---------------------------------------------------------


// adiciona div principal ----------------------------

$conteudo_post = "<div class='classe_div_principal_jogo'>$conteudo_post</div>"; // adiciona div principal

// ---------------------------------------------------------


// atualiza codigo html bruto ---------------------

if($nome != null){

$codigo_html_bruto .= $conteudo_post; // atualiza codigo html bruto

};

// ---------------------------------------------------------


// limpa conteudo -----------------------------------

$conteudo_post = null; // limpa conteudo

$campo_categoria = null; // limpa categorias antigas

// ---------------------------------------------------------


};

// --------------------------------------------------------


// numero de jogos --------------------------------

$numero_jogos = retorne_numero_jogos(); // numero de jogos

// --------------------------------------------------------


// adiciona pesquisa jogos e paginacao -----

$codigo_html_bruto = campo_pesquisa_jogos().$codigo_html_bruto.monta_paginas_paginacao_jogos($numero_jogos); // adiciona pesquisa jogos e paginacao

// --------------------------------------------------------


// retorno ----------------------------------------------

return $codigo_html_bruto; // retorno

// --------------------------------------------------------


};

// --------------------------------------------------------


?>