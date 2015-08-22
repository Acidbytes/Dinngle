<?php

// retorna o numero de albuns de usuario
function retorne_numero_albuns_usuario($idusuario){


// globals
global $tabela_banco;


// query
$query = "select DISTINCT nome_album_identificador from $tabela_banco[6] where idusuario='$idusuario';"; // query


// retorna numero de linhas
return retorne_numero_linhas_query($query);


};

?>