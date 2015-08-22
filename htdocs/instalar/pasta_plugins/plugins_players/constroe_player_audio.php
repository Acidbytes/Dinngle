<?php


// constroe o player de audio ----------------------

function constroe_player_audio(){


// url de player de audio ---------------------------

global $url_player_audio; // url de player de audio

// --------------------------------------------------------


// resposta se usuario esta logado --------------

$usuario_logado_resposta = retorne_esta_logado(); // resposta se usuario esta logado

// --------------------------------------------------------


// codigo para auto play ----------------------------

$codigo_auto_play = retorne_autoplay_musica_perfil(); // codigo para auto play

// --------------------------------------------------------


// verifica se usuario esta logado ----------------

if($usuario_logado_resposta == false){

return null; // retorno nulo

};

// --------------------------------------------------------


// url da musica de perfil de usuario ------------

$url_musica_perfil_usuario = retorne_url_musica_usuario(); // url da musica de perfil de usuario

// --------------------------------------------------------


// codigo html bruto ---------------------------------

if($url_musica_perfil_usuario != null){

$codigo_html_bruto .= "<div class='div_player_musica_usuario'>";
$codigo_html_bruto .= "<object type='application/x-shockwave-flash' data='$url_player_audio' width='175' height='30'>";
$codigo_html_bruto .= "<param name='movie' value='$url_player_audio' />";
$codigo_html_bruto .= "<param name='bgcolor' value='#ffffff' />";
$codigo_html_bruto .= "<param name='FlashVars' value='mp3=$url_musica_perfil_usuario&amp;autoplay=$codigo_auto_play' />";
$codigo_html_bruto .= "</object>";
$codigo_html_bruto .= "</div>";

};

// -------------------------------------------------------


// retorno ---------------------------------------------

return $codigo_html_bruto; // retorno

// -------------------------------------------------------


};

// -------------------------------------------------------


?>