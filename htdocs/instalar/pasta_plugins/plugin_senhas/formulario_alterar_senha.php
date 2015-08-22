<?php


// formulario alterar senha -------------------------

function formulario_alterar_senha(){


// globals ------------------------------------------------

global $enderecos_arquivos_php_uteis; // scripts php uteis

global $tamanho_minimo_senha; // tamanho minimo para uma senha

// ----------------------------------------------------------


// endereco script alterar senha -------------------

$endereco_script = $enderecos_arquivos_php_uteis['atualizar_senha']; // endereco script alterar senha

// ---------------------------------------------------------


// codigo html bruto ----------------------------------

$codigo_html .= "<div class='classe_formulario_editar_perfil'>";
$codigo_html .= "<form action='$endereco_script' method='post'>";
$codigo_html .= "Para alterar a sua senha, informe a <b>senha atual</b>";
$codigo_html .= ", em seguida informe a <b>nova senha</b>.";
$codigo_html .= "<br>";
$codigo_html .= "A nova senha deve ter pelo menos <b>$tamanho_minimo_senha caracteres</b>.";
$codigo_html .= "<br>";
$codigo_html .= "<br>";
$codigo_html .= "<div class='classe_div_separa_desc_campo_formulario'>";
$codigo_html .= "Senha atual";
$codigo_html .= ":";
$codigo_html .= "</div>";
$codigo_html .= "<input type='password' name='senha_1'>";
$codigo_html .= "<br>";
$codigo_html .= "<div class='classe_div_separa_desc_campo_formulario'>";
$codigo_html .= "Nova senha";
$codigo_html .= ":";
$codigo_html .= "</div>";
$codigo_html .= "<input type='password' name='senha_2'>";
$codigo_html .= "<br>";
$codigo_html .= "<div class='classe_div_separa_desc_campo_formulario'>";
$codigo_html .= "Confirme nova senha";
$codigo_html .= ":";
$codigo_html .= "</div>";
$codigo_html .= "<input type='password' name='senha_3'>";
$codigo_html .= "<br>";
$codigo_html .= "<div class='classe_div_campo_salvar_editar_perfil'>";
$codigo_html .= "<input type='submit' class='botao_padrao' value='Alterar senha'>";
$codigo_html .= "</div>";
$codigo_html .= "</form>";
$codigo_html .= "</div>";

// --------------------------------------------------------


// titulo -------------------------------------------------

$titulo = "Alterar senha"; // titulo

// --------------------------------------------------------


// adiciona div especial ----------------------------

$codigo_html = constroe_div_especial_geral($titulo, $codigo_html, null); // adiciona div especial

// --------------------------------------------------------


// retorno -----------------------------------------------

return $codigo_html; // retorno

// ---------------------------------------------------------

};

// --------------------------------------------------------


?>