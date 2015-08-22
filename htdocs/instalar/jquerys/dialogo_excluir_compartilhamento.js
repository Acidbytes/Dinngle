
// dialogo excluir compartilhamento --------------

function dialogo_excluir_compartilhamento(id){

beep_dialogo(1); // beep dialogo

$("html, body").animate({ scrollTop: 0 }, 1000); // topo da pagina

document.getElementById("dialogo_excluir_compartilhamento_" + id).style.display = "inline"; // exibindo div

};

// ---------------------------------------------------------