
// dialogo compartilhar ------------------------------

function compartilhar_conteudo_usuario(id, identificador){

$("html, body").animate({ scrollTop: 0 }, 1000); // topo da pagina

document.getElementById("div_compartilhar_conteudo_" + id + "_" + identificador).style.display = "inline"; // exibindo div

};

// ---------------------------------------------------------