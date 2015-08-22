<?php


// constroe gerenciar musia de usuario -------------

function constroe_gerenciar_musica_usuario(){


// codigo html bruto --------------------------------------

$codigo_html_bruto .= campo_adicionar_musica();
$codigo_html_bruto .= montar_barra_progresso("barra_progresso_upload_musica_usuario");

// -------------------------------------------------------------


// retorno ---------------------------------------------------

return $codigo_html_bruto; // retorno

// -------------------------------------------------------------


};

// -------------------------------------------------------------


?>