<?php


// monta comentario de usuario ------------------

function monta_comentario_usuario($dados){


// globals ----------------------------------------------

global $enderecos_arquivos_php_uteis; // enderecos de scripts php uteis

global $identificador_comentario_usuario; // identificador de comentario

// --------------------------------------------------------


// dados do campo social -----------------------

$dados_social = $dados; // dados do campo social

// ----------------------------------------------------------


// dados de tabela -----------------------------------

$id = $dados['id']; // dados de tabela
$idcomentario = $dados['idcomentario']; // dados de tabela
$idusuario = $dados['idusuario']; // dados de tabela
$idusuario_comentario = $dados['idusuario_comentario']; // dados de tabela
$data_comentou = $dados['data_comentou']; // dados de tabela
$comentario = $dados['comentario']; // dados de tabela
$identificador = $dados['identificador']; // dados de tabela

// -------------------------------------------------------


// tipo de pagina ------------------------------------

$tipo_pagina = retorne_tipo_pagina(); // tipo de pagina

// -------------------------------------------------------


// id de usuario logado ----------------------------

$idusuario_logado = retorne_idusuario_logado(); // id de usuario logado

// -------------------------------------------------------


// numero da pagina atual ------------------------

$numero_pagina = sessao_numero_pagina_atual(2); // numero da pagina atual

// -------------------------------------------------------


// nao trabalha com valores nulos --------------

if($id == null){

return null; // retorno nulo

};

// -------------------------------------------------------


// data de comentario amigavel -----------------

$data_comentou = converte_data_amigavel($data_comentou); // data de comentario amigavel

// -------------------------------------------------------


// url atualizar comentario ------------------------

$url_atualizar_comentario = $enderecos_arquivos_php_uteis['atualizar_comentario_usuario']; // url para atualizar comentario

// -------------------------------------------------------


// url para remover comentario ------------------

$url_remover_comentario = $enderecos_arquivos_php_uteis['excluir_comentario_postagem']; // url para remover comentario

// -------------------------------------------------------


// campo editar comentario ----------------------

$campo_editar_comentario .= "<div id='campo_editar_comentario_$idcomentario'>"; // campo editar comentario
$campo_editar_comentario .= "<form action='$url_atualizar_comentario' method='post'>"; // campo editar comentario
$campo_editar_comentario .= "<textarea name='comentario' cols='75' rows='5'>$comentario</textarea>"; // campo editar comentario
$campo_editar_comentario .= "<input type='hidden' name='id' value='$idcomentario'>"; // campo editar comentario
$campo_editar_comentario .= "<input type='hidden' name='numero_pagina' value='$numero_pagina'>"; // campo editar comentario
$campo_editar_comentario .= "<input type='hidden' name='tipo_pagina' value='$tipo_pagina'>"; // campo editar comentario
$campo_editar_comentario .= "<input type='hidden' name='idusuario' value='$idusuario'>"; // campo editar comentario
$campo_editar_comentario .= "<br>"; // campo editar comentario
$campo_editar_comentario .= "<br>"; // campo editar comentario
$campo_editar_comentario .= "<input type='submit' class='botao_padrao' value='Atualizar'>"; // campo editar comentario
$campo_editar_comentario .= "</form>"; // campo editar comentario
$campo_editar_comentario .= "</div>"; // campo editar comentario

// -------------------------------------------------------


// campo excluir comentario ---------------------

$campo_excluir_comentario .= "<div id='campo_excluir_comentario_$idcomentario'>"; // campo excluir comentario
$campo_excluir_comentario .= "<form action='$url_remover_comentario' method='post'>"; // campo excluir comentario
$campo_excluir_comentario .= "Excluir este comentário?"; // campo excluir comentario
$campo_excluir_comentario .= "<br>"; // campo excluir comentario
$campo_excluir_comentario .= "<br>"; // campo excluir comentario
$campo_excluir_comentario .= "<input type='hidden' name='id' value='$id'>"; // campo excluir comentario
$campo_excluir_comentario .= "<input type='hidden' name='numero_pagina' value='$numero_pagina'>"; // campo excluir comentario
$campo_excluir_comentario .= "<input type='hidden' name='idusuario' value='$idusuario'>"; // campo excluir comentario
$campo_excluir_comentario .= "<input type='hidden' name='tipo_pagina' value='$tipo_pagina'>"; // campo excluir comentario
$campo_excluir_comentario .= "<input type='hidden' name='idusuario' value='$idusuario'>"; // campo excluir comentario
$campo_excluir_comentario .= "<input type='submit' class='botao_padrao' value='Excluir'>"; // campo excluir comentario
$campo_excluir_comentario .= "</form>"; // campo excluir comentario
$campo_excluir_comentario .= "</div>"; // campo excluir comentario

// -------------------------------------------------------


// numero das janelas de dialogo ---------------

$numero_janelas_dialogo = $id."_".$idusuario_comentario; // numero das janelas de dialogo

// -------------------------------------------------------


// dialogo excluir ------------------------------------

if($idusuario_comentario == $idusuario_logado){

$campo_opcoes_comentario .= janela_mensagem_dialogo("Editar comentário", $campo_editar_comentario, "campo_editar_comentario_$numero_janelas_dialogo"); // campo opcoes de comentario

};

// -------------------------------------------------------


// campo opcoes de comentario ----------------

if($idusuario_comentario == $idusuario_logado or $idusuario == $idusuario_logado){

$campo_opcoes_comentario .= "<div class='classe_campo_opcoes_comentario'>"; // campo opcoes de comentario
$campo_opcoes_comentario .= constroe_menu_drop(retorne_array_opcoes_postagem_comentario($dados)); // campo opcoes de comentario
$campo_opcoes_comentario .= "</div>"; // campo opcoes de comentario
$campo_opcoes_comentario .= janela_mensagem_dialogo("Excluir comentário", $campo_excluir_comentario, "campo_excluir_comentario_$numero_janelas_dialogo"); // campo opcoes de comentario

};

// -------------------------------------------------------


// analisa se e postagem ou comentario -

if($idcomentario != null){


// altera identificador
$dados_social['identificador'] = $identificador_comentario_usuario; // comentario


// id de div de comentario
$id_div_comentario = "id_div_comentario".retorne_numero_div_id($dados_social); // id de div de comentario


}else{


// id de div de comentario
$id_div_comentario = "id_div_comentario".retorne_numero_div_id($dados_social); // id de div de comentario


};

// -------------------------------------------------------


// campos disponiveis -----------------------------

$campos_disponiveis .= "<div class='div_campos_disponiveis_social_comentario'>"; // campos disponiveis
$campos_disponiveis .= links_social_publicacoes_gerais($dados_social); // campos disponiveis
$campos_disponiveis .= campo_exibe_curtidas($dados_social); // campos disponiveis
$campos_disponiveis .= "</div>"; // campos disponiveis

// -------------------------------------------------------


// converte urls em links ------------------------

$comentario = converte_urls_texto_links($comentario); // converte urls em links

// --------------------------------------------------------


// adiciona emoticon ------------------------------

$comentario = converte_codigo_emoticon($comentario); // adiciona emoticon

// --------------------------------------------------------


// codigo html bruto --------------------------------

$codigo_html_bruto .= "<div id='$id_div_comentario' class='monta_comentario_usuario'>";
$codigo_html_bruto .= $campo_opcoes_comentario;
$codigo_html_bruto .= "<div class='classe_div_imagem_perfil_comentario'>";
$codigo_html_bruto .= constroe_imagem_perfil_publicacao($idusuario_comentario);
$codigo_html_bruto .= "</div>";
$codigo_html_bruto .= "<div class='classe_comentario_usuario'>";
$codigo_html_bruto .= retorna_link_perfil_usuario($idusuario_comentario);
$codigo_html_bruto .= " - ";
$codigo_html_bruto .= $comentario;
$codigo_html_bruto .= "</div>";
$codigo_html_bruto .= $campos_disponiveis;
$codigo_html_bruto .= "<div class='monta_comentario_usuario_rodape'>";
$codigo_html_bruto .= $data_comentou;
$codigo_html_bruto .= "</div>";
$codigo_html_bruto .= "</div>";

// -------------------------------------------------------


// retorno --------------------------------------------

return $codigo_html_bruto; // retorno

// -------------------------------------------------------


};

// --------------------------------------------------------


?>