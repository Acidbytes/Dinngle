<?php


// retorne ultima imagem de album -------------------------

function retorne_ultima_imagem_album(){


// globals ------------------------------------------------

global $tabela_banco; // tabela de banco de dados

global $imagem_servidor; // imagens de servidor

// --------------------------------------------------------


// id de usuario ------------------------------------------

$idusuario = retorne_idusuario_visualizando_perfil(); // id de usuario

// --------------------------------------------------------


// query --------------------------------------------------

$query = "select *from $tabela_banco[6] where idusuario='$idusuario' order by id desc limit 0,1;";

// --------------------------------------------------------


// dados --------------------------------------------------

$dados = retorne_dados_query($query); // dados

// --------------------------------------------------------


// url de ultima imagem de album --------------------------

$url_imagem_miniatura = $dados['url_imagem_miniatura']; // url de ultima imagem de album

// --------------------------------------------------------


// valida url de imagem -----------------------------------

if($url_imagem_miniatura == null){

$url_imagem_miniatura = $imagem_servidor['imagens_usuario']; // imagem de servidor

};

// --------------------------------------------------------


// nome de usuario ----------------------------------------

$nome_usuario = func_retorna_nome_de_usuario_por_id($idusuario); // nome de usuario

// --------------------------------------------------------


// codigo html bruto --------------------------------------

$codigo_html_bruto .= "<img src='$url_imagem_miniatura' title='Imagem de $nome_usuario' class='imagem_album_miniatura_bloco'>";

// --------------------------------------------------------


// retorno ------------------------------------------------

return $codigo_html_bruto; // retorno

// --------------------------------------------------------


};

// --------------------------------------------------------


?>