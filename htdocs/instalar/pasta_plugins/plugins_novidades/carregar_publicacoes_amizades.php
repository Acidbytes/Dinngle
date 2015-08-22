<?php


// carrega publicacoes de amizades
function carregar_publicacoes_amizades(){


// globals
global $tabela_banco;
global $imagem_servidor;


// id usuario logado
$idusuario = retorne_idusuario_logado();


// array com id de postagens
$array_publicacoes = retorne_array_amigos_possuem_postagem($idusuario, true); // array com amigos listados


// monta postagens e compartilhamentos
foreach($array_publicacoes as $idpost){


// query
$query = "select *from $tabela_banco[9] where id='$idpost';";


// dados da postagem
$dados = retorne_dados_query($query);


// constroe postagens de amigos
$publicacoes .= constroe_div_postagem($dados);


// carrega compartilhamentos
$publicacoes .= carrega_ultimo_compartilhamento_usuario($dados['idusuario']); // carrega ultimo compartilhamento de usuario


};


// altera idusuario em array global
altera_idusuario_array_global($idusuario);


// numero total de resultados
$numero_resultados = retorne_array_amigos_possuem_postagem($idusuario, false); // numero total de resultados


// valida se ha publicacoes
if($publicacoes == null){


// nome do usuario
$nome_usuario =  func_retorna_nome_de_usuario_por_id($idusuario);


// imagem
$imagem_cima = "<img src='".$imagem_servidor['indica_cima']."' title='Poste algo'>";


// publicacoes
$publicacoes .= $imagem_cima;
$publicacoes .= "<br>";
$publicacoes .= campo_pesquisa_geral(false);
$publicacoes .= "<br>";
$publicacoes .= "<br>";
$publicacoes .= "<br>";
$publicacoes .= "Hey! $nome_usuario, que tal você procurar por mais amigos.";


// adiciona div especial
$publicacoes = div_especial_quadro_aviso("Olá $nome_usuario", $publicacoes, null);
$publicacoes = div_especial_basica_campos($publicacoes);


};


// codigo html bruto
$codigo_html_bruto .= $publicacoes;
$codigo_html_bruto .= monta_paginas_paginacao($numero_resultados);


// retorno
return $codigo_html_bruto; // retorno


};


?>