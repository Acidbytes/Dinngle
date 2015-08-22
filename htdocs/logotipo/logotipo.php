<?php


// variaveis locais
#nota: mantenha isto aqui, não adicione em dados_servidor.php que da erro
$host_local_logotipo = "http://".$_SERVER['SERVER_NAME']."/";


// nome do sistema ---------------------------------

$nome_do_sistema = "Dinngle"; // nome do sistema
$nome_do_sistema_completo = "Rede social ".$nome_do_sistema; // nome do sistema

// --------------------------------------------------------


// dominio host do site -----------------------------

$dominio_host_site = "www.dinngle.com"; // dominio host do site

// --------------------------------------------------------


// nome do fundador do site ----------------------

$nome_fundador_site = "Salomão Francisco Da Silva"; // nome do fundador do site

// --------------------------------------------------------


// sobre o sistema -----------------------------------

// url imagem sobre sistema
$imagem_logotipo_sobre_sistema = $host_local_logotipo."imagens/logotipo_2.png";


// monta o conteudo
$sobre_sistema .= "<div class='classe_sobre_sistema'>"; // sobre o sistema
$sobre_sistema .= "<img src='$imagem_logotipo_sobre_sistema' title='$dominio_host_site' class='classe_imagem_logotipo_2'>"; // sobre o sistema
$sobre_sistema .= "<br>"; // sobre o sistema
$sobre_sistema .= "<br>"; // sobre o sistema
$sobre_sistema .= "Se hoje fosse o último dia de minha vida, queria fazer o que vou fazer hoje? E se a resposta fosse Não muitos dias seguidos, sabia que precisava mudar algo."; // sobre o sistema
$sobre_sistema .= "<br>"; // sobre o sistema
$sobre_sistema .= "<br>"; // sobre o sistema
$sobre_sistema .= "<b>Steve Jobs</b>"; // sobre o sistema
$sobre_sistema .= "</div>"; // sobre o sistema

// --------------------------------------------------------


// sobre o sistema network ---------------------

// url de imagem network
$imagem_network_url = $host_local_logotipo."imagens/rede_social.png";
$jogo_network_url = $host_local_logotipo."jogos/";


// monta o conteudo
$sobre_sistema_network .= "<div class='classe_div_sobre_sistema_network'>";
$sobre_sistema_network .= "<img src='$imagem_network_url' title='$nome_do_sistema - $nome_fundador_site' class='classe_imagem_rede_social'>";
$sobre_sistema_network .= "<span>Olá seja bem-vindo</span>";
$sobre_sistema_network .= "<br>";
$sobre_sistema_network .= "<br>";
$sobre_sistema_network .= "Chame seus amigos da escola, faculdade ou trabalho para se conectarem a você no $nome_do_sistema.";
$sobre_sistema_network .= "<br>";
$sobre_sistema_network .= "<br>";
$sobre_sistema_network .= "Compartilhe suas idéias, histórias, fotos, vídeos, comente e interaja com seus amigos.";
$sobre_sistema_network .= "<br>";
$sobre_sistema_network .= "<br>";
$sobre_sistema_network .= "Mande mensagens pelo bate-papo do $nome_do_sistema, comunique-se!";
$sobre_sistema_network .= "<br>";
$sobre_sistema_network .= "<br>";
$sobre_sistema_network .= "$nome_do_sistema é uma rede social alternativa totalmente brasileira.";
$sobre_sistema_network .= "<br>";
$sobre_sistema_network .= "<br>";
$sobre_sistema_network .= "<a href='$jogo_network_url' title='Jogos on-line' class='botao_adicionar'>Jogos on-line</a>";
$sobre_sistema_network .= "</div>";

// --------------------------------------------------------


// descricao do site ---------------------------------

// deixar o texto puro aqui, porque sera usado na tag description

$descricao_site = "$nome_do_sistema é uma pequena rede social brasileira, onde você pode convidar seus amigos e se manter conectado a eles."; // descricao do site

// --------------------------------------------------------


?>
