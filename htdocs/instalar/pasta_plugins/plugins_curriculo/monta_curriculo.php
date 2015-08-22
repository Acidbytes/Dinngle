<?php


// mona o curriculo ----------------------------------

function monta_curriculo(){


// dados -----------------------------------------------

$dados_curriculo = retorne_dados_array_curriculo(); // dados

// --------------------------------------------------------


// id usuario visualizando perfil -------------------

$idusuario = retorne_idusuario_visualizando_perfil(); // id usuario visualizando perfil

// --------------------------------------------------------


// separando dados ---------------------------------

$profissao = $dados_curriculo['profissao']; // dados
$objetivo = $dados_curriculo['objetivo']; // dados
$empresas_trabalhou = $dados_curriculo['empresas_trabalhou']; // dados
$formacao = $dados_curriculo['formacao']; // dados
$experiencia = $dados_curriculo['experiencia']; // dados
$idiomas = $dados_curriculo['idiomas']; // dados
$email = $dados_curriculo['email']; // dados
$telefone = $dados_curriculo['telefone']; // dados
$endereco = $dados_curriculo['endereco']; // dados
$adicionais = $dados_curriculo['adicionais']; // dados
$projetos = $dados_curriculo['projetos']; // dados
$empregado = $dados_curriculo['empregado']; // dados

// --------------------------------------------------------


// adiciona link de pesquisa -----------------------

$profissao = retorne_link_pesquisa_montado($dados_curriculo['profissao'], 11); // dados
$projetos = retorne_link_pesquisa_montado($dados_curriculo['projetos'], 12); // dados
$formacao = retorne_link_pesquisa_montado($dados_curriculo['formacao'], 13); // dados
$experiencia = retorne_link_pesquisa_montado($dados_curriculo['experiencia'], 14); // dados

// --------------------------------------------------------


// dados do usuario ---------------------------------

$dados_usuario = retorna_dados_usuario_array($idusuario); // dados do usuario

// --------------------------------------------------------


// nome do usuario ----------------------------------

$nome_usuario = func_retorna_nome_de_usuario_por_id($idusuario); // nome do usuario

// --------------------------------------------------------


// cidade e estado -----------------------------------

$endereco_local = $dados_usuario['cidade']."%20".$dados_usuario['estado']; // cidade e estado

// --------------------------------------------------------


// codigo html bruto ---------------------------------

$codigo_html_bruto .= "<div id='div_curriculo_usuario' class='classe_perfil_curriculo_usuario'>";
$codigo_html_bruto .= constroe_imagem_perfil_miniatura($idusuario);
$codigo_html_bruto .= "<br>";
$codigo_html_bruto .= "<br>";
$codigo_html_bruto .= "<li><b><font size='6'><i>$nome_usuario</i></font></b>";
$codigo_html_bruto .= "<br>";
$codigo_html_bruto .= "Nascimento: ";
$codigo_html_bruto .= $dados_usuario['data_nascimento'];
$codigo_html_bruto .= ", ";
$codigo_html_bruto .= $dados_usuario['estado_civil'];
$codigo_html_bruto .= ", ";
$codigo_html_bruto .= $dados_usuario['sexo'];
$codigo_html_bruto .= "<br>";
$codigo_html_bruto .= "<br>";
$codigo_html_bruto .= "<li><b><font size='4'>Contato</font></b>";
$codigo_html_bruto .= "<br>";
$codigo_html_bruto .= "Endereço: $endereco";
$codigo_html_bruto .= "<br>";
$codigo_html_bruto .= "Telefone: $telefone";
$codigo_html_bruto .= "<br>";
$codigo_html_bruto .= "E-mail: $email";
$codigo_html_bruto .= "<br>";
$codigo_html_bruto .= "<br>";
$codigo_html_bruto .= "<li><b><font size='4'>Experiência profissional</font></b>";
$codigo_html_bruto .= "<br>";
$codigo_html_bruto .= "Profissão: $profissao";
$codigo_html_bruto .= "<br>";
$codigo_html_bruto .= "Objetivos: $objetivo";
$codigo_html_bruto .= "<br>";
$codigo_html_bruto .= "Empresas que trabalhou: $empresas_trabalhou";
$codigo_html_bruto .= "<br>";
$codigo_html_bruto .= "Experiências: $experiencia";
$codigo_html_bruto .= "<br>";
$codigo_html_bruto .= "<br>";
$codigo_html_bruto .= "<li><b><font size='4'>Formação</font></b>";
$codigo_html_bruto .= "<br>";
$codigo_html_bruto .= "Formado em: $formacao";
$codigo_html_bruto .= "<br>";
$codigo_html_bruto .= "Idiomas: $idiomas";
$codigo_html_bruto .= "<br>";
$codigo_html_bruto .= "<br>";
$codigo_html_bruto .= "<li><b><font size='4'>Informações adicionais</font></b>";
$codigo_html_bruto .= "<br>";
$codigo_html_bruto .= "Adicionais: $adicionais";
$codigo_html_bruto .= "<br>";
$codigo_html_bruto .= "Projetos: $projetos";
$codigo_html_bruto .= "<br>";
$codigo_html_bruto .= "Empregado: $empregado";
$codigo_html_bruto .= "</div>";
$codigo_html_bruto .= "<div class='classe_div_imprimir_curriculo_usuario'>";
$codigo_html_bruto .= "<input type='button' class='botao_padrao' value='Imprimir' onclick='imprimir_curriculo();'>";
$codigo_html_bruto .= "</div>";
$codigo_html_bruto .= gerador_mapa($endereco_local);

// --------------------------------------------------------


// adiciona hastags ---------------------------------

$codigo_html_bruto = gera_link_hashtag($codigo_html_bruto); // adiciona hastags

// --------------------------------------------------------


// retorno ----------------------------------------------

return $codigo_html_bruto; // retorno

// --------------------------------------------------------


};

// --------------------------------------------------------


?>