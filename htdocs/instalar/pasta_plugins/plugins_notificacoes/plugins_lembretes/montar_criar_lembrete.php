<?php


// montar criar lembrete ---------------------------

function montar_criar_lembrete(){


// globals ----------------------------------------------

global $enderecos_arquivos_php_uteis; // arquivos php uteis

// --------------------------------------------------------


// url de script ----------------------------------------

$url_script = $enderecos_arquivos_php_uteis['salvar_lembrete']; // url de script

// --------------------------------------------------------


// dados de lembrete -------------------------------

$dados = dados_lembrete(); // dados de lembrete

// --------------------------------------------------------


// separando dados ---------------------------------

$lembrete = $dados['lembrete']; // dados
$data_lembrete = $dados['data_lembrete']; // dados

// --------------------------------------------------------


// codigo html bruto ---------------------------------

$codigo_html .= "<div class='div_cria_lembrete'>";
$codigo_html .= "<form action='$url_script' method='post'>";
$codigo_html .= "<div class='classe_div_separa_desc_campo_formulario'>";
$codigo_html .= "Me lembre de";
$codigo_html .= ":";
$codigo_html .= "</div>";
$codigo_html .= "<textarea name='lembrete' cols='40' rows='5' placeholder='Escreva seu lembrete aqui.' class='classe_textarea_lembrete'>$lembrete</textarea>";
$codigo_html .= "<br>";
$codigo_html .= "<br>";
$codigo_html .= "<div class='classe_div_separa_desc_campo_formulario'>";
$codigo_html .= "Data do lembrete";
$codigo_html .= ":";
$codigo_html .= "</div>";
$codigo_html .= campo_data_formulario_lembrete_evento($data_lembrete, "data_lembrete");
$codigo_html .= "<br>";
$codigo_html .= "<div class='classe_div_campo_salvar_editar_perfil'>";
$codigo_html .= "<input type='submit' value='Salvar' class='botao_padrao'>";
$codigo_html .= "</div>";
$codigo_html .= "</form>";
$codigo_html .= "</div>";

// --------------------------------------------------------


// adiciona div especial -----------------------------

$codigo_html = constroe_div_especial_geral("Lembrete", $codigo_html, null); // adiciona div especial

// --------------------------------------------------------


// retorno ----------------------------------------------

return $codigo_html; // retorno

// --------------------------------------------------------


};

// --------------------------------------------------------


?>