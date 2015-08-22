
// numero da janela de dialogo de opcoes de postagem -------------------

var opcoes_postagem_numero_janela_dialogo_atual; // numero de janela

// ----------------------------------------------------------------------------------------


// altera o numero da janela de dialogo de opcoes de postagem --------

function altera_numero_janela_dialogo_postagem_opcoes(id){

beep_dialogo(1); // beep dialogo

$("html, body").animate({ scrollTop: 0 }, 1000); // topo da pagina

opcoes_postagem_numero_janela_dialogo_atual = id; // alterando numero para id de postagem

};

// ----------------------------------------------------------------------------------------


// data postagem -------------------------------------

function dialogo_alterar_data_postagem(){

document.getElementById("opcoes_postagem_data_alterar_" + opcoes_postagem_numero_janela_dialogo_atual).style.display = "inline"; // exibindo div

};

// ---------------------------------------------------------


// conteudo de postagem ---------------------------

function dialogo_alterar_conteudo_postagem(){

document.getElementById("opcoes_postagem_conteudo_alterar_" + opcoes_postagem_numero_janela_dialogo_atual).style.display = "inline"; // exibindo div

};

// ---------------------------------------------------------


// dialogo para excluir a postagem de usuario -

function dialogo_excluir_postagem_usuario(){

document.getElementById("opcoes_postagem_excluir_" + opcoes_postagem_numero_janela_dialogo_atual).style.display = "inline"; // exibindo div

};

// ---------------------------------------------------------


// dialogo para editar comentario -----------------

function dialogo_editar_comentario(id, idusuario_comentario){

document.getElementById("campo_editar_comentario_" + id + "_" + idusuario_comentario).style.display = "inline"; // exibindo div

};

// ---------------------------------------------------------


// dialogo para excluir comentario ----------------

function dialogo_excluir_comentario(id, idusuario_comentario){

document.getElementById("campo_excluir_comentario_" + id + "_" + idusuario_comentario).style.display = "inline"; // exibindo div

};

// ---------------------------------------------------------


// dialogo para excluir imagem --------------------

function dialogo_excluir_imagem(){

document.getElementById("div_campo_excluir_imagem_" + opcoes_postagem_numero_janela_dialogo_atual).style.display = "inline"; // exibindo div

};

// ---------------------------------------------------------































