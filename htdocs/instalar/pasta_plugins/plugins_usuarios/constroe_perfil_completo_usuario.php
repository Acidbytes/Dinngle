<?php

// constroe o perfil completo do usuario
function constroe_perfil_completo_usuario(){


// globals
global $tabela_banco;


// id de usuario
$idusuario = retorne_idusuario_visualizando_perfil();

$idusuario_logado = retorne_idusuario_logado();


// query
$query = "select *from $tabela_banco[30] where idusuario='$idusuario';";


// dados
$dados = retorne_dados_query($query);


// valida dados de usuario existem
if(retorne_numero_linhas_query($query) == 0){

return null;

};


// separa dados
$ensino_medio = retorne_link_pesquisa_montado($dados['ensino_medio'], 17);
$ensino_medio_ano = retorne_link_pesquisa_montado($dados['ensino_medio_ano'], 17);
$faculdade = retorne_link_pesquisa_montado($dados['faculdade'], 17);
$faculdade_ano = retorne_link_pesquisa_montado($dados['faculdade_ano'], 17);
$habilidade_profissional = retorne_link_pesquisa_montado($dados['habilidade_profissional'], 17);
$trabalha_onde = retorne_link_pesquisa_montado($dados['trabalha_onde'], 17);
$trabalha_onde_ano = retorne_link_pesquisa_montado($dados['trabalha_onde_ano'], 17);
$interesse_sexual = retorne_link_pesquisa_montado($dados['interesse_sexual'], 17);
$endereco = retorne_link_pesquisa_montado($dados['endereco'], 17);
$religiao = retorne_link_pesquisa_montado($dados['religiao'], 17);
$politica = retorne_link_pesquisa_montado($dados['politica'], 17);
$apelido = retorne_link_pesquisa_montado($dados['apelido'], 17);
$citacao = retorne_link_pesquisa_montado($dados['citacao'], 17);
$odeia = retorne_link_pesquisa_montado($dados['odeia'], 17);
$cidade_natal = retorne_link_pesquisa_montado($dados['cidade_natal'], 17);
$livros = retorne_link_pesquisa_montado($dados['livros'], 17);
$cinema = retorne_link_pesquisa_montado($dados['cinema'], 17);
$tv = retorne_link_pesquisa_montado($dados['tv'], 17);
$atividades = retorne_link_pesquisa_montado($dados['atividades'], 17);
$jogos = retorne_link_pesquisa_montado($dados['jogos'], 17);


// codigo html
// valida
if($ensino_medio_ano != null){

$codigo_html .= "<div class='classe_div_separa_elemento_perfil'>";
$codigo_html .= "<div class='classe_div_separa_elemento_perfil_div_1'>";
$codigo_html .= "Ensino médio";
$codigo_html .= ":";
$codigo_html .= "</div>";
$codigo_html .= "<div class='classe_div_separa_elemento_perfil_div_2'>";
$codigo_html .= "$ensino_medio - ano $ensino_medio_ano";
$codigo_html .= "</div>";
$codigo_html .= "</div>";

};


// valida
if($faculdade_ano != null){

$codigo_html .= "<div class='classe_div_separa_elemento_perfil'>";
$codigo_html .= "<div class='classe_div_separa_elemento_perfil_div_1'>";
$codigo_html .= "Faculdade";
$codigo_html .= ":";
$codigo_html .= "</div>";
$codigo_html .= "<div class='classe_div_separa_elemento_perfil_div_2'>";
$codigo_html .= "$faculdade - ano $faculdade_ano";
$codigo_html .= "</div>";
$codigo_html .= "</div>";

};


// valida
if($habilidade_profissional != null){

$codigo_html .= "<div class='classe_div_separa_elemento_perfil'>";
$codigo_html .= "<div class='classe_div_separa_elemento_perfil_div_1'>";
$codigo_html .= "Habilidades profissionais";
$codigo_html .= ":";
$codigo_html .= "</div>";
$codigo_html .= "<div class='classe_div_separa_elemento_perfil_div_2'>";
$codigo_html .= "$habilidade_profissional";
$codigo_html .= "</div>";
$codigo_html .= "</div>";

};


// valida
if($trabalha_onde_ano != null){

$codigo_html .= "<div class='classe_div_separa_elemento_perfil'>";
$codigo_html .= "<div class='classe_div_separa_elemento_perfil_div_1'>";
$codigo_html .= "Trabalhando em";
$codigo_html .= ":";
$codigo_html .= "</div>";
$codigo_html .= "<div class='classe_div_separa_elemento_perfil_div_2'>";
$codigo_html .= "$trabalha_onde - ano $trabalha_onde_ano";
$codigo_html .= "</div>";
$codigo_html .= "</div>";

};


// valida
if($interesse_sexual != null){

$codigo_html .= "<div class='classe_div_separa_elemento_perfil'>";
$codigo_html .= "<div class='classe_div_separa_elemento_perfil_div_1'>";
$codigo_html .= "Gosta de";
$codigo_html .= ":";
$codigo_html .= "</div>";
$codigo_html .= "<div class='classe_div_separa_elemento_perfil_div_2'>";
$codigo_html .= "$interesse_sexual";
$codigo_html .= "</div>";
$codigo_html .= "</div>";

};


// valida
if($endereco != null){

$codigo_html .= "<div class='classe_div_separa_elemento_perfil'>";
$codigo_html .= "<div class='classe_div_separa_elemento_perfil_div_1'>";
$codigo_html .= "Endereço";
$codigo_html .= ":";
$codigo_html .= "</div>";
$codigo_html .= "<div class='classe_div_separa_elemento_perfil_div_2'>";
$codigo_html .= "$endereco";
$codigo_html .= "</div>";
$codigo_html .= "</div>";

};


// valida
if($religiao != null){

$codigo_html .= "<div class='classe_div_separa_elemento_perfil'>";
$codigo_html .= "<div class='classe_div_separa_elemento_perfil_div_1'>";
$codigo_html .= "Religião";
$codigo_html .= ":";
$codigo_html .= "</div>";
$codigo_html .= "<div class='classe_div_separa_elemento_perfil_div_2'>";
$codigo_html .= "$religiao";
$codigo_html .= "</div>";
$codigo_html .= "</div>";

};


// valida
if($politica != null){

$codigo_html .= "<div class='classe_div_separa_elemento_perfil'>";
$codigo_html .= "<div class='classe_div_separa_elemento_perfil_div_1'>";
$codigo_html .= "Política";
$codigo_html .= ":";
$codigo_html .= "</div>";
$codigo_html .= "<div class='classe_div_separa_elemento_perfil_div_2'>";
$codigo_html .= "$politica";
$codigo_html .= "</div>";
$codigo_html .= "</div>";

};


// valida
if($apelido != null){

$codigo_html .= "<div class='classe_div_separa_elemento_perfil'>";
$codigo_html .= "<div class='classe_div_separa_elemento_perfil_div_1'>";
$codigo_html .= "Apelido";
$codigo_html .= ":";
$codigo_html .= "</div>";
$codigo_html .= "<div class='classe_div_separa_elemento_perfil_div_2'>";
$codigo_html .= "$apelido";
$codigo_html .= "</div>";
$codigo_html .= "</div>";

};


// valida
if($citacao != null){

$codigo_html .= "<div class='classe_div_separa_elemento_perfil'>";
$codigo_html .= "<div class='classe_div_separa_elemento_perfil_div_1'>";
$codigo_html .= "Citação favoríta";
$codigo_html .= ":";
$codigo_html .= "</div>";
$codigo_html .= "<div class='classe_div_separa_elemento_perfil_div_2'>";
$codigo_html .= "$citacao";
$codigo_html .= "</div>";
$codigo_html .= "</div>";

};


// valida
if($odeia != null){

$codigo_html .= "<div class='classe_div_separa_elemento_perfil'>";
$codigo_html .= "<div class='classe_div_separa_elemento_perfil_div_1'>";
$codigo_html .= "Odeia";
$codigo_html .= ":";
$codigo_html .= "</div>";
$codigo_html .= "<div class='classe_div_separa_elemento_perfil_div_2'>";
$codigo_html .= "$odeia";
$codigo_html .= "</div>";
$codigo_html .= "</div>";

};


// valida
if($cidade_natal != null){

$codigo_html .= "<div class='classe_div_separa_elemento_perfil'>";
$codigo_html .= "<div class='classe_div_separa_elemento_perfil_div_1'>";
$codigo_html .= "Cidade em que nasceu";
$codigo_html .= ":";
$codigo_html .= "</div>";
$codigo_html .= "<div class='classe_div_separa_elemento_perfil_div_2'>";
$codigo_html .= "$cidade_natal";
$codigo_html .= "</div>";
$codigo_html .= "</div>";

};


// valida
if($livros != null){

$codigo_html .= "<div class='classe_div_separa_elemento_perfil'>";
$codigo_html .= "<div class='classe_div_separa_elemento_perfil_div_1'>";
$codigo_html .= "Livros que já leu";
$codigo_html .= ":";
$codigo_html .= "</div>";
$codigo_html .= "<div class='classe_div_separa_elemento_perfil_div_2'>";
$codigo_html .= "$livros";
$codigo_html .= "</div>";
$codigo_html .= "</div>";

};


// valida
if($cinema != null){

$codigo_html .= "<div class='classe_div_separa_elemento_perfil'>";
$codigo_html .= "<div class='classe_div_separa_elemento_perfil_div_1'>";
$codigo_html .= "Filmes que já assistiu";
$codigo_html .= ":";
$codigo_html .= "</div>";
$codigo_html .= "<div class='classe_div_separa_elemento_perfil_div_2'>";
$codigo_html .= "$cinema";
$codigo_html .= "</div>";
$codigo_html .= "</div>";

};


// valida
if($tv != null){

$codigo_html .= "<div class='classe_div_separa_elemento_perfil'>";
$codigo_html .= "<div class='classe_div_separa_elemento_perfil_div_1'>";
$codigo_html .= "Programas de TV favorítos";
$codigo_html .= ":";
$codigo_html .= "</div>";
$codigo_html .= "<div class='classe_div_separa_elemento_perfil_div_2'>";
$codigo_html .= "$tv";
$codigo_html .= "</div>";
$codigo_html .= "</div>";

};


// valida
if($atividades != null){

$codigo_html .= "<div class='classe_div_separa_elemento_perfil'>";
$codigo_html .= "<div class='classe_div_separa_elemento_perfil_div_1'>";
$codigo_html .= "Atividades que interessa";
$codigo_html .= ":";
$codigo_html .= "</div>";
$codigo_html .= "<div class='classe_div_separa_elemento_perfil_div_2'>";
$codigo_html .= "$atividades";
$codigo_html .= "</div>";
$codigo_html .= "</div>";

};


// valida
if($jogos != null){

$codigo_html .= "<div class='classe_div_separa_elemento_perfil'>";
$codigo_html .= "<div class='classe_div_separa_elemento_perfil_div_1'>";
$codigo_html .= "Jogos favorítos";
$codigo_html .= ":";
$codigo_html .= "</div>";
$codigo_html .= "<div class='classe_div_separa_elemento_perfil_div_2'>";
$codigo_html .= "$jogos";
$codigo_html .= "</div>";
$codigo_html .= "</div>";

};


// retorno
return $codigo_html;


};


?>