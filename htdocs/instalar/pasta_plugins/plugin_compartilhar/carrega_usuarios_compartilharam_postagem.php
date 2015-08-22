<?php


// usuarios compartilharam -----------------------

function carrega_usuarios_compartilharam_postagem(){


// globals ----------------------------------------------

global $tabela_banco; // tabela banco

// --------------------------------------------------------


// limit de query --------------------------------------

$limit_query = retorne_limit_tabela_get(); // limit de query

// --------------------------------------------------------


// id de publicacao ----------------------------------

$idpublicacao = retorne_idpublicacao_get(); // id de publicacao

// --------------------------------------------------------


// query ------------------------------------------------

$query[0] = "select *from $tabela_banco[17] where idpublicacao='$idpublicacao' $limit_query;"; // query

$query[1] = "select *from $tabela_banco[17] where idpublicacao='$idpublicacao';"; // query

// --------------------------------------------------------


// comando -------------------------------------------

$comando = comando_executa($query[0]); // comando

// --------------------------------------------------------


// numero de linhas ---------------------------------

$numero_linhas = retorne_numero_linhas_comando($comando); // numero de linhas

// --------------------------------------------------------


// numero resultados -------------------------------

$numero_resultados = retorne_numero_linhas_query($query[1]); // numero total de linhas

// --------------------------------------------------------


// numero resultados kb, mb etc -----------------

$numero_resultados_convertido = retorne_tamanho_resultado($numero_resultados); // numero de resultados convertido para tamanho kb, mb etc...

// --------------------------------------------------------


// contador --------------------------------------------

$contador = 0; // contador

// --------------------------------------------------------


// obtendo arrays com ids de usuarios ---------

for($contador == $contador; $contador <= $numero_linhas; $contador++){


// dados -----------------------------------------------

$dados = mysql_fetch_array($comando, MYSQL_ASSOC); // dados

// --------------------------------------------------------


// idusuario -------------------------------------------

$idusuario = $dados['idusuario']; // idusuario de tabela

// --------------------------------------------------------


// valida idusuario -----------------------------------

if($idusuario != null){

$arrays_idusuarios[] = $idusuario; // atualiza array com ids de usuarios

};

// --------------------------------------------------------


};

// --------------------------------------------------------


// codigo html bruto ---------------------------------

if($numero_resultados > 1){

$codigo_html_bruto .= "$numero_resultados_convertido pessoas compartilharam";

}else{

$codigo_html_bruto .= "$numero_resultados_convertido pessoa compartilhou";

};

// --------------------------------------------------------


// adiciona div informa postagem ----------------

$codigo_html_bruto .= "&nbsp;";
$codigo_html_bruto .= "<a href='$url_pagina_inicial_site?tipo_pagina=16&post_id=$idpublicacao'>";
$codigo_html_bruto .= "esta postagem";
$codigo_html_bruto .= "</a>";
$codigo_html_bruto .= ".";

// ---------------------------------------------------------


// adiciona div -----------------------------------------

$codigo_html_bruto = "<div class='classe_div_postagem_compartilhou'>$codigo_html_bruto</div>"; // adiciona div

// ---------------------------------------------------------


// monta usuarios ------------------------------------

$codigo_html_bruto .= monta_pacotes_usuarios($arrays_idusuarios, 1);
$codigo_html_bruto .= monta_paginas_paginacao($numero_resultados); // codigo  html bruto

// --------------------------------------------------------


// titulo -------------------------------------------------

$titulo = "Compartilharam"; // titulo

// --------------------------------------------------------


// div especial ----------------------------------------

$codigo_html_bruto = constroe_div_especial_geral($titulo, $codigo_html_bruto, null); // div especial

// --------------------------------------------------------


// retorno ----------------------------------------------

return $codigo_html_bruto; // retorno

// --------------------------------------------------------


};

// --------------------------------------------------------


?>