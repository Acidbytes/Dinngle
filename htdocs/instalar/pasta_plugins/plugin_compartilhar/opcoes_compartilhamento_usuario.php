<?php


// opcoes de compartilhamento de usuario ----

function opcoes_compartilhamento_usuario($dados){


// globals -----------------------------------------------

global $enderecos_arquivos_php_uteis; // arquivos php uteis

// ---------------------------------------------------------


// dados ------------------------------------------------

$id = $dados['id']; // dados de compartilhamento
$idusuario = $dados['idusuario']; // dados de compartilhamento
$idamigo = $dados['idamigo']; // dados de compartilhamento
$idpublicacao = $dados['idpublicacao']; // dados de compartilhamento

// --------------------------------------------------------


// script para excluir compartilhamento --------

$script_excluir = $enderecos_arquivos_php_uteis['excluir_compartilhamento']; // script para excluir compartilhamento

// --------------------------------------------------------


// campo exclui compartilhamento --------------

$campo_exclui_compartilhamento .= "<form action='$script_excluir' method='post'>"; // campo exclui compartilhamento
$campo_exclui_compartilhamento .= "Excluir este compartilhamento?"; // campo exclui compartilhamento
$campo_exclui_compartilhamento .= "<br>"; // campo exclui compartilhamento
$campo_exclui_compartilhamento .= "<br>"; // campo exclui compartilhamento
$campo_exclui_compartilhamento .= "<input type='submit' class='botao_padrao' value='Sim'>"; // campo exclui compartilhamento
$campo_exclui_compartilhamento .= "<input type='hidden' name='id' value='$id'>"; // campo exclui compartilhamento
$campo_exclui_compartilhamento .= "<input type='hidden' name='idamigo' value='$idamigo'>"; // campo exclui compartilhamento
$campo_exclui_compartilhamento .= "</form>"; // campo exclui compartilhamento

// --------------------------------------------------------


// array com opcoes --------------------------------

$array_retorno[] = "<li role='presentation'><a href='#' onclick='dialogo_excluir_compartilhamento($id);'>Excluir compartilhamento</a></li>"; // array com opcoes

// --------------------------------------------------------


// menu com opcoes -------------------------------

$menu_opcoes .= "<div class='div_menu_opcoes_excluir_compartilhamento'>"; // menu com opcoes
$menu_opcoes .= constroe_menu_drop_especial($array_retorno, "Opções"); // menu com opcoes
$menu_opcoes .= "</div>"; // menu com opcoes

// --------------------------------------------------------


// codigo html bruto ---------------------------------

$codigo_html_bruto = $menu_opcoes;

// --------------------------------------------------------


// titulo janela de dialogo --------------------------

$titulo_janela = "Excluir compartilhamento"; // titulo janela de dialogo

// --------------------------------------------------------


// id de janela de dialogo --------------------------

$div_id = "dialogo_excluir_compartilhamento_$id"; // id de janela de dialogo

// --------------------------------------------------------


// adiciona janela de dialogo ---------------------

$codigo_html_bruto .= janela_mensagem_dialogo($titulo_janela, $campo_exclui_compartilhamento, $div_id);

// --------------------------------------------------------


// retorno ----------------------------------------------

return $codigo_html_bruto; // retorno

// --------------------------------------------------------


};

// --------------------------------------------------------


?>