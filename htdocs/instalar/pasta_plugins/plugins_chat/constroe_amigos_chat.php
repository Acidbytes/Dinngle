<?php


// constroe amigos do chat -------------------------

function constroe_amigos_chat($array_amigos){


// codigo html bruto ---------------------------------

foreach($array_amigos as $idusuario){


// valida idusuario -----------------------------------

if($idusuario != null){


// codigo html bruto --------------------------------

$codigo_html_bruto .= "<div class='div_separa_usuario_chat' onclick='constroe_campo_conversa_chat($idusuario);'>";
$codigo_html_bruto .= constroe_perfil_chat_usuario($idusuario);
$codigo_html_bruto .= "</div>";

// -------------------------------------------------------


};

// --------------------------------------------------------

};

// --------------------------------------------------------


// retorno ----------------------------------------------

return $codigo_html_bruto; // retorno

// --------------------------------------------------------


};

// --------------------------------------------------------


?>