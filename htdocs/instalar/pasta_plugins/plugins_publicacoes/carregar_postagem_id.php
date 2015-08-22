<?php


// carrega a postagem pelo id ---------------------

function carregar_postagem_id(){


// id da postagem ------------------------------------

$idpublicacao = retorne_idpublicacao_get(); // id da postagem

// ---------------------------------------------------------


// valida idpublicacao -------------------------------

if($idpublicacao == null){

return null; // retorno nulo

};

// ---------------------------------------------------------


// dados de publicacao -----------------------------

$dados = retorne_dados_publicacao($idpublicacao); // dados de publicacao

// ---------------------------------------------------------


// codigo html bruto ----------------------------------

$codigo_html_bruto .= constroe_div_postagem($dados);

// ---------------------------------------------------------


// retorno -----------------------------------------------

return $codigo_html_bruto; // retorno

// ---------------------------------------------------------


};

// --------------------------------------------------------


?>