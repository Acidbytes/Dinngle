<?php


// constroe o perfil geral do usuario
function constroe_perfil_geral_usuario(){

// id de usuario
$idusuario = retorne_idusuario_get(); // id de usuario

// valida exibir perfil de usuario
if(retorne_status_amizade($idusuario) != 2 and retorna_usuario_vendo_perfil_dono() == false){

// nome do usuario
$nome = func_retorna_nome_de_usuario_por_id($idusuario);

// titulo de mensagem
$titulo_mensagem = "Perfíl de $nome";

// mensagem de retorno
$mensagem_retorno .= "Você não é amigo de $nome, somente amigos podem visualizar o seu perfíl.";

// retorno
return div_especial_mensagem_sistema($titulo_mensagem, $mensagem_retorno);

};

// dados de usuario
$dados_usuario = retorna_dados_usuario_array($idusuario); // dados de usuario

// dados de usuario
$nome = func_retorna_nome_de_usuario_por_id($idusuario); // nome do usuario
$data_nascimento = $dados_usuario['data_nascimento']; // dados de usuario
$estado = retorne_link_pesquisa_montado($dados_usuario['estado'], 3); // dados de usuario
$sobre_usuario = $dados_usuario['sobre_usuario']; // dados de usuario
$sexo = retorne_link_pesquisa_montado($dados_usuario['sexo'], 6); // dados de usuario
$estado_civil = retorne_link_pesquisa_montado($dados_usuario['estado_civil'], 8); // dados de usuario
$cidade = retorne_link_pesquisa_montado($dados_usuario['cidade'], 2); // dados de usuario
$telefone = $dados_usuario['telefone']; // dados de usuario
$site = retorne_link_pesquisa_montado($dados_usuario['site'], 4); // dados de usuario
$tribo_urbana = $dados_usuario['tribo_urbana']; // dados de usuario

// nome link de usuario
$nome_link_usuario = retorna_link_perfil_usuario($idusuario); // nome link de usuario

// codigo html
$codigo_html .= "<div class='classe_div_separa_elemento_perfil'>";
$codigo_html .= "<div class='classe_div_separa_elemento_perfil_div_1'>";
$codigo_html .= "Nome";
$codigo_html .= ":";
$codigo_html .= "</div>";
$codigo_html .= "<div class='classe_div_separa_elemento_perfil_div_2'>";
$codigo_html .= $nome_link_usuario;
$codigo_html .= "</div>";
$codigo_html .= "</div>";

// valida
if($data_nascimento != null){

$codigo_html .= "<div class='classe_div_separa_elemento_perfil'>";
$codigo_html .= "<div class='classe_div_separa_elemento_perfil_div_1'>";
$codigo_html .= "Aniversário";
$codigo_html .= ":";
$codigo_html .= "</div>";
$codigo_html .= "<div class='classe_div_separa_elemento_perfil_div_2'>";
$codigo_html .= $data_nascimento;
$codigo_html .= "</div>";
$codigo_html .= "</div>";

};

// valida
if($data_nascimento != null){

$codigo_html .= "<div class='classe_div_separa_elemento_perfil'>";
$codigo_html .= "<div class='classe_div_separa_elemento_perfil_div_1'>";
$codigo_html .= "Idade";
$codigo_html .= ":";
$codigo_html .= "</div>";
$codigo_html .= "<div class='classe_div_separa_elemento_perfil_div_2'>";
$codigo_html .= calcula_idade($data_nascimento);
$codigo_html .= "&nbsp;";
$codigo_html .= "anos";
$codigo_html .= "</div>";
$codigo_html .= "</div>";

};

// valida
if($cidade != null){

$codigo_html .= "<div class='classe_div_separa_elemento_perfil'>";
$codigo_html .= "<div class='classe_div_separa_elemento_perfil_div_1'>";
$codigo_html .= "Cidade";
$codigo_html .= ":";
$codigo_html .= "</div>";
$codigo_html .= "<div class='classe_div_separa_elemento_perfil_div_2'>";
$codigo_html .= $cidade;
$codigo_html .= "</div>";
$codigo_html .= "</div>";

};

// valida
if($estado != null){

$codigo_html .= "<div class='classe_div_separa_elemento_perfil'>";
$codigo_html .= "<div class='classe_div_separa_elemento_perfil_div_1'>";
$codigo_html .= "Estado";
$codigo_html .= ":";
$codigo_html .= "</div>";
$codigo_html .= "<div class='classe_div_separa_elemento_perfil_div_2'>";
$codigo_html .= $estado;
$codigo_html .= "</div>";
$codigo_html .= "</div>";

};

// valida
if($estado_civil != null){

$codigo_html .= "<div class='classe_div_separa_elemento_perfil'>";
$codigo_html .= "<div class='classe_div_separa_elemento_perfil_div_1'>";
$codigo_html .= "Estado civil";
$codigo_html .= ":";
$codigo_html .= "</div>";
$codigo_html .= "<div class='classe_div_separa_elemento_perfil_div_2'>";
$codigo_html .= $estado_civil;
$codigo_html .= "</div>";
$codigo_html .= "</div>";

};

// valida
if($sexo != null){

$codigo_html .= "<div class='classe_div_separa_elemento_perfil'>";
$codigo_html .= "<div class='classe_div_separa_elemento_perfil_div_1'>";
$codigo_html .= "Gênero";
$codigo_html .= ":";
$codigo_html .= "</div>";
$codigo_html .= "<div class='classe_div_separa_elemento_perfil_div_2'>";
$codigo_html .= $sexo;
$codigo_html .= "</div>";
$codigo_html .= "</div>";

};

// valida
if($telefone != null){

$codigo_html .= "<div class='classe_div_separa_elemento_perfil'>";
$codigo_html .= "<div class='classe_div_separa_elemento_perfil_div_1'>";
$codigo_html .= "Telefone";
$codigo_html .= ":";
$codigo_html .= "</div>";
$codigo_html .= "<div class='classe_div_separa_elemento_perfil_div_2'>";
$codigo_html .= $telefone;
$codigo_html .= "</div>";
$codigo_html .= "</div>";

};

// valida
if($site != null){

$codigo_html .= "<div class='classe_div_separa_elemento_perfil'>";
$codigo_html .= "<div class='classe_div_separa_elemento_perfil_div_1'>";
$codigo_html .= "Website";
$codigo_html .= ":";
$codigo_html .= "</div>";
$codigo_html .= "<div class='classe_div_separa_elemento_perfil_div_2'>";
$codigo_html .= $site;
$codigo_html .= "</div>";
$codigo_html .= "</div>";

};

// valida
if($tribo_urbana != null){

$codigo_html .= "<div class='classe_div_separa_elemento_perfil'>";
$codigo_html .= "<div class='classe_div_separa_elemento_perfil_div_1'>";
$codigo_html .= "Estilo musical";
$codigo_html .= ":";
$codigo_html .= "</div>";
$codigo_html .= "<div class='classe_div_separa_elemento_perfil_div_2'>";
$codigo_html .= $tribo_urbana;
$codigo_html .= "</div>";
$codigo_html .= "</div>";

};

// adiciona hashtag
$codigo_html = gera_link_hashtag($codigo_html); // adiciona hashtag

// adiciona div basica
$codigo_html = constroe_div_especial_geral($nome, $codigo_html, null); // adiciona div basica

// completa perfil
$codigo_html .= constroe_perfil_completo_usuario();
$codigo_html .= carrega_lista_usuarios(1, 2);
$codigo_html .= constroe_carregar_imagens($dados);

// retorno
return $codigo_html; // retorno

};

?>