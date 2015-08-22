
// dialogo bloquear usuario ------------------------

function dialogo_bloquear_usuario(){

beep_dialogo(1); // beep dialogo

$("html, body").animate({ scrollTop: 0 }, 1000); // topo da pagina

document.getElementById("div_bloquear_usuario").style.display = "inline"; // exibindo div

};

// ---------------------------------------------------------