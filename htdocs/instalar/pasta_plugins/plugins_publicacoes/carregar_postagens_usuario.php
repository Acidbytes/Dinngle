<?php


// carrega as postagens do usuario --------------

function carregar_postagens_usuario(){


// globals ----------------------------------------------

global $tabela_banco; // tabela de banco de dados

// --------------------------------------------------------


// id usuario visualizando perfil ------------------

$idusuario = retorne_idusuario_visualizando_perfil(); // id usuario visualizando perfil

// --------------------------------------------------------


// usuario dono do perfil ---------------------------

$usuario_dono_perfil = retorna_usuario_vendo_perfil_dono(); // usuario dono do perfil

// --------------------------------------------------------


// limit de tabela -------------------------------------

$limit_tabela = retorne_limit_tabela_get(); // limit de tabela

// --------------------------------------------------------


// query ------------------------------------------------

$query = "select *from $tabela_banco[9] where idusuario='$idusuario' $limit_tabela;"; // query

// --------------------------------------------------------


// comando -------------------------------------------

$comando = comando_executa($query); // comando

// --------------------------------------------------------


// numero de postagens de usuario -------------

$numero_postagens_usuario = retorne_numero_linhas_comando($comando); // numero de postagens de usuario

// --------------------------------------------------------


// numero com todas as postagens do usuario

$numero_todas_postagens_usuario = retorne_numero_postagens_usuario(); // numero com todas as postagens do usuario

// --------------------------------------------------------


// codigo html bruto ---------------------------------

if($numero_todas_postagens_usuario > 0){


// codigo html bruto ----------------------------------------

$codigo_html_bruto .= monta_pacote_postagem($comando);

// ----------------------------------------------------------------


}else{


// nome do usuario -----------------------------------------

$nome_usuario = retorna_link_perfil_usuario($idusuario); // nome do usuario

// ---------------------------------------------------------------


// codigo html bruto ----------------------------------------

if($usuario_dono_perfil == true){

$codigo_html_bruto .= $nome_usuario;
$codigo_html_bruto .= ", você ainda não publicou nada em sua linha do tempo, esperamos que em breve $nome_usuario publique algo.";
$codigo_html_bruto .= "<br>";
$codigo_html_bruto .= "<br>";
$codigo_html_bruto .= ";-( poxa! que pena viu! é rapidinho.";

}else{

$codigo_html_bruto .= $nome_usuario;
$codigo_html_bruto .= ", ainda não publicou nada em sua linha do tempo, esperamos que em breve $nome_usuario publique algo.";
$codigo_html_bruto .= "<br>";
$codigo_html_bruto .= "<br>";
$codigo_html_bruto .= ";-( poxa! que pena viu!";

};

// ----------------------------------------------------------------


// titulo de mensagem --------------------------------------

$titulo_mensagem = "Não há nada ainda ;-("; // titulo de mensagem

// ----------------------------------------------------------------


// aplica div especial ---------------------------------------

$codigo_html_bruto = constroe_div_especial_geral($titulo_mensagem, $codigo_html_bruto, null); // aplica div especial

// ----------------------------------------------------------------


};

// --------------------------------------------------------


// retorno ----------------------------------------------

return $codigo_html_bruto; // retorno

// --------------------------------------------------------


};

// --------------------------------------------------------


?>