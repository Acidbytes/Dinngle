<?php


// constroe campo social de usuario -----------

function constroe_campo_social_usuario($idusuario){


// globals ---------------------------------------------

global $imagem_servidor; // imagens de servidor

// -------------------------------------------------------


// dados de formulario -----------------------------

$tipo_social = remove_html($_POST['tipo_social']); // tipo social

// --------------------------------------------------------


// dados -----------------------------------------------

$dados = retorne_dados_social_usuario($idusuario, null, 1); // dados

// --------------------------------------------------------


// separa dados -------------------------------------

$legal = retorne_tamanho_resultado($dados['legal']); // dados
$inteligente = retorne_tamanho_resultado($dados['inteligente']); // dados
$bonito = retorne_tamanho_resultado($dados['bonito']); // dados

// -------------------------------------------------------


// imagens -------------------------------------------

$imagem[0] = "<img src='".$imagem_servidor['legal']."' title='Legal'>";
$imagem[1] = "<img src='".$imagem_servidor['inteligente']."' title='Inteligente'>";
$imagem[2] = "<img src='".$imagem_servidor['bonito']."' title='Bonito'>";

// -------------------------------------------------------


// campos social -----------------------------------

$campos_social .= "<button class='uibutton' title='Legal' onclick='atualizar_social_usuario($idusuario, 1);'>$imagem[0]<br>$legal</button>"; // campos social
$campos_social .= "<button class='uibutton' title='Inteligente' onclick='atualizar_social_usuario($idusuario, 2);'>$imagem[1]<br>$inteligente</button>"; // campos social
$campos_social .= "<button class='uibutton' title='Bonito' onclick='atualizar_social_usuario($idusuario, 3);'>$imagem[2]<br>$bonito</button>"; // campos social

// -------------------------------------------------------


// codigo html bruto --------------------------------

if($tipo_social == null){


// codigo html bruto --------------------------------

$codigo_html_bruto .= "<div id='div_campo_social_usuario_exibir'>";
$codigo_html_bruto .= "<div class='div_botoes_campos_social'>";
$codigo_html_bruto .= $campos_social;
$codigo_html_bruto .= "</div>";
$codigo_html_bruto .= "</div>";
$codigo_html_bruto .= "<br>";
$codigo_html_bruto .= constroe_campo_sentimento_usuario();

// ---------------------------------------------------


}else{


// codigo html bruto ---------------------------------

$codigo_html_bruto .= "<div class='div_botoes_campos_social'>";
$codigo_html_bruto .= $campos_social;
$codigo_html_bruto .= "</div>";

// ---------------------------------------------------


};

// --------------------------------------------------------


// retorno ----------------------------------------------

return $codigo_html_bruto; // retorno

// --------------------------------------------------------


};

// --------------------------------------------------------


?>