<?php


// campo opcoes imagem ajuda -----------------

function campo_opcoes_imagem_ajuda($dados, $topico_id){


// globals ---------------------------------------------

global $enderecos_arquivos_php_uteis; // arquivos php uteis

// -------------------------------------------------------


// separando dados --------------------------------

$id = $dados['id']; // dados de tabela
$url_imagem = $dados['url_imagem']; // dados de tabela
$idalbum_imagens = $dados['idalbum_imagens']; // dados de tabela
$descricao_imagem = $dados['descricao_imagem']; // dados de tabela

// -------------------------------------------------------


// url de script salvar -------------------------------

$url_script_salvar = $enderecos_arquivos_php_uteis['atualizar_conteudo_ajuda']; // url de script salvar

// -------------------------------------------------------


// super usuario ------------------------------------

$super_usuario = retorne_super_usuario(); // super usuario

// -------------------------------------------------------


// campo excluir imagem -------------------------

$campo_excluir_imagem .= "<input type='checkbox' name='excluir_imagem' value='1'>"; // campo excluir imagem
$campo_excluir_imagem .= "&nbsp;"; // campo excluir imagem
$campo_excluir_imagem .= "Excluir esta imagem"; // campo excluir imagem

// -------------------------------------------------------


// adiciona div especial ---------------------------

$campo_excluir_imagem = div_especial_mensagem_sistema("Excluir imagem", $campo_excluir_imagem); // adiciona div especial

// -------------------------------------------------------


// codigo html bruto --------------------------------

if($super_usuario == true){

$codigo_html_bruto .= "<div class='classe_div_opcoes_imagem_ajuda'>"; // codigo html bruto
$codigo_html_bruto .= "<form action='$url_script_salvar' method='post' enctype='multipart/form-data'>"; // codigo html bruto
$codigo_html_bruto .= "<textarea cols='25' rows='3' placeholder='Descrição da imagem' name='descricao_imagem'>$descricao_imagem</textarea>"; // codigo html bruto
$codigo_html_bruto .= "<br>"; // codigo html bruto
$codigo_html_bruto .= $campo_excluir_imagem; // codigo html bruto
$codigo_html_bruto .= "<br>"; // codigo html bruto
$codigo_html_bruto .= "<input type='hidden' name='topico_id' value='$topico_id'>"; // codigo html bruto
$codigo_html_bruto .= "<input type='hidden' name='imagem_id' value='$id'>"; // codigo html bruto
$codigo_html_bruto .= "<input type='hidden' name='url_imagem' value='$url_imagem'>"; // codigo html bruto
$codigo_html_bruto .= "<input type='file' name='foto'>"; // codigo html bruto
$codigo_html_bruto .= "<br>"; // codigo html bruto
$codigo_html_bruto .= "<input type='submit' class='uibutton large confirm' value='Salvar'>"; // codigo html bruto
$codigo_html_bruto .= "</form>"; // codigo html bruto
$codigo_html_bruto .= "</div>"; // codigo html bruto

}else{

$codigo_html_bruto .= "<div class='classe_div_opcoes_imagem_ajuda'>"; // codigo html bruto
$codigo_html_bruto .= $descricao_imagem; // codigo html bruto
$codigo_html_bruto .= "</div>"; // codigo html bruto

};

// -------------------------------------------------------


// retorno ---------------------------------------------

return $codigo_html_bruto; // retorno

// -------------------------------------------------------


};

// -------------------------------------------------------


?>