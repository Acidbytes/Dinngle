<?php

// constroe campo navegacao de usuario
function constroe_campo_navegacao_usuario(){


// valida usuario logado
if(retorne_esta_logado() == false){

return pagina_inicial_nao_logado();

};


// id de usuario
$idusuario = retorne_idusuario_visualizando_perfil();


// campo navegacao perfil
$codigo_html .= "<div class='div_navegacao_perfil_usuario_logado'>";
$codigo_html .= constroe_campo_editar_perfil();
$codigo_html .= constroe_servicos_perfil($idusuario);
$codigo_html .= "</div>";


// return
return $codigo_html;


};


?>