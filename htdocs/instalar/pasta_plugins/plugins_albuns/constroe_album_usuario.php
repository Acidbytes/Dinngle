<?php

// constroe album de usuario
function constroe_album_usuario($dados){


// globals
global $tabela_banco;
global $url_pagina_inicial_site;


// separa dados
$nome_album_identificador = $dados['nome_album_identificador'];
$idusuario = $dados['idusuario'];


// query
$query = "select *from $tabela_banco[6] where idusuario='$idusuario'  and nome_album_identificador='$nome_album_identificador' order by id desc limit 0,1;";


// dados de query
$dados = retorne_dados_query($query);


// separa dados
$id = $dados['id'];
$idusuario = $dados['idusuario'];
$url_imagem = $dados['url_imagem'];
$url_imagem_miniatura = $dados['url_imagem_miniatura'];
$privacidade = $dados['privacidade'];
$descricao = $dados['descricao'];
$data_publicacao = $dados['data_publicacao'];
$idalbum_imagens = $dados['idalbum_imagens'];
$identificador = $dados['identificador'];
$nome_album = $dados['nome_album'];
$nome_album_identificador = $dados['nome_album_identificador'];


// privacidade de album
$usuario_pode_ver_album_imagem = retorne_usuario_pode_visualizar_album_imagem($privacidade); // informa se o usuario pode ver a imagem ou album


// valida id de album ou imagem
if($id == null or $usuario_pode_ver_album_imagem == false){

// retorno nulo
return null;

};


// url para abrir album
$url_album = $url_pagina_inicial_site."?idusuario=$idusuario&tipo_pagina=5&idalbum_nome=$nome_album_identificador";


// valida nome de album
if($nome_album == null){


// nome de album
$nome_album = "Álbum sem título";


};


// codigo html
$codigo_html .= "<div class='div_corpo_imagem_classe'>";
$codigo_html .= "<a href='$url_album' title='$nome_album'>";
$codigo_html .= "<img src='$url_imagem_miniatura' title='$nome_album' class='imagem_album_usuario_classe'>";
$codigo_html .= "</a>";
$codigo_html .= "<br>";
$codigo_html .= "<br>";
$codigo_html .= $descricao;
$codigo_html .= "<br>";
$codigo_html .= "<br>";
$codigo_html .= converte_data_amigavel($data_publicacao);
$codigo_html .= "</div>";


// titulo de div especial
$titulo_div .= "<a href='$url_album' title='$nome_album'>$nome_album</a>";
$titulo_div .= monta_opcoes_album_imagem($dados);


// adiciona div especial com titulo
$codigo_html = constroe_div_especial_geral($titulo_div, $codigo_html, null);


// retorno
return $codigo_html;


};

?>