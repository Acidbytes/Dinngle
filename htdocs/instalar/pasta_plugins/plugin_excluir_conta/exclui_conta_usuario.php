<?php


// exclui a conta do usuario ------------------------

function exclui_conta_usuario(){


// dados de formulario ------------------------------

$email = remove_html($_POST['email']); // email

$senha = remove_html($_POST['senha']); // senha

// ---------------------------------------------------------


// valida email e senha ------------------------------

if($email == null or $senha == null or retorne_esta_logado() == false or retorne_super_usuario() == true){

return null; // retorno nulo

};

// ---------------------------------------------------------


// cifra a senha ---------------------------------------

$senha = cifra_senha_md5($senha); // senha

// ---------------------------------------------------------


// informa se login existe ---------------------------

$login_existe = retorne_usuario_existe($email, $senha); // informa se login existe

// ---------------------------------------------------------


// valida existencia de usuario --------------------

if($login_existe == false or $email != email_cookie() or $senha != senha_cookie() or retorne_esta_logado() == false){

return null; // retorno

};

// ---------------------------------------------------------


// id de usuario logado ------------------------------

$idusuario = retorne_idusuario_logado(); // id de usuario logado

// ---------------------------------------------------------


// exclui pasta pessoal ------------------------------

excluir_pastas_subpastas(retorne_pasta_pessoal_usuario_logado()); // exclui pasta pessoal

// ---------------------------------------------------------


// remove referencia em todas as tabelas ------

remove_referencia_tabelas(); // remove referencia em todas as tabelas

// ---------------------------------------------------------


// logout ------------------------------------------------

logout(null); // logout

// ---------------------------------------------------------


};

// --------------------------------------------------------


?>