
// dialogo excluir todas as mensagens
function dialogo_excluir_todas_mensagens(){


// vai para o topo
$("html, body").animate({ scrollTop: 0 }, 1000); // topo da pagina


// oculta ou exibe
if(document.getElementById("div_excluir_todas_mensagens_usuario").style.display == "inline"){

document.getElementById("div_excluir_todas_mensagens_usuario").style.display = "none"; // exibindo div

}else{

document.getElementById("div_excluir_todas_mensagens_usuario").style.display = "inline"; // exibindo div

};


};

