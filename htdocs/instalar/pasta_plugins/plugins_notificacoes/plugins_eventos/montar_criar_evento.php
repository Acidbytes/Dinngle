<?php


// montar criar evento ------------------------------

function montar_criar_evento(){


// globals ----------------------------------------------

global $enderecos_arquivos_php_uteis; // arquivos php uteis

// --------------------------------------------------------


// url de script ----------------------------------------

$url_script = $enderecos_arquivos_php_uteis['salvar_evento']; // url de script

// --------------------------------------------------------


// dados de evento -------------------------------

$dados = dados_evento(); // dados de evento

// --------------------------------------------------------


// separando dados ---------------------------------

$evento = $dados['evento']; // dados

$data_evento = $dados['data_evento']; // dados

// --------------------------------------------------------


// codigo html bruto ---------------------------------

$codigo_html .= "<div class='div_cria_evento'>";
$codigo_html .= "<form action='$url_script' method='post'>";
$codigo_html .= "<div class='classe_div_separa_desc_campo_formulario'>";
$codigo_html .= "Criar um evento";
$codigo_html .= ":";
$codigo_html .= "</div>";
$codigo_html .= "<textarea name='evento' cols='40' rows='5' placeholder='Escreva seu evento aqui.' class='classe_textarea_evento'>$evento</textarea>";
$codigo_html .= "<br>";
$codigo_html .= "<br>";
$codigo_html .= "<div class='classe_div_separa_desc_campo_formulario'>";
$codigo_html .= "Data do evento";
$codigo_html .= ":";
$codigo_html .= "</div>";
$codigo_html .= campo_data_formulario_lembrete_evento($data_evento, "data_evento");
$codigo_html .= "<br>";
$codigo_html .= "<div class='classe_div_campo_salvar_editar_perfil'>";
$codigo_html .= "<input type='submit' value='Salvar' class='botao_padrao'>";
$codigo_html .= "</div>";
$codigo_html .= "</form>";
$codigo_html .= "</div>";

// ---------------------------------------------------------


// adiciona div especial ---------------------------

$codigo_html = constroe_div_especial_geral("Evento", $codigo_html, null); // adiciona div especial

// ---------------------------------------------------------


// adiciona div especial basica -------------------

$codigo_html .= "<div class='classe_div_eventos_usuarios'>";
$codigo_html .= carregar_todos_eventos_usuario();
$codigo_html .= "</div>";

// --------------------------------------------------------


// retorno ----------------------------------------------

return $codigo_html; // retorno

// --------------------------------------------------------


};

// --------------------------------------------------------


?>