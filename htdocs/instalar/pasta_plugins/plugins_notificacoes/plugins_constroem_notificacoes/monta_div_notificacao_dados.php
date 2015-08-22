<?php


// monta div de notificacao de usuario -----------

function monta_div_notificacao_dados($dados, $tipo_notificacao){


// global -----------------------------------------------

global $url_pagina_inicial_site; // url pagina inicial de site

// --------------------------------------------------------


// separando dados ---------------------------------

$idusuario = $dados['idusuario']; // dados de tabela
$idamigo = $dados['idamigo']; // dados de tabela
$id = $dados['id']; // dados de tabela
$identificador = $dados['identificador']; // dados de tabela
$url_elemento = $dados['url_elemento']; // dados de tabela
$data_notifica = converte_data_amigavel($dados['data_notifica']); // dados de tabela

// --------------------------------------------------------


// valida idusuario -----------------------------------

if($idusuario != null){


// link do post ----------------------------------------

if($identificador == 1){

$link_post = retorne_imagem_id($id, $idamigo, 1); // link do post

}else{

$link_post = "<a href='$url_pagina_inicial_site?tipo_pagina=16&post_id=$id&idusuario=$idamigo'>esta postagem sua</a>.<br><br>"; // link do post

};

// -------------------------------------------------------


// link comentario -----------------------------------

if($link_post == null){

$link_post = "<a href='$url_pagina_inicial_site?tipo_pagina=19&post_id=$id&idusuario=$idamigo'>este comentário</a>.<br><br>"; // link comentario

};

// -------------------------------------------------------


// perfil de usuario ----------------------------------

$perfil_usuario = retorna_link_perfil_usuario($idusuario); // perfil de usuario

// -------------------------------------------------------


// monta notificacao especifica ------------------

switch($tipo_notificacao){


case 1:
$notificacao_usuario .= "<div class='classe_separa_abrir_notificacao_usuario'>"; // codigo notificacao usuario
$notificacao_usuario .= $perfil_usuario; // codigo notificacao usuario
$notificacao_usuario .= "&nbsp;"; // codigo notificacao usuario
$notificacao_usuario .= "-"; // codigo notificacao usuario
$notificacao_usuario .= "&nbsp;"; // codigo notificacao usuario
$notificacao_usuario .= "comentou"; // codigo notificacao usuario
$notificacao_usuario .= "&nbsp;"; // codigo notificacao usuario
$notificacao_usuario .= $link_post; // codigo notificacao usuario
$notificacao_usuario .= $data_notifica; // codigo notificacao usuario
$notificacao_usuario .= "</div>"; // codigo notificacao usuario
break;


case 2:
$notificacao_usuario .= "<div class='classe_separa_abrir_notificacao_usuario'>"; // codigo notificacao usuario
$notificacao_usuario .= $perfil_usuario; // codigo notificacao usuario
$notificacao_usuario .= "&nbsp;"; // codigo notificacao usuario
$notificacao_usuario .= "-"; // codigo notificacao usuario
$notificacao_usuario .= "&nbsp;"; // codigo notificacao usuario
$notificacao_usuario .= "Curtiu"; // codigo notificacao usuario
$notificacao_usuario .= "&nbsp;"; // codigo notificacao usuario
$notificacao_usuario .= $link_post; // codigo notificacao usuario
$notificacao_usuario .= $data_notifica; // codigo notificacao usuario
$notificacao_usuario .= "</div>"; // codigo notificacao usuario
break;


case 3:
$notificacao_usuario .= "<div class='classe_separa_abrir_notificacao_usuario'>"; // codigo notificacao usuario
$notificacao_usuario .= $perfil_usuario; // codigo notificacao usuario
$notificacao_usuario .= "&nbsp;"; // codigo notificacao usuario
$notificacao_usuario .= "-"; // codigo notificacao usuario
$notificacao_usuario .= "&nbsp;"; // codigo notificacao usuario
$notificacao_usuario .= "Compartilhou"; // codigo notificacao usuario
$notificacao_usuario .= "&nbsp;"; // codigo notificacao usuario
$notificacao_usuario .= $link_post; // codigo notificacao usuario
$notificacao_usuario .= $data_notifica; // codigo notificacao usuario
$notificacao_usuario .= "</div>"; // codigo notificacao usuario
break;


case 4:
$notificacao_usuario .= "<div class='classe_separa_abrir_notificacao_usuario'>"; // codigo notificacao usuario
$notificacao_usuario .= constroe_perfil_ultra_basico_usuario($idusuario, 1); // codigo notificacao usuario
$notificacao_usuario .= "<br>"; // codigo notificacao usuario
$notificacao_usuario .= "<li>Aceitou sua amizade"; // codigo notificacao usuario
$notificacao_usuario .= "<br>"; // codigo notificacao usuario
$notificacao_usuario .= "<br>"; // codigo notificacao usuario
$notificacao_usuario .= $data_notifica; // codigo notificacao usuario
$notificacao_usuario .= "</div>"; // codigo notificacao usuario
break;


case 5:
$notificacao_usuario .= "<div class='classe_separa_abrir_notificacao_usuario'>"; // codigo notificacao usuario
$notificacao_usuario .= constroe_perfil_ultra_basico_usuario($idusuario, 1); // codigo notificacao usuario
$notificacao_usuario .= "<br>"; // codigo notificacao usuario
$notificacao_usuario .= "<li>Quer sua amizade"; // codigo notificacao usuario
$notificacao_usuario .= "<br>"; // codigo notificacao usuario
$notificacao_usuario .= "<br>"; // codigo notificacao usuario
$notificacao_usuario .= $data_notifica; // codigo notificacao usuario
$notificacao_usuario .= "</div>"; // codigo notificacao usuario
break;


case 6:

if($identificador == 1){

$notificacao_usuario .= "<div class='classe_separa_abrir_notificacao_usuario'>"; // codigo notificacao usuario
$notificacao_usuario .= $perfil_usuario; // codigo notificacao usuario
$notificacao_usuario .= "&nbsp;"; // codigo notificacao usuario
$notificacao_usuario .= "-"; // codigo notificacao usuario
$notificacao_usuario .= "&nbsp;"; // codigo notificacao usuario
$notificacao_usuario .= "Aceitou seu depoimento"; // codigo notificacao usuario
$notificacao_usuario .= "<br>"; // codigo notificacao usuario
$notificacao_usuario .= "<br>"; // codigo notificacao usuario
$notificacao_usuario .= $data_notifica; // codigo notificacao usuario
$notificacao_usuario .= "</div>"; // codigo notificacao usuario

}else{

$notificacao_usuario .= "<div class='classe_separa_abrir_notificacao_usuario'>"; // codigo notificacao usuario
$notificacao_usuario .= $perfil_usuario; // codigo notificacao usuario
$notificacao_usuario .= "&nbsp;"; // codigo notificacao usuario
$notificacao_usuario .= "-"; // codigo notificacao usuario
$notificacao_usuario .= "&nbsp;"; // codigo notificacao usuario
$notificacao_usuario .= "Enviou um depoimento para você"; // codigo notificacao usuario
$notificacao_usuario .= "<br>"; // codigo notificacao usuario
$notificacao_usuario .= "<br>"; // codigo notificacao usuario
$notificacao_usuario .= $data_notifica; // codigo notificacao usuario
$notificacao_usuario .= "</div>"; // codigo notificacao usuario

};

break;


};

// ---------------------------------------------------------


};

// ---------------------------------------------------------


// retorno -----------------------------------------------

return $notificacao_usuario; // retorno

// ---------------------------------------------------------


};

// --------------------------------------------------------


?>