<?php
function atualizar_conteudo_ajuda(){
global $tabela_banco; if(retorne_super_usuario() == false){
return null; };
$topico_id = topico_pagina_ajuda_get(); $descricao_imagem = remove_html($_POST['descricao_imagem']); $imagem_id = remove_html($_POST['imagem_id']); $url_imagem = remove_html($_POST['url_imagem']); $excluir_imagem = remove_html($_POST['excluir_imagem']); if($excluir_imagem == true){
$query = "delete from $tabela_banco[26] where id='$imagem_id';"; }else{
$query = "update $tabela_banco[26] set descricao_imagem='$descricao_imagem' where id='$imagem_id';"; };
comando_executa($query); if($excluir_imagem == true){
$url_imagem = "../".$url_imagem; exclui_arquivo_unico($url_imagem); return null; };
$tamanho_arquivo_imagem = $_FILES['foto']['size']; if($tamanho_arquivo_imagem == 0){
return null; };
$endereco_imagem_remover = "../".$url_imagem; exclui_arquivo_unico($endereco_imagem_remover); $pasta_upload = retorne_pasta_upload_albuns_imagens_ajuda(); $url_imagem = upload_imagem_unica($pasta_upload, 100, retorne_pasta_imagem_album_ajuda(), true); $query = "update $tabela_banco[26] set url_imagem='$url_imagem' where id='$imagem_id';"; comando_executa($query); };
function cadastra_imagem_album_ajuda($url_imagem, $idalbum_imagens){
global $tabela_banco; $idusuario_logado = retorne_idusuario_logado(); $nome_imagem = basename($url_imagem); $url_imagem = retorne_pasta_imagem_album_ajuda().$nome_imagem; $query = "insert into $tabela_banco[26] values(null, '$url_imagem', '$idalbum_imagens', '');"; $comando = comando_executa($query); };
function campo_excluir_conteudo_ajuda($dados){
global $enderecos_arquivos_php_uteis; $super_usuario = retorne_super_usuario(); if($super_usuario == false){
return null; };
$id = $dados['id']; $titulo_post = $dados['titulo_post']; $idalbum_imagens = $dados['idalbum_imagens']; $script_excluir_topico = $enderecos_arquivos_php_uteis['excluir_topico_ajuda']; $campo_excluir .= "<form action='$script_excluir_topico' method='post'>"; $campo_excluir .= "Deseja mesmo excluir o tópico $id?"; $campo_excluir .= "<br>"; $campo_excluir .= "<br>"; $campo_excluir .= "<font size='4'>"; $campo_excluir .= $titulo_post; $campo_excluir .= "</font>"; $campo_excluir .= "<br>"; $campo_excluir .= "<br>"; $campo_excluir .= "<input type='hidden' name='topico_id' value='$id'>"; $campo_excluir .= "<input type='hidden' name='idalbum_imagens' value='$idalbum_imagens'>"; $campo_excluir .= "<input type='submit' class='uibutton large confirm' value='Excluir'>"; $campo_excluir .= "</form>"; $campo_excluir = janela_mensagem_dialogo("Excluir tópico", $campo_excluir, "div_janela_excluir_topico_ajuda"); $opcoes_menu[] = "<li role='presentation'><a href='#1' id='#1' onclick='dialogo_janela_excluir_topico_ajuda();'>Excluir</a></li>"; $codigo_html_bruto .= "<br>"; $codigo_html_bruto .= constroe_menu_drop_especial($opcoes_menu, "Excluir tópico"); $codigo_html_bruto = div_especial_mensagem_sistema("Excluir tópico", $codigo_html_bruto); $codigo_html_bruto .= $campo_excluir; $codigo_html_bruto .= "<br>"; return $codigo_html_bruto; };
function campo_opcoes_imagem_ajuda($dados, $topico_id){
global $enderecos_arquivos_php_uteis; $id = $dados['id']; $url_imagem = $dados['url_imagem']; $idalbum_imagens = $dados['idalbum_imagens']; $descricao_imagem = $dados['descricao_imagem']; $url_script_salvar = $enderecos_arquivos_php_uteis['atualizar_conteudo_ajuda']; $super_usuario = retorne_super_usuario(); $campo_excluir_imagem .= "<input type='checkbox' name='excluir_imagem' value='1'>"; $campo_excluir_imagem .= "&nbsp;"; $campo_excluir_imagem .= "Excluir esta imagem"; $campo_excluir_imagem = div_especial_mensagem_sistema("Excluir imagem", $campo_excluir_imagem); if($super_usuario == true){
$codigo_html_bruto .= "<div class='classe_div_opcoes_imagem_ajuda'>"; $codigo_html_bruto .= "<form action='$url_script_salvar' method='post' enctype='multipart/form-data'>"; $codigo_html_bruto .= "<textarea cols='25' rows='3' placeholder='Descrição da imagem' name='descricao_imagem'>$descricao_imagem</textarea>"; $codigo_html_bruto .= "<br>"; $codigo_html_bruto .= $campo_excluir_imagem; $codigo_html_bruto .= "<br>"; $codigo_html_bruto .= "<input type='hidden' name='topico_id' value='$topico_id'>"; $codigo_html_bruto .= "<input type='hidden' name='imagem_id' value='$id'>"; $codigo_html_bruto .= "<input type='hidden' name='url_imagem' value='$url_imagem'>"; $codigo_html_bruto .= "<input type='file' name='foto'>"; $codigo_html_bruto .= "<br>"; $codigo_html_bruto .= "<input type='submit' class='uibutton large confirm' value='Salvar'>"; $codigo_html_bruto .= "</form>"; $codigo_html_bruto .= "</div>"; }else{
$codigo_html_bruto .= "<div class='classe_div_opcoes_imagem_ajuda'>"; $codigo_html_bruto .= $descricao_imagem; $codigo_html_bruto .= "</div>"; };
return $codigo_html_bruto; };
function campo_pesquisa_ajuda(){
global $url_pagina_inicial_ajuda; $pesquisa_generica = retorne_termo_pesquisa(); $codigo_html_bruto .= "<form action='$url_pagina_inicial_ajuda' method='get'>"; $codigo_html_bruto .= "<input type='text' name='pesquisa_generica' class='campo_entrada_pesquisa_ajuda' value='$pesquisa_generica' placeholder='Pesquisar ajuda'>"; $codigo_html_bruto .= "<br>"; $codigo_html_bruto .= "<input type='submit' class='uibutton' value='Pesquisar'>"; $codigo_html_bruto .= "</form>"; $codigo_html_bruto = div_especial_basica_campos($codigo_html_bruto); return $codigo_html_bruto; };
function campo_publicar_ajuda(){
global $enderecos_arquivos_php_uteis; if(retorne_super_usuario() == false){
return null; };
$topico_id = topico_pagina_ajuda_get(); $dados_publicacao = retorne_dados_publicacao_ajuda($topico_id); $titulo_post = $dados_publicacao['titulo_post']; $conteudo_post = $dados_publicacao['conteudo_post']; $url_publicacao_conteudo = $enderecos_arquivos_php_uteis['publicar_ajuda']; $campo_adicionar_imagens = "<input type='file' name='foto[]' id='campo_file_upload_postagem' onchange='publicacao_imagens_selecionadas();' multiple>"; $campo_exibe_imagens_upload = "<output id='output_imagens_upload_publicacao'></output>"; $idalbum_imagens = retorne_idalbum_topico_id($topico_id); if($idalbum_imagens == null){
$campo_tipo_publicacao = "<input type='hidden' name='publicar_tipo' value='1'>"; $botao_submit = "<input type='submit' class='uibutton large confirm' value='Publicar'>"; }else{
$campo_tipo_publicacao = "<input type='hidden' name='publicar_tipo' value='0'>"; $botao_submit = "<input type='submit' class='uibutton large confirm' value='Atualizar'>"; };
$codigo_html_bruto .= "<div class='div_campo_publicar'>"; $codigo_html_bruto .= "<form action='$url_publicacao_conteudo' method='post' enctype='multipart/form-data' id='formulario_publica_conteudo_geral'>"; $codigo_html_bruto .= "<input type='text' name='titulo' placeholder='Título da ajuda' value='$titulo_post'>"; $codigo_html_bruto .= "<br>"; $codigo_html_bruto .= "<textarea cols='100' rows='10' name='campo_publicar' class='textarea_campo_publicar' placeholder='Conteúdo da ajuda' id='campo_entrada_publicar_conteudo_geral'>$conteudo_post</textarea>"; $codigo_html_bruto .= "<br>"; $codigo_html_bruto .= campo_select_tipo_ajuda($dados_publicacao); $codigo_html_bruto .= "<input type='button' value='Imagens' class='uibutton large confirm' onclick='clique_botao_adicionar_imagens_publicacao();'>"; $codigo_html_bruto .= "&nbsp;"; $codigo_html_bruto .= $botao_submit; $codigo_html_bruto .= $campo_tipo_publicacao; $codigo_html_bruto .= "<input type='hidden' name='idalbum_imagens' value='$idalbum_imagens'>"; $codigo_html_bruto .= "<input type='hidden' name='topico_id' value='$topico_id'>"; $codigo_html_bruto .= montar_barra_progresso("barra_progresso_postagem_conteudo"); $codigo_html_bruto .= $campo_adicionar_imagens; $codigo_html_bruto .= "</form>"; $codigo_html_bruto .= "</div>"; $codigo_html_bruto .= $campo_exibe_imagens_upload; return $codigo_html_bruto; };
function campo_select_tipo_ajuda($dados){
$tipo_ajuda = $dados['tipo_ajuda']; if($tipo_ajuda == null){
$tipo_ajuda = 1; };
if($tipo_ajuda == 1){
$opcao_atual = "<option value='1' selected>Ajuda</option>"; }else{
$opcao_atual = "<option value='2' selected>Documentação</option>"; };
if(retorne_tipo_pagina() == 7){
$campo_tipo_ajuda .= "<input type='hidden' name='tipo_ajuda' value='2'>"; $campo_tipo_ajuda .= "<li>Modo documentação"; }else{
$campo_tipo_ajuda .= "<select name='tipo_ajuda'>"; $campo_tipo_ajuda .= "<option value='1'>Ajuda</option>"; $campo_tipo_ajuda .= "<option value='2'>Documentação</option>"; $campo_tipo_ajuda .= $opcao_atual; $campo_tipo_ajuda .= "</select>"; };
$codigo_html_bruto .= $campo_tipo_ajuda; $codigo_html_bruto .= ""; $codigo_html_bruto = div_especial_basica_campos($codigo_html_bruto); return $codigo_html_bruto; };
function carrega_pagina_ajuda(){
global $url_pagina_inicial_ajuda; $topico_pagina_ajuda = topico_pagina_ajuda_get(); $codigo_html_bruto .= campo_publicar_ajuda(); $codigo_html_bruto .= constroe_topico_ajuda(); $codigo_html_bruto .= constroe_pagina_ajuda(); return $codigo_html_bruto; };
function constroe_imagens_ajuda($idalbum_imagens, $topico_id){
global $tabela_banco; global $url_do_servidor; $query = "select *from $tabela_banco[26] where idalbum_imagens='$idalbum_imagens';"; $comando = comando_executa($query); $contador = 0; $numero_linhas = retorne_numero_linhas_comando($comando); for($contador == $contador; $contador <= $numero_linhas; $contador++){
$dados = mysql_fetch_array($comando, MYSQL_ASSOC);
$url_imagem = $url_do_servidor."/".$dados['url_imagem']; if($dados['id'] != null){
$codigo_html_bruto .= "<img src='$url_imagem' class='classe_imagem_postagem_ajuda'>"; $codigo_html_bruto .= campo_opcoes_imagem_ajuda($dados, $topico_id); };
};
return $codigo_html_bruto; };
function constroe_pagina_ajuda(){
global $nome_do_sistema; $codigo_html_bruto .= "<div class='div_inicio_topicos_ajuda'>"; $codigo_html_bruto .= "Ajuda do $nome_do_sistema"; $codigo_html_bruto .= "</div>"; $codigo_html_bruto .= campo_pesquisa_ajuda(); $codigo_html_bruto .= constroe_topicos_ajuda(1); $codigo_html_bruto = constroe_div_especial_geral("Tópicos de ajuda", $codigo_html_bruto, null); return $codigo_html_bruto; };
function constroe_topicos_ajuda($tipo_topicos){
global $tabela_banco; $limit_query = retorne_limit_tabela_ajuda(); $pesquisa_generica = retorne_termo_pesquisa(); $super_usuario = retorne_super_usuario(); if($super_usuario == false){
$condicao_query[1] = "where tipo_ajuda='1'"; $condicao_query[2] = "and tipo_ajuda='1'"; }else{
$condicao_query[1] = null; $condicao_query[2] = null; };
switch($tipo_topicos){
case 2:
$modo_carrega_topicos = " where tipo_ajuda='2' "; break;
};
$condicao_query[1] .= $modo_carrega_topicos; $condicao_query[2] .= $modo_carrega_topicos; if($pesquisa_generica == null){
$query[0] = "select *from $tabela_banco[25] $condicao_query[1] $limit_query;"; $query[1] = "select *from $tabela_banco[25] $condicao_query[1];"; }else{
$query[0] = "select *from $tabela_banco[25] where (conteudo_post like '%$pesquisa_generica%' or titulo_post like '%$pesquisa_generica%') $condicao_query[2] $limit_query;"; $query[1] = "select *from $tabela_banco[25] where (conteudo_post like '%$pesquisa_generica%' or titulo_post like '%$pesquisa_generica%') $condicao_query[2];"; };
$comando = comando_executa($query[0]); $contador = 0; $numero_linhas = retorne_numero_linhas_comando($comando); for($contador == $contador; $contador <= $numero_linhas; $contador++){
$dados = mysql_fetch_array($comando, MYSQL_ASSOC); $id = $dados['id']; $titulo_post = $dados['titulo_post']; if($id != null){
$topicos_ajuda .= monta_link_topico($id, $titulo_post); };
};
$numero_total_topicos = retorne_numero_linhas_query($query[1]); $codigo_html_bruto .= "<div class='div_topicos_ajuda'>"; $codigo_html_bruto .= $topicos_ajuda; $codigo_html_bruto .= "</div>"; $codigo_html_bruto .= monta_paginas_paginacao_ajuda($numero_total_topicos); return $codigo_html_bruto; };
function constroe_topico_ajuda(){
global $tabela_banco; $super_usuario = retorne_super_usuario(); $topico_ajuda = topico_pagina_ajuda_get(); if($topico_ajuda == null){
return null; };
if($super_usuario == false){
$condicao_query = "and tipo_ajuda='1';"; };
$query = "select *from $tabela_banco[25] where id='$topico_ajuda' $condicao_query;"; $dados = retorne_dados_query($query); $id = $dados['id']; $titulo_post = $dados['titulo_post']; $conteudo_post = $dados['conteudo_post']; $idalbum_imagens = $dados['idalbum_imagens']; $conteudo_post = converte_urls_texto_links($conteudo_post); $conteudo_post .= constroe_imagens_ajuda($idalbum_imagens, $id); $codigo_html_bruto .= "<div class='classe_titulo_post_ajuda'>"; $codigo_html_bruto .= $titulo_post; $codigo_html_bruto .= "</div>"; $codigo_html_bruto .= "<div class='classe_corpo_post_ajuda'>"; $codigo_html_bruto .= campo_excluir_conteudo_ajuda($dados); $codigo_html_bruto .= $conteudo_post; $codigo_html_bruto .= "</div>"; $codigo_html_bruto = constroe_div_especial_geral("Tópico $id", $codigo_html_bruto, null); return $codigo_html_bruto; };
function excluir_topico_ajuda(){
global $tabela_banco; if(retorne_super_usuario() == false){
return null; };
$topico_id = topico_pagina_ajuda_get(); $idalbum_imagens = remove_html($_POST['idalbum_imagens']); $query = "select *from $tabela_banco[26] where idalbum_imagens='$idalbum_imagens';"; $contador = 0; $numero_linhas = retorne_numero_linhas_query($query); $comando = comando_executa($query); for($contador == $contador; $contador <= $numero_linhas; $contador++){
$dados = mysql_fetch_array($comando, MYSQL_ASSOC); $url_imagem = $dados['url_imagem']; if($url_imagem != null){
$url_imagem = "../$url_imagem"; exclui_arquivo_unico($url_imagem); };
};
$query = null; $query[] = "delete from $tabela_banco[25] where id='$topico_id' and idalbum_imagens='$idalbum_imagens';"; $query[] = "delete from $tabela_banco[26] where idalbum_imagens='$idalbum_imagens';"; executador_querys($query); };
function monta_link_topico($id, $titulo_topico){
global $url_pagina_inicial_ajuda; return "<a href='$url_pagina_inicial_ajuda?topico_id=$id' title='$titulo_topico' class='links_topicos_ajuda'>$titulo_topico</a>"; };
function monta_paginas_paginacao_ajuda($numero_resultados){
global $limite_resultados_pagina_ajuda; global $imagem_servidor; global $url_pagina_inicial_ajuda; $numero_pagina_atual = retorne_numero_pagina_resultado(); $numero_pagina_atual /= $limite_resultados_pagina_ajuda; $numero_pagina_atual = round($numero_pagina_atual); if($numero_pagina_atual == null){
$numero_pagina_atual = 0; };
$numero_paginas = round($numero_resultados / $limite_resultados_pagina_ajuda) + 1; $numero_paginas_real = round($numero_resultados / $limite_resultados_pagina_ajuda); @$porcentagem = ($numero_pagina_atual / $numero_paginas_real) * 100; $porcentagem = round($porcentagem); if($porcentagem > 0 and $porcentagem <= 100){
$campo_porcentagem .= "<div class='progress' id='barra_progresso_paginacao'>"; $campo_porcentagem .= " <div class='progress-bar' role='progressbar' aria-valuenow='$porcentagem' aria-valuemin='0' aria-valuemax='100' style='width: $porcentagem%;'>"; $campo_porcentagem .= "$porcentagem%"; $campo_porcentagem .= "</div>"; $campo_porcentagem .= "</div>"; };
$numero_pagina_anterior = ($numero_pagina_atual - 1) * $limite_resultados_pagina_ajuda; $numero_pagina_proxima = ($numero_pagina_atual + 1) * $limite_resultados_pagina_ajuda; $pesquisa_generica = retorne_termo_pesquisa(); $url_padrao_index = $url_pagina_inicial_ajuda."?pesquisa_generica=$pesquisa_generica"; $url_voltar = $url_padrao_index."&numero_pagina=$numero_pagina_anterior"; $url_avancar = $url_padrao_index."&numero_pagina=$numero_pagina_proxima"; if($numero_pagina_atual > 0){
$imagem_voltar = $imagem_servidor['voltar']; $imagem_voltar = "<img src='$imagem_voltar' title='Voltar' alt='Voltar'>"; $imagem_voltar = "<a href='$url_voltar'>$imagem_voltar</a>"; };
if($numero_paginas_real > $numero_pagina_atual){
$imagem_avancar = $imagem_servidor['avancar']; $imagem_avancar = "<img src='$imagem_avancar' title='Avançar' alt='Avançar'>"; $imagem_avancar = "<a href='$url_avancar'>$imagem_avancar</a>"; };
$codigo_html_bruto .= "<div class='campo_paginacao_paginas_resultados'>"; $codigo_html_bruto .= $imagem_voltar; $codigo_html_bruto .= $imagem_avancar; $codigo_html_bruto .= $campo_porcentagem; $codigo_html_bruto .= "</div>"; return $codigo_html_bruto; };
function publicar_ajuda(){
global $tabela_banco; $topico_id = topico_pagina_ajuda_get(); $titulo = remove_html($_POST['titulo']); $campo_publicar = remove_html($_POST['campo_publicar']); $tipo_ajuda = remove_html($_POST['tipo_ajuda']); $idalbum_imagens = remove_html($_POST['idalbum_imagens']); $publicar_tipo = remove_html($_POST['publicar_tipo']); $numero_imagens = retorne_numero_array_post_imagens(); if($numero_imagens == 0 and $publicar_tipo == true){
return null; };
if($titulo == null or $campo_publicar == null){
if($publicar_tipo == true){
return null; };
};
if(retorne_super_usuario() == false){
return null; };
if($idalbum_imagens == null){
$idalbum_imagens = gera_idalbum_postagem_usuario(); $_POST['idalbum_imagens'] = $idalbum_imagens; };
publica_imagens_album_postagem_ajuda($idalbum_imagens); if($publicar_tipo == true){
$query = "insert into $tabela_banco[25] values('null', '$tipo_ajuda', '$titulo', '$campo_publicar', '$idalbum_imagens');"; }else{
$query = "update $tabela_banco[25] set titulo_post='$titulo', tipo_ajuda='$tipo_ajuda', conteudo_post='$campo_publicar' where id='$topico_id';"; };
comando_executa($query); };
function publica_imagens_album_postagem_ajuda($idalbum_imagens){
global $tabela_banco; $idusuario = retorne_idusuario_logado(); $data_atual = data_atual(); $pasta_upload = retorne_pasta_upload_albuns_imagens_ajuda(); upload_de_imagem_album_ajuda($pasta_upload); };
function retorne_dados_publicacao_ajuda($topico_id){
global $tabela_banco; $query = "select *from $tabela_banco[25] where id='$topico_id';"; return retorne_dados_query($query); };
function retorne_idalbum_topico_id($topico_id){
global $tabela_banco; $query = "select *from $tabela_banco[25] where id='$topico_id';"; $dados = retorne_dados_query($query); return $dados['idalbum_imagens']; };
function retorne_pasta_imagem_album_ajuda(){
global $pasta_upload_imagens_ajuda; global $pasta_arquivos_imagem_album; $idusuario_logado = retorne_idusuario_logado(); $pasta_retorno = $pasta_upload_imagens_ajuda."/".$idusuario_logado."/"; if($idusuario_logado != null){
return $pasta_retorno; }else{
return null; };
};
function retorne_pasta_upload_albuns_imagens_ajuda(){
global $pasta_upload_imagens_ajuda; global $pasta_root_servidor; $idusuario_logado = retorne_idusuario_logado(); $pasta_retorno = $pasta_root_servidor."/".$pasta_upload_imagens_ajuda."/".$idusuario_logado."/"; if($idusuario_logado != null){
criar_pasta($pasta_retorno); return $pasta_retorno; }else{
return null; };
};
function topico_pagina_ajuda_get(){
$topico_id = $_GET['topico_id']; if($topico_id == null){
$topico_id = $_POST['topico_id']; };
$topico_id = remove_html($topico_id); return $topico_id; };
function upload_de_imagem_album_ajuda($destino_da_imagem){
global $tamanho_escala_imagem_album; $data_atual = data_atual(); $numero_imagens_enviando = count($_FILES['foto']['name']); $idalbum_imagens = $_POST['idalbum_imagens']; $fotos = $_FILES['foto']; $contador = 0; $extensoes_disponiveis[] = ".jpeg"; $extensoes_disponiveis[] = ".jpg"; $extensoes_disponiveis[] = ".png"; $extensoes_disponiveis[] = ".gif"; for($contador == $contador; $contador <= $numero_imagens_enviando; $contador++){
$nome_imagem = $fotos['tmp_name'][$contador]; $nome_imagem_real = $fotos['name'][$contador]; $extensao_imagem = ".".strtolower(pathinfo($nome_imagem_real, PATHINFO_EXTENSION)); $nome_imagem_final = md5($nome_imagem_real.$data_atual).$extensao_imagem; $endereco_final_salvar_imagem = $destino_da_imagem.$nome_imagem_final; $extensao_permitida = retorne_elemento_array_existe($extensoes_disponiveis, $extensao_imagem); if($nome_imagem != null and $nome_imagem_real != null and $extensao_permitida == true){
cadastra_imagem_album_ajuda($endereco_final_salvar_imagem, $idalbum_imagens); $image = new SimpleImage(); $image->load($nome_imagem); $image->scale($tamanho_escala_imagem_album); $image->save($endereco_final_salvar_imagem); };
};
};
function monta_painel_controle(){
if(retorne_super_usuario() == false){
return null; };
$aba_selecionada[retorne_tipo_controle()] = "classe_aba_selecionada_perfil"; $links[] = "<div class='classe_links_abas_perfil_usuario $aba_selecionada[1]'><a href='$url_pagina_inicial_site?tipo_pagina=7&editar_perfil_modo=0&numero_controle=1' title='Fundo de início'>Fundo de início</a></div>"; $links[] = "<div class='classe_links_abas_perfil_usuario $aba_selecionada[2]'><a href='$url_pagina_inicial_site?tipo_pagina=7&editar_perfil_modo=0&numero_controle=2' title='Documentação'>Documentação</a></div>"; $links[] = "<div class='classe_links_abas_perfil_usuario $aba_selecionada[3]'><a href='$url_pagina_inicial_site?tipo_pagina=7&editar_perfil_modo=0&numero_controle=3' title='Funções PHP'>Funções PHP</a></div>"; $links[] = "<div class='classe_links_abas_perfil_usuario $aba_selecionada[4]'><a href='$url_pagina_inicial_site?tipo_pagina=7&editar_perfil_modo=0&numero_controle=4' title='Usuários'>Usuários</a></div>"; foreach($links as $valor_link){
if($valor_link != null){
$codigo_html .= $valor_link; };
};
$codigo_html = "<div class='classe_div_aba_links_selecao'>$codigo_html</div>"; $titulo_div = "Controle geral"; $codigo_html = constroe_div_especial_geral($titulo_div, $codigo_html, null); $codigo_html .= monta_servicos_painel_controle(); return $codigo_html; };
function monta_servicos_painel_controle(){
if(retorne_super_usuario() == false){
return null; };
$tipo_servico = retorne_tipo_controle(); switch($tipo_servico){
case 1:
$codigo_servico = formulario_alterar_imagem_fundo_capa_inicial();
break;
case 2:
$codigo_servico = monta_pagina_documentacao(); break;
case 3:
$codigo_servico = carrega_pagina_funcoes(); break;
case 4:
$codigo_servico = monta_numero_usuarios_site(); break;
};
$codigo_html_bruto .= $codigo_servico; $codigo_html_bruto = constroe_div_especial_geral("Serviço do painel", $codigo_html_bruto, null); return $codigo_html_bruto; };
function retorne_tipo_controle(){
$numero_controle = $_GET['numero_controle']; if($numero_controle == null){
$numero_controle = $_POST['numero_controle']; };
return $numero_controle; };
function monta_pagina_documentacao(){
if(retorne_super_usuario() == false){
return null; };
$codigo_html_bruto .= campo_publicar_ajuda(); $codigo_html_bruto .= campo_pesquisa_ajuda(); $codigo_html_bruto .= constroe_topicos_ajuda(2); return $codigo_html_bruto; };
function campo_pesquisa_funcoes(){
global $url_pagina_inicial_site; $pesquisa_generica = retorne_termo_pesquisa(); $tipo_pesquisa_funcoes = tipo_pesquisa_funcoes(); $radio_utilizado[$tipo_pesquisa_funcoes] = "checked"; $codigo_html_bruto .= "<form action='$url_pagina_inicial_site' method='get'>"; $codigo_html_bruto .= "<input type='text' name='pesquisa_generica' class='campo_entrada_pesquisa_ajuda' value='$pesquisa_generica' placeholder='Pesquisar funcao'>"; $codigo_html_bruto .= "<br>"; $codigo_html_bruto .= "<input type='hidden' name='tipo_pagina' value='7'>"; $codigo_html_bruto .= "<input type='hidden' name='editar_perfil_modo' value='0'>"; $codigo_html_bruto .= "<input type='hidden' name='numero_controle' value='3'>"; $codigo_html_bruto .= "<input type='radio' name='tipo_pesquisa_funcoes' $radio_utilizado[1] value='1'>"; $codigo_html_bruto .= "&nbsp;"; $codigo_html_bruto .= "php"; $codigo_html_bruto .= "<br>"; $codigo_html_bruto .= "<input type='radio' name='tipo_pesquisa_funcoes' $radio_utilizado[2] value='2'>"; $codigo_html_bruto .= "&nbsp;"; $codigo_html_bruto .= "jquery"; $codigo_html_bruto .= "<br>"; $codigo_html_bruto .= "<input type='radio' name='tipo_pesquisa_funcoes' $radio_utilizado[3] value='3'>"; $codigo_html_bruto .= "&nbsp;"; $codigo_html_bruto .= "todos"; $codigo_html_bruto .= "<br>"; $codigo_html_bruto .= "<br>"; $codigo_html_bruto .= "<input type='submit' class='uibutton large confirm' value='Pesquisar'>"; $codigo_html_bruto .= "</form>"; $codigo_html_bruto = div_especial_basica_campos($codigo_html_bruto); return $codigo_html_bruto; };
function carrega_pagina_funcoes(){
$codigo_html_bruto .= campo_pesquisa_funcoes(); $codigo_html_bruto .= carrega_pesquisa_funcoes_gerais(); $codigo_html_bruto .= ""; return $codigo_html_bruto; };
function carrega_pesquisa_funcoes_gerais(){
global $tabela_banco; $pesquisa_generica = retorne_termo_pesquisa(); $tipo_pesquisa_funcoes = tipo_pesquisa_funcoes(); $limit_query = retorne_limit_tabela_sem_id(); switch($tipo_pesquisa_funcoes){
case 1:
$query[0] = "select *from $tabela_banco[28] where (nome like '%$pesquisa_generica%') and tipo='1' $limit_query;"; $query[1] = "select *from $tabela_banco[28] where (nome like '%$pesquisa_generica%') and tipo='1';"; break;
case 2:
$query[0] = "select *from $tabela_banco[28] where (nome like '%$pesquisa_generica%') and tipo='2' $limit_query;"; $query[1] = "select *from $tabela_banco[28] where (nome like '%$pesquisa_generica%') and tipo='2';"; break;
case 3:
$query[0] = "select *from $tabela_banco[28] where (nome like '%$pesquisa_generica%') $limit_query;"; $query[1] = "select *from $tabela_banco[28] where (nome like '%$pesquisa_generica%');"; break;
};
$numero_resultados = retorne_numero_linhas_query($query[1]); $codigo_html_bruto .= "Pesquisando por <b>$pesquisa_generica</b> total $numero_resultados resultado(s)."; $codigo_html_bruto .= "<br>"; $codigo_html_bruto .= "<br>"; $codigo_html_bruto .= retorne_pacote_funcoes_gerais($query[0]); $codigo_html_bruto .= monta_paginas_paginacao_funcoes_gerais($numero_resultados); return $codigo_html_bruto; };
function monta_paginas_paginacao_funcoes_gerais($numero_resultados){
global $limite_resultados_pagina_ajuda; global $imagem_servidor; global $url_pagina_inicial_site; $numero_pagina_atual = retorne_numero_pagina_resultado(); $numero_pagina_atual /= $limite_resultados_pagina_ajuda; $numero_pagina_atual = round($numero_pagina_atual); if($numero_pagina_atual == null){
$numero_pagina_atual = 0; };
$numero_paginas = round($numero_resultados / $limite_resultados_pagina_ajuda) + 1; $numero_paginas_real = round($numero_resultados / $limite_resultados_pagina_ajuda); @$porcentagem = ($numero_pagina_atual / $numero_paginas_real) * 100; $porcentagem = round($porcentagem); if($porcentagem > 0 and $porcentagem <= 100){
$campo_porcentagem .= "<div class='progress' id='barra_progresso_paginacao'>"; $campo_porcentagem .= " <div class='progress-bar' role='progressbar' aria-valuenow='$porcentagem' aria-valuemin='0' aria-valuemax='100' style='width: $porcentagem%;'>"; $campo_porcentagem .= "$porcentagem%"; $campo_porcentagem .= "</div>"; $campo_porcentagem .= "</div>"; };
$numero_pagina_anterior = ($numero_pagina_atual - 1) * $limite_resultados_pagina_ajuda; $numero_pagina_proxima = ($numero_pagina_atual + 1) * $limite_resultados_pagina_ajuda; $pesquisa_generica = retorne_termo_pesquisa(); $tipo_pesquisa_funcoes = tipo_pesquisa_funcoes(); $url_padrao_index = $url_pagina_inicial_site."?pesquisa_generica=$pesquisa_generica&tipo_pagina=7&editar_perfil_modo=0&numero_controle=3&tipo_pesquisa_funcoes=$tipo_pesquisa_funcoes"; $url_voltar = $url_padrao_index."&numero_pagina=$numero_pagina_anterior"; $url_avancar = $url_padrao_index."&numero_pagina=$numero_pagina_proxima"; if($numero_pagina_atual > 0){
$imagem_voltar = $imagem_servidor['voltar']; $imagem_voltar = "<img src='$imagem_voltar' title='Voltar' alt='Voltar'>"; $imagem_voltar = "<a href='$url_voltar'>$imagem_voltar</a>"; };
if($numero_paginas_real > $numero_pagina_atual){
$imagem_avancar = $imagem_servidor['avancar']; $imagem_avancar = "<img src='$imagem_avancar' title='Avançar' alt='Avançar'>"; $imagem_avancar = "<a href='$url_avancar'>$imagem_avancar</a>"; };
$codigo_html_bruto .= "<div class='campo_paginacao_paginas_resultados'>"; $codigo_html_bruto .= $imagem_voltar; $codigo_html_bruto .= $imagem_avancar; $codigo_html_bruto .= $campo_porcentagem; $codigo_html_bruto .= "</div>"; return $codigo_html_bruto; };
function retorne_pacote_funcoes_gerais($query){
$contador = 0; $comando = comando_executa($query); $numero_linhas = retorne_numero_linhas_comando($comando); for($contador == $contador; $contador <= $numero_linhas; $contador++){
$dados = mysql_fetch_array($comando, MYSQL_ASSOC); $nome = $dados['nome']; $tipo = $dados['tipo']; $conteudo = $dados['conteudo']; $conteudo = stripslashes($conteudo); if($nome != null){
$codigo_html_bruto .= "<div class='classe_div_funcoes_gerais'>"; $codigo_html_bruto .= "<div class='classe_div_funcoes_gerais_titulo'><li>$nome</div>"; $codigo_html_bruto .= "<div class='classe_div_funcoes_gerais_conteudo'>"; $codigo_html_bruto .= "<textarea cols='40' rows='40'>"; $codigo_html_bruto .= $conteudo; $codigo_html_bruto .= "</textarea>"; $codigo_html_bruto .= "</div>"; $codigo_html_bruto .= "</div>"; };
};
return $codigo_html_bruto; };
function tipo_pesquisa_funcoes(){
$tipo_pesquisa = remove_html($_GET['tipo_pesquisa_funcoes']); if($tipo_pesquisa == null){
$tipo_pesquisa = 1; };
return $tipo_pesquisa; };
function monta_numero_usuarios_site(){
global $tabela_banco; $query = "select *from $tabela_banco[1];"; $numero_resultados = retorne_numero_linhas_query($query); if($numero_resultados > 1){
$plural_singular = "usuários"; }else{
$plural_singular = "usuário"; };
$codigo_html_bruto .= "<div class='classe_div_painel_controle_num_usuarios'>"; $codigo_html_bruto .= retorne_tamanho_resultado($numero_resultados); $codigo_html_bruto .= "&nbsp;"; $codigo_html_bruto .= $plural_singular; $codigo_html_bruto .= "</div>"; return $codigo_html_bruto; };
?>