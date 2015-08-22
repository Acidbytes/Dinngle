<?php


// constroe div da postagem -----------------------

function constroe_div_postagem($dados){


// globals -----------------------------------------------

global $url_pagina_inicial_site; // url de pagina inicial

global $imagem_servidor; // imagem de servidor

// ---------------------------------------------------------


// tipo de pagina -------------------------------------

$tipo_pagina = retorne_tipo_pagina(); // tipo de pagina

// --------------------------------------------------------


// separando dados ----------------------------------

$id = $dados['id']; // dados de tabela
$idusuario = $dados['idusuario']; // dados de tabela
$idamigo = $dados['idamigo']; // dados de tabela
$conteudo_post = $dados['conteudo_post']; // dados de tabela
$idalbum_imagens = $dados['idalbum_imagens']; // dados de tabela
$data_publicacao = $dados['data_publicacao']; // dados de tabela
$privacidade = $dados['privacidade']; // dados de tabela
$compartilhamento = $dados['compartilhamento']; // dados de tabela

// ---------------------------------------------------------


// verifica se a postagem ja foi exibida ----------

$postagem_exibiu_resposta = retorne_postagem_exibiu_array($id, false); // verificando...

// ---------------------------------------------------------


// se postagem nao foi exibida salvar na memoria -----------
// isto e usado por causa de: compartilhamentos/novidades

if($postagem_exibiu_resposta == false){

retorne_postagem_exibiu_array($id, true); // salvando id...

}else{

return null; // retorna null e a postagem ja foi exibida

};

// -------------------------------------------------------------------------


// define id de publicacao temporario get -------

define_idpublicacao_temporario_get($id, true); // definindo

// ---------------------------------------------------------


// constroe hashtag ----------------------------------

$conteudo_post = gera_link_hashtag($conteudo_post); // constroe hashtag

// ----------------------------------------------------------


// converte urls em links ---------------------------

$conteudo_post = converte_urls_texto_links($conteudo_post); // converte urls em links

// ----------------------------------------------------------


// adiciona emoticon --------------------------------

$conteudo_post = converte_codigo_emoticon($conteudo_post); // adiciona emoticon

// --------------------------------------------------------


// informa se o usuario e o dono do perfil ------

$usuario_dono_perfil = retorna_usuario_vendo_perfil_dono(); // informa se o usuario e o dono do perfil

// ---------------------------------------------------------


// usuario pode visualizar postagem -------------

$usuario_pode_visualizar_postagem = retorne_usuario_pode_visualizar_postagem($privacidade); // usuario pode visualizar postagem

// ---------------------------------------------------------


// id de usuario dono do perfil ---------------------

$idusuario_perfil = retorne_idusuario_visualizando_perfil(); // id de usuario dono do perfil

// ---------------------------------------------------------


// valida id de album de imagens -----------------

if($idalbum_imagens != null){


// seta variavel global com id de album de imagens --------------

$_GET['idalbum_imagens'] = $idalbum_imagens; // setando

// ------------------------------------------------------------------------------


// pacote com as imagens da publicacao ------

$pacote_imagens_publicacao .= "<div class='div_corpo_imagens_publicacao_usuario'>"; // pacote com as imagens da publicacao
$pacote_imagens_publicacao .= constroe_carregar_imagens($dados); // pacote com as imagens da publicacao
$pacote_imagens_publicacao .= "</div>"; // pacote com as imagens da publicacao

// ---------------------------------------------------------

};

// ---------------------------------------------------------


// menus de opcoes de postagem ---------------

if($usuario_dono_perfil == true and $idusuario == $idusuario_perfil){

$menus_opcoes_postagem .= "<div class='menus_opcoes_postagem'>"; // menus de opcoes de postagem
$menus_opcoes_postagem .= divs_completa_opcoes_postagem($dados); // menus de opcoes de postagem
$menus_opcoes_postagem .= constroe_menu_drop(retorne_array_opcoes_postagem($dados)); // menus de opcoes de postagem
$menus_opcoes_postagem .= "</div>"; // menus de opcoes de postagem

};

// ---------------------------------------------------------


// topo da postagem ---------------------------------

$topo_postagem .= "<div class='classe_div_topo_autor_postagem'>"; // topo da postagem
$topo_postagem .= constroe_imagem_perfil_publicacao($idusuario); // topo da postagem
$topo_postagem .= retorna_link_perfil_usuario($idusuario); // topo da postagem
$topo_postagem .= "&nbsp; - &nbsp;"; // topo da postagem
$topo_postagem .= "<a href='$url_pagina_inicial_site?tipo_pagina=16&post_id=$id&idusuario=$idusuario' title='Abrir postagem'>Abrir postagem</a>"; // topo da postagem
$topo_postagem .= "</div>"; // topo da postagem
$topo_postagem .= $menus_opcoes_postagem; // topo da postagem

// ---------------------------------------------------------


// corpo da postagem -------------------------------

$corpo_postagem .= "<div class='div_corpo_texto_publicacao_usuario'>"; // corpo da postagem
$corpo_postagem .= $conteudo_post; // corpo da postagem
$corpo_postagem .= "</div>"; // corpo da postagem
$corpo_postagem .= $pacote_imagens_publicacao; // corpo da postagem

// ---------------------------------------------------------


// rodape da postagem ------------------------------

$rodape_postagem .= "<div class='div_data_publicacao_postagem_usuario'>"; // rodape da postagem
$rodape_postagem .= converte_data_amigavel($data_publicacao); // rodape da postagem
$rodape_postagem .= "</div>"; // rodape da postagem

// ---------------------------------------------------------


// analiza se e compartilhado ----------------------

switch($compartilhamento){


case true:

// div postagem completa ---------------------------

$div_postagem_completa_usuario = "div_postagem_completa_usuario div_postagem_completa_usuario_compartilhamento"; // div postagem completa

// ----------------------------------------------------------


// imagem de compartilhamento ------------------

$imagem_compartilhamento = "<img class='classe_imagem_notificacao' src='".$imagem_servidor['nt3']."' title='Compartilhou isto'>"; // imagem de compartilhamento

// ----------------------------------------------------------


// quem compartilhou --------------------------------

$usuario_compartilhou_conteudo .= "<div class='div_topo_postagem_usuario'>"; // quem compartilhou
$usuario_compartilhou_conteudo .= constroe_imagem_perfil_publicacao($idamigo); // quem compartilhou
$usuario_compartilhou_conteudo .= retorna_link_perfil_usuario($idamigo); // quem compartilhou
$usuario_compartilhou_conteudo .= "&nbsp;"; // quem compartilhou
$usuario_compartilhou_conteudo .= "-"; // quem compartilhou
$usuario_compartilhou_conteudo .= "&nbsp;"; // quem compartilhou
$usuario_compartilhou_conteudo .= $imagem_compartilhamento; // quem compartilhou
$usuario_compartilhou_conteudo .= "</div>"; // quem compartilhou

// ----------------------------------------------------------
break;


case null:
$div_postagem_completa_usuario = "div_postagem_completa_usuario"; // div postagem completa
break;


};

// --------------------------------------------------------


// codigo html bruto ---------------------------------

if($idusuario != null and $usuario_pode_visualizar_postagem == true){

$codigo_html_bruto .= "<div class='$div_postagem_completa_usuario'>";
$codigo_html_bruto .= $usuario_compartilhou_conteudo;
$codigo_html_bruto .= "<div class='div_topo_postagem_usuario'>$topo_postagem</div>";
$codigo_html_bruto .= "<div class='div_conteudo_postagem_usuario'>$corpo_postagem</div>";
$codigo_html_bruto .= "<div class='div_rodape_postagem_usuario'>$rodape_postagem</div>";
$codigo_html_bruto .= constroe_campos_social_publicacoes_gerais($dados);
$codigo_html_bruto .= "</div>";

};

// --------------------------------------------------------


// retorno de codigo --------------------------------

return $codigo_html_bruto; // retorno de codigo

// --------------------------------------------------------


};

// --------------------------------------------------------


?>