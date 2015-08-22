<?php


// monta depoimento -------------------------------

function monta_depoimento($dados){


// separando dados ----------------------------------

$id = $dados['id']; // dados
$idusuario = $dados['idusuario']; // dados
$idamigo = $dados['idamigo']; // dados
$depoimento = $dados['depoimento']; // dados
$data = $dados['data']; // dados

// ---------------------------------------------------------


// adiciona quebra de linha --------------------------------

$depoimento = converte_linha_quebra_linha($depoimento, true); // adiciona quebra de linha

// ---------------------------------------------------------


// tipo de pagina --------------------------------------

$tipo_pagina = retorne_tipo_pagina(); // tipo de pagina

// ---------------------------------------------------------


// retorno nulo -----------------------------------------

if($id == null){

return null; // retorno nulo

};

// ---------------------------------------------------------


// gera hashtag ---------------------------------------

$depoimento = gera_link_hashtag($depoimento); // gera hashtag

// ---------------------------------------------------------


// tipo de depoimento --------------------------------

$tipo_depoimento = retorne_tipo_depoimento_get(); // tipo de depoimento

// ---------------------------------------------------------


// verifica o tipo de pagina --------------------------

if($tipo_pagina == 11){


// botao excluir aceitar depoimento ---------------

$botao_aceitar_excluir .= campo_aceita_depoimento($dados); // botao excluir aceitar depoimento
$botao_aceitar_excluir .= "<br>"; // botao excluir aceitar depoimento
$botao_aceitar_excluir .= "<br>"; // botao excluir aceitar depoimento

// ---------------------------------------------------------


// imagem recebe depoimento --------------------

$imagem_recebe_depoimento = constroe_imagem_perfil_depoimento($idusuario); // imagem recebe depoimento

// ---------------------------------------------------------


}else{


// nome do usuario que enviou depoimento
$nome_usuario = retorna_link_perfil_usuario($idamigo);


};

// ---------------------------------------------------------


// adiciona emoticon --------------------------------

$depoimento = converte_codigo_emoticon($depoimento); // adiciona emoticon

// --------------------------------------------------------


// codigo html bruto ----------------------------------

$codigo_html .= "<div class='classe_depoimento_usuario'>";
$codigo_html .= "<div class='classe_div_separa_imagem_depoimento'>";
$codigo_html .= constroe_imagem_perfil_depoimento($idamigo);
$codigo_html .= "&nbsp;";
$codigo_html .= $imagem_recebe_depoimento;
$codigo_html .= "</div>";
$codigo_html .= "<div class='classe_div_separa_texto_depoimento'>";
$codigo_html .= $nome_usuario;
$codigo_html .= "&nbsp;";
$codigo_html .= "-";
$codigo_html .= "&nbsp;";
$codigo_html .= $depoimento;
$codigo_html .= "<div class='classe_depoimento_usuario_data'>";
$codigo_html .= $botao_aceitar_excluir;
$codigo_html .= converte_data_amigavel($data);
$codigo_html .= "</div>";
$codigo_html .= "</div>";
$codigo_html .= "</div>";

// ---------------------------------------------------------


// retorno -----------------------------------------------

return $codigo_html; // retorno

// ---------------------------------------------------------


};

// --------------------------------------------------------


?>