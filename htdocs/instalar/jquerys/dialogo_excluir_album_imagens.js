
// dialogo para excluir album de imagens
function dialogo_excluir_album_imagens(id){

beep_dialogo(1); // beep dialogo

$("html, body").animate({ scrollTop: 0 }, 1000); // topo da pagina

document.getElementById("janela_excluir_album_imagem_" + id).style.display = "inline"; // exibindo div

};

