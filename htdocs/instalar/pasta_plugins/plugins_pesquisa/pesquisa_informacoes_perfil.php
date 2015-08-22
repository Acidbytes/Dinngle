<?php


// pesquisa informacoes de perfil ---------------

function pesquisa_informacoes_perfil(){


// globals -----------------------------------------------

global $tabela_banco; // tabelas do banco de dados

// ---------------------------------------------------------


// termo de pesquisa --------------------------------

$termo_pesquisa = retorne_termo_pesquisa(); // termo de pesquisa

// ---------------------------------------------------------


// limit query -------------------------------------------

$limit_query = retorne_limit_pesquisa_geral_get(); // limit query

// ---------------------------------------------------------


// id de usuario logado ------------------------------

$idusuario_logado = retorne_idusuario_logado(); // id de usuario logado

// ---------------------------------------------------------


// array de dados de usuario -----------------------

$dados_array_usuario = retorna_dados_usuario_array($idusuario_logado); // array de dados de usuario

// ---------------------------------------------------------


// obtendo cidade e estado -------------------------

$cidade = $dados_array_usuario['cidade']; // cidade

$estado = $dados_array_usuario['estado']; // estado

// ----------------------------------------------------------


// modo de pesquisa -----------------

switch(retorna_modo_pesquisa_geral()){


case 2:
$query[0] = "select *from $tabela_banco[3] where cidade like '%$termo_pesquisa%' $limit_query;"; // query
$query[1] = "select *from $tabela_banco[3] where cidade like '%$termo_pesquisa%';"; // query
break;


case 3:
$query[0] = "select *from $tabela_banco[3] where estado like '%$termo_pesquisa%' $limit_query;"; // query
$query[1] = "select *from $tabela_banco[3] where estado like '%$termo_pesquisa%';"; // query
break;


case 4:
$query[0] = "select *from $tabela_banco[3] where site like '%$termo_pesquisa%' $limit_query;"; // query
$query[1] = "select *from $tabela_banco[3] where site like '%$termo_pesquisa%';"; // query
break;


case 6:
$query[0] = "select *from $tabela_banco[3] where sexo like '%$termo_pesquisa%' $limit_query;"; // query
$query[1] = "select *from $tabela_banco[3] where sexo like '%$termo_pesquisa%';"; // query
break;


case 7:
$query[0] = "select *from $tabela_banco[3] where cidade like '%$cidade%' and estado like '%$estado%' $limit_query;"; // query
$query[1] = "select *from $tabela_banco[3] where cidade like '%$cidade%' and estado like '%$estado%';"; // query
break;


case 8:
$query[0] = "select *from $tabela_banco[3] where estado_civil like '%$termo_pesquisa%' $limit_query;"; // query
$query[1] = "select *from $tabela_banco[3] where estado_civil like '%$termo_pesquisa%';"; // query
break;


case 10:
$query[0] = "select *from $tabela_banco[3] where cidade like '%$cidade%' and estado like '%$estado%' and sexo like '%$termo_pesquisa%' $limit_query;"; // query
$query[1] = "select *from $tabela_banco[3] where cidade like '%$cidade%' and estado like '%$estado%' and sexo like '%$termo_pesquisa%';"; // query
break;


case 11:
$query[0] = "select *from $tabela_banco[14] where profissao like '%$termo_pesquisa%' $limit_query;"; // query
$query[1] = "select *from $tabela_banco[14] where profissao like '%$termo_pesquisa%';"; // query
break;


case 12:
$query[0] = "select *from $tabela_banco[14] where projetos like '%$termo_pesquisa%' $limit_query;"; // query
$query[1] = "select *from $tabela_banco[14] where projetos like '%$termo_pesquisa%';"; // query
break;


case 13:
$query[0] = "select *from $tabela_banco[14] where formacao like '%$termo_pesquisa%' $limit_query;"; // query
$query[1] = "select *from $tabela_banco[14] where formacao like '%$termo_pesquisa%';"; // query
break;


case 14:
$query[0] = "select *from $tabela_banco[14] where experiencia like '%$termo_pesquisa%' $limit_query;"; // query
$query[1] = "select *from $tabela_banco[14] where experiencia like '%$termo_pesquisa%';"; // query
break;


case 15:
$query[0] = "select *from $tabela_banco[14] where empregado like '%nao%' and profissao like '%$termo_pesquisa%' $limit_query;"; // query
$query[1] = "select *from $tabela_banco[14] where empregado like '%nao%' and profissao like '%$termo_pesquisa%';"; // query
break;


case 16:
$query[0] = "select *from $tabela_banco[14] where empregado like '%nao%' and profissao like '%$termo_pesquisa%' and estado like '%$estado%' $limit_query;"; // query
$query[1] = "select *from $tabela_banco[14] where empregado like '%nao%' and profissao like '%$termo_pesquisa%' and estado like '%$estado%' ;"; // query
break;


case 17:
// campos de pesquisa da tabela
$campos_tabela .= "ensino_medio like '%$termo_pesquisa%' or ";
$campos_tabela .= "ensino_medio_ano like '%$termo_pesquisa%' or ";
$campos_tabela .= "faculdade like '%$termo_pesquisa%' or ";
$campos_tabela .= "faculdade_ano like '%$termo_pesquisa%' or ";
$campos_tabela .= "habilidade_profissional like '%$termo_pesquisa%' or ";
$campos_tabela .= "trabalha_onde like '%$termo_pesquisa%' or ";
$campos_tabela .= "trabalha_onde_ano like '%$termo_pesquisa%' or ";
$campos_tabela .= "interesse_sexual like '%$termo_pesquisa%' or ";
$campos_tabela .= "endereco like '%$termo_pesquisa%' or ";
$campos_tabela .= "religiao like '%$termo_pesquisa%' or ";
$campos_tabela .= "politica like '%$termo_pesquisa%' or ";
$campos_tabela .= "apelido like '%$termo_pesquisa%' or ";
$campos_tabela .= "citacao like '%$termo_pesquisa%' or ";
$campos_tabela .= "odeia like '%$termo_pesquisa%' or ";
$campos_tabela .= "cidade_natal like '%$termo_pesquisa%' or ";
$campos_tabela .= "livros like '%$termo_pesquisa%' or ";
$campos_tabela .= "cinema like '%$termo_pesquisa%' or ";
$campos_tabela .= "tv like '%$termo_pesquisa%' or ";
$campos_tabela .= "atividades like '%$termo_pesquisa%' or ";
$campos_tabela .= "jogos like '%$termo_pesquisa%'";

// monta query
$query[0] = "select *from $tabela_banco[30] where  $campos_tabela $limit_query;"; // query
$query[1] = "select *from $tabela_banco[30] where $campos_tabela;"; // query
break;


case 18:
// campos de pesquisa da tabela
$campos_tabela .= "data_nascimento like '%$termo_pesquisa%' or "; // campos da tabela
$campos_tabela .= "cidade like '%$termo_pesquisa%' or "; // campos da tabela
$campos_tabela .= "estado like '%$termo_pesquisa%' or "; // campos da tabela
$campos_tabela .= "sobre_usuario like '%$termo_pesquisa%' or "; // campos da tabela
$campos_tabela .= "sexo like '%$termo_pesquisa%' or "; // campos da tabela
$campos_tabela .= "estado_civil like '%$termo_pesquisa%' or "; // campos da tabela
$campos_tabela .= "telefone like '%$termo_pesquisa%' or "; // campos da tabela
$campos_tabela .= "site like '%$termo_pesquisa%' or "; // campos da tabela
$campos_tabela .= "tribo_urbana like '%$termo_pesquisa%'"; // campos da tabela

// monta query
$query[0] = "select *from $tabela_banco[3] where  $campos_tabela $limit_query;"; // query
$query[1] = "select *from $tabela_banco[3] where $campos_tabela;"; // query
break;


};

// --------------------------------------------


// comando --------------------------------------------

$comando = comando_executa($query[0]); // comando

// ---------------------------------------------------------


// numero de linhas ----------------------------------

$numero_linhas = retorne_numero_linhas_comando($comando); // numero de linhas

// ---------------------------------------------------------


// contador ---------------------------------------------

$contador = 0; // contador

// ---------------------------------------------------------


// obtendo ids de usuarios -------------------------

for($contador == $contador; $contador <= $numero_linhas; $contador++){


// dados ------------------------------------------------

$dados = mysql_fetch_array($comando, MYSQL_ASSOC); // dados

// ---------------------------------------------------------


// id de usuario ----------------------------------------

$arrays_idusuarios[] = $dados['idusuario']; // id de usuario

// ---------------------------------------------------------


};

// ---------------------------------------------------------


// total de resultados --------------------------------

$numero_resultados = retorne_numero_linhas_query($query[1]); // numero de linhas

// ---------------------------------------------------------


// informa numero de resultados -----------------

if($numero_resultados > 1){

$resultados_encontrados = "Encontrados $numero_resultados resultados"; // plural

}else{

$resultados_encontrados = "Encontrado $numero_resultados resultado"; // singular

};

// ---------------------------------------------------------


// codigo html bruto ----------------------------------

$codigo_html_bruto .= "<div class='classe_div_numero_resultados_pesquisa_geral'>";
$codigo_html_bruto .= $resultados_encontrados;
$codigo_html_bruto .= "</div>";
$codigo_html_bruto .= monta_pacotes_usuarios($arrays_idusuarios, 1);
$codigo_html_bruto .= monta_paginas_paginacao($numero_resultados);

// ---------------------------------------------------------


// retorno -----------------------------------------------

return $codigo_html_bruto; // retorno

// ---------------------------------------------------------


};

// --------------------------------------------------------


?>