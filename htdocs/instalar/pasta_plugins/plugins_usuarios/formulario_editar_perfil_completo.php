<?php

// formulario editar perfil completo
function formulario_editar_perfil_completo(){


// globals
global $tabela_banco;
global $enderecos_arquivos_php_uteis;


// endereco script salvar
$url_script_salvar = $enderecos_arquivos_php_uteis['salvar_perfil_completo'];


// id de usuario logado
$idusuario_logado = retorne_idusuario_logado();


// query
$query = "select *from $tabela_banco[30] where idusuario='$idusuario_logado';";


// dados
$dados = retorne_dados_query($query);


// separa dados
$ensino_medio = $dados['ensino_medio'];
$ensino_medio_ano = $dados['ensino_medio_ano'];
$faculdade = $dados['faculdade'];
$faculdade_ano = $dados['faculdade_ano'];
$habilidade_profissional = $dados['habilidade_profissional'];
$trabalha_onde = $dados['trabalha_onde'];
$trabalha_onde_ano = $dados['trabalha_onde_ano'];
$interesse_sexual = $dados['interesse_sexual'];
$endereco = $dados['endereco'];
$religiao = $dados['religiao'];
$politica = $dados['politica'];
$apelido = $dados['apelido'];
$citacao = $dados['citacao'];
$odeia = $dados['odeia'];
$cidade_natal = $dados['cidade_natal'];
$livros = $dados['livros'];
$cinema = $dados['cinema'];
$tv = $dados['tv'];
$atividades = $dados['atividades'];
$jogos = $dados['jogos'];


// campos extras de formulario
$campo_ano_ensino_medio = campo_ano_formulario($ensino_medio_ano, "ensino_medio_ano");
$campo_ano_faculdade = campo_ano_formulario($faculdade_ano, "faculdade_ano");
$campo_ano_trabalha_onde = campo_ano_formulario($trabalha_onde_ano, "trabalha_onde_ano");
$campo_interesse_sexual = campo_interesse_sexual_formulario($interesse_sexual, "interesse_sexual");


// codigo html
$codigo_html .= "<div class='classe_formulario_editar_perfil'>";
$codigo_html .= "<form action='$url_script_salvar' method='post'>";
$codigo_html .= "<div class='classe_div_separa_desc_campo_formulario'>";
$codigo_html .= "Ensino médio";
$codigo_html .= ":";
$codigo_html .= "</div>";
$codigo_html .= "<input value='$ensino_medio' type='text' name='ensino_medio'>";
$codigo_html .= "<br>";
$codigo_html .= "<div class='classe_div_separa_desc_campo_formulario'>";
$codigo_html .= "Ano";
$codigo_html .= ":";
$codigo_html .= "</div>";
$codigo_html .= $campo_ano_ensino_medio;
$codigo_html .= "<br>";
$codigo_html .= "<div class='classe_div_separa_desc_campo_formulario'>";
$codigo_html .= "Faculdade";
$codigo_html .= ":";
$codigo_html .= "</div>";
$codigo_html .= "<input value='$faculdade' type='text' name='faculdade'>";
$codigo_html .= "<br>";
$codigo_html .= "<div class='classe_div_separa_desc_campo_formulario'>";
$codigo_html .= "Ano";
$codigo_html .= ":";
$codigo_html .= "</div>";
$codigo_html .= $campo_ano_faculdade;
$codigo_html .= "<br>";
$codigo_html .= "<div class='classe_div_separa_desc_campo_formulario'>";
$codigo_html .= "Habilidade profissional";
$codigo_html .= ":";
$codigo_html .= "</div>";
$codigo_html .= "<input value='$habilidade_profissional' type='text' name='habilidade_profissional'>";
$codigo_html .= "<br>";
$codigo_html .= "<div class='classe_div_separa_desc_campo_formulario'>";
$codigo_html .= "Onde você trabalha";
$codigo_html .= ":";
$codigo_html .= "</div>";
$codigo_html .= "<input value='$trabalha_onde' type='text' name='trabalha_onde'>";
$codigo_html .= "<br>";
$codigo_html .= "<div class='classe_div_separa_desc_campo_formulario'>";
$codigo_html .= "Ano";
$codigo_html .= ":";
$codigo_html .= "</div>";
$codigo_html .= $campo_ano_trabalha_onde;
$codigo_html .= "<br>";
$codigo_html .= "<div class='classe_div_separa_desc_campo_formulario'>";
$codigo_html .= "Interesso por";
$codigo_html .= ":";
$codigo_html .= "</div>";
$codigo_html .= $campo_interesse_sexual;
$codigo_html .= "<br>";
$codigo_html .= "<div class='classe_div_separa_desc_campo_formulario'>";
$codigo_html .= "Endereço";
$codigo_html .= ":";
$codigo_html .= "</div>";
$codigo_html .= "<input value='$endereco' type='text' name='endereco'>";
$codigo_html .= "<br>";
$codigo_html .= "<div class='classe_div_separa_desc_campo_formulario'>";
$codigo_html .= "Religião";
$codigo_html .= ":";
$codigo_html .= "</div>";
$codigo_html .= "<input value='$religiao' type='text' name='religiao'>";
$codigo_html .= "<br>";
$codigo_html .= "<div class='classe_div_separa_desc_campo_formulario'>";
$codigo_html .= "Política";
$codigo_html .= ":";
$codigo_html .= "</div>";
$codigo_html .= "<input value='$politica' type='text' name='politica'>";
$codigo_html .= "<br>";
$codigo_html .= "<div class='classe_div_separa_desc_campo_formulario'>";
$codigo_html .= "Apelido";
$codigo_html .= ":";
$codigo_html .= "</div>";
$codigo_html .= "<input value='$apelido' type='text' name='apelido'>";
$codigo_html .= "<br>";
$codigo_html .= "<div class='classe_div_separa_desc_campo_formulario'>";
$codigo_html .= "Citação favoríta";
$codigo_html .= ":";
$codigo_html .= "</div>";
$codigo_html .= "<input value='$citacao' type='text' name='citacao'>";
$codigo_html .= "<br>";
$codigo_html .= "<div class='classe_div_separa_desc_campo_formulario'>";
$codigo_html .= "O que eu odeio";
$codigo_html .= ":";
$codigo_html .= "</div>";
$codigo_html .= "<input value='$odeia' type='text' name='odeia'>";
$codigo_html .= "<br>";
$codigo_html .= "<div class='classe_div_separa_desc_campo_formulario'>";
$codigo_html .= "Cidade que nasci";
$codigo_html .= ":";
$codigo_html .= "</div>";
$codigo_html .= "<input value='$cidade_natal' type='text' name='cidade_natal'>";
$codigo_html .= "<br>";
$codigo_html .= "<div class='classe_div_separa_desc_campo_formulario'>";
$codigo_html .= "Livros que já li";
$codigo_html .= ":";
$codigo_html .= "</div>";
$codigo_html .= "<textarea cols='25' rows='3' name='livros'>$livros</textarea>";
$codigo_html .= "<br>";
$codigo_html .= "<div class='classe_div_separa_desc_campo_formulario'>";
$codigo_html .= "Filmes que já assisti";
$codigo_html .= ":";
$codigo_html .= "</div>";
$codigo_html .= "<textarea cols='25' rows='3' name='cinema'>$cinema</textarea>";
$codigo_html .= "<br>";
$codigo_html .= "<div class='classe_div_separa_desc_campo_formulario'>";
$codigo_html .= "Programas de TV que gosto";
$codigo_html .= ":";
$codigo_html .= "</div>";
$codigo_html .= "<textarea cols='25' rows='3' name='tv'>$tv</textarea>";
$codigo_html .= "<br>";
$codigo_html .= "<div class='classe_div_separa_desc_campo_formulario'>";
$codigo_html .= "Como eu me divirto";
$codigo_html .= ":";
$codigo_html .= "</div>";
$codigo_html .= "<textarea cols='25' rows='3' name='atividades'>$atividades</textarea>";
$codigo_html .= "<br>";
$codigo_html .= "<div class='classe_div_separa_desc_campo_formulario'>";
$codigo_html .= "Jogos que gosto";
$codigo_html .= ":";
$codigo_html .= "</div>";
$codigo_html .= "<textarea cols='25' rows='3' name='jogos'>$jogos</textarea>";
$codigo_html .= "<br>";
$codigo_html .= "<div class='classe_div_campo_salvar_editar_perfil'>";
$codigo_html .= "<input type='submit' class='botao_padrao' value='Salvar'>";
$codigo_html .= "</div>";
$codigo_html .= "</form>";
$codigo_html .= "</div>";


// adiciona div especial
$codigo_html = constroe_div_especial_geral("Mais sobre mim", $codigo_html, null);


// retorno
return $codigo_html;


};

?>