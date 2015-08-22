<?php


// constroe o perfil basico do usuario -------------------

function constroe_perfil_basico(){

// globals
global $imagem_servidor;


// id de usuario -----------------------------------------------

$idusuario = retorne_idusuario_visualizando_perfil(); // id de usuario

// -----------------------------------------------------------------


// status de amizade
$status_amizade = retorne_status_amizade($idusuario);


// dados em array de usuario -----------------------------

$dados_basicos_usuario = retorna_dados_usuario_array($idusuario); // dados em array de usuario
$dados_completos_usuario = retorna_dados_usuario_informacoes($idusuario); // dados completos do usuario

// ----------------------------------------------------------------


// separa variaveis -----------------------------------------

$trabalho = $dados_completos_usuario['trabalha_onde'];
$ensino_medio = $dados_completos_usuario['ensino_medio'];
$ensino_medio_ano = $dados_completos_usuario['ensino_medio_ano'];
$faculdade = $dados_completos_usuario['faculdade'];
$faculdade_ano = $dados_completos_usuario['faculdade_ano'];
$cidade_natal = $dados_completos_usuario['cidade_natal'];

// ----------------------------------------------------------------


// endereco url imagem de perfil ----------------------

$imagem_perfil = $dados_basicos_usuario['imagem_perfil']; // endereco url imagem de perfil

// ----------------------------------------------------------------


// cidade -----------------------------------------------

if($dados_basicos_usuario['cidade'] != null){

$cidade = retorne_link_pesquisa_montado($dados_basicos_usuario['cidade'], 2); // cidade

};

// --------------------------------------------------------


// estado -----------------------------------------------

if($dados_basicos_usuario['estado'] != null){

$estado = retorne_link_pesquisa_montado($dados_basicos_usuario['estado'], 3); // estado

};

// --------------------------------------------------------


// sexo -------------------------------------------------

if($dados_basicos_usuario['sexo'] != null){

$sexo .= "<img src='".$imagem_servidor['img_usuario']."' title='Gênero'>";
$sexo .= "&nbsp;";
$sexo .= "<b>Gênero</b>";
$sexo .= "&nbsp;";
$sexo .= retorne_link_pesquisa_montado($dados_basicos_usuario['sexo'], 6);
$sexo .= " - ";

};

// --------------------------------------------------------


// estado civil -----------------------------------------

if($dados_basicos_usuario['estado_civil'] != null){

$estado_civil .= retorne_link_pesquisa_montado($dados_basicos_usuario['estado_civil'], 8); // estado civil
$estado_civil .= " - ";

};

// --------------------------------------------------------


// sobre o usuario -----------------------------------

if($dados_basicos_usuario['sobre_usuario'] != null){


if(strlen($sobre_usuario) >= 128){


$sobre_usuario = substr($dados_basicos_usuario['sobre_usuario'], 0, 128)."..."; // sobre o usuario
$sobre_usuario = converte_linha_quebra_linha($sobre_usuario, false);


}else{


$sobre_usuario = $dados_basicos_usuario['sobre_usuario']; // sobre o usuario


};


// adiciona quebra de linha
$sobre_usuario = "<br><br>".$sobre_usuario."<br><br>";


};

// --------------------------------------------------------


// nome de usuario -------------------------------------

$nome_usuario = func_retorna_nome_de_usuario_por_id($idusuario); // nome de usuario

// ------------------------------------------------------------


// calcula a idade do usuario -----------------------

$idade_usuario = calcula_idade($dados_basicos_usuario['data_nascimento']);

// ------------------------------------------------------------


// adiciona complemento em idade -------------

if($idade_usuario != null){

$idade_usuario = $idade_usuario;
$idade_usuario .= "&nbsp;";
$idade_usuario .= "anos";
$idade_usuario .= "<br>";

};

// -------------------------------------------------------------


// valida trabalho ---------------------------------------

if($trabalho != null){

// campo trabalha
$campo_trabalha .= "<img src='".$imagem_servidor['img_trabalho']."' title='Trabalha'>";
$campo_trabalha .= "&nbsp;";
$campo_trabalha .= "<b>Trabalha em</b>";
$campo_trabalha .= "&nbsp;";
$campo_trabalha .= retorne_link_pesquisa_montado($trabalho, 17);
$campo_trabalha .= "<br>";

}else{

$campo_trabalha .= "<br>";

};

// -------------------------------------------------------------


// campo escolaridade --------------------------------

if($ensino_medio != null or $faculdade != null){

$campo_escolaridade .= "<img src='".$imagem_servidor['img_estuda']."' title='Escolaridade'>";
$campo_escolaridade .= "&nbsp;";
$campo_escolaridade .= "<b>Escolaridade</b>";
$campo_escolaridade .= "&nbsp;";

};

// -------------------------------------------------------------


// valida escolaridade ---------------------------------

if($ensino_medio != null){

// campo escolaridade
$campo_escolaridade .= retorne_link_pesquisa_montado($ensino_medio, 17);

// ano ensino medio
if($ensino_medio_ano != null){

$campo_escolaridade .= " ano ";
$campo_escolaridade .= $ensino_medio_ano;

};

};


// faculdade
if($faculdade != null){

// campo escolaridade
$campo_escolaridade .= " - ";
$campo_escolaridade .= retorne_link_pesquisa_montado($faculdade, 17);

// faculdade ano
if($faculdade_ano != null){

$campo_escolaridade .= " ano ";
$campo_escolaridade .= $faculdade_ano;

};


};

// -------------------------------------------------------------


// valida cidade natal
if($cidade_natal != null){

// campo naturalidade
$campo_naturalidade .= "<br>";
$campo_naturalidade .= "<img src='".$imagem_servidor['img_cidade']."' title='Nascido em'>";
$campo_naturalidade .= "&nbsp;";
$campo_naturalidade .= "<b>Nascido em</b>";
$campo_naturalidade .= "&nbsp;";
$campo_naturalidade .= retorne_link_pesquisa_montado($cidade_natal, 17);
$campo_naturalidade .= "<br>";

};


// campo mora
if($cidade != null){

// campo mora
$campo_mora .= "<img src='".$imagem_servidor['img_mora']."' title='Mora'>";
$campo_mora .= "&nbsp;";
$campo_mora .= "<b>Mora</b>";
$campo_mora .= "&nbsp;";
$campo_mora .= $cidade;

// valida estado
if($estado != null){

$campo_mora .= " - ";
$campo_mora .= $estado;

};

};


// campo basico
$campo_basico .= "<br>";
$campo_basico .= "<br>";
$campo_basico .= $sexo;
$campo_basico .= $estado_civil;
$campo_basico .= $idade_usuario;
$campo_basico .= $campo_mora;
$campo_basico .= $campo_naturalidade;
$campo_basico .= $campo_trabalha;
$campo_basico .= $campo_escolaridade;
$campo_basico .= "<b>";
$campo_basico .= $sobre_usuario;
$campo_basico .= "</b>";
$campo_basico .= constroe_campo_social_usuario($idusuario);


// campo enviar mensagem
if($status_amizade == 2){


// imagem de mensagem
$imagem_mensagem = "<img src='".$imagem_servidor['mensagem']."'>";


// campo enviar mensagem
$campo_enviar_mensagem .= "<br>";
$campo_enviar_mensagem .= "<a href='#' class='uibutton large' onclick='constroe_campo_conversa_chat($idusuario);'>$imagem_mensagem Enviar mensagem</a>";
$campo_enviar_mensagem .= "<br>";
$campo_enviar_mensagem .= "<br>";


};


// codigo html bruto ------------------------------------

$codigo_html_bruto .= "<div class='classe_div_campos_constroe_campo_editar_perfil'>";
$codigo_html_bruto .= constroe_funcoes_perfil_usuario();
$codigo_html_bruto .= constroe_imagem_perfil($idusuario);
$codigo_html_bruto .= "<div class='div_perfil_basico_topo_pagina'>";
$codigo_html_bruto .= constroe_adicionar_amigo($idusuario);
$codigo_html_bruto .= "<span>$nome_usuario</span>";
$codigo_html_bruto .= "<br>";
$codigo_html_bruto .= $campo_enviar_mensagem;
$codigo_html_bruto .= "<a href='$url_pagina_inicial_site?idusuario=$idusuario&tipo_pagina=3' title='Sobre'>Sobre</a>";
$codigo_html_bruto .= $campo_basico;
$codigo_html_bruto .= "</div>";
$codigo_html_bruto .= abas_navegacao_perfil_usuario();
$codigo_html_bruto .= "</div>";

// ---------------------------------------------------------------


// retorno ----------------------------------------------------

return $codigo_html_bruto; // retorno

// --------------------------------------------------------------


};

// -------------------------------------------------------------


?>