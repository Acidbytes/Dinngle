<?php

// monta as opcoes de album de imagem
function monta_opcoes_album_imagem($dados){


// globals
global $imagem_servidor;
global $enderecos_arquivos_php_uteis;


// valida usuario dono do perfil
if(retorna_usuario_vendo_perfil_dono() == false){

return null;

};


// imagem excluir
$imagem_excluir = $imagem_servidor['excluir'];


// separa dados
$id = $dados['id'];
$idusuario = $dados['idusuario'];
$nome_album = $dados['nome_album'];
$idalbum_imagens = $dados['idalbum_imagens'];
$nome_album_identificador = $dados['nome_album_identificador'];


// url de formulario
$url_formulario = $enderecos_arquivos_php_uteis['excluir_album_imagens'];


// formulario excluir
$formulario .= "<div class='classe_div_formulario_excluir_album'>";
$formulario .= "<form action='$url_formulario' method='post'>";
$formulario .= retorna_link_perfil_usuario($idusuario);
$formulario .= ", deseja mesmo excluir o álbum de imagens $nome_album";
$formulario .= "?";
$formulario .= "<br>";
$formulario .= "<br>";
$formulario .= "<input type='submit' class='botao_cancela' value='Sim'>";
$formulario .= "&nbsp;";
$formulario .= "<input type='button' class='botao_adicionar' value='Não' onclick='fechar_janela_mensagem_dialogo();'>";
$formulario .= "<input type='hidden' name='idalbum_imagens' value='$idalbum_imagens'>";
$formulario .= "<input type='hidden' name='nome_album_identificador' value='$nome_album_identificador'>";
$formulario .= "</form>";
$formulario .= "</div>";


// propriedades da janela de dialogo
$titulo_janela = "Excluir álbum $nome_album";
$id_janela = "janela_excluir_album_imagem_".$id;


// adiciona janela de dialogo
$formulario = janela_mensagem_dialogo($titulo_janela, $formulario, $id_janela);


// codigo html
$codigo_html .= "<div class='classe_div_opcoes_album'>";
$codigo_html .= "<button class='uibutton' onclick='dialogo_excluir_album_imagens($id)'>";
$codigo_html .= "<img src='$imagem_excluir' title='Excluir álbum'>";
$codigo_html .= "&nbsp;";
$codigo_html .= "Excluir álbum";
$codigo_html .= "</button>";
$codigo_html .= "</div>";
$codigo_html .= $formulario;


// retorno
return $codigo_html;


};

?>