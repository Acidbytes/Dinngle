<?php


// retorna a pasta pessoal de usuario logado ----------

function retorne_pasta_pessoal_usuario_logado(){


// globals -------------------------------------------------------

global $pasta_arquivos_usuarios; // pasta de arquivos

// ------------------------------------------------------------------


// id de usuario logado ---------------------------------------

$idusuario_logado = retorne_idusuario_logado(); // id de usuario logado

// ------------------------------------------------------------------


// pasta de album ----------------------------------------------

$pasta_retorno = "../".$pasta_arquivos_usuarios."/pasta_usuario/".$idusuario_logado."/".$idusuario_logado."/"; // pasta de perfil

// -------------------------------------------------------------------


// cria pasta se necessario -----------------------------------

criar_pasta($pasta_retorno); // cria pasta se necessario

// -------------------------------------------------------------------


// retorno --------------------------------

return $pasta_retorno; // retorno

// ------------------------------------------


};

// ------------------------------------------------------------------


?>