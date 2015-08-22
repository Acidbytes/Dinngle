
// dialogo cancelar ou excluir amizade -----------

function dialogo_excluir_cancelar_amizade(idusuario){

beep_dialogo(1); // beep dialogo

$("html, body").animate({ scrollTop: 0 }, 1000); // topo da pagina

document.getElementById("div_id_janela_cancelar_excluir_amizade_" + idusuario).style.display = "inline"; // exibindo div

};

// ---------------------------------------------------------

