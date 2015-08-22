<?php


// monta pagina -------------------------------------------------

function monta_pagina(){


// nome do sistema --------------------------------------------

global $nome_do_sistema; // nome do sistema

global $url_arquivo_css; // endereco de css

global $url_arquivo_jquery; // url de arquivo jquery

global $url_arquivo_jquery_plugins; // url arquivo jquery plugins

global $url_arquivo_css_plugins; // url arquivos css plugins

global $descricao_site; // descricao do site

global $nome_do_sistema_completo; // nome completo do sistema

global $sobre_sistema_network; // sobre o sistema network

// --------------------------------------------------------------------


// resposta usuario bloqueado ------------------------------

$usuario_bloqueado_resposta = retorne_esta_bloqueado(null); // resposta usuario bloqueado

// --------------------------------------------------------------------


// informa se o usuario esta logado ------------------------

$usuario_logado = retorne_esta_logado(); // informa se o usuario esta logado

// --------------------------------------------------------------------


// tipo de pagina -------------------------------------------------

$tipo_pagina = retorne_tipo_pagina(); // tipo de pagina

// --------------------------------------------------------------------


// topo da pagina ------------------------------------------------

$topo_pagina = constroe_topo_pagina(); // topo da pagina

// --------------------------------------------------------------------


// rodape da pagina ------------------------------------------

$rodape_pagina = constroe_rodape(); // rodape da pagina

// -------------------------------------------------------------------


// carrega dados de usuario logado -------------------------

if($usuario_logado == true){


// id de usuario visualizando perfil --------------------------

$idusuario_perfil = retorne_idusuario_visualizando_perfil(); // id de usuario visualizando perfil

// --------------------------------------------------------------------


// perfil basico usuario -----------------------------------------

$perfil_basico = constroe_perfil_basico(); // perfil basico usuario

// --------------------------------------------------------------------


// url de imagem de fundo ------------------------------------

$imagem_fundo_usuario = retorne_imagem_papel_parede_usuario($idusuario_perfil, 2); // url de imagem de fundo

// --------------------------------------------------------------------


// usuario dono do perfil ---------------------------------------

$usuario_dono_perfil = retorna_usuario_vendo_perfil_dono(); // usuario dono do perfil

// --------------------------------------------------------------------


// carrega plugins com recursos -----------------------------

$plugins_recursos = carregar_plugins_recursos(); // carrega plugins com recursos

// --------------------------------------------------------------------


}else{


// url de imagem de fundo ------------------------------------

$imagem_fundo_usuario = retorne_imagem_papel_parede_capa_inicial(2); // url de imagem de fundo

// --------------------------------------------------------------------


};

// --------------------------------------------------------------------


// carrega publicacoes do usuario do perfil ---------------
// se nao for dono do perfil e o numero da pagina nao
// tiver sido informado

if($usuario_dono_perfil == false and $tipo_pagina == null and $usuario_logado == true){

$tipo_pagina = 9; // carrega publicacoes do usuario do perfil

};

// --------------------------------------------------------------------


// se o usuario nao estiver logado pagina de login ------

if($usuario_logado == false and $tipo_pagina != 1 and $tipo_pagina != 19 and $tipo_pagina != 20 and $tipo_pagina != 21){


// pagina de logoin ----------------------------------------------

$tipo_pagina = 2; // pagina de login

// --------------------------------------------------------------------


};

// --------------------------------------------------------------------


// verifica se esta bloqueado ---------------------------------

if($usuario_bloqueado_resposta == true){

$tipo_pagina = 17; // usuario bloqueado

};

// --------------------------------------------------------------------


// codigo de chat de usuario -----------------------------------

if($usuario_logado == true){

$codigo_chat_usuario = carregar_chat_usuario(); // codigo de chat de usuario

};

// ---------------------------------------------------------------------


// tipo de conteudo de pagina ---------------------------------

switch($tipo_pagina){


case 1:
$conteudo_pagina_1 .= formulario_cadastro_usuario(); // formulario de cadastro
break;


case 2:
$conteudo_pagina_1 .= formulario_cadastro_usuario(); // formulario de login
break;


case 3:
$conteudo_pagina_1 .= constroe_perfil_geral_usuario(); // carrega o perfil geral do usuario
break;


case 4:
$conteudo_pagina_1 .= constroe_amizades_usuario(); // carrega dados sobre amizades
break;


case 5:
$conteudo_pagina_1 .= construir_albuns_usuario(); // imagens do usuario
break;


case 6:
$conteudo_pagina_1 .= constroe_gerenciar_musica_usuario(); // carrega dados musica usuario
break;


case 7:
$conteudo_pagina_1 .= constroe_editar_perfil_usuario(); // constroe editar perfil de usuario
break;


case 8:
$conteudo_pagina_1 .= carregar_novidades_usuario(); // carrega novidades
break;


case 9:
$conteudo_pagina_1 .= constroe_publicacoes_usuario(); // constroe as publicacoes do usuario
break;


case 10:
$conteudo_pagina_1 .= pesquisa_geral(); // resultados de pesquisa
break;


case 11:
$conteudo_pagina_1 .= carregar_depoimentos_usuario(); // carrega os depoimentos do usuario
break;


case 12:
$conteudo_pagina_1 .= carregar_visitas_perfil_usuario(); // carrega visitas do perfil
break;


case 13:
$conteudo_pagina_1 .= monta_painel_notificacoes(); // monta painel de notificacoes
break;


case 14:
$conteudo_pagina_1 .= carregar_compartilhamentos(); // carrega os compartilhamentos
break;


case 15:
$conteudo_pagina_1 .= carrega_usuarios_compartilharam_postagem(); // retorna usuarios que compartilharam postagem
break;


case 16:
$conteudo_pagina_1 .= carregar_postagem_id(); // carega a postagem por id
break;


case 17:
$conteudo_pagina_1 = exibe_mensagem_bloqueado(); // usuario bloqueado
break;


case 18:
$conteudo_pagina_1 .= carregar_novidades_usuario(); // carrega novidades
break;


case 19:
$conteudo_pagina_1 .= carrega_pagina_ajuda(); // carrega comentario
break;


case 20:
$conteudo_pagina_1 = monta_pagina_jogos(); // monta a pagina de jogos
break;


case 21:
$conteudo_pagina_1 = formulario_exibe_recuperar_senha(); // formulario exibe recuperar a senha
break;


default:
$conteudo_pagina_1 .= carregar_novidades_usuario(); // carrega novidades


};

// --------------------------------------------------------------------


// perfil basico usuario logado -------------------------------

if($usuario_logado == true){


// conteudo de pagina depoimentos
if($tipo_pagina != 11){

$conteudo_pagina_2 .= carregar_depoimentos_usuario(); // conteudo de pagina

};


// conteudo de pagina sugerir amizades
$conteudo_pagina_2 .= sugerir_amizades(); // perfil basico


// barra de tarefas
$barra_tarefas = constroe_barra_tarefas(); // barra de tarefas


// titulo da pagina
$titulo_pagina = func_retorna_nome_de_usuario_por_id($idusuario_perfil)." - ".$nome_do_sistema; // titulo da pagina


}else{


// conteudo de pagina;
$campos_perfil_logado = pagina_inicial_nao_logado();


// conteudo de pagina
$conteudo_pagina_2 = $sobre_sistema_network;
$conteudo_pagina_2 = converte_codigo_emoticon($conteudo_pagina_2);


// titulo da pagina
$titulo_pagina = $nome_do_sistema_completo; // titulo da pagina


};

// --------------------------------------------------------------------


// monta pagina normal --------------------------------------

$codigo_conteudo_completo_pagina .= "<div id='div_topo_pagina' class='div_topo_pagina'>$topo_pagina</div>"; // codigo conteudo completo pagina
$codigo_conteudo_completo_pagina .= "<div id='div_cabecalho_pagina' class='div_cabecalho_pagina'>"; // codigo conteudo completo pagina
$codigo_conteudo_completo_pagina .= $perfil_basico; // codigo conteudo completo pagina
$codigo_conteudo_completo_pagina .= "</div>"; // codigo conteudo completo pagina
$codigo_conteudo_completo_pagina .= "<div class='div_subcorpo_pagina'>"; // codigo conteudo completo pagina
$codigo_conteudo_completo_pagina .= $plugins_recursos; // codigo conteudo completo pagina
$codigo_conteudo_completo_pagina .= $barra_atualizacao_usuario; // codigo conteudo completo pagina
$codigo_conteudo_completo_pagina .= "<div id='div_conteudo_pagina_1' class='div_conteudo_pagina_1'>$conteudo_pagina_2</div>"; // codigo conteudo completo pagina
$codigo_conteudo_completo_pagina .= "<div id='div_conteudo_pagina_2' class='div_conteudo_pagina_2'>$conteudo_pagina_1</div>"; // codigo conteudo completo pagina
$codigo_conteudo_completo_pagina .= constroe_campo_navegacao_usuario();
$codigo_conteudo_completo_pagina .= $barra_tarefas; // codigo conteudo completo pagina
$codigo_conteudo_completo_pagina .= "</div>"; // codigo conteudo completo pagina
$codigo_conteudo_completo_pagina .= "<div id='div_rodape_pagina' class='div_rodape_pagina'>$rodape_pagina</div>"; // codigo conteudo completo pagina

// --------------------------------------------------------------------


// codigo corpo de pagina -----------------------------------

$codigo_corpo_pagina .= "<div id='div_corpo_pagina' class='div_corpo_pagina'>"; // codigo corpo de pagina
$codigo_corpo_pagina .= $codigo_conteudo_completo_pagina; // codigo corpo de pagina
$codigo_corpo_pagina .= "</div>"; // codigo corpo de pagina
$codigo_corpo_pagina .= "<script type='text/javascript' src='$url_arquivo_jquery'></script>"; // codigo corpo de pagina
$codigo_corpo_pagina .= "<script type='text/javascript' src='$url_arquivo_jquery_plugins'></script>"; // codigo corpo de pagina
$codigo_corpo_pagina .= carregar_scripts_jquerys_personalizados(); // codigo corpo de pagina

// --------------------------------------------------------------------


// verifica se esta bloqueado ---------------------------------

if($usuario_bloqueado_resposta == true){


// limpando -------------------------------------------------------

$codigo_corpo_pagina = null; // limpando

$imagem_fundo_usuario = null; // limpando

// --------------------------------------------------------------------


// codigo corpo de pagina -------------------------------------

$codigo_corpo_pagina .= "<div id='div_corpo_pagina' class='div_corpo_pagina'>"; // codigo corpo de pagina
$codigo_corpo_pagina .= "<div id='div_topo_pagina' class='div_topo_pagina'>"; // codigo corpo de pagina
$codigo_corpo_pagina .= $topo_pagina; // codigo corpo de pagina
$codigo_corpo_pagina .= "</div>"; // codigo corpo de pagina
$codigo_corpo_pagina .= "<div id='div_conteudo_pagina'>"; // codigo corpo de pagina
$codigo_corpo_pagina .= "<div class='div_conteudo_central_publicacoes_usuario'>"; // codigo corpo de pagina
$codigo_corpo_pagina .= $conteudo_pagina_1; // codigo corpo de pagina
$codigo_corpo_pagina .= "</div>"; // codigo corpo de pagina
$codigo_corpo_pagina .= "</div>"; // codigo corpo de pagina
$codigo_corpo_pagina .= "<div id='div_rodape_pagina' class='div_rodape_pagina'>"; // codigo corpo de pagina
$codigo_corpo_pagina .= $rodape_pagina; // codigo corpo de pagina
$codigo_corpo_pagina .= "</div>"; // codigo corpo de pagina
$codigo_corpo_pagina .= "</div>"; // codigo corpo de pagina

// --------------------------------------------------------------------


// titulo da pagina ----------------------------------------------

$titulo_pagina = $nome_do_sistema; // titulo da pagina

// ------------------------------------------------------------------


};

// --------------------------------------------------------------------


// codigo html bruto ---------------------------------------------

$codigo_html .= "<html>";
$codigo_html .= "<head>";
$codigo_html .= "<title>$titulo_pagina</title>";
$codigo_html .= "<link rel='stylesheet' type='text/css' href='$url_arquivo_css'/>";
$codigo_html .= "<link rel='stylesheet' type='text/css' href='$url_arquivo_css_plugins'/>";
$codigo_html .= "<meta name='description' content='$descricao_site'>";
$codigo_html .= "<meta charset='UTF-8'>";
$codigo_html .= aplica_resolucao(2);
$codigo_html .= $imagem_fundo_usuario;
$codigo_html .= "<meta name='viewport' content='width=device-width'/>";
$codigo_html .= "</head>";
$codigo_html .= "<body>";
$codigo_html .= $codigo_corpo_pagina;
$codigo_html .= "</body>";
$codigo_html .= "</html>";

// ------------------------------------------------------------------


// remove as linhas em branco ----------------------------

$codigo_html = remove_linhas_em_branco($codigo_html); // remove as linhas em branco

// ------------------------------------------------------------------


// retorno --------------------------------------------------------

return $codigo_html; // retorno

// ------------------------------------------------------------------


};

// ------------------------------------------------------------------


?>