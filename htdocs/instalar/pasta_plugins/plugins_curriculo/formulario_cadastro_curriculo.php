<?php


// formulario de cadastro de curriculo ----------

function formulario_cadastro_curriculo(){


// globals ----------------------------------------------

global $enderecos_arquivos_php_uteis; // arquivos php uteis

global $url_pagina_inicial_site; // url de pagina inicial

// --------------------------------------------------------


// usuario dono do perfil ---------------------------

$usuario_dono_perfil = retorna_usuario_vendo_perfil_dono(); // usuario dono do perfil

// --------------------------------------------------------


// so exibe o formulario para o dono ------------

if($usuario_dono_perfil == false){


pagina_index_usuario(); // redireciona

die; // abandona script


};

// --------------------------------------------------------


// dados -----------------------------------------------

$dados = retorne_dados_array_curriculo(); // dados

// --------------------------------------------------------


// separando dados ---------------------------------

$profissao = $dados['profissao']; // dados
$objetivo = $dados['objetivo']; // dados
$empresas_trabalhou = $dados['empresas_trabalhou']; // dados
$formacao = $dados['formacao']; // dados
$experiencia = $dados['experiencia']; // dados
$idiomas = $dados['idiomas']; // dados
$email = $dados['email']; // dados
$telefone = $dados['telefone']; // dados
$endereco = $dados['endereco']; // dados
$adicionais = $dados['adicionais']; // dados
$projetos = $dados['projetos']; // dados
$empregado = $dados['empregado']; // dados

// --------------------------------------------------------


// codigo html bruto ---------------------------------

$codigo_html .= "Separe mais de uma informação sempre com vírgula.";
$codigo_html .= "<br>";
$codigo_html .= "Empresa(s) que trabalhei: <b>Microsoft, Yahoo! etc</b>";
$codigo_html .= "<br>";
$codigo_html .= "<br>";

// --------------------------------------------------------


// campo select --------------------------------------

$select[] = "sim"; // campo select
$select[] = "não"; // campo select

// --------------------------------------------------------


// select empregado --------------------------------

$select_empregado = gerador_select_option($select, $empregado, "empregado"); // select empregado

// --------------------------------------------------------


// campos ---------------------------------------------



$campos['adicionais'] = "<br>Adicionais<br>"; // campos

// --------------------------------------------------------


// script salva curriculo ----------------------------

$script_salvar = $enderecos_arquivos_php_uteis['salvar_curriculo']; // script salva curriculo

// --------------------------------------------------------


// formulario
$codigo_html .= "<div class='classe_formulario_editar_perfil'>";
$codigo_html .= "<form action='$script_salvar' method='post'>";
$codigo_html .= "<div class='classe_div_separa_desc_campo_formulario'>";
$codigo_html .= "Profissão";
$codigo_html .= ":";
$codigo_html .= "</div>";
$codigo_html .= "<input type='text' value='$profissao' name='profissao'>";
$codigo_html .= "<br>";
$codigo_html .= "<div class='classe_div_separa_desc_campo_formulario'>";
$codigo_html .= "Objetivo";
$codigo_html .= ":";
$codigo_html .= "</div>";
$codigo_html .= "<textarea name='objetivo' cols='10' rows='3'>$objetivo</textarea>";
$codigo_html .= "<br>";
$codigo_html .= "<div class='classe_div_separa_desc_campo_formulario'>";
$codigo_html .= "Onde já trabalhei";
$codigo_html .= ":";
$codigo_html .= "</div>";
$codigo_html .= "<input type='text' value='$empresas_trabalhou' name='empresas_trabalhou'>";
$codigo_html .= "<br>";
$codigo_html .= "<div class='classe_div_separa_desc_campo_formulario'>";
$codigo_html .= "Formação";
$codigo_html .= ":";
$codigo_html .= "</div>";
$codigo_html .= "<input type='text' value='$formacao' name='formacao'>";
$codigo_html .= "<br>";
$codigo_html .= "<div class='classe_div_separa_desc_campo_formulario'>";
$codigo_html .= "Experiência";
$codigo_html .= ":";
$codigo_html .= "</div>";
$codigo_html .= "<input type='text' value='$experiencia' name='experiencia'>";
$codigo_html .= "<br>";
$codigo_html .= "<div class='classe_div_separa_desc_campo_formulario'>";
$codigo_html .= "Idiomas";
$codigo_html .= ":";
$codigo_html .= "</div>";
$codigo_html .= "<input type='text' value='$idiomas' name='idiomas'>";
$codigo_html .= "<br>";
$codigo_html .= "<div class='classe_div_separa_desc_campo_formulario'>";
$codigo_html .= "E-mail de contato";
$codigo_html .= ":";
$codigo_html .= "</div>";
$codigo_html .= "<input type='text' value='$email' name='email'>";
$codigo_html .= "<br>";
$codigo_html .= "<div class='classe_div_separa_desc_campo_formulario'>";
$codigo_html .= "Telefone de contato";
$codigo_html .= ":";
$codigo_html .= "</div>";
$codigo_html .= "<input type='text' value='$telefone' name='telefone'>";
$codigo_html .= "<br>";
$codigo_html .= "<div class='classe_div_separa_desc_campo_formulario'>";
$codigo_html .= "Endereço";
$codigo_html .= ":";
$codigo_html .= "</div>";
$codigo_html .= "<input type='text' value='$endereco' name='endereco'>";
$codigo_html .= "<br>";
$codigo_html .= "<div class='classe_div_separa_desc_campo_formulario'>";
$codigo_html .= "Projetos que estou";
$codigo_html .= ":";
$codigo_html .= "</div>";
$codigo_html .= "<textarea name='projetos' cols='10' rows='5'>$projetos</textarea>";
$codigo_html .= "<br>";
$codigo_html .= "<div class='classe_div_separa_desc_campo_formulario'>";
$codigo_html .= "Estou empregado";
$codigo_html .= ":";
$codigo_html .= "</div>";
$codigo_html .= $select_empregado;
$codigo_html .= "<br>";
$codigo_html .= "<div class='classe_div_separa_desc_campo_formulario'>";
$codigo_html .= "Adicionais";
$codigo_html .= ":";
$codigo_html .= "</div>";
$codigo_html .= "<textarea name='adicionais' cols='10' rows='10'>$adicionais</textarea>";
$codigo_html .= "<br>";
$codigo_html .= "<div class='classe_div_campo_salvar_editar_perfil'>";
$codigo_html .= "<input type='submit' value='Salvar' class='botao_padrao'>";
$codigo_html .= "&nbsp;";
$codigo_html .= "&nbsp;";
$codigo_html .= "<a href='$url_pagina_inicial_site?tipo_pagina=7&editar_perfil_modo=3' title='Visualizar' target='_blank'>Visualizar</a>";
$codigo_html .= "</div>";
$codigo_html .= "</form>";
$codigo_html .= "</div>";


// titulo -------------------------------------------------

$titulo = "Profissional"; // titulo

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