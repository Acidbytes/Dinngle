<?php


// constroe imagens de ajuda ---------------------

function constroe_imagens_ajuda($idalbum_imagens, $topico_id){


// globals ----------------------------------------------

global $tabela_banco; // tabela de banco de dados

global $url_do_servidor; // url de servidor

// --------------------------------------------------------


// query --------------------------------------------------

$query = "select *from $tabela_banco[26] where idalbum_imagens='$idalbum_imagens';"; // query

// ---------------------------------------------------------


// comando --------------------------------------------

$comando = comando_executa($query); // comando

// ---------------------------------------------------------


// contador ---------------------------------------------

$contador = 0; // contador

// ---------------------------------------------------------


// numero de linhas ----------------------------------

$numero_linhas = retorne_numero_linhas_comando($comando); // numero de linhas

// ---------------------------------------------------------


// organizando dados --------------------------------

for($contador == $contador; $contador <= $numero_linhas; $contador++){


// dados -------------------------------------------------

$dados = mysql_fetch_array($comando, MYSQL_ASSOC);

// ----------------------------------------------------------


// dados -------------------------------------------------

$url_imagem = $url_do_servidor."/".$dados['url_imagem']; // url de imagem

// ----------------------------------------------------------


// codigo html bruto -----------------------------------

if($dados['id'] != null){

$codigo_html_bruto .= "<img src='$url_imagem' class='classe_imagem_postagem_ajuda'>"; // codigo html bruto
$codigo_html_bruto .= campo_opcoes_imagem_ajuda($dados, $topico_id); // codigo html bruto

};

// ---------------------------------------------------------


};

// ---------------------------------------------------------


// retorno -----------------------------------------------

return $codigo_html_bruto; // retorno

// ---------------------------------------------------------


};

// --------------------------------------------------------


?>