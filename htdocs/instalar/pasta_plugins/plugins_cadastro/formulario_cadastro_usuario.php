<?php


// codigo html bruto de usuario ------------

function formulario_cadastro_usuario(){


// globals ----------------------------------------------

global $tamanho_minimo_senha; // tamanho minimo da senha

global $url_pagina_cadastro; // url de pagina de login

global $nome_do_sistema; // nome do sistema

// --------------------------------------------------------


// usuario logou -------------------------------------

$usuario_logou = logar_usuario(); // usuario logou

// --------------------------------------------------------


// tipo de pagina ------------------------------------

$tipo_pagina = retorne_tipo_pagina(); // tipo de pagina

// -------------------------------------------------------


// valida usuario logado --------------------------

if(retorne_esta_logado() == true){

return null; // retorno nulo

};

// --------------------------------------------------------


// dados de formulario ----------------------------

$nome = remove_html($_POST['nome']); // nome

$email = remove_html($_POST['email']); // email

$senha_1 = remove_html($_POST['senha_1']); // senha 1

// -------------------------------------------------------


// numero de itens de array de post ------------

$numero_itens_array_post = retorne_numero_itens_array_post(); // numero de itens de array de post

// -------------------------------------------------------


// retorna se pode cadastrar ---------------------

if($numero_itens_array_post > 0 and $tipo_pagina == 1){

$pode_cadastrar = retorne_pode_cadastrar_usuario(); // retorna se pode cadastrar

};

// -------------------------------------------------------


// adiciona usuario ----------------------------------

if($pode_cadastrar[1] == true and $tipo_pagina == 1){


// adiciona novo usuario --------------------------

adiciona_novo_usuario($nome, $email, $senha_1); // adiciona novo usuario

// -------------------------------------------------------


// conteudo boas vindas --------------------------

$conteudo_boas_vindas .= "Bem vindo(a) ao $nome_do_sistema. $url_do_servidor"; // conteudo boas vindas

// -------------------------------------------------------


// envia email de boas vindas -------------------

enviar_email($email, $nome, $conteudo_boas_vindas); // envia email de boas vindas

// -------------------------------------------------------


// email e senha de login ------------------------

$_POST['email_cadastro'] = $email; // email

$_POST['senha_cadastro'] = $senha_1; // senha

// -------------------------------------------------------


// loga usuario -------------------------------------

logar_usuario(); // loga usuario

// -------------------------------------------------------


// saindo do script ----------------------------------

die; // saindo do script

// --------------------------------------------------------


};

// --------------------------------------------------------


// verifica se esta no modo cadastro ------------

if($pode_cadastrar[1] == false and $numero_itens_array_post > 0 and $tipo_pagina == 1){


// mensagem de cadastro -------------------------

$mensagem_cadastro .= $pode_cadastrar[2]; // mensagem de cadastro

// --------------------------------------------------------


// titulo -------------------------------------------------

$titulo = "Não foi possível cadastrar você!"; // titulo

// --------------------------------------------------------


// adiciona div especial -----------------------------

$mensagem_cadastro = div_especial_mensagem_sistema($titulo, $mensagem_cadastro); // mensagem de sistema

// --------------------------------------------------------


};

// --------------------------------------------------------


// verifica se tentou logar --------------------------

if($usuario_logou == true){


// mensagem de sistema -------------------------

$mensagem_login .= "Parece que você informou seu login com algum erro."; // mensagem de sistema

// --------------------------------------------------------


// titulo -------------------------------------------------

$titulo = "Login incorreto"; // titulo

// --------------------------------------------------------


// adiciona div especial ----------------------------

$mensagem_login = div_especial_mensagem_sistema($titulo, $mensagem_login); // mensagem de sistema

// --------------------------------------------------------


// mensagem de cadastro -----------------------

$mensagem_cadastro = $mensagem_login; // mensagem de cadastro

// --------------------------------------------------------


};

// --------------------------------------------------------


// formulario ------------------------------------------

$codigo_html_bruto .= "<div id='div_formulario_cadastro'>";
$codigo_html_bruto .= retorne_imagem_papel_parede_capa_inicial(1);
$codigo_html_bruto .= "<br>";
$codigo_html_bruto .= $mensagem_cadastro;
$codigo_html_bruto .= "<div class='classe_div_formulario_cadastro_topo'>Crie sua conta grátis no $nome_do_sistema</div>";
$codigo_html_bruto .= "<br>";
$codigo_html_bruto .= "Cadastre-se grátis no $nome_do_sistema é rápido e grátis.";
$codigo_html_bruto .= "<br>";
$codigo_html_bruto .= "Chame seus amigos para o $nome_do_sistema e mantenha-se conectado a eles.";
$codigo_html_bruto .= "<br>";
$codigo_html_bruto .= "<br>";
$codigo_html_bruto .= "<form action='$url_pagina_cadastro' method='post'>";
$codigo_html_bruto .= "<input type='text' name='nome' id='entrada_texto_formulario_nome' placeholder='Seu nome' value='$nome'>";
$codigo_html_bruto .= "<br>";
$codigo_html_bruto .= "<input type='text' name='email' id='entrada_texto_formulario_email' placeholder='Seu e-mail' value='$email'>";
$codigo_html_bruto .= "<br>";
$codigo_html_bruto .= "<input type='password' name='senha_1' id='entrada_texto_formulario_senha_1' placeholder='Uma senha' value='$senha_1'>";
$codigo_html_bruto .= "<br>";
$codigo_html_bruto .= "<input type='password' name='senha_2' id='entrada_texto_formulario_senha_2' placeholder='Confirme a senha'>";
$codigo_html_bruto .= "<br>";
$codigo_html_bruto .= "<input type='submit' value='Cadastrar' class='botao_padrao'>";
$codigo_html_bruto .= "</form>";
$codigo_html_bruto .= "</div>";

// --------------------------------------------------------


// adiciona div especial ----------------------------------

$codigo_html_bruto = div_especial_basica_campos($codigo_html_bruto); // adiciona div especial

// --------------------------------------------------------


// retorna formulario --------------------------------

return $codigo_html_bruto; // retorna formulario

// --------------------------------------------------------


};

// --------------------------------------------------------


?>