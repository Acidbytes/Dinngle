<?php

// conecta ao mysql
conecta_mysql(true); // conecta ao mysql

// id de usuario modo get
$idusuario = retorne_idusuario_get(); // id de usuario modo get

// verifica se esta logado
if(retorne_esta_logado() == false or retorna_perfil_usuario_existe($idusuario) == false){

// tipo de pagina
$_GET['tipo_pagina'] = 2; // tipo de pagina

};

// codigo html bruto
$codigo_html_bruto = monta_pagina(); // codigo html bruto

// desconecta do mysql
desconecta_mysql(); // desconecta do mysql

// exibe codigo html bruto
echo $codigo_html_bruto; // exibe codigo html bruto

?>