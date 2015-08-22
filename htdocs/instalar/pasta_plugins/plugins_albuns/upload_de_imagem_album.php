<?php


// faz upload da imagem para album -------------------------------

function upload_de_imagem_album($destino_da_imagem){


// global ------------------------------------------------------------------

global $tamanho_escala_imagem_album; // tamanho em escala de imagem de album

global $tamanho_escala_imagem_album_miniatura; // tamanho de imagem de album em miniatura

global $url_do_servidor; // url do servidor

global $tabela_banco; // tabela de banco de dados

// ---------------------------------------------------------------------------


// data atual --------------------------------------------------------------

$data_atual = data_atual(); // data atual

// ---------------------------------------------------------------------------


// tipo de privacidade ---------------------------------------------------

$tipo_privacidade = retorne_privacidade_imagem_get(); // tipo de privacidade

// ---------------------------------------------------------------------------


// dados de formulario ------------------------------------------------

$numero_imagens_enviando = retorne_numero_array_post_imagens(); // dados de formulario

$idalbum_imagens = remove_html($_POST['idalbum_imagens']); // id unico de album de imagens

// ---------------------------------------------------------------------------


// valida id album de imagens ------------------------------------

if($idalbum_imagens == null){


// gera idalbum
$idalbum_imagens = gera_idalbum_postagem_usuario();


// seta idalbum de post
$_POST['idalbum_imagens'] = $idalbum_imagens;


};

// ---------------------------------------------------------------------------


// array com fotos ------------------------------------------------------

$fotos = $_FILES['foto']; // array com fotos

// ---------------------------------------------------------------------------


// contador ---------------------------------------------------------------

$contador = 0; // contador

// ---------------------------------------------------------------------------


// extensoes de imagens disponiveis ------------------------------

$extensoes_disponiveis[] = ".jpeg"; // extensoes de imagens disponiveis
$extensoes_disponiveis[] = ".jpg"; // extensoes de imagens disponiveis
$extensoes_disponiveis[] = ".png"; // extensoes de imagens disponiveis
$extensoes_disponiveis[] = ".gif"; // extensoes de imagens disponiveis

// ---------------------------------------------------------------------------


// informa o numero de imagens cadastradas --------------

$numero_imagens_cadastrou = 0;

// ---------------------------------------------------------------------------


// upload de imagens --------------------------------------------------

for($contador == $contador; $contador <= $numero_imagens_enviando; $contador++){


// nome imagem --------------------------------------------------------

$nome_imagem = $fotos['tmp_name'][$contador]; // nome imagem

$nome_imagem_real = $fotos['name'][$contador]; // nome imagem

// ----------------------------------------------------------------------------


// extencao ----------------------------------------------------------------

$extensao_imagem = ".".strtolower(pathinfo($nome_imagem_real, PATHINFO_EXTENSION)); // extencao 

// ----------------------------------------------------------------------------


// nome final de imagem -----------------------------------------------

$nome_imagem_final = md5($nome_imagem_real.$data_atual).$extensao_imagem; // nome final de imagem

$nome_imagem_final_miniatura = md5($nome_imagem_real."miniatura".$data_atual).$extensao_imagem; // nome final de imagem

// ----------------------------------------------------------------------------


// endereco final de imagem miniatura ----------------------------

$endereco_final_salvar_imagem_miniatura = $destino_da_imagem.$nome_imagem_final_miniatura; // endereco final de imagem miniatura

// ----------------------------------------------------------------------------


// informa se a extensao de imagem e permitida ----------------

$extensao_permitida = retorne_elemento_array_existe($extensoes_disponiveis, $extensao_imagem); // informa se a extensao de imagem e permitida

// ----------------------------------------------------------------------------


// se nome for valido entao faz upload -----------------------------

if($nome_imagem != null and $nome_imagem_real != null and $extensao_permitida == true){


// endereco final de imagem ---------------------------------------

$endereco_final_salvar_imagem = $destino_da_imagem.$nome_imagem_final; // endereco final de imagem

// ----------------------------------------------------------------------------


// adiciona imagem no banco de dados ---------------------------

$nome_album_identificador = cadastra_imagem_album($endereco_final_salvar_imagem, $endereco_final_salvar_imagem_miniatura, $tipo_privacidade, $idalbum_imagens); // adiciona imagem no banco de dados

// ---------------------------------------------------------------------------


// imagem tamanho real ----------------------------------------------

$image = new SimpleImage(); // nova classe
$image->load($nome_imagem); // carrega imagem
$image->scale($tamanho_escala_imagem_album); // escala ou tamanho de imagem
$image->save($endereco_final_salvar_imagem); // destino final de imagem

// ---------------------------------------------------------------------------


// imagem tamanho miniatura ---------------------------------------

$image = new SimpleImage(); // nova classe
$image->load($nome_imagem); // carrega imagem
$image->scale($tamanho_escala_imagem_album_miniatura); // escala ou tamanho de imagem
$image->save($endereco_final_salvar_imagem_miniatura); // destino final de imagem

// ---------------------------------------------------------------------------


// atualiza o numero de imagens cadastradas ------------

$numero_imagens_cadastrou++;

// -------------------------------------------------------------------------


// nome da ultima imagem adicionada
$nome_ultima_imagem_adicionada = $nome_imagem_final;


};

// ---------------------------------------------------------------------------


};

// ---------------------------------------------------------------------------


// valida numero de imagens cadastradas -------------------

if($numero_imagens_cadastrou == 0 or remove_html($_POST['campo_publica_tipo']) == true){

return null;

};

// ---------------------------------------------------------------------------


// id de usuario
$idusuario = retorne_idusuario_logado();


// nome de usuario
$nome_usuario = func_retorna_nome_de_usuario_por_id($idusuario);


// nome do album da imagem
$nome_album_imagem = $_POST['nome_album_imagem'];


// descricao de imagem
$descricao_imagem = $_POST['descricao_imagem'];


// singular ou plural
if($numero_imagens_cadastrou > 1){

$singular_plural = "$numero_imagens_cadastrou imagens";

}else{

$singular_plural = "$numero_imagens_cadastrou imagem";

};


// conteudo de publicacao
$conteudo_post .= "$nome_usuario, postou $singular_plural no seu álbum $nome_album_imagem.";
$conteudo_post .= "\n\n";


// limpa array de imagens
$_FILES['foto']['name'] = array();


// conteudo de publicacao
$_POST['campo_publicar'] = $conteudo_post;


// query para remover postagens antigas com mesmo idalbum
$query = "delete from $tabela_banco[9] where idusuario='$idusuario' and idalbum_imagens='$idalbum_imagens';";


// dados de publicacao a partir de idalbum
$dados_publicacao = retorne_dados_publicacao_idalbum($idalbum_imagens);


// remove referencia global
remover_referencia_publicacao_global($dados_publicacao['id']);


// remove postagem antiga
comando_executa($query);


// adiciona publicacao
adiciona_publicacao();


};

// --------------------------------------------------------


?>
