

// exibe janela com mensgem de dialogo ------

function exibir_janela_mensagem_dialogo_solicitacoes(div_janela_1, div_janela_2){

beep_dialogo(1); // beep dialogo

// topo da pagina -------------------------------------

$("html, body").animate({ scrollTop: 0 }, 1000); // topo da pagina

// --------------------------------------------------------


// obtendo nome de janela ------------------------

var div_janela_1 = document.getElementById("mensagem_dialogo_" + div_janela_1).innerHTML; // obtendo nome de janela

var div_janela_2 = document.getElementById("mensagem_dialogo_" + div_janela_2).innerHTML; // obtendo nome de janela

// --------------------------------------------------------


// exibe div --------------------------------------------

document.getElementById(div_janela_1).style.display = "inline"; // exibindo div

document.getElementById(div_janela_2).style.display = "none"; // ocultando div

// --------------------------------------------------------


};

// --------------------------------------------------------


