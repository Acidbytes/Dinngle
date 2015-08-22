<?php


// sugerir amizades ----------------------------------

function sugerir_amizades(){


// globals -----------------------------------------------

global $tabela_banco; // tabelas do banco de dados

// ---------------------------------------------------------


// usuario dono do perfil -----------------------------

$usuario_dono_perfil = retorna_usuario_vendo_perfil_dono(); // usuario dono do perfil

// ---------------------------------------------------------


// verifica se e dono do perfil ----------------------

if($usuario_dono_perfil == false){

return null; // retorno nulo

};

// ---------------------------------------------------------


// tabela de cadastro ---------------------------------

$tabela[0] = $tabela_banco[3]; // tabela de informacoes

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


// query -------------------------------------------------

$query[0] = "select *from $tabela[0] where cidade like '%$cidade%' and estado like '%$estado%' $limit_query;"; // query

// ---------------------------------------------------------


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


// id de amigo -----------------------------------------

$idusuario = $dados['idusuario']; // id de amigo

// ---------------------------------------------------------


// estatus de amizade -------------------------------

$estatus_amizade = retorne_status_amizade($idusuario); // estatus de amizade

// ---------------------------------------------------------


// id de usuario ----------------------------------------

if($idusuario != null and $estatus_amizade == 1 and $idusuario_logado != $idusuario and retorne_esta_bloqueado($idusuario) == false){

$arrays_idusuarios[] = $idusuario; // id de usuario

};

// ---------------------------------------------------------


};

// ---------------------------------------------------------


// url de pesquisa ------------------------------------

$url_pesquisa = retorne_url_pesquisa_geral(null, 7); // url de pesquisa

// ---------------------------------------------------------


// codigo html bruto ----------------------------------
$codigo_html_bruto .= "<a href='$url_pesquisa'>Encontre mais pessoas...</a>";
$codigo_html_bruto .= monta_pacotes_usuarios($arrays_idusuarios, 1);

// ---------------------------------------------------------


// adiciona div especial ----------------------------

$codigo_html_bruto = constroe_div_especial_geral("Próximos a você", $codigo_html_bruto, null); // adiciona div especial

// ---------------------------------------------------------


// retorno -----------------------------------------------

return $codigo_html_bruto; // retorno

// ---------------------------------------------------------


};

// --------------------------------------------------------


?>