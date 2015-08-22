<?php


// constroe perfil ultra basico de usuario -------

function constroe_perfil_ultra_basico_usuario($idusuario, $tipo_exibir){


// tipo exibir --------------------------------------------

// 1 exibe usuarios normal
// 2 exibe usuarios miniatura

// ---------------------------------------------------------


// valida usuario bloqueado ---------------------

if(retorne_esta_bloqueado($idusuario) == true){

return null;

};

// --------------------------------------------------------


// dados de usuario ---------------------------------

$dados_usuario = retorna_dados_usuario_array($idusuario); // dados de usuario

// --------------------------------------------------------


// nome de usuario ----------------------------------

$nome_usuario = retorna_link_perfil_usuario($idusuario); // nome de usuario

// --------------------------------------------------------


// cidade -----------------------------------------------

if($dados_usuario['cidade'] != null){

$cidade = "Mora em ".retorne_link_pesquisa_montado($dados_usuario['cidade'], 2); // cidade

};

// --------------------------------------------------------


// estado -----------------------------------------------

if($dados_usuario['estado'] != null){

$estado = " - ".retorne_link_pesquisa_montado($dados_usuario['estado'], 3); // estado

};

// --------------------------------------------------------


// sexo -------------------------------------------------

if($dados_usuario['sexo'] != null){

$sexo = "<br>Gênero: ".retorne_link_pesquisa_montado($dados_usuario['sexo'], 6); // sexo

};

// --------------------------------------------------------


// estado civil -----------------------------------------

if($dados_usuario['estado_civil'] != null){

$estado_civil = " - ".retorne_link_pesquisa_montado($dados_usuario['estado_civil'], 8); // estado civil

};

// --------------------------------------------------------


// sobre o usuario -----------------------------------

if($dados_usuario['sobre_usuario'] != null){

$sobre_usuario = "<br>".substr($dados_usuario['sobre_usuario'], 0, 125)."..."; // sobre o usuario

};

// --------------------------------------------------------


// campo adicionar amigo -------------------------

$campo_adicionar_amigo = constroe_adicionar_amigo($idusuario); // campo adicionar amigo

// --------------------------------------------------------


// verifica se campo e valido ----------------------

if($campo_adicionar_amigo == null){

$campo_adicionar_amigo = "<br>"; // adiciona quebra de linha

};

// --------------------------------------------------------


// tipo de perfil ---------------------------------------

switch($tipo_exibir){


case 1:

// tipo de classe ---------------------------------------------

$classe_perfil_ultra_basico = "div_perfil_ultra_basico_usuario"; // tipo de classe

// ----------------------------------------------------------------


// codigo html bruto -----------------------------------------

$conteudo_basico_perfil .= $campo_adicionar_amigo;
$conteudo_basico_perfil .= $cidade;
$conteudo_basico_perfil .= $estado;
$conteudo_basico_perfil .= $sexo;
$conteudo_basico_perfil .= $estado_civil;
$conteudo_basico_perfil .= "<br>";
$conteudo_basico_perfil .= $sobre_usuario;
$conteudo_basico_perfil .= "<br>";
$conteudo_basico_perfil .= "<br>";

// ----------------------------------------------------------------

break;


case 2:

// tipo de classe ---------------------------------------------

$classe_perfil_ultra_basico = "div_perfil_ultra_basico_miniatura_usuario"; // tipo de classe

// ----------------------------------------------------------------


break;


};

// --------------------------------------------------------


// codigo html bruto ---------------------------------

$codigo_html_bruto .= "<div class='$classe_perfil_ultra_basico'>";
$codigo_html_bruto .= constroe_imagem_perfil_miniatura($idusuario);
$codigo_html_bruto .= "<div class='div_nome_usuario_perfil_ultra_basico'>";
$codigo_html_bruto .= $nome_usuario;
$codigo_html_bruto .= "</div>";
$codigo_html_bruto .= $conteudo_basico_perfil;
$codigo_html_bruto .= retorne_campo_visitou_perfil($idusuario);
$codigo_html_bruto .= "</div>";

// --------------------------------------------------------


// gera hashtag --------------------------------------

$codigo_html_bruto = gera_link_hashtag($codigo_html_bruto); // gera hashtag

// --------------------------------------------------------


// retorno ----------------------------------------------

return $codigo_html_bruto; // retorno

// --------------------------------------------------------


};

// --------------------------------------------------------


?>