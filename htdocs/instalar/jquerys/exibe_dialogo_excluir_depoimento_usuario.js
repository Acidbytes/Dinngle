
// dialogo excluir depoimento de usuario --------

function exibe_dialogo_excluir_depoimento_usuario(id){

beep_dialogo(1); // beep dialogo

$("html, body").animate({ scrollTop: 0 }, 1000); // topo da pagina

document.getElementById("div_dialogo_excluir_depoimento_" + id).style.display = "inline"; // exibindo div

};

// ---------------------------------------------------------