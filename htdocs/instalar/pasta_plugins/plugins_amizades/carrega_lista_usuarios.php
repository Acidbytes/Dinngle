<?php


// carrega lista de usuarios ------------------------

function carrega_lista_usuarios($tipo_carregar, $tipo_exibir){


// tipo carregar ---------------------------------------

// 1 carrega amigos aceitos
// 2 carrega solicitacoes de amizades que enviou
// 3 carrega solicitacoes de amizades que recebeu
// 4 carrega usuarios por hashtags
// 5 carrega usuarios proximos
// 6 usuarios comentaram
// 7 usuarios curtiram
// 8 usuarios compartilharam
// 9 usuarios seguidores

// ---------------------------------------------------------


// tipo exibir --------------------------------------------

// 1 exibe usuarios normal
// 2 exibe usuarios miniatura

// ---------------------------------------------------------


// globals -----------------------------------------------

global $tabela_banco; // tabela de banco

// ---------------------------------------------------------


// limit tabela ------------------------------------------

$limit_tabela = retorne_limit_tabela_get(); // limit tabela

// ---------------------------------------------------------


// array com pacotes de ids de usuarios --------

$array_pacote_idusuarios = array(); // array com pacotes de ids de usuarios

// ---------------------------------------------------------


// informa se o usuario e o dono do perfil ------

$usuario_dono_perfil_resposta = retorna_usuario_vendo_perfil_dono(); // informa se o usuario e o dono do perfil

// --------------------------------------------------------


// id de usuario que visualiza o perfil -----------

# impede usuarios de verem solicitacoes de amizades
# de outras pessoas!

if($tipo_carregar == 2){

$idusuario = retorne_idusuario_logado(); // id de usuario logado

}else{

$idusuario = retorne_idusuario_visualizando_perfil(); // id de usuario que visualiza o perfil

};

// ---------------------------------------------------------


// verifica tipo de query a ser criada -------------

switch($tipo_carregar){


case 1:
$query = "select *from $tabela_banco[4] where idusuario='$idusuario' and aceitou='2' $limit_tabela;"; // amigos aceitos
$query_sem_limite = "select *from $tabela_banco[4] where idusuario='$idusuario' and aceitou='2';"; // amigos aceitos
break;


case 2:
$query = "select *from $tabela_banco[4] where idusuario='$idusuario' and aceitou='3' and tipo_solicita='2' $limit_tabela;"; // solicitacoes de amizades
$query_sem_limite = "select *from $tabela_banco[4] where idusuario='$idusuario' and aceitou='3' and tipo_solicita='2';"; // solicitacoes de amizades
break;


case 3:
$query = "select *from $tabela_banco[4] where idusuario='$idusuario' and aceitou='3' and tipo_solicita='1' $limit_tabela;"; // solicitacoes de amizades
$query_sem_limite = "select *from $tabela_banco[4] where idusuario='$idusuario' and aceitou='3' and tipo_solicita='1';"; // solicitacoes de amizades
break;


};

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


// numero de linhas sem limite --------------------

$numero_linhas_sem_limite = retorne_numero_linhas_query($query_sem_limite); // numero de linhas sem limite

// ---------------------------------------------------------


// carregando ids de usuarios ---------------------

for($contador == $contador; $contador <= $numero_linhas; $contador++){


// dados ------------------------------------------------

$dados = mysql_fetch_array($comando, MYSQL_ASSOC); // dados

// ---------------------------------------------------------


// id de usuario de tabela ---------------------------

$idusuario_tabela = $dados['idamigo']; // id de usuario de tabela

// ---------------------------------------------------------


// atualizando ids de usuarios ---------------------

if($idusuario_tabela != null){

$array_pacote_idusuarios[] = $idusuario_tabela; // atualizando ids de usuarios

};

// ---------------------------------------------------------


};

// ---------------------------------------------------------


// pacote com usuarios listados -------------------

$pacote_usuarios = monta_pacotes_usuarios($array_pacote_idusuarios, $tipo_exibir); // pacote com usuarios listados

// ---------------------------------------------------------


// paginacao -------------------------------------------

$paginacao .= ""; // paginacao
$paginacao .= monta_paginas_paginacao($numero_linhas_sem_limite); // paginacao
$paginacao .= ""; // paginacao

// ---------------------------------------------------------


// adiciona paginacao -------------------------------

$pacote_usuarios .= $paginacao; // adiciona paginacao

// ---------------------------------------------------------


// retorno -----------------------------------------------

return $pacote_usuarios; // retorno

// ---------------------------------------------------------


};

// --------------------------------------------------------


?>