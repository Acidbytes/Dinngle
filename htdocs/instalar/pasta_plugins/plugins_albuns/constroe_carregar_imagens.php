<?php


// constroe carregar imagens ---------------------

function constroe_carregar_imagens($dados){


// tabela de banco -----------------------------------

global $tabela_banco; // tabela de banco

global $url_pagina_inicial_site; // url de pagina inicial

// --------------------------------------------------------


// tipo de pagina -------------------------------------

$tipo_pagina = retorne_tipo_pagina(); // tipo de pagina

// --------------------------------------------------------


// id de usuario ---------------------------------------

$idusuario = retorne_idusuario_visualizando_perfil(); // id de usuario

// --------------------------------------------------------


// valida idusuario de tabela ----------------------

if($dados['idusuario'] != null){

$idusuario = $dados['idusuario']; // id de usuario

};

// --------------------------------------------------------


// id de album no modo get -----------------------

$idalbum_imagens = tipo_album_exibir_get(); // id de album no modo get

// --------------------------------------------------------


// url de pagina de imagens de usuario --------

$url_pagina_imagens = "$url_pagina_inicial_site?idusuario=$idusuario&tipo_pagina=5"; // url de pagina de imagens de usuario

// --------------------------------------------------------


// limit tabela -----------------------------------------

switch($tipo_pagina){


case 5:
$limit_tabela = retorne_limit_tabela_get(); // limit tabela
break;


case 8:
$limit_tabela = retorne_limit_tabela_ultimo_campo(); // limit tabela
break;


case 9:
$limit_tabela = retorne_limit_tabela_ultimo_imagens_modo_post(); // limit tabela
break;


default:
$limit_tabela = retorne_limit_tabela_get(); // limit tabela


};

// --------------------------------------------------------


// id de postagem de imagem -----------------

$post_id = retorne_idpublicacao_get(); // id de postagem de imagem

// --------------------------------------------------------


// nome de album identificador
$nome_album_identificador = retorne_idalbum_nome_get();


// query ------------------------------------------------

if($idalbum_imagens == null){


// valida post id --------------------------------------

if($post_id == null){

$query = "select DISTINCT nome_album_identificador, idusuario from $tabela_banco[6] where idusuario='$idusuario' $limit_tabela;"; // query

}else{

$query = "select *from $tabela_banco[6] where idusuario='$idusuario' and id='$post_id';"; // query

};

// --------------------------------------------------------


}else{


// query
$query = "select *from $tabela_banco[6] where idusuario='$idusuario' and idalbum_imagens='$idalbum_imagens' $limit_tabela;";


};

// --------------------------------------------------------


// monta query carregar imagens de albuns
if($nome_album_identificador != null){

$query = "select *from $tabela_banco[6] where idusuario='$idusuario' and nome_album_identificador='$nome_album_identificador' $limit_tabela;";

};


// comando --------------------------------------------

$comando = comando_executa($query); // comando

// --------------------------------------------------------


// numero de linhas de comando -------------

$numero_linhas = retorne_numero_linhas_comando($comando); // numero de linhas de comando

// --------------------------------------------------------


// contador --------------------------------------------

$contador = 0; // contador

// --------------------------------------------------------


// obtendo imagens ---------------------------------

for($contador == $contador; $contador <= $numero_linhas; $contador++){


// dados -----------------------------------------------

$dados = mysql_fetch_array($comando, MYSQL_ASSOC); // dados

// --------------------------------------------------------


// valida tipo de pagina
if($tipo_pagina == 5){


// carrega albuns ou imagens de album
if($nome_album_identificador == null){


// album
$lista_imagens .= constroe_album_usuario($dados);


}else{


// imagens
$lista_imagens .= constroe_imagem_album($dados);


};


}else{


// imagens
$lista_imagens .= constroe_imagem_album($dados);


};


};

// --------------------------------------------------------


// verifica o tipo de exibicao de imagens -------

if($idalbum_imagens != null and $tipo_pagina != 5){

return $lista_imagens; // lista com imagens

};

// --------------------------------------------------------


// numero total de imagens em albuns de usuario -----

$numero_total_imagens_albuns_usuario = retorne_numero_total_imagens_albuns_usuario(); // numero total de imagens em albuns de usuario

$numero_total_albuns_usuario = retorne_numero_albuns_usuario($idusuario); // numero total de albuns de usuario

// ------------------------------------------------------------------


// informa se o usuario e o dono do perfil ------

$usuario_dono_perfil = retorna_usuario_vendo_perfil_dono(); // informa se o usuario e o dono do perfil 

// --------------------------------------------------------


// verifica se o usuario e o dono do perfil ------

if($usuario_dono_perfil == false){


// nome usuario -------------------------------------

$nome_usuario = func_retorna_nome_de_usuario_por_id($idusuario); // nome do usuario

// --------------------------------------------------------


// codigo html bruto ---------------------------------

$codigo_html_bruto .= "<div class='div_campo_nome_usuario_divide_sessao'>";
$codigo_html_bruto .= "Fotos de ";
$codigo_html_bruto .= $nome_usuario;
$codigo_html_bruto .= "</div>";

// --------------------------------------------------------


};

// --------------------------------------------------------


// paginacao
if($nome_album_identificador == null){

$paginacao_continua = monta_paginas_paginacao($numero_total_albuns_usuario);

}else{

$paginacao_continua = monta_paginas_paginacao($numero_total_imagens_albuns_usuario);

};


// codigo html bruto ---------------------------------

$codigo_html_bruto .= "<div class='div_separa_sessao_perfil'>";
$codigo_html_bruto .= "<a href='$url_pagina_imagens' title='Álbuns'>$numero_total_albuns_usuario álbuns com $numero_total_imagens_albuns_usuario fotos.</a>";
$codigo_html_bruto .= "</div>";
$codigo_html_bruto .= "<div class='div_completa_imagens_miniaturas'>";
$codigo_html_bruto .= $lista_imagens;
$codigo_html_bruto .= "</div>";
$codigo_html_bruto .= $paginacao_continua;

// --------------------------------------------------------


// retorno ----------------------------------------------

return $codigo_html_bruto; // retorno

// --------------------------------------------------------


};

// ------------------------------------------------------


?>