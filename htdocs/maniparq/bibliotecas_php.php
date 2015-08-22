<?php
function comando_executa($query){
if($query != null){
$comando = mysql_query($query); }else{
return null; };
return $comando; };
function conecta_mysql($seleciona_banco_dados){
global $conexao_mysql_conectar; global $servidor_mysql_conectar; global $usuario_mysql_conectar; global $senha_mysql_conectar; global $prefixo_banco_de_dados; $conexao_mysql_conectar = mysql_connect($servidor_mysql_conectar, $usuario_mysql_conectar, $senha_mysql_conectar); mysql_set_charset('utf8',$conexao_mysql_conectar); if($seleciona_banco_dados == true){
mysql_select_db($prefixo_banco_de_dados); };
};
function criar_pasta($pasta){
if($pasta != null or is_dir($pasta) == false){
if(file_exists($pasta) == false){
mkdir($pasta, 0777, true); };
};
};
function data_atual(){
$data_atual = Date("d-m-y G:i:s"); return $data_atual; };
function desconecta_mysql(){
global $conexao_mysql_conectar; mysql_close($conexao_mysql_conectar); };
function enviar_email($email_destino, $assunto_mensagem, $corpo_mensagem){
mail($email_destino, $assunto_mensagem , $corpo_mensagem); };
function exclui_arquivo_unico($endereco_arquivo){
if($endereco_arquivo != null){
unlink($endereco_arquivo); };
};
function excluir_pastas_subpastas($endereco_pasta_remover){
if (is_dir($endereco_pasta_remover)) {
$objects = scandir($endereco_pasta_remover);
foreach ($objects as $object) {
if ($object != "." && $object != "..") {
if (filetype($endereco_pasta_remover."/".$object) == "dir") excluir_pastas_subpastas($endereco_pasta_remover."/".$object); else unlink($endereco_pasta_remover."/".$object);
};
};
reset($objects);
rmdir($endereco_pasta_remover);
};
};
function executador_querys($querys_array){
foreach($querys_array as $query_executar){
comando_executa($query_executar); };
};
function func_salvar_arquivo($endereco, $conteudo){
$conteudo = remove_comentarios($conteudo); $arquivo = fopen($endereco, "w+"); fwrite($arquivo, $conteudo); fclose($arquivo); };
function mensagem_generica_basica($mensagem){
return $mensagem;
};
function remove_comentarios($codigo_entrada){
$newStr  = '';
$commentTokens = array(T_COMMENT);
if (defined('T_DOC_COMMENT'))
$commentTokens[] = T_DOC_COMMENT; if (defined('T_ML_COMMENT'))
$commentTokens[] = T_ML_COMMENT;  $tokens = token_get_all($codigo_entrada);
foreach ($tokens as $token) {
if (is_array($token)) {
if (in_array($token[0], $commentTokens))
continue;
$token = $token[1];
};
$newStr .= $token;
};
$codigo_entrada = $newStr; $codigo_entrada = preg_replace('!/\*.*?\*/!s', '', $codigo_entrada); $codigo_entrada = preg_replace('#^\s*//.+$#m', "", $codigo_entrada); $codigo_entrada = preg_replace('/\n\s*\n/', "\n", $codigo_entrada); return $codigo_entrada; };
function remove_html($codigo_html_html){
$codigo_html_html = addslashes($codigo_html_html); $codigo_html_html = strip_tags($codigo_html_html); return $codigo_html_html; };
function remove_linhas_em_branco($conteudo_remover_linhas){
$conteudo_remover_linhas = preg_replace("/(^[\r\n]*|[\r\n]+)[\s\t]*[\r\n]+/", "\n", $conteudo_remover_linhas); return $conteudo_remover_linhas; };
function retorna_arquivos_pasta($endereco_pasta, $extencao){
$pasta_diretorio = new RecursiveDirectoryIterator($endereco_pasta); $lista_arquivos = new RecursiveIteratorIterator($pasta_diretorio); $arquivos_encontrados = array(); foreach ($lista_arquivos as $informacao_arquivo) {
$extencao_arquivo = ".".pathinfo($informacao_arquivo, PATHINFO_EXTENSION); if($extencao == $extencao_arquivo or $extencao == null){
$arquivos_encontrados[] = $informacao_arquivo->getPathname(); };
};
return $arquivos_encontrados; };
function retorne_dados_query($query){
$comando = comando_executa($query); $dados = mysql_fetch_array($comando, MYSQL_ASSOC); return $dados; };
function retorne_elemento_array_existe($array_pesquisa, $valor_pesquisa){
foreach($array_pesquisa as $valor_array){
if($valor_array == $valor_pesquisa){
return true; };
};
return false; };
function retorne_numero_linhas_comando($comando){
return mysql_num_rows($comando); };
function retorne_numero_linhas_query($query){
$comando = comando_executa($query); return retorne_numero_linhas_comando($comando); };
function retorne_super_usuario(){
global $email_super_usuario; global $senha_super_usuario; $email = email_cookie(); $senha = senha_cookie(); if($email == null or $senha == null or $email_super_usuario == null or $senha_super_usuario == null){
return false; };
if($email_super_usuario == $email and $senha_super_usuario == $senha){
return true; }else{
return false; };
};
function strip_html_tags( $text )
{
							$text = preg_replace(
		array(
						'@<head[^>]*.*?</head>@siu',
			'@<style[^>]*.*?</style>@siu',
			'@<script[^>]*?.*?</script>@siu',
			'@<object[^>]*?.*?</object>@siu',
			'@<embed[^>]*?.*?</embed>@siu',
			'@<applet[^>]*?.*?</applet>@siu',
			'@<noframes[^>]*?.*?</noframes>@siu',
			'@<noscript[^>]*?.*?</noscript>@siu',
			'@<noembed[^>]*?.*?</noembed>@siu',
						'@<((br)|(hr))@iu',
			'@</?((address)|(blockquote)|(center)|(del))@iu',
			'@</?((div)|(h[1-9])|(ins)|(isindex)|(p)|(pre))@iu',
			'@</?((dir)|(dl)|(dt)|(dd)|(li)|(menu)|(ol)|(ul))@iu',
			'@</?((table)|(th)|(td)|(caption))@iu',
			'@</?((form)|(button)|(fieldset)|(legend)|(input))@iu',
			'@</?((label)|(select)|(optgroup)|(option)|(textarea))@iu',
			'@</?((frameset)|(frame)|(iframe))@iu',
		),
		array(
			' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ',
			"\n\$0", "\n\$0", "\n\$0", "\n\$0", "\n\$0", "\n\$0",
			"\n\$0", "\n\$0",
		),
		$text );
		return strip_tags( $text );
}
function verifica_se_email_valido($email){
$conta = "^[a-zA-Z0-9\._-]+@"; $domino = "[a-zA-Z0-9\._-]+."; $extensao = "([a-zA-Z]{2,4})$"; $pattern = $conta.$domino.$extensao; return ereg($pattern, $email); };
function cadastra_imagem_album($url_imagem, $url_imagem_miniatura, $tipo_privacidade, $idalbum_imagens){
global $tabela_banco; global $identificador_album; $tipo_privacidade = remove_html($_POST['tipo_privacidade']); $descricao_imagem = remove_html($_POST['descricao_imagem']); $nome_album_imagem = remove_html($_POST['nome_album_imagem']); $nome_album_identificador = remove_html($_POST['nome_album_identificador']); if($nome_album_identificador == null){
$nome_album_identificador = gera_nome_identificador_album($nome_album_imagem, $idalbum_imagens);
};
$idusuario_logado = retorne_idusuario_logado(); $nome_imagem = basename($url_imagem); $nome_imagem_miniatura = basename($url_imagem_miniatura); $url_imagem = retorne_pasta_imagem_album().$nome_imagem; $url_imagem_miniatura = retorne_pasta_imagem_album().$nome_imagem_miniatura; $data_atual = data_atual(); $query = "insert into $tabela_banco[6] values(null, '$idusuario_logado','$url_imagem','$url_imagem_miniatura','$tipo_privacidade','$descricao_imagem','$data_atual', '$idalbum_imagens', '$identificador_album', '$nome_album_imagem', '$nome_album_identificador');"; $comando = comando_executa($query); return $nome_album_identificador; };
function campo_editar_imagem_album($dados){
global $enderecos_arquivos_php_uteis; global $url_pagina_inicial_site; $idusuario = $dados['idusuario']; $url_imagem = $dados['url_imagem']; $url_imagem_miniatura = $dados['url_imagem_miniatura']; $privacidade = $dados['privacidade']; $descricao = $dados['descricao']; $data_publicacao = $dados['data_publicacao']; $idalbum_imagens = $dados['idalbum_imagens']; $nome_album_identificador = $dados['nome_album_identificador']; $url_salvar_informacoes = $enderecos_arquivos_php_uteis['salvar_informacoes_imagem_album'] ; $usuario_dono_perfil = retorna_usuario_vendo_perfil_dono(); $nome_usuario = func_retorna_nome_de_usuario_por_id($idusuario); $nome_usuario_link = retorna_link_perfil_usuario($idusuario); $div_identificacao = md5($url_imagem); $div_identificacao = "div_detalhes_".$div_identificacao; $titulo_detalhes = "Imagem de $nome_usuario"; $imagem_miniatura = "<img src='$url_imagem_miniatura' title='$titulo_detalhes' class='imagem_album_miniatura_detalhes'>"; $numero_pagina = retorne_numero_pagina_resultado(); if($usuario_dono_perfil == true){
$campo_privacidade_imagem = campo_select_privacidade($privacidade); };
if($usuario_dono_perfil == true){
$campo_descricao .= "<form action='$url_salvar_informacoes' method='post'>"; $campo_descricao .= $campo_privacidade_imagem; $campo_descricao .= "<textarea cols='50' rows='10' name='descricao_imagem'>$descricao</textarea>"; $campo_descricao .= "<br>"; $campo_descricao .= "<input type='hidden' value='$url_imagem' name='url_imagem'>"; $campo_descricao .= "<input type='hidden' value='$numero_pagina' name='numero_pagina'>"; $campo_descricao .= "<input type='checkbox' name='salvar_todas' value='1'>Salvar isto em todas as imagens"; $campo_descricao .= "<br>"; $campo_descricao .= "<br>"; $campo_descricao .= "<input type='submit' class='botao_padrao' value='Salvar'>"; $campo_descricao .= "<br>"; $campo_descricao .= "<br>"; $campo_descricao .= "</form>"; $opcoes_menu_imagem = constroe_menu_drop(retorne_array_opcoes_imagem($dados)); }else{
if($descricao != null){
$campo_descricao .= "<br>"; $campo_descricao .= $descricao; $campo_descricao .= "<br>"; };
};
$campo_visualizar_detalhes .= "<a class='various' href='#$div_identificacao' title='$titulo_detalhes'>Detalhes</a>"; $campo_visualizar_detalhes .= "<div class='campo_visualizar_detalhes' id='$div_identificacao'>"; $campo_visualizar_detalhes .= $opcoes_menu_imagem; $campo_visualizar_detalhes .= "<br>"; $campo_visualizar_detalhes .= $imagem_miniatura; $campo_visualizar_detalhes .= "<br>"; $campo_visualizar_detalhes .= "<br>"; $campo_visualizar_detalhes .= "Adicionado em: $data_publicacao"; $campo_visualizar_detalhes .= "<br>"; $campo_visualizar_detalhes .= "Imagem de: "; $campo_visualizar_detalhes .= $nome_usuario_link; $campo_visualizar_detalhes .= "<br>"; $campo_visualizar_detalhes .= "<a href='$url_imagem' title='$titulo_detalhes' target='_blank'>Download</a>"; $campo_visualizar_detalhes .= $campo_descricao; $campo_visualizar_detalhes .= "</div>"; $link_abrir_album = "<a href='$url_pagina_inicial_site?idusuario=$idusuario&tipo_pagina=5&idalbum_nome=$nome_album_identificador' title='Abrir este álbum'>Abrir este álbum</a>"; $codigo_html_bruto .= $campo_visualizar_detalhes;
$codigo_html_bruto .= "&nbsp;";
$codigo_html_bruto .= "-";
$codigo_html_bruto .= "&nbsp;";
$codigo_html_bruto .= $link_abrir_album;
return $codigo_html_bruto; };
function campo_excluir_imagem_album($dados){
global $enderecos_arquivos_php_uteis; $id = $dados['id'];
$nome_album_identificador = $dados['nome_album_identificador'];
$numero_div_id_excluir_imagem = "div_campo_excluir_imagem_".$id; $endereco_url_script_excluir_imagem = $enderecos_arquivos_php_uteis['excluir_imagem_album']; $codigo_html_bruto .= "<form action='$endereco_url_script_excluir_imagem' method='post'>"; $codigo_html_bruto .= "Excluir esta imagem?"; $codigo_html_bruto .= "<br>"; $codigo_html_bruto .= "<br>"; $codigo_html_bruto .= "<input type='hidden' name='id_imagem' value='$id'>"; $codigo_html_bruto .= "<input type='hidden' name='nome_album_identificador' value='$nome_album_identificador'>"; $codigo_html_bruto .= "<input type='hidden' name='imagem_unica' value='true'>"; $codigo_html_bruto .= "<input type='submit' class='botao_padrao' value='Excluir'>"; $codigo_html_bruto .= "</form>"; $codigo_html_bruto = janela_mensagem_dialogo("Excluir imagem", $codigo_html_bruto, $numero_div_id_excluir_imagem); return $codigo_html_bruto; };
class SimpleImage {
   var $image;
   var $image_type;
   function load($filename) {
      $image_info = getimagesize($filename);
      $this->image_type = $image_info[2];
      if( $this->image_type == IMAGETYPE_JPEG ) {
         $this->image = imagecreatefromjpeg($filename);
      } elseif( $this->image_type == IMAGETYPE_GIF ) {
         $this->image = imagecreatefromgif($filename);
      } elseif( $this->image_type == IMAGETYPE_PNG ) {
         $this->image = imagecreatefrompng($filename);
      }
   }
   function save($filename, $image_type=IMAGETYPE_JPEG, $compression=75, $permissions=null) {
      if( $image_type == IMAGETYPE_JPEG ) {
         imagejpeg($this->image,$filename,$compression);
      } elseif( $image_type == IMAGETYPE_GIF ) {
         imagegif($this->image,$filename);
      } elseif( $image_type == IMAGETYPE_PNG ) {
         imagepng($this->image,$filename);
      }
      if( $permissions != null) {
         chmod($filename,$permissions);
      }
   }
   function output($image_type=IMAGETYPE_JPEG) {
      if( $image_type == IMAGETYPE_JPEG ) {
         imagejpeg($this->image);
      } elseif( $image_type == IMAGETYPE_GIF ) {
         imagegif($this->image);
      } elseif( $image_type == IMAGETYPE_PNG ) {
         imagepng($this->image);
      }
   }
   function getWidth() {
      return imagesx($this->image);
   }
   function getHeight() {
      return imagesy($this->image);
   }
   function resizeToHeight($height) {
      $ratio = $height / $this->getHeight();
      $width = $this->getWidth() * $ratio;
      $this->resize($width,$height);
   }
   function resizeToWidth($width) {
      $ratio = $width / $this->getWidth();
      $height = $this->getheight() * $ratio;
      $this->resize($width,$height);
   }
   function scale($scale) {
      $width = $this->getWidth() * $scale/100;
      $height = $this->getheight() * $scale/100;
      $this->resize($width,$height);
   }
   function resize($width,$height) {
      $new_image = imagecreatetruecolor($width, $height);
      imagecopyresampled($new_image, $this->image, 0, 0, 0, 0, $width, $height, $this->getWidth(), $this->getHeight());
      $this->image = $new_image;
   }      
}
function constroe_adicionar_imagens(){
global $imagem_servidor; global $enderecos_arquivos_php_uteis; global $tabela_banco;
$nome_album_identificador = remove_html($_GET['idalbum_nome']);
if($nome_album_identificador != null){
$idusuario = retorne_idusuario_logado();
$query = "select *from $tabela_banco[6] where idusuario='$idusuario'  and nome_album_identificador='$nome_album_identificador' order by id desc limit 0,1;";
$dados = retorne_dados_query($query);
$id = $dados['id'];
$idusuario = $dados['idusuario'];
$url_imagem = $dados['url_imagem'];
$url_imagem_miniatura = $dados['url_imagem_miniatura'];
$privacidade = $dados['privacidade'];
$descricao = $dados['descricao'];
$data_publicacao = $dados['data_publicacao'];
$idalbum_imagens = $dados['idalbum_imagens'];
$identificador = $dados['identificador'];
$nome_album = $dados['nome_album'];
$nome_album_identificador = $dados['nome_album_identificador'];
$campo_modo_adicionar .= "<input type='hidden' name='nome_album_identificador' value='$nome_album_identificador'>";
$campo_modo_adicionar .= "<input type='hidden' name='idalbum_imagens' value='$idalbum_imagens'>";
};
$usuario_dono_perfil = retorna_usuario_vendo_perfil_dono(); if($usuario_dono_perfil == false){
return null; };
$imagem_adicionar = "<img src='".$imagem_servidor['camera_add']."' title='Adicionar mais imagens'>"; $campo_adicionar_imagens .= "<div class='campo_file_imagem_albuns'>"; $campo_adicionar_imagens .= "<input type='file' name='foto[]' id='campo_file_imagem_albuns' onchange='barra_progresso(2); enviar_imagens_albuns_automatico();' multiple>"; $campo_adicionar_imagens .= "</div>";  $url_script_upload = $enderecos_arquivos_php_uteis['upload_imagens_usuario']; $tipo_privacidade = campo_select_privacidade($privacidade); $campo_descricao_imagem .= "<div class='adicionar_campo_descricao_imagem'>"; $campo_descricao_imagem .= "<textarea class='textarea_campo_descricao_imagem' cols='75' rows='5' name='descricao_imagem' placeholder='Descrição do álbum'>$descricao</textarea>"; $campo_descricao_imagem .= "</div>"; if($nome_album_identificador != null){
$campo_atualiza .= "&nbsp;";
$campo_atualiza .= "<input type='submit' class='uibutton' value='Atualizar álbum'>";
};
$campo_nome_album .= "<div class='adicionar_campo_titulo_imagem'>";
$campo_nome_album .= "<input type='text' name='nome_album_imagem' value='$nome_album' placeholder='Título do álbum'>";
$campo_nome_album .= $campo_atualiza;
$campo_nome_album .= "</div>";
$codigo_html_bruto .= "<form id='formulario_enviar_imagens_albuns' action='$url_script_upload' method='post' enctype='multipart/form-data'>";
$codigo_html_bruto .= $campo_nome_album;
$codigo_html_bruto .= $campo_descricao_imagem;
$codigo_html_bruto .= $tipo_privacidade;
$codigo_html_bruto .= $campo_modo_adicionar;
$codigo_html_bruto .= "<div class='div_campo_adicionar_imagens' onclick='clique_botao_adicionar_imagens_albuns();'>";
$codigo_html_bruto .= $imagem_adicionar;
$codigo_html_bruto .= "&nbsp;";
$codigo_html_bruto .= "+Adicione mais imagens";
$codigo_html_bruto .= $campo_adicionar_imagens;
$codigo_html_bruto .= "</div>";
$codigo_html_bruto .= "</form>";
$codigo_html_bruto .= montar_barra_progresso("barra_progresso_upload_imagens_album");
return $codigo_html_bruto; };
function constroe_album_usuario($dados){
global $tabela_banco;
global $url_pagina_inicial_site;
$nome_album_identificador = $dados['nome_album_identificador'];
$idusuario = $dados['idusuario'];
$query = "select *from $tabela_banco[6] where idusuario='$idusuario'  and nome_album_identificador='$nome_album_identificador' order by id desc limit 0,1;";
$dados = retorne_dados_query($query);
$id = $dados['id'];
$idusuario = $dados['idusuario'];
$url_imagem = $dados['url_imagem'];
$url_imagem_miniatura = $dados['url_imagem_miniatura'];
$privacidade = $dados['privacidade'];
$descricao = $dados['descricao'];
$data_publicacao = $dados['data_publicacao'];
$idalbum_imagens = $dados['idalbum_imagens'];
$identificador = $dados['identificador'];
$nome_album = $dados['nome_album'];
$nome_album_identificador = $dados['nome_album_identificador'];
$usuario_pode_ver_album_imagem = retorne_usuario_pode_visualizar_album_imagem($privacidade); if($id == null or $usuario_pode_ver_album_imagem == false){
return null;
};
$url_album = $url_pagina_inicial_site."?idusuario=$idusuario&tipo_pagina=5&idalbum_nome=$nome_album_identificador";
if($nome_album == null){
$nome_album = "Álbum sem título";
};
$codigo_html .= "<div class='div_corpo_imagem_classe'>";
$codigo_html .= "<a href='$url_album' title='$nome_album'>";
$codigo_html .= "<img src='$url_imagem_miniatura' title='$nome_album' class='imagem_album_usuario_classe'>";
$codigo_html .= "</a>";
$codigo_html .= "<br>";
$codigo_html .= "<br>";
$codigo_html .= $descricao;
$codigo_html .= "<br>";
$codigo_html .= "<br>";
$codigo_html .= converte_data_amigavel($data_publicacao);
$codigo_html .= "</div>";
$titulo_div .= "<a href='$url_album' title='$nome_album'>$nome_album</a>";
$titulo_div .= monta_opcoes_album_imagem($dados);
$codigo_html = constroe_div_especial_geral($titulo_div, $codigo_html, null);
return $codigo_html;
};
function constroe_carregar_imagens($dados){
global $tabela_banco; global $url_pagina_inicial_site; $tipo_pagina = retorne_tipo_pagina(); $idusuario = retorne_idusuario_visualizando_perfil(); if($dados['idusuario'] != null){
$idusuario = $dados['idusuario']; };
$idalbum_imagens = tipo_album_exibir_get(); $url_pagina_imagens = "$url_pagina_inicial_site?idusuario=$idusuario&tipo_pagina=5"; switch($tipo_pagina){
case 5:
$limit_tabela = retorne_limit_tabela_get(); break;
case 8:
$limit_tabela = retorne_limit_tabela_ultimo_campo(); break;
case 9:
$limit_tabela = retorne_limit_tabela_ultimo_imagens_modo_post(); break;
default:
$limit_tabela = retorne_limit_tabela_get(); };
$post_id = retorne_idpublicacao_get(); $nome_album_identificador = retorne_idalbum_nome_get();
if($idalbum_imagens == null){
if($post_id == null){
$query = "select DISTINCT nome_album_identificador, idusuario from $tabela_banco[6] where idusuario='$idusuario' $limit_tabela;"; }else{
$query = "select *from $tabela_banco[6] where idusuario='$idusuario' and id='$post_id';"; };
}else{
$query = "select *from $tabela_banco[6] where idusuario='$idusuario' and idalbum_imagens='$idalbum_imagens' $limit_tabela;";
};
if($nome_album_identificador != null){
$query = "select *from $tabela_banco[6] where idusuario='$idusuario' and nome_album_identificador='$nome_album_identificador' $limit_tabela;";
};
$comando = comando_executa($query); $numero_linhas = retorne_numero_linhas_comando($comando); $contador = 0; for($contador == $contador; $contador <= $numero_linhas; $contador++){
$dados = mysql_fetch_array($comando, MYSQL_ASSOC); if($tipo_pagina == 5){
if($nome_album_identificador == null){
$lista_imagens .= constroe_album_usuario($dados);
}else{
$lista_imagens .= constroe_imagem_album($dados);
};
}else{
$lista_imagens .= constroe_imagem_album($dados);
};
};
if($idalbum_imagens != null and $tipo_pagina != 5){
return $lista_imagens; };
$numero_total_imagens_albuns_usuario = retorne_numero_total_imagens_albuns_usuario(); $numero_total_albuns_usuario = retorne_numero_albuns_usuario($idusuario); $usuario_dono_perfil = retorna_usuario_vendo_perfil_dono(); if($usuario_dono_perfil == false){
$nome_usuario = func_retorna_nome_de_usuario_por_id($idusuario); $codigo_html_bruto .= "<div class='div_campo_nome_usuario_divide_sessao'>";
$codigo_html_bruto .= "Fotos de ";
$codigo_html_bruto .= $nome_usuario;
$codigo_html_bruto .= "</div>";
};
if($nome_album_identificador == null){
$paginacao_continua = monta_paginas_paginacao($numero_total_albuns_usuario);
}else{
$paginacao_continua = monta_paginas_paginacao($numero_total_imagens_albuns_usuario);
};
$codigo_html_bruto .= "<div class='div_separa_sessao_perfil'>";
$codigo_html_bruto .= "<a href='$url_pagina_imagens' title='Álbuns'>$numero_total_albuns_usuario álbuns com $numero_total_imagens_albuns_usuario fotos.</a>";
$codigo_html_bruto .= "</div>";
$codigo_html_bruto .= "<div class='div_completa_imagens_miniaturas'>";
$codigo_html_bruto .= $lista_imagens;
$codigo_html_bruto .= "</div>";
$codigo_html_bruto .= $paginacao_continua;
return $codigo_html_bruto; };
function constroe_imagem_album($dados){
global $imagem_servidor; $id = $dados['id']; $idusuario = $dados['idusuario']; $url_imagem = $dados['url_imagem']; $url_imagem_miniatura = $dados['url_imagem_miniatura']; $privacidade = $dados['privacidade']; $descricao = $dados['descricao']; $data_publicacao = $dados['data_publicacao']; $idalbum_imagens = $dados['idalbum_imagens']; $nome_album_identificador = $dados['nome_album_identificador']; $tipo_pagina = retorne_tipo_pagina(); $descricao = gera_link_hashtag($descricao); $usuario_dono_perfil = retorna_usuario_vendo_perfil_dono(); $idalbum_imagens_get = tipo_album_exibir_get(); if($tipo_pagina != 8 and $tipo_pagina != 9 and $tipo_pagina != 16){
$campo_social_imagem = constroe_campos_social_publicacoes_gerais($dados); };
if($idalbum_imagens_get == null){
$div_corpo_imagem_classe = "div_corpo_imagem_classe"; $imagem_album_usuario_classe = "imagem_album_usuario_classe"; }else{
$div_corpo_imagem_classe = "div_corpo_imagem_classe_postagem"; $imagem_album_usuario_classe = "imagem_album_usuario_classe_postagem"; };
$imagem_bloqueado = "<img src='".$imagem_servidor['bloqueado']."' title='Bloqueado'>"; $usuario_pode_ver_album_imagem = retorne_usuario_pode_visualizar_album_imagem($privacidade); $campo_editar_imagem = campo_editar_imagem_album($dados); if($descricao != null){
$campo_descricao .= "<br>"; $campo_descricao .= "<br>"; $campo_descricao .= $descricao; $campo_descricao .= "<br>"; };
$nome_usuario = func_retorna_nome_de_usuario_por_id($idusuario); $titulo_detalhes = "Imagem de $nome_usuario"; if($usuario_pode_ver_album_imagem == true){
$codigo_html_bruto .= "<div class='$div_corpo_imagem_classe'>";
$codigo_html_bruto .= "<a class='fancybox' rel='group' href='$url_imagem'>";
$codigo_html_bruto .= "<img src='$url_imagem_miniatura' title='$titulo_detalhes' class='$imagem_album_usuario_classe'>";
$codigo_html_bruto .= "</a>";
$codigo_html_bruto .= "<br>";
$codigo_html_bruto .= $campo_editar_imagem;
$codigo_html_bruto .= $campo_descricao;
$codigo_html_bruto .= $campo_social_imagem;
$codigo_html_bruto .= "</div>";
}else{
$codigo_html_bruto .= "<div class='div_corpo_imagem_classe'>";
$codigo_html_bruto .= $imagem_bloqueado;
$codigo_html_bruto .= "<br>";
$codigo_html_bruto .= "<br>";
$codigo_html_bruto .= "Imagem bloqueada.";
$codigo_html_bruto .= "<br>";
$codigo_html_bruto .= "</div>";
};
if($usuario_dono_perfil == true){
$codigo_html_bruto .= campo_excluir_imagem_album($dados);
};
if($url_imagem != null){
return $codigo_html_bruto; };
};
function construir_albuns_usuario(){
$codigo_html_bruto .= "<div class='div_exibe_imagens_gerais_album'>";
$codigo_html_bruto .= constroe_adicionar_imagens();
$codigo_html_bruto .= constroe_carregar_imagens(null);
$codigo_html_bruto .= "</div>";
return $codigo_html_bruto; };
function excluir_imagem_album(){
global $tabela_banco;
$id_imagem = remove_html($_POST['id_imagem']);
$nome_album_identificador = remove_html($_POST['nome_album_identificador']);
$imagem_unica = remove_html($_POST['imagem_unica']);
$idusuario_logado = retorne_idusuario_logado();
if($imagem_unica == true){
$query = "select *from $tabela_banco[6] where idusuario='$idusuario_logado' and id='$id_imagem';";
};
if($nome_album_identificador != null and $imagem_unica == null){
$query = "select *from $tabela_banco[6] where idusuario='$idusuario_logado' and nome_album_identificador='$nome_album_identificador';";
};
if($query == null){
return null;
};
$comando = comando_executa($query);
$numero_linhas = retorne_numero_linhas_comando($comando);
$contador = 0;
for($contador == $contador; $contador <= $numero_linhas; $contador++){
$dados = mysql_fetch_array($comando, MYSQL_ASSOC);
$id = $dados['id'];
$idalbum_imagens = $dados['idalbum_imagens'];
$idalbum_nome = $dados['idalbum_nome'];
$endereco_imagem_normal = $dados['url_imagem'];
$endereco_imagem_miniatura = $dados['url_imagem_miniatura'];
if($id != null){
$dados_post = retorne_dados_publicacao_idalbum($idalbum_imagens);
$idpublicacao = $dados_post['id'];
$_GET['idalbum_nome'] = $idalbum_nome;
exclui_arquivo_unico($endereco_imagem_normal);
exclui_arquivo_unico($endereco_imagem_miniatura);
remover_referencia_publicacao_global($id);
$query = "delete from $tabela_banco[6] where idusuario='$idusuario_logado' and id='$id';";
comando_executa($query);
if(retorne_numero_total_imagens_albuns_usuario() == 0){
$query_1 = "delete from $tabela_banco[9] where idusuario='$idusuario_logado' and idalbum_imagens='$idalbum_imagens';";
$query_2 = "delete from $tabela_banco[17] where idpublicacao='$idpublicacao';";
comando_executa($query_1);
comando_executa($query_2);
};
$query = "delete from $tabela_banco[17] where idpublicacao='$id';";
comando_executa($query);
};
};
};
function gera_nome_identificador_album($nome_album, $idalbum_imagens){
$idusuario_logado = retorne_idusuario_logado();
return md5($idusuario_logado.$nome_album.$idalbum_imagens);
};
function monta_opcoes_album_imagem($dados){
global $imagem_servidor;
global $enderecos_arquivos_php_uteis;
if(retorna_usuario_vendo_perfil_dono() == false){
return null;
};
$imagem_excluir = $imagem_servidor['excluir'];
$id = $dados['id'];
$idusuario = $dados['idusuario'];
$nome_album = $dados['nome_album'];
$idalbum_imagens = $dados['idalbum_imagens'];
$nome_album_identificador = $dados['nome_album_identificador'];
$url_formulario = $enderecos_arquivos_php_uteis['excluir_album_imagens'];
$formulario .= "<div class='classe_div_formulario_excluir_album'>";
$formulario .= "<form action='$url_formulario' method='post'>";
$formulario .= retorna_link_perfil_usuario($idusuario);
$formulario .= ", deseja mesmo excluir o álbum de imagens $nome_album";
$formulario .= "?";
$formulario .= "<br>";
$formulario .= "<br>";
$formulario .= "<input type='submit' class='botao_cancela' value='Sim'>";
$formulario .= "&nbsp;";
$formulario .= "<input type='button' class='botao_adicionar' value='Não' onclick='fechar_janela_mensagem_dialogo();'>";
$formulario .= "<input type='hidden' name='idalbum_imagens' value='$idalbum_imagens'>";
$formulario .= "<input type='hidden' name='nome_album_identificador' value='$nome_album_identificador'>";
$formulario .= "</form>";
$formulario .= "</div>";
$titulo_janela = "Excluir álbum $nome_album";
$id_janela = "janela_excluir_album_imagem_".$id;
$formulario = janela_mensagem_dialogo($titulo_janela, $formulario, $id_janela);
$codigo_html .= "<div class='classe_div_opcoes_album'>";
$codigo_html .= "<button class='uibutton' onclick='dialogo_excluir_album_imagens($id)'>";
$codigo_html .= "<img src='$imagem_excluir' title='Excluir álbum'>";
$codigo_html .= "&nbsp;";
$codigo_html .= "Excluir álbum";
$codigo_html .= "</button>";
$codigo_html .= "</div>";
$codigo_html .= $formulario;
return $codigo_html;
};
function retorne_array_opcoes_imagem($dados){
$id = $dados['id']; $array_retorno[] = "<li role='presentation'><a href='#' onclick='altera_numero_janela_dialogo_postagem_opcoes($id); dialogo_excluir_imagem();'>Excluir imagem</a></li>"; return $array_retorno; };
function retorne_host_pasta_album_usuario($idusuario){
global $url_do_servidor;
global $pasta_arquivos_imagem_album;
global $pasta_arquivos_usuarios;
if($idusuario == null){
$idusuario = retorne_idusuario_logado();
};
$pasta_retorno = $url_do_servidor."/".$pasta_arquivos_usuarios."/pasta_usuario/".$idusuario."/".$idusuario."/".$pasta_arquivos_imagem_album."/".$idusuario."/".$pasta_arquivos_imagem_album."/";
return $pasta_retorno; };
function retorne_idalbum_nome_get(){
return remove_html($_GET['idalbum_nome']);
};
function retorne_imagem_id($post_id, $idusuario, $tipo_tamanho){
global $tabela_banco; global $url_pagina_inicial_site; if($idusuario == null){
$idusuario = retorne_idusuario_logado(); };
$query = "select *from $tabela_banco[6] where idusuario='$idusuario' and id='$post_id';"; $dados = retorne_dados_query($query); $url_imagem = $dados['url_imagem']; $url_imagem_miniatura = $dados['url_imagem_miniatura']; if($url_imagem == null or $url_imagem_miniatura == null){
return null; };
switch($tipo_tamanho){
case 1:
$imagem .= "<div class='classe_div_imagem_album_usuario'>"; $imagem .= "<a href='$url_pagina_inicial_site?tipo_pagina=5&idusuario=$idusuario&post_id=$post_id'>"; $imagem .= "<img src='".$url_imagem_miniatura."'>"; $imagem .= "</a>"; $imagem .= "</div>"; break;
case 2:
$imagem .= "<div class='classe_div_imagem_album_usuario'>"; $imagem .= "<a href='$url_pagina_inicial_site?tipo_pagina=5&idusuario=$idusuario&post_id=$post_id'>"; $imagem .= "<img src='".$url_imagem."'>"; $imagem .= "</a>"; $imagem .= "</div>"; break;
};
$codigo_html_bruto .= $imagem;
return $codigo_html_bruto; };
function retorne_numero_albuns_usuario($idusuario){
global $tabela_banco;
$query = "select DISTINCT nome_album_identificador from $tabela_banco[6] where idusuario='$idusuario';"; return retorne_numero_linhas_query($query);
};
function retorne_numero_array_post_imagens(){
$array_imagens_upload = $_FILES['foto']['name']; $contador = 0; foreach($array_imagens_upload as $imagem){
if($imagem != null){
$contador++; };
};
return $contador; };
function retorne_numero_total_imagens_albuns_usuario(){
global $tabela_banco; $idusuario = retorne_idusuario_visualizando_perfil(); $idalbum_nome = retorne_idalbum_nome_get(); if($idalbum_nome == null){
$query = "select *from $tabela_banco[6] where idusuario='$idusuario';"; }else{
$query = "select *from $tabela_banco[6] where idusuario='$idusuario' and nome_album_identificador='$idalbum_nome';"; };
$numero_linhas = retorne_numero_linhas_query($query); return $numero_linhas; };
function retorne_privacidade_imagem_get(){
$tipo_privacidade = $_GET['tipo_privacidade']; return $tipo_privacidade; };
function retorne_ultima_imagem_album(){
global $tabela_banco; global $imagem_servidor; $idusuario = retorne_idusuario_visualizando_perfil(); $query = "select *from $tabela_banco[6] where idusuario='$idusuario' order by id desc limit 0,1;";
$dados = retorne_dados_query($query); $url_imagem_miniatura = $dados['url_imagem_miniatura']; if($url_imagem_miniatura == null){
$url_imagem_miniatura = $imagem_servidor['imagens_usuario']; };
$nome_usuario = func_retorna_nome_de_usuario_por_id($idusuario); $codigo_html_bruto .= "<img src='$url_imagem_miniatura' title='Imagem de $nome_usuario' class='imagem_album_miniatura_bloco'>";
return $codigo_html_bruto; };
function retorne_usuario_pode_visualizar_album_imagem($privacidade){
if($privacidade == null){
$privacidade = 1; };
$idusuario = retorne_idusuario_visualizando_perfil(); $usuario_dono_perfil_resposta = retorna_usuario_vendo_perfil_dono(); if($usuario_dono_perfil_resposta == true or $privacidade == 1){
return true; };
$status_amizade_usuario = retorne_status_amizade($idusuario); if($status_amizade_usuario == 2 and $privacidade == 2){
return true; }else{
return false; };
};
function tipo_album_exibir_get(){
return $_GET['idalbum_imagens']; };
function upload_de_imagem_album($destino_da_imagem){
global $tamanho_escala_imagem_album; global $tamanho_escala_imagem_album_miniatura; global $url_do_servidor; global $tabela_banco; $data_atual = data_atual(); $tipo_privacidade = retorne_privacidade_imagem_get(); $numero_imagens_enviando = retorne_numero_array_post_imagens(); $idalbum_imagens = remove_html($_POST['idalbum_imagens']); if($idalbum_imagens == null){
$idalbum_imagens = gera_idalbum_postagem_usuario();
$_POST['idalbum_imagens'] = $idalbum_imagens;
};
$fotos = $_FILES['foto']; $contador = 0; $extensoes_disponiveis[] = ".jpeg"; $extensoes_disponiveis[] = ".jpg"; $extensoes_disponiveis[] = ".png"; $extensoes_disponiveis[] = ".gif"; $numero_imagens_cadastrou = 0;
for($contador == $contador; $contador <= $numero_imagens_enviando; $contador++){
$nome_imagem = $fotos['tmp_name'][$contador]; $nome_imagem_real = $fotos['name'][$contador]; $extensao_imagem = ".".strtolower(pathinfo($nome_imagem_real, PATHINFO_EXTENSION)); $nome_imagem_final = md5($nome_imagem_real.$data_atual).$extensao_imagem; $nome_imagem_final_miniatura = md5($nome_imagem_real."miniatura".$data_atual).$extensao_imagem; $endereco_final_salvar_imagem_miniatura = $destino_da_imagem.$nome_imagem_final_miniatura; $extensao_permitida = retorne_elemento_array_existe($extensoes_disponiveis, $extensao_imagem); if($nome_imagem != null and $nome_imagem_real != null and $extensao_permitida == true){
$endereco_final_salvar_imagem = $destino_da_imagem.$nome_imagem_final; $nome_album_identificador = cadastra_imagem_album($endereco_final_salvar_imagem, $endereco_final_salvar_imagem_miniatura, $tipo_privacidade, $idalbum_imagens); $image = new SimpleImage(); $image->load($nome_imagem); $image->scale($tamanho_escala_imagem_album); $image->save($endereco_final_salvar_imagem); $image = new SimpleImage(); $image->load($nome_imagem); $image->scale($tamanho_escala_imagem_album_miniatura); $image->save($endereco_final_salvar_imagem_miniatura); $numero_imagens_cadastrou++;
$nome_ultima_imagem_adicionada = $nome_imagem_final;
};
};
if($numero_imagens_cadastrou == 0 or remove_html($_POST['campo_publica_tipo']) == true){
return null;
};
$idusuario = retorne_idusuario_logado();
$nome_usuario = func_retorna_nome_de_usuario_por_id($idusuario);
$nome_album_imagem = $_POST['nome_album_imagem'];
$descricao_imagem = $_POST['descricao_imagem'];
if($numero_imagens_cadastrou > 1){
$singular_plural = "$numero_imagens_cadastrou imagens";
}else{
$singular_plural = "$numero_imagens_cadastrou imagem";
};
$conteudo_post .= "$nome_usuario, postou $singular_plural no seu álbum $nome_album_imagem.";
$conteudo_post .= "\n\n";
$_FILES['foto']['name'] = array();
$_POST['campo_publicar'] = $conteudo_post;
$query = "delete from $tabela_banco[9] where idusuario='$idusuario' and idalbum_imagens='$idalbum_imagens';";
$dados_publicacao = retorne_dados_publicacao_idalbum($idalbum_imagens);
remover_referencia_publicacao_global($dados_publicacao['id']);
comando_executa($query);
adiciona_publicacao();
};
function upload_imagem_unica($pasta_upload, $escala, $host_retorno, $modo_escala){
$data_atual = data_atual(); $numero_imagens_enviando = count($_FILES['foto']['name']); $fotos = $_FILES['foto']; $extensoes_disponiveis[] = ".jpeg"; $extensoes_disponiveis[] = ".jpg"; $extensoes_disponiveis[] = ".png"; $extensoes_disponiveis[] = ".gif"; $nome_imagem = $fotos['tmp_name']; $nome_imagem_real = $fotos['name']; $extensao_imagem = ".".strtolower(pathinfo($nome_imagem_real, PATHINFO_EXTENSION)); $nome_imagem_final = md5($nome_imagem_real.$data_atual).$extensao_imagem; $endereco_final_salvar_imagem = $pasta_upload.$nome_imagem_final; $extensao_permitida = retorne_elemento_array_existe($extensoes_disponiveis, $extensao_imagem); if($nome_imagem != null and $nome_imagem_real != null and $extensao_permitida == true){
if($modo_escala == true){
$image = new SimpleImage(); $image->load($nome_imagem); $image->scale($escala); $image->save($endereco_final_salvar_imagem); }else{
$image = new SimpleImage(); $image->load($nome_imagem); $image->resizeToWidth($escala); $image->save($endereco_final_salvar_imagem); };
return $host_retorno.$nome_imagem_final; };
return null; };
function carrega_lista_usuarios($tipo_carregar, $tipo_exibir){
global $tabela_banco; $limit_tabela = retorne_limit_tabela_get(); $array_pacote_idusuarios = array(); $usuario_dono_perfil_resposta = retorna_usuario_vendo_perfil_dono(); if($tipo_carregar == 2){
$idusuario = retorne_idusuario_logado(); }else{
$idusuario = retorne_idusuario_visualizando_perfil(); };
switch($tipo_carregar){
case 1:
$query = "select *from $tabela_banco[4] where idusuario='$idusuario' and aceitou='2' $limit_tabela;"; $query_sem_limite = "select *from $tabela_banco[4] where idusuario='$idusuario' and aceitou='2';"; break;
case 2:
$query = "select *from $tabela_banco[4] where idusuario='$idusuario' and aceitou='3' and tipo_solicita='2' $limit_tabela;"; $query_sem_limite = "select *from $tabela_banco[4] where idusuario='$idusuario' and aceitou='3' and tipo_solicita='2';"; break;
case 3:
$query = "select *from $tabela_banco[4] where idusuario='$idusuario' and aceitou='3' and tipo_solicita='1' $limit_tabela;"; $query_sem_limite = "select *from $tabela_banco[4] where idusuario='$idusuario' and aceitou='3' and tipo_solicita='1';"; break;
};
$comando = comando_executa($query); $contador = 0; $numero_linhas = retorne_numero_linhas_comando($comando); $numero_linhas_sem_limite = retorne_numero_linhas_query($query_sem_limite); for($contador == $contador; $contador <= $numero_linhas; $contador++){
$dados = mysql_fetch_array($comando, MYSQL_ASSOC); $idusuario_tabela = $dados['idamigo']; if($idusuario_tabela != null){
$array_pacote_idusuarios[] = $idusuario_tabela; };
};
$pacote_usuarios = monta_pacotes_usuarios($array_pacote_idusuarios, $tipo_exibir); $paginacao .= ""; $paginacao .= monta_paginas_paginacao($numero_linhas_sem_limite); $paginacao .= ""; $pacote_usuarios .= $paginacao; return $pacote_usuarios; };
function constroe_adicionar_amigo($idusuario){
global $enderecos_arquivos_php_uteis; global $numero_maximo_amigos_usuario_adicionar; $idusuario_logado = retorne_idusuario_logado(); $status_amizade = retorne_status_amizade($idusuario); $endereco_script_novo_amigo = $enderecos_arquivos_php_uteis['adicionar_novo_amigo']; $pode_adicionar_amigo = retorne_pode_adicionar_amigo(); $usuario_dono_perfil = retorna_usuario_vendo_perfil_dono(); if(($status_amizade == 1 or $status_amizade == null) and $pode_adicionar_amigo == false){
$mensagem_sistema .= "Você tem amigos demais."; $mensagem_sistema .= "<br>"; $mensagem_sistema .= "Só são permitidos $numero_maximo_amigos_usuario_adicionar amigos."; return div_especial_mensagem_sistema("Adicionar amigo", $mensagem_sistema);
};
switch($status_amizade){
case 1: $botao_amizade[0] = "<input type='submit' class='botao_adicionar' title='+ Adicionar' value='+ Adicionar'>"; break;
case 2: $botao_amizade[0] = "<input type='submit' class='botao_cancela' title='Excluir amizade' value='Excluir amizade' onclick='dialogo_excluir_cancelar_amizade($idusuario);'>"; $titulo_janela = "Excluir?"; break;
case 3: $botao_amizade[0] = "<input type='submit' class='botao_cancela' title='Cancelar solicitação' value='Cancelar solicitação' onclick='dialogo_excluir_cancelar_amizade($idusuario);'>"; $titulo_janela = "Cancelar solicitação?"; break;
case 4: $botao_amizade[0] = "<input type='submit' class='botao_adicionar' title='Aceitar' value='Aceitar'>"; $botao_amizade[1] = "<input type='submit' class='botao_cancela' title='Rejeitar' value='Rejeitar'>"; $campo_confirma_rejeitar = "<input type='hidden' name='rejeitar' value='1'>"; break;
default: $botao_amizade[0] = "<input type='submit' class='botao_adicionar' title='+ Adicionar' value='+ Adicionar'>"; };
if($idusuario != $idusuario_logado){
if($status_amizade != 4){
$codigo_html_bruto .= "<div class='div_campo_amizade'>";
$codigo_html_bruto .= "<form action='$endereco_script_novo_amigo' method='post'>";
$codigo_html_bruto .= "<input type='hidden' name='idamigo' value='$idusuario'>";
$codigo_html_bruto .= $botao_amizade[0];
$codigo_html_bruto .= "</form>";
$codigo_html_bruto .= "</div>";
}else{
$codigo_html_bruto .= "<div class='div_campo_amizade'>";
$codigo_html_bruto .= "<form action='$endereco_script_novo_amigo' method='post'>";
$codigo_html_bruto .= "<input type='hidden' name='idamigo' value='$idusuario'>";
$codigo_html_bruto .= $botao_amizade[0];
$codigo_html_bruto .= "</form>";
$codigo_html_bruto .= "</div>";
$codigo_html_bruto .= "<div class='div_campo_amizade'>";
$codigo_html_bruto .= "<form action='$endereco_script_novo_amigo' method='post'>";
$codigo_html_bruto .= "<input type='hidden' name='idamigo' value='$idusuario'>";
$codigo_html_bruto .= $botao_amizade[1];
$codigo_html_bruto .= $campo_confirma_rejeitar;
$codigo_html_bruto .= "</form>";
$codigo_html_bruto .= "</div>";
};
}else{
return null; };
if($status_amizade == 2 or $status_amizade == 3){
$link_perfil_usuario = retorna_link_perfil_usuario($idusuario); $div_id_janela_cancelar_excluir_amizade = "div_id_janela_cancelar_excluir_amizade_".$idusuario;
switch($status_amizade){
case 2:
$mensagem_excluir_cancelar .= "Deseja excluir $link_perfil_usuario da sua lista de amigos?"; $mensagem_excluir_cancelar .= "<br>"; $mensagem_excluir_cancelar .= "<br>"; break;
case 3:
$mensagem_excluir_cancelar .= "Canelar solicitação de amizade para $link_perfil_usuario?"; $mensagem_excluir_cancelar .= "<br>"; $mensagem_excluir_cancelar .= "<br>"; break;
};
$codigo_html_bruto = $mensagem_excluir_cancelar.$codigo_html_bruto; $codigo_html_bruto = janela_mensagem_dialogo($titulo_janela, $codigo_html_bruto, $div_id_janela_cancelar_excluir_amizade); $codigo_html_bruto .= "<div class='div_campo_amizade'>";
$codigo_html_bruto .= $botao_amizade[0];
$codigo_html_bruto .= "</div>";
};
$codigo_html_bruto .= constroe_campo_bloquear_usuario(); return $codigo_html_bruto; };
function constroe_amizades_usuario(){
global $url_pagina_inicial_site; global $formulario_confirma_solicitacoes_amizades; global $enderecos_arquivos_php_uteis; $url_formulario_confirma_solicitacoes_amizades = $enderecos_arquivos_php_uteis['aceitar_solicitacoes_amizades']; $formulario_confirma_solicitacoes_amizades[1] .= "Confirme se deseja aceitar todas as solicitações de amizades."; $formulario_confirma_solicitacoes_amizades[1] .= "<br>"; $formulario_confirma_solicitacoes_amizades[1] .= "<br>"; $formulario_confirma_solicitacoes_amizades[1] .= "<form action='$url_formulario_confirma_solicitacoes_amizades' method='post'>"; $formulario_confirma_solicitacoes_amizades[1] .= "<input type='hidden' name='aceitar_todos' value='1'>"; $formulario_confirma_solicitacoes_amizades[1] .= "<input type='submit' value='Confirmar' class='botao_padrao'>"; $formulario_confirma_solicitacoes_amizades[1] .= "</form>"; $formulario_confirma_solicitacoes_amizades[2] .= "Confirme se deseja recusar todas as solicitações de amizades."; $formulario_confirma_solicitacoes_amizades[2] .= "<br>"; $formulario_confirma_solicitacoes_amizades[2] .= "<br>"; $formulario_confirma_solicitacoes_amizades[2] .= "<form action='$url_formulario_confirma_solicitacoes_amizades' method='post'>"; $formulario_confirma_solicitacoes_amizades[2] .= "<input type='hidden' name='aceitar_todos' value='2'>"; $formulario_confirma_solicitacoes_amizades[2] .= "<input type='submit' value='Cancelar solicitações' class='botao_padrao'>"; $formulario_confirma_solicitacoes_amizades[2] .= "</form>"; $idusuario = retorne_idusuario_get(); $modo_visualizar_amizades = retorne_modo_visualizar_amizades_get(); $nome_usuario = func_retorna_nome_de_usuario_por_id($idusuario); $div_id = "div_amigos_usuario"; $usuario_dono_perfil = retorna_usuario_vendo_perfil_dono(); $numero_amigos_usuario = retorne_numero_amizades_solicitacoes(1); if($usuario_dono_perfil == true){
$numero_solicitacoes_amizade_enviou = retorne_numero_amizades_solicitacoes(2); $numero_solicitacoes_amizade_recebeu = retorne_numero_amizades_solicitacoes(3); $opcoes_amizade_solicitacoes .= "<span class='span_opcoes_amizades'>"; $opcoes_amizade_solicitacoes .= "<a href='$url_pagina_inicial_site?idusuario=$idusuario&tipo_pagina=4&modo_amizade=2' title='Solicitações'>"; $opcoes_amizade_solicitacoes .= "Solicitações enviei"; $opcoes_amizade_solicitacoes .= "($numero_solicitacoes_amizade_enviou)"; $opcoes_amizade_solicitacoes .= "</a>"; $opcoes_amizade_solicitacoes .= "</span>"; $opcoes_amizade_solicitacoes .= "<br>"; $opcoes_amizade_solicitacoes .= "<span class='span_opcoes_amizades'>"; $opcoes_amizade_solicitacoes .= "<a href='$url_pagina_inicial_site?idusuario=$idusuario&tipo_pagina=4&modo_amizade=3' title='Solicitações'>"; $opcoes_amizade_solicitacoes .= "Solicitações enviaram"; $opcoes_amizade_solicitacoes .= "($numero_solicitacoes_amizade_recebeu)"; $opcoes_amizade_solicitacoes .= "</a>"; $opcoes_amizade_solicitacoes .= "</span>"; $opcoes_amizade_solicitacoes .= "<br>"; };
$mensagem_confirma[1] = $formulario_confirma_solicitacoes_amizades[1]; $mensagem_confirma[2] = $formulario_confirma_solicitacoes_amizades[2]; $titulo_mensagem_confirma = "Confirmação"; $janela_mensagem_id[1] = "janela_mensagem_solicitacao_1"; $janela_mensagem_id[2] = "janela_mensagem_solicitacao_2"; $mensagem_confirma[1] = janela_mensagem_dialogo($titulo_mensagem_confirma, $mensagem_confirma[1], $janela_mensagem_id[1]); $mensagem_confirma[2] = janela_mensagem_dialogo($titulo_mensagem_confirma, $mensagem_confirma[2], $janela_mensagem_id[2]); if($numero_solicitacoes_amizade_enviou > 0 or $numero_solicitacoes_amizade_recebeu > 0){
$campo_aceitar_solicitacoes .= "<div class='campo_aceitar_solicitacoes'>"; $campo_aceitar_solicitacoes .= "<li>"; $campo_aceitar_solicitacoes .= "<span id='mensagem_dialogo_1' style='display: none'>$janela_mensagem_id[1]</span>"; $campo_aceitar_solicitacoes .= "<span id='mensagem_dialogo_2' style='display: none'>$janela_mensagem_id[2]</span>"; $campo_aceitar_solicitacoes .= "<a href='#' title='Aceitar todos' onclick='exibir_janela_mensagem_dialogo_solicitacoes(1, 2);'>Aceitar todos</a>"; $campo_aceitar_solicitacoes .= "<li>"; $campo_aceitar_solicitacoes .= "<a href='#' title='Recusar todos' onclick='exibir_janela_mensagem_dialogo_solicitacoes(2, 1);'>Recusar todos</a>"; $campo_aceitar_solicitacoes .= "</div>"; $campo_aceitar_solicitacoes .= "<br>"; $campo_aceitar_solicitacoes .= $mensagem_confirma[1]; $campo_aceitar_solicitacoes .= $mensagem_confirma[2]; };
$opcoes_amizade .= "<div class='div_opcoes_busca_amizade_usuario'>"; $opcoes_amizade .= $campo_aceitar_solicitacoes; $opcoes_amizade .= $opcoes_amizade_solicitacoes; $opcoes_amizade .= "<span class='span_opcoes_amizades'>"; $opcoes_amizade .= "<a href='$url_pagina_inicial_site?idusuario=$idusuario&tipo_pagina=4&modo_amizade=1' title='Amigos de $nome_usuario'>"; $opcoes_amizade .= "Amigos"; $opcoes_amizade .= "($numero_amigos_usuario)"; $opcoes_amizade .= "</a>"; $opcoes_amizade .= "</span>"; $opcoes_amizade .= "</div>"; $codigo_html_bruto .= $opcoes_amizade;
$codigo_html_bruto .= carrega_lista_usuarios($modo_visualizar_amizades, 1);
$codigo_html_bruto = constroe_div_especial_geral("Amigos de $nome_usuario", $codigo_html_bruto, $div_id);
return $codigo_html_bruto; };
function constroe_bloco_amizades(){
global $tabela_banco; global $url_pagina_inicial_site; $idusuario = retorne_idusuario_visualizando_perfil(); $query = "select *from $tabela_banco[4] where idusuario='$idusuario' and aceitou='2' order by id desc limit 0, 4;";
$comando = comando_executa($query); $contador = 0; $numero_linhas = retorne_numero_linhas_comando($comando); for($contador == $contador; $contador <= $numero_linhas; $contador++){
$dados = mysql_fetch_array($comando, MYSQL_ASSOC);
$idamigo = $dados['idamigo']; if($idamigo != null){
$url_imagem_perfil = retorna_imagem_perfil($idamigo); $nome_usuario = func_retorna_nome_de_usuario_por_id($idamigo); $codigo_html_bruto .= "<div class='div_separa_amizade'>";
$codigo_html_bruto .= "<a href='$url_pagina_inicial_site?idusuario=$idamigo' title='$nome_usuario'>";
$codigo_html_bruto .= "<img src='$url_imagem_perfil' class='imagem_super_miniatura_perfil' title='$nome_usuario'>";
$codigo_html_bruto .= "</a>";
$codigo_html_bruto .= "<br>";
$codigo_html_bruto .= "<a href='$url_pagina_inicial_site?idusuario=$idamigo' title='$nome_usuario'>";
$codigo_html_bruto .= "<div class='div_nome_usuario_bloco'>$nome_usuario</div>";
$codigo_html_bruto .= "</a>";
$codigo_html_bruto .= "</div>";
};
};
return $codigo_html_bruto; };
function remove_referencia_amizade(){
global $tabela_banco; $contador = 4; $idusuario_logado = retorne_idusuario_logado(); $idamigo = remove_html($_POST['idamigo']); if($idamigo == null){
$idamigo = remove_html($_POST['idusuario']); };
if($idusuario_logado == $idamigo or $idamigo == null){
return null; };
for($contador == $contador; $contador <= count($tabela_banco); $contador++){
$query[] = "delete from $tabela_banco[$contador] where idusuario='$idamigo' and idamigo='$idusuario_logado';"; $query[] = "delete from $tabela_banco[$contador] where idusuario='$idusuario_logado' and idamigo='$idamigo';"; $query[] = "delete from $tabela_banco[$contador] where idusuario='$idamigo' and idusuario_comentario='$idusuario_logado';"; $query[] = "delete from $tabela_banco[$contador] where idusuario='$idusuario_logado' and idusuario_comentario='$idamigo';"; };
foreach($query as $valor_query){
if($valor_query != null){
comando_executa($valor_query); };
};
};
function retorne_array_amigos_listados($idusuario){
global $tabela_banco; $limit_query = retorne_limit_tabela_get(); $query = "select *from $tabela_banco[4] where idusuario='$idusuario' and aceitou='2' $limit_query;"; $comando = comando_executa($query); $numero_linhas = retorne_numero_linhas_comando($comando); $contador = 0; $array_idamigo = array(); for($contador == $contador; $contador <= $numero_linhas; $contador++){
$dados = mysql_fetch_array($comando, MYSQL_ASSOC); $idamigo = $dados['idamigo']; if($idamigo != null){
$array_idamigo[] = $idamigo; };
};
return $array_idamigo; };
function retorne_array_amigos_listados_sem_limit($idusuario){
global $tabela_banco; $query = "select *from $tabela_banco[4] where idusuario='$idusuario' and aceitou='2';"; $comando = comando_executa($query); $numero_linhas = retorne_numero_linhas_comando($comando); $contador = 0; $array_idamigo = array(); for($contador == $contador; $contador <= $numero_linhas; $contador++){
$dados = mysql_fetch_array($comando, MYSQL_ASSOC); $idamigo = $dados['idamigo']; if($idamigo != null){
$array_idamigo[] = $idamigo; };
};
return $array_idamigo; };
function retorne_array_amigos_possuem_postagem($idusuario, $modo_retorno){
global $tabela_banco;
global $limite_resultados_pagina;
$campo_tabela[0] = $tabela_banco[4].".idamigo";
$campo_tabela[1] = $tabela_banco[4].".idusuario";
$campo_tabela[2] = $tabela_banco[4].".aceitou";
$campo_tabela[3] = $tabela_banco[9].".idusuario";
$campo_tabela[4] = $tabela_banco[9].".conteudo_post";
$campo_tabela[5] = $tabela_banco[9].".id";
$numero_pagina = retorne_numero_pagina_resultado(); $limit_retorno = "order by $campo_tabela[5] desc limit $numero_pagina, $limite_resultados_pagina"; $query[0] = "select DISTINCT $campo_tabela[5] from $tabela_banco[4], $tabela_banco[9] where $campo_tabela[1]='$idusuario' and $campo_tabela[2]='2' and $campo_tabela[3] = $campo_tabela[0] and $campo_tabela[4]!='' $limit_retorno;";
$query[1] = "select DISTINCT $campo_tabela[5] from $tabela_banco[4], $tabela_banco[9] where $campo_tabela[1]='$idusuario' and $campo_tabela[2]='2' and $campo_tabela[3] = $campo_tabela[0] and $campo_tabela[4]!='';";
if($modo_retorno == false){
return retorne_numero_linhas_query($query[1]);
};
$comando = comando_executa($query[0]);
$contador = 0;
$numero_linhas = retorne_numero_linhas_comando($comando);
$array_retorno = array();
for($contador == $contador; $contador <= $numero_linhas; $contador++){
$dados = mysql_fetch_array($comando, MYSQL_ASSOC);
$idamigo = $dados['id'];
$array_retorno[] = $idamigo;
};
return $array_retorno;
};
function retorne_modo_visualizar_amizades_get(){
$modo_amizade = $_GET['modo_amizade']; if($modo_amizade == null){
$modo_amizade = 1; };
return $modo_amizade; };
function retorne_numero_amizades_logado(){
global $tabela_banco; $idusuario_logado = retorne_idusuario_logado(); $query = "select *from $tabela_banco[4] where idusuario='$idusuario_logado' and aceitou='2';"; return retorne_numero_linhas_query($query); };
function retorne_numero_amizades_solicitacoes($tipo_retorno){
global $tabela_banco; $idusuario = retorne_idusuario_visualizando_perfil(); $idusuario_logado = retorne_idusuario_logado(); switch($tipo_retorno){
case 1:
$query = "select *from $tabela_banco[4] where idusuario='$idusuario' and aceitou='2';"; break;
case 2:
$query = "select *from $tabela_banco[4] where idusuario='$idusuario_logado' and aceitou='3' and tipo_solicita='2';"; break;
case 3:
$query = "select *from $tabela_banco[4] where idusuario='$idusuario_logado' and aceitou='3' and tipo_solicita='1';"; break;
};
$comando = comando_executa($query); return retorne_numero_linhas_comando($comando); };
function retorne_pode_adicionar_amigo(){
global $numero_maximo_amigos_usuario_adicionar; $numero_amigos = retorne_numero_amizades_logado(); if($numero_amigos < $numero_maximo_amigos_usuario_adicionar){
return true; }else{
return false; };
};
function retorne_status_amizade($idamigo){
global $tabela_banco; $idusuario_logado = retorne_idusuario_logado(); $query = "select *from $tabela_banco[4] where idusuario='$idusuario_logado' and idamigo='$idamigo';"; $comando = comando_executa($query); $numero_linhas = mysql_num_rows($comando); $dados = mysql_fetch_array($comando, MYSQL_ASSOC); if($numero_linhas == 0){
return 1; };
$aceitou = $dados['aceitou']; $tipo_solicita = $dados['tipo_solicita']; switch($tipo_solicita){
case 1:
if($aceitou != 2){
$aceitou = 4; };
break;
};
return $aceitou; };
function sugerir_amizades(){
global $tabela_banco; $usuario_dono_perfil = retorna_usuario_vendo_perfil_dono(); if($usuario_dono_perfil == false){
return null; };
$tabela[0] = $tabela_banco[3]; $termo_pesquisa = retorne_termo_pesquisa(); $limit_query = retorne_limit_pesquisa_geral_get(); $idusuario_logado = retorne_idusuario_logado(); $dados_array_usuario = retorna_dados_usuario_array($idusuario_logado); $cidade = $dados_array_usuario['cidade']; $estado = $dados_array_usuario['estado']; $query[0] = "select *from $tabela[0] where cidade like '%$cidade%' and estado like '%$estado%' $limit_query;"; $comando = comando_executa($query[0]); $numero_linhas = retorne_numero_linhas_comando($comando); $contador = 0; for($contador == $contador; $contador <= $numero_linhas; $contador++){
$dados = mysql_fetch_array($comando, MYSQL_ASSOC); $idusuario = $dados['idusuario']; $estatus_amizade = retorne_status_amizade($idusuario); if($idusuario != null and $estatus_amizade == 1 and $idusuario_logado != $idusuario and retorne_esta_bloqueado($idusuario) == false){
$arrays_idusuarios[] = $idusuario; };
};
$url_pesquisa = retorne_url_pesquisa_geral(null, 7); $codigo_html_bruto .= "<a href='$url_pesquisa'>Encontre mais pessoas...</a>";
$codigo_html_bruto .= monta_pacotes_usuarios($arrays_idusuarios, 1);
$codigo_html_bruto = constroe_div_especial_geral("Próximos a você", $codigo_html_bruto, null); return $codigo_html_bruto; };
function constroe_anuncio_pagina($numero_anuncio){
global $codigo_anuncio; if($numero_anuncio == null){
$numero_anuncio = 0; };
$codigo_html_bruto .= $codigo_anuncio[$numero_anuncio];
return $codigo_html_bruto; };
function formulario_cadastro_usuario(){
global $tamanho_minimo_senha; global $url_pagina_cadastro; global $nome_do_sistema; $usuario_logou = logar_usuario(); $tipo_pagina = retorne_tipo_pagina(); if(retorne_esta_logado() == true){
return null; };
$nome = remove_html($_POST['nome']); $email = remove_html($_POST['email']); $senha_1 = remove_html($_POST['senha_1']); $numero_itens_array_post = retorne_numero_itens_array_post(); if($numero_itens_array_post > 0 and $tipo_pagina == 1){
$pode_cadastrar = retorne_pode_cadastrar_usuario(); };
if($pode_cadastrar[1] == true and $tipo_pagina == 1){
adiciona_novo_usuario($nome, $email, $senha_1); $conteudo_boas_vindas .= "Bem vindo(a) ao $nome_do_sistema. $url_do_servidor"; enviar_email($email, $nome, $conteudo_boas_vindas); $_POST['email_cadastro'] = $email; $_POST['senha_cadastro'] = $senha_1; logar_usuario(); die; };
if($pode_cadastrar[1] == false and $numero_itens_array_post > 0 and $tipo_pagina == 1){
$mensagem_cadastro .= $pode_cadastrar[2]; $titulo = "Não foi possível cadastrar você!"; $mensagem_cadastro = div_especial_mensagem_sistema($titulo, $mensagem_cadastro); };
if($usuario_logou == true){
$mensagem_login .= "Parece que você informou seu login com algum erro."; $titulo = "Login incorreto"; $mensagem_login = div_especial_mensagem_sistema($titulo, $mensagem_login); $mensagem_cadastro = $mensagem_login; };
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
$codigo_html_bruto = div_especial_basica_campos($codigo_html_bruto); return $codigo_html_bruto; };
function retorna_dados_cadastrais_usuario_array($idusuario){
global $tabela_banco; $tabela_banco_usando = "$tabela_banco[1]"; $query = "select *from $tabela_banco_usando where idusuario='$idusuario';"; $comando = comando_executa($query); $dados = mysql_fetch_array($comando, MYSQL_ASSOC); return $dados; };
function retorne_pode_cadastrar_usuario(){
global $tamanho_minimo_senha; $nome = remove_html($_POST['nome']); $email = remove_html($_POST['email']); $senha_1 = remove_html($_POST['senha_1']); $senha_2 = remove_html($_POST['senha_2']); $dados_validos = true; $email_valido = verifica_se_email_valido($email); $email_cadastrado = verifica_email_cadastrado($email); if(strlen($senha_1) < $tamanho_minimo_senha or strlen($senha_2) < $tamanho_minimo_senha or $senha_1 != $senha_2){
$codigo_html_bruto .= "Verifique a senha.";
$codigo_html_bruto .= "<br>";
$dados_validos = false; };
if($nome == null){
$codigo_html_bruto .= "Verifique o nome.";
$codigo_html_bruto .= "<br>";
$dados_validos = false; };
if($email_valido == false){
$codigo_html_bruto .= "O e-mail não é válido.";
$codigo_html_bruto .= "<br>";
$dados_validos = false; };
if($email_cadastrado == true){
$codigo_html_bruto .= "O e-mail já existe.";
$codigo_html_bruto .= "<br>";
$dados_validos = false; };
$dados_retorno[1] = $dados_validos; $dados_retorno[2] = $codigo_html_bruto; return $dados_retorno; };
function verifica_email_cadastrado($email_informado){
global $tabela_banco; $query = "select *from $tabela_banco[1] where email='$email_informado';"; $comando = comando_executa($query); $numero_linhas = mysql_num_rows($comando); if($numero_linhas > 0){
return true; }else{
return false; };
};
function constroe_campos_social_publicacoes_gerais($dados){
global $tabela_banco; $id = $_POST['id']; $tipo_curtida = $_POST['tipo_curtida']; $tipo_comentario = $_POST['tipo_comentario']; if($tipo_curtida != null){
$tipo_identificador = $tipo_curtida; }else{
$tipo_identificador = $tipo_comentario; };
if($id != null){
switch($tipo_identificador){
case 1: $query = "select *from $tabela_banco[6] where id='$id';"; break;
case 2: $query = "select *from $tabela_banco[9] where id='$id';"; break;
case 3: $query = "select *from $tabela_banco[11] where id='$id';"; break;
};
$dados = retorne_dados_query($query); };
$id = $dados['id']; $idusuario = $dados['idusuario']; $conteudo_post = $dados['conteudo_post']; $idalbum_imagens = $dados['idalbum_imagens']; $data_publicacao = $dados['data_publicacao']; $privacidade = $dados['privacidade']; $identificador = $dados['identificador']; $numero_div_id = retorne_numero_div_id($dados); $div_id = "campos_social_publicacoes_gerais".$numero_div_id; $campos_disponiveis .= links_social_publicacoes_gerais($dados); $campos_disponiveis .= campo_comentario($dados); $campos_disponiveis .= campo_exibe_curtidas($dados); $campos_disponiveis .= campo_div_comentarios_usuarios($dados); if($tipo_curtida == null and $tipo_comentario == null){
$codigo_html_bruto .= "<div class='campos_social_publicacoes_gerais' id='$div_id'>";
$codigo_html_bruto .= $campos_disponiveis;
$codigo_html_bruto .= "</div>";
}else{
$codigo_html_bruto .= $campos_disponiveis;
};
return $codigo_html_bruto; };
function links_social_publicacoes_gerais($dados){
global $identificador_album; global $identificador_postagem; global $identificador_comentario_usuario; global $enderecos_arquivos_php_uteis; global $url_pagina_inicial_site; $url_imagem = $dados['url_imagem']; $url_imagem_miniatura = $dados['url_imagem_miniatura']; $descricao = $dados['descricao']; $id = $dados['id']; $idusuario = $dados['idusuario']; $conteudo_post = $dados['conteudo_post']; $idalbum_imagens = $dados['idalbum_imagens']; $data_publicacao = $dados['data_publicacao']; $privacidade = $dados['privacidade']; $idcomentario = $dados['idcomentario'];
$identificador = $dados['identificador']; $idpublicacao_get_temporario = define_idpublicacao_temporario_get(null, false); $idusuario_logado = retorne_idusuario_logado(); $url_link_ancora = "#social"; switch($identificador){
case $identificador_album: $tipo_identificador = 1; $id_real_curtida = retorne_id_real_curtida($id, $identificador_album); break;
case $identificador_postagem: $tipo_identificador = 2; $id_real_curtida = retorne_id_real_curtida($id, $identificador_postagem); break;
case $identificador_comentario_usuario; $tipo_identificador = 3; $id_real_curtida = retorne_id_real_curtida($id, $identificador_comentario_usuario); break;
};
if(retorne_curtiu($id, $identificador) == false){
$campo_curtir = "<a href='$url_link_ancora' title='Curtir' onclick='curtir_social_geral($id, $tipo_identificador, $id_real_curtida, $idusuario);'>Curtir</a>"; }else{
$campo_curtir = "<a href='$url_link_ancora' title='Descurtir' onclick='curtir_social_geral($id, $tipo_identificador, $id_real_curtida, $idusuario);'>Descurtir</a>"; };
$compartilhado_resposta = retorne_esta_compartilhado($idusuario_logado, $idusuario, $idpublicacao_get_temporario); $numero_compartilhamentos = retorne_numero_compartilhamentos_publicacao($idpublicacao_get_temporario); if($numero_compartilhamentos > 1){
$codigo_numero_compartilhamentos .= retorne_tamanho_resultado($numero_compartilhamentos); $codigo_numero_compartilhamentos .= "&nbsp;"; $codigo_numero_compartilhamentos .= "vezes"; }else{
$codigo_numero_compartilhamentos .= $numero_compartilhamentos; $codigo_numero_compartilhamentos .= "&nbsp;"; $codigo_numero_compartilhamentos .= "vêz"; };
$codigo_numero_compartilhamentos = "<a href='$url_pagina_inicial_site?tipo_pagina=15&post_id=$idpublicacao_get_temporario'>$codigo_numero_compartilhamentos</a>"; if($idusuario_logado != $idusuario and $idusuario != null and $compartilhado_resposta == false and $idpublicacao_get_temporario != null){
$url_script_compartilhar = $enderecos_arquivos_php_uteis['compartilhar_conteudo']; $campo_compartilhar .= "<form action='$url_script_compartilhar' method='post'>"; $campo_compartilhar .= "Compartilhar isto?"; $campo_compartilhar .= "<br>"; $campo_compartilhar .= "Ao fazer isto este conteúdo será colocado em sua linha de tempo."; $campo_compartilhar .= "<input type='hidden' name='idusuario' value='$idusuario_logado'>"; $campo_compartilhar .= "<input type='hidden' name='idamigo' value='$idusuario'>"; $campo_compartilhar .= "<input type='hidden' name='id' value='$idpublicacao_get_temporario'>"; $campo_compartilhar .= "<br>"; $campo_compartilhar .= "<br>"; $campo_compartilhar .= "<input type='submit' class='botao_padrao' value='Compartilhar'>"; $campo_compartilhar .= "</form>"; $titulo_compartilhar = "Compartilhar isto"; $id_div_compartilhar = "div_compartilhar_conteudo".retorne_numero_div_id($dados); $campo_compartilhar = janela_mensagem_dialogo($titulo_compartilhar, $campo_compartilhar, $id_div_compartilhar);
$campo_compartilhar .= "&nbsp;"; $campo_compartilhar .= "-"; $campo_compartilhar .= "&nbsp;"; $campo_compartilhar .= "<a href='$url_link_ancora' title='Compartilhar' onclick='compartilhar_conteudo_usuario($id, $tipo_identificador)'>Compartilhar</a>"; };
if($compartilhado_resposta == true){
$campo_compartilhar .= "&nbsp;"; $campo_compartilhar .= "-"; $campo_compartilhar .= "&nbsp;"; $campo_compartilhar .= "Compartilhado"; $campo_compartilhar .= "&nbsp;"; $campo_compartilhar .= $codigo_numero_compartilhamentos; };
$codigo_html_bruto .= "<div class='links_social_publicacoes_gerais'>";
$codigo_html_bruto .= $campo_curtir;
$codigo_html_bruto .= $campo_compartilhar;
$codigo_html_bruto .= "</div>";
return $codigo_html_bruto; };
function remover_referencia_publicacao_global($idpost_remover){
global $tabela_banco; $idpost = remove_html($_POST['idpost']); if($idpost_remover != null){
$idpost = $idpost_remover; };
exclui_curtidas_gerais($idpost); $query[] = "delete from $tabela_banco[10] where id='$idpost';"; $query[] = "delete from $tabela_banco[11] where idcomentario='$idpost';"; foreach($query as $valor_query){
if($valor_query != null){
comando_executa($valor_query); };
};
};
function retorne_numero_div_id($dados){
global $identificador_album; global $identificador_postagem; global $identificador_comentario_usuario; $id = $dados['id']; $identificador = $dados['identificador']; switch($identificador){
case $identificador_album:
$numero_div_id = "_".$id."_1"; break;
case $identificador_postagem:
$numero_div_id = "_".$id."_2"; break;
case $identificador_comentario_usuario:
$numero_div_id = "_".$id."_3"; break;
};
return $numero_div_id; };
function altera_modo_tipo_carrega_mensagens_chat(){
$tipo_mensagem_chat_carregar = remove_html($_POST['tipo_mensagem_chat_carregar']); retorne_tipo_mensagem_chat_carregar(true, $tipo_mensagem_chat_carregar); };
function atualizar_sessao_idusuarios_disponiveis_chat($array_amigos){
session_start(); $_SESSION['sessao_idusuarios_disponiveis_chat'] = $array_amigos; };
function campo_avanco_usuarios_chat(){
global $imagem_servidor; $imagem[0] = "<img src='".$imagem_servidor['voltar']."' title='Voltar'>"; $imagem[1] = "<img src='".$imagem_servidor['avancar']."' title='Avançar'>"; $codigo_html_bruto .= "<div class='div_avanco_amigos_chat_usuario'>";
$codigo_html_bruto .= "<a href='#1' id='#1' onclick='avancar_amigos_chat(1);'>$imagem[0]</a>";
$codigo_html_bruto .= "&nbsp;";
$codigo_html_bruto .= "&nbsp;";
$codigo_html_bruto .= "<a href='#2' id='#2' onclick='avancar_amigos_chat(2);'>$imagem[1]</a>";
$codigo_html_bruto .= "</div>";
return $codigo_html_bruto; };
function campo_ocultar_exibir_chat(){
$codigo_html .= "<div class='classe_campo_ocultar_exibir_chat' onclick='ocultar_chat_usuario();'>"; $codigo_html .= "Novas mensagens"; $codigo_html .= " - "; $codigo_html .= "<span id='div_campo_ocultar_exibir_chat' class='label label-danger'>0</span>"; $codigo_html .= "</div>"; return $codigo_html;
};
function campo_usuario_online_chat($idusuario){
global $imagem_servidor; $imagem[0] = "<img src='".$imagem_servidor['online']."' title='On-line'>"; $codigo_html_bruto .= "<span class='classe_span_usuario_online_chat' id='span_usuario_online_chat_$idusuario'>";
$codigo_html_bruto .= $imagem[0];
$codigo_html_bruto .= "</span>";
return $codigo_html_bruto; };
function carregar_chat_usuario(){
$codigo_html_bruto .= "<div class='classe_div_chat_usuario' id='div_chat_usuarios_disponiveis' onkeydown='if(event.keyCode == 27){ocultar_chat_usuario();}'>";
$codigo_html_bruto .= constroe_modo_tipo_mensagens_carregar();
$codigo_html_bruto .= campo_avanco_usuarios_chat();
$codigo_html_bruto .= "<div id='div_lista_amigos_chat_usuario'></div>";
$codigo_html_bruto .= "</div>";
return $codigo_html_bruto; };
function carregar_mensagens_chat(){
global $separador_mensagem_chat; $idusuario = retorne_idusuario_sessao_chat(null, false); $idusuario_logado = retorne_idusuario_logado(); $dados_mensagem[0] = dados_mensagem(0); $conteudo_mensagem_chat = $dados_mensagem[0]['mensagem']; $conteudo_mensagem_chat = str_replace($separador_mensagem_chat[0], "<div class='balao_mensagem_enviou'>", $conteudo_mensagem_chat); $conteudo_mensagem_chat = str_replace($separador_mensagem_chat[1], "<div class='balao_mensagem_recebeu'>", $conteudo_mensagem_chat); $conteudo_mensagem_chat = str_replace($separador_mensagem_chat[2], "</div>", $conteudo_mensagem_chat); $conteudo_mensagem_chat = str_replace($separador_mensagem_chat[3], "<br><br>", $conteudo_mensagem_chat); $conteudo_mensagem_chat = converte_urls_texto_links($conteudo_mensagem_chat); $conteudo_mensagem_chat = converte_codigo_emoticon($conteudo_mensagem_chat); $codigo_html_bruto .= $conteudo_mensagem_chat;
return $codigo_html_bruto; };
function carrega_amigos_chat(){
$idusuario = retorne_idusuario_logado(); $tipo_mensagem_chat = retorne_tipo_mensagem_chat_carregar(false, null); if($tipo_mensagem_chat == 1){
$array_amigos = retorne_idusuarios_novas_mensagens(); }else{
$array_amigos = retorne_array_amigos_listados($idusuario); };
if(count($array_amigos) == 0){
return null; };
atualizar_sessao_idusuarios_disponiveis_chat($array_amigos); $codigo_html_bruto .= constroe_amigos_chat($array_amigos);
return $codigo_html_bruto; };
function constroe_amigos_chat($array_amigos){
foreach($array_amigos as $idusuario){
if($idusuario != null){
$codigo_html_bruto .= "<div class='div_separa_usuario_chat' onclick='constroe_campo_conversa_chat($idusuario);'>";
$codigo_html_bruto .= constroe_perfil_chat_usuario($idusuario);
$codigo_html_bruto .= "</div>";
};
};
return $codigo_html_bruto; };
function constroe_campo_conversa_chat(){
global $imagem_servidor; $idusuario = retorne_idusuario_post(); retorne_idusuario_sessao_chat($idusuario, true); $imagem_emoticon = "<img src='".$imagem_servidor['emoticon']."' title='Memes e emoticons'>"; $imagem_carregar_mais = "<img src='".$imagem_servidor['carregar_mais']."' title='Mais' onclick='carregar_mais_mensagens_chat_usuario(1);'>"; $imagem_carregar_menos = "<img src='".$imagem_servidor['carregar_menos']."' title='Menos' onclick='carregar_mais_mensagens_chat_usuario(2);'>"; $campo_carregar_mais .= "<div id='div_carregar_mais_mensagens_chat'>"; $campo_carregar_mais .= $imagem_carregar_mais; $campo_carregar_mais .= "&nbsp;"; $campo_carregar_mais .= "&nbsp;"; $campo_carregar_mais .= $imagem_carregar_menos; $campo_carregar_mais .= "</div>"; $codigo_html_bruto .= constroe_perfil_chat_usuario($idusuario);
$codigo_html_bruto .= menu_opcoes_conversa_chat($idusuario);
$codigo_html_bruto .= "<div id='div_campo_troca_mensagens_chat'></div>";
$codigo_html_bruto .= "<div class='campo_escreve_mensagem_chat'>";
$codigo_html_bruto .= $campo_carregar_mais;
$codigo_html_bruto .= campo_exibir_emoticons_memes();
$codigo_html_bruto .= "<input type='text' id='campo_input_chat' placeholder='Sua mensagem' onkeydown='if(event.keyCode == 13){enviar_mensagem_chat($idusuario);}' autofocus>";
$codigo_html_bruto .= "<br>";
$codigo_html_bruto .= "<input type='button' class='botao_padrao' value='Enviar' onclick='enviar_mensagem_chat($idusuario);'>";
$codigo_html_bruto .= "</div>";
return $codigo_html_bruto; };
function constroe_modo_tipo_mensagens_carregar(){
global $imagem_servidor; $imagem[0] = $imagem_servidor['chat']; $imagem[0] = "<img src='$imagem[0]' title='Chat'>"; $numero_novas_mensagens = retorne_numero_novas_mensagens(); $span_numero_novas_mensagens = "<span id='span_numero_novas_mensagens_chat_menu_modo_tipo'>$numero_novas_mensagens</span>"; $titulo_menu_especial .= "$imagem[0]"; $titulo_menu_especial .= "&nbsp;"; $titulo_menu_especial .= "Mensagens"; $titulo_menu_especial .= " - "; $titulo_menu_especial .= "<span id='span_numero_novas_mensagens_chat_menu_modo_tipo_titulo'>$numero_novas_mensagens</span>"; $dialogo_excluir_mensagens .= "Isto apagará todas as suas mensagens.";
$dialogo_excluir_mensagens .= "<br>";
$dialogo_excluir_mensagens .= "<br>";
$dialogo_excluir_mensagens .= "<input type='button' class='botao_padrao' value='Faça isto' onclick='excluir_todas_mensagens_usuario();'>";
$dialogo_excluir_mensagens .= "<input type='button' class='botao_padrao' value='Cancelar' onclick='dialogo_excluir_todas_mensagens();'>";
$dialogo_excluir_mensagens = janela_mensagem_dialogo("Excluir todas", $dialogo_excluir_mensagens, "div_excluir_todas_mensagens_usuario");
$opcoes_menu[] = "<li role='presentation'><a href='#1' id='#1' onclick='altera_modo_tipo_carrega_mensagens_chat(1);'>Novas mensagens - $span_numero_novas_mensagens</a></li>"; $opcoes_menu[] = "<li role='presentation'><a href='#2' id='#2' onclick='altera_modo_tipo_carrega_mensagens_chat(2);'>Todas</a></li>"; $opcoes_menu[] = "<li role='presentation' class='divider'></li>"; $opcoes_menu[] = "<li role='presentation'><a href='#3' id='#3' onclick='dialogo_excluir_todas_mensagens();'>Excluir todas</a></li>"; $codigo_html_bruto .= "<div class='classe_modo_tipo_mensagens_carregar'>";
$codigo_html_bruto .= constroe_menu_drop_especial($opcoes_menu, $titulo_menu_especial);
$codigo_html_bruto .= "</div>";
$codigo_html_bruto .= $dialogo_excluir_mensagens;
return $codigo_html_bruto; };
function constroe_perfil_chat_usuario($idusuario){
$nome_usuario = converte_para_utf8(func_retorna_nome_de_usuario_por_id($idusuario)); $imagem_usuario = retorna_imagem_perfil_miniatura($idusuario); $imagem_usuario = "<img src='$imagem_usuario' title='$nome_usuario' class='imagem_miniatura_perfil_chat'>"; $mensagem_nova_existe = retorne_existe_mensagem_nova_chat($idusuario); if($mensagem_nova_existe == true){
$campo_existe_nova_mensagem .= "<span id='span_campo_existe_nova_mensagem_$idusuario' class='label label-danger'>"; $campo_existe_nova_mensagem .= "1"; $campo_existe_nova_mensagem .= "</span>"; $campo_existe_nova_mensagem .= "&nbsp;"; }else{
$campo_existe_nova_mensagem .= "<span id='span_campo_existe_nova_mensagem_$idusuario' class='label label-danger'>"; $campo_existe_nova_mensagem .= ""; $campo_existe_nova_mensagem .= "</span>"; $campo_existe_nova_mensagem .= "&nbsp;"; };
$codigo_html_bruto .= $imagem_usuario;
$codigo_html_bruto .= campo_usuario_online_chat($idusuario);
$codigo_html_bruto .= $campo_existe_nova_mensagem;
$codigo_html_bruto .= $nome_usuario;
return $codigo_html_bruto; };
function criar_registros_conversa_chat($idusuario){
global $tabela_banco; $idusuario_logado = retorne_idusuario_logado(); $query = "select *from $tabela_banco[22] where idusuario='$idusuario_logado' and idamigo='$idusuario';"; $numero_linhas = retorne_numero_linhas_query($query); $query = null; if($numero_linhas > 1){
$query[] = "delete from $tabela_banco[22] where idamigo='$idusuario_logado' and idusuario='$idusuario';"; $query[] = "delete from $tabela_banco[22] where idamigo='$idusuario' and idusuario='$idusuario_logado';"; executador_querys($query); $query[] = null; };
if($numero_linhas == 0){
$query[] = "insert into $tabela_banco[22] values('null', '$idusuario_logado', '$idusuario', '', '', '');"; $query[] = "insert into $tabela_banco[22] values('null', '$idusuario', '$idusuario_logado', '', '', '');"; executador_querys($query); };
};
function dados_mensagem($tipo_mensagem){
global $tabela_banco; $idusuario = retorne_idusuario_sessao_chat(null, false); $idusuario_logado = retorne_idusuario_logado(); switch($tipo_mensagem){
case 0: $query = "select *from $tabela_banco[22] where idusuario='$idusuario_logado' and idamigo='$idusuario';"; break;
case 1: $query = "select *from $tabela_banco[22] where idusuario='$idusuario' and idamigo='$idusuario_logado';"; break;
};
return retorne_dados_query($query); };
function enviar_mensagem_chat(){
global $tabela_banco; global $separador_mensagem_chat; $conteudo_mensagem_chat = remove_html($_POST['conteudo_mensagem_chat']); $idusuario = retorne_idusuario_sessao_chat(null, false); if($conteudo_mensagem_chat == null or $idusuario == null){
return null; };
$idusuario_logado = retorne_idusuario_logado(); criar_registros_conversa_chat($idusuario); $data_atual = data_atual(); $data_atual_normal = hora_atual(); $dados_mensagem[0] = dados_mensagem(0); $dados_mensagem[1] = dados_mensagem(1); $data_completa_envio = "Ás ".$data_atual_normal.$separador_mensagem_chat[3]; $data_completa_envio = converte_para_utf8($data_completa_envio); $conteudo_mensagem_chat = $data_completa_envio.$conteudo_mensagem_chat; $mensagem[0] = $dados_mensagem[0]['mensagem'].$separador_mensagem_chat[0].$conteudo_mensagem_chat.$separador_mensagem_chat[2]; $mensagem[1] = $dados_mensagem[1]['mensagem'].$separador_mensagem_chat[1].$conteudo_mensagem_chat.$separador_mensagem_chat[2]; $query[] = "update $tabela_banco[22] set mensagem='$mensagem[0]', data_mensagem='$data_atual', visualizada='0' where idusuario='$idusuario_logado' and idamigo='$idusuario';"; $query[] = "update $tabela_banco[22] set mensagem='$mensagem[1]', data_mensagem='$data_atual', visualizada='1' where idusuario='$idusuario' and idamigo='$idusuario_logado';"; executador_querys($query); };
function excluir_conversa_chat(){
global $tabela_banco; $idusuario = retorne_idusuario_sessao_chat(null, false); $idusuario_logado = retorne_idusuario_logado(); $query[] = "update $tabela_banco[22] set mensagem='', data_mensagem='', visualizada='0' where idusuario='$idusuario_logado' and idamigo='$idusuario';"; $query[] = "update $tabela_banco[22] set visualizada='1' where idamigo='$idusuario_logado' and idusuario='$idusuario';"; $query[] = "update $tabela_banco[22] set visualizada='1' where idusuario='$idusuario_logado' and idamigo='$idusuario';"; executador_querys($query); };
function menu_opcoes_conversa_chat($idusuario){
$opcoes_menu[] = "<li role='presentation'><a href='#1' id='#1' onclick='reseta_contador_avanco_chat(); carregar_chat_usuario();'>Amigos</a></li>"; $opcoes_menu[] = "<li role='presentation' class='divider'></li>"; $opcoes_menu[] = "<li role='presentation'><a href='#2' id='#2' onclick='excluir_conversa_chat($idusuario);'>Excluir conversa</a></li>"; $codigo_html_bruto .= "<div class='div_menu_opcoes_conversa_chat'>"; $codigo_html_bruto .= constroe_menu_drop_especial($opcoes_menu, null); $codigo_html_bruto .= "</div>"; return $codigo_html_bruto; };
function retorne_existe_mensagem_nova_chat($idusuario){
global $tabela_banco; $idusuario_logado = retorne_idusuario_logado(); $query = "select *from $tabela_banco[22] where idusuario='$idusuario' and idamigo='$idusuario_logado' and visualizada='0';"; $numero_linhas = retorne_numero_linhas_query($query); if($numero_linhas > 0){
return true; }else{
return false; };
};
function retorne_idusuarios_novas_mensagens(){
global $tabela_banco; $idusuario_logado = retorne_idusuario_logado(); $query = "select *from $tabela_banco[22] where idamigo='$idusuario_logado' and visualizada='0';"; $comando = comando_executa($query); $contador = 0; $numero_linhas = retorne_numero_linhas_comando($comando); $array_idusuarios_retorno = array(); for($contador == $contador; $contador <= $numero_linhas; $contador++){
$dados = mysql_fetch_array($comando, MYSQL_ASSOC); $idusuario = $dados['idusuario']; if($idusuario != null){
$array_idusuarios_retorno[] = $idusuario; };
};
return $array_idusuarios_retorno; };
function retorne_idusuario_sessao_chat($idusuario, $modo_sessao){
session_start(); if($modo_sessao == true){
$_SESSION['idusuario_chat'] = $idusuario; }else{
return $_SESSION['idusuario_chat']; };
};
function retorne_mensagem_respondida_usuario($idusuario){
global $tabela_banco; $query = "select *from $tabela_banco[22] where idamigo='$idusuario' and visualizada='0';"; $numero_linhas = retorne_numero_linhas_query($query); if($numero_linhas > 0){
return true; }else{
return false; };
};
function retorne_numero_novas_mensagens(){
global $tabela_banco; $idusuario_logado = retorne_idusuario_logado(); $query = "select *from $tabela_banco[22] where idamigo='$idusuario_logado' and visualizada='0';"; return retorne_numero_linhas_query($query); };
function retorne_tipo_mensagem_chat_carregar($modo_retorno, $tipo_mensagem){
session_start(); if($modo_retorno == true){
$_SESSION['tipo_mensagem_chat_carregar'] = $tipo_mensagem; return null; }else{
$tipo_mensagem = $_SESSION['tipo_mensagem_chat_carregar']; };
if($tipo_mensagem == null){
$tipo_mensagem = 2; };
return $tipo_mensagem; };
function atualizar_comentario(){
global $tabela_banco; $id = remove_html($_POST['id']); $comentario = remove_html($_POST['comentario']); $comentario = converte_para_utf8($comentario); $idusuario_logado = retorne_idusuario_logado(); $data_atual = data_atual(); $query = "update $tabela_banco[11] set comentario='$comentario', data_comentou='$data_atual' where idcomentario='$id' and idusuario_comentario='$idusuario_logado';"; comando_executa($query); };
function campo_carregar_mais_comentarios($dados){
global $tabela_banco; global $imagem_servidor; global $identificador_album; global $identificador_postagem; $tipo_pagina = retorne_tipo_pagina(); $id = $_POST['id']; $tipo_comentario = $_POST['tipo_comentario']; if($id != null){
switch($tipo_comentario){
case 1: $query = "select *from $tabela_banco[6] where id='$id' and identificador='$identificador_album';"; break;
case 2: $query = "select *from $tabela_banco[9] where id='$id' and identificador='$identificador_postagem';"; break;
};
$dados = retorne_dados_query($query); };
$id = $dados['id']; $identificador = $dados['identificador']; switch($identificador){
case $identificador_album: $tipo_comentario = 1; break;
case $identificador_postagem: $tipo_comentario = 2; break;
};
$numero_comentarios = retorne_numero_comentarios($dados); $imagem_comentario = $imagem_servidor['mais']; $imagem_comentario = "<img src='$imagem_comentario' title='Mais comentários'>"; $codigo_html_bruto .= "<a href='#comentario' onclick='exibir_comentarios_postagem($id, $tipo_comentario, $tipo_pagina);'>";
$codigo_html_bruto .= $imagem_comentario;
$codigo_html_bruto .= "</a>";
$codigo_html_bruto .= "&nbsp;";
$codigo_html_bruto .= "<a href='#comentario' onclick='exibir_comentarios_postagem($id, $tipo_comentario, $tipo_pagina);'>";
$codigo_html_bruto .= "Carregar mais comentários";
$codigo_html_bruto .= "</a>";
return $codigo_html_bruto; };
function campo_comentario($dados){
global $identificador_album; global $identificador_postagem; $id = $dados['id']; $idusuario = $dados['idusuario']; $conteudo_post = $dados['conteudo_post']; $idalbum_imagens = $dados['idalbum_imagens']; $data_publicacao = $dados['data_publicacao']; $privacidade = $dados['privacidade']; $identificador = $dados['identificador']; $idusuario_logado = retorne_idusuario_logado(); $nome_id_campo_input = gera_idcampo_input_comentario($dados); switch($identificador){
case $identificador_album: $tipo_comentario = 1; break;
case $identificador_postagem: $tipo_comentario = 2; break;
};
$codigo_html_bruto .= "<div class='div_imagem_perfil_campo_comentario'>";
$codigo_html_bruto .= constroe_imagem_perfil_publicacao($idusuario_logado);
$codigo_html_bruto .= "</div>";
$codigo_html_bruto .= "<input type='text' id='$nome_id_campo_input' class='campo_input_comentario_publicacao' placeholder='Comentar' onkeydown='if(event.keyCode == 13){publicar_comentario_publicacao($id, $tipo_comentario, $idusuario);}'>";
return $codigo_html_bruto; };
function campo_div_comentarios_usuarios($dados){
$numero_comentarios = retorne_numero_comentarios($dados); $campo_numero_comentarios .= "<div class='campo_numero_comentarios'>"; $campo_numero_comentarios .= campo_exibe_numero_comentarios($dados); $campo_numero_comentarios .= "</div>"; $nome_identifica_div = "div_comentarios_usuarios_exibir".retorne_numero_div_id($dados); $nome_identifica_span_contadora = "span_conta_avanco_comentario".retorne_numero_div_id($dados); $codigo_html_bruto .= "<div class='campo_div_comentarios_usuarios'>";
$codigo_html_bruto .= $campo_numero_comentarios;
$codigo_html_bruto .= "<span class='classe_span_conta_avanco_comentario' id='$nome_identifica_span_contadora'>0</span>";
$codigo_html_bruto .= "<div id='$nome_identifica_div'>";
$codigo_html_bruto .= carregar_comentarios();
$codigo_html_bruto .= "</div>";
$codigo_html_bruto .= "</div>";
$codigo_html_bruto .= "<div class='campo_div_comentarios_usuarios'>";
$codigo_html_bruto .= campo_carregar_mais_comentarios($dados);
$codigo_html_bruto .= "</div>";
if($numero_comentarios > 0){
return $codigo_html_bruto; }else{
return null; };
};
function campo_exibe_numero_comentarios($dados){
global $tabela_banco; global $imagem_servidor; global $identificador_album; global $identificador_postagem; $tipo_pagina = retorne_tipo_pagina(); $id = $_POST['id']; $tipo_comentario = $_POST['tipo_comentario']; if($id != null){
switch($tipo_comentario){
case 1: $query = "select *from $tabela_banco[6] where id='$id' and identificador='$identificador_album';"; break;
case 2: $query = "select *from $tabela_banco[9] where id='$id' and identificador='$identificador_postagem';"; break;
};
$dados = retorne_dados_query($query); };
$id = $dados['id']; $identificador = $dados['identificador']; switch($identificador){
case $identificador_album: $tipo_comentario = 1; break;
case $identificador_postagem: $tipo_comentario = 2; break;
};
$numero_comentarios = retorne_numero_comentarios($dados); $imagem_comentario = $imagem_servidor['comentario']; $imagem_comentario = "<img src='$imagem_comentario' title='Comentários'>"; if($numero_comentarios > 1){
$informa_numero_comentarios = "comentários"; }else{
$informa_numero_comentarios = "comentário"; };
$codigo_html_bruto .= "<a href='#comentario' onclick='exibir_comentarios_postagem($id, $tipo_comentario, $tipo_pagina);'>";
$codigo_html_bruto .= $imagem_comentario;
$codigo_html_bruto .= "</a>";
$codigo_html_bruto .= "&nbsp;";
$codigo_html_bruto .= "<a href='#comentario' onclick='exibir_comentarios_postagem($id, $tipo_comentario, $tipo_pagina);'>";
$codigo_html_bruto .= $numero_comentarios;
$codigo_html_bruto .= "&nbsp;";
$codigo_html_bruto .= $informa_numero_comentarios;
$codigo_html_bruto .= "</a>";
return $codigo_html_bruto; };
function carregar_comentarios(){
global $tabela_banco; global $identificador_album; global $identificador_postagem; sessao_numero_pagina_atual(1); $numero_pagina_post = $_POST['numero_pagina']; if($numero_pagina_post != null){
$_GET['numero_pagina'] = $numero_pagina_post; };
$id = $_POST['id']; $tipo_curtida = $_POST['tipo_curtida']; $tipo_comentario = $_POST['tipo_comentario']; $numero_pagina = retorne_numero_pagina_resultado(); if($tipo_curtida != null){
return null; };
$limit_query = retorne_limit_tabela_comentarios_get(); $idusuario_logado = retorne_idusuario_logado(); switch($tipo_comentario){
case 1:
$identificador = $identificador_album; break;
case 2:
$identificador = $identificador_postagem; break;
};
$query = "select *from $tabela_banco[11] where idcomentario='$id' and identificador='$identificador' $limit_query;"; $comando = comando_executa($query); $numero_linhas = retorne_numero_linhas_comando($comando); $contador = 0; for($contador == $contador; $contador <= $numero_linhas; $contador++){
$dados = mysql_fetch_array($comando, MYSQL_ASSOC); $codigo_html_bruto .= monta_comentario_usuario($dados);
};
$codigo_html_bruto = gera_link_hashtag($codigo_html_bruto); return $codigo_html_bruto; };
function comentar_social(){
global $identificador_album; global $identificador_postagem; global $tabela_banco; $id = $_POST['id']; $idusuario = $_POST['idusuario']; $tipo_comentario = $_POST['tipo_comentario']; $comentario = remove_html($_POST['comentario']); $idusuario_logado = retorne_idusuario_logado(); $dados_ntusuario['tipo_notificacao'] = 1; $dados_ntusuario['idamigo'] = $idusuario; $dados_ntusuario['id'] = $id; $dados_ntusuario['identificador'] = $tipo_comentario; adiciona_notificacao($dados_ntusuario); switch($tipo_comentario){
case 1:
$identificador = $identificador_album; break;
case 2:
$identificador = $identificador_postagem; break;
};
$data_atual = data_atual(); $query = "insert into $tabela_banco[11] values('null', '$id', '$idusuario', '$idusuario_logado', '$data_atual', '$comentario', '$identificador');"; if($id != null and $comentario != null and $tipo_comentario != null){
comando_executa($query); };
};
function gera_idcampo_input_comentario($dados){
global $identificador_album; global $identificador_postagem; $id = $dados['id']; $identificador = $dados['identificador']; switch($identificador){
case $identificador_album:
$numero_div_id = "_".$id."_1"; break;
case $identificador_postagem:
$numero_div_id = "_".$id."_2"; break;
};
$nome_id_campo_input = "campo_input_comentario_publicacao".$numero_div_id; return $nome_id_campo_input; };
function monta_comentario_usuario($dados){
global $enderecos_arquivos_php_uteis; global $identificador_comentario_usuario; $dados_social = $dados; $id = $dados['id']; $idcomentario = $dados['idcomentario']; $idusuario = $dados['idusuario']; $idusuario_comentario = $dados['idusuario_comentario']; $data_comentou = $dados['data_comentou']; $comentario = $dados['comentario']; $identificador = $dados['identificador']; $tipo_pagina = retorne_tipo_pagina(); $idusuario_logado = retorne_idusuario_logado(); $numero_pagina = sessao_numero_pagina_atual(2); if($id == null){
return null; };
$data_comentou = converte_data_amigavel($data_comentou); $url_atualizar_comentario = $enderecos_arquivos_php_uteis['atualizar_comentario_usuario']; $url_remover_comentario = $enderecos_arquivos_php_uteis['excluir_comentario_postagem']; $campo_editar_comentario .= "<div id='campo_editar_comentario_$idcomentario'>"; $campo_editar_comentario .= "<form action='$url_atualizar_comentario' method='post'>"; $campo_editar_comentario .= "<textarea name='comentario' cols='75' rows='5'>$comentario</textarea>"; $campo_editar_comentario .= "<input type='hidden' name='id' value='$idcomentario'>"; $campo_editar_comentario .= "<input type='hidden' name='numero_pagina' value='$numero_pagina'>"; $campo_editar_comentario .= "<input type='hidden' name='tipo_pagina' value='$tipo_pagina'>"; $campo_editar_comentario .= "<input type='hidden' name='idusuario' value='$idusuario'>"; $campo_editar_comentario .= "<br>"; $campo_editar_comentario .= "<br>"; $campo_editar_comentario .= "<input type='submit' class='botao_padrao' value='Atualizar'>"; $campo_editar_comentario .= "</form>"; $campo_editar_comentario .= "</div>"; $campo_excluir_comentario .= "<div id='campo_excluir_comentario_$idcomentario'>"; $campo_excluir_comentario .= "<form action='$url_remover_comentario' method='post'>"; $campo_excluir_comentario .= "Excluir este comentário?"; $campo_excluir_comentario .= "<br>"; $campo_excluir_comentario .= "<br>"; $campo_excluir_comentario .= "<input type='hidden' name='id' value='$id'>"; $campo_excluir_comentario .= "<input type='hidden' name='numero_pagina' value='$numero_pagina'>"; $campo_excluir_comentario .= "<input type='hidden' name='idusuario' value='$idusuario'>"; $campo_excluir_comentario .= "<input type='hidden' name='tipo_pagina' value='$tipo_pagina'>"; $campo_excluir_comentario .= "<input type='hidden' name='idusuario' value='$idusuario'>"; $campo_excluir_comentario .= "<input type='submit' class='botao_padrao' value='Excluir'>"; $campo_excluir_comentario .= "</form>"; $campo_excluir_comentario .= "</div>"; $numero_janelas_dialogo = $id."_".$idusuario_comentario; if($idusuario_comentario == $idusuario_logado){
$campo_opcoes_comentario .= janela_mensagem_dialogo("Editar comentário", $campo_editar_comentario, "campo_editar_comentario_$numero_janelas_dialogo"); };
if($idusuario_comentario == $idusuario_logado or $idusuario == $idusuario_logado){
$campo_opcoes_comentario .= "<div class='classe_campo_opcoes_comentario'>"; $campo_opcoes_comentario .= constroe_menu_drop(retorne_array_opcoes_postagem_comentario($dados)); $campo_opcoes_comentario .= "</div>"; $campo_opcoes_comentario .= janela_mensagem_dialogo("Excluir comentário", $campo_excluir_comentario, "campo_excluir_comentario_$numero_janelas_dialogo"); };
if($idcomentario != null){
$dados_social['identificador'] = $identificador_comentario_usuario; $id_div_comentario = "id_div_comentario".retorne_numero_div_id($dados_social); }else{
$id_div_comentario = "id_div_comentario".retorne_numero_div_id($dados_social); };
$campos_disponiveis .= "<div class='div_campos_disponiveis_social_comentario'>"; $campos_disponiveis .= links_social_publicacoes_gerais($dados_social); $campos_disponiveis .= campo_exibe_curtidas($dados_social); $campos_disponiveis .= "</div>"; $comentario = converte_urls_texto_links($comentario); $comentario = converte_codigo_emoticon($comentario); $codigo_html_bruto .= "<div id='$id_div_comentario' class='monta_comentario_usuario'>";
$codigo_html_bruto .= $campo_opcoes_comentario;
$codigo_html_bruto .= "<div class='classe_div_imagem_perfil_comentario'>";
$codigo_html_bruto .= constroe_imagem_perfil_publicacao($idusuario_comentario);
$codigo_html_bruto .= "</div>";
$codigo_html_bruto .= "<div class='classe_comentario_usuario'>";
$codigo_html_bruto .= retorna_link_perfil_usuario($idusuario_comentario);
$codigo_html_bruto .= " - ";
$codigo_html_bruto .= $comentario;
$codigo_html_bruto .= "</div>";
$codigo_html_bruto .= $campos_disponiveis;
$codigo_html_bruto .= "<div class='monta_comentario_usuario_rodape'>";
$codigo_html_bruto .= $data_comentou;
$codigo_html_bruto .= "</div>";
$codigo_html_bruto .= "</div>";
return $codigo_html_bruto; };
function remove_comentario(){
global $tabela_banco; $idusuario_logado = retorne_idusuario_logado(); $id = $_POST['id']; $idusuario = $_POST['idusuario']; $query = "delete from $tabela_banco[11] where id='$id' and idusuario='$idusuario';"; comando_executa($query); remover_referencia_publicacao_global($id); };
function retorne_array_opcoes_postagem_comentario($dados){
$id = $dados['id']; $idcomentario = $dados['idcomentario']; $idusuario = $dados['idusuario']; $idusuario_comentario = $dados['idusuario_comentario']; $data_comentou = $dados['data_comentou']; $comentario = $dados['comentario']; $identificador = $dados['identificador']; $idusuario_logado = retorne_idusuario_logado(); if($idusuario_comentario == $idusuario_logado){
$array_retorno[] = "<li role='presentation'><a href='#' onclick='dialogo_editar_comentario($id, $idusuario_comentario);'>Editar</a></li>"; $array_retorno[] = "<li role='presentation' class='divider'></li>"; };
$array_retorno[] = "<li role='presentation'><a href='#' onclick='dialogo_excluir_comentario($id, $idusuario_comentario);'>Excluir...</a></li>"; return $array_retorno; };
function retorne_numero_comentarios($dados){
global $tabela_banco; $id = $dados['id']; $identificador = $dados['identificador']; $query = "select *from $tabela_banco[11] where idcomentario='$id' and identificador='$identificador';"; $numero_linhas = retorne_numero_linhas_query($query); return $numero_linhas; };
function sessao_numero_pagina_atual($modo_retorno){
session_start(); if($modo_retorno == 1){
if($_SESSION['numero_pagina'] == null){
$_SESSION['numero_pagina'] = retorne_numero_pagina_resultado(); };
return null; };
$numero_pagina = $_SESSION['numero_pagina']; return $numero_pagina; };
function deleta_cookies(){
global $nome_de_cookie_usr_comum_email; global $nome_de_cookie_usr_comum_senha; global $nome_de_cookie_usr_comum_id; global $nome_de_cookie_resolucao; session_start(); $_SESSION = array(); session_unset(); session_destroy(); $email_cookie = email_cookie(); salvar_cookies($email_cookie, null, null);
setcookie($nome_de_cookie_resolucao, null, 0, "/");
};
function email_cookie(){
global $nome_de_cookie_usr_comum_email; session_start(); $valor_sessao = $_SESSION['email_cadastro']; if(isset($_COOKIE[$nome_de_cookie_usr_comum_email]) == true){
$valor_de_cookie = $_COOKIE[$nome_de_cookie_usr_comum_email]; return $valor_de_cookie; }else{
if($valor_sessao != null){
return $valor_sessao; }else{
return null; };
};
};
function idusuario_cookie(){
global $nome_de_cookie_usr_comum_id; session_start(); $valor_sessao = $_SESSION['idusuario']; if(isset($_COOKIE[$nome_de_cookie_usr_comum_id]) == true){
return $_COOKIE[$nome_de_cookie_usr_comum_id]; }else{
if($valor_sessao != null){
return $valor_sessao; }else{
return null; };
};
};
function retorne_valor_cookie($nome_cookie){
return $_COOKIE[$nome_cookie];
};
function salvar_cookies($email, $senha, $idusuario){
global $nome_de_cookie_usr_comum_email; global $nome_de_cookie_usr_comum_senha; global $nome_de_cookie_usr_comum_id; global $salvar_quantidade_de_dias; $tempo_validade_cookie = time() + ($salvar_quantidade_de_dias * 24 * 3600); setcookie($nome_de_cookie_usr_comum_email, $email, $tempo_validade_cookie, "/"); setcookie($nome_de_cookie_usr_comum_senha, $senha, $tempo_validade_cookie, "/"); setcookie($nome_de_cookie_usr_comum_id, $idusuario, $tempo_validade_cookie, "/"); };
function senha_cookie(){
global $nome_de_cookie_usr_comum_senha; session_start(); $valor_sessao = $_SESSION['senha_cadastro']; if(isset($_COOKIE[$nome_de_cookie_usr_comum_senha]) == true){
$valor_de_cookie = $_COOKIE[$nome_de_cookie_usr_comum_senha]; return $valor_de_cookie; }else{
if($valor_sessao != null){
return $valor_sessao; }else{
return null; };
};
};
function formulario_cadastro_curriculo(){
global $enderecos_arquivos_php_uteis; global $url_pagina_inicial_site; $usuario_dono_perfil = retorna_usuario_vendo_perfil_dono(); if($usuario_dono_perfil == false){
pagina_index_usuario(); die; };
$dados = retorne_dados_array_curriculo(); $profissao = $dados['profissao']; $objetivo = $dados['objetivo']; $empresas_trabalhou = $dados['empresas_trabalhou']; $formacao = $dados['formacao']; $experiencia = $dados['experiencia']; $idiomas = $dados['idiomas']; $email = $dados['email']; $telefone = $dados['telefone']; $endereco = $dados['endereco']; $adicionais = $dados['adicionais']; $projetos = $dados['projetos']; $empregado = $dados['empregado']; $codigo_html .= "Separe mais de uma informação sempre com vírgula.";
$codigo_html .= "<br>";
$codigo_html .= "Empresa(s) que trabalhei: <b>Microsoft, Yahoo! etc</b>";
$codigo_html .= "<br>";
$codigo_html .= "<br>";
$select[] = "sim"; $select[] = "não"; $select_empregado = gerador_select_option($select, $empregado, "empregado"); $campos['adicionais'] = "<br>Adicionais<br>"; $script_salvar = $enderecos_arquivos_php_uteis['salvar_curriculo']; $codigo_html .= "<div class='classe_formulario_editar_perfil'>";
$codigo_html .= "<form action='$script_salvar' method='post'>";
$codigo_html .= "<div class='classe_div_separa_desc_campo_formulario'>";
$codigo_html .= "Profissão";
$codigo_html .= ":";
$codigo_html .= "</div>";
$codigo_html .= "<input type='text' value='$profissao' name='profissao'>";
$codigo_html .= "<br>";
$codigo_html .= "<div class='classe_div_separa_desc_campo_formulario'>";
$codigo_html .= "Objetivo";
$codigo_html .= ":";
$codigo_html .= "</div>";
$codigo_html .= "<textarea name='objetivo' cols='10' rows='3'>$objetivo</textarea>";
$codigo_html .= "<br>";
$codigo_html .= "<div class='classe_div_separa_desc_campo_formulario'>";
$codigo_html .= "Onde já trabalhei";
$codigo_html .= ":";
$codigo_html .= "</div>";
$codigo_html .= "<input type='text' value='$empresas_trabalhou' name='empresas_trabalhou'>";
$codigo_html .= "<br>";
$codigo_html .= "<div class='classe_div_separa_desc_campo_formulario'>";
$codigo_html .= "Formação";
$codigo_html .= ":";
$codigo_html .= "</div>";
$codigo_html .= "<input type='text' value='$formacao' name='formacao'>";
$codigo_html .= "<br>";
$codigo_html .= "<div class='classe_div_separa_desc_campo_formulario'>";
$codigo_html .= "Experiência";
$codigo_html .= ":";
$codigo_html .= "</div>";
$codigo_html .= "<input type='text' value='$experiencia' name='experiencia'>";
$codigo_html .= "<br>";
$codigo_html .= "<div class='classe_div_separa_desc_campo_formulario'>";
$codigo_html .= "Idiomas";
$codigo_html .= ":";
$codigo_html .= "</div>";
$codigo_html .= "<input type='text' value='$idiomas' name='idiomas'>";
$codigo_html .= "<br>";
$codigo_html .= "<div class='classe_div_separa_desc_campo_formulario'>";
$codigo_html .= "E-mail de contato";
$codigo_html .= ":";
$codigo_html .= "</div>";
$codigo_html .= "<input type='text' value='$email' name='email'>";
$codigo_html .= "<br>";
$codigo_html .= "<div class='classe_div_separa_desc_campo_formulario'>";
$codigo_html .= "Telefone de contato";
$codigo_html .= ":";
$codigo_html .= "</div>";
$codigo_html .= "<input type='text' value='$telefone' name='telefone'>";
$codigo_html .= "<br>";
$codigo_html .= "<div class='classe_div_separa_desc_campo_formulario'>";
$codigo_html .= "Endereço";
$codigo_html .= ":";
$codigo_html .= "</div>";
$codigo_html .= "<input type='text' value='$endereco' name='endereco'>";
$codigo_html .= "<br>";
$codigo_html .= "<div class='classe_div_separa_desc_campo_formulario'>";
$codigo_html .= "Projetos que estou";
$codigo_html .= ":";
$codigo_html .= "</div>";
$codigo_html .= "<textarea name='projetos' cols='10' rows='5'>$projetos</textarea>";
$codigo_html .= "<br>";
$codigo_html .= "<div class='classe_div_separa_desc_campo_formulario'>";
$codigo_html .= "Estou empregado";
$codigo_html .= ":";
$codigo_html .= "</div>";
$codigo_html .= $select_empregado;
$codigo_html .= "<br>";
$codigo_html .= "<div class='classe_div_separa_desc_campo_formulario'>";
$codigo_html .= "Adicionais";
$codigo_html .= ":";
$codigo_html .= "</div>";
$codigo_html .= "<textarea name='adicionais' cols='10' rows='10'>$adicionais</textarea>";
$codigo_html .= "<br>";
$codigo_html .= "<div class='classe_div_campo_salvar_editar_perfil'>";
$codigo_html .= "<input type='submit' value='Salvar' class='botao_padrao'>";
$codigo_html .= "&nbsp;";
$codigo_html .= "&nbsp;";
$codigo_html .= "<a href='$url_pagina_inicial_site?tipo_pagina=7&editar_perfil_modo=3' title='Visualizar' target='_blank'>Visualizar</a>";
$codigo_html .= "</div>";
$codigo_html .= "</form>";
$codigo_html .= "</div>";
$titulo = "Profissional"; $codigo_html = constroe_div_especial_geral($titulo, $codigo_html, null); return $codigo_html; };
function monta_curriculo(){
$dados_curriculo = retorne_dados_array_curriculo(); $idusuario = retorne_idusuario_visualizando_perfil(); $profissao = $dados_curriculo['profissao']; $objetivo = $dados_curriculo['objetivo']; $empresas_trabalhou = $dados_curriculo['empresas_trabalhou']; $formacao = $dados_curriculo['formacao']; $experiencia = $dados_curriculo['experiencia']; $idiomas = $dados_curriculo['idiomas']; $email = $dados_curriculo['email']; $telefone = $dados_curriculo['telefone']; $endereco = $dados_curriculo['endereco']; $adicionais = $dados_curriculo['adicionais']; $projetos = $dados_curriculo['projetos']; $empregado = $dados_curriculo['empregado']; $profissao = retorne_link_pesquisa_montado($dados_curriculo['profissao'], 11); $projetos = retorne_link_pesquisa_montado($dados_curriculo['projetos'], 12); $formacao = retorne_link_pesquisa_montado($dados_curriculo['formacao'], 13); $experiencia = retorne_link_pesquisa_montado($dados_curriculo['experiencia'], 14); $dados_usuario = retorna_dados_usuario_array($idusuario); $nome_usuario = func_retorna_nome_de_usuario_por_id($idusuario); $endereco_local = $dados_usuario['cidade']."%20".$dados_usuario['estado']; $codigo_html_bruto .= "<div id='div_curriculo_usuario' class='classe_perfil_curriculo_usuario'>";
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
$codigo_html_bruto = gera_link_hashtag($codigo_html_bruto); return $codigo_html_bruto; };
function retorne_dados_array_curriculo(){
global $tabela_banco; $idusuario = retorne_idusuario_visualizando_perfil(); $query = "select *from $tabela_banco[14] where idusuario='$idusuario';"; return retorne_dados_query($query); };
function salva_curriculo(){
global $tabela_banco; $profissao = remove_html($_POST['profissao']); $objetivo = remove_html($_POST['objetivo']); $empresas_trabalhou = remove_html($_POST['empresas_trabalhou']); $formacao = remove_html($_POST['formacao']); $experiencia = remove_html($_POST['experiencia']); $idiomas = remove_html($_POST['idiomas']); $email = remove_html($_POST['email']); $telefone = remove_html($_POST['telefone']); $endereco = remove_html($_POST['endereco']); $adicionais = remove_html($_POST['adicionais']); $projetos = remove_html($_POST['projetos']); $empregado = remove_html($_POST['empregado']); $idusuario = retorne_idusuario_logado(); $dados_usuario = retorna_dados_usuario_array($idusuario); $estado = $dados_usuario['estado']; $query[] = "delete from $tabela_banco[14] where idusuario='$idusuario';"; $query[] = "insert into $tabela_banco[14] values('$idusuario', '$profissao', '$objetivo', '$empresas_trabalhou', '$formacao', '$experiencia', '$idiomas', '$email', '$telefone', '$endereco', '$adicionais', '$projetos', '$empregado', '$estado');"; foreach($query as $query_valor){
if($query_valor != null and $idusuario != null){
comando_executa($query_valor); };
};
};
function campo_exibe_curtidas($dados){
global $imagem_servidor; $numero_curtidas = retorne_numero_curtidas($dados); $imagem_curtiu = $imagem_servidor['curtiu']; $imagem_curtiu = "<img src='$imagem_curtiu' title='Curtiu'>"; if($numero_curtidas > 1){
$texto_curtiram = "curtiram"; }else{
$texto_curtiram = "curtiu"; };
$codigo_html_bruto .= "<div class='campo_exibe_curtidas' id=''>";
$codigo_html_bruto .= $imagem_curtiu;
$codigo_html_bruto .= "&nbsp;";
$codigo_html_bruto .= $numero_curtidas;
$codigo_html_bruto .= "&nbsp;";
$codigo_html_bruto .= $texto_curtiram;
$codigo_html_bruto .= "</div>";
return $codigo_html_bruto; };
function curtir_social(){
global $identificador_album; global $identificador_postagem; global $identificador_comentario_usuario; global $tabela_banco; $id = $_POST['id']; $tipo_curtida = $_POST['tipo_curtida']; $idusuario = $_POST['idusuario']; if($id == null or $tipo_curtida == null){
return false; };
$idusuario_logado = retorne_idusuario_logado(); switch($tipo_curtida){
case 1:
$identificador = $identificador_album; break;
case 2:
$identificador = $identificador_postagem; break;
case 3:
$identificador = $identificador_comentario_usuario; break;
};
$query = "select *from $tabela_banco[10] where id='$id' and idusuario_curtiu='$idusuario_logado' and identificador='$identificador';"; $numero_curtidas = retorne_numero_linhas_query($query); $data_atual = data_atual(); if($numero_curtidas == 0){
$query = "insert into $tabela_banco[10] values('$id', '$idusuario_logado', '$data_atual', '$identificador');"; }else{
$query = "delete from $tabela_banco[10] where id='$id' and idusuario_curtiu='$idusuario_logado' and identificador='$identificador';"; };
$dados_ntusuario['tipo_notificacao'] = 2; $dados_ntusuario['idamigo'] = $idusuario; $dados_ntusuario['id'] = $id; $dados_ntusuario['identificador'] = $tipo_curtida; if($numero_curtidas == 0){
adiciona_notificacao($dados_ntusuario); };
comando_executa($query); };
function exclui_curtidas_gerais($idpost){
global $tabela_banco; $query = "select *from $tabela_banco[11] where idcomentario='$idpost';"; $comando = comando_executa($query); $numero_linhas = retorne_numero_linhas_comando($comando); $contador = 0; for($contador == $contador; $contador <= $numero_linhas; $contador++){
$dados = mysql_fetch_array($comando, MYSQL_ASSOC); $id = $dados['id']; $query_remove = "delete from $tabela_banco[10] where id='$id';"; if($id != null){
comando_executa($query_remove); };
};
};
function retorne_curtiu($id, $identificador){
global $tabela_banco; $idusuario_logado = retorne_idusuario_logado(); $query = "select *from $tabela_banco[10] where id='$id' and identificador='$identificador' and idusuario_curtiu='$idusuario_logado';"; if(retorne_numero_linhas_query($query) > 0){
return true; }else{
return false; };
};
function retorne_id_real_curtida($id, $identificador){
global $tabela_banco; $query = "select *from $tabela_banco[11] where id='$id' and identificador='$identificador';"; $dados = retorne_dados_query($query); $idcomentario = $dados['idcomentario']; if($idcomentario == null){
$idcomentario = $id; };
return $idcomentario; };
function retorne_numero_curtidas($dados){
global $tabela_banco; $id = $dados['id']; $identificador = $dados['identificador']; $query = "select *from $tabela_banco[10] where id='$id' and identificador='$identificador';"; $numero_linhas = retorne_numero_linhas_query($query); return $numero_linhas; };
function aceitar_depoimento(){
global $tabela_banco; $aceitar = $_POST['aceitar']; $id = $_POST['id']; $idusuario = $_POST['idusuario']; $idusuario_logado = retorne_idusuario_logado(); $dados_ntusuario['tipo_notificacao'] = 6; $dados_ntusuario['idamigo'] = $idusuario; $dados_ntusuario['identificador'] = 1; switch($aceitar){
case 1:
$query = "update $tabela_banco[12] set aceitou='1' where id='$id' and idusuario='$idusuario_logado';"; adiciona_notificacao($dados_ntusuario); break;
case 2:
$query = "delete from $tabela_banco[12] where id='$id' and idusuario='$idusuario_logado';"; break;
case 3:
$query = "delete from $tabela_banco[12] where id='$id' and idamigo='$idusuario_logado';"; break;
case 4:
$query = "delete from $tabela_banco[12] where id='$id' and idamigo='$idusuario_logado';"; break;
case 5:
$query = "delete from $tabela_banco[12] where id='$id' and idusuario='$idusuario_logado';"; break;
};
comando_executa($query); };
function campo_aceita_depoimento($dados){
global $enderecos_arquivos_php_uteis; $id = $dados['id']; $idamigo = $dados['idamigo']; $idusuario_logado = retorne_idusuario_logado(); $status_depoimento = retorne_status_depoimento($dados); $usuario_dono_perfil = retorna_usuario_vendo_perfil_dono(); if($idamigo != $idusuario_logado and $usuario_dono_perfil == false){
return null; };
$script_aceitar_depoimento = $enderecos_arquivos_php_uteis['aceitar_depoimento']; $tipo_depoimento = retorne_tipo_depoimento_get(); $classe_div_excluir_depoimento = "div_campo_aceita_depoimento"; switch($status_depoimento){
case 1:
$campo_gerenciar_depoimento .= "Excluir este depoimento?"; $campo_gerenciar_depoimento .= "<br>"; $campo_gerenciar_depoimento .= "<br>"; $classe_div_excluir_depoimento = null; if($idamigo != $idusuario_logado){
$campo_gerenciar_depoimento .= "<input type='submit' class='botao_padrao' value='Excluir depoimento'>"; $campo_gerenciar_depoimento .= "<input type='hidden' name='aceitar' value='2'>"; $campo_gerenciar_depoimento .= "<input type='hidden' name='id' value='$id'>"; }else{
$campo_gerenciar_depoimento .= "<input type='submit' class='botao_padrao' value='Excluir depoimento'>"; $campo_gerenciar_depoimento .= "<input type='hidden' name='aceitar' value='4'>"; $campo_gerenciar_depoimento .= "<input type='hidden' name='id' value='$id'>"; };
break;
case 2:
if($idamigo != $idusuario_logado){
$campo_gerenciar_depoimento .= "<input type='submit' class='botao_padrao' value='Aceitar'>"; $campo_gerenciar_depoimento .= "<input type='hidden' name='aceitar' value='1'>"; $campo_gerenciar_depoimento .= "<input type='hidden' name='id' value='$id'>"; $campo_rejeitar_depoimento .= "<form action='$script_aceitar_depoimento' method='post'>"; $campo_rejeitar_depoimento .= "<input type='submit' class='botao_cancela' value='Rejeitar depoimento'>"; $campo_rejeitar_depoimento .= "<input type='hidden' name='aceitar' value='5'>"; $campo_rejeitar_depoimento .= "<input type='hidden' name='id' value='$id'>"; $campo_rejeitar_depoimento .= "</form>"; }else{
$campo_gerenciar_depoimento .= "<input type='submit' class='botao_cancela' value='Cancelar'>"; $campo_gerenciar_depoimento .= "<input type='hidden' name='aceitar' value='3'>"; $campo_gerenciar_depoimento .= "<input type='hidden' name='id' value='$id'>"; };
break;
};
$campo_gerenciar_depoimento .= "<input type='hidden' name='tipo_depoimento' value='$tipo_depoimento'>"; $campo_gerenciar_depoimento .= "<input type='hidden' name='idusuario' value='$idamigo'>"; $codigo_html_bruto .= "<div class='$classe_div_excluir_depoimento'>";
$codigo_html_bruto .= "<form action='$script_aceitar_depoimento' method='post'>";
$codigo_html_bruto .= $campo_gerenciar_depoimento;
$codigo_html_bruto .= "</form>";
$codigo_html_bruto .= $campo_rejeitar_depoimento;
$codigo_html_bruto .= "</div>";
if($status_depoimento == 1){
$titulo_janela = "Excluir depoimento"; $div_id = "div_dialogo_excluir_depoimento_$id"; $botao_excluir_depoimento = "<input type='button' class='botao_padrao' value='Excluir depoimento' onclick='exibe_dialogo_excluir_depoimento_usuario($id)'>"; $codigo_html_bruto = janela_mensagem_dialogo($titulo_janela, $codigo_html_bruto, $div_id); $codigo_html_bruto .= $botao_excluir_depoimento; };
return $codigo_html_bruto; };
function campo_criar_depoimento(){
global $enderecos_arquivos_php_uteis; $usuario_dono_perfil = retorna_usuario_vendo_perfil_dono(); $idusuario = retorne_idusuario_visualizando_perfil(); $status_amizade = retorne_status_amizade($idusuario); if($usuario_dono_perfil == true or $status_amizade != 2){
return null; };
$nome_usuario = func_retorna_nome_de_usuario_por_id($idusuario); $url_enviar_depoimento = $enderecos_arquivos_php_uteis['enviar_depoimento']; $codigo_html_bruto .= "<form action='$url_enviar_depoimento' method='post'>";
$codigo_html_bruto .= "<textarea cols='70' rows='5' name='depoimento' class='classe_campos_textaera_gerais' placeholder='Escreva um depoimento para $nome_usuario'></textarea>";
$codigo_html_bruto .= "<input type='hidden' name='idusuario' value='$idusuario'>";
$codigo_html_bruto .= "<input type='submit' value='Enviar' class='botao_padrao'>";
$codigo_html_bruto .= "</form>";
$codigo_html_bruto = div_especial_basica_campos($codigo_html_bruto); return $codigo_html_bruto; };
function campo_gerenciar_depoimentos(){
global $url_pagina_inicial_site; $usuario_dono_perfil = retorna_usuario_vendo_perfil_dono(); if($usuario_dono_perfil != true){
return null; };
$tipo_pagina = retorne_tipo_pagina(); if($tipo_pagina != 11){
return null; };
$numero_depoimentos[0] = retorne_numero_depoimentos(1); $numero_depoimentos[1] = retorne_numero_depoimentos(2); $numero_depoimentos[2] = retorne_numero_depoimentos(3); $numero_depoimentos[3] = retorne_numero_depoimentos(4); $links[0] = "<a href='$url_pagina_inicial_site?tipo_pagina=11&tipo_depoimento=1'>Recebi - aceitos ($numero_depoimentos[0])</a>"; $links[1] = "<a href='$url_pagina_inicial_site?tipo_pagina=11&tipo_depoimento=2'>Escrevi - aceitos ($numero_depoimentos[1])</a>"; $links[2] = "<a href='$url_pagina_inicial_site?tipo_pagina=11&tipo_depoimento=3'>Eu recebi - cancelar/aceitar ($numero_depoimentos[2])</a>"; $links[3] = "<a href='$url_pagina_inicial_site?tipo_pagina=11&tipo_depoimento=4'>Eu enviei - cancelar/administrar ($numero_depoimentos[3])</a>"; $codigo_html_bruto .= $links[0];
$codigo_html_bruto .= "<br>";
$codigo_html_bruto .= $links[1];
$codigo_html_bruto .= "<br>";
$codigo_html_bruto .= "<br>";
$codigo_html_bruto .= $links[2];
$codigo_html_bruto .= "<br>";
$codigo_html_bruto .= $links[3];
$codigo_html_bruto .= "<br>";
return $codigo_html_bruto; };
function carregar_depoimentos_gerais(){
global $tabela_banco; $tipo_depoimento = retorne_tipo_depoimento_get(); $idusuario = retorne_idusuario_visualizando_perfil(); $limit_query = retorne_limit_tabela_get(); switch($tipo_depoimento){
case 1:
$query[0] = "select *from $tabela_banco[12] where idusuario='$idusuario' and aceitou='1' $limit_query;"; $query[1] = "select *from $tabela_banco[12] where idusuario='$idusuario' and aceitou='1';"; break;
case 2:
$query[0] = "select *from $tabela_banco[12] where idamigo='$idusuario' and aceitou='1' $limit_query;"; $query[1] = "select *from $tabela_banco[12] where idamigo='$idusuario' and aceitou='1';"; break;
case 3:
$query[0] = "select *from $tabela_banco[12] where idusuario='$idusuario' and aceitou='2' $limit_query;"; $query[1] = "select *from $tabela_banco[12] where idusuario='$idusuario' and aceitou='2';"; break;
case 4:
$query[0] = "select *from $tabela_banco[12] where idamigo='$idusuario' and aceitou='2' $limit_query;"; $query[1] = "select *from $tabela_banco[12] where idamigo='$idusuario' and aceitou='2';"; break;
};
$comando = comando_executa($query[0]); $numero_resultados = retorne_numero_linhas_query($query[1]); $codigo_html_bruto .= monta_pacote_depoimentos($comando);
$codigo_html_bruto .= monta_paginas_paginacao($numero_resultados);
return $codigo_html_bruto; };
function carregar_depoimentos_usuario(){
$codigo_html_bruto .= campo_gerenciar_depoimentos();
$codigo_html_bruto .= campo_criar_depoimento();
$codigo_html_bruto .= carregar_depoimentos_gerais();
$codigo_html_bruto = constroe_div_especial_geral("Depoimentos", $codigo_html_bruto, null); return $codigo_html_bruto; };
function constroe_imagem_perfil_depoimento($idusuario){
global $url_pagina_inicial_site; $url_imagem = retorna_imagem_perfil_miniatura($idusuario); $nome_usuario = func_retorna_nome_de_usuario_por_id($idusuario); $imagem_retorno .= "<a href='$url_pagina_inicial_site?idusuario=$idusuario' title='$nome_usuario'>"; $imagem_retorno .= "<img src='$url_imagem' title='$nome_usuario' alt='$nome_usuario' class='imagem_miniatura_depoimento_usuario'>"; $imagem_retorno .= "</a>"; return $imagem_retorno; };
function enviar_depoimento(){
global $tabela_banco; $depoimento = remove_html($_POST['depoimento']); $idusuario = remove_html($_POST['idusuario']); if($depoimento == null or $idusuario == null){
return null; };
$idusuario_logado = retorne_idusuario_logado(); $data_atual = data_atual(); $query = "insert into $tabela_banco[12] values(null, '$idusuario', '$idusuario_logado', '$depoimento', '$data_atual', '2');"; comando_executa($query); $dados_ntusuario['tipo_notificacao'] = 6; $dados_ntusuario['idamigo'] = $idusuario; $dados_ntusuario['identificador'] = 2; adiciona_notificacao($dados_ntusuario); };
function monta_depoimento($dados){
$id = $dados['id']; $idusuario = $dados['idusuario']; $idamigo = $dados['idamigo']; $depoimento = $dados['depoimento']; $data = $dados['data']; $depoimento = converte_linha_quebra_linha($depoimento, true); $tipo_pagina = retorne_tipo_pagina(); if($id == null){
return null; };
$depoimento = gera_link_hashtag($depoimento); $tipo_depoimento = retorne_tipo_depoimento_get(); if($tipo_pagina == 11){
$botao_aceitar_excluir .= campo_aceita_depoimento($dados); $botao_aceitar_excluir .= "<br>"; $botao_aceitar_excluir .= "<br>"; $imagem_recebe_depoimento = constroe_imagem_perfil_depoimento($idusuario); }else{
$nome_usuario = retorna_link_perfil_usuario($idamigo);
};
$depoimento = converte_codigo_emoticon($depoimento); $codigo_html .= "<div class='classe_depoimento_usuario'>";
$codigo_html .= "<div class='classe_div_separa_imagem_depoimento'>";
$codigo_html .= constroe_imagem_perfil_depoimento($idamigo);
$codigo_html .= "&nbsp;";
$codigo_html .= $imagem_recebe_depoimento;
$codigo_html .= "</div>";
$codigo_html .= "<div class='classe_div_separa_texto_depoimento'>";
$codigo_html .= $nome_usuario;
$codigo_html .= "&nbsp;";
$codigo_html .= "-";
$codigo_html .= "&nbsp;";
$codigo_html .= $depoimento;
$codigo_html .= "<div class='classe_depoimento_usuario_data'>";
$codigo_html .= $botao_aceitar_excluir;
$codigo_html .= converte_data_amigavel($data);
$codigo_html .= "</div>";
$codigo_html .= "</div>";
$codigo_html .= "</div>";
return $codigo_html; };
function monta_pacote_depoimentos($comando){
$numero_linhas = retorne_numero_linhas_comando($comando); $contador = 0; for($contador == $contador; $contador <= $numero_linhas; $contador++){
$dados = mysql_fetch_array($comando, MYSQL_ASSOC); $codigo_html_bruto .= monta_depoimento($dados);
};
return $codigo_html_bruto; };
function retorne_numero_depoimentos($tipo_depoimento){
global $tabela_banco; $idusuario = retorne_idusuario_visualizando_perfil(); switch($tipo_depoimento){
case 1:
$query = "select *from $tabela_banco[12] where idusuario='$idusuario' and aceitou='1';"; break;
case 2:
$query = "select *from $tabela_banco[12] where idamigo='$idusuario' and aceitou='1';"; break;
case 3:
$query = "select *from $tabela_banco[12] where idusuario='$idusuario' and aceitou='2';"; break;
case 4:
$query = "select *from $tabela_banco[12] where idamigo='$idusuario' and aceitou='2';"; break;
};
return retorne_numero_linhas_query($query); };
function retorne_status_depoimento($dados){
$aceitou = $dados['aceitou']; if($aceitou == null){
return 1; }else{
return $aceitou; };
};
function retorne_tipo_depoimento_get(){
$tipo_depoimento = $_GET['tipo_depoimento']; if($tipo_depoimento == null){
$tipo_depoimento = 1; };
return $tipo_depoimento; };
function constroe_abas_editar_perfil(){
global $url_pagina_inicial_site; $idusuario = retorne_idusuario_visualizando_perfil(); $usuario_dono_perfil = retorna_usuario_vendo_perfil_dono(); $aba_selecionada[retorne_modo_editar_perfil()] = "classe_aba_selecionada_perfil"; $links = array();
if(retorne_super_usuario() == true){
$links[] = "<div class='classe_links_abas_perfil_usuario $aba_selecionada[0]'><a href='$url_pagina_inicial_site?idusuario=$idusuario&tipo_pagina=7&editar_perfil_modo=0' title='Administrar'>Administrar</a></div>"; };
if($usuario_dono_perfil == true){
$links[] = "<div class='classe_links_abas_perfil_usuario $aba_selecionada[1]'><a href='$url_pagina_inicial_site?idusuario=$idusuario&tipo_pagina=7&editar_perfil_modo=1' title='Básico'>Básico</a></div>"; $links[] = "<div class='classe_links_abas_perfil_usuario $aba_selecionada[8]'><a href='$url_pagina_inicial_site?idusuario=$idusuario&tipo_pagina=7&editar_perfil_modo=8' title='Principal'>Principal</a></div>"; $links[] = "<div class='classe_links_abas_perfil_usuario $aba_selecionada[2]'><a href='$url_pagina_inicial_site?idusuario=$idusuario&tipo_pagina=7&editar_perfil_modo=2' title='Profissional'>Profissional</a></div>"; $links[] = "<div class='classe_links_abas_perfil_usuario $aba_selecionada[4]'><a href='$url_pagina_inicial_site?idusuario=$idusuario&tipo_pagina=7&editar_perfil_modo=4' title='Wallpaper'>Wallpaper</a></div>"; $links[] = "<div class='classe_links_abas_perfil_usuario $aba_selecionada[5]'><a href='$url_pagina_inicial_site?idusuario=$idusuario&tipo_pagina=7&editar_perfil_modo=5' title='Senha'>Senha</a></div>"; $links[] = "<div class='classe_links_abas_perfil_usuario $aba_selecionada[6]'><a href='$url_pagina_inicial_site?idusuario=$idusuario&tipo_pagina=7&editar_perfil_modo=6' title='Bloqueio'>Bloqueio</a></div>"; $links[] = "<div class='classe_links_abas_perfil_usuario $aba_selecionada[7]'><a href='$url_pagina_inicial_site?idusuario=$idusuario&tipo_pagina=7&editar_perfil_modo=7' title='Excluir conta'>Excluir conta</a></div>"; };
foreach($links as $valor_link){
if($valor_link != null){
$codigo_html .= $valor_link;
};
};
$codigo_html = "<div class='classe_div_aba_links_selecao'>$codigo_html</div>"; $codigo_html = constroe_div_especial_geral("Editar perfíl", $codigo_html, null); return $codigo_html; };
function retorne_modo_editar_perfil(){
$editar_perfil_modo = $_GET['editar_perfil_modo']; if($editar_perfil_modo == null){
$editar_perfil_modo = 1; };
return $editar_perfil_modo; };
function campo_exibir_emoticons_memes(){
global $imagem_servidor; $imagem_emoticon = "<img src='".$imagem_servidor['emoticon']."' title='Emoticons'>"; $imagem_carregar_mais = "<img src='".$imagem_servidor['carregar_mais']."' title='Mais' onclick='carregar_mais_memes_emoticons(1);'>"; $imagem_carregar_menos = "<img src='".$imagem_servidor['carregar_menos']."' title='Menos' onclick='carregar_mais_memes_emoticons(2);'>"; $campo_carregar_mais .= "<div id='div_carregar_mais_memes_emoticons'>"; $campo_carregar_mais .= $imagem_carregar_mais; $campo_carregar_mais .= "&nbsp;"; $campo_carregar_mais .= "&nbsp;"; $campo_carregar_mais .= $imagem_carregar_menos; $campo_carregar_mais .= "</div>"; $codigo_html_bruto .= "<div id='div_carregar_memes_emoticons' onclick='carregar_memes_emoticons_div();'>";
$codigo_html_bruto .= $imagem_emoticon;
$codigo_html_bruto .= "&nbsp;";
$codigo_html_bruto .= "-";
$codigo_html_bruto .= "&nbsp;";
$codigo_html_bruto .= "Emoticons";
$codigo_html_bruto .= "</div>";
$codigo_html_bruto .= "<div id='div_exibe_memes_emoticons'></div>";
$codigo_html_bruto .= $campo_carregar_mais;
$codigo_html_bruto = div_especial_basica_campos($codigo_html_bruto); return $codigo_html_bruto; };
function carregar_memes_emoticons(){
global $url_pasta_imagens_emoticons; global $numero_emoticons_atual; $contador = 1; for($contador == $contador; $contador <= $numero_emoticons_atual; $contador++){
$url_imagem = $url_pasta_imagens_emoticons."s ($contador).png"; $imagem_emoticon = "<img src='$url_imagem' title='s($contador)' class='imagem_emoticon_meme'>"; $codigo_html_bruto .= "<div class='div_classe_emoticon_meme' onclick='adicionar_emoticon_meme_campo_entrada($contador);'>"; $codigo_html_bruto .= $imagem_emoticon; $codigo_html_bruto .= "<br>"; $codigo_html_bruto .= "s($contador)"; $codigo_html_bruto .= "</div>"; };
return $codigo_html_bruto; };
function converte_codigo_emoticon($conteudo_post){
global $url_pasta_imagens_emoticons; global $numero_emoticons_atual; $contador = 1; for($contador == $contador; $contador <= $numero_emoticons_atual; $contador++){
$url_imagem = $url_pasta_imagens_emoticons."s ($contador).png"; $imagem_emoticon = "<img src='$url_imagem' title='s($contador)' class='imagem_emoticon_meme_uso'>"; $conteudo_post = str_replace("s($contador)", $imagem_emoticon, $conteudo_post); };
return $conteudo_post; };
function campo_data_formulario_lembrete_evento($data_atual, $nome_campo){
$data_atual = explode("-", $data_atual);
$dia = $data_atual[2]; $mes = $data_atual[1]; $ano = $data_atual[0]; $numero_dias = 31;
$numero_meses = 12;
$numero_anos = Date("Y") + 10;
$contador_1 = 1;
$contador_2 = 1;
$contador_3 = Date("Y");
for($contador_1 == $contador_1; $contador_1 <= $numero_dias; $contador_1++){
if($contador_1 == $dia){
$select_dias .= "<option value='$contador_1' selected>$contador_1</option>";
}else{
$select_dias .= "<option value='$contador_1'>$contador_1</option>";
};
};
$select_dias = "<option value=''></option>".$select_dias;
for($contador_2 == $contador_2; $contador_2 <= $numero_meses; $contador_2++){
switch($contador_2){
case 1:
$nome_mes = "Janeiro"; break;
case 2:
$nome_mes = "Fevereiro"; break;
case 3:
$nome_mes = "Março"; break;
case 4:
$nome_mes = "Abril"; break;
case 5:
$nome_mes = "Maio"; break;
case 6:
$nome_mes = "Junho"; break;
case 7:
$nome_mes = "Julho"; break;
case 8:
$nome_mes = "Agosto"; break;
case 9:
$nome_mes = "Setembro"; break;
case 10:
$nome_mes = "Outubro"; break;
case 11:
$nome_mes = "Novembro"; break;
case 12:
$nome_mes = "Dezembro"; break;
};
if($contador_2 == $mes){
$select_meses .= "<option value='$contador_2' selected>$nome_mes</option>";
}else{
$select_meses .= "<option value='$contador_2'>$nome_mes</option>";
};
};
$select_meses = "<option value=''></option>".$select_meses;
for($contador_3 == $contador_3; $contador_3 <= $numero_anos; $contador_3++){
if($contador_3 == $ano){
$select_anos .= "<option value='$contador_3' selected>$contador_3</option>";
}else{
$select_anos .= "<option value='$contador_3'>$contador_3</option>";
};
};
$select_anos = "<option value=''></option>".$select_anos;
$select_dias = "<select name='select_dia' class='classe_select_data_formulario'>$select_dias</select>";
$select_meses = "<select name='select_mes' class='classe_select_data_formulario'>$select_meses</select>";
$select_anos = "<select name='select_ano' class='classe_select_data_formulario'>$select_anos</select>";
$codigo_html .= "<div class='classe_div_campo_data_formulario'>";
$codigo_html .= $select_dias;
$codigo_html .= $select_meses;
$codigo_html .= $select_anos;
$codigo_html .= "</div>";
return $codigo_html;
};
function campo_select_privacidade($valor_atual){
switch($valor_atual){
case 1:
$texto_option = "Público"; break;
case 2:
$texto_option = "Amigos"; break;
default:
$texto_option = "Público"; };
if($valor_atual != null){
$campo_option_atual = "<option value='$valor_atual' selected>$texto_option</option>"; };
$tipo_privacidade .= "<div class='div_tipo_privacidade_campo'>"; $tipo_privacidade .= "<select name='tipo_privacidade' class='uibutton'>"; $tipo_privacidade .= "<option value='1'>Público</option>"; $tipo_privacidade .= "<option value='2'>Amigos</option>"; $tipo_privacidade .= $campo_option_atual; $tipo_privacidade .= "</select>"; $tipo_privacidade .= "</div>"; return $tipo_privacidade; };
function chamar_pagina_especifica($tipo_pagina){
global $url_pagina_inicial_site; $idusuario = retorne_idusuario_logado(); $numero_pagina = retorne_numero_pagina_resultado(); $endereco_url = $url_pagina_inicial_site."?idusuario=$idusuario&tipo_pagina=$tipo_pagina&numero_pagina=$numero_pagina"; chama_pagina_por_endereco($endereco_url); };
function constroe_menu_drop($array_conteudo_menu){
foreach($array_conteudo_menu as $valor_array){
if($valor_array != null){
$lista_opcoes .= $valor_array; };
};
$codigo_html_bruto .= "<div class='div_menu_drop_opcoes'>";
$codigo_html_bruto .= "<div class='dropdown'>";
$codigo_html_bruto .= "<button class='btn btn-default dropdown-toggle' type='button' id='dropdownMenu1' data-toggle='dropdown'>";
$codigo_html_bruto .= "<span class='caret'></span>";
$codigo_html_bruto .= "</button>";
$codigo_html_bruto .= "<ul class='dropdown-menu' role='menu' aria-labelledby='dropdownMenu1'>";
$codigo_html_bruto .= $lista_opcoes;
$codigo_html_bruto .= "</ul>";
$codigo_html_bruto .= "</div>";
$codigo_html_bruto .= "</div>";
return $codigo_html_bruto; };
function constroe_menu_drop_especial($array_conteudo_menu, $titulo_menu){
foreach($array_conteudo_menu as $valor_array){
if($valor_array != null){
$lista_opcoes .= $valor_array; };
};
$codigo_html_bruto .= "<div class='div_menu_drop_opcoes'>";
$codigo_html_bruto .= "<div class='dropdown'>";
$codigo_html_bruto .= "<button class='uibutton' type='button' id='dropdownMenu1' data-toggle='dropdown'>";
$codigo_html_bruto .= $titulo_menu;
$codigo_html_bruto .= "&nbsp;";
$codigo_html_bruto .= "<span class='caret'></span>";
$codigo_html_bruto .= "</button>";
$codigo_html_bruto .= "<ul class='dropdown-menu' role='menu' aria-labelledby='dropdownMenu1'>";
$codigo_html_bruto .= $lista_opcoes;
$codigo_html_bruto .= "</ul>";
$codigo_html_bruto .= "</div>";
$codigo_html_bruto .= "</div>";
return $codigo_html_bruto; };
function converte_data_amigavel($data){
if($data == null){
return null; };
$data_explode = explode("-", $data); $time = mktime(0, 0, 0, $data_explode[1]); $nome_mes = strftime("%b", $time); $numero_dia = $data_explode[0]; $mes = $nome_mes; $dia = $data_explode[0]; $ano = $data_explode[2]; $dia_semana = date('w', mktime(0,0,0, $data_explode[1], $data_explode[0], $data_explode[2])); $semana = array(
'0' => 'Domingo', 
'1' => 'Segunda-Feira',
'2' => 'Terça-Feira',
'3' => 'Quarta-Feira',
'4' => 'Quinta-Feira',
'5' => 'Sexta-Feira',
'6' => 'Sábado'
);
$mes_extenso = array(
'Jan' => 'Janeiro',
'Feb' => 'Fevereiro',
'Mar' => 'Marco',
'Apr' => 'Abril',
'May' => 'Maio',
'Jun' => 'Junho',
'Jul' => 'Julho',
'Aug' => 'Agosto',
'Nov' => 'Novembro',
'Sep' => 'Setembro',
'Oct' => 'Outubro',
'Dec' => 'Dezembro'
);
$data_completa = $semana[$dia_semana].", {$dia} de ".$mes_extenso[$mes]." de 20{$ano}";
return $data_completa; };
function converte_linha_quebra_linha($conteudo, $modo){
if($modo == true){
$conteudo = str_replace("\n", "<br>", $conteudo); }else{
$conteudo = str_replace("<br>", "&#13;", $conteudo); };
return $conteudo; };
function converte_para_utf8($texto_decodificar){
if(mb_detect_encoding($texto_decodificar, 'utf-8', true) == false){
$texto_decodificar = utf8_encode($texto_decodificar); };
return $texto_decodificar; };
function converte_tag_imagem($conteudo_post){
$conteudo_post = preg_replace('#(http://([^\s]*)\.(jpg|gif|png))#',  '<a class="fancybox" rel="group" href="$1" target="_blank"><img src="$1" alt="Imagem" class="imagem_convertida_url" /></a>', $conteudo_post);
$conteudo_post = print_r($conteudo_post, true);
if($conteudo_post != 1){
return $conteudo_post;
}else{
return null;
};
};
function converte_urls_texto_links($conteudo_post){
$conteudo_post = preg_replace("/([\w]+\:\/\/[\w-?&;#~=\.\/\@]+[\w\/])/", "<a href='$1' title='$1' target='_blank'>$1</a>", $conteudo_post); $conteudo_post = preg_replace("/\s*[a-zA-Z\/\/:\.]*youtube.com\/watch\?v=([a-zA-Z0-9\-_]+)([a-zA-Z0-9\/\*\-\_\?\&\;\%\=\.]*)/i","<br><iframe width=\"100%\" height=\"325\" src=\"//www.youtube.com/embed/$1\" frameborder=\"0\" allowfullscreen></iframe><br>",$conteudo_post); $conteudo_post = converte_tag_imagem($conteudo_post); return $conteudo_post; };
function decodifica_utf8($texto_decodificar){
if(mb_detect_encoding($texto_decodificar, 'utf-8', true) == true){
$texto_decodificar = utf8_decode($texto_decodificar); };
return $texto_decodificar; };
function diferenca_datas($data_1, $data_2, $tipo_retorno){
$diff = abs(strtotime($data_2) - strtotime($data_1));
$anos = floor($diff / (365*60*60*24));
$meses = floor(($diff - $anos * 365*60*60*24) / (30*60*60*24));
$dias = floor(($diff - $anos * 365*60*60*24 - $meses*30*60*60*24) / (60*60*24));
switch($tipo_retorno){
case 1: return $anos;
break;
case 2: return $meses;
break;
case 3: return $dias;
break;
};
};
function div_especial_basica_campos($conteudo){
$codigo_html_bruto .= "<div class='div_especial_basica_campos'>";
$codigo_html_bruto .= $conteudo;
$codigo_html_bruto .= "</div>";
return $codigo_html_bruto; };
function div_especial_mensagem_sistema($titulo, $mensagem_sistema){
$codigo_html_bruto .= "<div class='div_especial_mensagem_sistema'>";
$codigo_html_bruto .= "<b>$titulo</b>";
$codigo_html_bruto .= "<br>";
$codigo_html_bruto .= $mensagem_sistema;
$codigo_html_bruto .= "</div>";
return $codigo_html_bruto; };
function div_especial_quadro_aviso($titulo, $conteudo, $rodape){
$codigo_html_bruto .= "<div class='classe_div_especial_quadro_aviso'>";
$codigo_html_bruto .= "<div class='classe_div_especial_quadro_aviso_titulo'>";
$codigo_html_bruto .= $titulo;
$codigo_html_bruto .= "</div>";
$codigo_html_bruto .= "<div class='classe_div_especial_quadro_aviso_corpo'>";
$codigo_html_bruto .= $conteudo;
$codigo_html_bruto .= "</div>";
$codigo_html_bruto .= "<div class='classe_div_especial_quadro_aviso_rodape'>";
$codigo_html_bruto .= $rodape;
$codigo_html_bruto .= "</div>";
$codigo_html_bruto .= "</div>";
return $codigo_html_bruto; };
function hora_atual(){
return Date("G:i:s");
};
function montar_barra_progresso($identificador_div){
global $imagem_servidor; $imagem = "<img src='".$imagem_servidor['carregando']."' title='Carregando...'>"; $codigo_html_bruto .= "<div class='classe_div_barra_progresso' id='$identificador_div'>";
$codigo_html_bruto .= $imagem;
$codigo_html_bruto .= "</div>";
return $codigo_html_bruto; };
function retorne_array_estados_civis(){
$array_retorno[] = "Solteiro"; $array_retorno[] = "Namorando"; $array_retorno[] = "Casado"; $array_retorno[] = "Viúvo"; $array_retorno[] = "Divorciado"; $array_retorno[] = "Noívo"; $array_retorno[] = "Ficando"; $array_retorno[] = "Enrolado"; $array_retorno[] = "Separado"; $array_retorno[] = "Conhecendo"; $array_retorno[] = ""; return $array_retorno; };
function retorne_array_estados_pais(){
$array_retorno[]= "Acre"; $array_retorno[]= "Alagoas"; $array_retorno[]= "Amapá"; $array_retorno[]= "Amazonas"; $array_retorno[]= "Bahia"; $array_retorno[]= "Ceará"; $array_retorno[]= "Distrito Federal"; $array_retorno[]= "Espírito Santo"; $array_retorno[]= "Goiás"; $array_retorno[]= "Maranhão"; $array_retorno[]= "Mato Grosso"; $array_retorno[]= "Mato Grosso do Sul"; $array_retorno[]= "Minas Gerais"; $array_retorno[]= "Pará"; $array_retorno[]= "Paraíba"; $array_retorno[]= "Paraná"; $array_retorno[]= "Pernambuco"; $array_retorno[]= "Piauí"; $array_retorno[]= "Rio de Janeiro"; $array_retorno[]= "Rio Grande do Norte"; $array_retorno[]= "Rio Grande do Sul"; $array_retorno[]= "Rondônia"; $array_retorno[]= "Roraima"; $array_retorno[]= "Santa Catarina"; $array_retorno[]= "São Paulo"; $array_retorno[]= "Sergipe"; $array_retorno[]= "Tocantins"; $array_retorno[] = ""; return $array_retorno; };
function retorne_array_sexo(){
$array_retorno[] = "Mulher"; $array_retorno[] = "Homem"; $array_retorno[] = ""; return $array_retorno; };
function retorne_dia_atual(){
$dia = Date("d");
if($dia <= 9){
$dia = str_replace("0", null, $dia);
};
return $dia; };
function retorne_diferenca_datas($data_1, $data_2){
$data_1 = strtotime($data_1); $data_2 = strtotime($data_2); $intervalo = ($data_2 - $data_1) / (60 * 60 * 24); return $intervalo; };
function retorne_mes_atual(){
$mes = Date("m");
if($mes <= 9){
$mes = str_replace("0", null, $mes);
};
return $mes;
};
function retorne_numero_itens_array_post(){
$contador = 0; foreach($_POST as $key=>$value){
if($value != null){
$contador++; };
};
return $contador; };
function retorne_tamanho_resultado($numero_resultados){
$tamanho_mil = 1000; $tamanho_milhao = 1000000; $tamanho_bilhao = 1000000000; if($numero_resultados == null){
$numero_resultados = 0; };
$retorno = $numero_resultados; if($numero_resultados >= $tamanho_mil){
$retorno = round($numero_resultados / $tamanho_mil, 2)."k"; };
if($numero_resultados >= $tamanho_milhao){
$retorno = round($numero_resultados / $tamanho_milhao, 2)."mi"; };
if($numero_resultados >= $tamanho_bilhao){
$retorno = round($numero_resultados / $tamanho_bilhao, 2)."bi"; };
return $retorno; };
function gera_link_hashtag($conteudo_post){
$conteudo_post = preg_replace("/(?<!\S)#([0-9a-zA-Z]+)/", "<a href='index.php?tipo_pagina=10&tipo_pesquisa_geral=9&pesquisa_generica=$1'>#$1</a>", $conteudo_post); return $conteudo_post; };
function monta_pacotes_hashtags($arrays_idposts, $arrays_idusuarios, $numero_resultados){
};
function retorne_pesquisa_hashtag(){
global $tabela_banco; $tabela[0] = $tabela_banco[9]; $termo_pesquisa = retorne_termo_pesquisa(); $termo_pesquisa = "#".$termo_pesquisa; $limit_query = retorne_limit_pesquisa_geral_get(); $idusuario_logado = retorne_idusuario_logado(); $query[0] = "select *from $tabela[0] where conteudo_post like '%$termo_pesquisa%' $limit_query;"; $query[1] = "select *from $tabela[0] where conteudo_post like '%$termo_pesquisa%';"; $comando = comando_executa($query[0]); $numero_linhas = retorne_numero_linhas_comando($comando); $contador = 0; for($contador == $contador; $contador <= $numero_linhas; $contador++){
$dados = mysql_fetch_array($comando, MYSQL_ASSOC); $arrays_idposts[] = $dados['id']; $arrays_idusuarios[] = $dados['idusuario']; };
$numero_resultados = retorne_numero_linhas_query($query[1]); $tamanho_resultados = retorne_tamanho_resultado($numero_resultados); $codigo_html_bruto .= "<div class='classe_div_numero_resultados_pesquisa_geral'>";
$codigo_html_bruto .= "Falando sobre";
$codigo_html_bruto .= "&nbsp;";
$codigo_html_bruto .= $termo_pesquisa;
$codigo_html_bruto .= "<br>";
$codigo_html_bruto .= "<font size='15px'>";
$codigo_html_bruto .= $tamanho_resultados;
$codigo_html_bruto .= "</font>";
$codigo_html_bruto .= "</div>";
$codigo_html_bruto .= monta_pacotes_hashtags($arrays_idposts, $arrays_idusuarios, $numero_resultados);
$codigo_html_bruto .= monta_paginas_paginacao($numero_resultados);
return $codigo_html_bruto; };
function cadastra_imagem_papel_parede($endereco_final_salvar_imagem, $endereco_final_salvar_imagem_miniatura){
global $tabela_banco; $idusuario_logado = retorne_idusuario_logado(); $nome_imagem = basename($endereco_final_salvar_imagem); $nome_imagem_miniatura = basename($endereco_final_salvar_imagem_miniatura); $url_imagem = retorne_pasta_imagem_imagem_fundo_url().$nome_imagem; $url_imagem_miniatura = retorne_pasta_imagem_imagem_fundo_url().$nome_imagem_miniatura; $data_atual = data_atual(); $query[] = "delete from $tabela_banco[15] where idusuario='$idusuario_logado';"; $query[] = "insert into $tabela_banco[15] values('$idusuario_logado','$url_imagem','$url_imagem_miniatura');"; foreach($query as $valor_query){
if($valor_query != null){
comando_executa($valor_query); };
};
};
function constroe_adicionar_imagem_fundo(){
global $imagem_servidor; global $enderecos_arquivos_php_uteis; $url_script_upload = $enderecos_arquivos_php_uteis['upload_imagem_fundo']; $imagem_adicionar = "<img src='".$imagem_servidor['camera_add']."' title='Adicionar mais imagens'>"; $campo_adicionar_imagens .= "<div class='campo_file_imagem_albuns'>"; $campo_adicionar_imagens .= "<input type='file' name='foto[]' id='campo_file_imagem_albuns' onchange='barra_progresso(4); enviar_imagens_albuns_automatico();'>"; $campo_adicionar_imagens .= "</div>"; $codigo_remove_imagem .= "<input type='submit' class='uibutton confirm' value='Remover'>"; $codigo_remove_imagem = div_especial_mensagem_sistema("Remover imagem de fundo atual", $codigo_remove_imagem); $codigo_html_bruto .= "<form id='formulario_enviar_imagens_albuns' action='$url_script_upload' method='post' enctype='multipart/form-data'>";
$codigo_html_bruto .= "<div class='div_campo_adicionar_imagens' onclick='clique_botao_adicionar_imagens_albuns();'>";
$codigo_html_bruto .= $imagem_adicionar;
$codigo_html_bruto .= "&nbsp;";
$codigo_html_bruto .= "Adicionar imagem...";
$codigo_html_bruto .= $campo_adicionar_imagens;
$codigo_html_bruto .= "</div>";
$codigo_html_bruto .= "<br>";
$codigo_html_bruto .= $codigo_remove_imagem;
$codigo_html_bruto .= "</form>";
$codigo_html_bruto .= montar_barra_progresso("barra_progresso_upload_imagem_fundo");
return $codigo_html_bruto; };
function formulario_alterar_imagem_fundo(){
$idusuario = retorne_idusuario_visualizando_perfil(); $codigo_html_bruto .= retorne_imagem_papel_parede_usuario($idusuario, 1);
$codigo_html_bruto .= "<div class='classe_div_formulario_upload'>";
$codigo_html_bruto .= constroe_adicionar_imagem_fundo();
$codigo_html_bruto .= "</div>";
$titulo = "Papel parede"; $codigo_html_bruto = constroe_div_especial_geral($titulo, $codigo_html_bruto, null); return $codigo_html_bruto; };
function retorne_imagem_papel_parede_usuario($idusuario, $modo_exibir){
global $tabela_banco; $query = "select *from $tabela_banco[15] where idusuario='$idusuario';"; $dados = retorne_dados_query($query); switch($modo_exibir){
case 1:
$url_imagem = $dados['url_imagem_miniatura']; break;
case 2:
$url_imagem = $dados['url_imagem']; break;
};
if($url_imagem == null){
return null; };
switch($modo_exibir){
case 1:
$codigo_html_bruto .= "<img src='$url_imagem' class='imagem_miniatura_papel_parede'>";
break;
case 2:
$codigo_html_bruto .= "<style>";
$codigo_html_bruto .= "body{";
$codigo_html_bruto .= "background-image: url('$url_imagem');";
$codigo_html_bruto .= "background-repeat: no-repeat;";
$codigo_html_bruto .= "background-attachment: fixed;";
$codigo_html_bruto .= "background-position: center;";
$codigo_html_bruto .= "-webkit-background-size: cover;";
$codigo_html_bruto .= "-moz-background-size: cover;";
$codigo_html_bruto .= "-o-background-size: cover;";
$codigo_html_bruto .= "background-size: cover;";
$codigo_html_bruto .= "}";
$codigo_html_bruto .= "</style>";
break;
};
return $codigo_html_bruto; };
function upload_de_imagem_papel_parede($destino_da_imagem){
global $tamanho_escala_imagem_papel_parede; global $tamanho_escala_imagem_papel_parede_miniatura; global $tabela_banco; $idusuario_logado = retorne_idusuario_logado(); if(retorne_numero_array_post_imagens() == 0){
$query = "delete from $tabela_banco[15] where idusuario='$idusuario_logado';"; comando_executa($query);
return null; };
$data_atual = data_atual(); $fotos = $_FILES['foto']; $extensoes_disponiveis[] = ".jpeg"; $extensoes_disponiveis[] = ".jpg"; $extensoes_disponiveis[] = ".png"; $extensoes_disponiveis[] = ".gif"; $nome_imagem = $fotos['tmp_name'][0]; $nome_imagem_real = $fotos['name'][0]; $extensao_imagem = ".".strtolower(pathinfo($nome_imagem_real, PATHINFO_EXTENSION)); $nome_imagem_final = md5($nome_imagem_real.$data_atual).$extensao_imagem; $nome_imagem_final_miniatura = md5($nome_imagem_real."miniatura".$data_atual).$extensao_imagem; $endereco_final_salvar_imagem = $destino_da_imagem.$nome_imagem_final; $endereco_final_salvar_imagem_miniatura = $destino_da_imagem.$nome_imagem_final_miniatura; $extensao_permitida = retorne_elemento_array_existe($extensoes_disponiveis, $extensao_imagem); if($nome_imagem != null and $nome_imagem_real != null and $extensao_permitida == true){
cadastra_imagem_papel_parede($endereco_final_salvar_imagem, $endereco_final_salvar_imagem_miniatura); $image = new SimpleImage(); $image->load($nome_imagem); $image->scale($tamanho_escala_imagem_papel_parede); $image->save($endereco_final_salvar_imagem); $image = new SimpleImage(); $image->load($nome_imagem); $image->scale($tamanho_escala_imagem_papel_parede_miniatura); $image->save($endereco_final_salvar_imagem_miniatura); };
};
function janela_mensagem_dialogo($titulo_janela, $conteudo_mensagem, $div_id){
$botao_fechar .= "<span class='span_botao_fechar_mensagem_dialogo'>"; $botao_fechar .= "<button class='botao_padrao' onclick='fechar_janela_mensagem_dialogo();'>x</button>"; $botao_fechar .= "</span>"; $codigo_html_bruto .= "<div id='$div_id' class='div_janela_principal_mensagem_dialogo' ondblclick='fechar_janela_mensagem_dialogo();'>";
$codigo_html_bruto .= "<div class='div_janela_mensagem_dialogo'>";
$codigo_html_bruto .= "<div class='div_janela_mensagem_dialogo_titulo'>";
$codigo_html_bruto .= $botao_fechar;
$codigo_html_bruto .= $titulo_janela;
$codigo_html_bruto .= "</div>";
$codigo_html_bruto .= "<div class='div_janela_mensagem_conteudo'>";
$codigo_html_bruto .= $conteudo_mensagem;
$codigo_html_bruto .= "</div>";
$codigo_html_bruto .= "</div>";
$codigo_html_bruto .= "</div>";
return $codigo_html_bruto; };
function campo_pesquisa_jogos(){
global $nome_do_sistema; global $imagem_servidor; global $url_pagina_inicial_jogos; $pesquisa_generica = retorne_termo_pesquisa(); $imagem = "<img src='".$imagem_servidor['jogo']."' title='Jogos $nome_do_sistema'>"; if($pesquisa_generica != null){
$numero_jogos = retorne_numero_jogos(); if($numero_jogos > 1){
$plural_singular = "jogos"; }else{
$plural_singular = "jogo"; };
$campo_numero_jogos .= "<div class='div_campo_numero_jogos'>"; $campo_numero_jogos .= "$nome_do_sistema encontrou $numero_jogos $plural_singular"; $campo_numero_jogos .= ", para <span class='span_numero_jogos'>$pesquisa_generica</span>."; $campo_numero_jogos .= "</div>"; };
$codigo_html_bruto .= "<div class='div_pesquisa_jogos'>";
$codigo_html_bruto .= "<form action='$url_pagina_inicial_jogos' method='get'>";
$codigo_html_bruto .= $imagem;
$codigo_html_bruto .= "<br>";
$codigo_html_bruto .= "Pesquisar jogos $nome_do_sistema";
$codigo_html_bruto .= "<br>";
$codigo_html_bruto .= "<input type='text' name='pesquisa_generica' class='input_termo_pesquisa_jogos' value='$pesquisa_generica' placeholder='Nome do jogo' autofocus>";
$codigo_html_bruto .= "<br>";
$codigo_html_bruto .= "<input type='submit' class='botao_padrao' value='Pesquisar'>";
$codigo_html_bruto .= "</form>";
$codigo_html_bruto .= $campo_numero_jogos;
$codigo_html_bruto .= "</div>";
return $codigo_html_bruto; };
function carrega_jogos(){
global $tabela_banco; global $pasta_jogos; global $url_pagina_inicial_jogos; global $url_pasta_jogos; $termo_pesquisa = retorne_termo_pesquisa(); $limit_query = retorne_limit_tabela_jogos(); $query = "select *from $tabela_banco[29] where nome like '%$termo_pesquisa%' or descricao like '%$termo_pesquisa%' or categoria like '%$termo_pesquisa%' $limit_query;"; $comando = comando_executa($query); $numero_linhas = retorne_numero_linhas_comando($comando); $contador = 0; for($contador == $contador; $contador <= $numero_linhas; $contador++){
$dados = mysql_fetch_array($comando, MYSQL_ASSOC); $nome = $dados['nome']; $descricao = $dados['descricao']; $imagem = $dados['imagem']; $pasta = $dados['pasta']; $token = $dados['token']; $data = $dados['data']; $categoria = $dados['categoria']; $descricao = gera_link_hashtag($descricao); $descricao = converte_urls_texto_links($descricao); $url_pasta = $url_pasta_jogos."$nome/"; if($categoria != null){
$categoria_array = explode(",", $categoria); foreach($categoria_array as $categoria_nova){
if($categoria_nova != null){
$url_pesquisa = "$url_pagina_inicial_jogos?pesquisa_generica=$categoria_nova"; $campo_categoria .= "<a href='$url_pesquisa' title='$categoria_nova' class='uibutton large confirm btn-xs'>$categoria_nova</a>&nbsp;"; };
};
};
$conteudo_post .= "<div class='div_corpo_jogo'>"; $conteudo_post .= "<a href='$url_pasta' title='$nome' target='_blank'>"; $conteudo_post .= "<span class='titulo_jogo'>$nome</span>"; $conteudo_post .= "</a>"; $conteudo_post .= "<br>"; $conteudo_post .= "<a href='$url_pasta' title='$nome' target='_blank'>"; $conteudo_post .= "<img src='$imagem' title='$nome' class='imagem_jogo'>"; $conteudo_post .= "</a>"; $conteudo_post .= "<br>"; $conteudo_post .= "<li>$descricao"; $conteudo_post .= "<br>"; $conteudo_post .= "<br>"; $conteudo_post .= "<a href='$url_pasta' title='$nome' class='botao_padrao' target='_blank'>Play</a>"; $conteudo_post .= "<br>"; $conteudo_post .= "<br>"; $conteudo_post .= "<div class='div_categorias_jogos'>"; $conteudo_post .= $campo_categoria; $conteudo_post .= "</div>"; $conteudo_post .= "</div>"; $conteudo_post = "<div class='classe_div_principal_jogo'>$conteudo_post</div>"; if($nome != null){
$codigo_html_bruto .= $conteudo_post; };
$conteudo_post = null; $campo_categoria = null; };
$numero_jogos = retorne_numero_jogos(); $codigo_html_bruto = campo_pesquisa_jogos().$codigo_html_bruto.monta_paginas_paginacao_jogos($numero_jogos); return $codigo_html_bruto; };
function monta_paginas_paginacao_jogos($numero_resultados){
global $limite_resultados_pagina_jogos; global $imagem_servidor; global $url_pagina_inicial_jogos; $numero_pagina_atual = retorne_numero_pagina_resultado(); $numero_pagina_atual /= $limite_resultados_pagina_jogos; $numero_pagina_atual = round($numero_pagina_atual); if($numero_pagina_atual == null){
$numero_pagina_atual = 0; };
$numero_paginas = round($numero_resultados / $limite_resultados_pagina_jogos) + 1; $numero_paginas_real = round($numero_resultados / $limite_resultados_pagina_jogos); @$porcentagem = ($numero_pagina_atual / $numero_paginas_real) * 100; $porcentagem = round($porcentagem); if($porcentagem > 0 and $porcentagem <= 100){
$campo_porcentagem .= "<div class='progress' id='barra_progresso_paginacao'>"; $campo_porcentagem .= " <div class='progress-bar' role='progressbar' aria-valuenow='$porcentagem' aria-valuemin='0' aria-valuemax='100' style='width: $porcentagem%;'>"; $campo_porcentagem .= "$porcentagem%"; $campo_porcentagem .= "</div>"; $campo_porcentagem .= "</div>"; };
$numero_pagina_anterior = ($numero_pagina_atual - 1) * $limite_resultados_pagina_jogos; $numero_pagina_proxima = ($numero_pagina_atual + 1) * $limite_resultados_pagina_jogos; $pesquisa_generica = retorne_termo_pesquisa(); $url_padrao_index = $url_pagina_inicial_jogos."?pesquisa_generica=$pesquisa_generica"; $url_voltar = $url_padrao_index."&numero_pagina=$numero_pagina_anterior"; $url_avancar = $url_padrao_index."&numero_pagina=$numero_pagina_proxima"; if($numero_pagina_atual > 0){
$imagem_voltar = $imagem_servidor['voltar']; $imagem_voltar = "<img src='$imagem_voltar' title='Voltar' alt='Voltar'>"; $imagem_voltar = "<a href='$url_voltar'>$imagem_voltar</a>"; };
if($numero_paginas_real > $numero_pagina_atual){
$imagem_avancar = $imagem_servidor['avancar']; $imagem_avancar = "<img src='$imagem_avancar' title='Avançar' alt='Avançar'>"; $imagem_avancar = "<a href='$url_avancar'>$imagem_avancar</a>"; };
$codigo_html_bruto .= "<div class='campo_paginacao_paginas_resultados'>";
$codigo_html_bruto .= $imagem_voltar;
$codigo_html_bruto .= $imagem_avancar;
$codigo_html_bruto .= $campo_porcentagem;
$codigo_html_bruto .= "</div>";
return $codigo_html_bruto; };
function monta_pagina_jogos(){
$codigo_html_bruto = carrega_jogos();
$codigo_html_bruto = div_especial_basica_campos($codigo_html_bruto); return $codigo_html_bruto; };
function retorne_limit_tabela_jogos(){
global $limite_resultados_pagina_jogos; $numero_pagina = retorne_numero_pagina_resultado(); $limit_retorno = "limit $numero_pagina, $limite_resultados_pagina_jogos"; return $limit_retorno; };
function retorne_numero_jogos(){
global $tabela_banco; global $pasta_jogos; $termo_pesquisa = retorne_termo_pesquisa(); $query = "select *from $tabela_banco[29] where nome like '%$termo_pesquisa%' or descricao like '%$termo_pesquisa%';"; return retorne_numero_linhas_query($query); };
function retorne_limit_pesquisa_geral_get(){
global $limite_resultados_pagina; $numero_pagina = retorne_numero_pagina_resultado(); $limit_retorno = "order by idusuario desc limit $numero_pagina, $limite_resultados_pagina"; return $limit_retorno; };
function retorne_limit_tabela_ajuda(){
global $limite_resultados_pagina_ajuda; $numero_pagina = retorne_numero_pagina_resultado(); $limit_retorno = "order by id desc limit $numero_pagina, $limite_resultados_pagina_ajuda"; return $limit_retorno; };
function retorne_limit_tabela_comentarios_get(){
global $limite_resultados_pagina_comentarios; $numero_pagina = retorne_numero_pagina_resultado(); $limit_retorno = "order by id desc limit $numero_pagina, $limite_resultados_pagina_comentarios"; return $limit_retorno; };
function retorne_limit_tabela_get(){
global $limite_resultados_pagina; $numero_pagina = retorne_numero_pagina_resultado(); $limit_retorno = "order by id desc limit $numero_pagina, $limite_resultados_pagina"; return $limit_retorno; };
function retorne_limit_tabela_sem_id(){
global $limite_resultados_pagina; $numero_pagina = retorne_numero_pagina_resultado(); $limit_retorno = "limit $numero_pagina, $limite_resultados_pagina"; return $limit_retorno; };
function retorne_limit_tabela_ultimo_campo(){
$limit_retorno = "order by id desc limit 0, 1"; return $limit_retorno; };
function retorne_limit_tabela_ultimo_imagens_modo_post(){
$limit_retorno = "order by id desc limit 0, 6"; return $limit_retorno; };
function chama_pagina_index_usuario_logado(){
$usuario_logado = retorne_esta_logado(); if($usuario_logado == true){
pagina_index_usuario(); die; };
};
function chama_pagina_login(){
global $url_pagina_login; echo "<meta http-equiv='refresh' content='0; url=$url_pagina_login'>"; };
function formulario_exibe_recuperar_senha(){
$codigo_html_bruto .= "Então você esqueceu sua senha!";
$codigo_html_bruto .= "<br>";
$codigo_html_bruto .= "Vou ajudar você, mandarei sua senha por e-mail.";
$codigo_html_bruto .= "&nbsp;";
$codigo_html_bruto .= formulario_recuperar_senha(); $codigo_html_bruto = div_especial_basica_campos($codigo_html_bruto); return $codigo_html_bruto; };
function formulario_login_usuario(){
global $url_pagina_login; global $url_pagina_recupera_senha; if(retorne_esta_logado() == true){
die; };
$email_cadastro = remove_html($_POST['email_cadastro']); if($email_cadastro == null){
$email_cadastro = email_cookie(); };
$codigo_html_bruto .= "<div class='div_formulario_login'>";
$codigo_html_bruto .= "<form action='$url_pagina_login' method='post'>";
$codigo_html_bruto .= "<div class='div_formulario_login_separa'>";
$codigo_html_bruto .= "<span class='formulario_login_span_email'>E-mail</span>";
$codigo_html_bruto .= "<br>";
$codigo_html_bruto .= "<input type='text' name='email_cadastro' placeholder='E-mail' class='campo_email_login' value='$email_cadastro'>";
$codigo_html_bruto .= "<br>";
$codigo_html_bruto .= "<input type='submit' value='Logar' class='uibutton'>";
$codigo_html_bruto .= "</div>";
$codigo_html_bruto .= "<div class='div_formulario_login_separa'>";
$codigo_html_bruto .= "<span class='formulario_login_span_senha'>Senha</span>";
$codigo_html_bruto .= "<br>";
$codigo_html_bruto .= "<input type='password' name='senha_cadastro' placeholder='Senha' class='campo_senha_login'>";
$codigo_html_bruto .= "<br>";
$codigo_html_bruto .= "<a href='$url_pagina_recupera_senha' title='Recuperar senha' class='formulario_login_link_recupera_senha'>Recuperar senha</a>";
$codigo_html_bruto .= "</div>";
$codigo_html_bruto .= "</form>";
$codigo_html_bruto .= "</div>";
return $codigo_html_bruto; };
function logar_usuario(){
global $tabela_banco; global $nome_do_sistema; $email_cadastro = remove_html($_POST['email_cadastro']); $senha_cadastro = remove_html($_POST['senha_cadastro']); if($email_cadastro == null or $senha_cadastro == null){
return false; };
$senha_cadastro = cifra_senha_md5($senha_cadastro); $query = "select *from $tabela_banco[1] where email='$email_cadastro' and senha='$senha_cadastro';"; $comando = comando_executa($query); $numero_linhas = mysql_num_rows($comando); if($numero_linhas == 0){
return true; };
$dados = mysql_fetch_array($comando, MYSQL_ASSOC); $idusuario = $dados['idusuario']; logout(false); session_start(); $_SESSION['email_cadastro'] = $email_cadastro; $_SESSION['idusuario'] = $idusuario; $_SESSION['senha_cadastro'] = $senha_cadastro; salvar_cookies($email_cadastro, $senha_cadastro, $idusuario); pagina_index_usuario(); };
function logout($redireciona){
global $url_pagina_login; session_start(); $_SESSION = array(); session_destroy(); deleta_cookies(); if($redireciona == true){
echo "<meta http-equiv='refresh' content='0; url=$url_pagina_login'>"; };
};
function pagina_inicial_nao_logado(){
global $sobre_sistema; $codigo_html_bruto .= $sobre_sistema;
return $codigo_html_bruto; };
function painel_login_logout_usuario(){
global $enderecos_arquivos_php_uteis; $usuario_logado = retorne_esta_logado(); if($usuario_logado == true){
$url_logout = $enderecos_arquivos_php_uteis['logout']; $codigo_html_bruto .= "<div class='div_logout_usuario'>";
$codigo_html_bruto .= "<a href='$url_logout' title='Sair'>Sair</a>";
$codigo_html_bruto .= "</div>";
};
return $codigo_html_bruto; };
function retorne_esta_logado(){
conecta_mysql(true);
session_start(); 
$email_cookie = email_cookie();
$senha_cookie = senha_cookie();
$usuario_existe = retorne_usuario_existe($email_cookie, $senha_cookie);
if($usuario_existe == true){
$_SESSION['idusuario'] = retorne_idusuario_por_email($email_cookie);
return true;
}else{
return false;
};
};
function retorne_idusuario_logado(){
session_start(); global $pasta_login_usuario; global $tipo_configuracao; $idusuario_logado = $_SESSION['idusuario']; if($idusuario_logado != null){
return $idusuario_logado; }else{
return null; };
};
function gerador_mapa($endereco_local){
return $codigo_html_bruto; };
function carregar_scripts_jquerys_personalizados(){
$codigo_html_bruto .= "<script>";
$codigo_html_bruto .= jquery_personalizado_enderecos_de_pastas();
$codigo_html_bruto .= "</script>";
return $codigo_html_bruto; };
function constroe_div_basica_geral($conteudo_div, $aplicar_estilo){
if($aplicar_estilo == true){
$estilo_div = "div_basica_geral"; };
$codigo_html_bruto .= "<div id='$estilo_div' class='box fade-in two'>";
$codigo_html_bruto .= $conteudo_div;
$codigo_html_bruto .= "</div>";
return $codigo_html_bruto; };
function constroe_div_especial_geral($titulo, $conteudo, $div_id){
$codigo_html_bruto .= "<div class='div_especial_geral_titulo'>";
$codigo_html_bruto .= $titulo;
$codigo_html_bruto .= "</div>";
$codigo_html_bruto .= "<div class='div_especial_geral_conteudo' id='$div_id'>";
$codigo_html_bruto .= $conteudo;
$codigo_html_bruto .= "</div>";
return $codigo_html_bruto; };
function constroe_rodape(){
global $url_pagina_cadastro; global $url_pagina_login; global $nome_do_sistema; global $url_pagina_ajuda; global $url_pagina_sobre_sistema; global $url_pagina_desenvolvedor_sistema; global $url_pagina_inicial_jogos; global $nome_fundador_site; $codigo_html .= "<a href='$url_pagina_cadastro' title='Cadastre-se' class='links_rodape'>Cadastre-se</a>"; $codigo_html .= "<a href='$url_pagina_login' title='Login' class='links_rodape'>Login</a>"; $codigo_html .= "<a href='$url_pagina_ajuda' class='links_rodape' title='Ajuda'>Ajuda</a>"; $codigo_html .= "<a href='$url_pagina_sobre_sistema' class='links_rodape' title='O que é $nome_do_sistema'>O que é $nome_do_sistema</a>"; $codigo_html .= "<a href='$url_pagina_desenvolvedor_sistema' class='links_rodape' title='Criador'>Criador</a>"; $codigo_html .= "<a href='$url_pagina_inicial_jogos' class='links_rodape' title='Jogos'>Jogos</a>"; $codigo_html .= "<br>"; $codigo_html .= "<br>"; $codigo_html .= $nome_fundador_site; return $codigo_html; };
function constroe_topo_pagina(){
$usuario_logado = retorne_esta_logado(); $idusuario = retorne_idusuario_visualizando_perfil(); if($usuario_logado == true){
$painel_logout = painel_login_logout_usuario(); $painel_notificacaoes = constroe_campo_iniciar_notificacoes(); $formulario_topo = campo_pesquisa_geral(true);
}else{
$formulario_topo .= formulario_login_usuario(); };
$codigo_html_bruto .= constroe_logotipo_sistema(1);
$codigo_html_bruto .= $formulario_topo;
$codigo_html_bruto .= $painel_logout;
$codigo_html_bruto .= $painel_notificacaoes;
return $codigo_html_bruto; };
function gerador_select_option($dados_select_option, $valor_atual, $nome){
foreach($dados_select_option as $valor){
if($valor == $valor_atual){
$codigo_html_bruto .= "<option value='$valor' selected>$valor</option>";
}else{
$codigo_html_bruto .= "<option value='$valor'>$valor</option>";
};
};
$codigo_html_bruto = "<select name='$nome'>$codigo_html_bruto</select>"; return $codigo_html_bruto; };
function monta_pagina(){
global $nome_do_sistema; global $url_arquivo_css; global $url_arquivo_jquery; global $url_arquivo_jquery_plugins; global $url_arquivo_css_plugins; global $descricao_site; global $nome_do_sistema_completo; global $sobre_sistema_network; $usuario_bloqueado_resposta = retorne_esta_bloqueado(null); $usuario_logado = retorne_esta_logado(); $tipo_pagina = retorne_tipo_pagina(); $topo_pagina = constroe_topo_pagina(); $rodape_pagina = constroe_rodape(); if($usuario_logado == true){
$idusuario_perfil = retorne_idusuario_visualizando_perfil(); $perfil_basico = constroe_perfil_basico(); $imagem_fundo_usuario = retorne_imagem_papel_parede_usuario($idusuario_perfil, 2); $usuario_dono_perfil = retorna_usuario_vendo_perfil_dono(); $plugins_recursos = carregar_plugins_recursos(); }else{
$imagem_fundo_usuario = retorne_imagem_papel_parede_capa_inicial(2); };
if($usuario_dono_perfil == false and $tipo_pagina == null and $usuario_logado == true){
$tipo_pagina = 9; };
if($usuario_logado == false and $tipo_pagina != 1 and $tipo_pagina != 19 and $tipo_pagina != 20 and $tipo_pagina != 21){
$tipo_pagina = 2; };
if($usuario_bloqueado_resposta == true){
$tipo_pagina = 17; };
if($usuario_logado == true){
$codigo_chat_usuario = carregar_chat_usuario(); };
switch($tipo_pagina){
case 1:
$conteudo_pagina_1 .= formulario_cadastro_usuario(); break;
case 2:
$conteudo_pagina_1 .= formulario_cadastro_usuario(); break;
case 3:
$conteudo_pagina_1 .= constroe_perfil_geral_usuario(); break;
case 4:
$conteudo_pagina_1 .= constroe_amizades_usuario(); break;
case 5:
$conteudo_pagina_1 .= construir_albuns_usuario(); break;
case 6:
$conteudo_pagina_1 .= constroe_gerenciar_musica_usuario(); break;
case 7:
$conteudo_pagina_1 .= constroe_editar_perfil_usuario(); break;
case 8:
$conteudo_pagina_1 .= carregar_novidades_usuario(); break;
case 9:
$conteudo_pagina_1 .= constroe_publicacoes_usuario(); break;
case 10:
$conteudo_pagina_1 .= pesquisa_geral(); break;
case 11:
$conteudo_pagina_1 .= carregar_depoimentos_usuario(); break;
case 12:
$conteudo_pagina_1 .= carregar_visitas_perfil_usuario(); break;
case 13:
$conteudo_pagina_1 .= monta_painel_notificacoes(); break;
case 14:
$conteudo_pagina_1 .= carregar_compartilhamentos(); break;
case 15:
$conteudo_pagina_1 .= carrega_usuarios_compartilharam_postagem(); break;
case 16:
$conteudo_pagina_1 .= carregar_postagem_id(); break;
case 17:
$conteudo_pagina_1 = exibe_mensagem_bloqueado(); break;
case 18:
$conteudo_pagina_1 .= carregar_novidades_usuario(); break;
case 19:
$conteudo_pagina_1 .= carrega_pagina_ajuda(); break;
case 20:
$conteudo_pagina_1 = monta_pagina_jogos(); break;
case 21:
$conteudo_pagina_1 = formulario_exibe_recuperar_senha(); break;
default:
$conteudo_pagina_1 .= carregar_novidades_usuario(); };
if($usuario_logado == true){
if($tipo_pagina != 11){
$conteudo_pagina_2 .= carregar_depoimentos_usuario(); };
$conteudo_pagina_2 .= sugerir_amizades(); $barra_tarefas = constroe_barra_tarefas(); $titulo_pagina = func_retorna_nome_de_usuario_por_id($idusuario_perfil)." - ".$nome_do_sistema; }else{
$campos_perfil_logado = pagina_inicial_nao_logado();
$conteudo_pagina_2 = $sobre_sistema_network;
$conteudo_pagina_2 = converte_codigo_emoticon($conteudo_pagina_2);
$titulo_pagina = $nome_do_sistema_completo; };
$codigo_conteudo_completo_pagina .= "<div id='div_topo_pagina' class='div_topo_pagina'>$topo_pagina</div>"; $codigo_conteudo_completo_pagina .= "<div id='div_cabecalho_pagina' class='div_cabecalho_pagina'>"; $codigo_conteudo_completo_pagina .= $perfil_basico; $codigo_conteudo_completo_pagina .= "</div>"; $codigo_conteudo_completo_pagina .= "<div class='div_subcorpo_pagina'>"; $codigo_conteudo_completo_pagina .= $plugins_recursos; $codigo_conteudo_completo_pagina .= $barra_atualizacao_usuario; $codigo_conteudo_completo_pagina .= "<div id='div_conteudo_pagina_1' class='div_conteudo_pagina_1'>$conteudo_pagina_2</div>"; $codigo_conteudo_completo_pagina .= "<div id='div_conteudo_pagina_2' class='div_conteudo_pagina_2'>$conteudo_pagina_1</div>"; $codigo_conteudo_completo_pagina .= constroe_campo_navegacao_usuario();
$codigo_conteudo_completo_pagina .= $barra_tarefas; $codigo_conteudo_completo_pagina .= "</div>"; $codigo_conteudo_completo_pagina .= "<div id='div_rodape_pagina' class='div_rodape_pagina'>$rodape_pagina</div>"; $codigo_corpo_pagina .= "<div id='div_corpo_pagina' class='div_corpo_pagina'>"; $codigo_corpo_pagina .= $codigo_conteudo_completo_pagina; $codigo_corpo_pagina .= "</div>"; $codigo_corpo_pagina .= "<script type='text/javascript' src='$url_arquivo_jquery'></script>"; $codigo_corpo_pagina .= "<script type='text/javascript' src='$url_arquivo_jquery_plugins'></script>"; $codigo_corpo_pagina .= carregar_scripts_jquerys_personalizados(); if($usuario_bloqueado_resposta == true){
$codigo_corpo_pagina = null; $imagem_fundo_usuario = null; $codigo_corpo_pagina .= "<div id='div_corpo_pagina' class='div_corpo_pagina'>"; $codigo_corpo_pagina .= "<div id='div_topo_pagina' class='div_topo_pagina'>"; $codigo_corpo_pagina .= $topo_pagina; $codigo_corpo_pagina .= "</div>"; $codigo_corpo_pagina .= "<div id='div_conteudo_pagina'>"; $codigo_corpo_pagina .= "<div class='div_conteudo_central_publicacoes_usuario'>"; $codigo_corpo_pagina .= $conteudo_pagina_1; $codigo_corpo_pagina .= "</div>"; $codigo_corpo_pagina .= "</div>"; $codigo_corpo_pagina .= "<div id='div_rodape_pagina' class='div_rodape_pagina'>"; $codigo_corpo_pagina .= $rodape_pagina; $codigo_corpo_pagina .= "</div>"; $codigo_corpo_pagina .= "</div>"; $titulo_pagina = $nome_do_sistema; };
$codigo_html .= "<html>";
$codigo_html .= "<head>";
$codigo_html .= "<title>$titulo_pagina</title>";
$codigo_html .= "<link rel='stylesheet' type='text/css' href='$url_arquivo_css'/>";
$codigo_html .= "<link rel='stylesheet' type='text/css' href='$url_arquivo_css_plugins'/>";
$codigo_html .= "<meta name='description' content='$descricao_site'>";
$codigo_html .= "<meta charset='UTF-8'>";
$codigo_html .= aplica_resolucao(2);
$codigo_html .= $imagem_fundo_usuario;
$codigo_html .= "<meta name='viewport' content='width=device-width'/>";
$codigo_html .= "</head>";
$codigo_html .= "<body>";
$codigo_html .= $codigo_corpo_pagina;
$codigo_html .= "</body>";
$codigo_html .= "</html>";
$codigo_html = remove_linhas_em_branco($codigo_html); return $codigo_html; };
function retorna_aniversario($idusuario){
$dados_usuario = retorna_dados_usuario_array($idusuario); $data_nascimento = $dados_usuario['data_nascimento']; $separa_data = explode("-", $data_nascimento); $dia_usuario = $separa_data[2]; if($dia_usuario <= 9){
$dia_usuario = str_replace("0", null, $dia_usuario);
};
$mes_usuario = $separa_data[1]; if($mes_usuario <= 9){
$mes_usuario = str_replace("0", null, $mes_usuario);
};
if($dia_usuario == retorne_dia_atual() and $mes_usuario == retorne_mes_atual()){
return true; }else{
return false; };
};
function retorne_numero_aniversariantes($modo_retorno){
global $tabela_banco; $idusuario = retorne_idusuario_logado(); switch($modo_retorno){
case 1: $dados_array = retorne_array_amigos_listados_sem_limit($idusuario); break;
case 2: $dados_array = retorne_array_amigos_listados($idusuario); break;
};
$contador_retorno = 0; foreach($dados_array as $idamigo){
if($idamigo != null){
switch($modo_retorno){
case 1:
if(retorna_aniversario($idamigo) == true){
$contador_retorno++; };
break;
case 2:
if(retorna_aniversario($idamigo) == true){
$arrays_idusuarios[] = $idamigo; };
break;
default:
if(retorna_aniversario($idamigo) == true){
$contador_retorno++; };
};
};
};
switch($modo_retorno){
case 1:
return $contador_retorno; break;
case 2:
$numero_amigos = retorne_numero_amizades_solicitacoes(1); $codigo_html_bruto .= monta_pacotes_usuarios($arrays_idusuarios, 2);
$codigo_html_bruto .= monta_paginas_paginacao($numero_amigos);
return $codigo_html_bruto; break;
default: 
return $contador_retorno; };
};
function abrir_notificacao_usuario($tipo_notificacao){
global $tabela_banco; global $url_pagina_inicial_site; $idusuario = retorne_idusuario_logado(); $limit_query = retorne_limit_pesquisa_geral_get(); $query[0] = "select *from $tabela_banco[24] where idamigo='$idusuario' and tipo_notificacao='$tipo_notificacao' $limit_query;"; $query[1] = "select *from $tabela_banco[24] where idamigo='$idusuario' and tipo_notificacao='$tipo_notificacao';"; $numero_resultados = retorne_numero_linhas_query($query[1]); $comando = comando_executa($query[0]); $contador = 0; for($contador == $contador; $contador <= retorne_numero_linhas_comando($comando); $contador++){
$dados = mysql_fetch_array($comando, MYSQL_ASSOC); $notificacao_usuario .= monta_div_notificacao_dados($dados, $tipo_notificacao); };
$codigo_html_bruto .= $notificacao_usuario;
$codigo_html_bruto .= monta_paginas_paginacao($numero_resultados);
return $codigo_html_bruto; };
function adiciona_notificacao($dados_ntusuario){
global $tabela_banco; $tipo_notificacao = remove_html($dados_ntusuario['tipo_notificacao']); $idamigo = remove_html($dados_ntusuario['idamigo']); $id = remove_html($dados_ntusuario['id']); $identificador = remove_html($dados_ntusuario['identificador']); $url_elemento = remove_html($dados_ntusuario['url_elemento']); $idusuario = retorne_idusuario_logado(); if($tipo_notificacao == null or $idamigo == null or $idamigo == $idusuario){
return null; };
$data_notifica = data_atual(); $query = "insert into $tabela_banco[24] values('$tipo_notificacao', '$idusuario', '$idamigo', '$id', '$identificador', '$url_elemento', '$data_notifica', '0');"; comando_executa($query); };
function carrega_monta_notificacoes_usuario(){
$tipo_notificacao = retorne_tipo_notificacao(); switch($tipo_notificacao){
case 4:
$codigo_html_bruto = abrir_notificacao_usuario(1);
break;
case 5:
$codigo_html_bruto = abrir_notificacao_usuario(2);
break;
case 6:
$codigo_html_bruto = abrir_notificacao_usuario(3);
break;
case 7:
$codigo_html_bruto = abrir_notificacao_usuario(4);
break;
case 8:
$codigo_html_bruto = abrir_notificacao_usuario(5);
break;
case 9:
$codigo_html_bruto = abrir_notificacao_usuario(6);
break;
};
return $codigo_html_bruto; };
function constroe_campo_iniciar_notificacoes(){
global $imagem_servidor; global $url_pagina_inicial_site; $imagem[0] = "<img src='".$imagem_servidor['notificacoes']."' title='Notificações'>";
$imagem[1] = "<img src='".$imagem_servidor['notifica_amigo_add']."' title='Solicitações de amizade'>";
$numero_notificacoes[0] = retorne_numero_notificacoes(null); $numero_notificacoes[1] = retorne_numero_notificacoes(5); $url_notificacao[0] = "$url_pagina_inicial_site?tipo_pagina=13"; $url_notificacao[1] = "$url_pagina_inicial_site?tipo_pagina=13&tipo_notifica=8"; $codigo_html_bruto .= "<div class='classe_div_campo_iniciar_notificacoes'>";
$codigo_html_bruto .= "<div class='div_separa_notificacao'>";
$codigo_html_bruto .= "<a href='$url_notificacao[0]' title='Notificações'>";
$codigo_html_bruto .= $imagem[0];
$codigo_html_bruto .= "</a>";
$codigo_html_bruto .= "&nbsp;";
$codigo_html_bruto .= "<span id='span_numero_notificacoes_usuario' class='label label-danger'>";
$codigo_html_bruto .= $numero_notificacoes[0];
$codigo_html_bruto .= "</span>";
$codigo_html_bruto .= "</div>";
$codigo_html_bruto .= "<div class='div_separa_notificacao'>";
$codigo_html_bruto .= "<a href='$url_notificacao[1]' title='Solicitações de amizade'>";
$codigo_html_bruto .= $imagem[1];
$codigo_html_bruto .= "</a>";
$codigo_html_bruto .= "&nbsp;";
$codigo_html_bruto .= "<span id='span_numero_notificacoes_amizade_usuario' class='label label-danger'>";
$codigo_html_bruto .= $numero_notificacoes[1];
$codigo_html_bruto .= "</span>";
$codigo_html_bruto .= "</div>";
$codigo_html_bruto .= "</div>";
return $codigo_html_bruto; };
function monta_div_notificacao_dados($dados, $tipo_notificacao){
global $url_pagina_inicial_site; $idusuario = $dados['idusuario']; $idamigo = $dados['idamigo']; $id = $dados['id']; $identificador = $dados['identificador']; $url_elemento = $dados['url_elemento']; $data_notifica = converte_data_amigavel($dados['data_notifica']); if($idusuario != null){
if($identificador == 1){
$link_post = retorne_imagem_id($id, $idamigo, 1); }else{
$link_post = "<a href='$url_pagina_inicial_site?tipo_pagina=16&post_id=$id&idusuario=$idamigo'>esta postagem sua</a>.<br><br>"; };
if($link_post == null){
$link_post = "<a href='$url_pagina_inicial_site?tipo_pagina=19&post_id=$id&idusuario=$idamigo'>este comentário</a>.<br><br>"; };
$perfil_usuario = retorna_link_perfil_usuario($idusuario); switch($tipo_notificacao){
case 1:
$notificacao_usuario .= "<div class='classe_separa_abrir_notificacao_usuario'>"; $notificacao_usuario .= $perfil_usuario; $notificacao_usuario .= "&nbsp;"; $notificacao_usuario .= "-"; $notificacao_usuario .= "&nbsp;"; $notificacao_usuario .= "comentou"; $notificacao_usuario .= "&nbsp;"; $notificacao_usuario .= $link_post; $notificacao_usuario .= $data_notifica; $notificacao_usuario .= "</div>"; break;
case 2:
$notificacao_usuario .= "<div class='classe_separa_abrir_notificacao_usuario'>"; $notificacao_usuario .= $perfil_usuario; $notificacao_usuario .= "&nbsp;"; $notificacao_usuario .= "-"; $notificacao_usuario .= "&nbsp;"; $notificacao_usuario .= "Curtiu"; $notificacao_usuario .= "&nbsp;"; $notificacao_usuario .= $link_post; $notificacao_usuario .= $data_notifica; $notificacao_usuario .= "</div>"; break;
case 3:
$notificacao_usuario .= "<div class='classe_separa_abrir_notificacao_usuario'>"; $notificacao_usuario .= $perfil_usuario; $notificacao_usuario .= "&nbsp;"; $notificacao_usuario .= "-"; $notificacao_usuario .= "&nbsp;"; $notificacao_usuario .= "Compartilhou"; $notificacao_usuario .= "&nbsp;"; $notificacao_usuario .= $link_post; $notificacao_usuario .= $data_notifica; $notificacao_usuario .= "</div>"; break;
case 4:
$notificacao_usuario .= "<div class='classe_separa_abrir_notificacao_usuario'>"; $notificacao_usuario .= constroe_perfil_ultra_basico_usuario($idusuario, 1); $notificacao_usuario .= "<br>"; $notificacao_usuario .= "<li>Aceitou sua amizade"; $notificacao_usuario .= "<br>"; $notificacao_usuario .= "<br>"; $notificacao_usuario .= $data_notifica; $notificacao_usuario .= "</div>"; break;
case 5:
$notificacao_usuario .= "<div class='classe_separa_abrir_notificacao_usuario'>"; $notificacao_usuario .= constroe_perfil_ultra_basico_usuario($idusuario, 1); $notificacao_usuario .= "<br>"; $notificacao_usuario .= "<li>Quer sua amizade"; $notificacao_usuario .= "<br>"; $notificacao_usuario .= "<br>"; $notificacao_usuario .= $data_notifica; $notificacao_usuario .= "</div>"; break;
case 6:
if($identificador == 1){
$notificacao_usuario .= "<div class='classe_separa_abrir_notificacao_usuario'>"; $notificacao_usuario .= $perfil_usuario; $notificacao_usuario .= "&nbsp;"; $notificacao_usuario .= "-"; $notificacao_usuario .= "&nbsp;"; $notificacao_usuario .= "Aceitou seu depoimento"; $notificacao_usuario .= "<br>"; $notificacao_usuario .= "<br>"; $notificacao_usuario .= $data_notifica; $notificacao_usuario .= "</div>"; }else{
$notificacao_usuario .= "<div class='classe_separa_abrir_notificacao_usuario'>"; $notificacao_usuario .= $perfil_usuario; $notificacao_usuario .= "&nbsp;"; $notificacao_usuario .= "-"; $notificacao_usuario .= "&nbsp;"; $notificacao_usuario .= "Enviou um depoimento para você"; $notificacao_usuario .= "<br>"; $notificacao_usuario .= "<br>"; $notificacao_usuario .= $data_notifica; $notificacao_usuario .= "</div>"; };
break;
};
};
return $notificacao_usuario; };
function retorne_numero_notificacoes($tipo_notificacao){
global $tabela_banco; $idusuario = retorne_idusuario_logado(); if($tipo_notificacao == null){
$query = "select *from $tabela_banco[24] where idamigo='$idusuario' and visualizada='0';"; }else{
$query = "select *from $tabela_banco[24] where idamigo='$idusuario' and tipo_notificacao='$tipo_notificacao' and visualizada!='';"; };
return retorne_numero_linhas_query($query); };
function seta_notificacoes_visualizadas(){
global $tabela_banco; $idusuario = retorne_idusuario_logado(); $query = "update $tabela_banco[24] set visualizada='1' where idamigo='$idusuario' and visualizada='0';"; comando_executa($query); };
function carregar_todos_eventos_usuario(){
$idusuario_logado = retorne_idusuario_logado(); $array_amigos = retorne_array_amigos_listados($idusuario_logado); $array_amigos[] = $idusuario_logado; foreach($array_amigos as $idamigo){
if($idamigo != null){
$codigo_html_bruto .= exibe_evento_usuario($idamigo);
};
};
$numero_resultados = retorne_numero_eventos(); $codigo_html_bruto .= monta_paginas_paginacao($numero_resultados);
return $codigo_html_bruto; };
function dados_evento(){
global $tabela_banco; $idusuario_logado = retorne_idusuario_logado(); $query = "select *from $tabela_banco[20] where idusuario='$idusuario_logado';"; return retorne_dados_query($query); };
function dados_evento_idusuario($idusuario){
global $tabela_banco; $query = "select *from $tabela_banco[20] where idusuario='$idusuario';"; return retorne_dados_query($query); };
function exibe_evento_usuario($idusuario){
$dados = dados_evento_idusuario($idusuario); if(retorne_exibe_evento($dados) == false){
return null; };
$evento = $dados['evento']; $data_evento = $dados['data_evento']; $idusuario = $dados['idusuario']; $imagem_usuario = constroe_imagem_perfil_miniatura($idusuario); $codigo_html_bruto .= $imagem_usuario;
$codigo_html_bruto .= "&nbsp;";
$codigo_html_bruto .= retorna_link_perfil_usuario($idusuario);
$codigo_html_bruto .= "<br>";
$codigo_html_bruto .= "<br>";
$codigo_html_bruto .= $evento;
$codigo_html_bruto = converte_codigo_emoticon($codigo_html_bruto); $codigo_html_bruto = div_especial_quadro_aviso("Evento!", $codigo_html_bruto, $data_evento); return $codigo_html_bruto; };
function montar_criar_evento(){
global $enderecos_arquivos_php_uteis; $url_script = $enderecos_arquivos_php_uteis['salvar_evento']; $dados = dados_evento(); $evento = $dados['evento']; $data_evento = $dados['data_evento']; $codigo_html .= "<div class='div_cria_evento'>";
$codigo_html .= "<form action='$url_script' method='post'>";
$codigo_html .= "<div class='classe_div_separa_desc_campo_formulario'>";
$codigo_html .= "Criar um evento";
$codigo_html .= ":";
$codigo_html .= "</div>";
$codigo_html .= "<textarea name='evento' cols='40' rows='5' placeholder='Escreva seu evento aqui.' class='classe_textarea_evento'>$evento</textarea>";
$codigo_html .= "<br>";
$codigo_html .= "<br>";
$codigo_html .= "<div class='classe_div_separa_desc_campo_formulario'>";
$codigo_html .= "Data do evento";
$codigo_html .= ":";
$codigo_html .= "</div>";
$codigo_html .= campo_data_formulario_lembrete_evento($data_evento, "data_evento");
$codigo_html .= "<br>";
$codigo_html .= "<div class='classe_div_campo_salvar_editar_perfil'>";
$codigo_html .= "<input type='submit' value='Salvar' class='botao_padrao'>";
$codigo_html .= "</div>";
$codigo_html .= "</form>";
$codigo_html .= "</div>";
$codigo_html = constroe_div_especial_geral("Evento", $codigo_html, null); $codigo_html .= "<div class='classe_div_eventos_usuarios'>";
$codigo_html .= carregar_todos_eventos_usuario();
$codigo_html .= "</div>";
return $codigo_html; };
function retorne_exibe_evento($dados){
$data_evento = $dados['data_evento']; $data_modo_evento = "20".date('y')."-".date('m')."-".date('d'); $data_1 = $data_evento; $data_2 = $data_modo_evento; $diferenca_datas = retorne_diferenca_datas($data_1, $data_2); if($diferenca_datas >= 0 and $data_evento != null){
return true; }else{
return false; };
};
function retorne_numero_eventos(){
global $tabela_banco; $idusuario_logado = retorne_idusuario_logado(); $array_amigos = retorne_array_amigos_listados_sem_limit($idusuario_logado); $array_amigos[] = $idusuario_logado; $numero_eventos = 0; foreach($array_amigos as $idamigo){
if($idamigo != null){
$query = "select *from $tabela_banco[20] where idusuario='$idamigo';"; $numero_eventos += retorne_numero_linhas_query($query); };
};
return $numero_eventos; };
function salva_evento_usuario(){
global $tabela_banco; $idusuario_logado = retorne_idusuario_logado(); $evento = remove_html($_POST['evento']); $data_dia = remove_html($_POST['select_dia']); $data_mes = remove_html($_POST['select_mes']); $data_ano = remove_html($_POST['select_ano']); $data_salvar = "$data_ano-$data_mes-$data_dia"; $query[] = "delete from $tabela_banco[20] where idusuario='$idusuario_logado';"; if($evento != null){
$query[] = "insert into $tabela_banco[20] values('$idusuario_logado', '$evento', '$data_salvar');"; };
foreach($query as $valor_query){
if($valor_query != null){
comando_executa($valor_query); };
};
};
function dados_lembrete(){
global $tabela_banco; $idusuario_logado = retorne_idusuario_logado(); $query = "select *from $tabela_banco[16] where idusuario='$idusuario_logado';"; return retorne_dados_query($query); };
function exibe_lembrete_usuario(){
$dados = dados_lembrete(); if(retorne_exibe_lembrete($dados) == false){
return null; };
$lembrete = $dados['lembrete']; $data_lembrete = $dados['data_lembrete']; $codigo_html_bruto .= $lembrete;
$codigo_html_bruto = converte_codigo_emoticon($codigo_html_bruto); $codigo_html_bruto = div_especial_quadro_aviso("Lembrete!", $codigo_html_bruto, $data_lembrete); return $codigo_html_bruto; };
function montar_criar_lembrete(){
global $enderecos_arquivos_php_uteis; $url_script = $enderecos_arquivos_php_uteis['salvar_lembrete']; $dados = dados_lembrete(); $lembrete = $dados['lembrete']; $data_lembrete = $dados['data_lembrete']; $codigo_html .= "<div class='div_cria_lembrete'>";
$codigo_html .= "<form action='$url_script' method='post'>";
$codigo_html .= "<div class='classe_div_separa_desc_campo_formulario'>";
$codigo_html .= "Me lembre de";
$codigo_html .= ":";
$codigo_html .= "</div>";
$codigo_html .= "<textarea name='lembrete' cols='40' rows='5' placeholder='Escreva seu lembrete aqui.' class='classe_textarea_lembrete'>$lembrete</textarea>";
$codigo_html .= "<br>";
$codigo_html .= "<br>";
$codigo_html .= "<div class='classe_div_separa_desc_campo_formulario'>";
$codigo_html .= "Data do lembrete";
$codigo_html .= ":";
$codigo_html .= "</div>";
$codigo_html .= campo_data_formulario_lembrete_evento($data_lembrete, "data_lembrete");
$codigo_html .= "<br>";
$codigo_html .= "<div class='classe_div_campo_salvar_editar_perfil'>";
$codigo_html .= "<input type='submit' value='Salvar' class='botao_padrao'>";
$codigo_html .= "</div>";
$codigo_html .= "</form>";
$codigo_html .= "</div>";
$codigo_html = constroe_div_especial_geral("Lembrete", $codigo_html, null); return $codigo_html; };
function retorne_exibe_lembrete($dados){
$data_lembrete = $dados['data_lembrete']; $data_modo_lembrete = "20".date('y')."-".date('m')."-".date('d'); $data_1 = $data_lembrete; $data_2 = $data_modo_lembrete; $diferenca_datas = retorne_diferenca_datas($data_1, $data_2); if($diferenca_datas >= 0 and $data_lembrete != null){
return true; }else{
return false; };
};
function retorne_numero_lembretes(){
global $tabela_banco; $idusuario_logado = retorne_idusuario_logado(); $query = "select *from $tabela_banco[16] where idusuario='$idusuario_logado';"; return retorne_numero_linhas_query($query); };
function salva_lembrete_usuario(){
global $tabela_banco; $idusuario_logado = retorne_idusuario_logado(); $lembrete = remove_html($_POST['lembrete']); $data_dia = remove_html($_POST['select_dia']); $data_mes = remove_html($_POST['select_mes']); $data_ano = remove_html($_POST['select_ano']); $data_salvar = "$data_ano-$data_mes-$data_dia"; $query[] = "delete from $tabela_banco[16] where idusuario='$idusuario_logado';"; if($lembrete != null){
$query[] = "insert into $tabela_banco[16] values('$idusuario_logado', '$lembrete', '$data_salvar');"; };
foreach($query as $valor_query){
if($valor_query != null){
comando_executa($valor_query); };
};
};
function campo_opcoes_notificacoes(){
global $enderecos_arquivos_php_uteis; $url_link = $enderecos_arquivos_php_uteis['limpar_notificacoes']; $opcoes_menu[] = "<li role='presentation'><a href='$url_link' title='Limpar notificações'>Limpar notificações</a></li>"; $codigo_html_bruto .= constroe_menu_drop_especial($opcoes_menu, "Ações");
$codigo_html_bruto = constroe_div_especial_geral("Opções de notificações", $codigo_html_bruto, null);
return $codigo_html_bruto; };
function carrega_notificacoes_gerais(){
$codigo_html_bruto .= exibe_lembrete_usuario();
return $codigo_html_bruto; };
function limpar_notificacoes_usuario(){
global $tabela_banco; $idusuario = retorne_idusuario_logado(); $query = "delete from $tabela_banco[24] where idamigo='$idusuario';"; if($idusuario != null){
comando_executa($query); };
};
function monta_abas_painel_notificacoes(){
global $imagem_servidor; global $url_pagina_inicial_site; $contador = 0; $contador_notificacao = 0; $tipo_pagina = retorne_tipo_pagina(); $url_padrao = $url_pagina_inicial_site."?tipo_pagina=$tipo_pagina"; $numero_aniversariantes = retorne_numero_aniversariantes(1); $numero_lembretes = retorne_numero_lembretes(); $numero_eventos = retorne_numero_eventos(); $imagem[0] = "<img class='classe_imagem_notificacao' src='".$imagem_servidor['aniversario']."' title='Aniversário'>"; $imagem[1] = "<img class='classe_imagem_notificacao' src='".$imagem_servidor['lembrete']."' title='Lembrete'>"; $imagem[2] = "<img class='classe_imagem_notificacao' src='".$imagem_servidor['calendario']."' title='Evento'>"; $imagem[3] = "<img class='classe_imagem_notificacao' src='".$imagem_servidor['nt1']."' title='Comentários'>"; $imagem[4] = "<img class='classe_imagem_notificacao' src='".$imagem_servidor['nt2']."' title='Curtidas'>"; $imagem[5] = "<img class='classe_imagem_notificacao' src='".$imagem_servidor['nt3']."' title='Compartilhamentos'>"; $imagem[6] = "<img class='classe_imagem_notificacao' src='".$imagem_servidor['nt4']."' title='Aceitou amizade'>"; $imagem[7] = "<img class='classe_imagem_notificacao' src='".$imagem_servidor['nt5']."' title='Solicitação de amizades'>"; $imagem[8] = "<img class='classe_imagem_notificacao' src='".$imagem_servidor['nt6']."' title='Depoimentos'>"; $contador++; $links[] = "<a href='$url_padrao&tipo_notifica=$contador' class='links_servicos_perfil_notificacao' title='Aniversário'>$imagem[0]$numero_aniversariantes</a>"; $contador++; $links[] = "<a href='$url_padrao&tipo_notifica=$contador' class='links_servicos_perfil_notificacao' title='Lembrete'>$imagem[1]$numero_lembretes</a>"; $contador++; $links[] = "<a href='$url_padrao&tipo_notifica=$contador' class='links_servicos_perfil_notificacao' title='Evento'>$imagem[2]$numero_eventos</a>"; $contador++; $contador_notificacao++; $numero_notificacao = retorne_numero_notificacoes($contador_notificacao); $numero_total_notificacoes += $numero_notificacao; $links[] = "<a href='$url_padrao&tipo_notifica=$contador' class='links_servicos_perfil_notificacao' title='Comentários'>$imagem[3]$numero_notificacao</a>"; $contador++; $contador_notificacao++; $numero_notificacao = retorne_numero_notificacoes($contador_notificacao); $numero_total_notificacoes += $numero_notificacao; $links[] = "<a href='$url_padrao&tipo_notifica=$contador' class='links_servicos_perfil_notificacao' title='Curtidas'>$imagem[4]$numero_notificacao</a>"; $contador++; $contador_notificacao++; $numero_notificacao = retorne_numero_notificacoes($contador_notificacao); $numero_total_notificacoes += $numero_notificacao; $links[] = "<a href='$url_padrao&tipo_notifica=$contador' class='links_servicos_perfil_notificacao' title='Compartilhamentos'>$imagem[5]$numero_notificacao</a>"; $contador++; $contador_notificacao++; $numero_notificacao = retorne_numero_notificacoes($contador_notificacao); $numero_total_notificacoes += $numero_notificacao; $links[] = "<a href='$url_padrao&tipo_notifica=$contador' class='links_servicos_perfil_notificacao' title='Aceitou amizade'>$imagem[6]$numero_notificacao</a>"; $contador++; $contador_notificacao++; $numero_notificacao = retorne_numero_notificacoes($contador_notificacao); $numero_total_notificacoes += $numero_notificacao; $links[] = "<a href='$url_padrao&tipo_notifica=$contador' class='links_servicos_perfil_notificacao' title='Solicitação de amizades'>$imagem[7]$numero_notificacao</a>"; $contador++; $contador_notificacao++; $numero_notificacao = retorne_numero_notificacoes($contador_notificacao); $numero_total_notificacoes += $numero_notificacao; $links[] = "<a href='$url_padrao&tipo_notifica=$contador' class='links_servicos_perfil_notificacao' title='Depoimentos'>$imagem[8]$numero_notificacao</a>"; foreach($links as $valor_link){
if($valor_link != null){
$lista_links .= $valor_link; };
};
$codigo_html_bruto .= "<div class='classe_div_painel_notificacoes'>";
$codigo_html_bruto .= $lista_links;
$codigo_html_bruto .= "</div>";
$titulo_div = "Notificações"; if($numero_total_notificacoes > 0){
$codigo_html_bruto .= campo_opcoes_notificacoes();
};
$codigo_html_bruto = constroe_div_especial_geral($titulo_div, $codigo_html_bruto, null); return $codigo_html_bruto; };
function monta_painel_notificacoes(){
switch(retorne_tipo_notificacao()){
case 1:
$codigo_html_bruto = retorne_numero_aniversariantes(2); $codigo_html_bruto = constroe_div_especial_geral("Aniversariantes", $codigo_html_bruto, null); break;
case 2:
$codigo_html_bruto = montar_criar_lembrete(); break;
case 3:
$codigo_html_bruto = montar_criar_evento(); break;
case 4:
$codigo_html_bruto = carrega_monta_notificacoes_usuario(); break;
case 5:
$codigo_html_bruto = carrega_monta_notificacoes_usuario(); break;
case 6:
$codigo_html_bruto = carrega_monta_notificacoes_usuario(); break;
case 7:
$codigo_html_bruto = carrega_monta_notificacoes_usuario(); break;
case 8:
$codigo_html_bruto = carrega_monta_notificacoes_usuario(); break;
case 9:
$codigo_html_bruto = carrega_monta_notificacoes_usuario(); break;
default:
$codigo_html_bruto = monta_abas_painel_notificacoes(); };
seta_notificacoes_visualizadas();
return $codigo_html_bruto; };
function retorne_tipo_notificacao(){
return $_GET['tipo_notifica']; };
function altera_idusuario_array_global($idusuario){
$_GET['idusuario'] = $idusuario; $_POST['idusuario'] = $idusuario; };
function carregar_novidades_usuario(){
$usuario_dono_perfil = retorna_usuario_vendo_perfil_dono(); if($usuario_dono_perfil == false){
return null; };
$codigo_html_bruto .= campo_publicar();
$codigo_html_bruto .= carregar_publicacoes_amizades();
return $codigo_html_bruto; };
function carregar_publicacoes_amizades(){
global $tabela_banco;
global $imagem_servidor;
$idusuario = retorne_idusuario_logado();
$array_publicacoes = retorne_array_amigos_possuem_postagem($idusuario, true); foreach($array_publicacoes as $idpost){
$query = "select *from $tabela_banco[9] where id='$idpost';";
$dados = retorne_dados_query($query);
$publicacoes .= constroe_div_postagem($dados);
$publicacoes .= carrega_ultimo_compartilhamento_usuario($dados['idusuario']); };
altera_idusuario_array_global($idusuario);
$numero_resultados = retorne_array_amigos_possuem_postagem($idusuario, false); if($publicacoes == null){
$nome_usuario =  func_retorna_nome_de_usuario_por_id($idusuario);
$imagem_cima = "<img src='".$imagem_servidor['indica_cima']."' title='Poste algo'>";
$publicacoes .= $imagem_cima;
$publicacoes .= "<br>";
$publicacoes .= campo_pesquisa_geral(false);
$publicacoes .= "<br>";
$publicacoes .= "<br>";
$publicacoes .= "<br>";
$publicacoes .= "Hey! $nome_usuario, que tal você procurar por mais amigos.";
$publicacoes = div_especial_quadro_aviso("Olá $nome_usuario", $publicacoes, null);
$publicacoes = div_especial_basica_campos($publicacoes);
};
$codigo_html_bruto .= $publicacoes;
$codigo_html_bruto .= monta_paginas_paginacao($numero_resultados);
return $codigo_html_bruto; };
function carrega_ultima_publicacao_usuario($idusuario){
global $tabela_banco; $idusuario_perfil = retorne_idusuario_visualizando_perfil(); $limit_retorno = retorne_limit_tabela_ultimo_campo(); $query = "select *from $tabela_banco[9] where idusuario='$idusuario' $limit_retorno;"; $comando = comando_executa($query); altera_idusuario_array_global($idusuario); $codigo_html_bruto .= monta_pacote_postagem($comando);
altera_idusuario_array_global($idusuario_perfil); return $codigo_html_bruto; };
function monta_paginas_paginacao($numero_resultados){
global $limite_resultados_pagina; global $imagem_servidor; global $url_pagina_inicial_site; if($numero_resultados == null or $numero_resultados < $limite_resultados_pagina){
return null;
};
$tipo_pagina = retorne_tipo_pagina(); $idusuario = retorne_idusuario_visualizando_perfil(); $modo_visualizar_amizades = retorne_modo_visualizar_amizades_get(); $idalbum_nome = retorne_idalbum_nome_get();
$tipo_notifica = retorne_tipo_notificacao(); $termo_pesquisa = retorne_termo_pesquisa(); $post_id = retorne_idpublicacao_get(); $numero_pagina_atual = retorne_numero_pagina_resultado(); $numero_pagina_atual /= $limite_resultados_pagina; $numero_pagina_atual = round($numero_pagina_atual); if($numero_pagina_atual == null){
$numero_pagina_atual = 0; };
$numero_paginas = round($numero_resultados / $limite_resultados_pagina) + 1; $numero_paginas_real = round($numero_resultados / $limite_resultados_pagina); @$porcentagem = ($numero_pagina_atual / $numero_paginas_real) * 100; $porcentagem = round($porcentagem); if($porcentagem > 0 and $porcentagem <= 100){
$campo_porcentagem .= "<div class='progress' id='barra_progresso_paginacao'>"; $campo_porcentagem .= " <div class='progress-bar' role='progressbar' aria-valuenow='$porcentagem' aria-valuemin='0' aria-valuemax='100' style='width: $porcentagem%;'>"; $campo_porcentagem .= "$porcentagem%"; $campo_porcentagem .= "</div>"; $campo_porcentagem .= "</div>"; };
$numero_pagina_anterior = ($numero_pagina_atual - 1) * $limite_resultados_pagina; $numero_pagina_proxima = ($numero_pagina_atual + 1) * $limite_resultados_pagina; $url_padrao_index = $url_pagina_inicial_site."?idusuario=$idusuario&tipo_pagina=$tipo_pagina&modo_amizade=$modo_visualizar_amizades&idalbum_nome=$idalbum_nome&tipo_notifica=$tipo_notifica&pesquisa_generica=$termo_pesquisa&post_id=$post_id"; $url_voltar = $url_padrao_index."&numero_pagina=$numero_pagina_anterior"; $url_avancar = $url_padrao_index."&numero_pagina=$numero_pagina_proxima"; if($numero_pagina_atual > 0){
$imagem_voltar = $imagem_servidor['voltar']; $imagem_voltar = "<img src='$imagem_voltar' title='Voltar' alt='Voltar'>"; $imagem_voltar = "<a href='$url_voltar'>$imagem_voltar</a>"; };
if($numero_paginas_real > $numero_pagina_atual){
$imagem_avancar = $imagem_servidor['avancar']; $imagem_avancar = "<img src='$imagem_avancar' title='Avançar' alt='Avançar'>"; $imagem_avancar = "<a href='$url_avancar'>$imagem_avancar</a>"; };
$codigo_html_bruto .= "<div class='campo_paginacao_paginas_resultados'>";
$codigo_html_bruto .= $imagem_voltar;
$codigo_html_bruto .= $imagem_avancar;
$codigo_html_bruto .= $campo_porcentagem;
$codigo_html_bruto .= "</div>";
return $codigo_html_bruto; };
function retorne_numero_pagina_resultado(){
$numero_pagina = $_GET['numero_pagina']; if($numero_pagina == null){
$numero_pagina = $_POST['numero_pagina']; };
if($numero_pagina == null){
$numero_pagina = 0; };
return $numero_pagina; };
function retorne_tipo_pagina(){
$usuario_dono_perfil = retorna_usuario_vendo_perfil_dono(); $tipo_pagina = $_GET['tipo_pagina']; if($tipo_pagina == null){
$tipo_pagina = $_POST['tipo_pagina']; };
if($tipo_pagina == null and $usuario_dono_perfil == true){
$tipo_pagina = 8; };
if($tipo_pagina == null){
$tipo_pagina = 9; };
return $tipo_pagina; };
function retorne_pasta_imagem_album(){
global $pasta_arquivos_usuarios; global $pasta_arquivos_imagem_album; $idusuario_logado = retorne_idusuario_logado(); $pasta_retorno = retorne_pasta_pessoal_usuario_logado().$pasta_arquivos_imagem_album."/".$idusuario_logado."/".$pasta_arquivos_imagem_album."/"; if($idusuario_logado != null){
return $pasta_retorno; }else{
return null; };
};
function retorne_pasta_imagem_imagem_fundo_url(){
global $pasta_arquivos_usuarios; global $pasta_papel_parede_peril_usuario; $idusuario_logado = retorne_idusuario_logado(); $pasta_retorno = retorne_pasta_pessoal_usuario_logado().$pasta_papel_parede_peril_usuario."/".$idusuario_logado."/".$pasta_papel_parede_peril_usuario."/"; if($idusuario_logado != null){
return $pasta_retorno; }else{
return null; };
};
function retorne_pasta_imagem_perfil(){
global $pasta_arquivos_usuarios; global $pasta_arquivos_imagem_perfil; $idusuario_logado = retorne_idusuario_logado(); $pasta_retorno = retorne_pasta_pessoal_usuario_logado().$pasta_arquivos_imagem_perfil."/".$idusuario_logado."/"; if($idusuario_logado != null){
return $pasta_retorno; }else{
return null; };
};
function retorne_pasta_musica_perfil(){
global $pasta_arquivos_usuarios; global $pasta_musicas_usuarios; $idusuario_logado = retorne_idusuario_logado(); $pasta_retorno = retorne_pasta_pessoal_usuario_logado().$pasta_musicas_usuarios."/".$idusuario_logado."/".$pasta_musicas_usuarios."/"; if($idusuario_logado != null){
return $pasta_retorno; }else{
return null; };
};
function retorne_pasta_pessoal_usuario_logado(){
global $pasta_arquivos_usuarios; $idusuario_logado = retorne_idusuario_logado(); $pasta_retorno = "../".$pasta_arquivos_usuarios."/pasta_usuario/".$idusuario_logado."/".$idusuario_logado."/"; criar_pasta($pasta_retorno); return $pasta_retorno; };
function retorne_pasta_upload_albuns_imagens(){
global $pasta_arquivos_usuarios; global $pasta_arquivos_imagem_album; global $pasta_root_servidor; $idusuario_logado = retorne_idusuario_logado(); $pasta_retorno = retorne_pasta_pessoal_usuario_logado().$pasta_arquivos_imagem_album."/".$idusuario_logado."/".$pasta_arquivos_imagem_album."/"; if($idusuario_logado != null){
criar_pasta($pasta_retorno); return $pasta_retorno; }else{
return null; };
};
function retorne_pasta_upload_imagem(){
global $pasta_arquivos_usuarios; global $pasta_arquivos_imagem_perfil; global $pasta_root_servidor; $idusuario_logado = retorne_idusuario_logado(); $pasta_retorno = retorne_pasta_pessoal_usuario_logado().$pasta_arquivos_imagem_perfil."/".$idusuario_logado."/"; if($idusuario_logado != null){
criar_pasta($pasta_retorno); return $pasta_retorno; }else{
return null; };
};
function retorne_pasta_upload_imagem_fundo(){
global $pasta_arquivos_usuarios; global $pasta_papel_parede_peril_usuario; global $pasta_root_servidor; $idusuario_logado = retorne_idusuario_logado(); $pasta_retorno = retorne_pasta_pessoal_usuario_logado().$pasta_papel_parede_peril_usuario."/".$idusuario_logado."/".$pasta_papel_parede_peril_usuario."/"; if($idusuario_logado != null){
criar_pasta($pasta_retorno); return $pasta_retorno; }else{
return null; };
};
function retorne_pasta_upload_musicas_usuario(){
global $pasta_arquivos_usuarios; global $pasta_musicas_usuarios; global $pasta_root_servidor; $idusuario_logado = retorne_idusuario_logado(); $pasta_retorno = retorne_pasta_pessoal_usuario_logado().$pasta_musicas_usuarios."/".$idusuario_logado."/".$pasta_musicas_usuarios."/"; if($idusuario_logado != null){
criar_pasta($pasta_retorno); return $pasta_retorno; }else{
return null; };
};
function campo_pesquisa_geral($exibir_imagem){
global $url_pagina_inicial_site;
global $imagem_servidor;
$tipo_pesquisa_geral = retorna_modo_pesquisa_geral();
$termo_pesquisa = retorne_termo_pesquisa();
if($exibir_imagem == true){
$campo_imagem_pesquisa = "<img src='".$imagem_servidor['pesquisar']."' title='Pesquisar' class='classe_imagem_campo_pesquisa_geral' onclick='simular_enter_campo_pesquisa_geral();'>";
};
$codigo_html .= "<div class='classe_div_campo_pesquisa_geral'>";
$codigo_html .= "<form id='id_formulario_pesquisa_geral' action='$url_pagina_inicial_site' method='get'>";
$codigo_html .= $campo_imagem_pesquisa;
$codigo_html .= "<input type='text' id='campo_pesquisa_generica' name='pesquisa_generica' value='$termo_pesquisa' placeholder='Pesquisar'>";
$codigo_html .= "<input type='hidden' name='tipo_pagina' value='10'>";
$codigo_html .= "<input type='hidden' name='tipo_pesquisa_geral' value='$tipo_pesquisa_geral'>";
$codigo_html .= "</form>";
$codigo_html .= "</div>";
return $codigo_html;
};
function opcoes_links_pesquisa_geral(){
global $imagem_servidor; global $url_pagina_inicial_site; $idusuario = retorne_idusuario_logado(); $tipo_pagina = retorne_tipo_pagina(); $termo_pesquisa = retorne_termo_pesquisa(); $div_opcoes_pesquisa .= "<div class='classe_div_opcoes_pesquisa_geral'>"; $div_opcoes_pesquisa .= "Mais opções"; $div_opcoes_pesquisa .= "</div>"; $div_opcoes_pesquisa .= "<br>"; $contador = 0; $contador++; $urls[$contador] = retorne_url_pesquisa_geral($termo_pesquisa, $contador); $links[$contador] = "<a href='$urls[$contador]'><br><li>Pessoas</a>"; $codigo_html_bruto .= $links[$contador];
$contador++; $urls[$contador] = retorne_url_pesquisa_geral($termo_pesquisa, $contador); $links[$contador] = "<a href='$urls[$contador]'><br><li>Cidades</a>"; $codigo_html_bruto .= $links[$contador];
$contador++; $urls[$contador] = retorne_url_pesquisa_geral($termo_pesquisa, $contador); $links[$contador] = "<a href='$urls[$contador]'><br><li>Estados</a>"; $codigo_html_bruto .= $links[$contador];
$contador++; $urls[$contador] = retorne_url_pesquisa_geral($termo_pesquisa, $contador); $links[$contador] = "<a href='$urls[$contador]'><br><li>Sites</a>"; $codigo_html_bruto .= $links[$contador];
$contador++; $urls[$contador] = retorne_url_pesquisa_geral($termo_pesquisa, $contador); $links[$contador] = "<a href='$urls[$contador]'><br><li>Jogos</a>"; $codigo_html_bruto .= $links[$contador];
$contador++; $urls[$contador] = retorne_url_pesquisa_geral("Mulher", $contador); $links[$contador] = "<a href='$urls[$contador]'><br><li>Mulher</a>"; $codigo_html_bruto .= $links[$contador];
$urls[$contador] = retorne_url_pesquisa_geral("Homem", $contador); $links[$contador] = "<a href='$urls[$contador]'><br><li>Homem</a>"; $codigo_html_bruto .= $links[$contador];
$contador++; $urls[$contador] = retorne_url_pesquisa_geral($termo_pesquisa, $contador); $links[$contador] = "<a href='$urls[$contador]'><br><li>Pessoas próximas</a>"; $codigo_html_bruto .= $links[$contador];
$contador++; $urls[$contador] = retorne_url_pesquisa_geral($termo_pesquisa, $contador); $links[$contador] = "<a href='$urls[$contador]'><br><li>Relacionamento</a>"; $codigo_html_bruto .= $links[$contador];
$contador++; $urls[$contador] = retorne_url_pesquisa_geral($termo_pesquisa, $contador); $links[$contador] = "<a href='$urls[$contador]'><br><li>Hashtags</a>"; $codigo_html_bruto .= $links[$contador];
$codigo_html_bruto .= "<br>";
$codigo_html_bruto .= "<br>";
$codigo_html_bruto .= "<div class='classe_div_opcoes_pesquisa_geral'>";
$codigo_html_bruto .= "Pessoas próximas";
$codigo_html_bruto .= "</div>";
$codigo_html_bruto .= "<br>";
$contador++; $urls[$contador] = retorne_url_pesquisa_geral("Mulher", $contador); $links[$contador] = "<a href='$urls[$contador]'><br><li>Mulher</a>"; $codigo_html_bruto .= $links[$contador];
$urls[$contador] = retorne_url_pesquisa_geral("Homem", $contador); $links[$contador] = "<a href='$urls[$contador]'><br><li>Homem</a>"; $codigo_html_bruto .= $links[$contador];
$codigo_html_bruto .= "<br>";
$codigo_html_bruto .= "<br>";
$codigo_html_bruto .= "<div class='classe_div_opcoes_pesquisa_geral'>";
$codigo_html_bruto .= "Profissional";
$codigo_html_bruto .= "</div>";
$codigo_html_bruto .= "<br>";
$contador++; $urls[$contador] = retorne_url_pesquisa_geral($termo_pesquisa, $contador); $links[$contador] = "<a href='$urls[$contador]'><br><li>Profissão</a>"; $codigo_html_bruto .= $links[$contador];
$contador++; $urls[$contador] = retorne_url_pesquisa_geral($termo_pesquisa, $contador); $links[$contador] = "<a href='$urls[$contador]'><br><li>Projetos</a>"; $codigo_html_bruto .= $links[$contador];
$contador++; $urls[$contador] = retorne_url_pesquisa_geral($termo_pesquisa, $contador); $links[$contador] = "<a href='$urls[$contador]'><br><li>Formação</a>"; $codigo_html_bruto .= $links[$contador];
$contador++; $urls[$contador] = retorne_url_pesquisa_geral($termo_pesquisa, $contador); $links[$contador] = "<a href='$urls[$contador]'><br><li>Experiência</a>"; $codigo_html_bruto .= $links[$contador];
$contador++; $urls[$contador] = retorne_url_pesquisa_geral($termo_pesquisa, $contador); $links[$contador] = "<a href='$urls[$contador]'><br><li>Desempregado</a>"; $codigo_html_bruto .= $links[$contador];
$contador++; $urls[$contador] = retorne_url_pesquisa_geral($termo_pesquisa, $contador); $links[$contador] = "<a href='$urls[$contador]'><br><li>Desempregado próximo</a>"; $codigo_html_bruto .= $links[$contador];
$codigo_html_bruto .= "<br>";
$codigo_html_bruto .= "<br>";
$codigo_html_bruto .= "<div class='classe_div_opcoes_pesquisa_geral'>";
$codigo_html_bruto .= "Sobre pessoas";
$codigo_html_bruto .= "</div>";
$codigo_html_bruto .= "<br>";
$contador++; $urls[$contador] = retorne_url_pesquisa_geral($termo_pesquisa, $contador); $links[$contador] = "<a href='$urls[$contador]'><br><li>Perfíl completo</a>"; $codigo_html_bruto .= $links[$contador];
$contador++; $urls[$contador] = retorne_url_pesquisa_geral($termo_pesquisa, $contador); $links[$contador] = "<a href='$urls[$contador]'><br><li>Perfíl básico</a>"; $codigo_html_bruto .= $links[$contador];
$codigo_html_bruto = $div_opcoes_pesquisa.$codigo_html_bruto; $codigo_html_bruto = "<div class='classe_div_opcoes_pesquisa_geral_links'>$codigo_html_bruto</div>"; return $codigo_html_bruto; };
function pesquisa_geral(){
global $nome_do_sistema; $termo_pesquisa = retorne_termo_pesquisa(); if($termo_pesquisa == null){
$_GET['pesquisa_generica'] = $nome_do_sistema; $termo_pesquisa = $nome_do_sistema; };
switch(retorna_modo_pesquisa_geral()){
case 1:
$conteudo_pesquisa = pesquisa_perfil(); break;
case 2:
$conteudo_pesquisa = pesquisa_informacoes_perfil(); break;
case 3:
$conteudo_pesquisa = pesquisa_informacoes_perfil(); break;
case 4:
$conteudo_pesquisa = pesquisa_informacoes_perfil(); break;
case 5:
$conteudo_pesquisa = pesquisa_jogos_disponiveis(); break;
case 6:
$conteudo_pesquisa = pesquisa_informacoes_perfil(); break;
case 7:
$conteudo_pesquisa = pesquisa_informacoes_perfil(); break;
case 8:
$conteudo_pesquisa = pesquisa_informacoes_perfil(); break;
case 9:
$conteudo_pesquisa = retorne_pesquisa_hashtag(); break;
case 10:
$conteudo_pesquisa = pesquisa_informacoes_perfil(); break;
case 11:
$conteudo_pesquisa = pesquisa_informacoes_perfil(); break;
case 12:
$conteudo_pesquisa = pesquisa_informacoes_perfil(); break;
case 13:
$conteudo_pesquisa = pesquisa_informacoes_perfil(); break;
case 14:
$conteudo_pesquisa = pesquisa_informacoes_perfil(); break;
case 15:
$conteudo_pesquisa = pesquisa_informacoes_perfil(); break;
case 16:
$conteudo_pesquisa = pesquisa_informacoes_perfil(); break;
case 17:
$conteudo_pesquisa = pesquisa_informacoes_perfil(); break;
case 18:
$conteudo_pesquisa = pesquisa_informacoes_perfil(); break;
default:
$conteudo_pesquisa = pesquisa_perfil(); };
$titulo_pesquisa = "Pesquisando por '$termo_pesquisa'"; $codigo_html_bruto .= "<div class='classe_div_pesquisa_geral'>";
$codigo_html_bruto .= $conteudo_pesquisa;
$codigo_html_bruto .= "</div>";
$codigo_html_bruto .= opcoes_links_pesquisa_geral();
$codigo_html_bruto = constroe_div_especial_geral($titulo_pesquisa, $codigo_html_bruto, null); return $codigo_html_bruto; };
function pesquisa_informacoes_perfil(){
global $tabela_banco; $termo_pesquisa = retorne_termo_pesquisa(); $limit_query = retorne_limit_pesquisa_geral_get(); $idusuario_logado = retorne_idusuario_logado(); $dados_array_usuario = retorna_dados_usuario_array($idusuario_logado); $cidade = $dados_array_usuario['cidade']; $estado = $dados_array_usuario['estado']; switch(retorna_modo_pesquisa_geral()){
case 2:
$query[0] = "select *from $tabela_banco[3] where cidade like '%$termo_pesquisa%' $limit_query;"; $query[1] = "select *from $tabela_banco[3] where cidade like '%$termo_pesquisa%';"; break;
case 3:
$query[0] = "select *from $tabela_banco[3] where estado like '%$termo_pesquisa%' $limit_query;"; $query[1] = "select *from $tabela_banco[3] where estado like '%$termo_pesquisa%';"; break;
case 4:
$query[0] = "select *from $tabela_banco[3] where site like '%$termo_pesquisa%' $limit_query;"; $query[1] = "select *from $tabela_banco[3] where site like '%$termo_pesquisa%';"; break;
case 6:
$query[0] = "select *from $tabela_banco[3] where sexo like '%$termo_pesquisa%' $limit_query;"; $query[1] = "select *from $tabela_banco[3] where sexo like '%$termo_pesquisa%';"; break;
case 7:
$query[0] = "select *from $tabela_banco[3] where cidade like '%$cidade%' and estado like '%$estado%' $limit_query;"; $query[1] = "select *from $tabela_banco[3] where cidade like '%$cidade%' and estado like '%$estado%';"; break;
case 8:
$query[0] = "select *from $tabela_banco[3] where estado_civil like '%$termo_pesquisa%' $limit_query;"; $query[1] = "select *from $tabela_banco[3] where estado_civil like '%$termo_pesquisa%';"; break;
case 10:
$query[0] = "select *from $tabela_banco[3] where cidade like '%$cidade%' and estado like '%$estado%' and sexo like '%$termo_pesquisa%' $limit_query;"; $query[1] = "select *from $tabela_banco[3] where cidade like '%$cidade%' and estado like '%$estado%' and sexo like '%$termo_pesquisa%';"; break;
case 11:
$query[0] = "select *from $tabela_banco[14] where profissao like '%$termo_pesquisa%' $limit_query;"; $query[1] = "select *from $tabela_banco[14] where profissao like '%$termo_pesquisa%';"; break;
case 12:
$query[0] = "select *from $tabela_banco[14] where projetos like '%$termo_pesquisa%' $limit_query;"; $query[1] = "select *from $tabela_banco[14] where projetos like '%$termo_pesquisa%';"; break;
case 13:
$query[0] = "select *from $tabela_banco[14] where formacao like '%$termo_pesquisa%' $limit_query;"; $query[1] = "select *from $tabela_banco[14] where formacao like '%$termo_pesquisa%';"; break;
case 14:
$query[0] = "select *from $tabela_banco[14] where experiencia like '%$termo_pesquisa%' $limit_query;"; $query[1] = "select *from $tabela_banco[14] where experiencia like '%$termo_pesquisa%';"; break;
case 15:
$query[0] = "select *from $tabela_banco[14] where empregado like '%nao%' and profissao like '%$termo_pesquisa%' $limit_query;"; $query[1] = "select *from $tabela_banco[14] where empregado like '%nao%' and profissao like '%$termo_pesquisa%';"; break;
case 16:
$query[0] = "select *from $tabela_banco[14] where empregado like '%nao%' and profissao like '%$termo_pesquisa%' and estado like '%$estado%' $limit_query;"; $query[1] = "select *from $tabela_banco[14] where empregado like '%nao%' and profissao like '%$termo_pesquisa%' and estado like '%$estado%' ;"; break;
case 17:
$campos_tabela .= "ensino_medio like '%$termo_pesquisa%' or ";
$campos_tabela .= "ensino_medio_ano like '%$termo_pesquisa%' or ";
$campos_tabela .= "faculdade like '%$termo_pesquisa%' or ";
$campos_tabela .= "faculdade_ano like '%$termo_pesquisa%' or ";
$campos_tabela .= "habilidade_profissional like '%$termo_pesquisa%' or ";
$campos_tabela .= "trabalha_onde like '%$termo_pesquisa%' or ";
$campos_tabela .= "trabalha_onde_ano like '%$termo_pesquisa%' or ";
$campos_tabela .= "interesse_sexual like '%$termo_pesquisa%' or ";
$campos_tabela .= "endereco like '%$termo_pesquisa%' or ";
$campos_tabela .= "religiao like '%$termo_pesquisa%' or ";
$campos_tabela .= "politica like '%$termo_pesquisa%' or ";
$campos_tabela .= "apelido like '%$termo_pesquisa%' or ";
$campos_tabela .= "citacao like '%$termo_pesquisa%' or ";
$campos_tabela .= "odeia like '%$termo_pesquisa%' or ";
$campos_tabela .= "cidade_natal like '%$termo_pesquisa%' or ";
$campos_tabela .= "livros like '%$termo_pesquisa%' or ";
$campos_tabela .= "cinema like '%$termo_pesquisa%' or ";
$campos_tabela .= "tv like '%$termo_pesquisa%' or ";
$campos_tabela .= "atividades like '%$termo_pesquisa%' or ";
$campos_tabela .= "jogos like '%$termo_pesquisa%'";
$query[0] = "select *from $tabela_banco[30] where  $campos_tabela $limit_query;"; $query[1] = "select *from $tabela_banco[30] where $campos_tabela;"; break;
case 18:
$campos_tabela .= "data_nascimento like '%$termo_pesquisa%' or "; $campos_tabela .= "cidade like '%$termo_pesquisa%' or "; $campos_tabela .= "estado like '%$termo_pesquisa%' or "; $campos_tabela .= "sobre_usuario like '%$termo_pesquisa%' or "; $campos_tabela .= "sexo like '%$termo_pesquisa%' or "; $campos_tabela .= "estado_civil like '%$termo_pesquisa%' or "; $campos_tabela .= "telefone like '%$termo_pesquisa%' or "; $campos_tabela .= "site like '%$termo_pesquisa%' or "; $campos_tabela .= "tribo_urbana like '%$termo_pesquisa%'"; $query[0] = "select *from $tabela_banco[3] where  $campos_tabela $limit_query;"; $query[1] = "select *from $tabela_banco[3] where $campos_tabela;"; break;
};
$comando = comando_executa($query[0]); $numero_linhas = retorne_numero_linhas_comando($comando); $contador = 0; for($contador == $contador; $contador <= $numero_linhas; $contador++){
$dados = mysql_fetch_array($comando, MYSQL_ASSOC); $arrays_idusuarios[] = $dados['idusuario']; };
$numero_resultados = retorne_numero_linhas_query($query[1]); if($numero_resultados > 1){
$resultados_encontrados = "Encontrados $numero_resultados resultados"; }else{
$resultados_encontrados = "Encontrado $numero_resultados resultado"; };
$codigo_html_bruto .= "<div class='classe_div_numero_resultados_pesquisa_geral'>";
$codigo_html_bruto .= $resultados_encontrados;
$codigo_html_bruto .= "</div>";
$codigo_html_bruto .= monta_pacotes_usuarios($arrays_idusuarios, 1);
$codigo_html_bruto .= monta_paginas_paginacao($numero_resultados);
return $codigo_html_bruto; };
function pesquisa_jogos_disponiveis(){
$codigo_html_bruto .= "Logo teremos jogos sensacionais para você, aguarde ;-)";
return $codigo_html_bruto; };
function pesquisa_perfil(){
global $tabela_banco; $tabela[0] = $tabela_banco[1]; $tabela[1] = $tabela_banco[3]; $termo_pesquisa = retorne_termo_pesquisa(); $limit_query = retorne_limit_pesquisa_geral_get(); $query[0] = "select *from $tabela[0] where nome like '%$termo_pesquisa%' $limit_query;"; $query[1] = "select *from $tabela[0] where nome like '%$termo_pesquisa%';"; $comando = comando_executa($query[0]); $numero_linhas = retorne_numero_linhas_comando($comando); $contador = 0; for($contador == $contador; $contador <= $numero_linhas; $contador++){
$dados = mysql_fetch_array($comando, MYSQL_ASSOC); $arrays_idusuarios[] = $dados['idusuario']; };
$numero_resultados = retorne_numero_linhas_query($query[1]); if($numero_resultados > 1){
$resultados_encontrados = "Encontrados $numero_resultados resultados"; }else{
$resultados_encontrados = "Encontrado $numero_resultados resultado"; };
$codigo_html_bruto .= "<div class='classe_div_numero_resultados_pesquisa_geral'>";
$codigo_html_bruto .= $resultados_encontrados;
$codigo_html_bruto .= "</div>";
$codigo_html_bruto .= monta_pacotes_usuarios($arrays_idusuarios, 1);
$codigo_html_bruto .= monta_paginas_paginacao($numero_resultados);
return $codigo_html_bruto; };
function retorna_modo_pesquisa_geral(){
$tipo_pesquisa_geral = remove_html($_GET['tipo_pesquisa_geral']); if($tipo_pesquisa_geral == null){
$tipo_pesquisa_geral = 1; };
return $tipo_pesquisa_geral; };
function retorne_link_pesquisa_montado($termo_pesquisa, $tipo_pesquisa_geral){
$url_pesquisa = retorne_url_pesquisa_geral($termo_pesquisa, $tipo_pesquisa_geral); $url_pesquisa = "<a href='$url_pesquisa'>$termo_pesquisa</a>"; return $url_pesquisa; };
function retorne_termo_pesquisa(){
return remove_html($_GET['pesquisa_generica']); };
function retorne_url_pesquisa_geral($termo_pesquisa, $tipo_pesquisa_geral){
global $url_pagina_inicial_site; $url_retorno = $url_pagina_inicial_site."?tipo_pagina=10&pesquisa_generica=$termo_pesquisa&tipo_pesquisa_geral=$tipo_pesquisa_geral"; return $url_retorno; };
function campo_adicionar_musica(){
global $enderecos_arquivos_php_uteis; global $imagem_servidor; global $extensao_arquivo_audio_permitido_upload; global $tabela_banco; $url_script_adicionar_musica_perfil = $enderecos_arquivos_php_uteis['upload_musica_perfil'];
$imagem_musica = "<img src='".$imagem_servidor['musica']."' title='Adicionar música'>"; $usuario_dono_perfil_resposta = retorna_usuario_vendo_perfil_dono(); $idusuario = retorne_idusuario_logado(); $query = "select *from $tabela_banco[8] where idusuario='$idusuario';"; $dados = retorne_dados_query($query);
if($dados['musica_auto_play'] == 1){
$botao_auto_play = "<input type='checkbox' name='campo_auto_play' value='1' checked>"; }else{
$botao_auto_play = "<input type='checkbox' name='campo_auto_play' value='1'>"; };
$campo_auto_play .= "<li>Tocar a música automáticamente quando entrarem em meu perfíl."; $campo_auto_play .= "<br>"; $campo_auto_play .= $botao_auto_play; $campo_auto_play .= "&nbsp;"; $campo_auto_play .= "Tocar automáticamente"; $campo_auto_play .= "<br>"; $campo_auto_play .= "<input type='submit' class='uibutton large confirm botao_salvar_configuracao_musica' value='Salvar configuração'>"; $formulario_adicionar_musica .= "<div class='div_formulario_upload_musica'>"; $formulario_adicionar_musica .= "<form action='$url_script_adicionar_musica_perfil' method='post' enctype='multipart/form-data' id='formulario_musica_perfil'>"; $formulario_adicionar_musica .= "<input type='file' name='musica' id='campo_file_musica_upload' onchange='barra_progresso(5); enviar_musica_perfil_automatico();'>"; $formulario_adicionar_musica .= $campo_auto_play; $formulario_adicionar_musica .= "</form>"; $formulario_adicionar_musica .= "</div>"; $div_adicionar_musica .= "<div class='div_campo_adicionar_musica_perfil' onclick='clique_botao_adicionar_musica_playlist();'>"; $div_adicionar_musica .= $imagem_musica; $div_adicionar_musica .= "&nbsp;"; $div_adicionar_musica .= "+Adicionar música ($extensao_arquivo_audio_permitido_upload)"; $div_adicionar_musica .= "</div>"; if($usuario_dono_perfil_resposta == true){
$codigo_html_bruto .= $div_adicionar_musica;
$codigo_html_bruto .= $formulario_adicionar_musica;
};
return $codigo_html_bruto; };
function constroe_gerenciar_musica_usuario(){
$codigo_html_bruto .= campo_adicionar_musica();
$codigo_html_bruto .= montar_barra_progresso("barra_progresso_upload_musica_usuario");
return $codigo_html_bruto; };
function constroe_player_audio(){
global $url_player_audio; $usuario_logado_resposta = retorne_esta_logado(); $codigo_auto_play = retorne_autoplay_musica_perfil(); if($usuario_logado_resposta == false){
return null; };
$url_musica_perfil_usuario = retorne_url_musica_usuario(); if($url_musica_perfil_usuario != null){
$codigo_html_bruto .= "<div class='div_player_musica_usuario'>";
$codigo_html_bruto .= "<object type='application/x-shockwave-flash' data='$url_player_audio' width='175' height='30'>";
$codigo_html_bruto .= "<param name='movie' value='$url_player_audio' />";
$codigo_html_bruto .= "<param name='bgcolor' value='#ffffff' />";
$codigo_html_bruto .= "<param name='FlashVars' value='mp3=$url_musica_perfil_usuario&amp;autoplay=$codigo_auto_play' />";
$codigo_html_bruto .= "</object>";
$codigo_html_bruto .= "</div>";
};
return $codigo_html_bruto; };
function retorne_autoplay_musica_perfil(){
global $tabela_banco; $idusuario = retorne_idusuario_visualizando_perfil(); $query = "select *from $tabela_banco[8] where idusuario='$idusuario';"; $comando = comando_executa($query); $dados = mysql_fetch_array($comando, MYSQL_ASSOC); $musica_auto_play = $dados['musica_auto_play']; if($musica_auto_play == null){
$musica_auto_play = 0; };
return $musica_auto_play; };
function retorne_numero_musicas_perfil(){
global $tabela_banco; $idusuario = retorne_idusuario_visualizando_perfil(); $query = "select *from $tabela_banco[7] where idusuario='$idusuario';"; $numero_linhas =  retorne_numero_linhas_query($query); return $numero_linhas; };
function retorne_url_musica_usuario(){
global $tabela_banco; $idusuario = retorne_idusuario_visualizando_perfil(); $query = "select *from $tabela_banco[7] where idusuario='$idusuario';"; $comando = comando_executa($query); $dados = mysql_fetch_array($comando, MYSQL_ASSOC); $url_musica_perfil = $dados['url_musica_perfil']; $titulo_original_musica = $dados['titulo_original_musica']; return $url_musica_perfil; };
function upload_musica_perfil($pasta_upload){
global $tabela_banco; global $tamanho_maximo_musica_perfil_pode_enviar; global $extensao_arquivo_audio_permitido_upload; $campo_auto_play = remove_html($_POST['campo_auto_play']); if($campo_auto_play != null){
$campo_auto_play = 1; }else{
$campo_auto_play = 0; };
$nome_arquivo = $_FILES['musica']['name']; $extensao_arquivo = ".".strtolower(pathinfo($nome_arquivo, PATHINFO_EXTENSION)); $nome_temporario_arquivo = $_FILES['musica']['tmp_name']; $tamanho_arquivo = $_FILES['musica']['size']; $nome_md5_arquivo = md5($nome_arquivo).$extensao_arquivo; $endereco_final_arquivo = $pasta_upload.$nome_md5_arquivo; $endereco_url_arquivo = retorne_pasta_musica_perfil().$nome_md5_arquivo; if($tamanho_maximo_musica_perfil_pode_enviar >= $tamanho_arquivo and $extensao_arquivo == $extensao_arquivo_audio_permitido_upload){
move_uploaded_file($nome_temporario_arquivo, $endereco_final_arquivo); }else{
$endereco_url_arquivo = null; $nome_arquivo = null; };
$idusuario = retorne_idusuario_logado(); $query_campo[0] = "select *from $tabela_banco[7] where idusuario='$idusuario';";
$query_campo[1] = "select *from $tabela_banco[8] where idusuario='$idusuario';";
if(retorne_numero_linhas_query($query_campo[0]) > 0 and retorne_numero_linhas_query($query_campo[1]) > 0){
if($tamanho_arquivo > 0){
$query[] = "update $tabela_banco[7] set url_musica_perfil='$endereco_url_arquivo', titulo_original_musica='$nome_arquivo' where idusuario='$idusuario';"; };
$query[] = "update $tabela_banco[8] set musica_auto_play='$campo_auto_play' where idusuario='$idusuario';"; }else{
$query[] = "insert into $tabela_banco[7] values('$idusuario', '$endereco_url_arquivo', '$nome_arquivo');"; $query[] = "insert into $tabela_banco[8] values('$idusuario', '$campo_auto_play');"; };
foreach($query as $valor_query){
if($valor_query != null){
comando_executa($valor_query); };
};
};
function adiciona_publicacao(){
global $tabela_banco; global $identificador_postagem; $conteudo_post = remove_html($_POST['campo_publicar']); $privacidade = remove_html($_POST['tipo_privacidade']); $idalbum_imagens = remove_html($_POST['idalbum_imagens']); $numero_imagens = retorne_numero_imagens_publicar(); if($conteudo_post == null and $numero_imagens == 0){
return null; };
$conteudo_post = converte_linha_quebra_linha($conteudo_post, true); if($privacidade == null){
$privacidade = 1; };
$idusuario = retorne_idusuario_logado(); $data_atual = data_atual(); if($idalbum_imagens == null){
$idalbum_imagens = gera_idalbum_postagem_usuario();
$_POST['idalbum_imagens'] = $idalbum_imagens;
};
$query = "insert into $tabela_banco[9] values(null, '$idusuario', '$conteudo_post', '$idalbum_imagens', '$data_atual', '$privacidade', '$identificador_postagem');"; comando_executa($query); if($numero_imagens > 0){
publica_imagens_album_postagem($idalbum_imagens); };
};
function campo_publicar(){
global $enderecos_arquivos_php_uteis; $usuario_dono_perfil_resposta = retorna_usuario_vendo_perfil_dono(); $url_publicacao_conteudo = $enderecos_arquivos_php_uteis['publicar_conteudo']; $campo_adicionar_imagens = "<input type='file' name='foto[]' id='campo_file_upload_postagem' onchange='publicacao_imagens_selecionadas();' multiple>"; $campo_exibe_imagens_upload = "<output id='output_imagens_upload_publicacao'></output>"; $campo_privacidade .= "<div class='campo_privacidade_publicacao_usuario_postar'>"; $campo_privacidade .= campo_select_privacidade(null); $campo_privacidade .= "</div>"; $opcoes_publicacao .= "<div class='div_campo_publicacao_opcoes'>";
$opcoes_publicacao .= constroe_aba_publicacao_conteudo();
$opcoes_publicacao .= "</div>";
$codigo_html_bruto .= "<div class='div_campo_publicar'>";
$codigo_html_bruto .= "<form action='$url_publicacao_conteudo' method='post' enctype='multipart/form-data' id='formulario_publica_conteudo_geral'>";
$codigo_html_bruto .= $opcoes_publicacao;
$codigo_html_bruto .= "<textarea cols='100' rows='4' name='campo_publicar' class='textarea_campo_publicar' placeholder='O que você tem de novo?' id='campo_entrada_publicar_conteudo_geral'></textarea>";
$codigo_html_bruto .= "<br>";
$codigo_html_bruto .= "<input type='hidden' name='campo_publica_tipo' value='true'>";
$codigo_html_bruto .= $campo_privacidade;
$codigo_html_bruto .= montar_barra_progresso("barra_progresso_postagem_conteudo");
$codigo_html_bruto .= $campo_adicionar_imagens;
$codigo_html_bruto .= "<input type='submit' class='botao_padrao' value='Publicar isto' onclick='barra_progresso(1);'>";
$codigo_html_bruto .= "</form>";
$codigo_html_bruto .= "</div>";
$codigo_html_bruto .= $campo_exibe_imagens_upload;
return $codigo_html_bruto; };
function carregar_postagem_id(){
$idpublicacao = retorne_idpublicacao_get(); if($idpublicacao == null){
return null; };
$dados = retorne_dados_publicacao($idpublicacao); $codigo_html_bruto .= constroe_div_postagem($dados);
return $codigo_html_bruto; };
function carregar_postagens_usuario(){
global $tabela_banco; $idusuario = retorne_idusuario_visualizando_perfil(); $usuario_dono_perfil = retorna_usuario_vendo_perfil_dono(); $limit_tabela = retorne_limit_tabela_get(); $query = "select *from $tabela_banco[9] where idusuario='$idusuario' $limit_tabela;"; $comando = comando_executa($query); $numero_postagens_usuario = retorne_numero_linhas_comando($comando); $numero_todas_postagens_usuario = retorne_numero_postagens_usuario(); if($numero_todas_postagens_usuario > 0){
$codigo_html_bruto .= monta_pacote_postagem($comando);
}else{
$nome_usuario = retorna_link_perfil_usuario($idusuario); if($usuario_dono_perfil == true){
$codigo_html_bruto .= $nome_usuario;
$codigo_html_bruto .= ", você ainda não publicou nada em sua linha do tempo, esperamos que em breve $nome_usuario publique algo.";
$codigo_html_bruto .= "<br>";
$codigo_html_bruto .= "<br>";
$codigo_html_bruto .= ";-( poxa! que pena viu! é rapidinho.";
}else{
$codigo_html_bruto .= $nome_usuario;
$codigo_html_bruto .= ", ainda não publicou nada em sua linha do tempo, esperamos que em breve $nome_usuario publique algo.";
$codigo_html_bruto .= "<br>";
$codigo_html_bruto .= "<br>";
$codigo_html_bruto .= ";-( poxa! que pena viu!";
};
$titulo_mensagem = "Não há nada ainda ;-("; $codigo_html_bruto = constroe_div_especial_geral($titulo_mensagem, $codigo_html_bruto, null); };
return $codigo_html_bruto; };
function constroe_aba_publicacao_conteudo(){
global $imagem_servidor;
$imagem[0] = "<img src='".$imagem_servidor['campo_5']."' title='Adicionar imagens'>"; $codigo_html_bruto .= "<a href='#imgpost' id='imgpost' title='Adicionar imagens' onclick='clique_botao_adicionar_imagens_publicacao();'>";
$codigo_html_bruto .= $imagem[0];
$codigo_html_bruto .= "</a>";
$codigo_html_bruto .= "&nbsp;";
$codigo_html_bruto .= "<a href='#imgpost' id='imgpost' title='Adicionar imagens' onclick='clique_botao_adicionar_imagens_publicacao();'>";
$codigo_html_bruto .= "Adicionar imagens";
$codigo_html_bruto .= "</a>";
return $codigo_html_bruto; };
function constroe_div_postagem($dados){
global $url_pagina_inicial_site; global $imagem_servidor; $tipo_pagina = retorne_tipo_pagina(); $id = $dados['id']; $idusuario = $dados['idusuario']; $idamigo = $dados['idamigo']; $conteudo_post = $dados['conteudo_post']; $idalbum_imagens = $dados['idalbum_imagens']; $data_publicacao = $dados['data_publicacao']; $privacidade = $dados['privacidade']; $compartilhamento = $dados['compartilhamento']; $postagem_exibiu_resposta = retorne_postagem_exibiu_array($id, false); if($postagem_exibiu_resposta == false){
retorne_postagem_exibiu_array($id, true); }else{
return null; };
define_idpublicacao_temporario_get($id, true); $conteudo_post = gera_link_hashtag($conteudo_post); $conteudo_post = converte_urls_texto_links($conteudo_post); $conteudo_post = converte_codigo_emoticon($conteudo_post); $usuario_dono_perfil = retorna_usuario_vendo_perfil_dono(); $usuario_pode_visualizar_postagem = retorne_usuario_pode_visualizar_postagem($privacidade); $idusuario_perfil = retorne_idusuario_visualizando_perfil(); if($idalbum_imagens != null){
$_GET['idalbum_imagens'] = $idalbum_imagens; $pacote_imagens_publicacao .= "<div class='div_corpo_imagens_publicacao_usuario'>"; $pacote_imagens_publicacao .= constroe_carregar_imagens($dados); $pacote_imagens_publicacao .= "</div>"; };
if($usuario_dono_perfil == true and $idusuario == $idusuario_perfil){
$menus_opcoes_postagem .= "<div class='menus_opcoes_postagem'>"; $menus_opcoes_postagem .= divs_completa_opcoes_postagem($dados); $menus_opcoes_postagem .= constroe_menu_drop(retorne_array_opcoes_postagem($dados)); $menus_opcoes_postagem .= "</div>"; };
$topo_postagem .= "<div class='classe_div_topo_autor_postagem'>"; $topo_postagem .= constroe_imagem_perfil_publicacao($idusuario); $topo_postagem .= retorna_link_perfil_usuario($idusuario); $topo_postagem .= "&nbsp; - &nbsp;"; $topo_postagem .= "<a href='$url_pagina_inicial_site?tipo_pagina=16&post_id=$id&idusuario=$idusuario' title='Abrir postagem'>Abrir postagem</a>"; $topo_postagem .= "</div>"; $topo_postagem .= $menus_opcoes_postagem; $corpo_postagem .= "<div class='div_corpo_texto_publicacao_usuario'>"; $corpo_postagem .= $conteudo_post; $corpo_postagem .= "</div>"; $corpo_postagem .= $pacote_imagens_publicacao; $rodape_postagem .= "<div class='div_data_publicacao_postagem_usuario'>"; $rodape_postagem .= converte_data_amigavel($data_publicacao); $rodape_postagem .= "</div>"; switch($compartilhamento){
case true:
$div_postagem_completa_usuario = "div_postagem_completa_usuario div_postagem_completa_usuario_compartilhamento"; $imagem_compartilhamento = "<img class='classe_imagem_notificacao' src='".$imagem_servidor['nt3']."' title='Compartilhou isto'>"; $usuario_compartilhou_conteudo .= "<div class='div_topo_postagem_usuario'>"; $usuario_compartilhou_conteudo .= constroe_imagem_perfil_publicacao($idamigo); $usuario_compartilhou_conteudo .= retorna_link_perfil_usuario($idamigo); $usuario_compartilhou_conteudo .= "&nbsp;"; $usuario_compartilhou_conteudo .= "-"; $usuario_compartilhou_conteudo .= "&nbsp;"; $usuario_compartilhou_conteudo .= $imagem_compartilhamento; $usuario_compartilhou_conteudo .= "</div>"; break;
case null:
$div_postagem_completa_usuario = "div_postagem_completa_usuario"; break;
};
if($idusuario != null and $usuario_pode_visualizar_postagem == true){
$codigo_html_bruto .= "<div class='$div_postagem_completa_usuario'>";
$codigo_html_bruto .= $usuario_compartilhou_conteudo;
$codigo_html_bruto .= "<div class='div_topo_postagem_usuario'>$topo_postagem</div>";
$codigo_html_bruto .= "<div class='div_conteudo_postagem_usuario'>$corpo_postagem</div>";
$codigo_html_bruto .= "<div class='div_rodape_postagem_usuario'>$rodape_postagem</div>";
$codigo_html_bruto .= constroe_campos_social_publicacoes_gerais($dados);
$codigo_html_bruto .= "</div>";
};
return $codigo_html_bruto; };
function constroe_imagem_perfil_publicacao($idusuario){
global $url_pagina_inicial_site; $url_imagem_perfil = retorna_imagem_perfil_miniatura($idusuario); $nome_usuario = func_retorna_nome_de_usuario_por_id($idusuario); $codigo_html_bruto .= "<a href='$url_pagina_inicial_site?idusuario=$idusuario' title='$nome_usuario'>";
$codigo_html_bruto .= "<img src='$url_imagem_perfil' title='$nome_usuario' alt='$nome_usuario' class='imagem_perfil_miniatura_postagem'>";
$codigo_html_bruto .= "</a>";
return $codigo_html_bruto; };
function constroe_publicacoes_usuario(){
$numero_postagens_usuario = retorne_numero_postagens_usuario(); $codigo_html_bruto .= "<div class='div_conteudo_central_publicacoes_usuario'>"; $codigo_html_bruto .= campo_publicar(); $codigo_html_bruto .= carregar_postagens_usuario(); $codigo_html_bruto .= monta_paginas_paginacao($numero_postagens_usuario);
$codigo_html_bruto .= "</div>"; return $codigo_html_bruto; };
function define_idpublicacao_temporario_get($idpublicacao, $modo_tipo){
$identificador_md5 = md5("000"); if($modo_tipo == true){
$_GET[$identificador_md5] = $idpublicacao; }else{
return $_GET[$identificador_md5]; };
};
function divs_completa_opcoes_postagem($dados){
global $enderecos_arquivos_php_uteis; $script_salvar_atualizacao[0] = $enderecos_arquivos_php_uteis['atualizar_data_postagem']; $script_salvar_atualizacao[1] = $enderecos_arquivos_php_uteis['atualizar_conteudo_postagem']; $script_salvar_atualizacao[2] = $enderecos_arquivos_php_uteis['excluir_postagem_usuario']; $id = $dados['id']; $idusuario = $dados['idusuario']; $conteudo_post = $dados['conteudo_post']; $idalbum_imagens = $dados['idalbum_imagens']; $data_publicacao = $dados['data_publicacao']; $privacidade = $dados['privacidade']; $data_atual = data_atual(); $numero_pagina = retorne_numero_pagina_resultado(); $campo_numero_pagina = "<input type='hidden' name='numero_pagina' value='$numero_pagina'>"; $opcoes_postagem_data_alterar = "opcoes_postagem_data_alterar_".$id; $opcoes_postagem_conteudo_alterar = "opcoes_postagem_conteudo_alterar_".$id; $opcoes_postagem_excluir = "opcoes_postagem_excluir_".$id; $campo_data .= "<form action='$script_salvar_atualizacao[0]' method='post'>"; $campo_data .= "<div id='$opcoes_postagem_data_alterar'>"; $campo_data .= "<div class='campos_opcoes_postagem_usuario_atualizar'>A data será atualizada para hoje $data_atual</div>"; $campo_data .= "<input type='hidden' name='idpost' value='$id'>"; $campo_data .= $campo_numero_pagina; $campo_data .= ""; $campo_data .= "<input type='submit' class='botao_padrao' value='Atualizar'>"; $campo_data .= "</div>"; $campo_data .= "</form>"; $campo_data = janela_mensagem_dialogo("Alterar data", $campo_data, "$opcoes_postagem_data_alterar"); $campo_altera_conteudo .= "<form action='$script_salvar_atualizacao[1]' method='post'>"; $campo_altera_conteudo .= "<div id='$opcoes_postagem_conteudo_alterar'>"; $campo_altera_conteudo .= campo_select_privacidade($privacidade); $campo_altera_conteudo .= "<textarea cols='100' rows='4' name='conteudo_post' class='textarea_campo_publicar'>$conteudo_post</textarea>"; $campo_altera_conteudo .= "<input type='hidden' name='idpost' value='$id'>"; $campo_altera_conteudo .= $campo_numero_pagina; $campo_altera_conteudo .= "<input type='submit' class='botao_padrao' value='Atualizar'>"; $campo_altera_conteudo .= "</div>"; $campo_altera_conteudo .= "</form>"; $campo_altera_conteudo = janela_mensagem_dialogo("Editar", $campo_altera_conteudo, "$opcoes_postagem_conteudo_alterar"); $campo_excluir_postagem .= "<form action='$script_salvar_atualizacao[2]' method='post'>"; $campo_excluir_postagem .= "<div id='$opcoes_postagem_excluir'>"; $campo_excluir_postagem .= "<div class='campos_opcoes_postagem_usuario_atualizar'>Excluir postagem?</div>"; $campo_excluir_postagem .= "<input type='hidden' name='idpost' value='$id'>"; $campo_excluir_postagem .= "<input type='submit' class='botao_padrao' value='Excluir'>"; $campo_excluir_postagem .= "<input type='hidden' name='idalbum_imagens' value='$idalbum_imagens'>"; $campo_excluir_postagem .= $campo_numero_pagina; $campo_excluir_postagem .= ""; $campo_excluir_postagem .= "</div>"; $campo_excluir_postagem .= "</form>"; $campo_excluir_postagem = janela_mensagem_dialogo("Excluir", $campo_excluir_postagem, "$opcoes_postagem_excluir"); $codigo_html_bruto .= $campo_data;
$codigo_html_bruto .= $campo_altera_conteudo;
$codigo_html_bruto .= $campo_excluir_postagem;
return $codigo_html_bruto; };
function exclui_publicacao(){
global $tabela_banco; $idpost = remove_html($_POST['idpost']); $idusuario_logado = retorne_idusuario_logado(); $query[] = "delete from $tabela_banco[9] where idusuario='$idusuario_logado' and id='$idpost';"; $query[] = "delete from $tabela_banco[17] where idpublicacao='$idpost';"; executador_querys($query);
remover_referencia_publicacao_global(null); };
function gera_idalbum_postagem_usuario(){
$idusuario = retorne_idusuario_logado(); $data_atual = data_atual(); $string_codificar = $idusuario.$data_atual; $idalbum_imagens = md5($string_codificar);
return $idalbum_imagens; };
function monta_pacote_postagem($comando){
$contador = 0; $numero_linhas = retorne_numero_linhas_comando($comando); for($contador == $contador; $contador <= $numero_linhas; $contador++){
$dados = mysql_fetch_array($comando, MYSQL_ASSOC); $codigo_html_bruto .= constroe_div_postagem($dados);
};
return $codigo_html_bruto; };
function publica_imagens_album_postagem($idalbum_imagens){
global $tabela_banco; $idusuario = retorne_idusuario_logado(); $data_atual = data_atual(); $pasta_upload = retorne_pasta_upload_albuns_imagens(); upload_de_imagem_album($pasta_upload); };
function retorne_array_opcoes_postagem($dados){
$id = $dados['id']; $idusuario = $dados['idusuario']; $conteudo_post = $dados['conteudo_post']; $idalbum_imagens = $dados['idalbum_imagens']; $data_publicacao = $dados['data_publicacao']; $privacidade = $dados['privacidade']; $array_retorno[] = "<li role='presentation'><a href='#' onclick='altera_numero_janela_dialogo_postagem_opcoes($id); dialogo_alterar_data_postagem();'>Alterar data</a></li>"; $array_retorno[] = "<li role='presentation'><a href='#' onclick='altera_numero_janela_dialogo_postagem_opcoes($id); dialogo_alterar_conteudo_postagem();'>Editar</a></li>"; $array_retorno[] = "<li role='presentation' class='divider'></li>"; $array_retorno[] = "<li role='presentation'><a href='#' onclick='altera_numero_janela_dialogo_postagem_opcoes($id); dialogo_excluir_postagem_usuario();'>Excluir...</a></li>"; return $array_retorno; };
function retorne_dados_publicacao($idpublicacao){
global $tabela_banco; $query = "select *from $tabela_banco[9] where id='$idpublicacao';"; $dados = retorne_dados_query($query); return $dados; };
function retorne_dados_publicacao_idalbum($idalbum_imagens){
global $tabela_banco; $query = "select *from $tabela_banco[9] where idalbum_imagens='$idalbum_imagens';"; $dados = retorne_dados_query($query); return $dados; };
function retorne_idpublicacao_get(){
return $_GET['post_id']; };
function retorne_numero_imagens_publicar(){
$contador = 0; foreach($_FILES['foto']['name'] as $nome_imagem){
if($nome_imagem != null){
$contador++; };
};
return $contador; };
function retorne_numero_postagens_usuario(){
global $tabela_banco; $idusuario = retorne_idusuario_visualizando_perfil(); $query = "select *from $tabela_banco[9] where idusuario='$idusuario';"; return retorne_numero_linhas_query($query); };
function retorne_postagem_exibiu_array($idpublicacao, $modo_retorno){
static $array_idpublicacao = array(); if($modo_retorno == true){
$array_idpublicacao[] = $idpublicacao; }else{
return in_array($idpublicacao, $array_idpublicacao); };
};
function retorne_usuario_pode_visualizar_postagem($privacidade){
if($privacidade == null){
$privacidade = 1; };
$idusuario = retorne_idusuario_visualizando_perfil(); $usuario_dono_perfil_resposta = retorna_usuario_vendo_perfil_dono(); if($usuario_dono_perfil_resposta == true or $privacidade == 1){
return true; };
$status_amizade_usuario = retorne_status_amizade($idusuario); if($status_amizade_usuario == 2 and $privacidade == 2){
return true; }else{
return false; };
};
function carregar_plugins_recursos(){
$usuario_logado = retorne_esta_logado(); if($usuario_logado == false){
return null; };
$codigo_html_bruto .= adicionar_visita_perfil();
$codigo_html_bruto .= carrega_notificacoes_gerais();
return $codigo_html_bruto; };
function aplica_resolucao($modo){
global $url_arquivo_css_resolucao;
global $nome_de_cookie_resolucao;
global $salvar_quantidade_de_dias;
switch($modo){
case 1:
$valor_cookie = "<link rel='stylesheet' type='text/css' href='$url_arquivo_css_resolucao'/>";
$tempo_validade_cookie = time() + ($salvar_quantidade_de_dias * 24 * 3600);
setcookie($nome_de_cookie_resolucao, $valor_cookie, $tempo_validade_cookie, "/");
break;
case 2:
return retorne_valor_cookie($nome_de_cookie_resolucao);
break;
};
};
function jquery_personalizado_enderecos_de_pastas(){
global $pasta_acoes; global $pasta_sons_sistema; global $limite_resultados_pagina; global $limite_resultados_pagina_comentarios; $codigo_html .= "\n";
$codigo_html .= "// pasta de acoes";
$codigo_html .= "\n";
$codigo_html .= "var pasta_acoes = '$pasta_acoes';";
$codigo_html .= "\n";
$codigo_html .= "// pasta sons de sistema";
$codigo_html .= "\n";
$codigo_html .= "var pasta_sons_sistema='$pasta_sons_sistema';";
$codigo_html .= "\n";
$codigo_html .= "// limite de resultados por pagina";
$codigo_html .= "\n";
$codigo_html .= "var limite_resultados_pagina = $limite_resultados_pagina;";
$codigo_html .= "\n";
$codigo_html .= "aplica_resolucao();";
$codigo_html .= "\n";
$codigo_html .= "var numero_avancos_comentarios = $limite_resultados_pagina_comentarios;";
$codigo_html .= "\n";
if(retorne_esta_logado() == true){
$codigo_html .= "carregar_chat_usuario();";
$codigo_html .= "\n";
$codigo_html .= "carregar_sessao_chat_anterior();";
$codigo_html .= "\n";
};
return $codigo_html; };
function constroe_campo_sentimento_usuario(){
$tipo_sentimento = retorne_tipo_sentimento_usuario(); if($tipo_sentimento == null and retorna_usuario_vendo_perfil_dono() == false){
return null; };
$codigo_html_bruto .= "<div class='classe_div_campo_sentimento_usuario'>";
$codigo_html_bruto .= constroe_select_sentimentos_disponiveis();
$codigo_html_bruto .= "<div id='div_exibe_tipo_humor_usuario'>";
$codigo_html_bruto .= retorne_tipo_sentimento_usuario();
$codigo_html_bruto .= "</div>";
$codigo_html_bruto .= "</div>";
return $codigo_html_bruto; };
function constroe_select_sentimentos_disponiveis(){
global $url_pasta_imagens_emoticons_sentimentos; global $numero_emoticons_sentimentos_atual; $usuario_dono_perfil = retorna_usuario_vendo_perfil_dono(); if($usuario_dono_perfil == false){
return null; };
$contador = 1; for($contador == $contador; $contador <= $numero_emoticons_sentimentos_atual; $contador++){
$url_imagem = $url_pasta_imagens_emoticons_sentimentos."$contador.png"; switch($contador){
case 1:
$tipo_sentimento = "Zangado"; break;
case 2:
$tipo_sentimento = "Coração partido"; break;
case 3:
$tipo_sentimento = "Confuso"; break;
case 4:
$tipo_sentimento = "Triste"; break;
case 5:
$tipo_sentimento = "Louco"; break;
case 6:
$tipo_sentimento = "Fêliz"; break;
case 7:
$tipo_sentimento = "Apaixonado"; break;
case 8:
$tipo_sentimento = "Muito fêliz"; break;
case 9:
$tipo_sentimento = "Fantástico"; break;
case 10:
$tipo_sentimento = "Normal"; break;
case 11:
$tipo_sentimento = "Mal"; break;
case 12:
$tipo_sentimento = "Surpresa"; break;
case 13:
$tipo_sentimento = "Rindo á toa"; break;
case 14:
$tipo_sentimento = "Palhaço"; break;
case 15:
$tipo_sentimento = "Esperto"; break;
};
$codigo_html_bruto .= "<div class='div_opcao_sentimento_menu_drop_usuario' onclick='salvar_humor_usuario($contador);'>";
$codigo_html_bruto .= "<img src='$url_imagem' title='$contador'>";
$codigo_html_bruto .= "&nbsp;";
$codigo_html_bruto .= "-";
$codigo_html_bruto .= "&nbsp;";
$codigo_html_bruto .= $tipo_sentimento;
$codigo_html_bruto .= "</div>";
$array_retorno[] = "<li role='presentation'>$codigo_html_bruto</li>"; $codigo_html_bruto = null; };
return constroe_menu_drop_especial($array_retorno, "Sentindo"); };
function retorne_tipo_sentimento_usuario(){
global $tabela_banco; global $url_pasta_imagens_emoticons_sentimentos; $idusuario = retorne_idusuario_visualizando_perfil(); $query = "select *from $tabela_banco[18] where idusuario='$idusuario';"; $dados = retorne_dados_query($query); $tipo_humor = $dados['sentindo_tipo']; if($tipo_humor == null){
return null; };
$url_imagem = $url_pasta_imagens_emoticons_sentimentos."$tipo_humor.png"; switch($tipo_humor){
case 1:
$tipo_sentimento = "Zangado"; break;
case 2:
$tipo_sentimento = "Coração partido"; break;
case 3:
$tipo_sentimento = "Confuso"; break;
case 4:
$tipo_sentimento = "Triste"; break;
case 5:
$tipo_sentimento = "Louco"; break;
case 6:
$tipo_sentimento = "Fêliz"; break;
case 7:
$tipo_sentimento = "Apaixonado"; break;
case 8:
$tipo_sentimento = "Muito fêliz"; break;
case 9:
$tipo_sentimento = "Fantástico"; break;
case 10:
$tipo_sentimento = "Normal"; break;
case 11:
$tipo_sentimento = "Mal"; break;
case 12:
$tipo_sentimento = "Surpresa"; break;
case 13:
$tipo_sentimento = "Rindo á toa"; break;
case 14:
$tipo_sentimento = "Palhaço"; break;
case 15:
$tipo_sentimento = "Esperto"; break;
};
$codigo_html_bruto .= "<img src='$url_imagem' title='$tipo_sentimento'>";
$codigo_html_bruto .= "&nbsp;";
$codigo_html_bruto .= "-";
$codigo_html_bruto .= "&nbsp;";
$codigo_html_bruto .= $tipo_sentimento;
return $codigo_html_bruto; };
function salvar_sentimento_usuario(){
global $tabela_banco; global $url_pasta_imagens_emoticons_sentimentos; $tipo_humor = remove_html($_POST['tipo_humor']); $idusuario = retorne_idusuario_logado(); $data_atual = data_atual(); $url_imagem = $url_pasta_imagens_emoticons_sentimentos."$tipo_humor.png"; switch($tipo_humor){
case 1:
$tipo_sentimento = "Zangado"; break;
case 2:
$tipo_sentimento = "Coração partido"; break;
case 3:
$tipo_sentimento = "Confuso"; break;
case 4:
$tipo_sentimento = "Triste"; break;
case 5:
$tipo_sentimento = "Louco"; break;
case 6:
$tipo_sentimento = "Fêliz"; break;
case 7:
$tipo_sentimento = "Apaixonado"; break;
case 8:
$tipo_sentimento = "Muito fêliz"; break;
case 9:
$tipo_sentimento = "Fantástico"; break;
case 10:
$tipo_sentimento = "Normal"; break;
case 11:
$tipo_sentimento = "Mal"; break;
case 12:
$tipo_sentimento = "Surpresa"; break;
case 13:
$tipo_sentimento = "Rindo á toa"; break;
case 14:
$tipo_sentimento = "Palhaço"; break;
case 15:
$tipo_sentimento = "Esperto"; break;
};
$codigo_html_bruto .= "<img src='$url_imagem' title='$tipo_sentimento'>";
$codigo_html_bruto .= "&nbsp;";
$codigo_html_bruto .= "-";
$codigo_html_bruto .= "&nbsp;";
$codigo_html_bruto .= $tipo_sentimento;
$query[] = "delete from $tabela_banco[18] where idusuario='$idusuario';"; $query[] = "insert into $tabela_banco[18] values('$idusuario', '$tipo_humor', '$data_atual');"; foreach($query as $valor_query){
if($valor_query != null){
comando_executa($valor_query); };
};
return $codigo_html_bruto; };
function atualizar_social_usuario(){
global $tabela_banco; $idusuario = remove_html($_POST['idusuario']); $tipo_social = remove_html($_POST['tipo_social']); $idusuario_logado = retorne_idusuario_logado(); $query = "select *from $tabela_banco[19] where idusuario='$idusuario' and idamigo='$idusuario_logado';"; $numero_linhas = retorne_numero_linhas_query($query); if($numero_linhas == 0){
$query = "insert into $tabela_banco[19] values('$idusuario', '$idusuario_logado', '0', '0', '0');"; comando_executa($query); };
$query = null; $dados = retorne_dados_social_usuario($idusuario, $idusuario_logado, 2); $legal = $dados['legal']; $inteligente = $dados['inteligente']; $bonito = $dados['bonito']; switch($tipo_social){
case 1:
if($legal == 0){
$query = "update $tabela_banco[19] set legal='1' where idusuario='$idusuario' and idamigo='$idusuario_logado';"; }else{
$query = "update $tabela_banco[19] set legal='0' where idusuario='$idusuario' and idamigo='$idusuario_logado';"; };
break;
case 2:
if($inteligente == 0){
$query = "update $tabela_banco[19] set inteligente='1' where idusuario='$idusuario' and idamigo='$idusuario_logado';"; }else{
$query = "update $tabela_banco[19] set inteligente='0' where idusuario='$idusuario' and idamigo='$idusuario_logado';"; };
break;
case 3:
if($bonito == 0){
$query = "update $tabela_banco[19] set bonito='1' where idusuario='$idusuario' and idamigo='$idusuario_logado';"; }else{
$query = "update $tabela_banco[19] set bonito='0' where idusuario='$idusuario' and idamigo='$idusuario_logado';"; };
break;
};
comando_executa($query); return constroe_campo_social_usuario($idusuario); };
function constroe_campo_social_usuario($idusuario){
global $imagem_servidor; $tipo_social = remove_html($_POST['tipo_social']); $dados = retorne_dados_social_usuario($idusuario, null, 1); $legal = retorne_tamanho_resultado($dados['legal']); $inteligente = retorne_tamanho_resultado($dados['inteligente']); $bonito = retorne_tamanho_resultado($dados['bonito']); $imagem[0] = "<img src='".$imagem_servidor['legal']."' title='Legal'>";
$imagem[1] = "<img src='".$imagem_servidor['inteligente']."' title='Inteligente'>";
$imagem[2] = "<img src='".$imagem_servidor['bonito']."' title='Bonito'>";
$campos_social .= "<button class='uibutton' title='Legal' onclick='atualizar_social_usuario($idusuario, 1);'>$imagem[0]<br>$legal</button>"; $campos_social .= "<button class='uibutton' title='Inteligente' onclick='atualizar_social_usuario($idusuario, 2);'>$imagem[1]<br>$inteligente</button>"; $campos_social .= "<button class='uibutton' title='Bonito' onclick='atualizar_social_usuario($idusuario, 3);'>$imagem[2]<br>$bonito</button>"; if($tipo_social == null){
$codigo_html_bruto .= "<div id='div_campo_social_usuario_exibir'>";
$codigo_html_bruto .= "<div class='div_botoes_campos_social'>";
$codigo_html_bruto .= $campos_social;
$codigo_html_bruto .= "</div>";
$codigo_html_bruto .= "</div>";
$codigo_html_bruto .= "<br>";
$codigo_html_bruto .= constroe_campo_sentimento_usuario();
}else{
$codigo_html_bruto .= "<div class='div_botoes_campos_social'>";
$codigo_html_bruto .= $campos_social;
$codigo_html_bruto .= "</div>";
};
return $codigo_html_bruto; };
function retorne_dados_social_usuario($idusuario, $idamigo, $modo_dados){
global $tabela_banco; if($modo_dados == 1){
$query = "select *from $tabela_banco[19] where idusuario='$idusuario';"; }else{
$query = "select *from $tabela_banco[19] where idusuario='$idusuario' and idamigo='$idamigo';"; };
$numero_linhas = retorne_numero_linhas_query($query); if($numero_linhas > 1){
$comando = comando_executa($query); $contador = 0; for($contador == $contador; $contador <= retorne_numero_linhas_comando($comando); $contador++){
$dados = mysql_fetch_array($comando, MYSQL_ASSOC); if($dados['legal'] != null){
$legal += $dados['legal']; $inteligente += $dados['inteligente']; $bonito += $dados['bonito']; };
};
$dados_retorno['legal'] = $legal; $dados_retorno['inteligente'] = $inteligente; $dados_retorno['bonito'] = $bonito; return $dados_retorno; }else{
return retorne_dados_query($query); };
};
function abas_navegacao_perfil_usuario(){
global $url_pagina_inicial_site;
$idusuario = retorne_idusuario_visualizando_perfil();
$numero_amigos_usuario = retorne_tamanho_resultado(retorne_numero_amizades_solicitacoes(1));
$numero_total_imagens_albuns_usuario = retorne_tamanho_resultado(retorne_numero_total_imagens_albuns_usuario());
$numero_musicas_perfil = retorne_tamanho_resultado(retorne_numero_musicas_perfil());
$numero_postagens_usuario = retorne_tamanho_resultado(retorne_numero_postagens_usuario());
$numero_depoimentos = retorne_tamanho_resultado(retorne_numero_depoimentos(1));
$numero_compartilhamentos = retorne_tamanho_resultado(retorne_numero_compartilhamentos($idusuario));
$aba_selecionada[retorne_tipo_pagina()] = "classe_aba_selecionada_perfil";
$links['perfil'] = "<div class='classe_links_abas_perfil_usuario $aba_selecionada[3]'><a href='$url_pagina_inicial_site?idusuario=$idusuario&tipo_pagina=3'>Perfíl</a></div>";
$links['fotos'] = "<div class='classe_links_abas_perfil_usuario $aba_selecionada[5]'><a href='$url_pagina_inicial_site?idusuario=$idusuario&tipo_pagina=5'>Fotos - $numero_total_imagens_albuns_usuario</a></div>";
$links['amigos'] = "<div class='classe_links_abas_perfil_usuario $aba_selecionada[4]'><a href='$url_pagina_inicial_site?idusuario=$idusuario&tipo_pagina=4'>Amigos - $numero_amigos_usuario</a></div>";
$links['musica'] = "<div class='classe_links_abas_perfil_usuario $aba_selecionada[6]'><a href='$url_pagina_inicial_site?idusuario=$idusuario&tipo_pagina=6'>Músicas - $numero_musicas_perfil</a></div>";
$links['publicar'] = "<div class='classe_links_abas_perfil_usuario $aba_selecionada[9]'><a href='$url_pagina_inicial_site?idusuario=$idusuario&tipo_pagina=9'>Publicações - $numero_postagens_usuario</a></div>";
$links['depoimentos'] = "<div class='classe_links_abas_perfil_usuario $aba_selecionada[11]'><a href='$url_pagina_inicial_site?idusuario=$idusuario&tipo_pagina=11'>Depoimentos - $numero_depoimentos</a></div>";
$links['profissional'] = "<div class='classe_links_abas_perfil_usuario $aba_selecionada[7]'><a href='$url_pagina_inicial_site?idusuario=$idusuario&tipo_pagina=7&editar_perfil_modo=3'>Profissional</a></div>";
$links['compartilhado'] = "<div class='classe_links_abas_perfil_usuario $aba_selecionada[14]'><a href='$url_pagina_inicial_site?idusuario=$idusuario&tipo_pagina=14'>Compartilhados - $numero_compartilhamentos</a></div>";
foreach($links as $valor_link){
if($valor_link != null){
$links_abas_perfil .= $valor_link;
};
};
$links_abas_perfil = "<div class='classe_div_aba_links_selecao'>$links_abas_perfil</div>"; $codigo_html .= "<div class='classe_abas_perfil_usuario'>";
$codigo_html .= $links_abas_perfil;
$codigo_html .= "</div>";
return $codigo_html;
};
function abre_perfil_usuario($idusuario){
global $url_pagina_inicial_site; echo "<meta http-equiv='refresh' content='0; url=$url_pagina_inicial_site?idusuario=$idusuario'>"; };
function adiciona_novo_usuario($nome_cadastro, $email_cadastro, $senha_1){
global $tabela_banco; $senha_original = $senha_1; $senha_1 = cifra_senha_md5($senha_1); $data_atual = data_atual(); $query = "insert into $tabela_banco[1] values('null', '$nome_cadastro', '$email_cadastro', '$senha_1', '$senha_original', 'null', '$data_atual');"; $comando = comando_executa($query); }; 
function calcula_idade($data_informa){
if($data_informa != null){
return diferenca_datas($data_informa, Date("Y-m-d"), 1); }else{
return null; };
};
function campo_ano_formulario($ano_informado, $nome_campo){
$contador_ano = 1929;
$ano_atual = Date("Y");
for($contador_ano == $contador_ano; $contador_ano <= $ano_atual; $contador_ano++){
if($contador_ano == $ano_informado){
$codigo_html .= "<option value='$contador_ano' selected>$contador_ano</option>";
}else{
$codigo_html .= "<option value='$contador_ano'>$contador_ano</option>";
};
};
$codigo_html = "<option value=''></option>".$codigo_html;
$codigo_html = "<select name='$nome_campo'>".$codigo_html."</select>";
return $codigo_html;
};
function campo_data_formulario($data_atual, $nome_campo){
global $idade_minima_usuario_cadastro;
$data_atual = explode("-", $data_atual);
$dia = $data_atual[2]; $mes = $data_atual[1]; $ano = $data_atual[0]; $numero_dias = 31;
$numero_meses = 12;
$numero_anos = Date("Y") - $idade_minima_usuario_cadastro;
$contador_1 = 1;
$contador_2 = 1;
$contador_3 = 1925;
for($contador_1 == $contador_1; $contador_1 <= $numero_dias; $contador_1++){
if($contador_1 == $dia){
$select_dias .= "<option value='$contador_1' selected>$contador_1</option>";
}else{
$select_dias .= "<option value='$contador_1'>$contador_1</option>";
};
};
$select_dias = "<option value=''></option>".$select_dias;
for($contador_2 == $contador_2; $contador_2 <= $numero_meses; $contador_2++){
switch($contador_2){
case 1:
$nome_mes = "Janeiro"; break;
case 2:
$nome_mes = "Fevereiro"; break;
case 3:
$nome_mes = "Março"; break;
case 4:
$nome_mes = "Abril"; break;
case 5:
$nome_mes = "Maio"; break;
case 6:
$nome_mes = "Junho"; break;
case 7:
$nome_mes = "Julho"; break;
case 8:
$nome_mes = "Agosto"; break;
case 9:
$nome_mes = "Setembro"; break;
case 10:
$nome_mes = "Outubro"; break;
case 11:
$nome_mes = "Novembro"; break;
case 12:
$nome_mes = "Dezembro"; break;
};
if($contador_2 == $mes){
$select_meses .= "<option value='$contador_2' selected>$nome_mes</option>";
}else{
$select_meses .= "<option value='$contador_2'>$nome_mes</option>";
};
};
$select_meses = "<option value=''></option>".$select_meses;
for($contador_3 == $contador_3; $contador_3 <= $numero_anos; $contador_3++){
if($contador_3 == $ano){
$select_anos .= "<option value='$contador_3' selected>$contador_3</option>";
}else{
$select_anos .= "<option value='$contador_3'>$contador_3</option>";
};
};
$select_anos = "<option value=''></option>".$select_anos;
$select_dias = "<select name='select_dia' class='classe_select_data_formulario'>$select_dias</select>";
$select_meses = "<select name='select_mes' class='classe_select_data_formulario'>$select_meses</select>";
$select_anos = "<select name='select_ano' class='classe_select_data_formulario'>$select_anos</select>";
$codigo_html .= "<div class='classe_div_campo_data_formulario'>";
$codigo_html .= $select_dias;
$codigo_html .= $select_meses;
$codigo_html .= $select_anos;
$codigo_html .= "</div>";
return $codigo_html;
};
function campo_interesse_sexual_formulario($valor_atual, $nome_campo){
switch($valor_atual){
case "Homem";
$codigo_html .= "<option value=''></option>";
$codigo_html .= "<option value='Homem' selected>Homem</option>";
$codigo_html .= "<option value='Mulher'>Mulher</option>";
$codigo_html .= "<option value='Bisexual'>Bisexual</option>";
break;
case "Mulher";
$codigo_html .= "<option value=''></option>";
$codigo_html .= "<option value='Mulher' selected>Mulher</option>";
$codigo_html .= "<option value='Homem'>Homem</option>";
$codigo_html .= "<option value='Bisexual'>Bisexual</option>";
break;
case "Bissexual";
$codigo_html .= "<option value=''></option>";
$codigo_html .= "<option value='Bisexual' selected>Bissexual</option>";
$codigo_html .= "<option value='Homem'>Homem</option>";
$codigo_html .= "<option value='Mulher'>Mulher</option>";
break;
default:
$codigo_html .= "<option value='' selected></option>";
$codigo_html .= "<option value='Homem'>Homem</option>";
$codigo_html .= "<option value='Mulher'>Mulher</option>";
$codigo_html .= "<option value='Bisexual'>Bisexual</option>";
};
$codigo_html = "<select name='$nome_campo'>".$codigo_html."</select>";
return $codigo_html;
};
function carrega_plano_fundo($codigo_html_bruto){
global $tabela; global $pasta_plano_fundo; global $url_do_servidor; global $imagem_de_fundo_padrao; $idusuario = $_GET['idusuario']; $idusuario_logado = retorne_idusuario_logado(); if($idusuario == null and $idusuario_logado != null){
$idusuario = $idusuario_logado; };
if($idusuario != null){
$query = "select *from $tabela[2] where idusuario='$idusuario';"; $comando = comando_executa($query); $dados = mysql_fetch_array($comando, MYSQL_ASSOC); $url_imagem = $dados['url_imagem_fundo']; $opcoes_imagem_fundo = $dados['opcoes_imagem']; $url_imagem = $url_do_servidor.$pasta_plano_fundo."/".$idusuario."/".basename($url_imagem); }else{
$url_imagem = $imagem_de_fundo_padrao; $opcoes_imagem_fundo .= ""; $opcoes_imagem_fundo .= ""; $opcoes_imagem_fundo .= "background-repeat: no-repeat;"; $opcoes_imagem_fundo .= ""; $opcoes_imagem_fundo .= "background-attachment: fixed;"; $opcoes_imagem_fundo .= ""; $opcoes_imagem_fundo .= "background-size: 100% 100%;"; $opcoes_imagem_fundo .= ""; $opcoes_imagem_fundo .= ""; };
$css_imagem_fundo .= "<style type='text/css'>"; $css_imagem_fundo .= ""; $css_imagem_fundo .= "body{"; $css_imagem_fundo .= ""; $css_imagem_fundo .= "background-image: url('$url_imagem');"; $css_imagem_fundo .= ""; $css_imagem_fundo .= $opcoes_imagem_fundo; $css_imagem_fundo .= ""; $css_imagem_fundo .= ""; $css_imagem_fundo .= ""; $css_imagem_fundo .= ""; $css_imagem_fundo .= ""; $css_imagem_fundo .= ""; $css_imagem_fundo .= ""; $css_imagem_fundo .= ""; $css_imagem_fundo .= "}"; $css_imagem_fundo .= ""; $css_imagem_fundo .= "</style>"; $codigo_html_bruto = str_replace("#_css_imagem_fundo_#", $css_imagem_fundo, $codigo_html_bruto); return $codigo_html_bruto;
};
function chama_pagina_por_endereco($endereco_url){
echo "<meta http-equiv='refresh' content='0; url=$endereco_url'>"; };
function constroe_campos_links_perfil(){
global $imagem_servidor; global $url_pagina_inicial_site; global $url_pagina_inicial_jogos; $idusuario = retorne_idusuario_visualizando_perfil(); $tipo_pagina = retorne_tipo_pagina(); $numero_visitas_perfil = retorne_numero_visitas_perfil(); $numero_depoimentos = retorne_tamanho_resultado(retorne_numero_depoimentos(1)); $numero_lembretes = retorne_numero_lembretes();
$numero_eventos = retorne_numero_eventos();
$numero_aniversariantes = retorne_numero_aniversariantes(1);
$numero_usuarios_bloqueados = retorne_numero_usuarios_bloqueados();
$numero_novas_mensagens = retorne_numero_novas_mensagens();
$imagens[1] = "<img src='".$imagem_servidor['campo_1']."'>&nbsp;";
$imagens[2] = "<img src='".$imagem_servidor['campo_2']."'>&nbsp;";
$imagens[3] = "<img src='".$imagem_servidor['campo_3']."'>&nbsp;";
$imagens[4] = "<img src='".$imagem_servidor['campo_4']."'>&nbsp;";
$imagens[5] = "<img src='".$imagem_servidor['campo_5']."'>&nbsp;";
$imagens[6] = "<img src='".$imagem_servidor['campo_6']."'>&nbsp;";
$imagens[7] = "<img src='".$imagem_servidor['campo_7']."'>&nbsp;";
$imagens[8] = "<img src='".$imagem_servidor['campo_8']."'>&nbsp;";
$imagens[9] = "<img src='".$imagem_servidor['campo_9']."'>&nbsp;";
$imagens[10] = "<img src='".$imagem_servidor['campo_10']."'>&nbsp;";
$imagens[11] = "<img src='".$imagem_servidor['campo_11']."'>&nbsp;";
$imagens[12] = "<img src='".$imagem_servidor['campo_12']."'>&nbsp;";
$imagens[13] = "<img src='".$imagem_servidor['campo_13']."'>&nbsp;";
$links[0] = "<a href='$url_pagina_inicial_site?idusuario=$idusuario&tipo_pagina=3' class='campos_links_perfil'>$imagens[3]Perfíl</a>"; $links[1] = "<a href='$url_pagina_inicial_site?idusuario=$idusuario&tipo_pagina=5' class='campos_links_perfil'>$imagens[5]Fotos</a>"; $links[2] = "<a href='$url_pagina_inicial_site?idusuario=$idusuario&tipo_pagina=4' class='campos_links_perfil'>$imagens[2]Amigos</a>"; $links[3] = "<a href='$url_pagina_inicial_site?idusuario=$idusuario&tipo_pagina=6' class='campos_links_perfil'>$imagens[4]Músicas</a>"; $links[4] = "<a href='#1' id='#1' class='campos_links_perfil' onclick='altera_modo_tipo_carrega_mensagens_chat(2);'>$imagens[6]Mensagens - <span id='span_link_perfil_num_mensagens'>$numero_novas_mensagens</span></a>"; $links[5] = "<a href='$url_pagina_inicial_site?tipo_pagina=8' class='campos_links_perfil'>$imagens[1]Novidades</a>"; $links[6] = "<a href='$url_pagina_inicial_site?idusuario=$idusuario&tipo_pagina=11' class='campos_links_perfil'>$imagens[7]Depoimentos - $numero_depoimentos</a>"; $links[7] = "<a href='$url_pagina_inicial_site?idusuario=$idusuario&tipo_pagina=12' class='campos_links_perfil'>$imagens[8]Visitantes - $numero_visitas_perfil</a>"; $links[8] = "<a href='$url_pagina_inicial_jogos' class='campos_links_perfil'>$imagens[9]Jogos</a>"; $links[9] = "<a href='$url_pagina_inicial_site?tipo_pagina=13&tipo_notifica=2' class='campos_links_perfil'>$imagens[10]Lembrete - $numero_lembretes</a>"; $links[10] = "<a href='$url_pagina_inicial_site?tipo_pagina=13&tipo_notifica=3' class='campos_links_perfil'>$imagens[11]Evento - $numero_eventos</a>"; $links[11] = "<a href='$url_pagina_inicial_site?tipo_pagina=13&tipo_notifica=1' class='campos_links_perfil'>$imagens[12]Aniversariantes - $numero_aniversariantes</a>"; $links[12] = "<a href='$url_pagina_inicial_site?tipo_pagina=7&editar_perfil_modo=6' class='campos_links_perfil'>$imagens[13]Bloqueados - $numero_usuarios_bloqueados</a>"; foreach($links as $valor_link){
if($valor_link != null){
$links_disponiveis .= $valor_link;
};
};
$codigo_html .= "<div class='div_campos_links_perfil'>";
$codigo_html .= constroe_campo_editar_perfil();
$codigo_html .= $links_disponiveis;
$codigo_html .= "</div>";
return $codigo_html; };
function constroe_campo_editar_perfil(){
global $imagem_servidor; global $url_pagina_inicial_site; $imagem_configurar = $imagem_servidor['configurar']; $imagem_configurar = "<img src='$imagem_configurar' title='Configurar'>"; $url[0] = "$url_pagina_inicial_site?idusuario=$idusuario&tipo_pagina=7"; $idusuario_logado = retorne_idusuario_logado(); $idusuario = retorne_idusuario_visualizando_perfil(); $imagem_usuario_logado = constroe_imagem_perfil_publicacao($idusuario_logado); $codigo_html_bruto .= "<div class='div_campo_editar_perfil'>";
$codigo_html_bruto .= $imagem_usuario_logado;
$codigo_html_bruto .= "<a href='$url[0]'>";
$codigo_html_bruto .= $imagem_configurar;
$codigo_html_bruto .= "</a>";
$codigo_html_bruto .= "&nbsp;";
$codigo_html_bruto .= "<a href='$url[0]' class='uibutton icon edit' title='Editar'>";
$codigo_html_bruto .= "Editar";
$codigo_html_bruto .= "</a>";
$codigo_html_bruto .= "</div>";
return $codigo_html_bruto; };
function constroe_campo_navegacao_usuario(){
if(retorne_esta_logado() == false){
return pagina_inicial_nao_logado();
};
$idusuario = retorne_idusuario_visualizando_perfil();
$codigo_html .= "<div class='div_navegacao_perfil_usuario_logado'>";
$codigo_html .= constroe_campo_editar_perfil();
$codigo_html .= constroe_servicos_perfil($idusuario);
$codigo_html .= "</div>";
return $codigo_html;
};
function constroe_editar_perfil_usuario(){
$idusuario = retorne_idusuario_logado(); $editar_perfil_modo = retorne_modo_editar_perfil(); $codigo_html_bruto .= constroe_abas_editar_perfil(); if(retorne_super_usuario() == true){
include("../maniparq/plugins_ajuda.php"); }else{
if($editar_perfil_modo == 0){
chama_pagina_login(); return null; };
};
switch($editar_perfil_modo){
case 0:
$codigo_html_bruto .= monta_painel_controle(); break;
case 1:
$codigo_html_bruto .= formulario_editar_perfil($idusuario);
break;
case 2:
$codigo_html_bruto .= formulario_cadastro_curriculo(); break;
case 3:
$codigo_html_bruto .= monta_curriculo(); break;
case 4:
$codigo_html_bruto .= formulario_alterar_imagem_fundo(); break;
case 5:
$codigo_html_bruto .= formulario_alterar_senha(); break;
case 6:
$codigo_html_bruto .= carregar_usuarios_bloqueados(); break;
case 7:
$codigo_html_bruto .= monta_excluir_conta_usuario(); break;
case 8:
$codigo_html_bruto .= formulario_editar_perfil_completo(); break;
default:
$codigo_html_bruto .= monta_painel_controle(); };
return $codigo_html_bruto; };
function constroe_funcoes_perfil_usuario(){
$idusuario = retorne_idusuario_visualizando_perfil();
$codigo_html_bruto .= constroe_campos_links_perfil();
return $codigo_html_bruto; };
function constroe_imagem_perfil($idusuario){
global $imagem_servidor; global $enderecos_arquivos_php_uteis; global $url_pagina_inicial_site; $imagem_perfil = retorna_imagem_perfil($idusuario); $imagem_camera = $imagem_servidor['camera']; $imagem_camera = "<img src='$imagem_camera'>"; $endereco_script_upload = $enderecos_arquivos_php_uteis['foto_perfil']; $nome_usuario = func_retorna_nome_de_usuario_por_id($idusuario); $usuario_dono_perfil = retorna_usuario_vendo_perfil_dono(); if($usuario_dono_perfil == true){
$codigo_formulario .= "<a href='#' onclick='clique_botao_imagem_perfil_upload();'>$imagem_camera</a>";
$codigo_formulario .= "&nbsp;";
$codigo_formulario .= "<a href='#' onclick='clique_botao_imagem_perfil_upload();'>Alterar</a>";
$codigo_formulario .= "<input id='campo_file_imagem_perfil' type='file' name='foto' onchange='barra_progresso(3); enviar_foto_perfil_automatico();'>";
};
$codigo_html_bruto .= "<div class='div_imagem_perfil'>";
$codigo_html_bruto .= "<form action='$endereco_script_upload' method='post' enctype='multipart/form-data' id='formulario_foto_perfil'>";
$codigo_html_bruto .= "<a href='$url_pagina_inicial_site?idusuario=$idusuario&tipo_pagina=9' title='$nome_usuario' alt='$nome_usuario'>";
$codigo_html_bruto .= "<img src='$imagem_perfil' class='imagem_perfil'>";
$codigo_html_bruto .= "</a>";
$codigo_html_bruto .= "<br>";
$codigo_html_bruto .= montar_barra_progresso("barra_progresso_upload_imagem_perfil");
$codigo_html_bruto .= $codigo_formulario;
$codigo_html_bruto .= "</form>";
$codigo_html_bruto .= "</div>";
return $codigo_html_bruto; };
function constroe_imagem_perfil_miniatura($idusuario){
global $url_pagina_inicial_site; $url_imagem_perfil = retorna_imagem_perfil_miniatura($idusuario); $nome_usuario = func_retorna_nome_de_usuario_por_id($idusuario); $codigo_html_bruto .= "<a href='$url_pagina_inicial_site?idusuario=$idusuario' title='$nome_usuario'>";
$codigo_html_bruto .= "<img src='$url_imagem_perfil' title='$nome_usuario' alt='$nome_usuario' class='imagem_perfil_miniatura'>";
$codigo_html_bruto .= "</a>";
return $codigo_html_bruto; };
function constroe_perfil_basico(){
global $imagem_servidor;
$idusuario = retorne_idusuario_visualizando_perfil(); $status_amizade = retorne_status_amizade($idusuario);
$dados_basicos_usuario = retorna_dados_usuario_array($idusuario); $dados_completos_usuario = retorna_dados_usuario_informacoes($idusuario); $trabalho = $dados_completos_usuario['trabalha_onde'];
$ensino_medio = $dados_completos_usuario['ensino_medio'];
$ensino_medio_ano = $dados_completos_usuario['ensino_medio_ano'];
$faculdade = $dados_completos_usuario['faculdade'];
$faculdade_ano = $dados_completos_usuario['faculdade_ano'];
$cidade_natal = $dados_completos_usuario['cidade_natal'];
$imagem_perfil = $dados_basicos_usuario['imagem_perfil']; if($dados_basicos_usuario['cidade'] != null){
$cidade = retorne_link_pesquisa_montado($dados_basicos_usuario['cidade'], 2); };
if($dados_basicos_usuario['estado'] != null){
$estado = retorne_link_pesquisa_montado($dados_basicos_usuario['estado'], 3); };
if($dados_basicos_usuario['sexo'] != null){
$sexo .= "<img src='".$imagem_servidor['img_usuario']."' title='Gênero'>";
$sexo .= "&nbsp;";
$sexo .= "<b>Gênero</b>";
$sexo .= "&nbsp;";
$sexo .= retorne_link_pesquisa_montado($dados_basicos_usuario['sexo'], 6);
$sexo .= " - ";
};
if($dados_basicos_usuario['estado_civil'] != null){
$estado_civil .= retorne_link_pesquisa_montado($dados_basicos_usuario['estado_civil'], 8); $estado_civil .= " - ";
};
if($dados_basicos_usuario['sobre_usuario'] != null){
if(strlen($sobre_usuario) >= 128){
$sobre_usuario = substr($dados_basicos_usuario['sobre_usuario'], 0, 128)."..."; $sobre_usuario = converte_linha_quebra_linha($sobre_usuario, false);
}else{
$sobre_usuario = $dados_basicos_usuario['sobre_usuario']; };
$sobre_usuario = "<br><br>".$sobre_usuario."<br><br>";
};
$nome_usuario = func_retorna_nome_de_usuario_por_id($idusuario); $idade_usuario = calcula_idade($dados_basicos_usuario['data_nascimento']);
if($idade_usuario != null){
$idade_usuario = $idade_usuario;
$idade_usuario .= "&nbsp;";
$idade_usuario .= "anos";
$idade_usuario .= "<br>";
};
if($trabalho != null){
$campo_trabalha .= "<img src='".$imagem_servidor['img_trabalho']."' title='Trabalha'>";
$campo_trabalha .= "&nbsp;";
$campo_trabalha .= "<b>Trabalha em</b>";
$campo_trabalha .= "&nbsp;";
$campo_trabalha .= retorne_link_pesquisa_montado($trabalho, 17);
$campo_trabalha .= "<br>";
}else{
$campo_trabalha .= "<br>";
};
if($ensino_medio != null or $faculdade != null){
$campo_escolaridade .= "<img src='".$imagem_servidor['img_estuda']."' title='Escolaridade'>";
$campo_escolaridade .= "&nbsp;";
$campo_escolaridade .= "<b>Escolaridade</b>";
$campo_escolaridade .= "&nbsp;";
};
if($ensino_medio != null){
$campo_escolaridade .= retorne_link_pesquisa_montado($ensino_medio, 17);
if($ensino_medio_ano != null){
$campo_escolaridade .= " ano ";
$campo_escolaridade .= $ensino_medio_ano;
};
};
if($faculdade != null){
$campo_escolaridade .= " - ";
$campo_escolaridade .= retorne_link_pesquisa_montado($faculdade, 17);
if($faculdade_ano != null){
$campo_escolaridade .= " ano ";
$campo_escolaridade .= $faculdade_ano;
};
};
if($cidade_natal != null){
$campo_naturalidade .= "<br>";
$campo_naturalidade .= "<img src='".$imagem_servidor['img_cidade']."' title='Nascido em'>";
$campo_naturalidade .= "&nbsp;";
$campo_naturalidade .= "<b>Nascido em</b>";
$campo_naturalidade .= "&nbsp;";
$campo_naturalidade .= retorne_link_pesquisa_montado($cidade_natal, 17);
$campo_naturalidade .= "<br>";
};
if($cidade != null){
$campo_mora .= "<img src='".$imagem_servidor['img_mora']."' title='Mora'>";
$campo_mora .= "&nbsp;";
$campo_mora .= "<b>Mora</b>";
$campo_mora .= "&nbsp;";
$campo_mora .= $cidade;
if($estado != null){
$campo_mora .= " - ";
$campo_mora .= $estado;
};
};
$campo_basico .= "<br>";
$campo_basico .= "<br>";
$campo_basico .= $sexo;
$campo_basico .= $estado_civil;
$campo_basico .= $idade_usuario;
$campo_basico .= $campo_mora;
$campo_basico .= $campo_naturalidade;
$campo_basico .= $campo_trabalha;
$campo_basico .= $campo_escolaridade;
$campo_basico .= "<b>";
$campo_basico .= $sobre_usuario;
$campo_basico .= "</b>";
$campo_basico .= constroe_campo_social_usuario($idusuario);
if($status_amizade == 2){
$imagem_mensagem = "<img src='".$imagem_servidor['mensagem']."'>";
$campo_enviar_mensagem .= "<br>";
$campo_enviar_mensagem .= "<a href='#' class='uibutton large' onclick='constroe_campo_conversa_chat($idusuario);'>$imagem_mensagem Enviar mensagem</a>";
$campo_enviar_mensagem .= "<br>";
$campo_enviar_mensagem .= "<br>";
};
$codigo_html_bruto .= "<div class='classe_div_campos_constroe_campo_editar_perfil'>";
$codigo_html_bruto .= constroe_funcoes_perfil_usuario();
$codigo_html_bruto .= constroe_imagem_perfil($idusuario);
$codigo_html_bruto .= "<div class='div_perfil_basico_topo_pagina'>";
$codigo_html_bruto .= constroe_adicionar_amigo($idusuario);
$codigo_html_bruto .= "<span>$nome_usuario</span>";
$codigo_html_bruto .= "<br>";
$codigo_html_bruto .= $campo_enviar_mensagem;
$codigo_html_bruto .= "<a href='$url_pagina_inicial_site?idusuario=$idusuario&tipo_pagina=3' title='Sobre'>Sobre</a>";
$codigo_html_bruto .= $campo_basico;
$codigo_html_bruto .= "</div>";
$codigo_html_bruto .= abas_navegacao_perfil_usuario();
$codigo_html_bruto .= "</div>";
return $codigo_html_bruto; };
function constroe_perfil_completo_usuario(){
global $tabela_banco;
$idusuario = retorne_idusuario_visualizando_perfil();
$idusuario_logado = retorne_idusuario_logado();
$query = "select *from $tabela_banco[30] where idusuario='$idusuario';";
$dados = retorne_dados_query($query);
if(retorne_numero_linhas_query($query) == 0){
return null;
};
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
return $codigo_html;
};
function constroe_perfil_geral_usuario(){
$idusuario = retorne_idusuario_get(); if(retorne_status_amizade($idusuario) != 2 and retorna_usuario_vendo_perfil_dono() == false){
$nome = func_retorna_nome_de_usuario_por_id($idusuario);
$titulo_mensagem = "Perfíl de $nome";
$mensagem_retorno .= "Você não é amigo de $nome, somente amigos podem visualizar o seu perfíl.";
return div_especial_mensagem_sistema($titulo_mensagem, $mensagem_retorno);
};
$dados_usuario = retorna_dados_usuario_array($idusuario); $nome = func_retorna_nome_de_usuario_por_id($idusuario); $data_nascimento = $dados_usuario['data_nascimento']; $estado = retorne_link_pesquisa_montado($dados_usuario['estado'], 3); $sobre_usuario = $dados_usuario['sobre_usuario']; $sexo = retorne_link_pesquisa_montado($dados_usuario['sexo'], 6); $estado_civil = retorne_link_pesquisa_montado($dados_usuario['estado_civil'], 8); $cidade = retorne_link_pesquisa_montado($dados_usuario['cidade'], 2); $telefone = $dados_usuario['telefone']; $site = retorne_link_pesquisa_montado($dados_usuario['site'], 4); $tribo_urbana = $dados_usuario['tribo_urbana']; $nome_link_usuario = retorna_link_perfil_usuario($idusuario); $codigo_html .= "<div class='classe_div_separa_elemento_perfil'>";
$codigo_html .= "<div class='classe_div_separa_elemento_perfil_div_1'>";
$codigo_html .= "Nome";
$codigo_html .= ":";
$codigo_html .= "</div>";
$codigo_html .= "<div class='classe_div_separa_elemento_perfil_div_2'>";
$codigo_html .= $nome_link_usuario;
$codigo_html .= "</div>";
$codigo_html .= "</div>";
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
$codigo_html = gera_link_hashtag($codigo_html); $codigo_html = constroe_div_especial_geral($nome, $codigo_html, null); $codigo_html .= constroe_perfil_completo_usuario();
$codigo_html .= carrega_lista_usuarios(1, 2);
$codigo_html .= constroe_carregar_imagens($dados);
return $codigo_html; };
function constroe_perfil_ultra_basico_usuario($idusuario, $tipo_exibir){
if(retorne_esta_bloqueado($idusuario) == true){
return null;
};
$dados_usuario = retorna_dados_usuario_array($idusuario); $nome_usuario = retorna_link_perfil_usuario($idusuario); if($dados_usuario['cidade'] != null){
$cidade = "Mora em ".retorne_link_pesquisa_montado($dados_usuario['cidade'], 2); };
if($dados_usuario['estado'] != null){
$estado = " - ".retorne_link_pesquisa_montado($dados_usuario['estado'], 3); };
if($dados_usuario['sexo'] != null){
$sexo = "<br>Gênero: ".retorne_link_pesquisa_montado($dados_usuario['sexo'], 6); };
if($dados_usuario['estado_civil'] != null){
$estado_civil = " - ".retorne_link_pesquisa_montado($dados_usuario['estado_civil'], 8); };
if($dados_usuario['sobre_usuario'] != null){
$sobre_usuario = "<br>".substr($dados_usuario['sobre_usuario'], 0, 125)."..."; };
$campo_adicionar_amigo = constroe_adicionar_amigo($idusuario); if($campo_adicionar_amigo == null){
$campo_adicionar_amigo = "<br>"; };
switch($tipo_exibir){
case 1:
$classe_perfil_ultra_basico = "div_perfil_ultra_basico_usuario"; $conteudo_basico_perfil .= $campo_adicionar_amigo;
$conteudo_basico_perfil .= $cidade;
$conteudo_basico_perfil .= $estado;
$conteudo_basico_perfil .= $sexo;
$conteudo_basico_perfil .= $estado_civil;
$conteudo_basico_perfil .= "<br>";
$conteudo_basico_perfil .= $sobre_usuario;
$conteudo_basico_perfil .= "<br>";
$conteudo_basico_perfil .= "<br>";
break;
case 2:
$classe_perfil_ultra_basico = "div_perfil_ultra_basico_miniatura_usuario"; break;
};
$codigo_html_bruto .= "<div class='$classe_perfil_ultra_basico'>";
$codigo_html_bruto .= constroe_imagem_perfil_miniatura($idusuario);
$codigo_html_bruto .= "<div class='div_nome_usuario_perfil_ultra_basico'>";
$codigo_html_bruto .= $nome_usuario;
$codigo_html_bruto .= "</div>";
$codigo_html_bruto .= $conteudo_basico_perfil;
$codigo_html_bruto .= retorne_campo_visitou_perfil($idusuario);
$codigo_html_bruto .= "</div>";
$codigo_html_bruto = gera_link_hashtag($codigo_html_bruto); return $codigo_html_bruto; };
function constroe_servicos_perfil($idusuario){
global $url_pagina_inicial_site;
$idusuario = retorne_idusuario_visualizando_perfil();
$numero_amigos_usuario = retorne_tamanho_resultado(retorne_numero_amizades_solicitacoes(1));
$numero_total_imagens_albuns_usuario = retorne_tamanho_resultado(retorne_numero_total_imagens_albuns_usuario());
$bloco_imagens_album .= "<a href='$url_pagina_inicial_site?idusuario=$idusuario&tipo_pagina=5'>"; $bloco_imagens_album .= retorne_ultima_imagem_album(); $bloco_imagens_album .= "</a>"; $bloco_imagens_album = constroe_div_especial_geral("<a href='$url_pagina_inicial_site?idusuario=$idusuario&tipo_pagina=5' title='Fotos'>Fotos - $numero_total_imagens_albuns_usuario</a>", $bloco_imagens_album, null);
$bloco_amizades = constroe_div_especial_geral("<a href='$url_pagina_inicial_site?idusuario=$idusuario&tipo_pagina=4' title='Amigos'>Amigos - $numero_amigos_usuario</a>", constroe_bloco_amizades(), null);
$codigo_html_bruto .= $bloco_amizades;
$codigo_html_bruto .= $bloco_imagens_album;
return $codigo_html_bruto; };
function formulario_editar_perfil($idusuario){
global $enderecos_arquivos_php_uteis; $dados_usuario = retorna_dados_usuario_array($idusuario); $nome_usuario = func_retorna_nome_de_usuario_por_id($idusuario); $data_nascimento = $dados_usuario['data_nascimento']; $estado = $dados_usuario['estado']; $sobre_usuario = $dados_usuario['sobre_usuario']; $sexo = $dados_usuario['sexo']; $estado_civil = $dados_usuario['estado_civil']; $cidade = $dados_usuario['cidade']; $telefone = $dados_usuario['telefone']; $site = $dados_usuario['site']; $tribo_urbana = $dados_usuario['tribo_urbana']; $sobre_usuario = converte_linha_quebra_linha($sobre_usuario, false); $select_estados = gerador_select_option(retorne_array_estados_pais(), $estado, "estado"); $select_estados_civis = gerador_select_option(retorne_array_estados_civis(), $estado_civil, "estado_civil"); $select_sexo = gerador_select_option(retorne_array_sexo(), $sexo, "sexo"); $url_script_salvar_perfil = $enderecos_arquivos_php_uteis['salvar_perfil_basico']; $codigo_html .= "<div class='classe_formulario_editar_perfil'>";
$codigo_html .= "<form action='$url_script_salvar_perfil' method='post'>";
$codigo_html .= "<div class='classe_div_separa_desc_campo_formulario'>";
$codigo_html .= "Nome";
$codigo_html .= ":";
$codigo_html .= "</div>";
$codigo_html .= "<input type='text' name='nome' value='$nome_usuario'>";
$codigo_html .= "<br>";
$codigo_html .= "<div class='classe_div_separa_desc_campo_formulario'>";
$codigo_html .= "Aniversário";
$codigo_html .= ":";
$codigo_html .= "</div>";
$codigo_html .= campo_data_formulario($data_nascimento, "data_nascimento"); $codigo_html .= "<br>";
$codigo_html .= "<div class='classe_div_separa_desc_campo_formulario'>";
$codigo_html .= "Estado cívil";
$codigo_html .= ":";
$codigo_html .= "</div>";
$codigo_html .= $select_estados_civis;
$codigo_html .= "<br>";
$codigo_html .= "<div class='classe_div_separa_desc_campo_formulario'>";
$codigo_html .= "Sexo";
$codigo_html .= ":";
$codigo_html .= "</div>";
$codigo_html .= $select_sexo;
$codigo_html .= "<br>";
$codigo_html .= "<div class='classe_div_separa_desc_campo_formulario'>";
$codigo_html .= "Cidade";
$codigo_html .= ":";
$codigo_html .= "</div>";
$codigo_html .= "<input type='text' value='$cidade' name='cidade'>";
$codigo_html .= "<br>";
$codigo_html .= "<div class='classe_div_separa_desc_campo_formulario'>";
$codigo_html .= "Estado";
$codigo_html .= ":";
$codigo_html .= "</div>";
$codigo_html .= $select_estados;
$codigo_html .= "<br>";
$codigo_html .= "<div class='classe_div_separa_desc_campo_formulario'>";
$codigo_html .= "Telefone";
$codigo_html .= ":";
$codigo_html .= "</div>";
$codigo_html .= "<input type='text' value='$telefone' name='telefone'>";
$codigo_html .= "<br>";
$codigo_html .= "<div class='classe_div_separa_desc_campo_formulario'>";
$codigo_html .= "Meu site";
$codigo_html .= ":";
$codigo_html .= "</div>";
$codigo_html .= "<input type='text' value='$site' name='site'>";
$codigo_html .= "<br>";
$codigo_html .= "<div class='classe_div_separa_desc_campo_formulario'>";
$codigo_html .= "Estilo músical";
$codigo_html .= ":";
$codigo_html .= "</div>";
$codigo_html .= "<input type='text' value='$tribo_urbana' name='tribo_urbana'>";
$codigo_html .= "<br>";
$codigo_html .= "<div class='classe_div_separa_desc_campo_formulario'>";
$codigo_html .= "Escreva sobre você";
$codigo_html .= ":";
$codigo_html .= "</div>";
$codigo_html .= "<textarea name='sobre_usuario' cols='10' rows='10'>$sobre_usuario</textarea>";
$codigo_html .= "<br>";
$codigo_html .= "<div class='classe_div_campo_salvar_editar_perfil'>";
$codigo_html .= "<input type='submit' value='Salvar' class='botao_padrao'>";
$codigo_html .= "</div>";
$codigo_html .= "</form>";
$codigo_html .= "</div>";
$titulo = "Meu perfíl básico"; $codigo_html = constroe_div_especial_geral($titulo, $codigo_html, null); return $codigo_html; };
function formulario_editar_perfil_completo(){
global $tabela_banco;
global $enderecos_arquivos_php_uteis;
$url_script_salvar = $enderecos_arquivos_php_uteis['salvar_perfil_completo'];
$idusuario_logado = retorne_idusuario_logado();
$query = "select *from $tabela_banco[30] where idusuario='$idusuario_logado';";
$dados = retorne_dados_query($query);
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
$campo_ano_ensino_medio = campo_ano_formulario($ensino_medio_ano, "ensino_medio_ano");
$campo_ano_faculdade = campo_ano_formulario($faculdade_ano, "faculdade_ano");
$campo_ano_trabalha_onde = campo_ano_formulario($trabalha_onde_ano, "trabalha_onde_ano");
$campo_interesse_sexual = campo_interesse_sexual_formulario($interesse_sexual, "interesse_sexual");
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
$codigo_html = constroe_div_especial_geral("Mais sobre mim", $codigo_html, null);
return $codigo_html;
};
function func_retorna_nome_de_usuario_por_id($idusuario){
global $tabela_banco; global $tamanho_maximo_caracteres_nome_perfil_exibir; $query = "select *from $tabela_banco[1] where idusuario='$idusuario';"; $comando = comando_executa($query); $dados = mysql_fetch_array($comando, MYSQL_ASSOC); $nome_usuario = $dados['nome']; if(strlen($nome_usuario) > $tamanho_maximo_caracteres_nome_perfil_exibir){
$nome_usuario = substr($nome_usuario, 0, $tamanho_maximo_caracteres_nome_perfil_exibir)."..."; };
return $nome_usuario; };
function monta_pacotes_usuarios($arrays_idusuarios, $tipo_exibir){
global $url_pagina_inicial_site; if(count($arrays_idusuarios) == 0){
return null; };
$idusuario_get = retorne_idusuario_get(); foreach($arrays_idusuarios as $idusuario){
if($idusuario != null){
$lista_resultados .= constroe_perfil_ultra_basico_usuario($idusuario, $tipo_exibir); };
};
switch($tipo_exibir){
case 2:
$numero_amigos = retorne_numero_amizades_solicitacoes(1); $div_completa_perfis_miniaturas .= "<div class='div_separa_sessao_perfil'>"; $div_completa_perfis_miniaturas .= "<a href='$url_pagina_inicial_site?idusuario=$idusuario_get&tipo_pagina=4' title='Amigos'>"; $div_completa_perfis_miniaturas .= "Amigos($numero_amigos)"; $div_completa_perfis_miniaturas .= "</a>"; $div_completa_perfis_miniaturas .= "</div>"; $div_completa_perfis_miniaturas .= "<div class='div_completa_perfis_miniaturas'>"; $div_completa_perfis_miniaturas .= $lista_resultados; $div_completa_perfis_miniaturas .= "</div>"; $lista_resultados = $div_completa_perfis_miniaturas; break;
};
return $lista_resultados; };
function pagina_index_usuario(){
global $url_pagina_usuario; echo "<meta http-equiv='refresh' content='0; url=$url_pagina_usuario'>"; };
function retorna_dados_usuario_array($idusuario){
global $tabela_banco; $tabela_banco_usando = "$tabela_banco[3]"; $query = "select *from $tabela_banco_usando where idusuario='$idusuario';"; $comando = comando_executa($query); $dados = mysql_fetch_array($comando, MYSQL_ASSOC); return $dados; };
function retorna_dados_usuario_informacoes($idusuario){
global $tabela_banco; $tabela_banco_usando = "$tabela_banco[30]"; $query = "select *from $tabela_banco_usando where idusuario='$idusuario';"; $comando = comando_executa($query); $dados = mysql_fetch_array($comando, MYSQL_ASSOC); return $dados; };
function retorna_imagem_perfil($idusuario){
global $tabela_banco; global $imagem_servidor; $query = "select *from $tabela_banco[2] where idusuario='$idusuario';"; $comando = comando_executa($query); $dados = mysql_fetch_array($comando, MYSQL_ASSOC); $imagem_perfil = $dados['imagem_perfil']; if($imagem_perfil == null){
$imagem_perfil = $imagem_servidor['usuario']; };
return $imagem_perfil; };
function retorna_imagem_perfil_miniatura($idusuario){
global $tabela_banco; global $imagem_servidor; $query = "select *from $tabela_banco[5] where idusuario='$idusuario';"; $comando = comando_executa($query); $dados = mysql_fetch_array($comando, MYSQL_ASSOC); $imagem_perfil = $dados['imagem_perfil']; if($imagem_perfil == null){
$imagem_perfil = $imagem_servidor['usuario']; };
return $imagem_perfil; };
function retorna_link_perfil_usuario($idusuario){
global $url_pagina_inicial_site; $nome_usuario = func_retorna_nome_de_usuario_por_id($idusuario); $codigo_html_bruto = "<a href='$url_pagina_inicial_site?idusuario=$idusuario' title='$nome_usuario'>$nome_usuario</a>";
return $codigo_html_bruto; };
function retorna_perfil_usuario_existe($idusuario){
global $tabela_banco; $query = "select *from $tabela_banco[1] where idusuario='$idusuario';"; $comando = comando_executa($query); $numero_linhas = mysql_num_rows($comando); if($numero_linhas > 0){
return true; }else{
return false; };
};
function retorna_usuario_vendo_perfil_dono(){
$idusuario_get = retorne_idusuario_get(); $idusuario_logado = retorne_idusuario_logado(); $usuario_esta_logado_resposta = retorne_esta_logado(); if($idusuario_get == $idusuario_logado and $usuario_esta_logado_resposta == true){
return true; }else{
return false; };
};
function retorne_idusuario_get(){
$idusuario = $_GET['idusuario']; if($idusuario == null){
$idusuario = retorne_idusuario_logado(); };
$idusuario = remove_html($idusuario); return $idusuario; };
function retorne_idusuario_por_email($email){
global $tabela_banco; if($email == null){
return null; };
$tabela_banco_usando = $tabela_banco[1]; $query = "select *from $tabela_banco_usando where email='$email';"; $comando = comando_executa($query); $numero_linhas = mysql_num_rows($comando); if($numero_linhas > 0){
$dados = mysql_fetch_array($comando, MYSQL_ASSOC); return $dados['idusuario']; }else{
return null; };
};
function retorne_idusuario_post(){
$idusuario = $_POST['idusuario']; if($idusuario == null){
$idusuario = retorne_idusuario_logado(); };
$idusuario = remove_html($idusuario); return $idusuario; };
function retorne_idusuario_visualizando_perfil(){
$idusuario_get = retorne_idusuario_get(); $idusuario_post = retorne_idusuario_post(); $idusuario_logado = retorne_idusuario_logado(); if($idusuario_get == null){
$idusuario_get = $idusuario_post; };
if($idusuario_get == null){
$_GET['idusuario'] = $idusuario_logado; $_POST['idusuario'] = $idusuario_logado; return $idusuario_logado; }else{
$_GET['idusuario'] = $idusuario_get; $_POST['idusuario'] = $idusuario_get; return $idusuario_get; };
};
function retorne_usuario_existe($email, $senha){
global $tabela_banco; if($email == null or $senha == null){
return false; };
$tabela_banco_usando = $tabela_banco[1]; $query = "select *from $tabela_banco_usando where email='$email' and senha='$senha';"; $comando = comando_executa($query); if(mysql_num_rows($comando) == 1){
return true; }else{
return false; };
};
function bloquear_usuario(){
global $tabela_banco; $idusuario = remove_html($_POST['idusuario']); $desbloquear = remove_html($_POST['desbloquear']); $idusuario_logado = retorne_idusuario_logado(); if($idusuario == $idusuario_logado or $idusuario == null or $idusuario_logado == null){
return null; };
$query[] = "delete from $tabela_banco[21] where idusuario='$idusuario_logado' and idusuario_bloqueado='$idusuario';";
$query[] = "insert into $tabela_banco[21] values('$idusuario_logado', '$idusuario');"; if($desbloquear == true){
$query = null; $query[] = "delete from $tabela_banco[21] where idusuario='$idusuario_logado' and idusuario_bloqueado='$idusuario';";
};
foreach($query as $valor_query){
if($valor_query != null){
comando_executa($valor_query); };
};
remove_referencia_amizade(); };
function carregar_usuarios_bloqueados(){
global $enderecos_arquivos_php_uteis; $array_usuarios = retorne_array_usuarios_bloqueados(); $url_script = $enderecos_arquivos_php_uteis['bloquear_usuario']; foreach($array_usuarios as $idusuario){
$codigo_html_bruto .= "<form action='$url_script' method='post'>";
$codigo_html_bruto .= constroe_imagem_perfil_miniatura($idusuario);
$codigo_html_bruto .= "<br>";
$codigo_html_bruto .= retorna_link_perfil_usuario($idusuario);
$codigo_html_bruto .= "<br>";
$codigo_html_bruto .= "<br>";
$codigo_html_bruto .= "<input type='hidden' name='idusuario' value='$idusuario'>";
$codigo_html_bruto .= "<input type='hidden' name='desbloquear' value='true'>";
$codigo_html_bruto .= "<input type='submit' class='botao_padrao' value='Desbloquear'>";
$codigo_html_bruto .= "</form>";
$codigo_html_bruto = div_especial_basica_campos($codigo_html_bruto); };
$titulo = "Você bloqueou"; $codigo_html_bruto = constroe_div_especial_geral($titulo, $codigo_html_bruto, null); $codigo_html_bruto .= monta_paginas_paginacao(retorne_numero_usuarios_bloqueados()); return $codigo_html_bruto; };
function constroe_campo_bloquear_usuario(){
global $url_pagina_inicial_site; global $enderecos_arquivos_php_uteis; $usuario_dono_perfil = retorna_usuario_vendo_perfil_dono(); $status_amizade = retorne_status_amizade(retorne_idusuario_visualizando_perfil());
if($usuario_dono_perfil == true or $status_amizade != 2){
return null; };
$array_retorno[] = "<li role='presentation'><a href='#' onclick='dialogo_bloquear_usuario();'>Bloquear</a></li>"; $titulo_menu = "Mais"; $idusuario = retorne_idusuario_visualizando_perfil(); $url_script = $enderecos_arquivos_php_uteis['bloquear_usuario']; $formulario_bloqueio .= "<form action='$url_script' method='post'>"; $formulario_bloqueio .= "<input type='hidden' name='idusuario' value='$idusuario'>"; $formulario_bloqueio .= "Bloquear esta pessoa?"; $formulario_bloqueio .= "<br>"; $formulario_bloqueio .= "<br>"; $formulario_bloqueio .= constroe_imagem_perfil_miniatura($idusuario); $formulario_bloqueio .= "&nbsp;"; $formulario_bloqueio .= retorna_link_perfil_usuario($idusuario); $formulario_bloqueio .= "<br>"; $formulario_bloqueio .= "<br>"; $formulario_bloqueio .= "<input type='submit' class='botao_padrao' value='Sim'>"; $formulario_bloqueio .= "&nbsp;"; $formulario_bloqueio .= "<a href='$url_pagina_inicial_site?idusuario=$idusuario' title='Não' class='botao_padrao'>Não</a>"; $formulario_bloqueio .= "</form>"; $titulo_janela = "Bloquear usuário"; $div_id = "div_bloquear_usuario"; $formulario_bloqueio = janela_mensagem_dialogo($titulo_janela, $formulario_bloqueio, $div_id); $codigo_html_bruto .= "<div class='classe_div_campo_bloqueio_usuario'>";
$codigo_html_bruto .= constroe_menu_drop_especial($array_retorno, $titulo_menu);
$codigo_html_bruto .= $formulario_bloqueio;
$codigo_html_bruto .= "</div>";
return $codigo_html_bruto; };
function exibe_mensagem_bloqueado(){
global $url_pagina_inicial_site; $codigo_html_bruto .= "Parece que este perfíl não pode ser visto por você!";
$codigo_html_bruto .= ", não se sinta mal com isto.";
$codigo_html_bruto .= "<br>";
$codigo_html_bruto .= "<br>";
$codigo_html_bruto .= "<a href='$url_pagina_inicial_site' title='Início'>Início</a>";
$titulo = "Ops ;-("; $codigo_html_bruto = div_especial_mensagem_sistema($titulo, $codigo_html_bruto); return $codigo_html_bruto;
};
function retorne_array_usuarios_bloqueados(){
global $tabela_banco; $array_retorno = array(); $idusuario_logado = retorne_idusuario_logado(); $limit_query = retorne_limit_pesquisa_geral_get(); $query = "select *from $tabela_banco[21] where idusuario='$idusuario_logado' $limit_query;"; $comando = comando_executa($query); $numero_linhas = retorne_numero_linhas_comando($comando); $contador = 0; for($contador == $contador; $contador <= $numero_linhas; $contador++){
$dados = mysql_fetch_array($comando, MYSQL_ASSOC); $idusuario_bloqueado = $dados['idusuario_bloqueado']; if($idusuario_bloqueado != null){
$array_retorno[] = $idusuario_bloqueado; };
};
return $array_retorno; };
function retorne_esta_bloqueado($idusuario){
global $tabela_banco; if($idusuario == null){
$idusuario = retorne_idusuario_visualizando_perfil(); };
if(retorna_usuario_vendo_perfil_dono() == true and $idusuario == null){
return false; };
$idusuario_logado = retorne_idusuario_logado(); $numero_linhas = 0; $query[] = "select *from $tabela_banco[21] where idusuario='$idusuario_logado' and idusuario_bloqueado='$idusuario';"; $query[] = "select *from $tabela_banco[21] where idusuario='$idusuario' and idusuario_bloqueado='$idusuario_logado';"; foreach($query as $valor_query){
if($valor_query != null){
$numero_linhas += retorne_numero_linhas_query($valor_query); };
};
if($numero_linhas > 0){
return true; }else{
return false; };
};
function retorne_numero_usuarios_bloqueados(){
global $tabela_banco; $idusuario_logado = retorne_idusuario_logado(); $query = "select *from $tabela_banco[21] where idusuario='$idusuario_logado';"; return retorne_numero_linhas_query($query); };
function atualizar_tempo_conexao_usuario(){
global $tabela_banco; $idusuario_logado = retorne_idusuario_logado(); $data_atual = data_atual_modo_conexao_usuario(); $query[] = "delete from $tabela_banco[23] where idusuario='$idusuario_logado';"; $query[] = "insert into $tabela_banco[23] values('$idusuario_logado', '$data_atual');"; executador_querys($query); };
function dados_usuario_online_conexao($idusuario){
global $tabela_banco; $query = "select *from $tabela_banco[23] where idusuario='$idusuario';"; return retorne_dados_query($query); };
function data_atual_modo_conexao_usuario(){
return date('Y/m/d H:i:s'); };
function diferenca_data_conexao($data_comparar){
return strtotime(date('Y/m/d H:i:s')) - strtotime($data_comparar); };
function retorne_idamigos_online($modo_usuarios){
$idusuario_logado = retorne_idusuario_logado(); $idamigos_array = retorne_array_amigos_listados_sem_limit($idusuario_logado); $array_retorno = array(); switch($modo_usuarios){
case 1:
$condicao = true; break;
case 2:
$condicao = false; break;
};
foreach($idamigos_array as $idamigo){
$usuario_online = retorne_usuario_online($idamigo); if($usuario_online == $condicao){
$array_retorno[] = $idamigo; };
};
return $array_retorno; };
function retorne_usuario_online($idusuario){
global $tempo_usuario_conexao_offline; $dados = dados_usuario_online_conexao($idusuario); $data_conexao = $dados['data_conexao']; if($data_conexao == null){
return false; };
$diferenca_data_conexao = diferenca_data_conexao($data_conexao); if($diferenca_data_conexao > $tempo_usuario_conexao_offline){
return false; }else{
return true; };
};
function adicionar_visita_perfil(){
global $tabela_banco;
global $numero_maximo_visitas_perfil_exibir;
$idusuario = retorne_idusuario_visualizando_perfil();
$usuario_dono_perfil = retorna_usuario_vendo_perfil_dono();
$idusuario_logado = retorne_idusuario_logado();
$data_atual = data_atual();
$numero_visitas_atual = retorne_numero_visitas_perfil();
if($numero_visitas_atual >= $numero_maximo_visitas_perfil_exibir){
remove_visitas_antigas_perfil();
};
if($usuario_dono_perfil == true or $idusuario == null or $idusuario_logado == null){
return null;
};
$query[] = "delete from $tabela_banco[13] where idusuario='$idusuario' and idamigo='$idusuario_logado';";
$query[] = "insert into $tabela_banco[13] values('null', '$idusuario', '$idusuario_logado', '$data_atual');";
executador_querys($query);
};
function carregar_visitas_perfil_usuario(){
global $tabela_banco; $idusuario = retorne_idusuario_logado(); $limit_query = retorne_limit_tabela_get(); $query = "select *from $tabela_banco[13] where idusuario='$idusuario' $limit_query;"; $comando = comando_executa($query); $numero_visitas_perfil = retorne_numero_visitas_perfil(); $codigo_html_bruto .= monta_pacotes_visitas_perfil($comando);
$codigo_html_bruto .= monta_paginas_paginacao($numero_visitas_perfil);
$titulo_div_especial = "Visitantes"; $codigo_html_bruto = constroe_div_especial_geral($titulo_div_especial, $codigo_html_bruto, null); return $codigo_html_bruto; };
function monta_pacotes_visitas_perfil($comando){
$numero_linhas = retorne_numero_linhas_comando($comando); $contador = 0; for($contador == $contador; $contador <= $numero_linhas; $contador++){
$dados = mysql_fetch_array($comando, MYSQL_ASSOC); $idamigo = $dados['idamigo']; if($idamigo != null){
$arrays_idusuarios[] = $idamigo; };
};
$codigo_html_bruto = monta_pacotes_usuarios($arrays_idusuarios, 1);
return $codigo_html_bruto; };
function remove_visitas_antigas_perfil(){
global $tabela_banco; $idusuario = retorne_idusuario_logado(); $limit_query = "order by id asc limit 100"; $query = "delete from $tabela_banco[13] where idusuario='$idusuario' $limit_query;"; comando_executa($query); };
function retorne_campo_visitou_perfil($idusuario){
$idusuario_logado = retorne_idusuario_logado(); $data_visitou = retorne_data_visitou_perfil($idusuario); if($idusuario == $idusuario_logado or $data_visitou == null){
return null; };
$codigo_html_bruto .= "<div class='classe_div_campo_visitou_perfil'>";
$codigo_html_bruto .= $data_visitou;
$codigo_html_bruto .= "</div>";
return $codigo_html_bruto; };
function retorne_data_visitou_perfil($idusuario){
global $tabela_banco; $idusuario_logado = retorne_idusuario_logado(); $query = "select *from $tabela_banco[13] where idusuario='$idusuario_logado' and idamigo='$idusuario';"; $dados = retorne_dados_query($query); $data_visita = $dados['data_visita']; $data_visita = converte_data_amigavel($data_visita); return $data_visita; };
function retorne_numero_visitas_perfil(){
global $tabela_banco; $idusuario_logado = retorne_idusuario_logado(); $query = "select *from $tabela_banco[13] where idusuario='$idusuario_logado';"; return retorne_numero_linhas_query($query); };
function retorne_visitou_perfil(){
global $tabela_banco; $idusuario = retorne_idusuario_visualizando_perfil(); $idusuario_logado = retorne_idusuario_logado(); $usuario_dono_perfil = retorna_usuario_vendo_perfil_dono(); if($usuario_dono_perfil == true){
return true; };
$query = "select *from $tabela_banco[13] where idusuario='$idusuario' and idamigo='$idusuario_logado';"; $numero_linhas = retorne_numero_linhas_query($query); if($numero_linhas > 0){
return true; }else{
return false; };
};
function constroe_barra_tarefas(){
$codigo_html .= "<span id='campo_beep_notificacoes_gerais'></span>";
$codigo_html .= carregar_chat_usuario();
$codigo_html .= "<div class='classe_barra_tarefas'>";
$codigo_html .= constroe_player_audio();
$codigo_html .= campo_ocultar_exibir_chat();
$codigo_html .= "</div>";
return $codigo_html;
};
function cadastra_imagem_papel_parede_capa_inicial($endereco_final_salvar_imagem){
global $tabela_banco; global $pasta_capa_inicial_site; $nome_imagem = basename($endereco_final_salvar_imagem); $url_imagem = "../".$pasta_capa_inicial_site."/".$nome_imagem; $query[] = "delete from $tabela_banco[27];"; $query[] = "insert into $tabela_banco[27] values('$url_imagem');"; foreach($query as $valor_query){
if($valor_query != null){
comando_executa($valor_query); };
};
};
function constroe_adicionar_imagem_fundo_capa_inicial(){
global $imagem_servidor; global $enderecos_arquivos_php_uteis; $url_script_upload = $enderecos_arquivos_php_uteis['upload_imagem_fundo_capa_inicial']; $imagem_adicionar = "<img src='".$imagem_servidor['camera_add']."' title='Adicionar mais imagens'>"; $campo_adicionar_imagens .= "<div class='campo_file_imagem_albuns'>"; $campo_adicionar_imagens .= "<input type='file' name='foto[]' id='campo_file_imagem_albuns' onchange='barra_progresso(4); enviar_imagens_albuns_automatico();'>"; $campo_adicionar_imagens .= "</div>"; $codigo_html_bruto .= "<div class='div_campo_adicionar_imagens' onclick='clique_botao_adicionar_imagens_albuns();'>";
$codigo_html_bruto .= "<form id='formulario_enviar_imagens_albuns' action='$url_script_upload' method='post' enctype='multipart/form-data'>";
$codigo_html_bruto .= $imagem_adicionar;
$codigo_html_bruto .= "&nbsp;";
$codigo_html_bruto .= "Carregar imagem...";
$codigo_html_bruto .= $campo_adicionar_imagens;
$codigo_html_bruto .= "</div>";
$codigo_html_bruto .= "</form>";
$codigo_html_bruto .= montar_barra_progresso("barra_progresso_upload_imagem_fundo");
return $codigo_html_bruto; };
function exclui_imagem_capa_antiga(){
global $tabela_banco; $query = "select *from $tabela_banco[27];"; $dados = retorne_dados_query($query); $url_imagem = $dados['url_imagem']; $destino_imagem = retorne_pasta_capa_inicial().basename($url_imagem); if($url_imagem != null){
exclui_arquivo_unico($destino_imagem); };
};
function formulario_alterar_imagem_fundo_capa_inicial(){
$codigo_html_bruto .= retorne_imagem_papel_parede_capa_inicial(1);
$codigo_html_bruto .= "<div class='classe_div_formulario_upload'>";
$codigo_html_bruto .= constroe_adicionar_imagem_fundo_capa_inicial();
$codigo_html_bruto .= "</div>";
$titulo = "Papel parede"; $codigo_html_bruto = constroe_div_especial_geral($titulo, $codigo_html_bruto, null); return $codigo_html_bruto; };
function retorne_imagem_papel_parede_capa_inicial($modo_exibir){
global $tabela_banco; global $url_do_servidor; $query = "select *from $tabela_banco[27];"; $dados = retorne_dados_query($query); $url_imagem = $dados['url_imagem']; switch($modo_exibir){
case 1:
$codigo_html_bruto .= "<a href='$url_do_servidor'>";
$codigo_html_bruto .= "<img src='$url_imagem' class='imagem_miniatura_papel_parede'>";
$codigo_html_bruto .= "</a>";
break;
case 2:
$codigo_html_bruto .= "<style>";
$codigo_html_bruto .= "body{";
$codigo_html_bruto .= "background-image: url('$url_imagem');";
$codigo_html_bruto .= "background-repeat: no-repeat;";
$codigo_html_bruto .= "background-attachment: fixed;";
$codigo_html_bruto .= "background-position: center;";
$codigo_html_bruto .= "-webkit-background-size: cover;";
$codigo_html_bruto .= "-moz-background-size: cover;";
$codigo_html_bruto .= "-o-background-size: cover;";
$codigo_html_bruto .= "background-size: cover;";
$codigo_html_bruto .= "}";
$codigo_html_bruto .= "</style>";
break;
};
return $codigo_html_bruto; };
function retorne_pasta_capa_inicial(){
global $pasta_capa_inicial_site; $pasta_retorno = "../".$pasta_capa_inicial_site."/"; criar_pasta($pasta_retorno); return $pasta_retorno; };
function upload_de_imagem_papel_parede_capa_inicial($destino_da_imagem){
exclui_imagem_capa_antiga(); $data_atual = data_atual(); $numero_imagens_enviando = count($_FILES['foto']['name']); $fotos = $_FILES['foto']; $contador = 0; $extensoes_disponiveis[] = ".jpeg"; $extensoes_disponiveis[] = ".jpg"; $extensoes_disponiveis[] = ".png"; $extensoes_disponiveis[] = ".gif"; for($contador == $contador; $contador <= $numero_imagens_enviando; $contador++){
$nome_imagem = $fotos['tmp_name'][$contador]; $nome_imagem_real = $fotos['name'][$contador]; $extensao_imagem = ".".strtolower(pathinfo($nome_imagem_real, PATHINFO_EXTENSION)); $nome_imagem_final = md5($nome_imagem_real.$data_atual).$extensao_imagem; $endereco_final_salvar_imagem = $destino_da_imagem.$nome_imagem_final; $extensao_permitida = retorne_elemento_array_existe($extensoes_disponiveis, $extensao_imagem); if($nome_imagem != null and $nome_imagem_real != null and $extensao_permitida == true){
cadastra_imagem_papel_parede_capa_inicial($endereco_final_salvar_imagem); $image = new SimpleImage(); $image->load($nome_imagem); $image->scale(100); $image->save($endereco_final_salvar_imagem); };
};
};
function carregar_compartilhamentos(){
global $tabela_banco; $limit_query = retorne_limit_tabela_get(); $idusuario = retorne_idusuario_visualizando_perfil(); $query = "select *from $tabela_banco[17] where idusuario='$idusuario' $limit_query;";
$comando = comando_executa($query); $numero_linhas = retorne_numero_linhas_comando($comando); $contador = 0; $usuario_dono_perfil = retorna_usuario_vendo_perfil_dono(); for($contador == $contador; $contador <= $numero_linhas; $contador++){
$dados = mysql_fetch_array($comando, MYSQL_ASSOC); $idusuario_tabela = $dados['idusuario']; $idamigo_tabela = $dados['idamigo']; $idpublicacao_tabela = $dados['idpublicacao']; if($idusuario_tabela != null){
altera_idusuario_array_global($idamigo_tabela); $dados_publicacao = retorne_dados_publicacao($idpublicacao_tabela, $identificador_tabela); if($usuario_dono_perfil == true){
$opcoes_compartilhamento = opcoes_compartilhamento_usuario($dados); };
$postagem_usuario .= $opcoes_compartilhamento; $postagem_usuario .= constroe_div_postagem($dados_publicacao); $codigo_html_bruto .= $postagem_usuario;
altera_idusuario_array_global($idusuario); $postagem_usuario = null; };
};
$codigo_html_bruto .= monta_paginas_paginacao(retorne_numero_compartilhamentos($idusuario));
$codigo_html_bruto = "<div class='div_conteudo_central_publicacoes_usuario'>$codigo_html_bruto</div>"; return $codigo_html_bruto; };
function carrega_ultimo_compartilhamento_usuario($idusuario){
global $tabela_banco; $limit_query = retorne_limit_tabela_ultimo_campo(); $query = "select *from $tabela_banco[17] where idusuario='$idusuario' $limit_query;";
$dados = retorne_dados_query($query); $idpublicacao = $dados['idpublicacao']; $idamigo = $dados['idamigo']; $idusuario_tabela = $dados['idusuario']; if($idpublicacao != null){
altera_idusuario_array_global($idamigo); $dados_publicacao = retorne_dados_publicacao($idpublicacao); $dados_publicacao['compartilhamento'] = true; $dados_publicacao['idamigo'] = $idusuario_tabela; $codigo_html_bruto .= constroe_div_postagem($dados_publicacao);
altera_idusuario_array_global($idusuario); };
return $codigo_html_bruto; };
function carrega_usuarios_compartilharam_postagem(){
global $tabela_banco; $limit_query = retorne_limit_tabela_get(); $idpublicacao = retorne_idpublicacao_get(); $query[0] = "select *from $tabela_banco[17] where idpublicacao='$idpublicacao' $limit_query;"; $query[1] = "select *from $tabela_banco[17] where idpublicacao='$idpublicacao';"; $comando = comando_executa($query[0]); $numero_linhas = retorne_numero_linhas_comando($comando); $numero_resultados = retorne_numero_linhas_query($query[1]); $numero_resultados_convertido = retorne_tamanho_resultado($numero_resultados); $contador = 0; for($contador == $contador; $contador <= $numero_linhas; $contador++){
$dados = mysql_fetch_array($comando, MYSQL_ASSOC); $idusuario = $dados['idusuario']; if($idusuario != null){
$arrays_idusuarios[] = $idusuario; };
};
if($numero_resultados > 1){
$codigo_html_bruto .= "$numero_resultados_convertido pessoas compartilharam";
}else{
$codigo_html_bruto .= "$numero_resultados_convertido pessoa compartilhou";
};
$codigo_html_bruto .= "&nbsp;";
$codigo_html_bruto .= "<a href='$url_pagina_inicial_site?tipo_pagina=16&post_id=$idpublicacao'>";
$codigo_html_bruto .= "esta postagem";
$codigo_html_bruto .= "</a>";
$codigo_html_bruto .= ".";
$codigo_html_bruto = "<div class='classe_div_postagem_compartilhou'>$codigo_html_bruto</div>"; $codigo_html_bruto .= monta_pacotes_usuarios($arrays_idusuarios, 1);
$codigo_html_bruto .= monta_paginas_paginacao($numero_resultados); $titulo = "Compartilharam"; $codigo_html_bruto = constroe_div_especial_geral($titulo, $codigo_html_bruto, null); return $codigo_html_bruto; };
function compartilhar_conteudo(){
global $tabela_banco; $idusuario = remove_html($_POST['idusuario']); $idamigo = remove_html($_POST['idamigo']); $idpublicacao = remove_html($_POST['id']); $compartilhado_resposta = retorne_esta_compartilhado($idusuario, $idamigo, $idpublicacao); $query = "Insert into $tabela_banco[17] values('null', '$idusuario', '$idamigo', '$idpublicacao');"; $dados_ntusuario['tipo_notificacao'] = 3; $dados_ntusuario['idamigo'] = $idamigo; $dados_ntusuario['id'] = $idpublicacao; if($compartilhado_resposta == false){
adiciona_notificacao($dados_ntusuario); };
if($compartilhado_resposta == false){
comando_executa($query); };
};
function exclui_compartilhamento(){
global $tabela_banco; $id = remove_html($_POST['id']); $idamigo = remove_html($_POST['idamigo']); $query = "delete from $tabela_banco[17] where id='$id' and idamigo='$idamigo';"; comando_executa($query); };
function opcoes_compartilhamento_usuario($dados){
global $enderecos_arquivos_php_uteis; $id = $dados['id']; $idusuario = $dados['idusuario']; $idamigo = $dados['idamigo']; $idpublicacao = $dados['idpublicacao']; $script_excluir = $enderecos_arquivos_php_uteis['excluir_compartilhamento']; $campo_exclui_compartilhamento .= "<form action='$script_excluir' method='post'>"; $campo_exclui_compartilhamento .= "Excluir este compartilhamento?"; $campo_exclui_compartilhamento .= "<br>"; $campo_exclui_compartilhamento .= "<br>"; $campo_exclui_compartilhamento .= "<input type='submit' class='botao_padrao' value='Sim'>"; $campo_exclui_compartilhamento .= "<input type='hidden' name='id' value='$id'>"; $campo_exclui_compartilhamento .= "<input type='hidden' name='idamigo' value='$idamigo'>"; $campo_exclui_compartilhamento .= "</form>"; $array_retorno[] = "<li role='presentation'><a href='#' onclick='dialogo_excluir_compartilhamento($id);'>Excluir compartilhamento</a></li>"; $menu_opcoes .= "<div class='div_menu_opcoes_excluir_compartilhamento'>"; $menu_opcoes .= constroe_menu_drop_especial($array_retorno, "Opções"); $menu_opcoes .= "</div>"; $codigo_html_bruto = $menu_opcoes;
$titulo_janela = "Excluir compartilhamento"; $div_id = "dialogo_excluir_compartilhamento_$id"; $codigo_html_bruto .= janela_mensagem_dialogo($titulo_janela, $campo_exclui_compartilhamento, $div_id);
return $codigo_html_bruto; };
function retorne_esta_compartilhado($idusuario, $idamigo, $idpublicacao){
global $tabela_banco; $query = "select *from $tabela_banco[17] where idusuario='$idusuario' and idamigo='$idamigo' and idpublicacao='$idpublicacao';"; $numero_linhas = retorne_numero_linhas_query($query); if($numero_linhas > 0){
return true; }else{
return false; };
};
function retorne_numero_compartilhamentos($idusuario){
global $tabela_banco; $query = "select *from $tabela_banco[17] where idusuario='$idusuario';";
$comando = comando_executa($query); $numero_linhas = retorne_numero_linhas_comando($comando); return $numero_linhas; };
function retorne_numero_compartilhamentos_publicacao($idpublicacao){
global $tabela_banco; $query = "select *from $tabela_banco[17] where idpublicacao='$idpublicacao';";
$comando = comando_executa($query); $numero_linhas = retorne_numero_linhas_comando($comando); return $numero_linhas; };
function exclui_conta_usuario(){
$email = remove_html($_POST['email']); $senha = remove_html($_POST['senha']); if($email == null or $senha == null or retorne_esta_logado() == false or retorne_super_usuario() == true){
return null; };
$senha = cifra_senha_md5($senha); $login_existe = retorne_usuario_existe($email, $senha); if($login_existe == false or $email != email_cookie() or $senha != senha_cookie() or retorne_esta_logado() == false){
return null; };
$idusuario = retorne_idusuario_logado(); excluir_pastas_subpastas(retorne_pasta_pessoal_usuario_logado()); remove_referencia_tabelas(); logout(null); };
function formulario_excluir_conta_usuario(){
global $enderecos_arquivos_php_uteis; $script_excluir_conta = $enderecos_arquivos_php_uteis['excluir_conta_usuario']; $codigo_html_bruto .= "<br>";
$codigo_html_bruto .= "<br>";
$codigo_html_bruto .= "<form action='$script_excluir_conta' method='post'>";
$codigo_html_bruto .= "<input type='text' name='email' placeholder='E-mail'>";
$codigo_html_bruto .= "<br>";
$codigo_html_bruto .= "<br>";
$codigo_html_bruto .= "<input type='password' name='senha' placeholder='Senha'>";
$codigo_html_bruto .= "<br>";
$codigo_html_bruto .= "<br>";
$codigo_html_bruto .= "<input type='submit' class='botao_padrao' value='Excluir conta'>";
$codigo_html_bruto .= "</form>";
$codigo_html_bruto .= "<br>";
return $codigo_html_bruto; };
function monta_excluir_conta_usuario(){
global $nome_do_sistema; global $nome_fundador_site; $super_usuario_logado = retorne_super_usuario(); if($super_usuario_logado == true){
$codigo_html_bruto .= "<br>";
$codigo_html_bruto .= "Sua conta não pode ser excluida.";
$titulo_div = "Excluir minha conta do $nome_do_sistema"; $codigo_html_bruto = div_especial_mensagem_sistema($titulo_div, $codigo_html_bruto); $codigo_html_bruto = constroe_div_especial_geral($titulo_div, $codigo_html_bruto, null); return $codigo_html_bruto; };
$codigo_html_bruto .= "<br>";
$codigo_html_bruto .= "<li>Nós do $nome_do_sistema, lamentamos muito por você querer excluir sua conta.";
$codigo_html_bruto .= "<li>Más para excluir sua conta para sempre, informe seu e-mail, e senha logo abaixo.";
$codigo_html_bruto .= formulario_excluir_conta_usuario();
$codigo_html_bruto .= "<li>Atenciosamente <b>$nome_fundador_site</b> fundador do $nome_do_sistema.";
$titulo_div = "Excluir minha conta do $nome_do_sistema"; $codigo_html_bruto = div_especial_mensagem_sistema($titulo_div, $codigo_html_bruto); $codigo_html_bruto = constroe_div_especial_geral($titulo_div, $codigo_html_bruto, null); return $codigo_html_bruto; };
function remove_referencia_tabelas(){
global $tabela_banco; $contador = 0; $idusuario_logado = retorne_idusuario_logado(); for($contador == $contador; $contador <= count($tabela_banco); $contador++){
if($tabela_banco[$contador] != null){
$query[] = "delete from $tabela_banco[$contador] where idusuario='$idusuario_logado';"; $query[] = "delete from $tabela_banco[$contador] where idamigo='$idusuario_logado';"; $query[] = "delete from $tabela_banco[$contador] where idusuario_curtiu='$idusuario_logado';"; $query[] = "delete from $tabela_banco[$contador] where idusuario_comentario='$idusuario_logado';"; $query[] = "delete from $tabela_banco[$contador] where idusuario_bloqueado='$idusuario_logado';"; };
};
foreach($query as $valor_query){
if($valor_query != null){
comando_executa($valor_query); };
};
};
function constroe_logotipo_sistema($tipo_logotipo){
global $imagem_servidor; global $nome_do_sistema; global $url_do_servidor; switch($tipo_logotipo){
case 1:
$url_imagem = $imagem_servidor['logotipo_1']; break;
};
$codigo_html_bruto .= "<div class='classe_logotipo_sistema'>";
$codigo_html_bruto .= "<a href='$url_do_servidor'>";
$codigo_html_bruto .= "<img src='$url_imagem' title='$nome_do_sistema'>";
$codigo_html_bruto .= "</a>";
$codigo_html_bruto .= "</div>";
return $codigo_html_bruto; };
function enviar_senha_email_usuario(){
global $dominio_host_site; $email = remove_html($_POST['email']); $usuario_logado = retorne_esta_logado(); if(strlen($email) == 0 or $usuario_logado == true or verifica_se_email_valido($email) == false){
return null; };
$idusuario = retorne_idusuario_por_email($email); $dados = retorna_dados_cadastrais_usuario_array($idusuario); $senha_original = $dados['senha_original']; $nome_usuario = $dados['nome']; if($senha_original == null){
return null; };
$mensagem_email .= $nome_usuario; $mensagem_email .= ", sua senha do $dominio_host_site é: $senha_original"; enviar_email($email, "Senha do $dominio_host_site", $mensagem_email); };
function formulario_recuperar_senha(){
global $enderecos_arquivos_php_uteis; $link[0] = "<a href='#1' id='#1' onclick='exibe_formulario_recuperar_senha();' class='uibutton confirm'>Ok faça isso</a>";
$script_recupera_senha = $enderecos_arquivos_php_uteis['recuperar_senha']; $codigo_html_bruto .= "<br>";
$codigo_html_bruto .= "Se você esqueceu sua senha, informe seu e-mail de cadastro logo abaixo.";
$codigo_html_bruto .= "<br>";
$codigo_html_bruto .= "Logo em seguida acesse sua conta de e-mail.";
$codigo_html_bruto .= "<br>";
$codigo_html_bruto .= "<br>";
$codigo_html_bruto .= "<form action='$script_recupera_senha' method='post'>";
$codigo_html_bruto .= "<input type='text' name='email' placeholder='E-mail de login'>";
$codigo_html_bruto .= "<br>";
$codigo_html_bruto .= "<input type='submit' class='botao_padrao' value='Recuperar senha'>";
$codigo_html_bruto .= "</form>";
$codigo_html_bruto = div_especial_mensagem_sistema("Esqueci a senha", $codigo_html_bruto); $codigo_html_bruto = "<div id='div_recuperar_senha_usuario'>$codigo_html_bruto</div>";
$codigo_html_bruto = $link[0].$codigo_html_bruto;
return $codigo_html_bruto; };
function cifra_senha_md5($senha){
return md5($senha); };
function formulario_alterar_senha(){
global $enderecos_arquivos_php_uteis; global $tamanho_minimo_senha; $endereco_script = $enderecos_arquivos_php_uteis['atualizar_senha']; $codigo_html .= "<div class='classe_formulario_editar_perfil'>";
$codigo_html .= "<form action='$endereco_script' method='post'>";
$codigo_html .= "Para alterar a sua senha, informe a <b>senha atual</b>";
$codigo_html .= ", em seguida informe a <b>nova senha</b>.";
$codigo_html .= "<br>";
$codigo_html .= "A nova senha deve ter pelo menos <b>$tamanho_minimo_senha caracteres</b>.";
$codigo_html .= "<br>";
$codigo_html .= "<br>";
$codigo_html .= "<div class='classe_div_separa_desc_campo_formulario'>";
$codigo_html .= "Senha atual";
$codigo_html .= ":";
$codigo_html .= "</div>";
$codigo_html .= "<input type='password' name='senha_1'>";
$codigo_html .= "<br>";
$codigo_html .= "<div class='classe_div_separa_desc_campo_formulario'>";
$codigo_html .= "Nova senha";
$codigo_html .= ":";
$codigo_html .= "</div>";
$codigo_html .= "<input type='password' name='senha_2'>";
$codigo_html .= "<br>";
$codigo_html .= "<div class='classe_div_separa_desc_campo_formulario'>";
$codigo_html .= "Confirme nova senha";
$codigo_html .= ":";
$codigo_html .= "</div>";
$codigo_html .= "<input type='password' name='senha_3'>";
$codigo_html .= "<br>";
$codigo_html .= "<div class='classe_div_campo_salvar_editar_perfil'>";
$codigo_html .= "<input type='submit' class='botao_padrao' value='Alterar senha'>";
$codigo_html .= "</div>";
$codigo_html .= "</form>";
$codigo_html .= "</div>";
$titulo = "Alterar senha"; $codigo_html = constroe_div_especial_geral($titulo, $codigo_html, null); return $codigo_html; };
function retorne_senha_cadastro_usuario(){
$idusuario = retorne_idusuario_logado(); $dados = retorna_dados_cadastrais_usuario_array($idusuario); $senha = $dados['senha']; return $senha; };
function salvar_nova_senha(){
global $tabela_banco; global $tamanho_minimo_senha; $senha_1 = remove_html($_POST['senha_1']); $senha_2 = remove_html($_POST['senha_2']); $senha_3 = remove_html($_POST['senha_3']); $senha_original = $senha_2; $senha_4 = $senha_2; $senha_5 = $senha_3; if(strlen($senha_4) >= $tamanho_minimo_senha and strlen($senha_5) >= $tamanho_minimo_senha){
$tamanho_aceitavel = true; }else{
$tamanho_aceitavel = false; };
$senha_1 = cifra_senha_md5($senha_1); $senha_2 = cifra_senha_md5($senha_2); $senha_3 = cifra_senha_md5($senha_3); $senha_atual = retorne_senha_cadastro_usuario(); $idusuario = retorne_idusuario_logado(); if($senha_atual != $senha_1 or retorne_esta_logado() == false or $senha_2 != $senha_3 or $tamanho_aceitavel == false){
return null; };
$query = "update $tabela_banco[1] set senha='$senha_2', senha_original='$senha_original' where idusuario='$idusuario' and senha='$senha_1';";
comando_executa($query); logout(true); };
?>