<?php


// adiciona visita ao perfil
function adicionar_visita_perfil(){


// globals
global $tabela_banco;
global $numero_maximo_visitas_perfil_exibir;


// id usuario
$idusuario = retorne_idusuario_visualizando_perfil();


// usuario dono do perfil
$usuario_dono_perfil = retorna_usuario_vendo_perfil_dono();


// id de usuario logado
$idusuario_logado = retorne_idusuario_logado();


// data atual
$data_atual = data_atual();


// numero de visitas atual
$numero_visitas_atual = retorne_numero_visitas_perfil();


// remove visitas antigas
if($numero_visitas_atual >= $numero_maximo_visitas_perfil_exibir){

remove_visitas_antigas_perfil();

};


// se for o dono do perfil retorne nulo
if($usuario_dono_perfil == true or $idusuario == null or $idusuario_logado == null){

return null;

};


// qurey
$query[] = "delete from $tabela_banco[13] where idusuario='$idusuario' and idamigo='$idusuario_logado';";
$query[] = "insert into $tabela_banco[13] values('null', '$idusuario', '$idusuario_logado', '$data_atual');";


// executa querys
executador_querys($query);


};

?>