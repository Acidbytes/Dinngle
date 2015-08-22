<?php


// constroe bloco de amizades -----------------------------

function constroe_bloco_amizades(){


// globals ------------------------------------------------

global $tabela_banco; // tabela de banco de dados

global $url_pagina_inicial_site; // url de pagina inicial

// --------------------------------------------------------


// id de usuario ------------------------------------------

$idusuario = retorne_idusuario_visualizando_perfil(); // id de usuario

// --------------------------------------------------------


// query --------------------------------------------------

$query = "select *from $tabela_banco[4] where idusuario='$idusuario' and aceitou='2' order by id desc limit 0, 4;";

// --------------------------------------------------------


// comando ------------------------------------------------

$comando = comando_executa($query); // comando

// --------------------------------------------------------


// contador -----------------------------------------------

$contador = 0; // contador

// --------------------------------------------------------


// numero de linhas ---------------------------------------

$numero_linhas = retorne_numero_linhas_comando($comando); // numero de linhas

// --------------------------------------------------------


// obtendo dados ------------------------------------------

for($contador == $contador; $contador <= $numero_linhas; $contador++){


// dados --------------------------------------------------

$dados = mysql_fetch_array($comando, MYSQL_ASSOC);

// --------------------------------------------------------


// id de amigo --------------------------------------------

$idamigo = $dados['idamigo']; // id de amigo

// --------------------------------------------------------


if($idamigo != null){


// url de imagem ------------------------------------------

$url_imagem_perfil = retorna_imagem_perfil($idamigo); // url de imagem

// --------------------------------------------------------


// nome de amigo ------------------------------------------

$nome_usuario = func_retorna_nome_de_usuario_por_id($idamigo); // nome de amigo

// --------------------------------------------------------


// codigo html bruto --------------------------------------

$codigo_html_bruto .= "<div class='div_separa_amizade'>";
$codigo_html_bruto .= "<a href='$url_pagina_inicial_site?idusuario=$idamigo' title='$nome_usuario'>";
$codigo_html_bruto .= "<img src='$url_imagem_perfil' class='imagem_super_miniatura_perfil' title='$nome_usuario'>";
$codigo_html_bruto .= "</a>";
$codigo_html_bruto .= "<br>";
$codigo_html_bruto .= "<a href='$url_pagina_inicial_site?idusuario=$idamigo' title='$nome_usuario'>";
$codigo_html_bruto .= "<div class='div_nome_usuario_bloco'>$nome_usuario</div>";
$codigo_html_bruto .= "</a>";
$codigo_html_bruto .= "</div>";

// --------------------------------------------------------

};

// --------------------------------------------------------


};

// --------------------------------------------------------


// retorno ------------------------------------------------

return $codigo_html_bruto; // retorno

// --------------------------------------------------------


};

// --------------------------------------------------------


?>