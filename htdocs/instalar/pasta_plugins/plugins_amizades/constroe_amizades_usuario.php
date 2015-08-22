<?php


// constroe amizades de usuario -----------------

function constroe_amizades_usuario(){


// globals ----------------------------------------------

global $url_pagina_inicial_site; // url de pagina inicial

global $formulario_confirma_solicitacoes_amizades; // conteudo de formulario

global $enderecos_arquivos_php_uteis; // arquivos php uteis

// --------------------------------------------------------


// url de script de formulario de solicitacoes de amizades -------------

$url_formulario_confirma_solicitacoes_amizades = $enderecos_arquivos_php_uteis['aceitar_solicitacoes_amizades']; // url de script de formulario de solicitacoes de amizades

// ------------------------------------------------------------------------------------


// formulario para confirmar solicitacoes de amizades ---------------

$formulario_confirma_solicitacoes_amizades[1] .= "Confirme se deseja aceitar todas as solicitações de amizades."; // formulario para confirmar solicitacoes de amizades
$formulario_confirma_solicitacoes_amizades[1] .= "<br>"; // formulario para confirmar solicitacoes de amizades
$formulario_confirma_solicitacoes_amizades[1] .= "<br>"; // formulario para confirmar solicitacoes de amizades
$formulario_confirma_solicitacoes_amizades[1] .= "<form action='$url_formulario_confirma_solicitacoes_amizades' method='post'>"; // formulario para confirmar solicitacoes de amizades
$formulario_confirma_solicitacoes_amizades[1] .= "<input type='hidden' name='aceitar_todos' value='1'>"; // formulario para confirmar solicitacoes de amizades
$formulario_confirma_solicitacoes_amizades[1] .= "<input type='submit' value='Confirmar' class='botao_padrao'>"; // formulario para confirmar solicitacoes de amizades
$formulario_confirma_solicitacoes_amizades[1] .= "</form>"; // formulario para confirmar solicitacoes de amizades

// --------------------------------------------------------------------------------------


// formulario para confirmar solicitacoes de amizades -----------------

$formulario_confirma_solicitacoes_amizades[2] .= "Confirme se deseja recusar todas as solicitações de amizades."; // formulario para confirmar solicitacoes de amizades
$formulario_confirma_solicitacoes_amizades[2] .= "<br>"; // formulario para confirmar solicitacoes de amizades
$formulario_confirma_solicitacoes_amizades[2] .= "<br>"; // formulario para confirmar solicitacoes de amizades
$formulario_confirma_solicitacoes_amizades[2] .= "<form action='$url_formulario_confirma_solicitacoes_amizades' method='post'>"; // formulario para confirmar solicitacoes de amizades
$formulario_confirma_solicitacoes_amizades[2] .= "<input type='hidden' name='aceitar_todos' value='2'>"; // formulario para confirmar solicitacoes de amizades
$formulario_confirma_solicitacoes_amizades[2] .= "<input type='submit' value='Cancelar solicitações' class='botao_padrao'>"; // formulario para confirmar solicitacoes de amizades
$formulario_confirma_solicitacoes_amizades[2] .= "</form>"; // formulario para confirmar solicitacoes de amizades

// -------------------------------------------------------------------------------------


// id de usuario modo get ---------------------------

$idusuario = retorne_idusuario_get(); // id de usuario modo get

// ---------------------------------------------------------


// modo de visualizar amizades ------------------

$modo_visualizar_amizades = retorne_modo_visualizar_amizades_get(); // modo de visualizar amizades

// --------------------------------------------------------


// nome de usuario ----------------------------------

$nome_usuario = func_retorna_nome_de_usuario_por_id($idusuario); // nome de usuario

// --------------------------------------------------------


// id da div de amigos -------------------------------

$div_id = "div_amigos_usuario"; // id da div de amigos

// ---------------------------------------------------------


// informa se o usuario e o dono do perfil ------

$usuario_dono_perfil = retorna_usuario_vendo_perfil_dono(); // informa se o usuario e o dono do perfil 

// --------------------------------------------------------


// numero de amizades de usuario --------------

$numero_amigos_usuario = retorne_numero_amizades_solicitacoes(1); // numero de amizades de usuario

// --------------------------------------------------------


// verifica se o usuario e o dono do perfil ------

if($usuario_dono_perfil == true){


// numero de solicitacoes enviou -----------------

$numero_solicitacoes_amizade_enviou = retorne_numero_amizades_solicitacoes(2); // numero de solicitacoes enviou

// --------------------------------------------------------


// numero de solicitacoes recebeu --------------

$numero_solicitacoes_amizade_recebeu = retorne_numero_amizades_solicitacoes(3); // numero de solicitacoes recebeu 

// --------------------------------------------------------


// opcoes de amizade ------------------------------

$opcoes_amizade_solicitacoes .= "<span class='span_opcoes_amizades'>"; // opcoes de amizade solicitacoes
$opcoes_amizade_solicitacoes .= "<a href='$url_pagina_inicial_site?idusuario=$idusuario&tipo_pagina=4&modo_amizade=2' title='Solicitações'>"; // opcoes de amizade solicitacoes
$opcoes_amizade_solicitacoes .= "Solicitações enviei"; // opcoes de amizade solicitacoes
$opcoes_amizade_solicitacoes .= "($numero_solicitacoes_amizade_enviou)"; // opcoes de amizade solicitacoes
$opcoes_amizade_solicitacoes .= "</a>"; // opcoes de amizade solicitacoes
$opcoes_amizade_solicitacoes .= "</span>"; // opcoes de amizade solicitacoes
$opcoes_amizade_solicitacoes .= "<br>"; // opcoes de amizade solicitacoes

// ---------------------------------------------------------


// opcoes de amizade ------------------------------

$opcoes_amizade_solicitacoes .= "<span class='span_opcoes_amizades'>"; // opcoes de amizade solicitacoes
$opcoes_amizade_solicitacoes .= "<a href='$url_pagina_inicial_site?idusuario=$idusuario&tipo_pagina=4&modo_amizade=3' title='Solicitações'>"; // opcoes de amizade solicitacoes
$opcoes_amizade_solicitacoes .= "Solicitações enviaram"; // opcoes de amizade solicitacoes
$opcoes_amizade_solicitacoes .= "($numero_solicitacoes_amizade_recebeu)"; // opcoes de amizade solicitacoes
$opcoes_amizade_solicitacoes .= "</a>"; // opcoes de amizade solicitacoes
$opcoes_amizade_solicitacoes .= "</span>"; // opcoes de amizade solicitacoes
$opcoes_amizade_solicitacoes .= "<br>"; // opcoes de amizade solicitacoes

// ---------------------------------------------------------


};

// ---------------------------------------------------------


// mensagem de confirmacao --------------------

$mensagem_confirma[1] = $formulario_confirma_solicitacoes_amizades[1]; // mensagem de confirmacao
$mensagem_confirma[2] = $formulario_confirma_solicitacoes_amizades[2]; // mensagem de confirmacao

// --------------------------------------------------------


// titulo mensagem dialogo -----------------------

$titulo_mensagem_confirma = "Confirmação"; // titulo mensagem dialogo

// --------------------------------------------------------


// id de janela de mensagem ---------------------

$janela_mensagem_id[1] = "janela_mensagem_solicitacao_1"; // id de janela de mensagem
$janela_mensagem_id[2] = "janela_mensagem_solicitacao_2"; // id de janela de mensagem

// --------------------------------------------------------


// mensagem de dialogo --------------------------

$mensagem_confirma[1] = janela_mensagem_dialogo($titulo_mensagem_confirma, $mensagem_confirma[1], $janela_mensagem_id[1]); // mensagem de dialogo
$mensagem_confirma[2] = janela_mensagem_dialogo($titulo_mensagem_confirma, $mensagem_confirma[2], $janela_mensagem_id[2]); // mensagem de dialogo

// --------------------------------------------------------


// campo para aceitar solicitacoes --------------

if($numero_solicitacoes_amizade_enviou > 0 or $numero_solicitacoes_amizade_recebeu > 0){

$campo_aceitar_solicitacoes .= "<div class='campo_aceitar_solicitacoes'>"; // campo para aceitar solicitacoes
$campo_aceitar_solicitacoes .= "<li>"; // campo para aceitar solicitacoes
$campo_aceitar_solicitacoes .= "<span id='mensagem_dialogo_1' style='display: none'>$janela_mensagem_id[1]</span>"; // campo para aceitar solicitacoes
$campo_aceitar_solicitacoes .= "<span id='mensagem_dialogo_2' style='display: none'>$janela_mensagem_id[2]</span>"; // campo para aceitar solicitacoes
$campo_aceitar_solicitacoes .= "<a href='#' title='Aceitar todos' onclick='exibir_janela_mensagem_dialogo_solicitacoes(1, 2);'>Aceitar todos</a>"; // campo para aceitar solicitacoes
$campo_aceitar_solicitacoes .= "<li>"; // campo para aceitar solicitacoes
$campo_aceitar_solicitacoes .= "<a href='#' title='Recusar todos' onclick='exibir_janela_mensagem_dialogo_solicitacoes(2, 1);'>Recusar todos</a>"; // campo para aceitar solicitacoes
$campo_aceitar_solicitacoes .= "</div>"; // campo para aceitar solicitacoes
$campo_aceitar_solicitacoes .= "<br>"; // campo para aceitar solicitacoes
$campo_aceitar_solicitacoes .= $mensagem_confirma[1]; // campo para aceitar solicitacoes
$campo_aceitar_solicitacoes .= $mensagem_confirma[2]; // campo para aceitar solicitacoes

};

// --------------------------------------------------------


// opcoes de amizade ------------------------------

$opcoes_amizade .= "<div class='div_opcoes_busca_amizade_usuario'>"; // opcoes de amizade
$opcoes_amizade .= $campo_aceitar_solicitacoes; // opcoes de amizade
$opcoes_amizade .= $opcoes_amizade_solicitacoes; // opcoes de amizade
$opcoes_amizade .= "<span class='span_opcoes_amizades'>"; // opcoes de amizade
$opcoes_amizade .= "<a href='$url_pagina_inicial_site?idusuario=$idusuario&tipo_pagina=4&modo_amizade=1' title='Amigos de $nome_usuario'>"; // opcoes de amizade
$opcoes_amizade .= "Amigos"; // opcoes de amizade
$opcoes_amizade .= "($numero_amigos_usuario)"; // opcoes de amizade
$opcoes_amizade .= "</a>"; // opcoes de amizade
$opcoes_amizade .= "</span>"; // opcoes de amizade
$opcoes_amizade .= "</div>"; // opcoes de amizade

// ---------------------------------------------------------


// codigo html bruto ----------------------------------


$codigo_html_bruto .= $opcoes_amizade;

$codigo_html_bruto .= carrega_lista_usuarios($modo_visualizar_amizades, 1);


// --------------------------------------------------------


// adiciona div especial ----------------------------

$codigo_html_bruto = constroe_div_especial_geral("Amigos de $nome_usuario", $codigo_html_bruto, $div_id);

// --------------------------------------------------------


// retorno ----------------------------------------------

return $codigo_html_bruto; // retorno

// --------------------------------------------------------


};

// --------------------------------------------------------


?>