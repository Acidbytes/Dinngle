

// fechando janelas abertas ------------------------------------

function fechar_janela_mensagem_dialogo(){

beep_dialogo(2); // beep dialogo

// obtendo numero de janelas ---------------------------------

var numero_janelas = document.getElementsByClassName("div_janela_principal_mensagem_dialogo").length;

// ----------------------------------------------------------------------


// listando e ocultando janelas ---------------------------------

for(contador = 0; contador <= numero_janelas; contador++){

document.getElementsByClassName("div_janela_principal_mensagem_dialogo")[contador].style.display = "none"; // ocultando janela

};

// ----------------------------------------------------------------------


};

// ----------------------------------------------------------------------

