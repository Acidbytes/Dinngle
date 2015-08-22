<?php


// formulario para editar perfil --------------------

function formulario_editar_perfil($idusuario){


// globals ---------------------------------------------

global $enderecos_arquivos_php_uteis; // script para salvar perfil

// -------------------------------------------------------


// dados de usuario --------------------------------

$dados_usuario = retorna_dados_usuario_array($idusuario); // dados de usuario

// --------------------------------------------------------


// dados de usuario ---------------------------------

$nome_usuario = func_retorna_nome_de_usuario_por_id($idusuario); // nome do usuario
$data_nascimento = $dados_usuario['data_nascimento']; // dados de usuario
$estado = $dados_usuario['estado']; // dados de usuario
$sobre_usuario = $dados_usuario['sobre_usuario']; // dados de usuario
$sexo = $dados_usuario['sexo']; // dados de usuario
$estado_civil = $dados_usuario['estado_civil']; // dados de usuario
$cidade = $dados_usuario['cidade']; // dados de usuario
$telefone = $dados_usuario['telefone']; // dados de usuario
$site = $dados_usuario['site']; // dados de usuario
$tribo_urbana = $dados_usuario['tribo_urbana']; // dados de usuario

// --------------------------------------------------------



// remove quebra de linhas --------------------------------

$sobre_usuario = converte_linha_quebra_linha($sobre_usuario, false); // remove quebra de linhas

// --------------------------------------------------------


// select estados do pais --------------------------

$select_estados = gerador_select_option(retorne_array_estados_pais(), $estado, "estado"); // select estados do pais

// --------------------------------------------------------


// estados civis ---------------------------------------

$select_estados_civis = gerador_select_option(retorne_array_estados_civis(), $estado_civil, "estado_civil"); // estados civis

// --------------------------------------------------------


// sexo do usuario -----------------------------------

$select_sexo = gerador_select_option(retorne_array_sexo(), $sexo, "sexo"); // sexo do usuario

// --------------------------------------------------------


// url para script salvar perfil ----------------------

$url_script_salvar_perfil = $enderecos_arquivos_php_uteis['salvar_perfil_basico']; // url para script salvar perfil

// --------------------------------------------------------


// codigo html bruto ---------------------------------

$codigo_html .= "<div class='classe_formulario_editar_perfil'>";
$codigo_html .= "<form action='$url_script_salvar_perfil' method='post'>";
$codigo_html .= "<div class='classe_div_separa_desc_campo_formulario'>";
$codigo_html .= "Nome";
$codigo_html .= ":";
$codigo_html .= "</div>";
$codigo_html .= "<input type='text' name='nome' value='$nome_usuario'>";
$codigo_html .= "<br>";
$codigo_html .= "<div class='classe_div_separa_desc_campo_formulario'>";
$codigo_html .= "Aniversário";
$codigo_html .= ":";
$codigo_html .= "</div>";
$codigo_html .= campo_data_formulario($data_nascimento, "data_nascimento"); // codigo html
$codigo_html .= "<br>";
$codigo_html .= "<div class='classe_div_separa_desc_campo_formulario'>";
$codigo_html .= "Estado cívil";
$codigo_html .= ":";
$codigo_html .= "</div>";
$codigo_html .= $select_estados_civis;
$codigo_html .= "<br>";
$codigo_html .= "<div class='classe_div_separa_desc_campo_formulario'>";
$codigo_html .= "Sexo";
$codigo_html .= ":";
$codigo_html .= "</div>";
$codigo_html .= $select_sexo;
$codigo_html .= "<br>";
$codigo_html .= "<div class='classe_div_separa_desc_campo_formulario'>";
$codigo_html .= "Cidade";
$codigo_html .= ":";
$codigo_html .= "</div>";
$codigo_html .= "<input type='text' value='$cidade' name='cidade'>";
$codigo_html .= "<br>";
$codigo_html .= "<div class='classe_div_separa_desc_campo_formulario'>";
$codigo_html .= "Estado";
$codigo_html .= ":";
$codigo_html .= "</div>";
$codigo_html .= $select_estados;
$codigo_html .= "<br>";
$codigo_html .= "<div class='classe_div_separa_desc_campo_formulario'>";
$codigo_html .= "Telefone";
$codigo_html .= ":";
$codigo_html .= "</div>";
$codigo_html .= "<input type='text' value='$telefone' name='telefone'>";
$codigo_html .= "<br>";
$codigo_html .= "<div class='classe_div_separa_desc_campo_formulario'>";
$codigo_html .= "Meu site";
$codigo_html .= ":";
$codigo_html .= "</div>";
$codigo_html .= "<input type='text' value='$site' name='site'>";
$codigo_html .= "<br>";
$codigo_html .= "<div class='classe_div_separa_desc_campo_formulario'>";
$codigo_html .= "Estilo músical";
$codigo_html .= ":";
$codigo_html .= "</div>";
$codigo_html .= "<input type='text' value='$tribo_urbana' name='tribo_urbana'>";
$codigo_html .= "<br>";
$codigo_html .= "<div class='classe_div_separa_desc_campo_formulario'>";
$codigo_html .= "Escreva sobre você";
$codigo_html .= ":";
$codigo_html .= "</div>";
$codigo_html .= "<textarea name='sobre_usuario' cols='10' rows='10'>$sobre_usuario</textarea>";
$codigo_html .= "<br>";
$codigo_html .= "<div class='classe_div_campo_salvar_editar_perfil'>";
$codigo_html .= "<input type='submit' value='Salvar' class='botao_padrao'>";
$codigo_html .= "</div>";
$codigo_html .= "</form>";
$codigo_html .= "</div>";

// --------------------------------------------------------


// titulo -------------------------------------------------

$titulo = "Meu perfíl básico"; // titulo

// --------------------------------------------------------


// adiciona div especial ----------------------------

$codigo_html = constroe_div_especial_geral($titulo, $codigo_html, null); // adiciona div especial

// --------------------------------------------------------


// retorno ----------------------------------------------

return $codigo_html; // retorno

// --------------------------------------------------------


};

// --------------------------------------------------------


?>